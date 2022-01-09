
@extends('layouts.app')

@section('head')
<!-- Prism -->
<link rel="stylesheet" href="{{ url('vendors/prism/prism.css') }}" type="text/css">
<!-- Css -->
<link rel="stylesheet" href="{{url('vendors/lightbox/magnific-popup.css')}}" type="text/css">
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
                    <a href="#">Employees</a>
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
                <h6 class="card-title">Create Probation Unit Employee</h6>
                <a class="image-popup" href="{{asset('uploads/user.jpg')}}">
                    <img src="{{asset('../uploads/user.jpg')}}" id="userImage" class="mb-3" height="200" alt="image">
                </a>
                <form class="needs-validation" id="probation_Unit_employee_form"  enctype="multipart/form-data">

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="txtFullName">Full Name</label>
                            <input type="hidden" name="id" id="txtid" name="">
                            <input type="text" class="form-control" name="name"  id="name"  placeholder="Full Name"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="txtFullName">image</label>
                            <div class="custom-file">
                                <input type="hidden" name="oldimage" id="oldimage">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Contact No</label>
                            <input type="text" class="form-control"  name="contact_no"   id="contact_no" placeholder="0XX XXX XX XX"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Email</label>
                            <input type="text" class="form-control"  name="email"   id="email" placeholder="example@email.com"  required="">
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
                            <input type="date" class="form-control"  name="DOB"   id="DOB"   required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Date of Employeement</label>
                            <input type="date" class="form-control"  name="date_of_employeement"   id="date_of_employeement"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Date of Employeement at probational unit</label>
                            <input type="date" class="form-control" name="date_of_employeement_at_probational_unit" id="date_of_employeement_at_probational_unit"   required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Basic Salary</label>
                            <input type="number" class="form-control"  name="basic_salary" id="basic_salary" placeholder="Basic Salary"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Incriment date</label>
                            <input type="date" class="form-control"  name="Incriment_date"   id="Incriment_date"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Incriment value</label>
                            <input type="number" class="form-control"  name="incriment_value"   id="incriment_value" placeholder="XXXX"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Designation</label>
                            <select class="form-control" name="designation" id="designation">
                                <option value="" selected disabled>Select Designation</option>
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Grade</label>
                            <select class="form-control" name="grade" id="grade">
                                <option value="" selected disabled>Select Grade</option>
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Working Divisional Secretariat</label>
                            <select class="form-control" name="working_divitional_secretariat" id="working_divitional_secretariat">
                                <option value="" selected disabled>Select Divisional Secretariat</option>
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Working Police Division</label>
                            <select class="form-control" name="working_police_divition" id="working_police_divition">
                                <option value="" selected disabled>Select Police Division</option>
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">NIC no</label>
                            <input type="text" class="form-control"name="NIC_no" id="NIC_no"  placeholder="NIC no" required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Pension no</label>
                            <input type="text" class="form-control"  name="pension_no"   id="pension_no" placeholder="Pension no"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Education Qualifications</label>
                            <textarea type="text" class="form-control"  name="Education_qualifications"   id="Education_qualifications" placeholder="Education Qualifications"  required=""></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Other Qualifications</label>
                            <textarea type="text" class="form-control"  name="other_qualification"   id="other_qualification"   required="" placeholder="Other Qualifications"></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Courses followed by the institute</label>
                            <textarea type="text" class="form-control"  name="courses_falloed_by_the_institute"   id="courses_falloed_by_the_institute"  ></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Courses hope to follow</label>
                            <textarea type="text" class="form-control"  name="courses_hope_to_fallow"   id="courses_hope_to_fallow" ></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Working Equipment</label>
                            <textarea type="text" class="form-control"  name="working_equipment"   id="working_equipment" placeholder="Working Equipment"  required=""></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Address</label>
                            <textarea type="text" class="form-control"  name="address" id="address" required="" placeholder="Address"></textarea>
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
<!-- Javascript -->
<script src="{{url('vendors/lightbox/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ url('assets/js/custom/probationUnits/registerProbationUnitEmployee.js') }}"></script>

@endsection
