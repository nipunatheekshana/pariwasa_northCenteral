@extends('layouts.app')

@section('head')
    <!-- DataTable -->
    <link rel="stylesheet" href="{{ url('vendors/dataTable/datatables.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/css/slider.css') }}" type="text/css">


@endsection

@section('content')

<div class="page-header">
    <div>
        <h3>Filter Childrn</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Filter</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Children</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-2 mb-1">
                            <label class="form-check-label"> Probation office </label>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="switch"><input type="checkbox" id="cbxpboffice" ><span class="slider round"></span></label>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <select class="form-control" name="pboffice" id="pboffice">
                            <option value="">Unspesifide</option>
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div> 
               

                <button class="btn btn-primary" type="button" id="btnReload">Reload</button>

            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Children</h4>
                <div class="table-responsive">
                    <table id="tblChildren" class="table table-striped table-bordered dataTable dtr-inline collapsed" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr>
                                <th class="thId">#</th>
                                <th class="thName"> Name</th>
                                <th class="thGender">Gender</th>
                                <th class="thDOB">Date of Birth</th>
                                <th class="actions"> Actions</th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('script')
    <!-- DataTable -->
    <script src="{{ url('vendors/dataTable/datatables.min.js') }}"></script>

    <!-- my script  -->
    <script src="{{ url('assets/js/custom/admin/filterChildren.js') }}?random=<?php echo uniqid(); ?>"></script>
@endsection
