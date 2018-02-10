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
        <div class="col-md-8">
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
                <div class="box-body">
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
                                                    <a class="btn btn-info btn-xs"
                                                       href="{{ route('informasi.prosedur.show',$prosedur->id) }}"><i class="fa fa-search fa-fw"></i> Lihat</a>

                                                    {{--<a class="btn btn-xs btn-primary"
                                                       href="{{ route('informasi.prosedur.edit',$prosedur->id) }}">Ubah</a>--}}

                                                    {!! Form::open(['method' => 'DELETE','route' => ['informasi.prosedur.destroy', $prosedur->id],'style'=>'display:inline']) !!}

                                                    <button type="submit" class="btn btn-icon btn-danger btn-xs" onclick="return confirm('Yakin akan menghapus data tersebut?')"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</button>

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

        <div class="col-md-4">
            <div class="box box-primary limit-p-width">
                <div class="box-body">
                    <div class="caption">
                        <form class="form-horizontal">
                            <div class="input-group input-group-sm">
                                <input class="form-control" type="text" name="cari" placeholder="Cari">
                                    <span class="input-group-btn">
                                      <button type="submit" class="btn btn-primary btn-flat">Cari</button>
                                    </span>
                            </div>
                        </form>

                        <h3></h3>
                        <a href="{{route('informasi.prosedur.create')}}"
                           class="btn btn-primary btn-sm {{Sentinel::guest() ? 'hidden':''}}">Tambah</a>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->
@endsection