@extends('site.layouts.master')
@section('content')
    <!-- Main Section ==========================================-->
    <section class="main_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="caption">
                        <h1>{{ app()->getLocale() == 'en' ? 'Venus Group' : 'مجموعة فينوس' }}</h1>
                        <h3>
                            @if (app()->getLocale() == 'en')
              
              Venus is now one of the largest companies In food industry related to bakery products and raw materials specialized in all bakery and frozen dough.
              
                            @else
              
              تعد فينوس الآن واحدة من أكبر الشركات في صناعة المواد الغذائية المتعلقة بمنتجات المخابز والمواد الخام المتخصصة في جميع أنواع المخابز والعجين المجمد.
                        @endif

                        </h3>
                        <a href="{{ route('site.about') }}" class="link">
                            <span> {{ app()->getLocale() == 'en' ? 'Read More' : 'قراءة المزيد' }} <i
                                    class="fa fa-angle-right"></i> </span>
                        </a>
                    </div>
                </div>
                <!--End Col-->
            </div>
            <!--End Col-->
        </div>
        <!--End Container-->
        <div class="stars">
            <div id="stars"></div>
            <div id="stars2"></div>
            <div id="stars3"></div>
        </div>
    </section>
    <!--End Section-->

    <!-- Brands ==========================================-->
    <section class="section_color pt-0 brands" id="brands">
        <div class="container">
            <div class="row text-center">
                @foreach ($brands as $index => $brand)
                    <div class="col-lg-3 col-md-6 col-sm-6 brand1">
                        <a href="{{ route('site.brand', ['slug' => $brand->slug]) }}"
                            class="brand {{ $index % 2 == 0 ? 'active' : '' }}">
                            <img src="{{ get_image($brand->logo, 'brands') }}" />
                            <h3>{{ $brand->translate(app()->getLocale())->name }}</h3>
                            <p>{{ $brand->translate(app()->getLocale())->brief }}</p>
                            <i class="icon_link fa fa-angle-right"></i>
                        </a>
                        <!--End Brand-->
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- About ==========================================-->
    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="50">
                    <div class="section_title">
                        <h3>{{ app()->getLocale() == 'en' ? 'Our Story' : 'من نحن' }}</h3>

                        @foreach (explode("\n", $about->translate(app()->getLocale())->description) as $item)
                            <p>{{ $item }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ get_image($about->image, 'about') }}" />
                </div>
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
    <!--End section-->
    <!-- About ==========================================-->
    <section class="section_img">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-delay="50">
                    <h3 class="hint">
                        @if (app()->getLocale() == 'en')
                        "we are serving more than 230 branches of the biggest hypermarkets, hotels, restaurant and stores in egypt."
                        @else
                            " 
                            نحن نخدم أكثر من 230 فرعا لأكبر محلات السوبر ماركت والفنادق والمطاعم والمتاجر في مصر
                            "
                        @endif

                    </h3>
                </div>
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
        <div class="stars">
            <div id="stars"></div>
            <div id="stars2"></div>
            <div id="stars3"></div>
        </div>
    </section>
    <!--End section-->

    <!-- About ==========================================-->
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

    <!-- Career ==========================================-->
    <section class="section_color career">
        <div class="container">
            <div class="row flex_mdcol_rev">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="50">
                    <img src="{{ get_image($career->image, 'content') }}" />
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="section_title mb-0">
                        <h3>{{ app()->getLocale() == 'en' ? 'Join us' : 'إنضم الينا' }}</h3>
                        {!! $career->translate(app()->getLocale())->description !!}
                        <a href="{{ route('site.career') }}" class="link">
                            <span> {{ app()->getLocale() == 'en' ? 'Join us' : 'إنضم إلينا' }}
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
    <!--End section-->
    <!-- Contact -->
    @include('site.layouts.map')
@endsection
