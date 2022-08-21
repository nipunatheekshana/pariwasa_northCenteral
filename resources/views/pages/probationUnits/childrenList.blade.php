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
                        <table id="tblChildren" class="table table-striped table-bordered dataTable dtr-inline collapsed"
                            role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr>
                                    <th class="thId">#</th>
                                    <th class="thName"> Name</th>
                                    <th class="thGender">Gender</th>
                                    <th class="thnationality">Nationality</th>
                                    <th class="threligion">Religion</th>
                                    <th class="thhelth_status">Helth Status</th>
                                    <th class="thhow_entered">How Entered</th>
                                    <th class="thcase_number">Case Number</th>
                                    <th class="thEntered_divition">entered Divition</th>
                                    <th class="thcrime_commited">\Crime commited</th>
                                    <th class="thdate_entered">Date entered</th>
                                    <th class="thstatus_before_enter">Status before enter</th>
                                    <th class="thstatus_after_enter">Status after enter</th>
                                    <th class="thdivitional_secretariat">Divitional secretariat</th>
                                    <th class="thpoliceDivition">PoliceDivition</th>
                                    <th class="thgramaseva_divition">Gramaseva divition</th>
                                    <th class="thaddress">Address</th>
                                    <th class="thtransfer_address">Transfer address</th>
                                    <th class="thcourt">Court</th>
                                    <th class="thdisability">Disability</th>
                                    <th class="thbirth_certificate">Birth certificate</th>
                                    <th class="thDOB">DOB</th>
                                    <th class="actions"> Actions</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<button id="btnexpt" type="button" class="btn btn-primary mr-2">Export</button>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('script')
    <!-- DataTable -->
    <script src="{{ url('vendors/dataTable/datatables.min.js') }}"></script>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

    <!-- my script  -->
    <script src="{{ url('assets/js/custom/probationUnits/childrenList.js') }}?random=<?php echo uniqid(); ?>"></script>
@endsection
