<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateProductPaymentRequest;
use App\Http\Requests\UpdateProductPaymentRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ProductPaymentRepository;
use Illuminate\Http\Request;
use Flash;

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
        $productPayments = $this->productPaymentRepository->paginate(10);

        return view('product_payments.index')
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
}
