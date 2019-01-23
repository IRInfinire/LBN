<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">

      <h1>Full Evaluation Report</h1>
   </section>

   <!-- Main content -->
   <section class="content">
      <div class="content-sub mrgn-btm-20 pdng-0">
         <div class="content-sub-heading">
            <div class="col-sm-12">

               <b><?php echo $evaluationData['patient']['first_name']. " ". $evaluationData['patient']['last_name']; ?></b>
               <?php if(hasPermission('patient_evaluationReportList')): ?> 
               <a href="<?php echo e(route('physician.full.pdf', $qRecId)); ?>" target="_blank" class="edit pull-right txt-blue" type="button" class="btn" data-toggle="tooltip" data-placement="top" title="Print"><i class="fa fa-print" ></i></a>
               <?php endif; ?>
               <?php if(hasPermission('patient_evaluationReportList')): ?> 
               <ul class="navbar-right mrgn-rgt-15">
                  <li class="dropdown email-option">
                     <a class="dropdown-toggle edit txt-blue" href="javascript:void(0)" data-toggle="dropdown" id="navLogin" data-placement="top" title="Email"><i class="fa fa-envelope-o" ></i></a>
                     <div class="dropdown-menu summary-email">
                        <i class="arrow-point" aria-hidden="true"></i>
                        <form class="form" id="formLogin">
                           <input type="text" class="form-control autoComplete" id="email"  name="email" placeholder="Enter Physician’s Email" data-suggest="physicianEmail">
                           <div class="button-wrap"> <button type="button" onclick="sendSummaryReport(<?php echo e($evaluationData['patient_id']); ?>, <?php echo e($evaluationData['question_id']); ?>, <?php echo e(Request::segment(3)); ?>, 'E')" id="btnSendReport" class="btn btn-primary mrgn-tp-20">Send</button>
                           </div>

                        </form>
                     </div>
                  </li>
               </ul>
               <?php endif; ?>

            </div>
            <div class="clearfix"></div>
         </div>

         <div class="content-area-sub">
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 patiant-details-data">
               <div class="row mrgn-btm-10"><div class="col-xs-12 col-sm-5 col-md-4 col-lg-2">Age</div><div class="col-xs-12 col-sm-7 col-md-8 col-lg-9"><b class="txt-blue">: <?php echo Carbon\Carbon::parse($evaluationData['patient']['dob'])->diff(Carbon\Carbon::now())->format('%y'); ?></b></div></div>
               <div class="row mrgn-btm-10"><div class="col-xs-12 col-sm-5 col-md-4 col-lg-2">Gender</div><div class="col-xs-12 col-sm-7 col-md-8 col-lg-9"><b class="txt-blue">: <?php if($evaluationData['patient']['gender'] == 'F' ): ?> <?php echo e('Female'); ?> <?php else: ?><?php echo e('Male'); ?> <?php endif; ?></b></div></div>
               <div class="row mrgn-btm-10"><div class="col-xs-12 col-sm-5 col-md-4 col-lg-2">Contact Number</div><div class="col-xs-12 col-sm-7 col-md-8 col-lg-9"><b class="txt-blue">: <?php echo ($evaluationData['patient']['contact_number']); ?></b></div></div>
               <div class="row mrgn-btm-10"><div class="col-xs-12 col-sm-5 col-md-4 col-lg-2">Email</div><div class="col-xs-12 col-sm-7 col-md-8 col-lg-9"><b class="txt-blue"> : <?php echo ($evaluationData['patient']['email']); ?></b></div></div>
            </div>
         </div>
         <div class="content-area-sub brdr-top">
            <div class="col-sm-12">
               <b class="display-block mrgn-btm-10"><?php echo $evaluationData['question']['title']; ?></b>
               <p><?php echo $summary; ?> </p>
            </div>
         </div>
         <!--<?php echo $__env->make('Physician::patient.partials._category_report', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>-->     

      </div>
       <?php echo $__env->make('Physician::patient.partials._medical_history', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <section class="content-sub-header">
         <div class="col-xs-4 col-sm-3 col-md-2 col-lg-1 pull-right">
            <div class="row">
               <a href="<?php echo route('physician.patient.details',$evaluationData['patient']['id']); ?>"><button type="button" class="btn btn-third btn-block  mrgn-btm-15">Back</button></a>
            </div></div>
      </section>
   </section>
   <!-- /.content -->
   
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('assets/physician/js/patients.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>