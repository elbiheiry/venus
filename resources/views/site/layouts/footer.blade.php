<footer class="section_img">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <img src="{{ asset('public/site/images/logo.png') }}" />
            </div>
            <div class="col-lg-3 col-md-4">
                <h3>{{ app()->getLocale() == 'en' ? 'Our Brands' : 'ماركاتنا' }}</h3>
                <ul class="list row">
                    @foreach (\App\Models\Brand::all() as $brand)
                        <li class="col-md-12 col-sm-6 col-6">
                            <a
                                href="{{ route('site.brand', ['slug' => $brand->slug]) }}">{{ $brand->translate(app()->getLocale())->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-2 col-md-3">
                <h3>{{ app()->getLocale() == 'en' ? 'Quick Links' : 'روابط سريعة' }}</h3>
                <ul class="list row">
                    <li class="col-md-12 col-sm-4 col-6">
                        <a href="{{ route('site.index') }}">
                            {{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسية' }}</a>
                    </li>
                    <li class="col-md-12 col-sm-4 col-6">
                        <a href="{{ route('site.about') }}">
                            {{ app()->getLocale() == 'en' ? 'our story' : 'من نحن' }}
                        </a>
                    </li>
                    <li class="col-md-12 col-sm-4 col-6">
                        <a href="{{ route('site.brands') }}">
                            {{ app()->getLocale() == 'en' ? 'Brands' : 'الماركات' }} </a>
                    </li>
                    <li class="col-md-12 col-sm-4 col-6">
                        <a href="{{ route('site.partners') }}">
                            {{ app()->getLocale() == 'en' ? 'Partners' : 'الشركاء' }} </a>
                    </li>
                    <li class="col-md-12 col-sm-4 col-6">
                        <a href="{{ route('site.career') }}">
                            {{ app()->getLocale() == 'en' ? 'Careers' : 'الوظائف' }} </a>
                    </li>
                    <li class="col-md-12 col-sm-4 col-6">
                        <a href="{{ route('site.contact') }}">
                            {{ app()->getLocale() == 'en' ? 'Contact' : 'تواصل معنا' }} </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-12">
                <h3>{{ app()->getLocale() == 'en' ? 'Contact Info' : 'بيانات التواصل' }}</h3>
                <div class="row">
                    <div class="col-12">
                        <div class="contact_item">
                            <i class="fa fa-map-marker-alt"></i>
                            <a href="javascript:void(0)" class="txt_link address">
                                {{ app()->getLocale() == 'en' ? $settings->address_en : $settings->address_ar }}
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-6">
                        <div class="contact_item">
                            <i class="fa fa-phone"></i>
                            <a href="tel:{{ $settings->phone }}" class="txt_link"> {{ $settings->phone }}
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-6">
                        <div class="contact_item">
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:{{ $settings->email }}" class="txt_link">
                                {{ $settings->email }}
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-6">
                        <h3>{{ app()->getLocale() == 'en' ? 'Follow us' : 'تابعنا علي ' }}</h3>
                        <ul class="social">
                            @foreach ($links as $link)
                                <li>
                                    <a target="_blank" href="{{ $link->link }}"
                                        class="icon_link icon-{{ $link->name }} {{ $link->icon }}">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-12">
                <p class="copyright">
                    {{ app()->getLocale() == 'en' ? 'COPYRIGHT © 2022 Venus Group' : 'جميع الحقوق محفوظه ل © 2022 Venus Group' }}
                </p>
            </div>
        </div>
    </div>
    <div class="stars">
        <div id="stars"></div>
        <div id="stars2"></div>
        <div id="stars3"></div>
    </div>
</footer>
