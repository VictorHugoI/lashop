<header class="header-container">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-6">
                    <!-- Header Top Links -->
                    <div class="toplinks">
                        <div class="links">
                            @if(Auth::check())
                                <div class="myaccount"><a title="My Account" href="login.html"><span
                                                class="hidden-xs">{{ Auth::user()->name }}</span></a></div>
                            @else
                                <div class="myaccount"><a title="My Account" href="login.html"><span class="hidden-xs">My account</span></a>
                                </div>
                            @endif
                            <div class="wishlist"><a title="My Wishlist" href="wishlist.html"><span class="hidden-xs">Wishlist</span></a>
                            </div>
                            <div class="check"><a title="Checkout" href="checkout.html"><span
                                            class="hidden-xs">Checkout</span></a></div>
                            <div class="phone hidden-xs">1 800 123 1234</div>
                        </div>
                    </div>
                    <!-- End Header Top Links -->
                </div>
            </div>
        </div>
    </div>
    <div class="header container">
        <div class="row">
            <div class="col-lg-2 col-sm-3 col-md-2 col-xs-12">
                <!-- Header Logo -->
                <a class="logo" title="Magento Commerce" href="index.html">
                    <img alt="Magento Commerce" src="{{ url('images/logo.png') }}"></a>
                <!-- End Header Logo -->
            </div>
            <div class="col-lg-7 col-sm-4 col-md-6 col-xs-12">
                <!-- Search-col -->
                <div class="search-box">
                    {!! Form::open(['action' => 'User\SearchController@index', 'method' => 'GET', 'class' => 'searchform']) !!}
                    <select name="brandId" class="cate-dropdown hidden-xs">
                        <option value="0">-- All brands --</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                        <input type="text" placeholder="Search here..." value="" maxlength="70" class="" name="search"
                               id="search">
                        <button id="submit-button" class="search-btn-bg timkiem">
                            <span>{{ trans('user/label.search') }}</span>
                        </button>
                    {!! Form::close() !!}
                </div>
                <div class="col-md-8 col-md-offset-3">
                    <li class="dropdown open" style="list-style-type: none">
                        <ul id="menu2" class="dropdown-menu list-unstyled msg_list searchresult" role="menu" style="padding: 0px">

                        </ul>
                    </li>
                </div>
                <!-- End Search-col -->
            </div>
            <!-- Top Cart -->
            <div class="col-lg-3 col-sm-5 col-md-4 col-xs-12">
                <div class="top-cart-contain">
                    <div class="mini-cart">
                        <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle">
                            <a href="shopping_cart.html"> <i class="icon-cart"></i>
                                <div class="cart-box">
                                    <span class="title">{{ trans('user/label.myCart') }}</span>
                                    <span id="cart-total" class="cartTotal"> {{ count(\Cart::content()) }} </span>
                                </div>
                            </a>
                        </div>
                        <div>
                            <div class="top-cart-content arrow_box">
                                <div class="block-subtitle">{{ trans('user/label.recentItem') }}</div>
                                <ul id="cart-sidebar" class="mini-products-list cartList">
                                    @foreach($cartItem = \Cart::content() as $item)
                                        <li class="item itemcart" id="{{ $item->rowId }}">
                                            <a class="product-image" href="#" title="Downloadable Product ">
                                                <img alt="Downloadable Product " src="{{ url($item->options->url) }}"
                                                     width="80">
                                            </a>
                                            <div class="detail-item">
                                                <div class="product-details">
                                                    <a href="#" title="Remove This Item" onClick=""
                                                       class="glyphicon glyphicon-remove"data-url="{{ action('User\CartController@edit', $item->rowId) }}">&nbsp;</a>
                                                    <p class="product-name">
                                                        <a href="#" title="Downloadable Product">{{ $item->name }} </a>
                                                    </p>
                                                </div>
                                                <div class="product-details-bottom">
                                                    <span class="price">{{'$ ' . $item->price . '.00'}}</span>
                                                    <span class="title-desc">{{ trans('user/label.qty') }}</span>
                                                    <strong class="product_qty">{{ $item->qty }}</strong>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="top-subtotal">{{ trans('user/label.subTotal') }}
                                    <span class="price subtotal">{{ '$ ' . \Cart::subtotal() }}</span>
                                </div>
                                <div class="actions">
                                    <button class="btn-checkout" type="button">
                                        <span>{{ trans('user/label.checkout') }}</span>
                                    </button>
                                    <a class="view-cart" type="button" href="{{ action('User\CartController@index') }}">
                                        <span>{{ trans('user/label.viewCart') }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="ajaxconfig_info" style="display:none"><a href="#/"></a>
                        <input value="" type="hidden">
                        <input id="enable_module" value="1" type="hidden">
                        <input class="effect_to_cart" value="1" type="hidden">
                        <input class="title_shopping_cart" value="Go to shopping cart" type="hidden">
                    </div>
                </div>
                @if(Auth::check())
                    <div class="signup"><a title="Login" href="{{ action('User\ProfileController@edit', auth::id()) }}"><span>See Profile</span></a></div>
                    <span class="or"> | </span>
                    <div class="login">
                        <a title="Login" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            <span>Log Out</span>
                        </a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @else
                    <div class="signup"><a title="Login" href="{{ route('register') }}"><span>Sign up Now</span></a></div>
                    <span class="or"> | </span>
                    <div class="login"><a title="Login" href="{{ route('login') }}"><span>Log In</span></a></div>
                @endif
            </div>
            <!-- End Top Cart -->
        </div>
    </div>
</header>
