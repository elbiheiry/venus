@extends('admin.layouts.master')
@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-info"></i>
        Our story
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">Our story</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <form class="ajax-form" method="put" action="{{ route('admin.brands.story.update', ['id' => $id]) }}">
            @csrf
            @method('put')
            <div class="widget">
                <div class="widget-content">
                    <div class="row ">
                        @if ($brand->story)
                            <div class="col-md-6">
                                <img src="{{ get_image($story->image, 'brands') }}" style="width : 100px !important">
                            </div>
                        @endif

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image </label>
                                <div class="upload_input">
                                    <input class="form-control" type="file" name="image">
                                    <span>Select Photo</span>
                                </div>
                            </div>
                            <span class="text-danger">Please note that image dimensions should be : 1040 * 990
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Our Story (EN) </label>
                                <textarea class="form-control"
                                    name="description_en">{{ $brand->story ? $story->translate('en')->description : '' }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Our Story (AR) </label>
                                <textarea class="form-control"
                                    name="description_ar">{{ $brand->story ? $story->translate('ar')->description : '' }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Our mission (EN) </label>
                                <textarea class="form-control"
                                    name="mission_en">{{ $brand->story ? $story->translate('en')->mission : '' }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Our mission (AR) </label>
                                <textarea class="form-control"
                                    name="mission_ar">{{ $brand->story ? $story->translate('ar')->mission : '' }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Our values (EN) </label>
                                <textarea class="form-control"
                                    name="values_en">{{ $brand->story ? $story->translate('en')->values : '' }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Our values (AR) </label>
                                <textarea class="form-control"
                                    name="values_ar">{{ $brand->story ? $story->translate('ar')->values : '' }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Our vision (EN) </label>
                                <textarea class="form-control"
                                    name="vision_en">{{ $brand->story ? $story->translate('en')->vision : '' }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Our vision (AR) </label>
                                <textarea class="form-control"
                                    name="vision_ar">{{ $brand->story ? $story->translate('ar')->vision : '' }}</textarea>
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
