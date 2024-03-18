<header>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="#home" class="logo" alt="logo">
                    @if (request()->routeIs('site.index') || request()->routeIs('site.about') || request()->routeIs('site.career') || request()->routeIs('site.contact') || request()->routeIs('site.partners') || request()->routeIs('site.brands'))
                        <img src="{{ asset('public/site/images/logo.png') }}" />
                    @else
                        <img src="{{ get_image($brand->logo, 'brands') }}" />
                    @endif

                </a>
                <ul class="btns">
                    @if (app()->getLocale() == 'en')
                        <a href="{{ route('site.locale', ['locale' => 'ar']) }}" class="icon_link"> <i>AR</i> </a>
                    @else
                        <a href="{{ route('site.locale', ['locale' => 'en']) }}" class="icon_link"> <i>EN</i> </a>
                    @endif

                    <button class="icon_link menu_btn colored-cursor" data-toggle="collapse" type="button"
                        data-target="#main_nav">
                        <i class="fa fa-bars"></i>
                    </button>
                </ul>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg" id="header_spy">
        <div class="container">
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="nav">
                    @if (request()->routeIs('site.index') || request()->routeIs('site.about') || request()->routeIs('site.career') || request()->routeIs('site.contact') || request()->routeIs('site.partners') || request()->routeIs('site.brands'))
                        <li>
                            <a class="nav-link {{ request()->routeIs('site.index') ? 'active' : '' }}"
                                href="{{ route('site.index') }}">
                                {{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسية' }}</a>
                        </li>
                        <li>
                            <a class="nav-link {{ request()->routeIs('site.about') ? 'active' : '' }}"
                                href="{{ route('site.about') }}">
                                {{ app()->getLocale() == 'en' ? 'our story' : 'من نحن' }} </a>
                        </li>
                        <li>
                            <a class="nav-link {{ request()->routeIs('site.brands') ? 'active' : '' }}"
                                href="{{ route('site.brands') }}">
                                {{ app()->getLocale() == 'en' ? 'Brands' : 'الماركات' }} </a>
                        </li>
                        <li>
                            <a class="nav-link {{ request()->routeIs('site.partners') ? 'active' : '' }}"
                                href="{{ route('site.partners') }}">
                                {{ app()->getLocale() == 'en' ? 'Partners' : 'الشركاء' }} </a>
                        </li>
                        <li>
                            <a class="nav-link {{ request()->routeIs('site.career') && request()->isMethod('get') ? 'active' : '' }}"
                                href="{{ route('site.career') }}">
                                {{ app()->getLocale() == 'en' ? 'Careers' : 'الوظائف' }} </a>
                        </li>
                        <li>
                            <a class="nav-link {{ request()->routeIs('site.contact') && request()->isMethod('get') ? 'active' : '' }}"
                                href="{{ route('site.contact') }}">
                                {{ app()->getLocale() == 'en' ? 'Contact' : 'تواصل معنا' }} </a>
                        </li>
                    @else
                        <li>
                            <a class="nav-link {{ request()->routeIs('site.brand') ? 'active' : '' }}"
                                href="{{ route('site.brand', ['slug' => request()->slug]) }}">
                                {{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسية' }}
                            </a>
                        </li>
                        <li>
                            <a class="nav-link {{ request()->routeIs('site.brand.story') ? 'active' : '' }}"
                                href="{{ route('site.brand.story', ['slug' => request()->slug]) }}">
                                {{ app()->getLocale() == 'en' ? 'our story' : 'من نحن' }} </a>
                        </li>
                        <li>
                            <a class="nav-link {{ request()->routeIs('site.brand.products') ? 'active' : '' }}"
                                href="{{ route('site.brand.products', ['slug' => request()->slug]) }}">
                                {{ app()->getLocale() == 'en' ? 'Products' : 'المنتجات' }} </a>
                        </li>
                        <li>
                            <a class="nav-link {{ request()->routeIs('site.brand.partners') ? 'active' : '' }}"
                                href="{{ route('site.brand.partners', ['slug' => request()->slug]) }}">
                                {{ app()->getLocale() == 'en' ? 'Partners' : 'الشركاء' }} </a>
                        </li>
                        <li>
                            <a class="nav-link {{ request()->routeIs('site.brand.media') ? 'active' : '' }}"
                                href="{{ route('site.brand.media', ['slug' => request()->slug]) }}">
                                {{ app()->getLocale() == 'en' ? 'Media' : 'الميديا' }} </a>
                        </li>
                        <li>
                            <a class="nav-link {{ request()->routeIs('site.brand.contact') ? 'active' : '' }}"
                                href="{{ route('site.brand.contact', ['slug' => request()->slug]) }}">
                                {{ app()->getLocale() == 'en' ? 'Contact' : 'تواصل معنا' }} </a>
                        </li>
                        <li>
                            <a class="nav-link border" href="{{ route('site.index') }}">
                                {{ app()->getLocale() == 'en' ? 'Venus Group' : 'مجموعة  venus' }} </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
