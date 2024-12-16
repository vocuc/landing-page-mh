<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductPaymentExport;
use App\Http\Requests\CreateProductPaymentRequest;
use App\Http\Requests\UpdateProductPaymentRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ProductPaymentRepository;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Flash;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ProductPaymentController extends AppBaseController
{
    /** @var ProductPaymentRepository $productPaymentRepository*/
    private $productPaymentRepository;

    public function __construct(ProductPaymentRepository $productPaymentRepo)
    {
        $this->productPaymentRepository = $productPaymentRepo;
    }

    /**
     * Display a listing of the ProductPayment.
     */
    public function index(Request $request)
    {
        $query = $this->productPaymentRepository->allQuery([]);
        
        $reportQuery = DB::table('product_payments');

        if($request->has('d')) {
            $dateRange = [
                "all" => Carbon::now()->subDays(365),
                "7day" => Carbon::now()->subDays(7),
                "30day" => Carbon::now()->subDays(30),
            ];

            if($request->get('d') == "today") {
                $query->where('created_at', '>=', date("Y-m-d 00:00:00"));
                $reportQuery->where('created_at', '>=', date("Y-m-d 00:00:00"));
            } else if($request->get('d') == "yesterday") {
                $query->where('created_at', '<', date("Y-m-d 00:00:00"));
                $query->where('created_at', '>=', date('Y-m-d 00:00:00', strtotime('-1 day')));

                $reportQuery->where('created_at', '<', date("Y-m-d 00:00:00"));
                $reportQuery->where('created_at', '>=', date('Y-m-d 00:00:00', strtotime('-1 day')));
            } else {
                $query->where('created_at', '>=', $dateRange[$request->get('d')]);
                $reportQuery->where('created_at', '>=', $dateRange[$request->get('d')]);
            };
        }

        if($request->has('start_time')) {
            $query->where('created_at', '>=', $request->get('start_time'));
        } 
        
        if($request->has('end_time')) {
            $query->where('created_at', '<', date("Y-m-d 00:00:00", strtotime($request->get('end_time')) + 86400));
        }

        $productPayments = $query->orderBy('id', 'DESC')->paginate($request->get('per_page', 10));

        $report = $reportQuery->select(
            'status',  
            DB::raw('COUNT(*) as total_orders'), 
            DB::raw('SUM(price) as total_revenue'), 
            DB::raw('SUM(discount_price) as total_voucher')
        )
        ->groupBy('status')
        ->orderBy("status", 'DESC')
        ->get();

        $dataReport = [
            0 => [
                'total_orders' => 0,
                'total_revenue' => 0,
                'total_voucher' => 0
            ],
            1 => [
                'total_orders' => 0,
                'total_revenue' => 0,
                'total_voucher' => 0
            ]
        ];

        foreach($report as $r) {
            $dataReport[$r->status]["total_orders"] = $r->total_orders;
            $dataReport[$r->status]["total_revenue"] = $r->total_revenue;
            $dataReport[$r->status]["total_voucher"] = $r->total_voucher;
        }

        return view('product_payments.index')
            ->with('dataReport', $dataReport)
            ->with('productPayments', $productPayments);
    }

    /**
     * Show the form for creating a new ProductPayment.
     */
    public function create()
    {
        return view('product_payments.create');
    }

    /**
     * Store a newly created ProductPayment in storage.
     */
    public function store(CreateProductPaymentRequest $request)
    {
        $input = $request->all();

        $productPayment = $this->productPaymentRepository->create($input);

        Flash::success('Product Payment saved successfully.');

        return redirect(route('product-payments.index'));
    }

    /**
     * Display the specified ProductPayment.
     */
    public function show($id)
    {
        $productPayment = $this->productPaymentRepository->find($id);

        if (empty($productPayment)) {
            Flash::error('Product Payment not found');

            return redirect(route('product-payments.index'));
        }

        return view('product_payments.show')->with('productPayment', $productPayment);
    }

    /**
     * Show the form for editing the specified ProductPayment.
     */
    public function edit($id)
    {
        $productPayment = $this->productPaymentRepository->find($id);

        if (empty($productPayment)) {
            Flash::error('Product Payment not found');

            return redirect(route('product-payments.index'));
        }

        return view('product_payments.edit')->with('productPayment', $productPayment);
    }

    /**
     * Update the specified ProductPayment in storage.
     */
    public function update($id, UpdateProductPaymentRequest $request)
    {
        $productPayment = $this->productPaymentRepository->find($id);

        if (empty($productPayment)) {
            Flash::error('Product Payment not found');

            return redirect(route('product-payments.index'));
        }

        $productPayment = $this->productPaymentRepository->update($request->all(), $id);

        Flash::success('Product Payment updated successfully.');

        return redirect(route('product-payments.index'));
    }

    /**
     * Remove the specified ProductPayment from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $productPayment = $this->productPaymentRepository->find($id);

        if (empty($productPayment)) {
            Flash::error('Product Payment not found');

            return redirect(route('product-payments.index'));
        }

        $this->productPaymentRepository->delete($id);

        Flash::success('Product Payment deleted successfully.');

        return redirect(route('product-payments.index'));
    }

    /**
     * exportExcel function
     *
     * @return void
     */
    public function exportExcel(Request $request) 
    {
        $startTime = $request->get('start_time');
        
        $endTime = $request->get('end_time');
        
        return Excel::download(new ProductPaymentExport($startTime, $endTime), 'payments.xlsx');
    }
}
