<?php
use Carbon\Carbon;

?>
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

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_ektp" data-toggle="tab">Pembuatan e-KTP</a></li>
                        <li><a href="#tab_kk" data-toggle="tab">Pembuatan Kartu Keluarga</a></li>
                        <li><a href="#tab_akta" data-toggle="tab">Pembuatan Akta Kelahiran</a></li>
                        <li><a href="#tab_skck" data-toggle="tab">Pembuatan SKCK</a></li>
                        <li><a href="#tab_domisili" data-toggle="tab">Pembuatan Surat Domisili</a></li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_ektp">
                            <div class="callout callout-info">
                                <h4>Informasi!</h4>

                                <p>Untuk pengajuan e-KTP silahkan hubungi kantor kelurahan Anda masing-masing. <br>Untuk
                                    melihat status pengajuan e-KTP Anda bisa melihat tabel di bawah ini.</p>
                            </div>
                            <table class="table table-bordered table-striped" id="ektp-table" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>Nama Penduduk</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_kk">
                            <div class="callout callout-info">
                                <h4>Informasi!</h4>

                                <p>Untuk pengajuan Kartu Keluarga(KK) baru, silahkan hubungi kantor kelurahan Anda
                                    masing-masing. <br>Untuk melihat status pengajuan Kartu Keluarga tersebut Anda bisa
                                    melihat tabel di bawah ini.</p>
                            </div>
                            <table class="table table-bordered table-striped" id="kk-table" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>Nama Penduduk</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Status</th>
                                    <th>Catatan</th>
                                </tr>
                                </thead>
                            </table>

                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_akta">
                            <p>Akta</p>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_skck">
                            <p>Pembuatan SKCK</p>

                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of
                            Letraset
                            sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                            like Aldus PageMaker including versions of Lorem Ipsum.
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_domisili">
                            <p>Pembuatan Domisili</p>

                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of
                            Letraset
                            sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                            like Aldus PageMaker including versions of Lorem Ipsum.
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>
        </div>

    </section>

</section>
<!-- /.content -->
@endsection
@include('partials.asset_datatables')

@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        var data = $('#ektp-table').DataTable({
           // processing: true,
            //serverSide: true,
            ajax: "{!! route( 'data.proses-ektp.getdata' ) !!}",
            columns: [
                {data: 'penduduk.nama', name: 'nama_penduduk'},
                {data: 'alamat', name: 'alamat'},
                {data: 'tanggal_pengajuan', name: 'tanggal_pengajuan'},
                {data: 'tanggal_selesai', name: 'tanggal_selesai'},
                {data: 'status', name: 'status', class: 'text-center'},
            ],
            order: [[0, 'desc']],
            info        : true,
            autoWidth   : true
        });

        var data = $('#kk-table').DataTable({
            //processing: true,
            //serverSide: false,
            ajax: "{!! route( 'data.proses-kk.getdata' ) !!}",
            columns: [
                {data: 'penduduk.nama', name: 'nama_penduduk'},
                {data: 'alamat', name: 'alamat'},
                {data: 'tanggal_pengajuan', name: 'tanggal_pengajuan'},
                {data: 'tanggal_selesai', name: 'tanggal_selesai'},
                {data: 'status', name: 'status'},
                {data: 'catatan', name: 'catatan'},
            ],
            order: [[0, 'desc']],
            info        : true,
            autoWidth   : true
        });

    });
</script>
@include('forms.datatable-vertical')
@include('forms.delete-modal')

@endpush