<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('banner'); ?>
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->yieldContent('contact'); ?>
<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('page-script'); ?>