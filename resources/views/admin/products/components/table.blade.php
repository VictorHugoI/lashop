<tr>
    <td class="text-center">{{ $product->id }}</td>
    <td class="text-center">{{ $product->name }}</td>
    <td>
        <img src="{{ asset($product->url) }}" alt="" width="100px" height="100px">
    </td>
    <td class="text-center">{{ $product->price }}</td>
    <td class="text-center">{{ $product->price_sale }}</td>
    <td class="text-center">
        <a href="{{ route('admin.products.edit', $product->id) }}" style="color: green; font-size: 18px;">
            <i class="fa fa-pencil"></i>
        </a>
        {{ Form::open(['method' => 'DELETE', 'route' => ['admin.products.destroy', $product->id]]) }}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-xs btn-delete-resource fa fa-trash']) }}
        {{ Form::close() }}
    </td>
</tr>
