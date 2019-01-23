<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Administrative Staff</h1>
    </section>
    <?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- Main content -->
    <?php echo Form::open(['route' => 'physician.adminstaff.create','id'=>'adminCreateFrm','name'=>'adminCreateFrm' ]); ?>

   <!--  <form action="<?php echo route('physician.adminstaff.create'); ?>" method="post"> -->
        <?php echo csrf_field(); ?>

        <section class="content">
            <div class="content-sub mrgn-btm-20 pdng-0">
                <div class="content-sub-heading"> 
                    <div class="col-sm-12">
                        <b>Add New</b>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="content-area-sub">
                    <div class="col-sm-12">

                        <div class="row mrgn-btm-15">
                            <div class="col-xs-12 col-sm-10 col-md-8 col-lg-5">                                
                                <?php echo Form::text('name', null, ['class' => 'form-control','autofocus'=>"",'placeholder'=>"Full Name",'id'=>'name']); ?>                               
                            </div>
                        </div>

                        <div class="row mrgn-btm-15">
                            <div class="col-xs-12 col-sm-10 col-md-8 col-lg-5">
                                <?php echo Form::text('email', '', ['class' => 'form-control','placeholder'=>"Email Address",'id'=>'email']); ?>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-10 col-md-8 col-lg-5">
                                <input type="text" style="display:none">
                                <input type="password" style="display:none">
                                <?php echo Form::password('password',['class' => 'form-control','placeholder'=>"Password",'id'=>'password']); ?>  
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="content-sub mrgn-btm-20 pdng-0" id="agg-view">

                <div class="content-sub-heading"> 

                    <div class="col-sm-12"><b>Menu Permissions</b></div>
                    <div class="clearfix"></div>

                </div>
                <div class="content-area-sub">
                    <?php echo $__env->make('Physician::partials._permissions', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>          
                </div>
            </div>
            <div class="btn-wrap">
                <button type="submit" class="btn btn-primary mrgn-lft-15 submitButton">Save</button>
                <a href="<?php echo route('physician.adminstaff.index'); ?>"><button type="button" class="btn btn-default" id="agg-cancel-btn">Cancel</button></a>
            </div>

        </section>
    <?php echo Form::close(); ?>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_scripts'); ?>
<script>
$(document).on('submit','#adminCreateFrm',function(event){    
    event.preventDefault(); 
    removeWithClass(params.errorClass); 
    $('.submitButton').attr('disabled',true);
    $.ajax({
      type: "POST",
      url: $(this).attr('action'),
      data: $(this).serialize(),
      success: function (response) {        
         var respArray = JSON.parse(response);
         $('.submitButton').attr('disabled',false);
         if(respArray.success){
            if(respArray.redirectUrl) {
                setTimeout(function () {
                      $(location).attr("href", respArray.redirectUrl);
                }, 500);
            }
         }else {            
            showDBChangeAlert('error', params.dbChangeError);            
         }        
      },
      error: function (response) {   
        $('.submitButton').attr('disabled',false);     
        showValidation(response, params.errorClass);
      }
   });  
})
$(document).on('click','.menu',function(event){  
   if (this.checked) {       
      //$(this).parent().next('li').find('input[type=checkbox]:first').prop('checked',$(this).is(':checked')); 
      $(this).parent().next('li').find('input[type=checkbox]').prop('checked',$(this).is(':checked')); 
   }else {
      $(this).parent().next('li').find('input[type=checkbox]').prop('checked',$(this).is(':checked'));  
   }   
   //$(this).parent().next('li').find('input[type=checkbox]:first').prop('disabled',$(this).is(':checked'));  
});
$(document).on('click','.permission',function(event){       
      if ($(this).parent().parent().find('.permission:checked').length > 0){
            $(this).parent().parent().find('input[type=checkbox]:first').prop('checked',true);            
      }
      if ($(this).parent().parent().find('.permission:checked').length == $(this).parent().parent().find('.permission').length ){        
          $(this).parent().parent().prev().find('input[type=checkbox]').prop('checked',$(this).is(':checked')); 
      }else {
          $(this).parent().parent().prev().find('input[type=checkbox]').prop('checked',false); 
      } 
      

});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>