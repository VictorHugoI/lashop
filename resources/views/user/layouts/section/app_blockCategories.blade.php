<div class="box-content box-category">
    <ul>
        @if($category->parent_id == Null)
            @foreach($cate_parent as $item)
                @if( $item->id == $category->id)
                    <li> <a class="active" href="{{ action('User\CategoryController@show', [$item->id]) }}">{{ $item->name }}</a> <span class="subDropdown minus"></span>
                        <ul class="level0_415" style="display:block">
                            @foreach($item->subcategories()->get() as $subItem)
                                <li> <a href="{{ action('User\CategoryController@show', [$subItem->id]) }}"> {{ $subItem->name }} ({{ count($subItem->products()->get()) }})</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li> <a href="{{ action('User\CategoryController@show', [$item->id]) }}">{{ $item->name }}</a> <span class="subDropdown plus"></span>
                        <ul class="level0_415" style="display:none">
                            @foreach($item->subcategories()->get() as $subItem)
                                <li> <a href="{{ action('User\CategoryController@show', [$subItem->id]) }}">{{ $item->name }}"> {{ $subItem->name }} ({{ count($subItem->products()->get()) }})</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach
        @else
            @foreach($cate_parent as $item)
                @if( $item->id == $category->parent_id)
                    <li> <a class="active" href="{{ action('User\CategoryController@show', [$item->id]) }}">{{ $item->name }}</a> <span class="subDropdown minus"></span>
                        <ul class="level0_415" style="display:block">
                            @foreach($item->subcategories()->get() as $subItem)
                                @if($subItem->id == $category->id)
                                    <li> <a href="{{ action('User\CategoryController@show', [$subItem->id]) }}"  style="color: #ad0800"> {{ $subItem->name }} ({{ count($subItem->products()->get()) }})</a>
                                    </li>
                                @else
                                    <li> <a href="{{ action('User\CategoryController@show', [$subItem->id]) }}"> {{ $subItem->name }} ({{ count($subItem->products()->get()) }})</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li> <a href="{{ action('User\CategoryController@show', [$item->id]) }}">{{ $item->name }}</a> <span class="subDropdown plus"></span>
                        <ul class="level0_415" style="display:none">
                            @foreach($item->subcategories()->get() as $subItem)
                                <li> <a href="{{ action('User\CategoryController@show', [$subItem->id]) }}"> {{ $subItem->name }} ({{ count($subItem->products()->get()) }})</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach
        @endif
    </ul>
</div>