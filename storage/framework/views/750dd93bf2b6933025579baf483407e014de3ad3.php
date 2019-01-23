<?php $__env->startSection('content'); ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
     <h1>Questions about your health issue, please click link below</h1>
    </section>
      
    <!-- Main content -->
    <section class="content">
        <div class="clearfix"></div>
                <div class="table-responsive"> 
        <table class="table" id="questions">
            <thead>
                <tr>
                    <th>Question Set Name</th>
                    <th>Received On</th>
                    <th>Physician</th>
                    <th>Clinic</th>
                    <th>Contact</th>
                </tr>
            </thead>           
        </table>
    </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_scripts'); ?>
<script type="text/javascript">
var columns = [
         {data: 'title', name: 'title', orderable: true},
         {data: 'created_at', name: 'created_at', orderable: true},        
         {data: 'physician', name: 'physician', orderable: false},
         {data: 'clinic', name: 'clinic', orderable: false},
         {data: 'contact_no', name: 'contact_no', orderable: false},
      ];
var parameters = [];
    parameters['tabId'] = 'questions'; 
    parameters['columns'] = columns; 
    parameters['ajaxUrl'] = "<?php echo route('patient.question.lists'); ?>";  
    parameters['order'] = [1,'desc'];  

    //parameters['aoColumnDefs'] = [{"aTargets": [ 0 ],"bVisible": false,"bSearchable": false }];

$(document).ready(function(){
    listingTables(parameters);
});
$(document).on('click','searchlist',function(){  
   listingTables(parameters);   
})
$( "#search" ).on( "keydown", function(event) {     
      if(event.which == 13) {         
          listingTables(parameters);  
          event.preventDefault();
      }
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout3', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>