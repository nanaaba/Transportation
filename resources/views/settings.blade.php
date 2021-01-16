@extends('layouts.master')

@section('content')

<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-2">
                <h3 class="content-header-title mb-0">Colors</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Configuration</a>
                            </li>
                            <li class="breadcrumb-item active">Colors
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body">
            <button type="button" class="btn btn-primary"onclick="runback()" >Run Backup</button>

        </div>
    </div>
</div>





<!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
@section('userjs')

<script type="text/javascript">

    function runback() {
        $.ajax({
            url: "{{url('runbackup')}}",
            type: "GET",
            success: function (data) {
                console.log('server data :' + data);
                


            }, error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }

        });
    }


</script>

@endsection
