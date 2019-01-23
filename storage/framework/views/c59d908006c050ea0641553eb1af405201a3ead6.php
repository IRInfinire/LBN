<?php $__env->startSection('content'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
     <h1>Question Set Details</h1>
    </section>
    <?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
    <!-- Main content -->
    <section class="content">
<div class="content-sub mrgn-btm-20 pdng-0">
            <div class="content-sub-heading"> 
               <div class="col-sm-12"><b>Physician Profile</b></div>
                <div class="clearfix"></div>
            </div>
    
            <div class="content-area-sub"> 
                <div class="inner_cont_det col-md-12">  

                <img src="<?php echo e($questiondetails->profile_image ? asset('uploads/physician/'.config('settings.thumb_prefix').$questiondetails->profile_image) : asset('assets/dummy-profile-pic.png')); ?>" class="dr_profile_pic">
                    <p class="Dr_name_big">Dr. <?php echo $questiondetails->physician; ?></p> <span><?php echo $questiondetails->clinic; ?><br><?php echo $questiondetails->city; ?></span>
                                 
                </div> <div class="clearfix"></div>
               <div class="col-sm-12">
                <p><?php echo $questiondetails->profile_description; ?></p>
                   </div>
                </div>
            </div>
        <div class="content-sub mrgn-btm-20 pdng-0">
            <div class="content-sub-heading"> 
               <div class="col-sm-12"><b><?php echo $questiondetails->title; ?></b></div>
                <div class="clearfix"></div>
            </div>
            <div class="content-area-sub">                 
               <div class="col-sm-12">
                <p><?php echo $questiondetails->description; ?></p>
                </div>
                </div>
             
            </div>
        <div class="col-md-2 pdng-lft-0">
          <a href="<?php echo route('patient.question.show',$questiondetails->qResId); ?>"><button type="button" class="btn btn-third btn-block"  mrgn-btm-15 > View Question Set</button></a></div>
     </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout3', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>