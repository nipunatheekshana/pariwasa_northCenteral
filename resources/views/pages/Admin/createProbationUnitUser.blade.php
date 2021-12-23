@extends('layouts.app')

@section('head')
<!-- Prism -->
<link rel="stylesheet" href="{{ url('vendors/prism/prism.css') }}" type="text/css">
@endsection

@section('content')

<div class="page-header">
    <div>
        <h3>Probation Unit Users</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Users</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Create Probation Unit Users</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Create Probation Unit Users</h6>
                <form class="needs-validation" id="createUserForm" autocomplete="off">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Select Probation Unit</label>
                            <select class="form-control" name="probationUnitid" id="probationUnitid"></select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Name</label>
                            <input type="hidden" name="userid" id="hiddenuserid">
                            <input type="text" class="form-control"  name="name" id="name" placeholder="@username" >
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Email</label>
                            <input type="email" class="form-control" name="email" id="email"  placeholder="example@email.com " required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Password</label>
                            <input type="password" class="form-control"  name="password" id="Password" placeholder="XXXX" required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"  placeholder="XXX " required="">
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
<script src="{{ url('assets/js/custom/admin/createProbationUnitUser.js') }}"></script>

@endsection
