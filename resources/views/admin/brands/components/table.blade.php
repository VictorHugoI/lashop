<tr>
    <td class="text-center">{{ $brand->id }}</td>
    <td>{{ $brand->name }}</td>
    <td>
        <img src="{{ asset($brand->url) }}" alt="" width="100px" height="100px">
    </td>
    <td class="text-center">
        <a href="{{ route('admin.brands.edit', $brand->id) }}" style="color: green; font-size: 18px;">
            <i class="fa fa-pencil"></i>
        </a>
        {{ Form::open(['method' => 'DELETE', 'route' => ['admin.brands.destroy', $brand->id]]) }}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-xs btn-delete-resource fa fa-trash']) }}
        {{ Form::close() }}
    </td>
</tr>
