<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!-- Optionally, you can add icons to the links -->
            <li class="<?php echo e((physicianClassActive() == 'menu_question_set') ? 'active' : ''); ?>">
                <?php if(hasPermission('questionset_list')): ?>               
                    <?php if(subscribed()): ?>          
                        <a href="<?php echo e(url('/physician/home')); ?>">
                    <?php else: ?> 
                        <a href="<?php echo e(url('/physician/questionSet')); ?>">
                    <?php endif; ?>               
                        <i class="fa fa-question-circle"></i> <span>Question Sets</span>
                        </a>
                <?php endif; ?>
            </li>
            <li class="<?php echo e((physicianClassActive() == 'menu_patients') ? 'active' : ''); ?>">
                <?php if(hasPermission('patient_list')): ?> 
                <a href="<?php echo route('physician.patient.index'); ?>">
                    <i class="fa fa-user"></i> <span>Patients</span>
                </a>
                <?php endif; ?> 
            </li>                  
            <li class="<?php echo e((physicianClassActive() == 'menu_adminstaff') ? 'active' : ''); ?>">
                <?php if(hasPermission('admin_staff_list')): ?>     
                <a href="<?php echo route('physician.adminstaff.index'); ?>">
                    <i><img src="<?php echo e(asset('assets/physician/images/admin-staff.png')); ?>"/></i> <span>Administrative Staff</span>
                </a>
                <?php endif; ?>  
            </li>                     
            <li class="<?php echo e((physicianClassActive() == 'menu_notifications') ? 'active' : ''); ?>">
                <?php if(hasPermission()): ?>
                <a href="<?php echo e(url('physician/listNotifications')); ?>">
                   <i class="fa fa-bell"></i> <span>Notifications   <label class="label label-success" id="notifCount"></label>  </span> 
                </a>
                <?php endif; ?> 
            </li>

            <li class="treeview <?php echo e((physicianClassActive() == 'menu_profile' || physicianClassActive() == 'menu_subscription') ? 'active' : ''); ?>">
                <?php if(hasPermission()): ?>
                <a href="#">
                    <i><img src="<?php echo e(asset('assets/physician/images/acc-details.png')); ?>"/></i> <span>Account Details</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-down pull-right"></i>
                    </span>
                </a>
                <?php endif; ?> 
                <ul class="treeview-menu  menu-open">
                    <?php if(hasPermission()): ?>
                    <li class="<?php echo e((physicianClassActive() == 'menu_profile') ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('physician/profile')); ?>">
                            <i><img src="<?php echo e(asset('assets/physician/images/profile-details.png')); ?>"/></i> Profile Details
                        </a>
                    </li>
                    <?php endif; ?> 
                    <li class="<?php echo e((physicianClassActive() == 'menu_subscription') ? 'active' : ''); ?>">
                        <?php if(hasPermission()): ?>
                        <a href="<?php echo e(url('physician/subscription')); ?>">
                            <i><img src="<?php echo e(asset('assets/physician/images/subscription.png')); ?>"/></i> Subscription Details
                        </a>
                        <?php endif; ?> 
                    </li>
                </ul>
            </li>
            <!-- <li class="treeview">
            <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#">Link in level 2</a></li>
              <li><a href="#">Link in level 2</a></li>
            </ul>
          </li>-->
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>