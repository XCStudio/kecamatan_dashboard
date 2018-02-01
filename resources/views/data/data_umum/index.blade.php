@extends('layouts.dashboard_template')

@section('title') Data Umum @endsection

@section('content')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ $page_title or "Page Title" }}
        <small>{{ $page_description or null }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
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

            <div class="pull-right"><a href="{{ route('data.data-umum.create') }}">
                    <div class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm">Buat Data Umum</button>
                    </div>
                </a>
            </div>
        </div>
        <div class="box-body">
            @include( 'flash::message' )
            <table class="table table-striped table-bordered" id="data-umum-table">
                <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Kecamatan</th>
                    <th>Tipologi</th>
                    <th>Luas m<sup>2</sup></th>
                    <th>Jml Penduduk</th>
                    <th>Batas Wil Utara</th>
                    <th>Batas Wil Timur</th>
                    <th>Batas Wil Selatan</th>
                    <th>Batas Wil Barat</th>
                    <th>Action</th>
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
        var data = $('#data-umum-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{!! route( 'data.data-umum.getdata' ) !!}",
            columns: [
                {data: 'kecamatan_id', name: 'id'},
                {data: 'kecamatan.nama', name: 'kecamatan'},
                {data: 'tipologi', name: 'tipologi'},
                {data: 'luas_wilayah', name: 'luas_wilayah'},
                {data: 'jumlah_penduduk', name: 'jumlah_penduduk'},
                {data: 'bts_wil_utara', name: 'bts_wil_utara'},
                {data: 'bts_wil_timur', name: 'bts_wil_timur'},
                {data: 'bts_wil_selatan', name: 'bts_wil_selatan'},
                {data: 'bts_wil_barat', name: 'bts_wil_barat'},
                {data: 'action', name: 'action', class: 'text-center', searchable: false, orderable: false}
            ],
            order: [[0, 'desc']]
        });
    });
</script>
@include('forms.datatable-vertical')
@include('forms.delete-modal')

@endpush
