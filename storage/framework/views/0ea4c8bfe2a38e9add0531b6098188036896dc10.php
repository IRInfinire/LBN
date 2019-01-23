<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">

      <h1>Profile Details</h1>
   </section>

   <!-- Main content -->
   <section class="content">


      <div class="clearfix"></div>
      <div class="content-sub mrgn-btm-20 pdng-0">
         <div class="content-sub-heading"> 
            <div class="col-sm-12"><b><?php echo e($patientDetails->first_name); ?>'s Profile</b></div>
            <div class="clearfix"></div>
         </div>
         <div class="content-area-sub"> 
            <div class="inner_cont_det">
               <div class="col-md-2  col-xs-12"> <img src="<?php echo e($patientDetails->profile_image); ?>" class="dr_profile_pic"></div>

               <div class="col-md-10 phy-detail-label">
                  <p><label>Full Name :</label><span><?php echo e($patientDetails->first_name); ?> <?php echo e($patientDetails->last_name); ?></span></p> 
                  <p><label>Age :</label><span><?php echo e(getValueOf($patientDetails->dob, 'Age')); ?></span></p>
                  <p><label>Contact Number :</label><span><?php echo e($patientDetails->contact_number); ?></span></p>
                  <p><label>Gender:</label><span><?php echo e(getValueOf($patientDetails->gender, 'Gender')); ?></span></p>
                  <p><label>Email :</label><span><?php echo e($patientDetails->email); ?></span></p>

               </div>      
            </div> <div class="clearfix"></div>
         </div>
      </div>

      <div class="col-md-12 pdng-lft-0"><button type="button" class="btn btn-third btn-block btn-back mrgn-btm-15 btn-back"  onclick="window.history.go(-1);"> Back</button></div>

   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout5', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>