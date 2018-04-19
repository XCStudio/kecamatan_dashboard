@extends('layouts.dashboard_template')

@section('title') Data Umum @endsection

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
            <h3 class="box-title">Data {{ $page_title or "Page Title" }}</h3>
        </div>
        <div class="box-body no-padding">
          <div class="row">
            <div class="col-md-9 col-sm-8">
              <div class="pad">
                <!-- Map will be created here -->
                <div id="world-map-markers" style="height: 325px;"></div>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-4">
              <div class="pad box-pane-right bg-green" style="min-height: 280px">
                <div class="description-block margin-bottom">
                  <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                  <h5 class="description-header">8390</h5>
                  <span class="description-text">Visits</span>
                </div>
                <!-- /.description-block -->
                <div class="description-block margin-bottom">
                  <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                  <h5 class="description-header">30%</h5>
                  <span class="description-text">Referrals</span>
                </div>
                <!-- /.description-block -->
                <div class="description-block">
                  <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                  <h5 class="description-header">70%</h5>
                  <span class="description-text">Organic</span>
                </div>
                <!-- /.description-block -->
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
    </div>

</section>
<!-- /.content -->
@endsection
