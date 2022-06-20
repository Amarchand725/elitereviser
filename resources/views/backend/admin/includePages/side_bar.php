 <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <!--<div class="user-profile" style="background: url(<?= base_url();?>/assets/main-assets/images/background/user-info.jpg) no-repeat;">
                    <!-- User profile image -->
                   <!-- <div class="profile-img"> <img src="<?= base_url();?>/assets/main-assets/images/users/profile.png" alt="user" /> </div>-->
                    <!-- User profile text-->
                   <!-- <div class="profile-text"> <a class="dropdown-toggle"><?php $fname = $this->session->userdata("u_name");
					if(!empty($fname)){ echo $fname; }?></a>
					</div>
                </div>-->
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">Webiste Section</li>
						<?php $role_id = $this->session->userdata('u_role_id');
						if($role_id ==1){ ?>
						<li> <a class="waves-effect waves-dark" href="<?= base_url('dashboard');?>" aria-expanded="false"><i class="mdi mdi-gauge  mr-0"></i><span class="hide-menu">Dashboard</span></a></li>
						<?php } ?>
						<li> <a class="waves-effect waves-dark" href="<?= base_url('/');?>" target="_blank" aria-expanded="false"><i class="fa fa-globe  mr-0"></i><span class="hide-menu">Website</span></a></li>
						<?php if($role_id ==1){ ?>
						<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-file  mr-0"></i><span class="hide-menu">Home Page</span></a>
							<ul aria-expanded="false" class="collapse">
								<li><a href="<?= base_url('home-page-banner');?>">Banner Section</a></li>
								<li><a href="<?= base_url('home-services-categories');?>">Services Category</a></li>
							</ul>
							<ul aria-expanded="false" class="collapse first-level">
								<li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false"><span class="hide-menu">About Us Section</span></a>
									<ul aria-expanded="false" class="collapse second-level">
										<li class="sidebar-item"><a href="<?=base_url('all-about-us');?>" class="sidebar-link"><span class="hide-menu"> Title And Description
													</span></a></li>
										<li class="sidebar-item"><a href="<?= base_url('all-about-us-sub');?>" class="sidebar-link"><span class="hide-menu"> About Sub Description</span></a></li>
									</ul>
								</li>
								<li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)"  aria-expanded="false"><span class="hide-menu">Our Services Section</span></a>
									<ul aria-expanded="false" class="collapse second-level">
										<li class="sidebar-item"><a href="<?= base_url('all-services');?>" class="sidebar-link"><span class="hide-menu"> Title And Description
													</span></a></li>
										<li class="sidebar-item"><a href="<?= base_url('all-sub-services');?>" class="sidebar-link"><span class="hide-menu"> Services Sub Description</span></a></li>
									</ul>
								</li>
								<li><a href="<?= base_url('all-contact-sections');?>">Contact Us Section</a></li>
								<li><a href="<?= base_url('all-footer-sections');?>">Website Setting Section</a></li>
							</ul>

						<?php }?>
						<?php if($role_id ==1 || $role_id ==2 ){ ?>
						<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-file  mr-0"></i><span class="hide-menu">Spirituality Page</span></a>
							<ul aria-expanded="false" class="collapse">
								<li><a href="<?= base_url('');?>">Banner Section</a></li>
								<li><a href="<?= base_url('');?>">Services Category</a></li>
								<li><a href="<?= base_url('');?>">About Us Section</a></li>
								<li><a href="<?= base_url('');?>">Our Services Section</a></li>
								<li><a href="<?= base_url('');?>">Contact Us Section</a></li>
							</ul>
						</li>
						<?php }?>
						<?php if($role_id == 1 || $role_id == 3 ){ ?>
						<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-file  mr-0"></i><span class="hide-menu">Education Page</span></a>
							<ul aria-expanded="false" class="collapse">
								<li><a href="<?= base_url('');?>">Banner Section</a></li>
								<li><a href="<?= base_url('');?>">Services Category</a></li>
								<li><a href="<?= base_url('');?>">About Us Section</a></li>
								<li><a href="<?= base_url('');?>">Our Services Section</a></li>
								<li><a href="<?= base_url('');?>">Contact Us Section</a></li>
							</ul>
						</li>
						<?php }?>
						<?php if($role_id == 1 || $role_id == 4 ){ ?>
						<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-file  mr-0"></i><span class="hide-menu">Lifestyle Page</span></a>
							<ul aria-expanded="false" class="collapse">
								<li><a href="<?= base_url('');?>">Banner Section</a></li>
								<li><a href="<?= base_url('');?>">Services Category</a></li>
								<li><a href="<?= base_url('');?>">About Us Section</a></li>
								<li><a href="<?= base_url('');?>">Our Services Section</a></li>
								<li><a href="<?= base_url('');?>">Contact Us Section</a></li>
							</ul>
						</li>
						<?php } ?>
						<?php if($role_id == 1 || $role_id == 5 ){ ?>
						<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-file  mr-0"></i><span class="hide-menu">Family Page</span></a>
							<ul aria-expanded="false" class="collapse">
								<li><a href="<?= base_url('');?>">Banner Section</a></li>
								<li><a href="<?= base_url('');?>">Services Category</a></li>
								<li><a href="<?= base_url('');?>">About Us Section</a></li>
								<li><a href="<?= base_url('');?>">Our Services Section</a></li>
								<li><a href="<?= base_url('');?>">Contact Us Section</a></li>
							</ul>
						</li>
						<?php } ?>
						<?php if($role_id == 1){ ?>
						<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-comment  mr-0"></i><span class="hide-menu">Contact Us</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?= base_url('all-contacts');?>">All Contacts</a></li>
                            </ul>
                        </li>
						<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-envelope  mr-0"></i><span class="hide-menu">Newsletters</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?= base_url('all-newsletters');?>">All Newsletters</a></li>
                            </ul>
                        </li>
						<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-users  mr-0"></i><span class="hide-menu"> All Users</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?= base_url('add-user');?>">Add User</a></li>
                                <li><a href="<?= base_url('all-users');?>">All Users</a></li>
                            </ul>
                        </li>
						<?php } ?>
						<li class="nav-devider"></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item--><a href="<?= base_url('update-password');?>" class="link" data-toggle="tooltip" title="Update Password"><i class="ti-settings"></i></a>
                <!-- item--><a class="link" data-toggle="tooltip"></a>
                <!-- item--><a href="<?= base_url('logout');?>" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> </div>
            <!-- End Bottom points-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
	</div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
