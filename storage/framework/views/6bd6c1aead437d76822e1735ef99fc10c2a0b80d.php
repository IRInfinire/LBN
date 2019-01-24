<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">

            <!-- Optionally, you can add icons to the links -->
            <li class="<?php echo e((adminClassActive() == 'menu_physicians') ? 'active' : ''); ?>">
                <a href="<?php echo e(url('admin/listPhysicians')); ?>"><i class="fa fa-user-md" aria-hidden="true"></i> 
                    <span>Physicians</span>
                </a>
            </li>
            <li class="<?php echo e((adminClassActive() == 'menu_patients') ? 'active' : ''); ?>">
                <a href="<?php echo e(url('admin/listPatients')); ?>"><i class="fa fa-user"></i> 
                    <span>Patients</span>
                </a>
            </li>
            <li class="<?php echo e((adminClassActive() == 'menu_library') ? 'active' : ''); ?>">
                <a href="<?php echo e(url('admin/manageLibrary')); ?>"><i class="fa fa-book" aria-hidden="true"></i>
                    <span>Manage Library</span>
                </a>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>