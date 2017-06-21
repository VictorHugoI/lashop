<tr class="gradeU">
    <td class="proper_name">{{ $property->name }}</td>
    <td class="proper_label">{{ $property->label }}</td>
    <td style="text-align: center">
        <button class="btn btn-primary btn-xs btnEdit" data-toggle="modal" data-target="#favoritesModal"
        data-property-id="{{ $property->id }}">Edit </button>
        @if(count($property->categoryProperties) === 0)
        <button class="btn btn-warning btn-xs">Delete </button>
        @endif
    </td>
</tr>
