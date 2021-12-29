
@extends('layouts.app')

@section('head')
<!-- Prism -->
<link rel="stylesheet" href="{{ url('vendors/prism/prism.css') }}" type="text/css">
@endsection

@section('content')

<div class="page-header">
    <div>
        <h3>Probation Unit Employee</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Probation Unit Employee</a>
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
                <h6 class="card-title">Create Probation Unit Employee</h6>
                <form class="needs-validation" id="probation_center_form">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="txtFullName">Full Name</label>
                            <input type="hidden" name="id" id="txtid" name="">
                            <input type="text" class="form-control" name="name"  id="name"  placeholder="Pipena kakulu lama niwasaya"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Contact No</label>
                            <input type="text" class="form-control"  name="contact_no"   id="contact_no" placeholder="076 XXX XX XX"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Email</label>
                            <input type="text" class="form-control"  name="email"   id="email" placeholder="Galnaewa"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Gender</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Date of Birth</label>
                            <input type="date" class="form-control"  name="DOB"   id="DOB" placeholder="Galnaewa"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Date of employeement</label>
                            <input type="date" class="form-control"  name="date_of_employeement"   id="date_of_employeement" placeholder="Galnaewa"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Date of employeement at probational unit</label>
                            <input type="date" class="form-control" name="date_of_employeement_at_probational_unit" id="date_of_employeement_at_probational_unit"   placeholder="trust fund"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Basic salary</label>
                            <input type="number" class="form-control"  name="basic_salary"   id="basic_salary" placeholder="Galnaewa"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Incriment date</label>
                            <input type="date" class="form-control"  name="Incriment_date"   id="Incriment_date" placeholder="Galnaewa"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Incriment value</label>
                            <input type="number" class="form-control"  name="incriment_value"   id="incriment_value" placeholder="Galnaewa"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Designation</label>
                            <input type="text" class="form-control" name="designation"  id="designation"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Grade</label>
                            <input type="text" class="form-control"  name="grade"   id="grade" placeholder="076 XXX XX XX"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Working divitional secretariat</label>
                            <input type="number" class="form-control" name="working_divitional_secretariat" id="working_divitional_secretariat"   placeholder="10"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Working police divition</label>
                            <input type="text" class="form-control"  name="working_police_divition"   id="working_police_divition" placeholder="Galnaewa"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>



                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">NIC no</label>
                            <input type="text" class="form-control"name="NIC_no" id="NIC_no"  placeholder="Anuradhapura" required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Pension no</label>
                            <input type="text" class="form-control"  name="pension_no"   id="pension_no" placeholder="Galnaewa"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                    </div>


                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Working equipment</label>
                            <textarea type="text" class="form-control"  name="working_equipment"   id="working_equipment" placeholder="Galnaewa"  required=""></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Education qualifications</label>
                            <textarea type="text" class="form-control"  name="Education_qualifications"   id="Education_qualifications" placeholder="Galnaewa"  required=""></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Other qualification</label>
                            <textarea type="text" class="form-control"  name="other_qualification"   id="other_qualification" placeholder="Galnaewa"  required=""></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Courses falloed by the institute</label>
                            <textarea type="text" class="form-control"  name="courses_falloed_by_the_institute"   id="courses_falloed_by_the_institute" placeholder="Galnaewa"  required=""></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Courses hope to fallow</label>
                            <textarea type="text" class="form-control"  name="courses_hope_to_fallow"   id="courses_hope_to_fallow" placeholder="Galnaewa"  required=""></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Address</label>
                            <textarea type="text" class="form-control"  name="address" id="address" placeholder="Mr.Kabral" required=""></textarea>
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
<script src="{{ url('assets/js/custom/probationUnits/registerProbationUnitEmployee.js') }}"></script>
@endsection
