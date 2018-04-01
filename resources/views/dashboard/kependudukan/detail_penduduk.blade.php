@extends('layouts.dashboard_template')

@section('title') Data Profil @endsection

@section('content')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ $page_title or "Page Title" }}
        <small>{{ $page_description or null }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('dashboard.profil')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">{{$page_title}}</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                {{-- <div class="box-header with-border">
                     <h3 class="box-title">Aksi</h3>
                 </div>--}}
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-striped table-bordered" id="penduduk-table">
                        <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>No. KK</th>
                            <th>Alamat</th>
                            <th>Dusun</th>
                            <th>RW</th>
                            <th>RT</th>
                            <th>Pendidikan dalam KK</th>
                            <th>Umur</th>
                            <th>Pekerjaan</th>
                            <th>Status Kawin</th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="pull-right">
                        <div class="control-group">
                            <a href="{{ route('dashboard.kependudukan') }}">
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Kembali</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection

@include('partials.asset_datatables')

@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        var t = '{!! $type !!}';
        var kid = '{!! $kid !!}';
        var did = '{!! $did !!}';
        var year = {!! $year !!};
        var data = $('#penduduk-table').DataTable({
            processing: false,
            serverSide: false,
            ajax: {
                url: "{!! route( 'dashboard.data-penduduk' ) !!}",
                type: 'GET',
                data: {t:t, kid:kid, did:did, year:year},
            },
            columns: [
               // {data: 'action', name: 'action', class: 'text-center', searchable: false, orderable: false},
                {data: 'nik', name: 'nik'},
                {data: 'nama', name: 'nama'},
                {data: 'no_kk', name: 'no_kk'},
                {data: 'alamat', name: 'alamat'},
                {data: 'dusun', name: 'dusun'},
                {data: 'rw', name: 'rw'},
                {data: 'rt', name: 'rt'},
                {data: 'pendidikan', name: 'pendidikan_kk'},
                {data: 'tanggal_lahir', name: 'tanggal_lahir'},
                {data: 'pekerjaan', name: 'pekerjaan'},
                {data: 'status_kawin', name: 'status_kawin'},
            ],
            order: [[0, 'desc']]
        });
    });
    //$.fn.dataTable.ext.errMode = 'throw';
</script>
@include('forms.datatable-vertical')
@include('forms.delete-modal')

@endpush
