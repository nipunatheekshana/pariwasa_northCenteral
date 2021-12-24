@extends('layouts.app')

@section('head')
<!-- Prism -->
<link rel="stylesheet" href="{{ url('vendors/prism/prism.css') }}" type="text/css">
@endsection

@section('content')

<div class="page-header">
    <div>
        <h3>Probation Center</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Probation Centers</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Create Probation Center</h6>
                <form class="needs-validation" id="probation_center_form">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="txtFullName">Name</label>
                            <input type="hidden" name="id" id="txtid" name="">
                            <input type="text" class="form-control" name="name"  id="name"  placeholder="Pipena kakulu lama niwasaya"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Date Started</label>
                            <input type="date" class="form-control"  name="date_started" id="date_started" placeholder="Mr.Kabral" required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Registration date</label>
                            <input type="date" class="form-control" name="registration_date"  id="registration_date"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Registration No</label>
                            <input type="text" class="form-control"  name="registration_no"   id="registration_no"  placeholder="Gq-5322"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Catagory</label>
                            <select class="form-control" name="catagory" id="catagory"></select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">District</label>
                            <input type="text" class="form-control" name="district" id="district"  placeholder="Galnewa " required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Divisional secretariat</label>
                            <input type="text" class="form-control"name="divitional_secretariat" id="divitional_secretariat"  placeholder="Anuradhapura" required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Fund</label>
                            <input type="text" class="form-control" name="fund" id="fund"   placeholder="trust fund"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Maximum children capacity</label>
                            <input type="number" class="form-control" name="maximum_children_capacity"  id="maximum_children_capacity"  placeholder="100"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Minimum children capacity</label>
                            <input type="number" class="form-control" name="minimum_children_capacity" id="minimum_children_capacity"   placeholder="10"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Gramaseva divition</label>
                            <input type="text" class="form-control"  name="gramaseva_divition"   id="gramaseva_divition" placeholder="Galnaewa"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Telephone No</label>
                            <input type="text" class="form-control"  name="telepone_no"   id="tp_no" placeholder="076 XXX XX XX"  required="">
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

                    <button id="btnSave" class="btn btn-primary" type="button">Save</button>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection
@section('script')
<script src="{{ url('assets/js/custom/probationUnits/createProbationCenter.js') }}"></script>

@endsection
