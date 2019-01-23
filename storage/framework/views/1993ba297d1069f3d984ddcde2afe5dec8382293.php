</div>
<!-- ./wrapper -->

</body>
<script type="text/javascript" src="<?php echo e(asset('assets/patient/js/jquery-2.1.4.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/patient/js/bootstrap.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/patient/js/bootstrap-select.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/patient/js/app.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/patient/js/bootstrap-datepicker.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/common/js/bootstrap-datetimepicker.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/physician/js/jquery.dataTables.js?v=1.0')); ?>"></script>
<script>
$('.selectpicker1').selectpicker();
$("#menu-toggle").click(function (e) {
   e.preventDefault();
   $("#wrapper").toggleClass("toggled");
});

$('#myModal').on('shown.bs.modal', function () {
   $('#myInput').focus()
})
$('#myModal1').on('shown.bs.modal', function () {
   $('#myInput').focus()
})
$('.form_date').datetimepicker({
   autoclose: 1,
   todayHighlight: 1,
   minView: 2,
   pickerPosition: "bottom-left",
   endDate: '+0d'
});
</script>
<script>

    $("#administrative, #notification, #account, #not-done, .not-done").click(function () {
       alert("Not implemented");
    });
    /* <![CDATA[ */
    var params = {
       "site_url_path": "<?php echo e(URL::to('/')); ?>",
       "errorClass": "error",
       "dbChangeError": "<?php echo e(trans('custom.dnInsertFailed')); ?>",
       "dbChangeSuccess": "<?php echo e(trans('custom.dnInsertSuccess')); ?>",
       "delete_question_category": "<?php echo e(trans('custom.delete_question_category')); ?>",
       "copy_question_category": "<?php echo e(trans('custom.copy_question_category')); ?>",
       "copy_question_category_success": "<?php echo e(trans('custom.copy_question_category_success')); ?>",
       "delete_question_category_success": "<?php echo e(trans('custom.delete_question_category_success')); ?>",
       "build_question_confirm": "<?php echo e(trans('custom.build_question_confirm')); ?>",
       "question_set_cannot_be_empty": "<?php echo e(trans('custom.question_set_cannot_be_empty')); ?>",
       "disabled_question_category_success": "<?php echo e(trans('custom.disabled_question_category_success')); ?>",
       "enabled_question_category_success": "<?php echo e(trans('custom.enabled_question_category_success')); ?>",
       "set_as_clinical_question": "<?php echo e(trans('custom.set_as_clinical_question')); ?>",
       "unset_clinical_question": "<?php echo e(trans('custom.unset_clinical_question')); ?>",
       "question_visibility_changed": "<?php echo e(trans('custom.question_visibility_changed')); ?>",
       "change_question_visibility": "<?php echo e(trans('custom.change_question_visibility')); ?>",
       "description_max_length": "<?php echo e(trans('custom.description_max_length')); ?>",
       "description_max": "<?php echo e(trans('custom.description_max')); ?>",
       "alert_another_question_open_for_edit": "<?php echo e(trans('custom.alert_another_question_open_for_edit')); ?>",
       "paginationCount": 20,
       "notificationPaginationCount": 10,
       "smallPaginationCount": 5,
       "no_data": "<?php echo e(trans('custom.no_data')); ?>",
       "confirm_change_request_status": "<?php echo e(trans('Patient::messages.confirm_change_request_status')); ?>",
       "no_notifications_found": "<?php echo e(trans('custom.no_notifications_found')); ?>",
    };
    /* ]]> */
</script>
<script type="text/javascript" src="<?php echo e(asset('assets/patient/js/common-scripts.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/common/js/ajax_validator.js')); ?>"></script>
<script type="text/javascript">
    notifCount();
    setInterval(notifCount, 1000 * 60 * 10);
</script>
<?php echo $__env->yieldContent('page_scripts'); ?>
</html>