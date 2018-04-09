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
          <a href="#" class="btn btn-warning btn-block margin-bottom"><b><i class="fa fa-paper-plane"></i> Kirim Komplain</b></a>

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
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{ asset('/bower_components/admin-lte/dist/img/user2-160x160.jpg') }}"  alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="pull-right btn-box-tool"><span class="label label-default">INFRASTRUKTUR</span></i></a>
                        </span>
                    <span class="description">Shared publicly - 7:30 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <h4>
                      <strong>LAMPU JALAN MATI TOTAL</strong>
                  </h4>
                  @php
                    $sentence = "Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans."
              
                    
                  @endphp
                  <p>
                    {!! get_words($sentence, 35) !!} ...
                  </p>
                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>

                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post clearfix">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{ asset('/bower_components/admin-lte/dist/img/user2-160x160.jpg') }}"  alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="pull-right btn-box-tool"><span class="label label-default">INFRASTRUKTUR</span></i></a>
                        </span>
                    <span class="description">Sent you a message - 3 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <h4>
                    <strong>Trotoar yang dijadikan tempat berdagang oleh Pedagang Kaki Lima</strong>
                  </h4>
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>

                  <form class="form-horizontal">
                    <div class="form-group margin-bottom-none">
                      <div class="col-sm-9">
                        <input class="form-control input-sm" placeholder="Response">
                      </div>
                      <div class="col-sm-3">
                        <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{ asset('/bower_components/admin-lte/dist/img/user2-160x160.jpg') }}" alt="User Image">
                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="pull-right btn-box-tool"><span class="label label-default">INFRASTRUKTUR</span></a>
                        </span>
                    <span class="description">Posted 5 photos - 5 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <h4>
                    <strong>Keluhan Kebersihan RS Pelamonia Makassar</strong>
                  </h4>
                  <div class="row margin-bottom">
                    
                   
                  </div>
                  <!-- /.row -->

                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>

                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->
            </div>
            <div class="box-footer clearfix">
              <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
                <i class="fa fa-arrow-circle-right"></i></button>
            </div>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

</section>
<!-- /.content -->
@endsection