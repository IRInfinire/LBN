@extends('layouts.layout2')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>@if($questionSets) {{$questionSets->title}}@endif Question Set</h1>
   </section>

   <!-- Main content -->
   <section class="content">
      @include('layouts.show_alert_message')

      <div>
         <!-- Nav tabs -->
         <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="@if(collect(request()->segments())->last() != 'edit') {{'active' }} @endif" ><a href="{{url('physician/question-set-detail/' .$qid)}}">Details</a></li>
            @if(haspermission())
            <li role="presentation" class="@if(collect(request()->segments())->last() == 'edit') {{'active' }} @endif" ><a href="{{url('physician/question-set-detail/' .$qid . '/edit')}}">Design</a></li>
            @endif
         </ul>

         <!-- Tab panes -->
         <div class="tab-content mrgn-tp-25">
            <div role="tabpanel" class="tab-pane  @if(collect(request()->segments())->last() != 'edit') {{'active' }} @endif" id="details">


               <div class="content-sub mrgn-btm-20 pdng-0">
                  <div class="content-sub-heading">
                     <div class="col-sm-12">
                        <b>Details</b>
                     </div>
                     <div class="clearfix"></div>
                  </div>

                  <div class="content-area-sub">

                     <div class="col-sm-8 col-md-9 col-lg-10 q-list">
                        <img src="{{asset('assets/physician/images/question-set-icon.png')}}"/>
                        <b>@if($questionSets){{$questionSets->title}} @endif Question Set</b>
                        <p class="mrgn-tp-5">Questions: <b>@if($questionSets){{count($questionCategories)}}@endif</b></p>
                        <p class="mrgn-tp-5" id="question-set-status">Question Set Status: <b> @if($questionSets){{ucwords($questionSets->visibility)}}@endif </b></p>

                        <p class="mrgn-tp-25 italic">
                           Created:  @if($questionSets){{convertDateToMMDDYYYY( $questionSets->created_at,'') }} @endif </p>
                        <p class="mrgn-tp-5 italic">Last Modified: @if($questionSets){{convertDateToMMDDYYYY( $questionSets->updated_at,'') }}@endif
                        </p>
                        <div class="clearfix"></div>
                     </div>
                     <?php
                     $questionVisibility = '';
                     if ($questionSets)
                         $questionVisibility = $questionSets->visibility;
                     $changeVisibilityTo = 'Public';
                     if ($questionVisibility == 'public')
                         $changeVisibilityTo = 'Private';
                     $questionVisibility = ucwords($questionVisibility);
                     ?>
                     <div class="col-sm-4 col-md-3 col-lg-2 q-optn">
                    <!-- <label class="sponsored mrgn-btm-25"><i class="fa fa-star" aria-hidden="true"></i> Sponsored</label>-->
                        @if(haspermission())
                        <button type="button" class="btn btn-third btn-block mrgn-btm-15" onclick="setQuestionFlags('visibility','{{$changeVisibilityTo}}',0,{{$qid}})" id="make-question">Make {{$changeVisibilityTo}}</button>
                        @endif
                        @if (hasPermission('questionset_list'))   
                        <button type="button" class="btn btn-third btn-block"  onclick="location.href ='{{url('physician/questionSetPreview/'.$qid.'/edit')}}'">View Question Set</button>
                        @endif
                     </div>
                  </div>
               </div>

               <section class="content-sub-header">

                  <div class="col-xs-12 col-sm-6 col-md-5 col-lg-3 search-heading">
                     <div class="row">
                        <select id="searchlist" class="selectpicker show-tick form-control mrgn-btm-25">
                           <option value="">All Recipients</option>
                           <option value="pending">Pending Recipients</option>
                           <option value="completed">Completed Recipients</option>
                        </select>
                     </div>
                  </div>
                  <div class="pull-right recipients">
                     <span class="mrgn-rgt-50" id="recipients-count"></span> 
                     <span class="txt-blue" id="responded-count"> </span>
                  </div>
               </section>
               <input type="hidden" name="hidQid" id="hidQid" value="{{$id}}">
               <div class="clearfix"></div>
               <div class="table-responsive dataTable_wrapper ">
                  <table id="receipientsList"  class="table table-striped table-hover"  >
                     <thead>
                        <tr>
                           <th>Name</th>
                           <!--<th>Last Name</th>-->
                           <th>Email Address</th>
                           <th>Contact Number</th>
                           <th>Sent On</th>
                           <th>LinkBox Member</th>
                           <th>Response</th>
                        </tr>
                     </thead>
                  </table>
               </div>


            </div>
            <div role="tabpanel" class="tab-pane @if(collect(request()->segments())->last() == 'edit') {{'active' }} @endif" id="design">

               <section class="content-sub-header">

                  <h4 class="pull-left">Questions <span class="txt-blue">{{count($selectedCategories)}}</span></h4>

                  <div class="col-xs-12 col-sm-5 col-md-4 col-lg-2 pull-right">
                     <div class="row">
                        <button type="button" class="btn btn-third btn-block btn-min-width-235 mrgn-btm-15 " title="Add Question Categories"  data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square-o"></i> Add Question Categories</button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                           @include('layouts.add_question_category')

                        </div>
                     </div></div>
               </section>

               <div class="content-sub mrgn-btm-20 pdng-0" id="questionset-view">
                  <div class="content-sub-heading">
                     <div class="col-sm-12">
                        <b>{{$questionSets->title}}</b>
                        <a href="javascript:void(0)" class="edit pull-right" id="questionset-edit-btn" type="button" class="btn" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil-square-o" ></i></a>
                     </div>
                     <div class="clearfix"></div>
                  </div>
                  <div class="content-area-sub">
                     <div class="col-sm-12">
                        <p><?php echo nl2br($questionSets->description) ?></p>
                     </div>
                  </div>
               </div>
               <div class="content-sub mrgn-btm-20 pdng-0 hidden" id="questionset-edit">
                  {!! Form::open(['role' => 'form', 'name' => 'frmQuestionSet', 'url'=>'physician/editQuestionSet', 'id' => 'frmQuestionSet','autocomplete' => 'off']) !!}
                  <div class="content-sub  mrgn-btm-20">
                     <div class="col-sm-12 mrgn-btm-20">
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 pdng-0 pdng-tp-7">Chief Complaint:</div>
                        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4  input-main">
                           <input class="form-control autoComplete" type="text" maxlength="100" id="chiefComplaint" name="chiefComplaint" value="{{$questionSets->title}}" data-suggest="chiefComplaint">
                        </div>
                        <div class="clearfix"></div>
                     </div>

                     <div class="col-sm-12 mrgn-btm-20">
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 pdng-0 pdng-tp-7">Description:</div>
                        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 input-main"><textarea class="form-control" rows="4" maxlength="1500" id="description" name="description">{{$questionSets->description}}</textarea></div>
                        <div class="clearfix"></div>
                     </div>
                     <input type="hidden" id="requestType" name="requestType" value="head" >
                     <input type="hidden" id="qid" name="qid" value="{{$id}}" >
                     <input type="hidden" id="categoryCount" name="categoryCount" value="1" >
                     <input type="hidden" name="category1" id="category1" value="1">
                     <div class="btn-wrap">
                        <button type="button" class="btn btn-primary mrgn-lft-15" id="questionset-done-btn" title="Done">Done</button>
                        <button type="button" class="btn btn-default" id="questionset-cancel-btn" title="Cancel">Cancel</button> </div>
                  </div>
                  {!! Form::close() !!}
               </div>
               @if($defaultOutput)
               <div class="content-sub mrgn-btm-20 pdng-0" id="defaultoutput-view">
                  <div class="content-sub-heading">
                     <div class="col-sm-12">
                        <b>Narrative Output</b>
                        <a href="javascript:void(0)" class="edit pull-right" id="defaultoutput-edit-btn" type="button" class="btn" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil-square-o" ></i></a>
                     </div>
                     <div class="clearfix"></div>
                  </div> 
                  <div class="content-area-sub">
                     <div class="col-sm-12">
                        <p><?php echo str_replace('[CC]', $questionSet->title, $defaultOutput->narrative_output); ?></p>
                     </div>
                  </div>       
               </div>
               <div class="content-sub mrgn-btm-20 pdng-0 hidden" id="defaultoutput-edit">
                  {!! Form::open(['role' => 'form', 'name' => 'frmQuestionSetNarrativeOutput', 'url'=> route('question.defaultoutput.edit'), 'id' => 'frmQuestionSetNarrativeOutput','autocomplete' => 'off']) !!}         
                     <div class="content-sub-heading">
                        <div class="col-sm-12">
                           <b>Narrative Output</b>                  
                        </div>
                        <div class="clearfix"></div>
                     </div> 
                     <div class="content-sub  mrgn-btm-20">
                     <div class="content-area-sub">  
                        <div class="row">  
                           <div class="col-sm-4"><input class="form-control" id="defaultnarrativeoutput" name="defaultnarrativeoutput" maxlength="500" value="{{$defaultOutput->narrative_output}}" ></div>
                        </div>
                     </div>           
                     <input type="hidden" id="noutput_id" name="noutput_id" value="{{$defaultOutput->id}}" >
                     <input type="hidden" id="qid" name="qid" value="{{$id}}">          
                     <div class="btn-wrap">
                        <button type="button" class="btn btn-primary mrgn-lft-15" id="defaultoutput-done-btn" title="Done">Done</button>
                        <button type="button" class="btn btn-default" id="defaultoutput-cancel-btn" title="Cancel">Cancel</button>
                     </div>  
                  </div>      
                  {!! Form::close() !!}
               </div>
               @endif
               @include('layouts.question_category')
               <div class="btn-wrap"><button type="button" class="btn btn-primary mrgn-lft-15"  onclick="buildQuestionSet({{$qid}})">Save</button></div>

               <input type="hidden" name="checkOrigin" id="checkOrigin" value="Details" >
               <input type="hidden" name="currentURL" id="currentURL" value="{{Request::url()}}" >
               </section>
               <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            @endsection
            @section('page_scripts')
            <script type="text/javascript">
                        var columns = [
                        {data: 'first_name', name: 'first_name', orderable: true, "width":"35%"},
                        {data: 'email', name: 'email', orderable: true, "width":"25%"},
                        {data: 'contact_number', name: 'contact_number', orderable: true, "width":"20%"},
                        {data: 'created_at', name: 'question_recipients.created_at', orderable: true, "width":"12%"},
                        {data: 'is_account_active', name: 'is_account_active', orderable: true, "width":"20%"},
                        {data: 'status', name: 'status', orderable: true, "width":"13%"},
                        ];
                        var parameters = [];
                        parameters['tabId'] = 'receipientsList';
                        parameters['columns'] = columns;
                        parameters['ajaxUrl'] = "{!! url('physician/receipients-list') !!}";
                        $(document).ready(function(){
                listingTables(parameters);
                });
                        $(document).on('change', '#searchlist', function(){
                listingTables(parameters);
                });
            </script> 
            @endsection