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
        <div class="widget">
            <div class="widget-title">Brands</div>
            <div class="widget-content">
                <form method="put" action="{{ route('admin.brands.update', ['id' => $brand->id]) }}"
                    class="ajax-form">
                    @csrf
                    @method('put')

                    <div class="row">
                        <div class="col-sm-6">
                            <img src="{{ get_image($brand->logo, 'brands') }}" width="200">
                        </div>
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
                                <input type="text" class="form-control" name="name_en"
                                    value="{{ $brand->translate('en')->name }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> brand name (AR) </label>
                                <input type="text" class="form-control" name="name_ar"
                                    value="{{ $brand->translate('ar')->name }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> brand brief (EN) </label>
                                <input type="text" class="form-control" name="brief_en"
                                    value="{{ $brand->translate('en')->brief }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> brand brief (AR) </label>
                                <input type="text" class="form-control" name="brief_ar"
                                    value="{{ $brand->translate('ar')->brief }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Email </label>
                                <input type="email" class="form-control" name="email" value="{{ $brand->email }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Phone number </label>
                                <input type="text" class="form-control" name="phone" value="{{ $brand->phone }}" />
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
    </div>
    <!--End Page content-->
@endsection
