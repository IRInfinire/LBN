<?php $__env->startSection('content'); ?>
<!--Banner-->
<div class="register-main register-bg">    
    <div class="container">            
        <div class="register-form-main">
            <h3>Login</h3>
            <?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::open(['url' => '/admin/login', 'id' => 'formLogin', 'method' => 'post']); ?>

            <?php echo Form::text('email', '', ['class' => 'form-control mrgn-btm-25','placeholder' => 'Email']); ?>

            <?php echo Form::password('password', ['class' => 'form-control mrgn-btm-25','placeholder' => 'Password']); ?>

            <?php echo Form::submit('Login', ['class' => 'btn btn-primary btn-block']); ?>

            <button type="button" class="btn-link" onclick="location.href = '<?php echo e(url('/admin/password/reset')); ?>'">Forgot Password?</button>
            <?php echo Form::close(); ?>

        </div>
    </div>

</div>

<!--Banner End-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout4', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>