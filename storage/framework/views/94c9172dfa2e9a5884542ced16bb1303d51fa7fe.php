<?php echo Form::open(['url' => route('patient.post.surgical_history'),'class' => 'bootstrap-modal-form', 'id' => 'postSurgicalHistory', 'method' => 'post']); ?>

<div class="modal-header">
   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <h4 class="modal-title" id="myModalLabel">Surgical History</h4>
</div>
<div class="modal-body">

   <div class="col-sm-12 mrgn-btm-20">
      <span class="display-block mrgn-btm-10"> Surgery</span>
      <?php echo Form::hidden('surgical_history_id', isset($surgicalHistoryData->id) ? $surgicalHistoryData->id : ''); ?>

      <?php echo Form::text('surgery', isset($surgicalHistoryData->surgery) ? $surgicalHistoryData->surgery : old('surgery') , ['id' => 'surgery', 'class' => 'form-control', 'placeholder' => 'Specify medical history']); ?>

   </div>

   <div class="col-sm-12 mrgn-btm-20">
      <span class="display-block mrgn-btm-10"> Date of surgery</span>
      <div class="input-group datepicker-control mrgn-tp-15 form_date date" data-date="" data-date-format="mm/dd/yyyy">
         <?php echo Form::text('surgery_date', isset($surgicalHistoryData->surgery_date) ? Carbon\Carbon::parse($surgicalHistoryData->surgery_date)->format('m/d/Y') : old('surgery_date'), ['id' => 'surgery_date', 'class' => 'form-control','readonly' => 'true', 'placeholder' => 'Select Date.','size' => '50x5','maxlength' => '1000', 'onclick' => 'this.blur();']); ?>

         <span class="input-group-addon calendar-icn-bg"><i class="fa fa-calendar icon-calendar"></i></span>
      </div>
      <div class="error_surgery_date error"></div>
   </div>

   <div class="clearfix"></div>

</div>
<div class="modal-footer">

   <?php echo Form::submit('Save', ['class' => 'btn btn-primary', 'title' => 'Save']); ?>

</div>
<?php echo Form::close(); ?>

<script>
    $('.form_date').datetimepicker({
       autoclose: 1,
       todayHighlight: 1,
       minView: 2,
       pickerPosition: "bottom-left",
       endDate: '+0d'
    });
</script>