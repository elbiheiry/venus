@extends('site.layouts.master')
@section('content')
    <!-- Main Section ==========================================-->
    <section class="brand_head brand_slider">
        <div class="container-fluid">
            <div class="row">
                <div id="main_section" class="carousel slide product_slider" data-ride="carousel" data-pause="false"
                    data-interval="7000">
                    <a class="carousel-control-prev icon_link" href="#main_section" role="button" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="carousel-control-next icon_link" href="#main_section" role="button" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                    <div class="carousel-inner">
                        @foreach ($sliders as $index => $slider)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ get_image($slider->image, 'brands') }}" />
                            </div>
                        @endforeach
                    </div>
                    <!--End Div-->
                </div>
            </div>
            <!--End Col-->
        </div>
        <!--End Container-->
        <div class="caption">
            <img src="{{ get_image($brand->logo, 'brands') }}">
            <h1> {{ $brand->translate(app()->getLocale())->name }} </h1>

        </div>
        <div class="stars">
            <div id="stars"></div>
            <div id="stars2"></div>
            <div id="stars3"></div>
        </div>
    </section>
    <!--End Section-->
    <!-- About ==========================================-->
    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="50">
                    <div class="section_title">
                        <h3>{{ app()->getLocale() == 'en' ? 'our story' : 'من نحن' }}</h3>

                        @foreach (explode("\n", $about->translate(app()->getLocale())->description) as $item)
                            <p>{{ $item }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ get_image($about->image, 'brands') }}" />
                </div>
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
    <!--End section-->
    <!-- Products ==========================================-->
    <section class="products section_color">
        <div class="container">
            <div class="row text-center">
                <div class="col-12" data-aos="fade-up" data-aos-delay="50">
                    <div class="section_title">
                        <h3>{{ app()->getLocale() == 'en' ? 'Products' : 'المنتجات' }}</h3>
                        <p>
                            @if (app()->getLocale() == 'en')
                                " Our great "bakery" products and raw materials specialized in all
                                bakery. "
                            @else
                                " متخصصين في جميع انواع منتجات المخبوزات والمواد الخام الخاصه بها "
                            @endif
                        </p>
                    </div>
                </div>
                <!--End Col-->
                @php
                    $x = 100;
                @endphp
                @foreach ($products as $product)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="product_item" data-aos="fade-up" data-aos-delay="{{ $x }}">
                            <div class="cover">
                                <img src="{{ get_image($product->image, 'brands') }}" />
                            </div>
                               <h3>{{ app()->getLocale() == 'en' ? $product->name : $product->name_ar }}</h3>
                        </div>
                     
                        <!--End a-->
                    </div>
                    @php
                        $x += 50;
                    @endphp
                @endforeach
                <div class="col-12" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{ route('site.brand.products', ['slug' => request()->slug]) }}" class="link more">
                        <span> {{ app()->getLocale() == 'en' ? 'All Products' : 'جميع المنتجات' }} </span>
                    </a>
                </div>
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
    <!--End section-->

    <!-- Partners ==========================================-->
    <section class="partners">
        <div class="container">
            <div class="row text-center">
                <div class="col-12" data-aos="fade-up" data-aos-delay="50">
                    <div class="section_title">
                        <h3>{{ app()->getLocale() == 'en' ? 'Our partners' : 'الشركاء' }} </h3>
                        <p>
                            @if (app()->getLocale() == 'en')
                                " Our great "bakery" products and raw materials specialized in all
                                bakery. "
                            @else
                                " متخصصين في جميع انواع منتجات المخبوزات والمواد الخام الخاصه بها "
                            @endif
                        </p>
                    </div>
                </div>
                <!--End Col-->
                <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                    <div class="owl-carousel owl-theme brands_slider">
                        @foreach ($partners as $partner)
                            <div class="item">
                                <img class="brand_img" src="{{ get_image($partner->image, 'partners') }}" />
                            </div>
                        @endforeach
                    </div>
                </div>
                <!--End Col-->
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
    <!--End section-->
    <!-- Media ==========================================-->
    <section class="section_color media" id="media">
        <div class="container">
            <div class="row text-center">
                <div class="col-12" data-aos="fade-up" data-aos-delay="50">
                    <div class="section_title">
                        <h3>{{ app()->getLocale() == 'en' ? 'Media' : 'الميديا' }}</h3>
                        <p>
                            @if (app()->getLocale() == 'en')
                                " Our great "bakery" products and raw materials specialized in all
                                bakery. "
                            @else
                                " متخصصين في جميع انواع منتجات المخبوزات والمواد الخام الخاصه بها "
                            @endif
                        </p>
                    </div>
                </div>
                <!--End Col-->
                <div class="col-12">
                    <div class="owl-carousel owl-theme media_slider">
                        @foreach ($images as $image)
                            <div class="item">
                                <a href="{{ get_image($image->image, 'brands') }}" data-fancybox="gallery"
                                    class="gallery_item">
                                    <img src="{{ get_image($image->image, 'brands') }}" />
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
    <!--End section-->
    <!-- Contact ==========================================-->
    <section id="contact" class="contact">
        <div class="container-fluid">
            <div class="row">
                <iframe src="{{ $settings->map }}" width="100%" height="450" style="border: 0" allowfullscreen=""
                    loading="lazy"></iframe>
                <a href="#home" class="fa fa-angle-up icon_link up_btn"></a>
            </div>
        </div>
    </section>
@endsection
