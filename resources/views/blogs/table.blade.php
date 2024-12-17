<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="blogs-table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Short Desc</th>
                <th>Default Img</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($blogs as $blog)
                <tr>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->slug }}</td>
                    <td>{{ $blog->short_desc }}</td>
                    <td>@if(!empty($blog->default_img_url))<img src="{{$blog->default_img_url}}" width="100px">@endif</td>
                    <td>
                        @if($blog->status == 1) {{"Hoạt động"}}@else {{"Không hoạt động"}}@endif
                    </td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['blogs.destroy', $blog->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('blogs.show', [$blog->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('blogs.edit', [$blog->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $blogs])
        </div>
    </div>
</div>
