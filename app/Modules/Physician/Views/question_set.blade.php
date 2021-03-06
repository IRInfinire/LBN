@extends('layouts.layout2')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">

      <h1>Published Question Sets</h1>

   </section>

   <!-- Main content -->
   <section class="content">
      <div class="published-question-sets">
         <table id="published-question-sets">
            <thead>
               <tr class="hidden">
                  <th></th>
               </tr>
            </thead>
         </table>
      </div>       
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('page_scripts')
<script type="text/javascript">
    var columns = [
       {data: 'title', name: 'title', orderable: false, sortable: false, "class": "border-none"},
    ];
    var parameters = [];
    parameters['tabId'] = 'published-question-sets';
    parameters['columns'] = columns;
    parameters['ajaxUrl'] = "{!! url('physician/get-question-sets') !!}";
    parameters['isPopup'] = true;
    $(document).ready(function () {
       listingTables(parameters);
    });
</script>
@endsection