<?php

namespace App\Http\Controllers;

use App\Enums\Payments\TypePayment;
use App\Enums\ProductPayments\Status;
use App\Http\Requests\ProductPaymentCreateRequest;
use App\Http\Requests\ProductPaymentDownloadRequest;
use App\Models\ProductPayment;
use App\Services\Payment\PaymentService;

class ProductPaymentController extends Controller
{
    private $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function store(ProductPaymentCreateRequest $request)
    {
        $data = $request->validated();

        $data['status'] = Status::WAIT->value;

        $productPayment = ProductPayment::create($data);

        $genaratePayment = $this->paymentService->genaratePayment(
            $productPayment->id,
            ProductPayment::PRICE,
            TypePayment::PRODUCT
        );

        $genaratePayment['id'] = $productPayment->id;
        
        $genaratePayment['email'] = $productPayment->email;

        return response()->json($genaratePayment);
    }

    public function download(ProductPaymentDownloadRequest $request)
    {
        $data = $request->validated();

        $productPayment = ProductPayment::where('status', Status::SUCCESS)->where('download_code', $data['code'])->first();

        if ($productPayment === null) {
            abort(404);
        }

        $filePath = public_path('images/bg-icon-1.png');

        return response()->download($filePath);
    }
}
