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


                {{-- probation office start --}}
                <div class="form-row">
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
                </div>
                {{-- probation office end --}}

                {{-- probation center start --}}
                <div class="form-row">
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
                </div>
                {{-- probation center end --}}

                {{-- gender start --}}
                <div class="form-row">
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
                </div>
                {{-- gender end --}}




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
@section('script')
    <!-- DataTable -->
    <script src="{{ url('vendors/dataTable/datatables.min.js') }}"></script>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

    <!-- my script  -->
    <script src="{{ url('assets/js/custom/admin/filterChildren.js') }}?random=<?php echo uniqid(); ?>"></script>
@endsection
