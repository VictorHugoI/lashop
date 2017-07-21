<div class="block block-layered-nav">
    <div class="block-title"><span>Brands</span></div>
    <div class="block-content">
        <dl id="narrow-by-list">
            <dd class="even">
                <ol>
                    @foreach($brands as $brand)
                        <li> <a href="">{{ $brand->name }}</a> ({{ $sumproduct->where('brand_id', $brand->id)->count() }}) </li>
                    @endforeach
                </ol>
            </dd>
        </dl>
    </div>
</div>
