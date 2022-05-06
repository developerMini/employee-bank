@extends('backend.common.main')
@section('pagecss')
<style>
	.hover-hand{
		cursor: pointer;
	}
</style>
@endsection
@section('content')

	<div class="block-header">
	  <h2>User List</h2>
	</div>
	<div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        User List
                        <button type="button" class="btn btn-info waves-effect navbar-right" data-toggle="modal" data-target="#importModal">Import User</button>
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="datatable">
                            <thead>
                                <tr>
                                    <th>Emp ID</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>City</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Exportable Table -->
	@include('backend.partials.import_userfile')
@endsection

@section('pageJs')
<script>
    var ajax_datatable_list = null;
    $(document).ready(function(){
        initializeDatatable();

    
    })
    function initializeDatatable() {
        if (ajax_datatable_list) {
            ajax_datatable_list.destroy();
        }

        ajax_datatable_list = $('.js-exportable').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            "processing": true,
            "serverSide": true,
            "pageLength" : 10,
            'responsive': true,
            'buttons': [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "ajax": {
                "url": "{{route('user.list.ajax')}}",
                "dataSrc": "lists"
            },
            "columns": [
                    
                    {
                        sortable: true,
                        "render": function(data, type, full, meta) {
                            return full.emp_id!=null ? full.emp_id : '';
                        }
                    },
                    {
                        sortable: true,
                        "render": function(data, type, full, meta) {
                            return full.name!=null ? full.name : '';
                        }
                    },
                    {
                        sortable: false,
                        "render": function(data, type, full, meta) {
                            return full.roles!=null ? full.roles[0].title : '';
                        }
                    },
                    {
                        sortable: false,
                        "render": function(data, type, full, meta) {
                            return full.email!=null ? full.email : '';
                        }
                    },
                    {
                        sortable: false,
                        "render": function(data, type, full, meta) {
                            return full.phone_1!=null ? full.phone_1 : '';
                        }
                    },
                    {
                        sortable: false,
                        "render": function(data, type, full, meta) {
                            var html = '';
                            html += `
                            <button class="btn btn-warning btn-sm"  onclick="openModalAndShow('${getWebUrl('/user-view/'+full.id)}')" >View</button>
                            `;
                            return html;
                        }
                    },
                ]
        });
        return ajax_datatable_list;
    }
</script>
@endsection