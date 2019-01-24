<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1><?php if($questionSets): ?> <?php echo e($questionSets->title); ?><?php endif; ?> Question Set</h1>
   </section>
   <section class="content  section-class hidden">
      <?php echo $__env->make('layouts.show_alert_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   </section> 
   <!-- Main content -->
   <section class="content content-library" <?php if($questionSets->bg_image): ?> style="background-image: url(<?php echo e(asset('uploads/question_set/' . $questionSets->bg_image)); ?>)" <?php endif; ?>>
      <div class="content-library-bg"></div>
      <section class="content-sub-header managLib_edit">
         <a href="" class="mrgn-btm-20" data-toggle="modal" data-target="#editImage"><img src="<?php echo e(asset('assets/admin/images/img-acatar.png')); ?>">Upload Background Image</a> <div class="clearfix"></div><br>

         <h4 class="pull-left">Questions <span class="txt-blue"><?php if($questionSets): ?><?php echo e(count($questionCategories)); ?><?php endif; ?></span></h4>
         <div class="checkbox pull-right set-sponser">
            <input id="checkbox2"  type="checkbox" onclick="setOrResetAdminOptions('s',<?php if($questionSets): ?><?php echo e($questionSets->id); ?><?php endif; ?>, 'sponsored')" <?php if($questionSets &&$questionSets->is_sponsored =='Y' ): ?><?php echo e('checked'); ?><?php endif; ?>>
                   <label for="checkbox2">
               Set as sponsored
            </label>
         </div>
      </section>
      <div class="content-sub mrgn-btm-20 pdng-0">
         <div class="content-sub-heading ">
            <div class="col-sm-12">
               <b><?php echo e($questionSets->title); ?></b>
            </div>
            <div class="clearfix"></div>
         </div>

         <div class="content-area-sub">
            <div class="col-sm-12">
               <p><?php echo nl2br($questionSets->description) ?></p>
            </div>
         </div>
      </div>
      <!--- start displaying questions and options --->
      <?php echo $__env->make('layouts.question_category', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <!--- end displaying questions and options --->
      <div class="col-md-12 pdng-lft-0"><button type="button" class="btn btn-third btn-block btn-back mrgn-btm-15 btn-back" onclick="location.href ='<?php echo e(url('admin/manageLibrary')); ?>'"> Back</button></div>

   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div class="modal fade" id="editImage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo Form::open(['url' => 'admin/uploadBgImage','class' => 'bootstrap-modal-form', 'id' => 'uploadImage', 'method' => 'post']); ?>

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Upload Background Image</h4>
            </div>
            <div class="modal-body">



                <div class="col-sm-12 mrgn-btm-20">
                    <span class="display-block mrgn-btm-10"> Choose an image</span>
                    <?php echo Form::file('bg_image',['class' => 'form-control']); ?>

                    <?php echo Form::hidden('qset_id', $questionSets->id); ?>

                </div>


                <div class="clearfix"></div>

            </div>
            <div class="modal-footer">

                <?php echo Form::submit('Save', ['class' => 'btn btn-primary', 'title' => 'Save']); ?>

            </div>

            <?php echo Form::close(); ?>


        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout5', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>