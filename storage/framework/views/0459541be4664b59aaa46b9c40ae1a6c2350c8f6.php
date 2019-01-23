<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">

      <h1>Patient Details</h1>
   </section>

   <?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   <!-- Main content -->
   <section class="content">
   <div class="alertMessage"></div>

      <section class="content-sub-header">
         <div class="col-xs-4 col-sm-3 col-md-2 col-lg-1 pull-right">
            <div class="row">   <?php /*   href="{!! route('physician.patient.index') !!}"   */ ?>
               <a href="javascript:void(0)" onclick="window.history.go(-1);" ><button type="button" class="btn btn-third btn-block  mrgn-btm-15" >Back</button></a>
            </div></div>
      </section>
      <?php
      $patientStatus = $patientDetails->is_account_active;
      $entryType     = $patientDetails->entry_type;
      ?>
      <div class="content-sub mrgn-btm-20 pdng-0">

         <div class="content-area-sub patient-detaols-main">
            <div class="inner_cont_det col-sm-12 col-md-3 col-lg-2">

               <img src="<?php echo e(('' != $patientDetails->profile_image) ? asset('uploads/patient/'.config('settings.thumb_prefix').$patientDetails->profile_image) : asset('assets/dummy-profile-pic.png')); ?>" class="dr_profile_pic">

            </div>
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-10 patiant-details-data">
               <p class="mrgn-btm-20"><strong><?php echo formatData($patientStatus,$entryType,'text',$patientDetails->first_name ." ". $patientDetails->last_name ); ?></strong></p>

               <div class="row mrgn-btm-10"><div class="col-xs-12 col-sm-5 col-md-4 col-lg-2">Age</div><div class="col-xs-12 col-sm-7 col-md-8 col-lg-9"><b class="txt-blue">: <?php if($patientStatus=='P'): ?> <?php echo '-'; ?> <?php else: ?> <?php echo Carbon\Carbon::parse($patientDetails->dob)->diff(Carbon\Carbon::now())->format('%y'); ?> <?php endif; ?></b></div></div>
               <div class="row mrgn-btm-10"><div class="col-xs-12 col-sm-5 col-md-4 col-lg-2">Gender</div><div class="col-xs-12 col-sm-7 col-md-8 col-lg-9"><b class="txt-blue">: <?php echo formatData($patientStatus,$entryType,'gender',$patientDetails->gender); ?></b></div></div>
               <div class="row mrgn-btm-10"><div class="col-xs-12 col-sm-5 col-md-4 col-lg-2">Contact Number</div><div class="col-xs-12 col-sm-7 col-md-8 col-lg-9"><b class="txt-blue">: <?php echo formatData($patientStatus,$entryType,'phone',$patientDetails->contact_number ); ?></b></div></div>
               <div class="row mrgn-btm-10"><div class="col-xs-12 col-sm-5 col-md-4 col-lg-2">Email</div><div class="col-xs-12 col-sm-7 col-md-8 col-lg-9"><b class="txt-blue"> : <?php echo formatData($patientStatus,$entryType,'email',$patientDetails->email); ?></b></div></div>

               <?php if(hasPermission('patient_medicalRecordsList')): ?> 

               <div class="btn-wrap">
                  <?php if($patientStatus=='Y'): ?>
                  <a href="<?php echo e(url('physician/viewMedicalRecord/'.Request::segment(3))); ?>" ><button type="button" class="btn btn-third">View Full Medical Records</button></a> <?php else: ?> <a href="javascript:void(0)" ><button type="button" disabled="" class="btn btn-third">View Full Medical Records</button></a> 
                  <?php endif; ?> 
               </div>
               <?php endif; ?>
            </div>



            <div class="clearfix"></div>

         </div>
      </div>

      <div class="clearfix"></div>
      <h4 class="mrgn-btm-20">Question Set History</h4>

      <div class="table-responsive">
         <table class="table" id="questionList">
            <thead>
               <tr>
                  <th>Question Set Name</i></th>
                  <th>Sent On</th>
                  <th>Response</th>
                  <th>Actions</th>
                  <th>Reports</th>
               </tr>
            </thead>
         </table>
      </div>
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('assets/physician/js/send-questionset.js')); ?>"></script>
<script type="text/javascript">
                   var columns = [
                      {data: 'title', name: 'question.title', orderable: true, 'width': '30%'},
                      {data: 'created_at', name: 'created_at', orderable: true, 'width': '15%'},
                      {data: 'status', name: 'status', orderable: true, 'width': '13%'},
                      {data: 'actions', name: 'actions', orderable: false, 'width': '12%'},
                      {data: 'reports', name: 'reports', orderable: false, 'width': '30%'}
                   ];

                   var parameters = [];
                   parameters['tabId'] = 'questionList';
                   parameters['columns'] = columns;
                   parameters['ajaxUrl'] = "<?php echo route('physician.patient.questions',$patientDetails->id); ?>";

                   $(document).ready(function () {
                      listingTables(parameters);
                   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>