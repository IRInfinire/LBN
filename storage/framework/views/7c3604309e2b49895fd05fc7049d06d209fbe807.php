<?php $__env->startSection('content'); ?>
<!--Banner-->
<div class="register-main">
    <div class="container">
        <h1 class="huge">401</h1>
        <p><h1>Unauthorized.</h1></p>
        <p>You are not authorized to access this page.</p>

    </div>

</div>

<!--Banner End-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
<script>
    $(document).ready(function () {
        $(".register-main").height($(document).height());
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>