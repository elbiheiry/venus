@extends('site.layouts.master')
@section('content')
    <section class="main_section page_head">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4> {{ app()->getLocale() == 'en' ? 'Our partners' : 'الشركاء' }} </h4>
                    <ul>
                        <li>
                            <a href="{{ route('site.brand', ['slug' => request()->slug]) }}">
                                {{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسية' }} / </a>
                        </li>
                        <li> {{ app()->getLocale() == 'en' ? 'Our partners' : 'الشركاء' }} </li>
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
    <section class="partners inner">
        <div class="container">
            <div class="row text-center">
                @php
                    $x = 50;
                @endphp
                @foreach ($partners as $partner)
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="{{ $x }}">
                        <img class="brand_img" src="{{ get_image($partner->image, 'partners') }}" />
                    </div>
                    @php
                        $x += 50;
                    @endphp
                @endforeach
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
@endsection
