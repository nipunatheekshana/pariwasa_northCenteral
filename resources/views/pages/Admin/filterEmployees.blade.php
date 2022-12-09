@extends('layouts.app')

@section('head')
    <!-- DataTable -->
    <link rel="stylesheet" href="{{ url('vendors/dataTable/datatables.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/css/slider.css') }}" type="text/css">
@endsection

@section('content')
    <div class="page-header">
        <div>
            <h3>Filter Employees</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Filter</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Employees</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">


                    {{-- probation office start --}}
                    {{-- <div class="form-row">
                    <div class="col-md-2 mb-1">
                            <label class="form-check-label"> Probation Office </label>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="switch"><input type="checkbox" id="cbxpbOffice" ><span class="slider round"></span></label>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <select class="form-control" name="pbOffice" id="pbOffice">
                            <option value="">Unspesifide</option>
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div> --}}
                    {{-- probation office end --}}

                    {{-- probation center start --}}
                    {{-- <div class="form-row">
                    <div class="col-md-2 mb-1">
                            <label class="form-check-label"> Child Care Center </label>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="switch"><input type="checkbox" id="cbxpbCenter" ><span class="slider round"></span></label>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <select class="form-control" name="pbCenter" id="pbCenter">
                            <option value="">Unspesifide</option>
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div> --}}
                    {{-- probation center end --}}

                    {{-- gender start --}}
                    {{-- <div class="form-row">
                    <div class="col-md-2 mb-1">
                            <label class="form-check-label"> Child Care Center </label>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="switch"><input type="checkbox" id="cbxGender" ><span class="slider round"></span></label>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <select class="form-control" name="gender" id="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div> --}}
                    {{-- gender end --}}



                    {{--
                <button class="btn btn-primary" type="button" id="btnReload">Reload</button>

            </div>
        </div>

    </div>
</div> --}}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Employees</h4>
                                    <div class="table-responsive">
                                        <table id="tblProbationunitEmployee" class="table table-striped table-bordered Date display nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="thId">#</th>
                                                    <th class="thName"> Name</th>
                                                    <th class="thTpNo">Telephone</th>
                                                    <th class="thdesig">Designation</th>
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
                @section('script')
                    <!-- DataTable -->
                    <script src="{{ url('vendors/dataTable/datatables.min.js') }}"></script>
                    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

                    <!-- my script  -->
                    <script src="{{ url('assets/js/custom/admin/filterEmployees.js') }}?random=<?php echo uniqid(); ?>"></script>
                @endsection
