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
        <li class="active">Kumpulan Prosedur</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                {{-- <div class="box-header with-border">
                     <h3 class="box-title">Aksi</h3>
                 </div>--}}
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- form start -->
                    <div class="row">
                        <div class="col-md-8">
                            <form class="form-horizontal">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Cari Prosedur</label>

                                    <div class="col-sm-6">
                                        <input class="form-control" id="inputEmail3" placeholder="Regulasi"
                                               type="email">
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-default">Cari</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="col-md-4">
                            <a href="{{route('informasi.prosedur.create')}}"
                               class="btn btn-primary pull-right {{Sentinel::guest() ? 'hidden':''}}">Tambah</a>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                {{--<div class="box-header with-border">
                    <h3 class="box-title"></h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>--}}
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <tbody>
                            @if (count($prosedurs)>0)
                                @foreach ($prosedurs as $prosedur)
                                    <tr>
                                        <td><i class="fa fa-circle-o text-light-blue"></i> <a
                                                    href="{{route('informasi.prosedur.show',$prosedur->id)}}"> {{ $prosedur->judul_prosedur}}</a>
                                        </td>
                                        @if (! Sentinel::guest())
                                            <td>
                                                <div class="pull-right">
                                                    <a class="btn btn-xs btn-info"
                                                       href="{{ route('informasi.prosedur.show',$prosedur->id) }}">Lihat</a>

                                                    {{--<a class="btn btn-xs btn-primary"
                                                       href="{{ route('informasi.prosedur.edit',$prosedur->id) }}">Ubah</a>--}}

                                                    {!! Form::open(['method' => 'DELETE','route' => ['informasi.prosedur.destroy', $prosedur->id],'style'=>'display:inline']) !!}

                                                    {!! Form::submit('Hapus', ['class' => 'btn btn-xs btn-danger', 'onclick' => 'return confirm("Yakin akan menghapus data tersebut?")']) !!}

                                                    {!! Form::close() !!}
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="2">Data tidak ditemukan.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    {!! $prosedurs->links() !!}
                </div>
                <!-- /.box-footer -->
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->
@endsection