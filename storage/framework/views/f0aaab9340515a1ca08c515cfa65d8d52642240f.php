



 <!-- navbar-fixed-top-->
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-dark bg-gradient-x-primary navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item">
                <a href="#" class="navbar-brand">
                    <h2 class="brand-text">GroundTouch</h2></a>
            </li>
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="fa fa-ellipsis-v"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="ft-menu"></i></a></li>
             
             
            </ul>
            <ul class="nav navbar-nav float-xs-right">
             
            
              <li class="dropdown dropdown-user nav-item">
                  <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link">
       
                      <span class="user-name"> Hi, <?php echo e(Session::get('name')); ?></span></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <i class="ft-user"></i> Change Password</a>
                    
                    <div class="dropdown-divider">
                        
                    </div><a href="<?php echo e(url('logout')); ?>" class="dropdown-item"><i class="ft-power"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>






