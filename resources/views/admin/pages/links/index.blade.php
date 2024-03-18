@extends('admin.layouts.master')
@push('modals')
    <div class="modal fade" id="common-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog " role="document" id="edit-area">

        </div>
    </div>
@endpush
@section('content')
    <div class="page-head">
        <i class="fa fa-link"></i> Social links
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i>Dashboard</a></li>
            <li class="active"> Social links </li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <div class="widget">
            <div class="widget-content">
                <form class="row ajax-form" action="{{ route('admin.links.store') }}" method="post">
                    @csrf
                    <div class="col-6">
                        <div class="form-group">
                            <label> Name </label>
                            <input type="text" class="form-control" name="name" placeholder="ex:facebook" />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label> Icon </label>
                            <input type="text" class="form-control" name="icon" />
                            <span class="text-danger">
                                Please click on this link to get your prefferd icon <a
                                    href="https://fontawesome.com/icons?d=gallery"> Click here </a>
                            </span>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label> Link </label>
                            <input type="text" class="form-control" name="link" />
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 form-group text-center">
                        <button class="custom-btn green-bc" type="submit">
                            <i class="fa fa-plus"></i> Save change
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="widget">
            <div class="widget-title">
                Social links
            </div>
            <!--End Widget Title-->
            <div class="widget-content">
                <div class="row">
                    <div class="col">
                        <div class="table-responsive-lg">
                            <table class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Icon</th>
                                        <th>Link</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $x = 1;
                                    @endphp
                                    @foreach ($links as $index => $link)
                                        <tr>
                                            <td>{{ $x }}</td>
                                            <td>{!! $link->icon !!}</td>
                                            <td>{{ $link->link }}</td>
                                            <td>
                                                <button class="custom-btn btn-modal-view"
                                                    data-url="{{ route('admin.links.edit', ['id' => $link->id]) }}">
                                                    <i class="fa fa-edit"></i> Edit
                                                </button>
                                                <button class="custom-btn red-bc delete-btn"
                                                    data-url="{{ route('admin.links.delete', ['id' => $link->id]) }}">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </td>
                                        </tr>
                                        @php
                                            $x++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Widget-content-->
        </div>
        <!--End widget-->
    </div>
    <!--End Page content-->
@endsection
