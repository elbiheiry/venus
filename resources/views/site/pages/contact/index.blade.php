@extends('site.layouts.master')
@section('content')
    <section class="main_section page_head">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <h4>{{ app()->getLocale() == 'en' ? 'Contact' : 'تواصل معنا' }}</h4>
                <ul>
                    <li>
                        <a href="{{ route('site.index') }}"> {{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسية' }}
                            /
                        </a>
                    </li>
                    <li>{{ app()->getLocale() == 'en' ? 'Contact' : 'تواصل معنا' }}</li>
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
    <section class="contact inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact_info">
                        <div class="section_title mb-0">
                            <h3>{{ app()->getLocale() == 'en' ? 'Contact us' : 'تواصل معنا' }}</h3>
                        </div>
                        <div class="contact_item">
                            <i class="fa fa-map-marker-alt"></i>
                            <div class="cont">
                                <span> {{ app()->getLocale() == 'en' ? 'Address' : 'العنوان' }} </span>
                                <a href="javascript:void(0)" class="txt_link">
                                    {{ app()->getLocale() == 'en' ? $settings->address_en : $settings->address_ar }}
                                </a>
                            </div>
                        </div>

                        <div class="contact_item">
                            <i class="fa fa-phone"></i>
                            <div class="cont">
                                <span> {{ app()->getLocale() == 'en' ? 'Phone Number' : 'رقم الهاتف' }} </span>
                                <a href="tel:{{ $settings->phone }}" class="txt_link"> {{ $settings->phone }} </a>
                            </div>
                        </div>

                        <div class="contact_item">
                            <i class="fa fa-envelope"></i>
                            <div class="cont">
                                <span> {{ app()->getLocale() == 'en' ? 'Email address' : 'البريد الإلكتروني' }} </span>
                                <a href="mailto:{{ $settings->email }}" class="txt_link">
                                    {{ $settings->email }}
                                </a>
                            </div>
                        </div>
                        <div class="contact_item">
                            <i class="fa fa-share-alt"></i>
                            <div class="cont">
                                <span> {{ app()->getLocale() == 'en' ? 'Follow us' : 'تابعنا علي ' }} </span>
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
                <div class="col-lg-6">
                    <div class="contact_form">
                        <div class="alert alert-success" role="alert" style="display:none;">

                        </div>
                        <div class="alert alert-danger" role="alert" style="display:none;">

                        </div>
                        <form class="ajax-form" action="{{ route('site.contact') }}" method="post">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label> {{ app()->getLocale() == 'en' ? 'Full name' : 'الإسم بالكامل' }}</label>
                                <input type="text" class="form-control" name="name" />
                            </div>
                            <div class="form-group">
                                <label> {{ app()->getLocale() == 'en' ? 'Email address' : 'البريد الإلكتروني' }} </label>
                                <input type="email" class="form-control" name="email" />
                            </div>
                            <div class="form-group">
                                <label> {{ app()->getLocale() == 'en' ? 'Phone number' : 'رقم الهاتف' }} </label>
                                <input type="text" class="form-control" name="phone" />
                            </div>
                            <div class="form-group">
                                <label> {{ app()->getLocale() == 'en' ? 'Message' : 'الرسالة' }}</label>
                                <textarea class="form-control" name="message"></textarea>
                            </div>
                            <button class="link" type="submit">
                                <span> <i class="fa fa-envelope"></i>
                                    {{ app()->getLocale() == 'en' ? 'Send Message' : 'إرسل رسالتك' }} </span>
                            </button>
                        </form>
                    </div>
                </div>
                <!--End Col-->
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
        <div class="container-fluid mt-50">
            <div class="row">
                <iframe src="{{ $settings->map }}" width="100%" height="450" style="border: 0" allowfullscreen=""
                    loading="lazy"></iframe>
                <a href="#home" class="fa fa-angle-up icon_link up_btn"></a>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        //submit form using ajax
        $(document).on('submit', '.ajax-form', function() {
            var form = $(this);
            var url = form.attr('action');
            var formData = new FormData(form[0]);
            form.find(":submit").attr('disabled', true).html(
                "<span> <i class='fa fa-envelope'></i>{{ app()->getLocale() == 'en' ? 'Plaese wait' : 'برجاء الإنتتظار' }} </span>"
            );

            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'json',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    $('.alert-success').css('display', 'block').html(response);
                    $('.alert-danger').css('display', 'none').html("");
                    $('html ,body').animate({
                        scrollTop: $(".page_head").offset().top
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                },
                error: function(jqXHR) {
                    var response = $.parseJSON(jqXHR.responseText);
                    $('.alert-danger').css('display', 'block').html(response);
                    $('.alert-success').css('display', 'none').html("");
                    $('html ,body').animate({
                        scrollTop: $(".page_head").offset().top
                    });
                    form.find(":submit").attr('disabled', false).html(
                        "<span> <i class='fa fa-envelope'></i>{{ app()->getLocale() == 'en' ? 'Send Message' : 'إرسل رسالتك' }} </span>"
                    );
                    setTimeout(function() {
                        $('.alert-danger').css('display', 'none').html("");
                    }, 2000);
                }
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });
            return false;
        });
    </script>
@endpush
