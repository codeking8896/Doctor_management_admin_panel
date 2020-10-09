        
        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">
                    <!-- Logo container-->
                    <div class="logo">
                        <a href="<?php echo base_url('user/index');?>" class="logo">
                            <img src="<?php echo base_url(); ?>assets/images/<?php echo $data[0]['logo']; ?>" alt="" height="18">
                        </a>
                    </div>
                    <!-- End Logo container-->
                    <div class="menu-extras topbar-custom">
                        <ul class="list-inline float-right mb-0">
                            <!-- User-->
                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspop  up="false" aria-expanded="false">
                                    <img src="<?php echo base_url(); ?>assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <a class="dropdown-item" href="<?php echo base_url('user/profile');?>"><i class="dripicons-user text-muted"></i> Profile</a>
                                    <a class="dropdown-item" href="<?php echo base_url('user/lockscreen'); ?>"><i class="dripicons-lock text-muted"></i> Lock screen</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>user_operation/logout"><i class="dripicons-exit text-muted"></i> Logout</a>
                                </div>
                            </li>
                            <li class="menu-item list-inline-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>
                        </ul>
                    </div>
                    <!-- end menu-extras -->
                    <div class="clearfix"></div>
                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <!-- MENU Start -->
            <div class="navbar-custom">
                <div class="container">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="<?php echo base_url('user/dashboard');?>"> <i class="mdi mdi-view-dashboard"></i> Dashboard</a>
                            </li>

                            <li class="has-submenu">
                                <a href="<?php echo base_url('user/appointment');?>"><i class="mdi mdi-calendar-clock"></i> Appointment</a>
                            </li>

                            <li class="has-submenu">
                                <a href="<?php echo base_url('user/prescription');?>"> <i class="mdi mdi-clipboard-text"></i> Prescription</a>
                            </li>

                            <li class="has-submenu">
                                <a href="<?php echo base_url('user/billing');?>"> <i class="mdi mdi-script"></i> Billing</a>
                            </li>

                            <li class="has-submenu">
                                <a href="<?php echo base_url('user/patients');?>"> <i class="mdi mdi-account-multiple"></i> Patients</a>
                            </li>
                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->
    