@extends('site.layouts.master')
@section('content')
    <!-- Main Section ==========================================-->
    <section class="main_section page_head">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4>{{ app()->getLocale() == 'en' ? 'our story' : 'من نحن' }}</h4>
                    <ul>
                        <li>
                            <a href="{{ route('site.index') }}"> {{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسية' }}
                                /
                            </a>
                        </li>
                        <li>{{ app()->getLocale() == 'en' ? 'our story' : 'من نحن' }}</li>
                    </ul>
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
    <section class="section_img">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="50">
                    <div class="text">
                        <h3>
                            <img src="{{ asset('public/site/images/mision.png') }}" />
                            {{ app()->getLocale() == 'en' ? 'OUR MISSION' : 'مهمتنا' }}
                        </h3>
                        <p>
                            {{ $about->translate(app()->getLocale())->mission }}
                        </p>
                        <h3>
                            <img src="{{ asset('public/site/images/value.png') }}" />
                            {{ app()->getLocale() == 'en' ? 'OUR Values' : 'قيمنا' }}
                        </h3>
                        <p>
                            {{ $about->translate(app()->getLocale())->values }}
                        </p>
                        <h3>
                            <img src="{{ asset('public/site/images/vision.png') }}" />
                            {{ app()->getLocale() == 'en' ? 'OUR Vision' : 'رؤيتنا' }}
                        </h3>
                        <p>
                            {{ $about->translate(app()->getLocale())->vision }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="certficate" data-aos="fade-up" data-aos-delay="100">
                        <h3>{{ app()->getLocale() == 'en' ? 'Company Certificates' : 'شهادات الشركة' }}</h3>
                        <ul class="list">
                            @foreach (explode("\n", $about->translate(app()->getLocale())->certificates) as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
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
                                <a href="{{ get_image($image->image, 'media') }}" data-fancybox="gallery"
                                    class="gallery_item">
                                    <img src="{{ get_image($image->image, 'media') }}" />
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
@endsection
