@extends('layouts.dashboard_template')

@section('content')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ $page_title or "Page Title" }}
        <small>{{ $page_description or null }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('dashboard.profile')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('informasi.prosedur.index')}}">Kumpulan Prosedur</a></li>
        <li class="active">{{ $prosedur->judul_prosedur  }}</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $prosedur->judul_prosedur }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- form start -->
                    <div class="row overflow-x">
                        <div class="col-md-12">
                            <img src="{{ asset("data/informasi/prosedur/$prosedur->file_prosedur") }}" width="100%">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <div class="box-footer">
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a href="{{ route('informasi.prosedur.index') }}">
                            <button type="button" class="btn btn-default btn-sm">Kembali</button>
                        </a>
                        @unless(!Sentinel::check())
                            {{--<a href="{{ route('informasi.prosedur.edit', $prosedur->id) }}">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                            </a>--}}
                            {!! Form::open(['method' => 'DELETE','route' => ['informasi.prosedur.destroy', $prosedur->id],'style'=>'display:inline']) !!}

                            {!! Form::submit('Hapus', ['class' => 'btn btn-danger btn-sm', 'onclick' => 'return confirm("Yakin akan menghapus data tersebut?")']) !!}

                            {!! Form::close() !!}
                        @endunless
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->
@endsection