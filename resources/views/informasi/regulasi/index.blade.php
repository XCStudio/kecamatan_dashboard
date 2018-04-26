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
                        <ul class="list-group">

                            @foreach($regulasi as $item)
                                <a class="list-group-item" href="{{ route('informasi.regulasi.show', $item->id) }}" title="{{ $item->judul }}">
                                    <h4 class="list-group-item-heading">{{ $item->judul }}</h4>

                                    <p class="list-group-item-text">

                                        {{ $item->deskripsi }}
                                    </p>
                                    @unless(!Sentinel::check())
                                        <a href="{{ route('informasi.regulasi.edit', $item->id) }}">
                                            <button type="submit"
                                                    class="btn btn-xs btn-primary">Ubah
                                            </button>
                                        </a>&nbsp;
                                        {!! Form::open(['method' => 'DELETE','route' => ['informasi.regulasi.destroy', $item->id],'style'=>'display:inline']) !!}

                                        {!! Form::submit('Hapus', ['class' => 'btn btn-xs btn-danger', 'onclick' => 'return confirm("Yakin akan menghapus data tersebut?")']) !!}

                                        {!! Form::close() !!}
                                    @endunless
                                </a>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {!! $regulasi->links() !!}
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
                            <input type="hidden" id="defaultProfil" value="{{ $defaultProfil }}">
                            <select class="form-control" id="kecamatan" name="kecamatan" onchange=""></select>
                        </div>

                        <h3></h3>
                        <a href="{{route('informasi.regulasi.create')}}"
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
<script>
    $(function () {

        $('#kecamatan').select2({
            placeholder: "Pilih Kecamatan",
            allowClear: true,
            ajax: {
                url: '{!! route('api.profil') !!}',
                dataType: 'json',
                delay: 200,
                data: function (params) {
                    return {
                        q: params.term,
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    return {
                        results: data.data,
                        pagination: {
                            more: (params.page * 10) < data.total
                        }
                    };
                }
            },
            minimumInputLength: 1,
            templateResult: function (repo) {
                if (repo.loading) return repo.nama;
                var markup = repo.nama;
                return markup;
            },
            templateSelection: function (repo) {
                return repo.nama;
            },
            escapeMarkup: function (markup) {
                return markup;
            },
            initSelection: function (element, callback) {

                //var id = $(element).val();
                var id = $('#defaultProfil').val();
                if (id !== "") {
                    $.ajax('{!! route('api.profil-byid') !!}', {
                        data: {id: id},
                        dataType: "json"
                    }).done(function (data) {
                        callback(data);
                    });
                }
            }
        });
    });
</script>

@endpush
