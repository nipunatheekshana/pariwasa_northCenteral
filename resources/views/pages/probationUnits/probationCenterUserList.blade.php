@extends('layouts.app')

@section('head')
    <!-- DataTable -->
    <link rel="stylesheet" href="{{ url('vendors/dataTable/datatables.min.css') }}" type="text/css">

@endsection

@section('content')
    <div class="page-header">
        <div>
            <h3>Probation Center Users</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Users</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Probation Center Users</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">List</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Probation Units</h4>
                    <div class="table-responsive">
                        <table id="tblProbationUnitsUser" class="table table-striped table-bordered dataTable dtr-inline collapsed" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr>
                                    <th class="thId">#</th>
                                    <th class="thCenterName">Center Name</th>
                                    <th class="thName"> Name</th>
                                    <th class="thEmail">Email</th>
                                    <th class="actions"> Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('script')
    <!-- DataTable -->
    <script src="{{ url('vendors/dataTable/datatables.min.js') }}"></script>
    <!-- my script  -->
    <script src="{{ url('assets/js/custom/probationUnits/probationCenterUserList.js') }}?random=<?php echo uniqid(); ?>"></script>
@endsection
