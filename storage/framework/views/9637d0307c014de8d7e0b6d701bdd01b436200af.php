<?php $__env->startSection('content'); ?>




<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
                <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 m-0">
                        <div class="card-header no-border">
                            <div class="card-title text-xs-center">
                                <div class="p-1">
                                    GROUNDTOUCH
                                </div>
                            </div>
                            <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Admin Login </span></h6>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">
<!--                                <div style="display: none" class="alert alert-danger" id="response"></div>-->
                                <div style="display: none" id='divresponse' role="alert" class="alert alert-danger alert-dismissible">
                                    <button type="button" data-dismiss="alert" aria-label="Close" class="close">
                                        <span aria-hidden="true" class="mdi mdi-close"></span>
                                    </button><span class="icon mdi mdi-close-circle-o"></span>
                                    <span id='response'></span>
                                </div>
                                <form id="loginForm" class="form-horizontal form-simple" >

                                    <input type="hidden" class="form-control form-control-lg input-lg" name="_token" value="<?php echo csrf_token() ?>" />

                                    <fieldset class="form-group position-relative has-icon-left mb-0">
                                        <input type="text" class="form-control form-control-lg input-lg" name="email" placeholder="Your Email" required>
                                        <div class="form-control-position">
                                            <i class="ft-user"></i>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="password" class="form-control form-control-lg input-lg" name="password"  placeholder="Enter Password" required>
                                        <div class="form-control-position">
                                            <i class="fa fa-key"></i>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group row">
                                        <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                                            <fieldset>
                                                <input type="checkbox" id="remember-me" class="chk-remember">
                                                <label for="remember-me"> Remember Me</label>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-xs-12 text-xs-center text-md-right"><a href="recover-password.html" class="card-link">Forgot Password?</a></div>
                                    </fieldset>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block"/>
                                    <i class="ft-unlock"></i> Login</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
////////////////////////////////////////////////////////////////////////////


<?php $__env->stopSection(); ?>

<?php $__env->startSection('loginjs'); ?>

<script type="text/javascript">

    $('#loginForm').on('submit', function (e) {
        e.preventDefault();
        var formData = $(this).serialize();

        console.log(formData);

        $('input:submit').attr("disabled", true);
//
        $.ajax({
            url: "<?php echo e(url('authenticateuser')); ?>",
            type: "POST",
            data: formData,
            success: function (data) {
                console.log('data : ' + data);
                if (data == "0") {
                    window.location = "dashboard";
                } else {
                    $('#response').html("Username and Password mismatch");

                    $('#divresponse').show();
                }

            },
            error: function (jXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });



    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>