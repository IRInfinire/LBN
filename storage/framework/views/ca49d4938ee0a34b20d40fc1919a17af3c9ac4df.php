<?php $__env->startSection('content'); ?>
<!--Banner-->
<div class="register-main">
   <div class="container">
      <?php echo Form::open(['url' => 'register', 'id' => 'formRegister', 'method' => 'post']); ?>

      <div class="register-form-main">
         <h3><i class="fa fa-user" aria-hidden="true"></i> New physician</h3>
         <div class="clearfix"></div>

         <?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

         <a href="<?php echo url('doximity'); ?>" class="doxi-login" > <div class="navbar-header"> <img src="<?php echo e(asset('assets/physician/images/doximity.jpg')); ?>"/> </div>  <p class="navbar-text">Continue with Doximity</p>  </a>

         <span class="or">OR</span>
         <div class="clearfix"></div>
         <?php echo Form::text('physician_name', '', ['class' => 'form-control mrgn-btm-25','placeholder' => 'Physician Name','autofocus'=>""]); ?>

         <?php echo Form::text('email', '', ['class' => 'form-control mrgn-btm-25','placeholder' => 'Email Address']); ?>

         <?php echo Form::password('password', ['class' => 'form-control mrgn-btm-25','placeholder' => 'Password','maxlength'=>20]); ?>

         <?php echo Form::password('password_confirmation', ['class' => 'form-control mrgn-btm-25','placeholder' => 'Password Confirmation','maxlength'=>20]); ?>

         <?php echo Form::select('speciality', $data['speciality_list'], 'null', ['id' => 'basic', 'class' => 'selectpicker show-tick form-control mrgn-btm-25','placeholder' => 'Select Speciality']); ?>

         <?php echo Form::text('hospital_name', '', ['class' => 'form-control mrgn-btm-25','placeholder' => 'Clinic/Hospital Name']); ?>

         <?php echo Form::text('npi_number', '', ['class' => 'form-control mrgn-btm-25','placeholder' => 'NPI Number']); ?>

         <?php echo Form::text('city', '', ['class' => 'form-control mrgn-btm-25','placeholder' => 'City']); ?>

        <!--  <?php echo Form::text('country_code', '', ['class' => 'form-control mrgn-btm-25','placeholder' => 'Country Code','maxlength'=>5]); ?>

         <?php echo Form::text('contact_number', '', ['class' => 'form-control mrgn-btm-25','placeholder' => 'Contact Number','maxlength'=>15]); ?> -->
         <div class="row">
               <div class="col-md-3 country-code input-group">
                  <span class="input-group-addon">+</span>
                  <?php echo Form::text('country_code', '1', ['class' => 'form-control mrgn-btm-25','placeholder' => 'Code','maxlength'=>5]); ?>

               </div>
                <div class="col-md-9">
                   <?php echo Form::text('contact_number', '', ['class' => 'form-control mrgn-btm-25','placeholder' => 'Contact Number','maxlength'=>15]); ?>

               </div>
         </div>
         <?php echo Form::submit('Complete Registration', ['class' => 'btn btn-primary btn-block', 'title'=>'Complete Registration']); ?>

      </div>
      <?php echo Form::close(); ?>


   </div>
</div>
<!--Banner End-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>