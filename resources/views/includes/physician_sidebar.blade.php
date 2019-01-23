<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ (physicianClassActive() == 'menu_question_set') ? 'active' : ''}}">
                @if(hasPermission('questionset_list'))               
                    @if(subscribed())          
                        <a href="{{url('/physician/home')}}">
                    @else 
                        <a href="{{url('/physician/questionSet')}}">
                    @endif               
                        <i class="fa fa-question-circle"></i> <span>Question Sets</span>
                        </a>
                @endif
            </li>
            <li class="{{ (physicianClassActive() == 'menu_patients') ? 'active' : ''}}">
                @if(hasPermission('patient_list')) 
                <a href="{!! route('physician.patient.index') !!}">
                    <i class="fa fa-user"></i> <span>Patients</span>
                </a>
                @endif 
            </li>                  
            <li class="{{ (physicianClassActive() == 'menu_adminstaff') ? 'active' : ''}}">
                @if(hasPermission('admin_staff_list'))     
                <a href="{!! route('physician.adminstaff.index') !!}">
                    <i><img src="{{asset('assets/physician/images/admin-staff.png')}}"/></i> <span>Administrative Staff</span>
                </a>
                @endif  
            </li>                     
            <li class="{{ (physicianClassActive() == 'menu_notifications') ? 'active' : ''}}">
                @if(hasPermission())
                <a href="{{ url('physician/listNotifications') }}">
                   <i class="fa fa-bell"></i> <span>Notifications   <label class="label label-success" id="notifCount"></label>  </span> 
                </a>
                @endif 
            </li>

            <li class="treeview {{ (physicianClassActive() == 'menu_profile' || physicianClassActive() == 'menu_subscription') ? 'active' : ''}}">
                @if(hasPermission())
                <a href="#">
                    <i><img src="{{asset('assets/physician/images/acc-details.png')}}"/></i> <span>Account Details</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-down pull-right"></i>
                    </span>
                </a>
                @endif 
                <ul class="treeview-menu  menu-open">
                    @if(hasPermission())
                    <li class="{{ (physicianClassActive() == 'menu_profile') ? 'active' : ''}}">
                        <a href="{{ url('physician/profile') }}">
                            <i><img src="{{asset('assets/physician/images/profile-details.png')}}"/></i> Profile Details
                        </a>
                    </li>
                    @endif 
                    <li class="{{ (physicianClassActive() == 'menu_subscription') ? 'active' : ''}}">
                        @if(hasPermission())
                        <a href="{{ url('physician/subscription') }}">
                            <i><img src="{{asset('assets/physician/images/subscription.png')}}"/></i> Subscription Details
                        </a>
                        @endif 
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