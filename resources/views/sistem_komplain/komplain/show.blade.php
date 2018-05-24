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
                                        {{ Form::hidden('komplain_id', $komplain->komplain_id,['id'=>'komplain_id']) }}
                                        <div id="jawabans"></div>
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
                                <span class="description">PELAPOR : {{ $komplain->nama }}</span>
                            </div>
                            <!-- /.user-block -->
                            <br>
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>KATEGORI</th>
                                    <td>{{ $komplain->kategori_komplain->nama }}</td>
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

                                        <a id="btn-reply" href="#" data-href="{{ route('sistem-komplain.reply', $komplain->komplain_id) }}" class="btn btn-sm btn-primary"><i
                                                    class="fa fa-reply margin-r-5"></i> Jawab</a>
                                        <a href="{{ route('sistem-komplain.edit', $komplain->komplain_id) }}"
                                           class="btn btn-sm btn-info"><i class="fa fa-edit margin-r-5"></i> Ubah</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['sistem-komplain.destroy', $komplain->id],'style'=>'display:inline']) !!}

                                        <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Yakin akan menghapus data tersebut?')"><i
                                                    class="fa fa-trash margin-r-5"></i> Hapus
                                        </button>

                                        {!! Form::close() !!}
                                        @else
                                        <a id="btn-reply" data-href="{{ route('sistem-komplain.reply', $komplain->komplain_id) }}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i> Jawab</a>
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

@push('scripts')
<script type="application/javascript">


    $(function () {

        var id_komplain = $('#komplain_id').val();
        refresh_jawaban(id_komplain);

        var url = '';
        $(document).on('click', '#btn-reply', function(e) {
            url = $(this).attr('data-href');
            $('#form-reply').attr('action', url );
            $('#myModal').modal({
                backdrop: 'static',
                keyboard: false
            });
            e.preventDefault();
        });

        $('#form-reply').on('submit', function(e) {
            e.preventDefault();
            var jawab = $('#jawab').val();
            var komplain_id = $('#komplain_id').val();

            $.ajax({
                type: "POST",
                url: url,
                data: $("#form-reply").serialize(),
                success: function( msg ) {
                    if(msg.status == 'success'){
                        refresh_jawaban(id_komplain);
                        $('#jawab').val('');
                        $('#myModal').modal('hide');
                    }
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
        });
    });

    function refresh_jawaban(id_komplain)
    {
        $.ajax({
            type: "GET",
            url: '{{ route('sistem-komplain.jawabans') }}',
            data: {id:id_komplain} ,
            success: function( data ) {
                $('#jawabans').html(data);
            },
        });
    }
</script>

<!-- Modal HTML -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['id' => 'form-reply', 'method' => 'POST']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Jawab Laporan</h4>
            </div>
            <div class="modal-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="dijawab" class="control-label col-md-4 col-sm-3 col-xs-12">Dijawab oleh <span class="required">*</span></label>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::select('penjawab', ['PELAPOR'=>'Pelapor', 'ADMIN'=>'Admin'], null,['class'=>'form-control', 'id'=>'dijawab', 'required']) !!}
                    </div>
                </div>

                <label for="jawab" class="control-label col-md-4 col-sm-3 col-xs-12">Jawaban<span class="required">*</span></label>

                    {{ Form::textarea('jawaban', null, ['class'=>'form-control', 'id'=>'jawab']) }}

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endpush