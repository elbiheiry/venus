<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">

@include('site.layouts.head')

<body {{ request()->routeIs('site.index' ? 'data-spy="scroll" data-target="#header_spy" data-offset="100"' : '') }}
    class="{{ request()->routeIs('site.brand') ||request()->routeIs('site.brand.story') ||request()->routeIs('site.brand.contact') ||request()->routeIs('site.brand.media') ||request()->routeIs('site.brand.partners') ||request()->routeIs('site.brand.products')? 'brand_site ': '' }} {{ request()->slug }}">
    <!-- Preloader
    =============================-->
    <div class=" preloader">
        <div class="load_cont">
            <img src="{{ asset('public/site/images/logo_icon.png') }}" class="icon fa-spin" />
            <img src="{{ asset('public/site/images/logo_word.png') }}" class="word" />
        </div>
    </div>
    <!-- Header
    ==========================================-->
    @include('site.layouts.header')
    @yield('content')

    <!--End Section-->
    @include('site.layouts.footer')
    <div class="cursor"></div>
    <!-- JS & Vendor Files
    ==========================================-->
    @include('site.layouts.scripts')
</body>

</html>
