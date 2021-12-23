@extends('layouts.app')

@section('head')
<!-- Prism -->
<link rel="stylesheet" href="{{ url('vendors/prism/prism.css') }}" type="text/css">
@endsection

@section('content')

<div class="page-header">
    <div>
        <h3>Probation Unit</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Probation Unit</a>
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
                <h6 class="card-title">Create Probation Unit</h6>
                <form class="needs-validation" id="probation_unit_form">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="txtFullName">Name</label>
                            <input type="hidden" name="id" id="txtid" name="">
                            <input type="text" class="form-control" name="name"  id="name"  placeholder="First Probation Unit"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">District</label>
                            <input type="text" class="form-control"  name="district" id="district" placeholder="Anuradhapura" required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Divisional Secretariat</label>
                            <input type="text" class="form-control" name="divitional_secretariat" id="divitional_secretariat"  placeholder="Galnewa " required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Senior Probational officer</label>
                            <input type="text" class="form-control"name="senior_officer" id="senior_officer"  placeholder="Mr.Thilak" required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Probation officer incharge</label>
                            <input type="text" class="form-control"  name="officer_incharge" id="officer_incharge" placeholder="Mr.Kabral" required="">
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
                            <input type="text" class="form-control"  name="telepone_no"   id="tp_no" placeholder="076 XXX XX XX"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Fax</label>
                            <input type="text" class="form-control" name="fax"  id="fax"  placeholder="011 XXX XX XX"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Email</label>
                            <input type="text" class="form-control" name="email" id="email"   placeholder="example@example.com"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="txtFullName">Remarks</label>
                            <textarea type="text" class="form-control" name="remarks"  id="remarks"    placeholder="Remarks"  required=""></textarea>
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
<script src="{{ url('assets/js/custom/admin/register_Probation_unit.js') }}"></script>

@endsection
