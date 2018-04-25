<div class="swiper-container">
    <div class="swiper-wrapper">
        @foreach($swiperProducts as $product)
        <div class="swiper-slide"><a href="/store/products/{{ $product->id }}">
                {{--{{Utility::makeThumbnail( public_path()."/images/products/".$product->image, public_path()."/images/products/375x224-".$product->image, 375,224)}}--}}
                <img style="width:100%;height:224px;" src='/images/products/{{ $product->image }}'>
            </a></div>
        @endforeach
    </div>
</div>
<!-- Swiper JS -->
<script src="/js/frontStore/swiper.min.js"></script>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: 2500,
        autoplayDisableOnInteraction: false
    });
</script>