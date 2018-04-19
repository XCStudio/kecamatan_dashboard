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
            <a href="{{ route('sistem-komplain.kirim') }}" class="btn btn-warning btn-block margin-bottom"><b><i class="fa fa-paper-plane"></i> Kirim Komplain</b></a>

            <!-- Form Tracking Komplain -->
            {{ csrf_field() }}

            <div class="box box-danger box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-search"></i>

                    <h3 class="box-title">Lacak Komplain Anda!</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body box-profile">
                    <form class="form-horizontal">
                        <div class="input-group input-group-sm">
                            <input class="form-control" type="text" name="q" placeholder="Tracking ID Komplain Anda">
                            <span class="input-group-btn"><button type="submit" class="btn btn-warning btn-flat">Lacak
                                </button></span>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- Trending Box -->
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-line-chart"></i>

                    <h3 class="box-title">Terpopuler</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="#"><i class="fa fa-comment"></i> LAMPU JALAN MATI TOTAL</a></li>
                        <li><a href="#"><i class="fa fa-comment"></i> Trotoar yang dijadikan tempat berdagang oleh
                                Pedagang Kaki Lima</a></li>
                        <li><a href="#"><i class="fa fa-comment"></i> Keluhan Kebersihan RS Pelamonia Makassar</a></li>
                        <li><a href="#"><i class="fa fa-comment"></i> LAMPU JALAN MATI TOTAL</a></li>
                        <li><a href="#"><i class="fa fa-comment"></i> Trotoar yang dijadikan tempat berdagang oleh
                                Pedagang Kaki Lima</a></li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- Trending Box -->
            <div class="box box-success">
                <div class="box-header">
                    <i class="fa fa-check-square-o"></i>

                    <h3 class="box-title">Kisah Sukses</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="#"><i class="fa fa-comment"></i> LAMPU JALAN MATI TOTAL</a></li>
                        <li><a href="#"><i class="fa fa-comment"></i> Trotoar yang dijadikan tempat berdagang oleh
                                Pedagang Kaki Lima</a></li>
                        <li><a href="#"><i class="fa fa-comment"></i> Keluhan Kebersihan RS Pelamonia Makassar</a></li>
                        <li><a href="#"><i class="fa fa-comment"></i> LAMPU JALAN MATI TOTAL</a></li>
                        <li><a href="#"><i class="fa fa-comment"></i> Trotoar yang dijadikan tempat berdagang oleh
                                Pedagang Kaki Lima</a></li>
                        <li><a href="#"><i class="fa fa-comment"></i> LAMPU JALAN MATI TOTAL</a></li>
                        <li><a href="#"><i class="fa fa-comment"></i> Trotoar yang dijadikan tempat berdagang oleh
                                Pedagang Kaki Lima</a></li>
                        <li><a href="#"><i class="fa fa-comment"></i> Keluhan Kebersihan RS Pelamonia Makassar</a></li>
                        <li><a href="#"><i class="fa fa-comment"></i> LAMPU JALAN MATI TOTAL</a></li>
                        <li><a href="#"><i class="fa fa-comment"></i> Trotoar yang dijadikan tempat berdagang oleh
                                Pedagang Kaki Lima</a></li>
                    </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="#" class="footer">Lihat Semua</a>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <!-- kirim komplain form -->           
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-paper-plane"></i>

                    <h3 class="box-title">{{ $page_title.': '.$page_description }}</h3>
                </div>
                <div class="box-body">
                  <div class="row">
                      <div class="col-md-8" style="border-right:1px solid #f3f3f3">
                        <!-- Post -->
                        <div class="post">
                          <h4>
                             LAPORAN:
                          </h4>
                          <p>
                            {!! $komplain->laporan !!} ...
                          </p>
                          
                          <br>
                          <h4>
                            LAMPIRAN:
                          </h4>
                          @if($komplain->lampiran1 == '' && $komplain->lampiran2 == '' && $komplain->lampiran3 == '' && $komplain->lampiran4 == '')
                            <p>
                                Tidak ada lampiran.
                            </p>
                          @else
                            @if(! $komplain->lampiran1 == '')
                              <img src="{{ asset($komplain->lampiran1) }}" alt="{{ $komplain->komplain_id}}-Lampiran1" class="img-thumbnail" style="width:80px; height:100px;">
                            @endif
                            @if(! $komplain->lampiran2 == '')
                              <img src="{{ asset($komplain->lampiran2) }}" alt="{{ $komplain->komplain_id}}-Lampiran2" class="img-thumbnail" style="width:80px; height:100px">
                            @endif
                            @if(! $komplain->lampiran3 == '')
                              <img src="{{ asset($komplain->lampiran3) }}" alt="{{ $komplain->komplain_id}}-Lampiran3" class="img-thumbnail" style="width:80px; height:100px">
                            @endif
                            @if(! $komplain->lampiran4 == '')
                              <img src="{{ asset($komplain->lampiran4) }}" alt="{{ $komplain->komplain_id}}-Lampiran4" class="img-thumbnail" style="width:80px; height:100px">
                            @endif
                          @endif
                          <br>
                          <h4>
                            TINDAK LANJUT:
                          </h4>
                        </div>
                        <!-- /.post -->
                      </div>
                      <div class="col-md-4">
                           <div class="user-block">
                            <img class="img-circle img-bordered-md" src="{{ asset('/bower_components/admin-lte/dist/img/user2-160x160.jpg') }}"  alt="user image">
                                <span class="username">
                                  <a href="{{ route('sistem-komplain.komplain', $komplain->slug) }}">TRACKING ID #{{ $komplain->komplain_id }}</a>
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
                                  <th>KATEGORI</th>
                                  <td>{{ $komplain->kategori }}</td>
                              </tr> 
                            </table>
                      </div>
                  </div>
                </div>
                <div class="box-footer clearfix">
                    <div class="pull-right">
                        <div class="control-group">
                            @if(! Sentinel::guest())
                             
                                  <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-reply margin-r-5"></i> Jawab</a>
                                  <a href="{{ route('sistem-komplain.edit', $komplain->komplain_id) }}" class="btn btn-xs btn-info"><i class="fa fa-edit margin-r-5"></i> Ubah</a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['sistem-komplain.destroy', $komplain->id],'style'=>'display:inline']) !!}

                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin akan menghapus data tersebut?')"><i class="fa fa-trash margin-r-5"></i> Hapus</button>

                                    {!! Form::close() !!}
                            @endif
                            <a href="{{ route('sistem-komplain.index') }}">
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Kembali
                                </button>
                            </a>
                        </div>
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