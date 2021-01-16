

<?php
$permissions = Session::get('permissions');
?>
<!-- Left side column. contains the logo and sidebar -->

<div data-scroll-to-active="true" class="main-menu menu-fixed menu-light menu-accordion menu-shadow">
    <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            <li class=" navigation-header"><span>General</span><i data-toggle="tooltip" data-placement="right" data-original-title="General" class=" ft-minus"></i>
            </li>


            <li class="nav-item <?php echo e(Request::is('dashboard') ? 'active' : ''); ?>">
                <a href="<?php echo e(url('dashboard')); ?>"><i class="ft-airplay"></i><span data-i18n="" class="menu-title">Dashboard</span></a>
            </li>
            <?php
            if (in_array("VIEW_CONFIGURATION", $permissions)) {
                ?> 
                <li class=" nav-item <?php echo e(Request::is('configuration*') ? 'active' : ''); ?>"><a href="#"><i class="ft-share"></i><span data-i18n="" class="menu-title">Configurations</span></a>
                    <ul class="menu-content">
                        <?php
                        if (in_array("VIEW_COLORS", $permissions)) {
                            ?> 
                            <li class="<?php echo e(Request::is('configuration/colors') ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('configuration/colors')); ?>" class="menu-item">Colors</a>
                            </li>
                            <?php
                        }
                        if (in_array("VIEW_FUELTYPES", $permissions)) {
                            ?> 
                            <li class="<?php echo e(Request::is('configuration/fueltypes') ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('configuration/fueltypes')); ?>" class="menu-item">Fuel Types</a>
                            </li>
                            <?php
                        }
                        if (in_array("VIEW_CARMODELS", $permissions)) {
                            ?> 
                            <li class="<?php echo e(Request::is('configuration/carmodels') ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('configuration/carmodels')); ?>" class="menu-item">Car Models</a>
                            </li>
                            <?php
                        }
                        if (in_array("VIEW_MODELYEAR", $permissions)) {
                            ?> 
                            <li class="<?php echo e(Request::is('configuration/modelyear') ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('configuration/modelyear')); ?>" class="menu-item">Model Year</a>
                            </li>
                            <?php
                        }
                        if (in_array("VIEW_REALATIONSHIP", $permissions)) {
                            ?> 
                            <li class="<?php echo e(Request::is('configuration/relationship') ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('configuration/relationship')); ?>" class="menu-item">Relationship </a>
                            </li>
                            <?php
                        }
                        if (in_array("VIEW_BANKS", $permissions)) {
                            ?> 

                            <li class="<?php echo e(Request::is('configuration/banks') ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('configuration/banks')); ?>" class="menu-item">Banks </a>
                            </li>
                            <?php
                        }
                        ?> 
                    </ul>
                </li>
                <?php
            }
            if (in_array("VIEW_VEHICLES", $permissions)) {
                ?>
                <li class=" nav-item <?php echo e(Request::is('vehicle*') ? 'active' : ''); ?>"><a href="#"><i class="ft-share"></i><span data-i18n="" class="menu-title">Vehicles</span></a>
                    <ul class="menu-content">
                        <?php
                        if (in_array("ADD_VEHICLE", $permissions)) {
                            ?> 
                            <li class="<?php echo e(Request::is('vehicle/new') ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('vehicle/new')); ?>" class="menu-item">New Vehicle</a>
                            </li>
                            <?php
                        }
                        ?> 
                        <li class="<?php echo e(Request::is('vehicle/all') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('vehicle/all')); ?>" class="menu-item"> All Vehicles</a>
                        </li>

                    </ul>
                </li>
                <?php
            }
            if (in_array("VIEW_DRIVERS", $permissions)) {
                ?>

                <li class=" nav-item <?php echo e(Request::is('drivers*') ? 'active' : ''); ?>"><a href="#"><i class="ft-share"></i><span data-i18n="" class="menu-title">Drivers</span></a>
                    <ul class="menu-content">

                        <?php
                        if (in_array("ADD_DRIVER", $permissions)) {
                            ?>
                            <li class="<?php echo e(Request::is('drivers/new') ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('drivers/new')); ?>" class="menu-item">New Driver</a>
                            </li>
                            <?php
                        }
                        if (in_array("ASSIGN_DRIVER", $permissions)) {
                            ?>
                            <li class="<?php echo e(Request::is('drivers/assigned') ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('drivers/assigned')); ?>" class="menu-item">Assigned Driver</a>
                            </li>
                            <?php
                        }
                        ?>
                        <li class="<?php echo e(Request::is('drivers/all') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('drivers/all')); ?>" class="menu-item"> All Drivers</a>
                        </li>

                    </ul>
                </li>
                <?php
            }
            if (in_array("VIEW_PAYMENTS", $permissions)) {
                ?>

                <li class=" nav-item <?php echo e(Request::is('banking*') ? 'active' : ''); ?>"><a href="#"><i class="ft-share"></i><span data-i18n="" class="menu-title">Banking</span></a>
                    <ul class="menu-content">
                        <?php
                        if (in_array("CLEAR_PAYMENTS", $permissions)) {
                            ?>
                            <li class="<?php echo e(Request::is('banking/clearpayments') ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('banking/clearpayments')); ?>" class="menu-item">Clear Payments</a>
                            </li>
                            <?php
                        }
                        if (in_array("VIEW_PAYMENTS", $permissions)) {
                            ?>

                            <li class="<?php echo e(Request::is('banking/viewclearedpayments') ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('banking/viewclearedpayments')); ?>" class="menu-item">View Payments</a>
                            </li>

                            <?php
                        }
                        ?>
                    </ul>
                </li>
                <?php
            }
            if (in_array("VIEW_REPORTS", $permissions)) {
                ?>



                <li class=" nav-item <?php echo e(Request::is('report*') ? 'active' : ''); ?>"><a href="#"><i class="ft-share"></i>
                        <span data-i18n="" class="menu-title">Reports</span></a>
                    <ul class="menu-content">


                        <li class="<?php echo e(Request::is('report/cumulativeinflows') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('report/cumulativeinflows')); ?>" class="menu-item">Cumulative Inflows</a>
                        </li>
                        <li class="<?php echo e(Request::is('report/cumulativemaintenance') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('report/cumulativemaintenance')); ?>" class="menu-item">Cumulative Maintenance</a>
                        </li>
                        <li class="<?php echo e(Request::is('report/inflows') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('report/inflows')); ?>" class="menu-item"> Inflows</a>
                        </li>
                        <li class="<?php echo e(Request::is('report/maintenance') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('report/maintenance')); ?>" class="menu-item"> Maintenance</a>
                        </li>
                        <li class="<?php echo e(Request::is('report/insurances') ? 'active' : ''); ?>">
                            <a href="<?php echo e(url('report/insurances')); ?>" class="menu-item"> Insurances</a>
                        </li>
                    </ul>
                </li>
                <?php
            }
            if (in_array("VIEW_ACCOUNT_MODULE", $permissions)) {
                ?>

                <li class=" nav-item <?php echo e(Request::is('account*') ? 'active' : ''); ?>"><a href="#"><i class="ft-share"></i>
                        <span data-i18n="" class="menu-title">Account</span></a>
                    <ul class="menu-content">
                        <?php
                        if (in_array("VIEW_USERGROUPS", $permissions)) {
                            ?>
                            <li class="<?php echo e(Request::is('account/usergroups') ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('account/usergroups')); ?>" class="menu-item">User Groups</a>
                            </li>
                            <?php
                        }
                        if (in_array("ASSIGN_PERMISSIONS", $permissions)) {
                            ?>
                            <li class="<?php echo e(Request::is('account/assignpermissions') ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('account/assignpermissions')); ?>" class="menu-item">Assign Permissions</a>
                            </li>
                            <?php
                        }
                        if (in_array("meko", $permissions)) {
                            ?>
                            <li class="<?php echo e(Request::is('account/users') ? 'active' : ''); ?>">
                                <a href="<?php echo e(url('account/users')); ?>" class="menu-item"> Users</a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
                <?php
            }
            ?>
                
                 <li class="nav-item <?php echo e(Request::is('settings') ? 'active' : ''); ?>">
                <a href="<?php echo e(url('settings')); ?>"><i class="ft-airplay"></i><span data-i18n="" class="menu-title">Settings Backup </span></a>
            </li>



        </ul>
    </div>
</div>
