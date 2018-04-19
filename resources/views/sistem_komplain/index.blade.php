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
                <span class="input-group-btn"><button type="submit" class="btn btn-warning btn-flat">Lacak</button></span>
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
                <li><a href="#"><i class="fa fa-comment"></i> Trotoar yang dijadikan tempat berdagang oleh Pedagang Kaki Lima</a></li>
                <li><a href="#"><i class="fa fa-comment"></i> Keluhan Kebersihan RS Pelamonia Makassar</a></li>
                <li><a href="#"><i class="fa fa-comment"></i> LAMPU JALAN MATI TOTAL</a></li>
                <li><a href="#"><i class="fa fa-comment"></i> Trotoar yang dijadikan tempat berdagang oleh Pedagang Kaki Lima</a></li>
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
                <li><a href="#"><i class="fa fa-comment"></i> Trotoar yang dijadikan tempat berdagang oleh Pedagang Kaki Lima</a></li>
                <li><a href="#"><i class="fa fa-comment"></i> Keluhan Kebersihan RS Pelamonia Makassar</a></li>
                <li><a href="#"><i class="fa fa-comment"></i> LAMPU JALAN MATI TOTAL</a></li>
                <li><a href="#"><i class="fa fa-comment"></i> Trotoar yang dijadikan tempat berdagang oleh Pedagang Kaki Lima</a></li>
                <li><a href="#"><i class="fa fa-comment"></i> LAMPU JALAN MATI TOTAL</a></li>
                <li><a href="#"><i class="fa fa-comment"></i> Trotoar yang dijadikan tempat berdagang oleh Pedagang Kaki Lima</a></li>
                <li><a href="#"><i class="fa fa-comment"></i> Keluhan Kebersihan RS Pelamonia Makassar</a></li>
                <li><a href="#"><i class="fa fa-comment"></i> LAMPU JALAN MATI TOTAL</a></li>
                <li><a href="#"><i class="fa fa-comment"></i> Trotoar yang dijadikan tempat berdagang oleh Pedagang Kaki Lima</a></li>
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
           <!-- quick email widget -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="fa fa-comments"></i>
              <h3 class="box-title">Daftar Komplain</h3>
            </div>
            <div class="box-body">
                @if(count($komplains) > 0)
                  @foreach ($komplains as $item)
                  <!-- Post -->
                  <div class="post">
                    <div class="user-block">
                      <img class="img-circle img-bordered-sm" src="{{ asset('/bower_components/admin-lte/dist/img/user2-160x160.jpg') }}"  alt="user image">
                          <span class="username">
                            <a href="{{ route('sistem-komplain.komplain', $item->slug) }}">{{ $item->judul }}</a>
                            <a href="#" class="pull-right btn-box-tool"><span class="label label-default">{{ $item->kategori }}</span></a>
                          </span>
                      <span class="description">{{ $item->nama }} melaporkan - {{ diff_for_humans($item->created_at) }}</span>
                    </div>
                    <!-- /.user-block -->
                    <p>
                      {!! get_words($item->laporan, 35) !!} ...
                    </p>
                    <ul class="list-inline">
                      <li><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Tindak Lanjut Laporan (4)</a></li>
                        @if(! Sentinel::guest())
                          <li class="pull-right">
                            <a href="#" class="btn btn-xs btn-primary"><i class="fa fa-reply margin-r-5"></i> Jawab</a>
                            <a href="{{ route('sistem-komplain.edit', $item->komplain_id) }}" class="btn btn-xs btn-info"><i class="fa fa-edit margin-r-5"></i> Ubah</a>
                              {!! Form::open(['method' => 'DELETE','route' => ['sistem-komplain.destroy', $item->id],'style'=>'display:inline']) !!}

                              <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Yakin akan menghapus data tersebut?')"><i class="fa fa-trash margin-r-5"></i> Hapus</button>

                              {!! Form::close() !!}

                          </li>
                        @endif
                    </ul>

                    <input class="form-control input-sm" type="text" placeholder="Type a comment">
                  </div>
                  <!-- /.post -->
                   @endforeach
                @else
                   <h3>
                    Data tidak tersedia!
                  </h3>
                @endif
            </div>
            <div class="box-footer clearfix">
                <span></span>
            </div>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

</section>
<!-- /.content -->
@endsection