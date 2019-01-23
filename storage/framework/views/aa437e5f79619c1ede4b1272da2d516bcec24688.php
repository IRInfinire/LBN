<?php $__env->startSection('content'); ?>
<!--Content Area-->
<div class="register-main">
    <div class="container">
        <?php echo Form::open(['url' => 'contact_us', 'class' => 'cu-bootstrap-modal-form', 'id' => 'formContact', 'method' => 'post']); ?>

        <div class="register-form-main">
            <h3><i class="fa fa-user" aria-hidden="true"></i>Contact Us</h3>
            <?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::text('name', '', ['class' => 'form-control mrgn-btm-25','placeholder' => 'Your Name']); ?>

            <?php echo Form::text('email', '', ['class' => 'form-control mrgn-btm-25','placeholder' => 'Email Address']); ?>

            <?php echo Form::textarea('message', old('message'), ['id' => 'message', 'class' => 'form-control', 'placeholder' => 'Message','size' => '50x3','maxlength' => '1000']); ?>

            <br>
            <?php echo Form::submit('Send', ['class' => 'btn btn-primary btn-block']); ?>

        </div>
        <?php echo Form::close(); ?>

    </div>
</div>
<!--Content Area End-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>