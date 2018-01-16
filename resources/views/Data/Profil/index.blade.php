@extends('layouts.dashboard_template')

@section('title') Data Profil @endsection

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Roles</h3>

            <div class="pull-right"><a href="{{ route('register') }}">
                    <div class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm">Create New Role</button>
                    </div>
                </a>
            </div>
        </div>
        <div class="box-body">
            @include( 'flash::message' )
            <table class="table table-striped table-bordered" id="kecamatan-table">
                <thead>
                <tr>
                    <th>Kode Kecamatan</th>
                    <th>Nama Kecamatan</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@include('partials.asset_datatables')
@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        var data = $('#kecamatan-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route( 'data.profil.getdata' ) !!}",
            columns: [
                {data: 'kode_kecamatan', name: 'kode_kecamatan'},
                {data: 'nama_kecamatan', name: 'nama_kecamatan'},
                {data: 'action', name: 'action', class: 'text-center', searchable: false, orderable: false}
            ]
        });
    });
</script>
@include('forms.datatable-vertical')
@include('forms.delete-modal')
@endpush
