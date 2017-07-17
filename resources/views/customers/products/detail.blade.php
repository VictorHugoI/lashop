@extends('customers.layout.master')
@section('title')
<title>Home</title>
@endsection
@push('nav')
@include('customers.layout.sections.navbar')
@endpush
@section('content')
<section class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">
            <div class="row">
                <div class="product-view wow">
                    <div class="product-essential">
                        <form action="#" method="post" id="product_addtocart_form">
                            <div class="product-img-box col-lg-6 col-sm-6 col-xs-12">
                                <ul class="moreview" id="moreview">
                                    <li class="moreview_thumb thumb_1">
                                        <img class="moreview_thumb_image" src="{{ url($product->image) }}">
                                        <img class="moreview_source_image" src="{{ url($product->image) }}" alt="">
                                        <span class="roll-over">Roll over image to zoom in</span>
                                        <img style="position: absolute;" class="zoomImg" src="{{ url($product->image) }}">
                                    </li>
                                </ul>
                                <div class="moreview-control"> <a style="right: 42px;" href="javascript:void(0)" class="moreview-prev"></a> <a style="right: 42px;" href="javascript:void(0)" class="moreview-next"></a> </div>
                            </div>
                            

                            <div class="product-shop col-lg-6 col-sm-6 col-xs-12">
                                <div class="product-next-prev"> <a class="product-next" href="#"><span></span></a> <a class="product-prev" href="#"><span></span></a> </div>
                                <div class="product-name">
                                    <h1>{{ $product->name }}</h1>
                                </div>
                                <div class="ratings">
                                    <div class="rating-box">
                                        <div style="width:60%" class="rating"></div>
                                    </div>
                                    <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Your Review</a> </p>
                                </div>
                                <p class="availability in-stock"><span>In Stock</span></p>
                                <div class="price-block">
                                    <div class="price-box">
                                        @if($product->price != 0)
                                            <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> ${{ $product->price }}.00 </span> </p>
                                            <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> ${{ $product->sale_price }}.00 </span> </p>
                                        @else
                                            <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> ${{ $product->price }}.00 </span> </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="short-description">
                                    <h2>Quick Overview</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu.<br>
                                    Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt... </p>
                                </div>
                                <div class="add-to-box">
                                    <div class="add-to-cart">
                                        <label for="qty">Quantity:</label>
                                        <div class="pull-left">
                                            <div class="custom pull-left">
                                                <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="icon-plus">&nbsp;</i></button>
                                                <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                                                <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon-minus">&nbsp;</i></button>
                                            </div>
                                        </div>
                                        <button onClick="productAddToCartForm.submit(this)" class="button btn-cart" title="Add to Cart" type="button"><span><i class="icon-basket"></i> Add to Cart</span></button>
                                    </div>
                                    <div class="email-addto-box">
                                        <ul class="add-to-links">
                                            {{-- <li> <a class="link-wishlist" href="#"><span>Add to Wishlist</span></a></li>
                                            <li><span class="separator">|</span> <a class="link-compare" href="#"><span>Add to Compare</span></a></li> --}}
                                        </ul>
                                        {{-- <p class="email-friend"><a href="#" class=""><span>Email to Friend</span></a></p> --}}
                                    </div>
                                </div>
                                {{-- <div class="custom-box"><img alt="banner" src="{{ asset('assets/images/cus-img.png') }}"></div> --}}
                            </div>
                        </form>
                    </div>
                    <div class="product-collateral">
                        <div class="col-sm-12 wow">
                            <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                                <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Product Description </a> </li>
                                <li> <a href="#product_tabs_custom" data-toggle="tab">Product detail</a> </li>
                                <li><a href="#product_tabs_tags" data-toggle="tab">Comment</a></li>
                            </ul>
                            <div id="productTabContent" class="tab-content">
                                <div class="tab-pane fade in active" id="product_tabs_description">
                                    <div class="std">
                                        {!! $product->description !!}
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam erat mi, rutrum at sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus felis vehicula felis, a dapibus enim lorem nec augue.</p>
                                        <p> Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer enim purus, posuere at ultricies eu, placerat a felis. Suspendisse aliquet urna pretium eros convallis interdum. Quisque in arcu id dui vulputate mollis eget non arcu. Aenean et nulla purus. Mauris vel tellus non nunc mattis lobortis.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="product_tabs_custom">
                                    <div class="product-tabs-content-inner clearfix">
                                        <h4>Detail product</h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                                @foreach($product->properties as $propety)
                                                <tr>
                                                    <th>{{ $propety->label }}</th>
                                                    <td>{{ $product->getAttribute('prop_' . $propety->name) . ' ' . $product->getPropertyUnit($propety->id) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @if(Auth::check())
                                <div class="tab-pane fade" id="product_tabs_tags">
                                    <div class="box-collateral box-reviews" id="customer-reviews">
                                        <div class="box-reviews2">
                                            <div class="box visible" style="margin-bottom: 10px; margin-left: 40px;">
                                                <form id="form-comment" method="POST" action="{{ route('comments.store') }}">
                                                    <ul>
                                                        <li>
                                                            <input type="hidden" id="comment-product" name="product_id" value="{{ $product->id }}">
                                                            <div class="input-box">
                                                                <textarea name="content" rows="3" cols="5" id="textarea-content-comment" placeholder="New Comment..." ></textarea>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="buttons-set" style="text-align: right;">
                                                        <a href="javascript:void(0)" id="button-submit-comment" class="button submit" title="Submit Review"><span>Submit comment</span></a>
                                                    </div>
                                                </form>
                                            </div>
                                            <h3>Comments</h3>
                                            <ul id="comment-load" style="position: relative;">
                                                @include('customers.products.sections.comment', ['comments' => $comments])
                                            </ul>
                                            <img id="loading2" style="position: absolute; display: none; left: 40%; z-index: 100000;" src="{{ asset('assets/images/30.gif') }}" />
                                            <div style="text-align: center;" class="actions"> <a data-currentpage="2"  data-route="{{ route('comments.show', $product->id) }}" href="javascript:void(0)" class="button view-all" id="see-more-comment"><span><span>See more</span></span></a> </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="col-sm-12">
                                    <div class="box-additional">
                                        <div class="related-pro wow">
                                            <div class="slider-items-products">
                                                <div class="new_title center">
                                                    <h2>Products same category</h2>
                                                </div>
                                                <div id="related-products-slider" class="product-flexslider hidden-buttons">
                                                    <div class="slider-items slider-width-col4">
                                                     @foreach (\App\Models\Product::where('category_id', $product->category_id)->get() as $product)
                                                        @include('customers.products.sections.sameproduct', ['product' => $product])
                                                     @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--<div class="upsell-pro wow">--}}
                                            {{--<div class="slider-items-products">--}}
                                                {{--<div class="new_title center">--}}
                                                    {{--<h2>Upsell Products</h2>--}}
                                                {{--</div>--}}
                                                {{--@include('customers.products.sections.upsellproduct')--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endsection
@push('scripts')
    <script type="text/javascript">
        $('#see-more-comment').click(function(event) {
            // $('#comment-load a').css('color', '#dfecf6');
            // $('#loading2').css('top', parseInt($('#loading2').css('top')) + 20 +'%');
            $('#loading2').show();
            $.get($(this).attr('data-route'), { page: $(this).attr('data-currentpage') })
                .done(function(e) {
                    // console.log(e);
                    $('#loading2').hide();
                    $('#comment-load').append(e);

                    var currentpage = parseInt($('#see-more-comment').attr('data-currentpage')) + 1;
                    $('#see-more-comment').attr('data-currentpage', currentpage);
                    if(e === "empty") {
                        $('#see-more-comment').hide();
                    } else {
                        $('#comment-load').append(e);
                    }
                    // console.log(e);
            });
        });

        $('#button-submit-comment').click(function(event) {
        //  console.log("aa");
            var form = $(this).closest('#form-comment');
            $.post(form.attr('action'), form.serialize(), function (data) {
                addNewEntryComment(data);

                $('#textarea-content-comment').val('');
            }) 
        });

        Echo.private('comments.' + $('#comment-product').val())
            .listen('CommentPusherEvent', (data) => {
                // console.log(data.comment.id);
                var content_commnet_update = $('#comment-content-' + data.comment.id);

                // console.log(content_commnet_update);
                if (content_commnet_update.length) {
                    content_commnet_update.text(data.comment.content);
                } else {
                    addNewEntryComment(data.comment);
                }
                // $(newEntry.find('.edit-comment')).on( "click", editComment );
        });

        function addNewEntryComment(data) {
            var metaUrl = document.getElementsByName('base-url')[0].getAttribute('content');
            var controlForm = $('#comment-load:first'),
                    currentEntry = $('.entry-comment:first'),
                    newEntry = $(currentEntry.clone()).prependTo(controlForm);
                newEntry.attr('id', 'comment_' + data.id);
                newEntry.find('a#comment-username').text(data.user.name);
                newEntry.find('.comment-textarea').text(data.content);
                newEntry.find('.comment-textarea').attr('id', 'comment-content-' + data.id);
                newEntry.find('.edit-comment').attr('data-edit', metaUrl + '/comments/' + data.id);
                newEntry.find('.time-comment').text(data.created_at);

                newEntry.find('.delete-comment').attr('data-delete', metaUrl + '/comments/' + data.id);
        }
         
        $('#comment-load').on('click', '.edit-comment', function() {
            editComment($(this));
        });

        function editComment(currentThis) {
            // currentThis = $(this);
            var edit_route = currentThis.data('edit');
            var parent_edit_comment = currentThis.parentsUntil('.entry-comment');
            var edit_comment = parent_edit_comment.find('div.comment-textarea');
            var value_comment = edit_comment.text();
            // console.log(edit_comment);
            html = '<form id="form-edit-comment" method="POST" action="' + edit_route + '">'
                    + '<ul>'
                    + '<li>'                       
                        + '<div class="input-box">'
                            + '<textarea class="edit-content-comment" name="content" rows="3" cols="5" id="edit-content-comment" placeholder="New Comment..." >'
                            + value_comment + '</textarea>'  
                        + '</div>'
                    + '</li>'
                    + '</ul>'
                    + '<div class="buttons-set" style="text-align: right;">'
                     + '<a href="javascript:void(0)" id="button-update-comment" class="button submit">'
                     +'<span>Update comment</span></a>'
                   + '</div>'
                  + '</form>';
            edit_comment.html(html);
            var textarea = edit_comment.find('textarea.edit-content-comment');
            textarea
            .focus()
            .val("")
            .val(value_comment);
            $('#button-update-comment').click(function(e) {
                var form = $(this).closest('#form-edit-comment');
                $.ajax({
                    type: 'PUT',
                    url : form.attr('action'), 
                    data: form.serialize(), 
                    success : function (data) {
                        // console.log("a");
                        edit_comment.html(textarea.val());
                        var color = edit_comment.css('color');
                        edit_comment.css('color', 'green');
                        setTimeout(function(){
                            edit_comment.css('color', color);}, 3000);
                        },
                });
            });
        }

        $('#comment-load').on('click', '.delete-comment', function() {
            // console.log('a');
            deleteComment($(this));
        });

        function deleteComment(currentThis) {
            console.log(currentThis.attr('data-delete'));
            $.ajax({
                    type: 'DELETE',
                    url: currentThis.attr("data-delete"),
                    dateType: "jsonp", 
                    success: function(result) {
                        $('#comment_' + result).remove();
                    }
            });
        }
    </script>
@endpush
