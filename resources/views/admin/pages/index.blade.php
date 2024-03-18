@extends('admin.layouts.master')
@section('content')
    <div class="page-content">
        <div class="widget">
            <div class="widget-content">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="counter">
                                    <i class="fa fa-envelope"></i>
                                    <div class="counter-cont">
                                        <h3 class="timer"
                                            data-to="{{ \App\Models\Message::where('subject', null)->count() }}"
                                            data-speed="1500">
                                            {{ \App\Models\Message::where('subject', null)->count() }}
                                        </h3>
                                        <div class="count-name">Messages</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="counter">
                                    <i class="fa fa-envelope"></i>
                                    <div class="counter-cont">
                                        <h3 class="timer" data-to="{{ \App\Models\Partner::count() }}"
                                            data-speed="1500">
                                            {{ \App\Models\Partner::count() }}
                                        </h3>
                                        <div class="count-name">Partners</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="counter">
                                    <i class="fa fa-envelope"></i>
                                    <div class="counter-cont">
                                        <h3 class="timer" data-to="{{ \App\Models\Candidate::count() }}"
                                            data-speed="1500">
                                            {{ \App\Models\Candidate::count() }}
                                        </h3>
                                        <div class="count-name">Candidates</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="counter">
                                    <i class="fa fa-envelope"></i>
                                    <div class="counter-cont">
                                        <h3 class="timer" data-to="{{ \App\Models\Brand::count() }}"
                                            data-speed="1500">
                                            {{ \App\Models\Brand::count() }}
                                        </h3>
                                        <div class="count-name">Brands</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="counter">
                                    <i class="fa fa-envelope"></i>
                                    <div class="counter-cont">
                                        <h3 class="timer"
                                            data-to="{{ \App\Models\Message::where('subject', '!=', null)->count() }}"
                                            data-speed="1500">
                                            {{ \App\Models\Message::where('subject', '!=', null)->count() }}
                                        </h3>
                                        <div class="count-name">Brands requests</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
