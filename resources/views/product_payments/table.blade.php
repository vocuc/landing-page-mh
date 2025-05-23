<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="product-payments-table">
            <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Download Code</th>
                    <th>Price</th>
                    <th>Discount Price</th>
                    <th>Payment Amount</th>
                    <th>Product Id</th>
                    <th>Voucher Id</th>
                    <!-- <th>utm source</th> -->
                    <th>Created At</th>
                    <th>UTM</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productPayments as $productPayment)
                <tr>
                    <td>{{ $productPayment->id }}</td>
                    <td>{{ $productPayment->user_name }}</td>
                    <td>{{ $productPayment->email }}</td>
                    <td>{{ $productPayment->phone }}</td>
                    <td>{{ $productPayment->status_label }}</td>
                    <td>{{ $productPayment->download_code }}</td>
                    <td>{{ number_format($productPayment->price, 0, ",", ".") }}</td>
                    <td>{{ number_format($productPayment->discount_price, 0, ",", ".") }}</td>
                    <td>{{ number_format($productPayment->price - $productPayment->discount_price, 0, ",", ".") }}</td>
                    <td>{{ $productPayment->product_id }}</td>
                    <td>{{ $productPayment->voucher_id }}</td>
                    <td>{{ $productPayment->created_at }}</td>
                    <td>{{ $productPayment->utm_source }}</td>
                    <td style="width: 120px">
                        <div class='btn-group'>
                            <a href="{{ route('product-payments.show', [$productPayment->id]) }}"
                                class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('product-payments.edit', [$productPayment->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $productPayments])
        </div>
    </div>
</div>