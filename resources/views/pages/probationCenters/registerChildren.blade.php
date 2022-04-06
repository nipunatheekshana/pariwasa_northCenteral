
@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{ url('assets/js/autocomplete2/css/autocomplete.min.css') }}" type="text/css">

<!-- Prism -->
<link rel="stylesheet" href="{{ url('vendors/prism/prism.css') }}" type="text/css">
<!-- Css -->
<link rel="stylesheet" href="{{url('vendors/lightbox/magnific-popup.css')}}" type="text/css">
<link rel="stylesheet" href="{{ url('assets/css/slider.css') }}" media="all" type="text/css">

@endsection

@section('content')

<div class="page-header">
    <div>
        <h3>Children</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Children</a>
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
                <h6 class="card-title">Register Child Form</h6>
                <a class="image-popup" id="userImagelarge" href="{{url('img/user.jpg') }}">
                    <img src="{{url('img/user.jpg') }}" id="userImage" class="mb-3" height="200" alt="image">
                </a>
                <form class="needs-validation" id="probation_Center_children"  enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="txtFullName">Full Name</label>
                            <input type="hidden" name="id" id="txtid" name="">
                            <input type="text" class="form-control" name="name"  id="name"  placeholder="Full Name"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="txtFullName">Name With Initials</label>
                            <input type="text" class="form-control" name="initials"  id="initials" >
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
                        <div class="col-md-6 mb-3">
                            <label for="txtFullName">Date Of Birth</label>
                            <input type="date" class="form-control" name="Dob"  id="Dob"    required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="txtFullName">Date Registered</label>
                            <input type="date" class="form-control" name="date_entered"  id="date_entered"    required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
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
                        <div class="col-md-4 mb-3">
                            <label for="txtFullName">Nationality</label>
                            <select class="form-control" name="nationality" id="nationality">
                                <option value="sinhala">Sinhala</option>
                                <option value="tamil">Tamil</option>
                                <option value="muslim">Musim</option>
                                <option value="burgher">Burgher</option>
                                <option value="other">Other</option>
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="txtFullName">Relegion</label>
                            <select class="form-control" name="religion" id="religion">
                                <option value="buddhist">Buddhist</option>
                                <option value="hindu">Hindu</option>
                                <option value="catholic">Catholic</option>
                                <option value="muslim">Muslim</option>
                                <option value="other">Other</option>
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Divisional Secretariat</label>
                            <select class="form-control" name="divitional_secretariat" id="divitional_secretariat">
                                <option value="" selected disabled>Select Divisional Secretariat</option>
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Police Devision</label>
                            <input type="hidden" name="police_divition" id="police_divition">
                            <input type="text" class="form-control auto-complete" id="policeDivition" >

                            {{-- <select class="form-control" name="gramaseva_divition" id="gramaseva_divition">
                                <option value=""selected disabled>Select Gramaseva Division</option>
                            </select> --}}
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Gramaseva Division</label>
                            <input type="hidden" name="gramaseva_divition" id="gramaseva_divition">
                            <input type="text" class="form-control auto-complete" id="gramasevaDivition" >

                            {{-- <select class="form-control" name="gramaseva_divition" id="gramaseva_divition">
                                <option value=""selected disabled>Select Gramaseva Division</option>
                            </select> --}}
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="txtFullName">Address</label>
                            <textarea type="text" class="form-control" name="address"  id="address"></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="txtFullName">Transfer address</label>
                            <textarea type="text" class="form-control" name="transfer_address"  id="transfer_address"></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="txtFullName">Birth Certificate</label>
                            <select class="form-control" name="birth_certificate" id="birth_certificate">
                                <option value="no">No</option>
                                <option value="have">Have</option>
                                <option value="in progress">In Progress</option>
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="txtFullName">Helth Status</label>
                            <textarea type="text" class="form-control" name="helth_status"  id="helth_status"></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="txtFullName">Disabilities</label>
                            <textarea type="text" class="form-control" name="disability"  id="disability"></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="txtFullName">How Entered</label>
                            <textarea type="text" class="form-control" name="how_entered"  id="how_entered"></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="txtFullName">Status Before Enter</label>
                            <textarea type="text" class="form-control" name="status_before_enter"  id="status_before_enter"></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="txtFullName">Status After Entered</label>
                            <textarea type="text" class="form-control" name="status_after_entered"  id="status_after_entered"></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="txtFullName">Divition Entered</label>
                            <input type="text" class="form-control" name="Entered_divition"  id="Entered_divition"    required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="txtFullName">Court</label>
                            <input type="text" class="form-control" name="court"  id="court"    required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="txtFullName">Case Number</label>
                            <input type="text" class="form-control" name="case_number"  id="case_number"    required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="txtFullName">Crime Commited</label>
                            <textarea type="text" class="form-control" name="crime_commited"  id="crime_commited"></textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>



                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Parents </label>
                            <label class='switch ml-2'><input type='checkbox' id="hasParents" name="hasParents"><span class='slider round'></span</lable>

                        </div>
                        <div class="col-md-2 mb-3">
                            <button type="button" class="btn btn-primary" id="addParents" >
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Education </label>
                            <label class='switch ml-2'><input type='checkbox' id="hasEducation" name="hasEducation"><span class='slider round'></span</lable>
                        </div>
                        <div class="col-md-2 mb-3">
                            <button type="button" class="btn btn-primary" id="addEducation" >
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>


                    <button id="btnSave" class="btn btn-primary" type="button">Save</button>
            </div>
        </div>
    </div>
