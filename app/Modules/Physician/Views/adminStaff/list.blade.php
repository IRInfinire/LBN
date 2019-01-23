@extends('layouts.layout2')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Administrative Staff</h1>
    </section>
    @include('includes.alerts')
    <!-- Main content -->
    <section class="content">
        <section class="content-sub-header mrgn-btm-15">
            <div class="col-xs-12 col-sm-6 col-md-5 col-lg-3 search-heading">
                <div class="row">   
                    <div id="imaginary_container"> 
                        <div class="input-group stylish-input-group">
                            <input type="text" class="form-control"  placeholder="Search Name" name="search" id="search" >
                            <span class="input-group-addon">
                                <button id="searchlist">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>  
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 pull-right">
                <div class="row">                      
                    @if (hasPermission())                   
                    <a href="{!! route('physician.adminstaff.new') !!}"><button type="button" class="btn btn-third btn-block"><i class="fa fa-plus-square-o"></i> Add New</button></a>
                    @endif
                </div></div>
            <div class="clearfix"></div>
        </section>
        <div class="clearfix"></div>

        <div class="table-responsive"> 
            <table class="table" id="adminStaff">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email Address</th>
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
        {data: 'name', name: 'name', orderable: true},
        {data: 'email', name: 'email', orderable: true},
        {data: '', name: '', orderable: false}
    ];
    var parameters = [];
    parameters['tabId'] = 'adminStaff';
    parameters['columns'] = columns;
    parameters['ajaxUrl'] = "{!! route('physician.adminstaff.list') !!}";
    $(document).ready(function () {
        listingTables(parameters);
    });
    $(document).on('click', '#searchlist', function () {
        if (($("#search")).val() == '') {
            alert('Please enter a search string');
        } else {
            listingTables(parameters);
        }
    })
    $("#search").on("keyup", function (event) {
        if (event.which == 13) {
            listingTables(parameters);
            event.preventDefault();
        }else{
            listingTables(parameters);
        }
    });
</script>
@endsection