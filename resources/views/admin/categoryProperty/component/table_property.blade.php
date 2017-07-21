<table class="table table-striped table-bordered table-hover dataTables-example">
    <thead>
    <tr>
        <th>Property name</th>
        <th>Label for property</th>
        <th>Unit</th>
        <th>Chosen</th>
        <th>Is Filter</th>
    </tr>
    </thead>
    <tbody class="tableContent">
    @foreach($properties as $property)
        <tr class="gradeU">
            <td class="proper_name">{{ $property->name }}</td>
            <td class="proper_label">{{ $property->label }}</td>
            <td style="text-align: center">
                {{--@if($property->measure_unit !== '0')--}}
                {!! Form::open(['route' => ['categoryProperty.isProperty'], 'method' => 'POST', 'class' => 'tableProperty']) !!}
                @if($chosenProperties->contains('property_id', $property->id))
                    {!! Form::select('measure_unit', config('common.unit')[$property->measure_unit],
                        $chosenProperties->where('property_id', $property->id)->first()->unit,
                        ['class' => 'form-control'])
                    !!}
                @else
                    {!! Form::select('measure_unit', config('common.unit')[$property->measure_unit],
                        '',['class' => 'form-control'])
                    !!}
                @endif
                {!! Form::hidden('category_id', $id) !!}
                {!! Form::hidden('property_id', $property->id) !!}
                {!! Form::close() !!}
                {{--@endif--}}
            </td>
            <td style="text-align: center">
                <input data-property="{{ $property->id }}" type="checkbox"
                       class="chosenBox" {{ $chosenProperties->contains('property_id', $property->id) ? 'checked' : ''}}>
            </td>
            <td style="text-align: center">
                {!! Form::open(['route' => ['categoryProperty.isFilter'], 'method' => 'POST', 'class' => 'isFilterForm']) !!}
                {!! Form::hidden('category_id', $id) !!}
                {!! Form::hidden('property_id', $property->id) !!}
                <input data-property="{{ $property->id }}" type="checkbox"
                       class="chosenFilter" {{ $chosenProperties->contains('property_id', $property->id) ? '' : 'disabled'}}
                        {{ $filterProperties->contains('property_id', $property->id) ? 'checked' : ''}}>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
