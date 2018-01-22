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
        <li><a href="{{route('informasi.event.index')}}">Events</a></li>
        <li class="active">{{$page_title}}</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                {{-- <div class="box-header with-border">
                     <h3 class="box-title">Aksi</h3>
                 </div>--}}
                <!-- /.box-header -->

                        <!-- form start -->
                {!! Form::open( [ 'route' => 'informasi.event.store', 'method' => 'post','id' => 'form-event', 'class' => 'form-horizontal form-label-left' ] ) !!}

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
                    @include('informasi.event.form')

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="{{ route('informasi.faq.index') }}">
                                <button type="button" class="btn btn-default btn-sm">Batal</button>
                            </a>
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->
@endsection

@push('css')
        <!-- WYSIHTML5 -->
<link rel="stylesheet" href="{{ asset ("/bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css") }}">
<link rel="stylesheet" href="{{ asset ("/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css") }}">
@endpush

@push('scripts')
        <!-- WYSIHTML5 -->
<script src="{{ asset ("/bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js") }}"></script>
<script src="{{ asset ("/bower_components/moment/min/moment.min.js") }}"></script>
<script src="{{ asset ("/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js") }}"></script>
<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()

        //Datetimepicker
        $('.datetime').each(function() {
            var $this = $(this);
            $this.datetimepicker({
                format: 'YYYY-MM-D HH:mm'
            });
        });
    })


</script>
@endpush