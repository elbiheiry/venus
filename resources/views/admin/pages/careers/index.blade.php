@extends('admin.layouts.master')
@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-users"></i>
        Candidates
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">Candidates</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <div class="widget">
            <div class="widget-title">
                <div class="alert-text">You have {{ \App\Models\Candidate::count() }} Message
                </div>
            </div>
            <!--End Widget Title-->
            <div class="widget-content">
                <div class="row">
                    <div class="col" id="load-area">
                        @include('admin.pages.careers.templates.candidates')
                    </div>
                    <!--End Item List-->
                    <div class="w-100"></div>
                    @if ($candidates->count() > 0)
                        <button class="custom-btn" data-url="{{ url()->current() }}" id="load-more-button"
                            data-last="{{ $candidates->lastPage() }}" data-count="{{ $candidates->currentPage() }}">
                            Load More
                        </button>
                    @endif

                </div>
            </div>
            <!--End Widget-content-->
        </div>
        <!--End Widget-->
    </div>
@endsection
