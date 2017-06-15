<tr>
    <td class="text-center">{{ $category->id }}</td>
    <td>{{ $category->name }}</td>
    <td>
        <img src="{{ asset($category->url) }}" alt="" width="100px" height="100px">
    </td>
    <td class="text-center">
        <a href="{{ route('admin.categories.edit', $category->id) }}" style="color: green; font-size: 18px;">
            <i class="fa fa-pencil"></i>
        </a>
        {{ Form::open(['method' => 'DELETE', 'route' => ['admin.categories.destroy', $category->id]]) }}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-xs btn-delete-resource fa fa-trash']) }}
        {{ Form::close() }}
    </td>
</tr>
