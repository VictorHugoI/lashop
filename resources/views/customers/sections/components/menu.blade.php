@foreach ($categories as $category)
    @if ($category['level'] == 0)
        {{ ($category['id'] == $id) }}
        <li class="level0 nav-5 level-top first">
            <a href="{{ route('category.show', $category['id']) }}" class="level-top {{ (($category['id'] == $id || array_key_exists($category['id'], isset($cates) ? $cates : [])) && (! Request::is('/'))) ? 'active' : ''}}">
                <span>{{ $category['name'] }}</span> </a>
            <div class="level0-wrapper dropdown-6col" style="display:none;">
                <div class="level0-wrapper2">
                    <div class="nav-block nav-block-center grid12-8 itemgrid itemgrid-4col">
                        <ul class="level0">
                            @endif
                            @if ($category['level'] == 1)
                                <li class="level1 nav-6-1 parent item"><a
                                            href="{{ route('category.show', $category['id']) }}"><span>{{ $category['name'] }}</span></a>
                                    <ul class="level1">
                                        @endif
                                        @if ($category['level'] == 2)
                                            <li class="level2 nav-6-1-1"><a
                                                        href="{{ route('category.show', $category['id']) }}">
                                                    <span>{{ $category['name'] }}</span>
                                                </a>
                                            </li>
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
                            @for($i=1; $i<= 3; $i++)
                                <div class="push_item1">
                                    <div class="push_img"><a href="#">
                                            <img alt="women jwellery" src="{{ url('assets/images/category-images') . '/' . $category['id'] . $i . '.jpg'}}"> </a>
                                    </div>
                                </div>
                            @endfor
                            <br class="clear">
                        </div>
                    </div>
                    <div class="nav-block nav-block-right std grid12-4">
                        <p><a href="#"><img class="fade-on-hover" src="{{ url('assets/images/category-images/') . '/' . $category['id'] . '4.jpg'}}"
                                            alt="nav img"></a></p>
                    </div>
                </div>
            </div>
        </li>
    @endif
@endforeach
