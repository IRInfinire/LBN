<?php $__env->startSection('content'); ?>
<!--Banner-->
<div class="register-main">
    <div class="container">
        <?php echo Form::open(['url' => '/patient/password/reset', 'id' => 'formResetPassword', 'method' => 'post']); ?>

        <div class="register-form-main">
            <h3><i class="fa fa-user" aria-hidden="true"></i> Reset Password</h3>
            <div class="clearfix"></div>

            <?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::hidden('token', $token); ?>

            <?php echo Form::text('email', $email, $params); ?>

            <?php echo Form::password('password', ['class' => 'form-control mrgn-btm-25','placeholder' => 'Password']); ?>

            <?php echo Form::password('password_confirmation', ['class' => 'form-control mrgn-btm-25','placeholder' => 'Password Confirmation']); ?>

            <?php echo Form::submit('Reset Password', ['class' => 'btn btn-primary btn-block']); ?>


        </div>
        <?php echo Form::close(); ?>


    </div>

</div>

<!--Banner End-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_scripts'); ?>
<script>
    $(document).ready(function () {
        $("#formResetPassword").height($(document).height());
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>