<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="contact-forms-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Note</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contactForms as $contactForm)
                <tr>
                    <td>{{ $contactForm->name }}</td>
                    <td>{{ $contactForm->email }}</td>
                    <td>{{ $contactForm->note }}</td>
                    <td  style="width: 120px">
                        <div class='btn-group'>
                            <a href="{{ route('contact-forms.show', [$contactForm->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                    
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $contactForms])
        </div>
    </div>
</div>
