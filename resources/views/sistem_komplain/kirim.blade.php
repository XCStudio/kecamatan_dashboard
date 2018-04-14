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
            {!! Form::open( [ 'route' => 'sistem-komplain.store', 'method' => 'post','id' => 'form-komplain', 'class' => 'form-horizontal form-label-left', 'files'=>true] ) !!}
            <div class="box box-primary">
                <div class="box-header">
                    <i class="fa fa-paper-plane"></i>

                    <h3 class="box-title">{{ $page_title }}</h3>
                </div>
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

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('nik') ? ' has-error' : '' }}">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">NIK <span class="required">*</span></label>

                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    {!! Form::text('nik', null,['placeholder'=>'NIK', 'class'=>'form-control', 'required']) !!}
                                    @if ($errors->has('nik'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nik') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Nama <span class="required">*</span></label>

                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    {!! Form::text('nama', null,['placeholder'=>'Nama', 'class'=>'form-control', 'required', 'readonly'=>true ]) !!}
                                    @if ($errors->has('nama'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nama') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Judul <span class="required">*</span></label>

                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    {!! Form::text('judul', null,['placeholder'=>'Judul', 'class'=>'form-control', 'required']) !!}
                                    @if ($errors->has('judul'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('judul') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('laporan') ? ' has-error' : '' }}">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Laporan <span class="required">*</span></label>

                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    {!! Form::textArea('laporan', null,['placeholder'=>'Laporan', 'class'=>'form-control', 'required']) !!}
                                    @if ($errors->has('laporan'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('laporan') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('laporan1') ? ' has-error' : '' }}">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Lampiran</label>

                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview" style="background-image: url(http://placehold.it/80x100);">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview" style="background-image: url(http://placehold.it/80x100);">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview" style="background-image: url(http://placehold.it/80x100);">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview" style="background-image: url(http://placehold.it/80x100);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                                <label for="password" class="control-label col-md-2 col-sm-3 col-xs-12">Kode Verifikasi <span class="required">*</span></label>

                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="captcha">
                                        <span>{!! captcha_img('mini') !!}</span>
                                        <button type="button" class="btn btn-success btn-refresh"><i class="fa fa-refresh"></i></button>
                                    </div>
                                    <input id="captcha" type="text" class="form-control" placeholder="Masukan Kode Verifikasi" name="captcha">
                                    @if ($errors->has('captcha'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('captcha') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="box-footer clearfix">
                    <div class="pull-right">
                        <div class="control-group">
                            <a href="{{ route('sistem-komplain.index') }}">
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Batal
                                </button>
                            </a>
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->
@endsection

@include('partials.asset_upload_images')

@push('scripts')

<script type="text/javascript">


    $(".btn-refresh").click(function(){
        $.ajax({
            type:'GET',
            url:'/refresh-captcha',
            success:function(data){
                $(".captcha span").html(data.captcha);
            }
        });
    });


</script>

@endpush