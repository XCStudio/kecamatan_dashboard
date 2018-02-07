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
    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Data {{ $page_title or "Page Title" }}</h3>

            <div class="pull-right"><a href="{{ route('data.penduduk.create') }}">
                    <div class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm">Buat Penduduk</button>
                    </div>
                </a>
            </div>
        </div>
        <div class="box-body">
            @include( 'flash::message' )
            <table class="table table-striped table-bordered" id="penduduk-table">
                <thead>
                <tr>
                    <th>Action</th>
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
                    <th>Kawin</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

</section>
<!-- /.content -->
@endsection

@include('partials.asset_datatables')

@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        var data = $('#penduduk-table').DataTable({
            processing: true,
            //serverSide: true,
            ajax: "{!! route( 'data.penduduk.getdata' ) !!}",
            columns: [
                {data: 'action', name: 'action', class: 'text-center', searchable: false, orderable: false},
                {data: 'nik', name: 'nik'},
                {data: 'nama', name: 'nama'},
                {data: 'id_kk', name: 'id_kk'},
                {data: 'alamat_sekarang', name: 'alamat'},
                {data: 'id_kk', name: 'dusun'},
                {data: 'id_kk', name: 'rw'},
                {data: 'id_kk', name: 'rt'},
                {data: 'pendidikan_kk.nama', name: 'pendidikan_kk'},
                {data: 'tanggal_lahir', name: 'umur'},
                {data: 'pekerjaan.nama', name: 'pekerjaan'},
                {data: 'kawin.nama', name: 'kawin'},
            ],
            order: [[0, 'desc']]
        });

        $.fn.dataTable.ext.errMode = 'throw';

        data.columns(1).every( function () {
            var data = this.data().eq(0);
            //alert(data['tanggal_lahir']); // ... do something with data(), or this.nodes(), etc
            console.log(data.column(1));
        } );
    });
</script>
@include('forms.datatable-vertical')
@include('forms.delete-modal')

@endpush
