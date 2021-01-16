<?php
$permissions = Session::get('permissions');
?>
<div class="nav_profile">
    <div class="media profile-left">
        <a class="pull-left profile-thumb" href="javascript:void(0)">
            <img src="<?php echo e(asset('img/authors/avatar1.jpg')); ?>" class="rounded-circle" alt="User Image">
        </a>
        <div class="content-profile">
            <h4 class="media-heading">
                Welcome, <?php echo e(Session::get('name')); ?>

            </h4>
            <ul class="icon-list">
                <li>
                    <a href="<?php echo e(url('users')); ?>" title="user">
                        <i class="fa fa-fw ti-user"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('logout')); ?>" title="lock">
                        <i class="fa fa-fw ti-lock"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('changepassword')); ?>" title="settings">
                        <i class="fa fa-fw ti-settings"></i>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>


<ul class="navigation slimmenu" id="navigation">


    <li  class="<?php echo e(Request::is('dashboard') ? 'active' : ''); ?>">
        <a href="<?php echo e(url('dashboard')); ?>">
            <i class="menu-icon ti-desktop"></i>
            <span class="mm-text ">Dashboard </span>
        </a>
    </li>
    <!--    <li class="<?php echo e(Request::is('configuration/colors') ? 'active' : ''); ?>">
            <a href="<?php echo e(url('configuration/colors')); ?>" >
                <span class="mm-text ">Colors</span>
    
            </a>
        </li>-->
    <?php
    if (in_array("VIEW_VEHICLES", $permissions)) {
        ?>

        <li class="menu-dropdown <?php echo e(Request::is('vehicle*') ? 'active' : ''); ?>">
            <a href="#">
                <i class="menu-icon ti-widget"></i>
                <span>Vehicles</span>
                <span class="fa arrow"></span>
            </a>

            <ul class="sub-menu">
                <?php
                if (in_array("ADD_VEHICLE", $permissions)) {
                    ?> 
                    <li class="<?php echo e(Request::is('vehicle/new') ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('vehicle/new')); ?>" >New Vehicle</a>
                    </li>
                    <?php
                }
                ?> 
                <li class="<?php echo e(Request::is('vehicle/all') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('vehicle/all')); ?>" > All Vehicles</a>
                </li>
                <li class="<?php echo e(Request::is('vehicle/insurance') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('vehicle/insurance')); ?>" > Insurance</a>
                </li>
                <li class="<?php echo e(Request::is('vehicle/maintenance') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('vehicle/maintenance')); ?>" >Maintenance</a>
                </li>
                <li class="<?php echo e(Request::is('vehicle/repairs') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('vehicle/repairs')); ?>" >Fixing/Repairs</a>
                </li>
                <li class="<?php echo e(Request::is('vehicle/expenses') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('vehicle/expenses')); ?>" >General Expenses</a>
                </li>
            </ul>
        </li>

        <li class="menu-dropdown <?php echo e(Request::is('revenue*') ? 'active' : ''); ?>">
            <a href="#">
                <i class="menu-icon ti-widget"></i>
                <span>Revenue</span>
                <span class="fa arrow"></span>
            </a>

            <ul class="sub-menu">
             
                    <li class="<?php echo e(Request::is('revenue/new') ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('revenue/new')); ?>" >New Revenue</a>
                    </li>
               
                <li class="<?php echo e(Request::is('revenue/all') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('revenue/all')); ?>" >Revenues</a>
                </li>
              
            </ul>
        </li>

        <li class="menu-dropdown <?php echo e(Request::is('driver*') ? 'active' : ''); ?>">
            <a href="#">
                <i class="menu-icon ti-widget"></i>
                <span>Drivers</span>
                <span class="fa arrow"></span>
            </a>

            <ul class="sub-menu">


                <li class="<?php echo e(Request::is('driver/new') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('driver/new')); ?>" >New Driver</a>
                </li>
                <li class="<?php echo e(Request::is('driver/all') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('driver/all')); ?>" > All Drivers</a>
                </li>

                <li class="<?php echo e(Request::is('driver/assignment') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('driver/assignment')); ?>" >  Assignment</a>
                </li>



            </ul>
        </li>
        <?php
    }

    if (in_array("VIEW_REPORTS", $permissions)) {
        ?>
        <li class="menu-dropdown <?php echo e(Request::is('report*') ? 'active' : ''); ?>">
            <a href="#">
                <i class="menu-icon ti-widget"></i>
                <span>Reports</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu">


                <li class="<?php echo e(Request::is('report/cumulativeinflows') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('report/cumulativeinflows')); ?>" >Cumulative Inflows</a>
                </li>
                <li class="<?php echo e(Request::is('report/cumulativemaintenance') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('report/cumulativemaintenance')); ?>" >Cumulative Maintenance</a>
                </li>
                <li class="<?php echo e(Request::is('report/inflows') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('report/inflows')); ?>" > Inflows</a>
                </li>
                <li class="<?php echo e(Request::is('report/maintenance') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('report/maintenance')); ?>" > Maintenance</a>
                </li>
                <li class="<?php echo e(Request::is('report/insurances') ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('report/insurances')); ?>" > Insurances</a>
                </li>
            </ul>
        </li>
        <?php
    }
    if (in_array("VIEW_ACCOUNT_MODULE", $permissions)) {
        ?>

        <li class="menu-dropdown <?php echo e(Request::is('account*') ? 'active' : ''); ?>">
            <a href="#">
                <i class="menu-icon ti-widget"></i>
                <span>Account</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu">
                <?php
                if (in_array("VIEW_USERGROUPS", $permissions)) {
                    ?>
                    <li class="<?php echo e(Request::is('account/usergroups') ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('account/usergroups')); ?>" >User Groups</a>
                    </li>
                    <?php
                }
                if (in_array("ASSIGN_PERMISSIONS", $permissions)) {
                    ?>
                    <li class="<?php echo e(Request::is('account/assignpermissions') ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('account/assignpermissions')); ?>" >Assign Permissions</a>
                    </li>
                    <?php
                }
                if (in_array("meko", $permissions)) {
                    ?>
                    <li class="<?php echo e(Request::is('account/users') ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('account/users')); ?>" > Users</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </li>
        <?php
    }
    ?>




</ul>
