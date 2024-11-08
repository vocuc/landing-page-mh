<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="vouchers-table">
            <thead>
            <tr>
                <th>Code</th>
                <th>Type</th>
                <th>Value</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($vouchers as $voucher)
                <tr>
                    <td>{{ $voucher->code }}</td>
                    <td>{{ $voucher->type }}</td>
                    <td>{{ $voucher->value }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['vouchers.destroy', $voucher->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('vouchers.show', [$voucher->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('vouchers.edit', [$voucher->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $vouchers])
        </div>
    </div>
</div>
