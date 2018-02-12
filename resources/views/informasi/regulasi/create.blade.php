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
        <li><a href="{{route('informasi.regulasi.index')}}">Regulasi</a></li>
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

                        <!-- form start -->
                {!! Form::open( [ 'route' => 'informasi.regulasi.store', 'method' => 'post','id' => 'form-regulasi', 'class' => 'form-horizontal form-label-left' ] ) !!}

                <div class="box-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @include( 'flash::message' )
                    @include('informasi.regulasi.form')

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="{{ route('informasi.regulasi.index') }}">
                                <button type="button" class="btn btn-default btn-sm">Batal</button>
                            </a>
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->
@endsection

@include(('partials.asset_select2'))
@push('scripts')
<script>
    $(function () {
        $('#kecamatan_id').select2();
    })
</script>
@endpush