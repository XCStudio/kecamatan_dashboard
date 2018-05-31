@extends('layouts.dashboard_template')

@section('content')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ $page_title or "Page Title" }}
        <small>{{ $page_description or null }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('dashboard.profil')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">{!! $page_title !!}</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    @include('partials.flash_message')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="{{route('informasi.potensi.create')}}" class="btn btn-primary btn-sm {{Sentinel::guest() ? 'hidden':''}}" title="Tambah Data"><i
                    class="fa fa-plus"></i> Tambah Potensi</a>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="potensi-table">
                            <thead>
                            <tr>
                                <th style="max-width: 150px;">Aksi</th>
                                <th>Nama Potensi</th>
                                <th>Lokasi</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">

                </div>
                <!-- /.box-footer -->
            </div>
        </div>

    </div>
    <!-- /.row -->

</section>
<!-- /.content -->
@endsection

@include('partials.asset_datatables')

@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        var data = $('#potensi-table').DataTable({
            processing: true,
            serverSide: false,
            ajax: "{!! route( 'informasi.potensi.getdata' ) !!}",
            columns: [
                {data: 'action', name: 'action', class: 'text-center', searchable: false, orderable: false},
                {data: 'nama_potensi', name: 'nama_potensi'},
                {data: 'lokasi', name: 'lokasi'},            ],
            order: [[0, 'desc']]
        });
    });
</script>
@include('forms.datatable-vertical')
@include('forms.delete-modal')

@endpush