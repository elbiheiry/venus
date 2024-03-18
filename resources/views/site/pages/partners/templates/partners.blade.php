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
