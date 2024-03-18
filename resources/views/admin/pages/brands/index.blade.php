@extends('admin.layouts.master')
@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-copyright"></i>
        Brands
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">Brands</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <div class="widget" style="display:none;">
            <div class="widget-title">Brands</div>
            <div class="widget-content">
                <form method="post" action="{{ route('admin.brands.store') }}" class="ajax-form">
                    @csrf
                    @method('post')

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>brand logo </label>
                                <div class="uplaod-wrap">
                                    <input type='file' name="logo">
                                    <span class='path'></span>
                                    <span class='button'>Select File</span>
                                </div>
                                <span class="text-danger">Image dimensions should be : 1000 * 1000
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label> brand name (EN) </label>
                                <input type="text" class="form-control" name="name_en" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> brand name (AR) </label>
                                <input type="text" class="form-control" name="name_ar" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> brand brief (EN) </label>
                                <input type="text" class="form-control" name="brief_en" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> brand brief (AR) </label>
                                <input type="text" class="form-control" name="brief_ar" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Email </label>
                                <input type="email" class="form-control" name="email" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Phone number </label>
                                <input type="text" class="form-control" name="phone" />
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="custom-btn" type="submit">
                            Save Change <i class="fa fa-long-arrow-alt-right"></i>
                        </button>
                    </div>
                </form>
            </div>
            <!--End Widget-content-->
        </div>
        <div class="widget">
            <div class="widget-title">
                brands
            </div>
            <div class="widget-content">
                @foreach ($brands as $index => $brand)
                    <div class="slide_item">
                        <img src="{{ get_image($brand->logo, 'brands') }}" />
                        <div class="slide_cont">
                            <span> #{{ $index + 1 }} </span>
                            <h3>{{ $brand->translate('en')->name }}</h3>
                            <p>{{ $brand->translate('en')->brief }}</p>
                            <div class="w-100">

                                <a class="custom-btn"
                                    href="{{ route('admin.brands.slider.index', ['id' => $brand->id]) }}">
                                    <i class="fa fa-image"></i> Slideshow
                                </a>
                                <a class="custom-btn blue-bc"
                                    href="{{ route('admin.brands.story.index', ['id' => $brand->id]) }}">
                                    <i class="fa fa-info"></i> Our story
                                </a>
                                <a class="custom-btn green-bc"
                                    href="{{ route('admin.brands.products.index', ['id' => $brand->id]) }}">
                                    <i class="fa fa-list"></i> products
                                </a>
                                <a class="custom-btn"
                                    href="{{ route('admin.brands.partners.index', ['id' => $brand->id]) }}">
                                    <i class="fa fa-users"></i> partners
                                </a>
                                <a class="custom-btn blue-bc"
                                    href="{{ route('admin.brands.media.index', ['id' => $brand->id]) }}">
                                    <i class="fa fa-image"></i> media
                                </a>
                                <a class="custom-btn green-bc"
                                    href="{{ route('admin.brands.messages.index', ['id' => $brand->id]) }}">
                                    <i class="fa fa-question"></i> Requests
                                </a>
                                <a class="custom-btn"
                                    href="{{ route('admin.brands.links.index', ['id' => $brand->id]) }}">
                                    <i class="fa fa-link"></i> Social links
                                </a>
                                <a class="custom-btn blue-bc"
                                    href="{{ route('admin.brands.edit', ['id' => $brand->id]) }}">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                {{-- <button class="custom-btn red-bc delete-btn"
                                    data-url="{{ route('admin.brands.delete', ['id' => $brand->id]) }}"
                                    style="margin-left:5px;">
                                    <i class="fa fa-trash-alt"></i> Delete
                                </button> --}}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!--End Page content-->
@endsection
