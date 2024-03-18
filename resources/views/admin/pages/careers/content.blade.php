@extends('admin.layouts.master')
@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-info"></i>
        Careers content
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">Careers content</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <form class="ajax-form" method="put" action="{{ route('admin.careers.content.update') }}">
            @csrf
            @method('put')
            <div class="widget">
                <div class="widget-content">
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="{{ get_image($content->image, 'content') }}" width="200">
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Image </label>
                                <div class="uplaod-wrap">
                                    <input type='file' name="image">
                                    <span class='path'></span>
                                    <span class='button'>Select File</span>
                                </div>
                            </div>
                            <span class="text-danger">Please note that image dimensions should be : 540 * 440
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Description (EN) </label>
                                <textarea class="form-control tiny-editor"
                                    name="description_en">{{ $content->translate('en')->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Description (AR) </label>
                                <textarea class="form-control tiny-editor"
                                    name="description_ar">{{ $content->translate('ar')->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <button class="custom-btn" type="submit">
                        Save Change <i class="fa fa-long-arrow-alt-right"></i>
                    </button>
                    <!--End Form Group-->
                </div>
            </div>

        </form>
        <!--End Form-->
    </div>
    <!--End Page Content-->
@endsection
