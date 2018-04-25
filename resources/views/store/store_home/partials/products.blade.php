<ul id="cplist">
    @foreach($products as $product)
    <li class="F509" menu='11'>
        <a href="/store/products/{{ $product->id }}">
            {{--{{Utility::makeThumbnail( public_path()."/images/products/".$product->image, public_path()."/images/products/185x185-".$product->image, 300)}}--}}
        <img src="/images/products/{{ $product->image }}" class="lazy" height="220" width="100%">
        <div class="tit" style="padding-top: 3px;">{{ $product->name }}</div>
        <div class="pce">￥{{ $product->price }}</div>
        </a>
    </li>
    @endforeach
</ul>