<tr class="gradeU">
    <td class="proper_label">{{ $property->label }}</td>
    <td class="proper_datatype">{{ $property->data_type }}</td>
    <td style="text-align: center">
        <button class="btn btn-primary btn-xs btnEdit" data-toggle="modal" data-target="#favoritesModal"
                data-property-id="{{ $property->id }}">Edit </button>
        @if(count($property->categoryProperties) === 0)
            <button class="btn btn-warning btn-xs btnDelete">Delete </button>
        @endif
    </td>
    <td style="text-align: center">
        <input type="checkbox" class="i-checks">
    </td>
</tr>

