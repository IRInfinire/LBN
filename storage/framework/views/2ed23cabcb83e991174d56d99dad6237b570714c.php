<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">

      <h1>All Question Sets</h1>
   </section>



   <!-- Main content -->
   <section class="content">
      <?php echo $__env->make('layouts.show_alert_message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <div id="div-alert" ></div>
      <section class="content-sub-header">

         <div class="col-xs-12 col-sm-6 col-md-5 col-lg-3 search-heading">
            <div class="row">
               <div id="imaginary_container">
                  <div class="input-group stylish-input-group">
                     <input type="text" class="form-control" id="search" name="search" placeholder="Search"  >
                     <span class="input-group-addon " >
                        <button title="Search" id="searchlist">
                           <span class="glyphicon glyphicon-search"></span>
                        </button>
                     </span>
                  </div>
               </div>
            </div>
         </div>   
          <?php if(Auth::user()->user_role == 'S'): ?>
          <div class="clearfix"></div>
          <?php endif; ?>
         <div class="col-xs-12 col-sm-5 col-md-4 col-lg-2 pull-right">
            <div class="row mrgn-btm-15">               
               <?php $permEditCls = (hasPermission()) ? '' : 'nopermission'; ?>
               <?php if(hasPermission()): ?>
               <a href="<?php echo e(url('physician/createQuestionSet')); ?>">
                  <button type="button" class="btn btn-third btn-block" title="Create Question Set">
                     <i class="fa fa-plus-square-o"></i> Create Question Set
                  </button>
               </a>
               <?php endif; ?>
            </div>
         </div>
         <div class="clearfix"></div>
      </section>
      <div class="clearfix"></div>

      <div class="table-responsive">
         <?php /* @if(count($questionSets) > 0) */ ?>
         <table class="table" id="question-sets">
            <thead>
               <tr>
                  <th>Question Set Name</th>
                  <th>Modified</th>
                  <th><?php if(hasPermission()): ?> Edit <?php endif; ?></th>
                  <th></th>                  
                  <th></th>
                  <th></th>
                  <th></th>
               </tr>
            </thead>
            <?php /*  <tbody>
              @foreach ($questionSets as $set)
              <tr>
              <td>
              <a href="{{url('physician/question-set-detail/'.$set->id)}}"  class="txt-blue {!! $permCls !!}">{{$set->title}} Question Set</a>
              <p class="txt-sm">Created {{convertDateToMMDDYYYY($set->created_at)}}</p>
              </td>
              <td>{{ convertDateToMMDDYYYY($set->updated_at) }}</td>
              <td><a href="{{url('physician/question-set-detail/'.$set->id.'/edit')}}" class="edit {!! $permCls !!}" title="Edit" ><i class="fa fa-pencil-square-o" ></i></a></td>
              <td><span class="label @if($set->visibility == 'private'){{'label-private' }}@else {{'label-public'}}@endif ">{{ ucwords($set->visibility)}}</span></td>
              <td><a href="{{url('physician/sendQuestionSet/'.$set->id)}}" class="{!! $permCls !!}"><button type="button" class="btn btn-default read-more" id="">Send</button></a>

              <!--<td><button type="button" class="btn btn-default read-more" id="" title="Send" >Send</button>-->
              </td>
              </tr>
              @endforeach
              </tbody> */ ?>
         </table>
         <?php /* @else
           <div class="col-xs-12 mrgn-btm-15 mrgn-tp-15">
           <b>{{trans('custom.no_questions_found')}}</b>
           </div>
           @endif */ ?>
      </div>

   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_scripts'); ?>
<script type="text/javascript">
    var columns = [
       {data: 'title', name: 'title', orderable: false, sortable: false, "width": "30%"},
       {data: 'modified', name: 'modified', orderable: false, sortable: false, "width": "15%"},
       {data: 'edit', name: 'edit', orderable: false, sortable: false, "width": "15%"},
       {data: 'visibility', name: '', orderable: false, sortable: false, "width": "12%"},
       {data: 'duplicate', name: '', orderable: false, sortable: false, "width": "13%"},
       {data: 'steps_completed', name: '', orderable: false, sortable: false, "width": "15%"},
       {data: 'delete', name: '', orderable: false, sortable: false, "width": "15%"}
    ];
    var parameters = [];
    parameters['tabId'] = 'question-sets';
    parameters['columns'] = columns;
    parameters['ajaxUrl'] = "<?php echo url('physician/get-question-sets'); ?>";
    parameters['isPopup'] = true;
    $(document).ready(function () {
       listingTables(parameters);
    });
    $(document).on('click', '#searchlist', function () {
       if ($.trim($("#search").val()) != '')
          listingTables(parameters);
    })
    $("#search").on("keydown", function (event) {
       if (event.which == 13) {
          listingTables(parameters);
          event.preventDefault();
       }
    });
    $("#search").on("keyup", function (event) {
       if ($.trim($(this).val()) == '') {
          listingTables(parameters);
       }
    });
    $(document).on('click', '.clear-div', function () {
       setTimeout(function () {
          $('.'+params.errorClass).remove();
       }, 10);
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>