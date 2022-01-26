@extends('layouts.app')

@section('head')
    <!-- DataTable -->
    <link rel="stylesheet" href="{{ url('vendors/dataTable/datatables.min.css') }}" type="text/css">

@endsection

@section('content')
    <div class="page-header">
        <div>
            <h3>Children List</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Children</a>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('script')
    <!-- DataTable -->
    <script src="{{ url('vendors/dataTable/datatables.min.js') }}"></script>
    <!-- my script  -->
    <script src="{{ url('assets/js/custom/probationCenters/childrenList.js') }}?random=<?php echo uniqid(); ?>"></script>
@endsection
