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
        <li class="active">{{$page_title}}</li>
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
                @if(isset($regulasi))
                    <div class="box-body">

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <div class="pull-right">
                            @unless(!Sentinel::check())
                                <a href="{{ route('profil.regulasi.edit', $regulasi->id) }}">
                                    <button type="submit"
                                            class="btn btn-sm btn-primary">Ubah
                                    </button>
                                </a>&nbsp;
                                {!! Form::open(['method' => 'DELETE','route' => ['profil.regulasi.destroy', $regulasi->id],'style'=>'display:inline']) !!}

                                {!! Form::submit('Hapus', ['class' => 'btn btn-sm btn-danger', 'onclick' => 'return confirm("Yakin akan menghapus data tersebut?")']) !!}

                                {!! Form::close() !!}
                            @endunless
                        </div>
                    </div>
                @else
                    <div class="box-body">
                        <h3>Data not found.</h3>
                        Sorry no data available right now!
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <div class="pull-right">

                        </div>
                    </div>
                @endif
                <!-- /.box-footer -->
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-primary limit-p-width">
                <div class="box-body">
                    <div class="caption">
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <select name="kid" class="form-control select2" id="kid" style="width: 100%;">
                                <option value="1" selected="selected">Aikmel</option>
                                <option value="2">Sarang Selatan</option>
                                <option value="3">Cipunagara</option>
                                <option value="4">Pegaden Baru</option>
                            </select>
                        </div>

                        <h3></h3>
                        <a href="{{route('profil.regulasi.create')}}"
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

@include('partials.asset_select2')

@push('scripts')
<script lang="javascript">
    $(function () {

        $('.select2').select2();
        $('#kid').on('select2:select', function (e) {
            var url = "{{ \Illuminate\Support\Facades\URL::to('profil/visi-misi/show') }}";
            window.location = url + "/" + this.value;
        });
    });
</script>
@endpush