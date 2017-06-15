<nav>
    <div class="container">
        <div class="nav-inner">
            <a class="logo-small" title="Magento Commerce" href="index.html"><img alt="Magento Commerce" src="{{ url('images/logo-small.png') }}"></a>
            <ul id="nav" class="hidden-xs">
                <li class="level0 parent drop-menu"><a href="{{ url('/home') }}" class="active"><span>{{ trans('user/label.home') }}</span> </a>
                </li>
                <li class="level0 nav-7 level-top parent"> <a href="grid.html" class="level-top"> <span>{{ trans('user/label.list_wine') }}</span> </a>
                    <div class="level0-wrapper dropdown-6col" style="display: none;">
                        <div class="level0-wrapper2">
                            <!--nav-block nav-block-center-->
                            <div class="nav-block nav-block-left std grid12-6">
                                <p><a href="#"><img class="fade-on-hover" src="{{ url('images/nav-men-banner.jpg') }}" alt="nav img"></a></p>
                            </div>
                            <!--nav-block nav-block-right std grid12-4-->

                            <div class="nav-block nav-block-center grid12-8 itemgrid itemgrid-4col">
                                <ul class="level0">
                                    @foreach($cate_parent as $item)
                                    <li class="level1 nav-6-1 parent item"> <a href="{{ action('User\CategoryController@show', [$item->id]) }}"><span>{{ $item->name }}</span></a>
                                        <!--sub sub category-->
                                        <ul class="level1">
                                            @foreach($item->subcategories as $subItem)
                                                <li class="level2 nav-6-1-1"> <a href="{{ action('User\CategoryController@show', [$subItem->id]) }}"><span>{{ $subItem->name }}</span></a> </li>
                                            @endforeach
                                        </ul>
                                        <!--sub sub category-->
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="nav-add">
                                    <div class="push_item">
                                        <div class="push_img"> <a href="#"> <img  alt="women_jwellery" src="{{ url('images/men-banner-img.jpg') }}"> </a> </div>
                                    </div>
                                    <div class="push_item last">
                                        <div class="push_img"> <a href="#"> <img  alt="women_jwellery" src="{{ url('images/men-banner-img1.jpg') }}"> </a> </div>
                                    </div>
                                    <br class="clear">
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="level0 parent drop-menu closeQickview"><a href="#"><span>{{ trans('user/label.blog') }}</span> </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
