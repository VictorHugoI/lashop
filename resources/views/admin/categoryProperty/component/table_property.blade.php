<table class="table table-striped table-bordered table-hover dataTables-example">
    <thead>
    <tr>
        <th>Property name</th>
        <th>Label for property</th>
        <th>Unit</th>
        <th>Chosen</th>
    </tr>
    </thead>
    <tbody class="tableContent">
    @foreach($properties as $property)
        <tr class="gradeU">
            <td class="proper_name">{{ $property->name }}</td>
            <td class="proper_label">{{ $property->label }}</td>
            <td style="text-align: center"><input> </td>
            <td style="text-align: center">
                {!! Form::open(['route' => ['categoryProperty.update', $id, $property->id], 'method' => 'GET', 'class' => 'tableProperty']) !!}
                <input data-property="{{ $property->id }}" type="checkbox"
                   class="chosenBox" {{ $chosenProperties->contains('property_id', $property->id) ? 'checked' : ''}}>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
