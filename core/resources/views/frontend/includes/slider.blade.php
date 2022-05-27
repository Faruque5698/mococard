<div class="brand-section ptb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-md-12">
                <div class="brand-wrapper">
                    <div class="swiper-wrapper">
                         @php($brands = \App\Models\Brand::all() )
                        @foreach($brands as $brand)
                        <div class="swiper-slide swiper-slide-2">
                            <div class="brand-thumb-item">
                                <img src="{{asset($brand->logo)}}" alt="brand">
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    <div class="slider-prev">
                        <i class="las la-arrow-left"></i>
                    </div>
                    <div class="slider-next">
                        <i class="las la-arrow-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>