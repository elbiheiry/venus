@extends('site.layouts.master')
@section('content')
    <section class="main_section page_head">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4> {{ app()->getLocale() == 'en' ? 'Media' : 'الميديا' }} </h4>
                    <ul>
                        <li>
                            <a href="{{ route('site.brand', ['slug' => request()->slug]) }}">
                                {{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسية' }} / </a>
                        </li>
                        <li> {{ app()->getLocale() == 'en' ? 'Media' : 'الميديا' }} </li>
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
    <section class="section_color media inner" id="media">
        <div class="container">
            <div class="row text-center">
                @foreach ($images as $image)
                    <div class="col-md-4 col-sm-6 col-6">
                        <a href="{{ get_image($image->image, 'brands') }}" data-fancybox="gallery" class="gallery_item">
                            <img src="{{ get_image($image->image, 'brands') }}" />
                        </a>
                    </div>
                @endforeach
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
@endsection
