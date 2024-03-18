@extends('site.layouts.master')
@section('content')
    <section class="main_section page_head">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4>{{ app()->getLocale() == 'en' ? 'Careers' : 'الوظائف' }}</h4>
                    <ul>
                        <li>
                            <a href="{{ route('site.index') }}"> {{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسية' }} /
                            </a>
                        </li>
                        <li>{{ app()->getLocale() == 'en' ? 'Careers' : 'الوظائف' }}</li>
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
    <!-- Career ==========================================-->
    <section class="career">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="50">
                    <div class="section_title mb-0">
                        <h3>{{ app()->getLocale() == 'en' ? 'Join us' : 'إنضم الينا' }}</h3>
                        {!! $content->translate(app()->getLocale())->description !!}
                    </div>
                </div>
                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
                    <div class="alert alert-success" role="alert" style="display:none;">

                    </div>
                    <div class="alert alert-danger" role="alert" style="display:none;">

                    </div>
                    <form class="job_form" action="{{ route('site.career') }}" method="post">
                        @csrf
                        @method('post')
                        <div class="form_title">{{ app()->getLocale() == 'en' ? 'Apply For Job' : 'تقدم للوظيفه' }}
                        </div>
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
                            <label> Department </label>
                            <select class="form-control" name="department">
                                <option value="0">{{ app()->getLocale() == 'en' ? 'Choose' : 'إختر' }}</option>
                                <option value="management">{{ app()->getLocale() == 'en' ? 'management' : 'الإداره' }}
                                </option>
                                <option value="Sales">{{ app()->getLocale() == 'en' ? 'Sales' : 'المبيعات' }}</option>
                                <option value="HR">{{ app()->getLocale() == 'en' ? 'HR' : 'الموارد البشريه' }}</option>
                                <option value="Accounting">{{ app()->getLocale() == 'en' ? 'Accounting' : 'محاسب' }}
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label> {{ app()->getLocale() == 'en' ? 'CV' : 'السيرة الذاتية' }} </label>
                            <input type="file" name="cv" />
                        </div>
                        <!--End Form Group-->
                        <button class="link" type="submit">
                            <span> {{ app()->getLocale() == 'en' ? 'Apply Now' : 'تقدم الان' }} <i
                                    class="fa fa-angle-right"></i> </span>
                        </button>
                    </form>
                </div>
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
@endsection
@push('js')
    <script>
        //submit form using ajax
        $(document).on('submit', '.job_form', function() {
            var form = $(this);
            var url = form.attr('action');
            var formData = new FormData(form[0]);
            form.find(":submit").attr('disabled', true).html(
                "{{ app()->getLocale() == 'en' ? 'Please wait' : 'برجاء الإنتظار' }} <i class='fa fa-long-arrow-alt-right'></i>"
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
                        "{{ app()->getLocale() == 'en' ? 'Apply Now' : 'تقدم الان' }} <i class='fa fa-long-arrow-alt-right'></i>"
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
