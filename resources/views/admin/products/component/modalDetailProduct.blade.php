<div class="modal-content animated flipInY">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">{{ $product->name }}</h4>
        {{--<small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>--}}
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-4 b-r">
                <img src="{{ url('assets/images/products-images/product6.jpg') }}" style="width: 100%">
                <h4>Brand : <small style="font-size: 85%">{{ $product->brand->name }}</small></h4>
                <h4>Price : <small style="font-size: 85%">$ {{ $product->price }}</small></h4>
                <h4>Category : <small style="font-size: 85%">{{ $product->category->name }}</small></h4>
            </div>
            <div class="col-sm-8">
                <div class="ibox-content">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                Property
                            </th>
                            <th>
                                Value
                            </th>
                            <th>
                                Unit
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($details as $detail)
                            <tr>
                                <td>{{ $detail['label'] }}</td>
                                <td>{{ $detail['value'] }}</td>
                                @if($detail['unit'] != 'non_measure')
                                    <td>{{ $detail['unit'] }}</td>
                                @endif
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"><i class="fa fa-reply"></i>Save changes</button>
    </div>
</div>
