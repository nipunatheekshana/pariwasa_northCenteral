
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
                <a class="image-popup" href="{{asset('uploads/user.jpg')}}">
                    <img src="{{asset('/uploads/user.jpg')}}" id="userImage" class="mb-3" height="200" alt="image">
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
                        <div class="col-md-6 mb-3">
                            <label for="txtFullName">Date Of Birth</label>
                            <input type="date" class="form-control" name="Dob"  id="Dob"    required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="txtFullName">Date Entered</label>
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
                            <label for="txtFullName">Helth Statu</label>
                            <textarea type="text" class="form-control" name="helth_status"  id="helth_status"></textarea>
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
                            <label for="txtFullName">Case Number</label>
                            <input type="text" class="form-control" name="case_number"  id="case_number"    required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="txtFullName">Divition Entered</label>
                            <input type="text" class="form-control" name="Entered_divition"  id="Entered_divition"    required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="txtFullName">Court</label>
                            <input type="text" class="form-control" name="court"  id="court"    required="">
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
                        <div class="col-md-12 mb-3">
                            <label for="txtFullName">Crime Commited</label>
                            <textarea type="text" class="form-control" name="crime_commited"  id="crime_commited"></textarea>
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
<script src="{{ url('assets/js/custom/probationCenters/registerChildren.js') }}?random=<?php echo uniqid(); ?>"></script>

@endsection
