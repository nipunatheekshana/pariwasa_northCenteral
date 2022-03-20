@extends('layouts.app')

@section('head')
<!-- Prism -->
<link rel="stylesheet" href="{{ url('vendors/prism/prism.css') }}" type="text/css">
@endsection

@section('content')

<div class="page-header">
    <div>
        <h3>Dashboard</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Edit Probation Office</h6>
                <form class="needs-validation" id="probation_unit_form">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="txtFullName">Name</label>
                            <input type="hidden" name="id" id="txtid" name="">
                            <input type="text" class="form-control" name="name"  id="name"  placeholder="Probation Office Name"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">District</label>
                            <select class="form-control" name="district" id="district">
                                <option value="" selected disabled>Select District</option>
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Divisional Secretariat</label>
                            <select class="form-control" name="divitional_secretariat" id="divitional_secretariat">
                                <option value=""selected disabled>Select Divisional Secretariat</option>
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Senior Probational Officer</label>
                            <select class="form-control" name="senior_officer" id="senior_officer">
                                <option value=""selected disabled>Select  Probational Officer</option>
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Probation Officer Incharge</label>
                            <select class="form-control"  name="officer_incharge" id="officer_incharge">
                                <option value=""selected disabled>Select Officer Incharge</option>
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>


                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="txtFullName">Address</label>
                            <textarea type="text" class="form-control" name="address"  id="address"   placeholder="Address"  required=""></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Telephone No</label>
                            <input type="text" class="form-control"  name="telepone_no"   id="tp_no" placeholder="0XX XXX XX XX" pattern="[1-9]{1}[0-9]{9}" maxlength="10">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Fax</label>
                            <input type="text" class="form-control" name="fax"  id="fax"  placeholder="0XX XXX XX XX" pattern="[1-9]{1}[0-9]{9}" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Email</label>
                            <input type="text" class="form-control" name="email" id="email"   placeholder="example@example.com">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="txtFullName">Remarks</label>
                            <textarea type="text" class="form-control" name="remarks"  id="remarks"    placeholder="Remarks"></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <button id="btnSave" class="btn btn-primary" type="button">Update</button>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection
@section('script')
<script src="{{ url('assets/js/custom/probationUnits/dashbord.js') }}?random=<?php echo uniqid(); ?>"></script>

@endsection
