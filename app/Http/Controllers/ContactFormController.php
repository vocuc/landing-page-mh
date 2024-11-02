<?php

namespace App\Http\Controllers;

use App\Enums\Payments\TypePayment;
use App\Enums\ProductPayments\Status;
use App\Http\Requests\ContactFormCreateRequest;
use App\Http\Requests\ProductPaymentCreateRequest;
use App\Http\Requests\ProductPaymentDownloadRequest;
use App\Models\ContactForm;
use App\Models\ProductPayment;
use App\Services\OTP\ConcreteCreators\SendOTPConcreteCreator;
use App\Services\Payment\PaymentService;
use App\Services\ProductPayment\ProductPaymentService;

class ContactFormController extends Controller
{
    public function store(ContactFormCreateRequest $request)
    {
        $data = $request->validated();

        ContactForm::create($data);

        return response()->json();
    }
}
