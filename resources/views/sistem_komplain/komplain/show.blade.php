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

    <div class="row">
        <div class="col-md-3">
            @include('sistem_komplain.komplain._tracking')

            @include('sistem_komplain.komplain._komplain_populer')

            @include('sistem_komplain.komplain._komplain_sukses')
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <!-- kirim komplain form -->
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-paper-plane"></i>

                    <h3 class="box-title">{{ $page_description }}</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-8" style="border-right:1px solid #f3f3f3">
                            <!-- Post -->
                            <div class="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="bg-primary" style="padding: 2px;">LAPORAN:</h5>

                                        <p>Yth: Camat {{ \App\Models\Kecamatan::find(env('KD_DEFAULT_PROFIL'))->nama }}</p>
                                        <br>
                                        <p>
                                            {!! $komplain->laporan !!}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="bg-primary" style="padding: 2px;">LAMPIRAN:</h5>
                                        @if($komplain->lampiran1 == '' && $komplain->lampiran2 == '' && $komplain->lampiran3 == '' && $komplain->lampiran4 == '')
                                            <p>
                                                Tidak ada lampiran.
                                            </p>
                                        @else
                                            @if(! $komplain->lampiran1 == '')
                                                <img src="{{ asset($komplain->lampiran1) }}"
                                                     alt="{{ $komplain->komplain_id}}-Lampiran1" class="img-thumbnail"
                                                     style="width:80px; height:100px;">
                                            @endif
                                            @if(! $komplain->lampiran2 == '')
                                                <img src="{{ asset($komplain->lampiran2) }}"
                                                     alt="{{ $komplain->komplain_id}}-Lampiran2" class="img-thumbnail"
                                                     style="width:80px; height:100px">
                                            @endif
                                            @if(! $komplain->lampiran3 == '')
                                                <img src="{{ asset($komplain->lampiran3) }}"
                                                     alt="{{ $komplain->komplain_id}}-Lampiran3" class="img-thumbnail"
                                                     style="width:80px; height:100px">
                                            @endif
                                            @if(! $komplain->lampiran4 == '')
                                                <img src="{{ asset($komplain->lampiran4) }}"
                                                     alt="{{ $komplain->komplain_id}}-Lampiran4" class="img-thumbnail"
                                                     style="width:80px; height:100px">
                                            @endif
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="bg-primary" style="padding: 2px;">TINDAK LANJUT:</h5>

                                        <div class="media well well-sm">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="http://placehold.it/32x32" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">Media heading</h4>

                                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                                    sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus
                                                    viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec
                                                    lacinia congue felis in faucibus.</p>
                                            </div>
                                        </div>
                                        <div class="media well well-sm">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="http://placehold.it/32x32" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">Media heading</h4>

                                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                                    sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus
                                                    viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec
                                                    lacinia congue felis in faucibus.</p>
                                            </div>
                                        </div>
                                        <div class="media well well-sm">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="http://placehold.it/32x32" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">Media heading</h4>

                                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                                    sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus
                                                    viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec
                                                    lacinia congue felis in faucibus.</p>
                                            </div>
                                        </div>
                                        <div class="media well well-sm">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="http://placehold.it/32x32" alt="...">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">Media heading</h4>

                                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                                    sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus
                                                    viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec
                                                    lacinia congue felis in faucibus.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.post -->
                        </div>
                        <div class="col-md-4">
                            <div class="user-block">
                                <img class="img-circle img-bordered-md"
                                     src="{{ asset('/bower_components/admin-lte/dist/img/user2-160x160.jpg') }}"
                                     alt="user image">
                                <span class="username">
                                  <a href="{{ route('sistem-komplain.komplain', $komplain->slug) }}">TRACKING ID
                                      #{{ $komplain->komplain_id }}</a>
                                </span>
                                <span class="description">PENGGUNA : {{ $komplain->nama }}</span>
                            </div>
                            <!-- /.user-block -->
                            <br>
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>KATEGORI</th>
                                    <td>{{ $komplain->kategori }}</td>
                                </tr>
                                <tr>
                                    <th>TANGGAL LAPOR</th>
                                    <td>{{ format_date($komplain->created_at) }}</td>
                                </tr>
                                <tr>
                                    <th>STATUS</th>
                                    <td>{{ ucfirst(strtolower($komplain->status)) }}</td>
                                </tr>
                            </table>
                            <div class="pull-right">
                                <div class="control-group">
                                    @if(! Sentinel::guest())

                                        <a href="#" class="btn btn-sm btn-primary"><i
                                                    class="fa fa-reply margin-r-5"></i> Jawab</a>
                                        <a href="{{ route('sistem-komplain.edit', $komplain->komplain_id) }}"
                                           class="btn btn-sm btn-info"><i class="fa fa-edit margin-r-5"></i> Ubah</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['sistem-komplain.destroy', $komplain->id],'style'=>'display:inline']) !!}

                                        <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Yakin akan menghapus data tersebut?')"><i
                                                    class="fa fa-trash margin-r-5"></i> Hapus
                                        </button>

                                        {!! Form::close() !!}
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer clearfix">
                    <a href="{{ route('sistem-komplain.index') }}" class="pull-right">
                        <button type="button" class="btn btn-default btn-sm"><i
                                    class="fa fa-refresh"></i> Kembali
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->
@endsection