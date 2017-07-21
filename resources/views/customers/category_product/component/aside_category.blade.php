@php
    if (!isset($id))
        $id = 0
@endphp
@foreach ($categories as $category)
    @if($category['level'] == 0)
    <li class="cap1">
        <a class="{{ ( array_key_exists($category['id'], $cates) ) ? 'active' : '' }}"
           style="{{$category['id'] == $id ? 'color : red' : ''}}"
           href="{{ route('category.show', $category['id']) }}">
               {{ $category['name']/* . ' (' . \App\Models\Product::whereIn('category_id', $childrenId)->count() . ')' */}}
        </a>
        <span class="subDropdown {{ array_key_exists($category['id'], $cates)  ? 'minus' : 'plus' }} "></span>
        <ul class="level0_415" style="{{ (  array_key_exists($category['id'], $cates) ) ? 'display: block;' : '' }}">
    @endif
        @if($category['level'] == 1)
            <li class="cap2" >
                <a class="" href="{{ route('category.show', $category['id']) }}"
                   style="{{$category['id'] == $id ? 'color : red' : ''}}" >
                       {{ $category['name']/* . ' (' . \App\Models\Product::whereIn('category_id', $childrenId)->count() . ')' */}}
                </a>
                <span class="subDropdown {{ array_key_exists($category['id'], $cates)  ? 'minus' : 'plus' }}"></span>
                <ul class="level1" style="{{ ( array_key_exists($category['id'], $cates) ) ? 'display: block;' : '' }}">
                    @endif
                    @if($category['level'] == 2)
                    <li class="cap3">
                        <a href="{{ route('category.show', $category['id']) }}"
                            style="{{$category['id'] == $id ? 'color : red' : ''}}">
                                {{ $category['name'] . ' (' . \App\Models\Product::where('category_id', $category['id'])->count() . ')' }}
                        </a>
                    </li>
                    @endif
                    @if (!empty($category['children']))
                        @if ($category['level'] < 3)
                            @include('customers.category_product.component.aside_category', ['categories' => $category['children']])
                        @endif
                    @endif
        @if($category['level'] == 1)
                </ul>
            </li>
        @endif
    @if($category['level'] == 0)
    </ul>
    </li>
@endif
@endforeach


