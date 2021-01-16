@extends('layouts.master')

@section('content')

<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-2">
                <h3 class="content-header-title mb-0">Companies</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Companies</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">All</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body"><!-- Base style table -->

            <!-- Bootstrap 3 table -->
            <section id="bootstrap3">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>

                            </div>
                            <div class="card-body collapse in">
                                <div class="card-block card-dashboard table-responsive">

                                    <table id="companiesTbl" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                
                                                <th>Address1
                                                </th>
                                                <th>Postal Address 1</th>
                                                <th>Fax</th>
                                                <th>Business Phone</th>
                                                <th>Contact Name</th>
                                                <th>Country</th>
                                                <th>City</th>
                                                <th>Created By</th>
                                                <th>Date Created</th>
                                                <th>Last Updated</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>				
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Bootstrap 3 table -->
        </div>
    </div>
</div>

@endsection
@section('userjs')
<script src="{{ asset('js/allcompanies.js')}}" type="text/javascript"></script>


@endsection
