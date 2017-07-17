@extends('customers.layout.master')
@section('title')
<title>Check Out</title>
@endsection
@section('content')
    @if(session('status'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('status') }}</strong>
        </div>
    @endif
<section class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">
            <div class="cart wow">
                <div class="page-title">
                    <h2>Shoping Cart</h2>
                </div>
                <div class="table-responsive">
                    <fieldset>
                        @include('customers.carts.components.table')
                    </fieldset>
                </div>
                <!-- BEGIN CART COLLATERALS -->
                @include('customers.carts.components.payment')
                <!--cart-collaterals-->
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('.remove-item').click(function(event) {
            event.preventDefault();
            //row item
            var cartItem = $(this).closest('tr.cartItem');
            //edit method
            var url = $(this).data('url');
            console.log(url);
            swal({
                  title: "Are you sure?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Yes, Delete it!",
                  closeOnConfirm: false
                },
            function(){
                $.ajax({
                url: url,
                type : "GET",
                data : {},
                success : function(data) {
                    console.log(data);
                    $('#cart-sidebar').html(data.cartContent);
                    $('#cart-total').html(data.total);
                    $('span.price').html( '$' + data.subTotal);
                    cartItem.remove();
                    if (data.total == 0) {
                        $('#empty_cart_button').hide();
                        $('.btn-update').hide()
                    }
                    swal("Deleted!", "success");
                }
            });
            
            });
        });
    
        //update cartItemt
        $('.edit-bnt').click(function(event) {
            /* Act on the event */
            var cartItem = $(this).closest('tr.cartItem');
            var url = $(this).closest('tr.cartItem').find('.formEdit').attr('action');
            var qty = cartItem.find('.qty').val();
            if (!(qty < 10 && qty > 0)) {
                sweetAlert("Oops...", "Something went wrong!", "error");   
            }
            else {
                $.ajax({
                    url : url,
                    type : "PUT",
                    data : {'qty' : qty},
                    success : function(data) {
                        console.log(data);
                        $('.subTotal').html('$' + data.subTotal);
                        cartItem.closest('tr.cartItem').find('.total').html('$' + data.total);
                        $('#cart-sidebar').html(data.cartContent);
                        $('#cart-total').html(data.totalItem);
                        console.log(cartItem.find('.price').html());
                        $('.price').html('$' + data.subTotal);
                        swal("Update Success!");
                    }
                });
            }
        });
        //clear Cart
        $('#empty_cart_button').click(function(e) {
            e.preventDefault();
            swal({
              title: "Are you sure?",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Yes, Delete it!",
              closeOnConfirm: false
            },
            function(){
                var url = $('#empty').attr('action');
                $.ajax({
                    type : "POST",
                    url : url,
                    success : function(data){
                        $('#cart-total').text(0);
                        $('#cart-sidebar').html('');
                        $('.price').text(0);
                        $('#cartContent').html('');
                        $('#empty_cart_button').hide();
                        $('.btn-update').hide();
                        $('.cart-collaterals').html('');
                        swal("Deleted!", "Success");
                    }
                })
              
            });
        });
    });
</script>
@endpush