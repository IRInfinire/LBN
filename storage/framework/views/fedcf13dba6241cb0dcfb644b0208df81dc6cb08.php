<!--<div class="radio radio-info question-calendar mrgn-btm-25">
            <input type="radio" id="question_opt_2" value="2" name="rdbQuestion" onclick="enableDisableTextbox('enable')">
            <label for="question_opt_2">
               <div class="col-xs-12 col-sm-10 col-md-6 col-lg-4 time-set pdng-0">
                  <div class="col-sm-5 pdng-lft-0"><input class="form-control" placeholder="When did" id="labelQuestionPart1" name="labelQuestionPart1" disabled=""></div>
                  <input id="labelQuestionPart2" name="labelQuestionPart2" type="hidden" value="[CC]" >
                  <span class="ago pull-left pdng-tp-7 pdng-rgt-15" >[CC]</span>
                  <div class="col-sm-5 pdng-lft-0"><input class="form-control" placeholder="Start"  id="labelQuestionPart3" name="labelQuestionPart3" disabled=""></div>
                  <span class="ago pull-left pdng-tp-7">?</span>
                  <input id="labelQuestionPart4" name="labelQuestionPart4" type="hidden" value="?" >
               </div>
            </label>
            <div class="clearfix"></div>
         </div>-->
<?php echo $__env->make('layouts.answer_entry_options', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
         <!-------------------          question header section ------------------------>
<div class="  pdng-0 q-edit mrgn-btm-15 mrgn-tp-15">
   <!--[CC]  <input class="form-control width-dynamic proba dva" style="width: 147px;" placeholder="is located on the"> [XXXX].-->
</div>
</div>
<div class="clearfix"></div>
<?php echo $__env->make('layouts.answer_entry_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
<!--<div class=" narrative-edit mrgn-btm-20">
   <p><b>Narrative Output : </b>[CC] is located on the [XXXX].</p>
</div>-->
