@extends('layouts.app')

@section('head')
    <!-- DataTable -->
    <link rel="stylesheet" href="{{ url('vendors/dataTable/datatables.min.css') }}" type="text/css">
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h3>Designation</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Setting</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Designation</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <p class="card-description">  </p>
                    <form class="forms-sample" id="dform">
                        <div class="form-group">
                            <label for="exampleInputName1">Designation</label>
                            <input type="hidden" class="form-control" name="id" id="txtid" placeholder="Site Name">

                            <input type="text" class="form-control" name="name" id="name" placeholder="A grade">
                            <input type="hidden" class="form-control" id="txtID" >
                        </div>
                        <button type="button" id="btnsave" class="btn btn-primary mr-2">Save</button>
                    </form>


                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Designations</h4>
                    <div class="table-responsive">
                        <table id="tblgrade" class="table table-striped table-bordered dataTable dtr-inline collapsed" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr>
                                    <th class="thid"> #</th>
                                    <th class="thname"> Designation</th>
                                    <th class="edit">  Edit</th>
                                    <th class="delete"> Delete</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('script')
    <!-- DataTable -->
    <script src="{{ url('vendors/dataTable/datatables.min.js') }}"></script>

    <script src="{{ url('assets/js/custom/designation.js') }}"></script>



@endsection
