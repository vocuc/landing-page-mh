<?php

namespace App\Http\Controllers;

use App\Enums\Payments\TypePayment;
use App\Enums\ProductPayments\Status;
use App\Http\Requests\ProductPaymentCreateRequest;
use App\Http\Requests\ProductPaymentDownloadRequest;
use App\Models\ProductPayment;
use App\Services\OTP\ConcreteCreators\SendOTPConcreteCreator;
use App\Services\Payment\PaymentService;
use App\Services\ProductPayment\ProductPaymentService;

class ProductPaymentController extends Controller
{
    private $paymentService;

    private $productPaymentService;

    public function __construct(PaymentService $paymentService, ProductPaymentService $productPaymentService)
    {
        $this->paymentService = $paymentService;

        $this->productPaymentService = $productPaymentService;
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

        return response()->json($genaratePayment);
    }

    public function download(ProductPaymentDownloadRequest $request)
    {
        // $data = $request->validated();

        // $productPayment = ProductPayment::find($data['id']);

        // $otpSender = SendOTPConcreteCreator::createOTPSender("product_payment", 'sms_product_otp');

        // $otpSender->to($productPayment->email, $productPayment->id);

        // $result = $otpSender->verify($request->post('code'));

        // if ($result['status'] == false) {
        //     return response()->json(json_encode([
        //         'status' => false,
        //         'message' => $result['message']
        //     ]));
        // }

        $filePath = public_path('images/bg-icon-1.png');

        return response()->download($filePath);
    }
}
