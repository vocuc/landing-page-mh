<?php

namespace App\Http\Controllers;

use App\Enums\Payments\TypePayment;
use App\Enums\ProductPayments\Status;
use App\Http\Requests\ProductPaymentCreateRequest;
use App\Http\Requests\ProductPaymentDownloadRequest;
use App\Models\Product;
use App\Models\ProductPayment;
use App\Models\Voucher;
use App\Repositories\ProductRepository;
use App\Services\Payment\PaymentService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;
use Str;

class ProductPaymentController extends Controller
{
    private $paymentService;

    private $productRepository;

    public function __construct(PaymentService $paymentService, ProductRepository $productRepository)
    {
        $this->paymentService = $paymentService;

        $this->productRepository = $productRepository;
    }

    public function store(ProductPaymentCreateRequest $request)
    {
        $data = $request->validated();

        $product = Product::find($data['product_id']);

        $productPrice = round($product->price);

        if (!empty($data['voucher_code'])) {
            $voucher = Voucher::where('code', $data['voucher_code'])->first();

            $data['discount_price'] = round($voucher->type == \App\Enums\Vouchers\VoucherType::PERCENT->value
                ? ($voucher->value / 100) * $productPrice
                : $voucher->value);

            $data['voucher_id'] = $voucher->id;
        } else {
            $data['discount_price'] = 0;
        }

        $data['status'] = Status::WAIT->value;

        $productPayment = ProductPayment::create([
            'user_name' => $data['user_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'discount_price' => $data['discount_price'],
            'price' => $productPrice,
            'product_id' => $data['product_id'],
            'voucher_id' => @$data['voucher_id'],
            'status' => $data['status'],
        ]);

        $finalPrice = $productPayment->price - $productPayment->discount_price;

        $genaratePayment = $this->paymentService->genaratePayment(
            $productPayment->id,
            $finalPrice,
            TypePayment::PRODUCT
        );

        $genaratePayment['id'] = $productPayment->id;

        $genaratePayment['email'] = $productPayment->email;

        $genaratePayment['price'] = $productPayment->price;

        $genaratePayment['discount_price'] = $productPayment->discount_price;

        $genaratePayment['final_price'] = $finalPrice;

        return response()->json($genaratePayment);
    }

    public function download(ProductPaymentDownloadRequest $request)
    {
        $data = $request->validated();

        $productPayment = ProductPayment::where('status', Status::SUCCESS)
            ->where('download_code', $data['code'])->first();

        if ($productPayment === null || $productPayment->product === null) {
            abort(404);
        }

        $filePath = $this->productRepository->getProductFilePath($productPayment->product->download_url);

        if (!File::exists($filePath)) {
            return response()->json(['error' => 'Không thể tải tệp từ URL.'], 404);
        }

        if (Cache::has('book_cache_' . $data['code']) === false) {
            $sessionId = (string) Str::uuid();

            Cache::put('book_cache_' . $data['code'], $sessionId, 1800);

            Cache::put('book_session_cache_' . $sessionId, $productPayment, 1800);
        } else {
            $sessionId = Cache::get('book_cache_' . $data['code']);
        }

        return response()->json(
            ['link_redirect' => route('products.read-book', ['code' => $sessionId])]
        );
    }

    public function readBook($code)
    {
        $productPayment = Cache::get('book_session_cache_' . $code);

        if ($productPayment === null) {
            abort(404);
        }

        $filePath = $this->productRepository->getProductFilePath($productPayment->product->download_url);

        if (!File::exists($filePath)) {
            abort(404);
        }

        return view('read-book', compact('code'));
    }

    public function getBook($code)
    {
        $productPayment = Cache::get('book_session_cache_' . $code);

        $filePath = $this->productRepository->getProductFilePath($productPayment->product->download_url);

        if (!File::exists($filePath)) {
            abort(404);
        }

        return response()->file($filePath);
    }
}
