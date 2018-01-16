@extends('layouts.dashboard_template')

@section('title') Data Profil @endsection

@section('content')
    <section class="content-header">
        <h1>
            Role Management
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Administrator</a></li>
            <li><a href="#">Roles</a></li>
            <li class="active">Index</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Roles</h3>
                <div class="pull-right"><a href="{{ route('role.create') }}"><div class="pull-right"><button type="button" class="btn btn-primary btn-sm">Create New Role</button></div></a>
                </div>
            </div>
            <div class="box-body">
                @include( 'flash::message' )
                <table class="table table-striped table-bordered" id="user-table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>

    </section>

@endsection

@include('partials.asset_datatables')
@push('scripts')
<script type="text/javascript">
    $( document ).ready(function() {
        alert();
        var data = $( '#user-table' ).DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route( 'role.getdata' ) !!}",
            columns: [
                { data: 'name', name: 'name'},
                { data: 'slug', name: 'slug'},
                { data: 'action', name: 'action', class: 'text-center', searchable: false, orderable: false }
            ]
        });
    });
</script>
@include('forms.datatable-vertical')
@include('forms.delete-modal')
@endpush
