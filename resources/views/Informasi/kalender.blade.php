@extends('layouts.dashboard_template')

@section('content')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ $page_title or "Page Title" }}
        <small>{{ $page_description or null }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="box">
        <div class="box-header with-border">
            <h3>Kalender Kecamatan</h3>
        </div>
    </div>
</section>
<!-- /.content -->

@endsection