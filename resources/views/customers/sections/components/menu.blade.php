@foreach ($categories as $category)
    @if ($category['level'] == 0)
<li class="level0 nav-5 level-top first"> <a href="grid.html" class="level-top"> <span>{{ $category['name'] }}</span> </a>
    <div class="level0-wrapper dropdown-6col" style="display:none;">
        <div class="level0-wrapper2">
            <div class="nav-block nav-block-center grid12-8 itemgrid itemgrid-4col">
                <ul class="level0">
    @endif
    @if ($category['level'] == 1)
                    <li class="level1 nav-6-1 parent item"> <a href="grid.html"><span>{{ $category['name'] }}</span></a>
                        <ul class="level1">
    @endif
    @if ($category['level'] == 2)
                            <li class="level2 nav-6-1-1"> <a href="grid.html"><span>{{ $category['name'] }}</span></a> </li>
    @endif
    @if (!empty($category['children']))
        @if ($category['level'] < 3)
            @include('customers.sections.components.menu', ['categories' => $category['children']])
        @endif
    @endif
    @if ($category['level'] == 1)
        </ul>
    </li>
    @endif
    @if ($category['level'] == 0)
                </ul>
                <div class="nav-add">
                    <div class="push_item1">
                        <div class="push_img"> <a href="#"> <img  alt="women jwellery" src="assets/images/women-cate-banner.jpg"> </a> </div>
                    </div>
                    <div class="push_item1">
                        <div class="push_img"> <a href="#"> <img  alt="women_jwellery" src="assets/images/women-cate-banner1.jpg"> </a> </div>
                    </div>'
                    <div class="push_item1 push_item1_last">
                        <div class="push_img"> <a href="#"> <img  alt="women_bag" src="assets/images/women-cate-banner2.jpg"> </a> </div>
                    </div>
                    <br class="clear">
                </div>
            </div>
            <div class="nav-block nav-block-right std grid12-4">
                <p><a href="#"><img class="fade-on-hover" src="assets/images/nav-women-banner.jpg" alt="nav img"></a></p>
            </div>
        </div>
    </div>
</li>
    @endif
@endforeach
