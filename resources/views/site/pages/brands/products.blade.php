@extends('site.layouts.master')
@section('content')
    <section class="main_section page_head">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4> {{ app()->getLocale() == 'en' ? 'Products' : 'المنتجات' }} </h4>
                    <ul>
                        <li>
                            <a href="{{ route('site.brand', ['slug' => request()->slug]) }}">
                                {{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسية' }} / </a>
                        </li>
                        <li> {{ app()->getLocale() == 'en' ? 'Products' : 'المنتجات' }} </li>
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
    <!-- Products ==========================================-->
    <section class="products section_color">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row text-center">
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product_item" data-aos="fade-up" data-aos-delay="100">
                                    <div class="cover">
                                        <img src="{{ get_image($product->image, 'brands') }}" />
                                    </div>
                                    <h3>{{ app()->getLocale() == 'en' ? $product->name : $product->name_ar }}</h3>
                                </div>
                                
                                
                                <!--End a-->
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
