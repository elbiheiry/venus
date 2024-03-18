@extends('site.layouts.master')
@section('content')
    <section class="main_section page_head">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4>{{ app()->getLocale() == 'en' ? 'Partners' : 'الشركاء' }}</h4>
                    <ul>
                        <li>
                            <a href="{{ route('site.index') }}"> {{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسية' }}
                                /
                            </a>
                        </li>
                        <li>{{ app()->getLocale() == 'en' ? 'Partners' : 'الشركاء' }}</li>
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
    <section class="partners inner">
        <div class="container">
            <div class="row text-center" id="load-area">
                @include('site.pages.partners.templates.partners')
            </div>
            <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="500">

                @if ($partners->count() > 0)
                    <button class="link more" data-url="{{ url()->current() }}" id="load-more-button"
                        data-last="{{ $partners->lastPage() }}" data-count="{{ $partners->currentPage() }}">
                        {{ app()->getLocale() == 'en' ? 'Load More' : 'تحميل المزيد' }}
                    </button>
                @endif
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
@endsection
@push('js')
    <script>
        //load more button
        $(document).on('click', '#load-more-button', function() {

            var button = $(this);
            var url = button.data('url');
            var last_page = parseInt($(this).attr('data-last'));
            var counter = parseInt($(this).attr('data-count')) + 1;

            $.ajax({
                url: url,
                method: 'GET',
                data: {
                    page: counter,
                    _token: $('input[name="_token"]').val()
                },
                success: function(response) {
                    button.attr('data-count', counter);
                    if (counter + 1 > last_page) {
                        button.css('display', 'none');
                    }
                    $('#load-area').append(response);

                }
            });
            return false;
        });
    </script>
@endpush
