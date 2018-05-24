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
    @include('partials.flash_message')

    <div class="box box-primary">
        <div class="box-header with-border">
            <div class="">
                <a href="{{ route('setting.jenis-penyakit.create') }}">
                    <button type="button" class="btn btn-primary btn-sm" title="Tambah Data"><i class="fa fa-plus"></i> Tambah</button>
                </a>
            </div>
        </div>
        <div class="box-body">
            @include( 'flash::message' )
            <table class="table table-striped table-bordered" id="data-coa">
                <thead>
                    <tr>
                        <th>#</th>
                        <th style="width: 20px">Type</th>
                        <th style="width: 100px">Sub Akun</th>
                        <th style="width: 110px">Sub-Sub Akun</th>
                        <th style="width: 100px">Nomor Akun</th>
                        <th>Nama Akun</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(\App\Models\CoaType::all() as $type)
                    <tr>
                        <td class="icon-class"></td>
                        <td colspan="4"><strong>{{ $type->id }}</strong></td>
                        <td><strong>{{ $type->type_name }}</strong></td>
                    </tr>
                        @foreach(\App\Models\SubCoa::where('type_id', $type->id)->get() as $sub_coa)
                            <tr>
                                <td class="icon-class"></td>
                                <td><strong>{{ $type->id }}</strong></td>
                                <td colspan="3"><strong>{{ $sub_coa->id }}</strong></td>
                                <td><strong>&emsp;{{ $sub_coa->sub_name }}</strong></td>
                            </tr>
                            @foreach(\App\Models\SubSubCoa::where('sub_id', $sub_coa->id)->get() as $sub_sub_coa)
                                <tr>
                                    <td class="icon-class"></td>
                                    <td><strong>{{ $type->id }}</strong></td>
                                    <td><strong>{{ $sub_coa->id }}</strong></td>
                                    <td colspan="2"><strong>{{ $sub_sub_coa->id }}</strong></td>
                                    <td><strong>&emsp;&emsp;{{ $sub_sub_coa->sub_sub_name }}</strong></td>
                                </tr>
                                @foreach(\App\Models\Coa::where('sub_sub_id', $sub_sub_coa->id)->get() as $coa)
                                    <tr>
                                        <td class="icon-class"></td>
                                        <td>{{ $type->id }}</td>
                                        <td>{{ $sub_coa->id }}</td>
                                        <td>{{ $sub_sub_coa->id }}</td>
                                        <td>{{ $coa->id }}</td>
                                        <td>&emsp;&emsp;&emsp;{{ $coa->coa_name }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                </tbody>
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
        /*$('[data-toggle="collapse"]').on('click', function() {
            $(this).toggleClass('collapsed');
        });*/
    });
</script>

@endpush

@push('css')
<style type="text/css">
   /* .collapsed .icon-class:before {
        content: '>';
    }
    .icon-class:before {
        content: 'v';
    }*/
</style>
@endpush
