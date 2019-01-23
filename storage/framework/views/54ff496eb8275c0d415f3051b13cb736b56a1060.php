<?php echo Form::open(['url' => route('patient.post.allergies'),'class' => 'bootstrap-modal-form', 'id' => 'postAllergies', 'method' => 'post']); ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Allergies</h4>
</div>
<div class="modal-body">

    <div class="col-sm-12 mrgn-btm-20">
        <span class="display-block mrgn-btm-10"> Type</span>
        <?php echo Form::hidden('allergy_id', isset($allergyData->id) ? $allergyData->id : ''); ?>

        <?php echo Form::text('type', isset($allergyData->type) ? $allergyData->type : old('type') , ['id' => 'allergy_type', 'class' => 'form-control', 'placeholder' => 'Specify Allergy']); ?>

    </div>

    <div class="col-sm-12 mrgn-btm-20">
        <span class="display-block mrgn-btm-10"> Description</span>
        <?php echo Form::textarea('description', isset($allergyData->description) ? $allergyData->description : old('description'), ['id' => 'allergy_description', 'class' => 'form-control', 'placeholder' => 'Please enter description.','size' => '50x5','maxlength' => '1000']); ?>


    </div>


    <div class="clearfix"></div>

</div>
<div class="modal-footer">

    <?php echo Form::submit('Save', ['class' => 'btn btn-primary', 'title' => 'Save']); ?>

</div>
<?php echo Form::close(); ?>