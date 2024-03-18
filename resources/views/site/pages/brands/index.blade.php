@extends('site.layouts.master')
@section('content')
    <!-- Main Section ==========================================-->
    <section class="main_section page_head">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4> {{ app()->getLocale() == 'en' ? 'Brands' : 'الماركات' }} </h4>
                    <ul>
                        <li>
                            <a href="{{ route('site.index') }}"> {{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسية' }}
                                /
                            </a>
                        </li>
                        <li> {{ app()->getLocale() == 'en' ? 'Brands' : 'الماركات' }} </li>
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
    <!-- Brands ==========================================-->
    <section class="section_color brands inner">
        <div class="container">
            <div class="row text-center">
                @foreach ($brands as $index => $brand)
                    <div class="col-sm-6">
                        <a href="{{ route('site.brand', ['slug' => $brand->slug]) }}" class="brand">
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
    @include('site.layouts.map')
@endsection
