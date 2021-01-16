@extends('layouts.master')

@section('content')

<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-2">
                <h3 class="content-header-title mb-0">Roles And Permissions</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-xs-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Account</a>
                            </li>
                            <li class="breadcrumb-item active">Roles And Permissions
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body"><!-- DOM - jQuery events table -->








            <section id="file-export">



                <div class="row">
                    <div class="col-xs-12">
                        <div class="card">

                            <div class="card-body collapse in">


                                <?php
                                $data = json_decode($usergroups);
                                $allpermissions = json_decode($permissions);
                                ?>

                                <form id="assignPermissionsForm">


                                    {{ csrf_field() }}


                                    <div class="card-block card-dashboard">
                                        <div class="form-group col-md-6">
                                            <label for="region" class="control-label">UserGroup</label>
                                            <select class="form-control select2" id="userGroup" name="usergroup" style="width: 100%">
                                                <option value="">Select  ---</option>
                                                @foreach($data as $single)
                                                <option value="{{$single->id}}">{{$single->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="pull-right">
                                                    <a class="btn btn-primary "href="#" id="assign_all" >Assign All</a>

                                                </div>

                                            </div>

                                        </div>

                                        <table class="table table-striped table-bordered ">
                                            <thead>
                                                <tr>
                                                    <th>Permissions</th> 

                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($allpermissions as $single)

                                                <tr>
                                                    <td>{{$single->perm_keyword }}</td>
                                                    <td><input type="checkbox" name="permissions[]" value="{{$single->perm_keyword }}"/></td></tr>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>

                                        <div class="col-xs-12 ">
                                            <div class="pull-right">
                                                <button class="btn btn-primary  btn-block pull-right"  type="submit">Save</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- File export table -->

        </div>
    </div>
</div>




<!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
@section('userjs')

<script type="text/javascript" >

    $('#assign_all').click(function () {

        $('tbody tr td input[type="checkbox"]').each(function () {
            $(this).prop('checked', true);
        });

    });


    $("#userGroup").change(function () {

        $('input:checkbox').prop('checked', false);
        var userGroup = this.value;
        getGroupPermissions(userGroup);
    });

//saveusergrouppermissions
    function getGroupPermissions(usergroup) {

        $.ajax({
            url: 'getusergrouppermissions/' + usergroup,
            type: "GET",
            dataType: "json",
            success: function (response) {

                console.log('responseis ' + response);


                $.each(response, function (counter, val) {
                    console.log('perm code is:' + val.perm_keyword);
                    $("input[value='" + val.perm_keyword + "']").prop('checked', true);
                });


            },
            error: function (jXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });

    }


    $('#assignPermissionsForm').on('submit', function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        console.log(formData);



        swal({
            title: "Are you sure?",
            text: "You want to save  permissions",
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true
        }, function () {
            //  setTimeout(function () {
            $('#loaderModal').modal('show');

            $.ajax({
                url: '{{url("account/saveusergrouppermissions")}}',
                type: "POST",
                data: formData,
                success: function (data) {
                    $('#loaderModal').modal('hide');
                    console.log('server data :' + data);
                    if (data == 0) {

                        swal("Success", "Information saved successfully", 'success');
                    }
                    if (data == 1) {
                        swal('Error', "Contact System Administrator", 'error');
                    }
                }
            });


            //}, 2000);
        });



////function refreshPage() { location.reload(); }
////    // console.log(JSON.stringify(jsonObj));


    });



</script>
@endsection