</div>

{{-- models --}}

<div class="modal fade" id="parentsModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="settingsAddModalTitle">Parents</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>

            <div class="modal-body" id="settingsAddModalBody">
                <h5 class="modal-title" id="settingsAddModalTitle">Mother's Details</h5>
                <hr>
                <div class="form-row">
                    <div class="col-md-6 mb-2">
                        <label for="txtName">Name</label>
                        <input type="text" class="form-control" id="mothers_name" name="mothers_name" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="txtName">Name With Initials</label>
                        <input type="text" class="form-control" id="mothers_name_initial" name="mothers_name_initial" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-2">
                        <label for="txtName">Date of birth</label>
                        <input type="date" class="form-control" id="mothers_DOB" name="mothers_DOB" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="txtName">Contact No</label>
                        <input type="text" class="form-control" id="mothers_tp_no" name="mothers_tp_no" pattern="[1-9]{1}[0-9]{9}" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-2">
                        <label for="txtName">Job</label>
                        <input type="text" class="form-control" id="mothers_job" name="mothers_job" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="txtFullName">Relegion</label>
                        <select class="form-control" name="mothers_religion" id="mothers_religion">
                            <option value="buddhist">Buddhist</option>
                            <option value="hindu">Hindu</option>
                            <option value="catholic">Catholic</option>
                            <option value="muslim">Muslim</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="col-md-6 mb-2">
                        <label for="txtName">Address</label>
                        <textarea type="date" class="form-control" id="mothers_address" name="mothers_address" ></textarea>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="txtName">Education Qulifications</label>
                        <textarea type="date" class="form-control" id="mothers_education_qulifications" name="mothers_education_qulifications" ></textarea>
                    </div>
                </div>

                <h5 class="modal-title" id="settingsAddModalTitle">Father's Details</h5>
                <hr>

                <div class="form-row">
                    <div class="col-md-6 mb-2">
                        <label for="txtName">Name</label>
                        <input type="text" class="form-control" id="fathers_name" name="fathers_name" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="txtName">Name With Initials</label>
                        <input type="text" class="form-control" id="fathers_name_initial" name="fathers_name_initial" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-2">
                        <label for="txtName">Date of birth</label>
                        <input type="date" class="form-control" id="fathers_DOB" name="fathers_DOB" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="txtName">Contact No</label>
                        <input type="text" class="form-control" id="fathers_tp_no" name="fathers_tp_no"  pattern="[1-9]{1}[0-9]{9}" maxlength="10"oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-2">
                        <label for="txtName">Job</label>
                        <input type="text" class="form-control" id="fathers_job" name="fathers_job" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-2">
                        <label for="txtName">Address</label>
                        <textarea type="date" class="form-control" id="fathers_address" name="fathers_address" ></textarea>
                    </div>

                </div>

                <hr>

                <div class="form-row">
                    <div class="col-md-6 mb-2">
                        <label for="txtName">No Of sibilings</label>
                        <input type="number" class="form-control" id="number_of_siblings" name="number_of_siblings" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="txtFullName">Status Of Marriadge</label>
                        <select class="form-control" name="status_of_marriadge" id="status_of_marriadge">
                            <option value="unmarried">Unmarried</option>
                            <option value="divorsed">Divorsed</option>
                            <option value="married">Married</option>
                            <option value="seperated">Seperated</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-2">
                        <label for="txtName">Parent's Disabilities</label>
                        <textarea type="date" class="form-control" id="disabilities_of_parents" name="disabilities_of_parents" ></textarea>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="educationModel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="settingsAddModalTitle">Education</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body" id="settingsAddModalBody">
                <h5 class="modal-title" id="settingsAddModalTitle">School Education</h5>
                <hr>
                <div class="form-row">
                    <div class="col-md-6 mb-2">
                        <label for="txtName">School name</label>
                        <input type="text" class="form-control" id="school_name" name="school_name" >
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="txtName">Grade</label>
                        <input type="number" class="form-control" id="grade" name="grade" >
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="col-md-6 mb-2">
                        <label for="txtName">Skils</label>
                        <textarea type="date" class="form-control" id="skills" name="skills" ></textarea>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="txtName">Aesthetic Subjects</label>
                        <textarea type="date" class="form-control" id="aesthetics" name="aesthetics" ></textarea>
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="col-md-12 mb-2">
                        <label for="txtName">Extracurricular activities</label>
                        <textarea type="date" class="form-control" id="extra_curiculars" name="extra_curiculars" ></textarea>
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="col-md-6 mb-2">
                        <label for="txtName">Subjects Study</label>
                        <textarea type="date" class="form-control" id="school_subjects" name="school_subjects" ></textarea>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="txtName">Address</label>
                        <textarea type="date" class="form-control" id="school_address" name="school_address" ></textarea>
                    </div>
                </div>

                <h5 class="modal-title" id="settingsAddModalTitle">Deploma Details</h5>
                <hr>

                <div class="form-row">
                    <div class="col-md-6 mb-2">
                        <label for="txtName">Deploma Center Contact No</label>
                        <input type="text" class="form-control" id="diploma_contactNum" name="diploma_contactNum" pattern="[1-9]{1}[0-9]{9}" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>

                </div>
                <div class="form-row mb-4">
                    <div class="col-md-6 mb-2">
                        <label for="txtName">Subjects Study</label>
                        <textarea type="date" class="form-control" id="diploma_subjects" name="diploma_subjects" ></textarea>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="txtName">Higher Education</label>
                        <textarea type="date" class="form-control" id="diploma_higherEducation" name="diploma_higherEducation" ></textarea>
                    </div>
                </div>
                <div class="form-row mb-4">

                    <div class="col-md-12 mb-2">
                        <label for="txtName">Address</label>
                        <textarea type="date" class="form-control" id="diploma_address" name="diploma_address" ></textarea>
                    </div>
                </div>

                <h5 class="modal-title" id="settingsAddModalTitle">University Details</h5>
                <hr>

                <div class="form-row">
                    <div class="col-md-6 mb-2">
                        <label for="txtName">Contact No</label>
                        <input type="text" class="form-control" id="uni_contact_num" name="uni_contact_num" pattern="[1-9]{1}[0-9]{9}" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                    </div>

                </div>
                <div class="form-row mb-4">
                    <div class="col-md-6 mb-2">
                        <label for="txtName">Subjects Study</label>
                        <textarea type="date" class="form-control" id="uni_subjects" name="uni_subjects" ></textarea>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="txtName">Address</label>
                        <textarea type="date" class="form-control" id="uni_address" name="uni_address" ></textarea>
                    </div>

                </div>

                <hr>

                <div class="form-row mb-4">

                    <div class="col-md-12 mb-2">
                        <label for="txtName">Probation Officers FollowUp</label>
                        <textarea type="date" class="form-control" id="probation_officers_followUp" name="probation_officers_followUp" ></textarea>
                    </div>
                </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="{{ url('assets/js/autocomplete2/js/autocomplete.min.js') }}"></script>

<!-- Javascript -->
<script src="{{url('vendors/lightbox/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ url('assets/js/custom/probationCenters/registerChildren.js') }}?random=<?php echo uniqid(); ?>"></script>

@endsection
