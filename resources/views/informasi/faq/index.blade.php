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
                <div class="box-body">
                    <section class="content-max-width">
                        <section id="faq">
                            @if(count($faqs) > 0)
                                @foreach($faqs as $faq)
                                    <h3>{{$faq->question}}</h3>

                                    <p>{!! $faq->answer !!}</p>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pull-right">
                                                @unless(!Sentinel::check())
                                                    <a href="{{ route('informasi.faq.edit', $faq->id) }}">
                                                        <button type="submit"
                                                                class="btn btn-sm btn-primary">Ubah
                                                        </button>
                                                    </a>&nbsp;
                                                    {!! Form::open(['method' => 'DELETE','route' => ['informasi.faq.destroy', $faq->id],'style'=>'display:inline']) !!}

                                                    {!! Form::submit('Hapus', ['class' => 'btn btn-sm btn-danger', 'onclick' => 'return confirm("Yakin akan menghapus data tersebut?")']) !!}

                                                    {!! Form::close() !!}
                                                @endunless
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            @else
                                <h3>Data not found!</h3>

                                <p>Sorry no data available right now!</p>
                            @endif

                        </section>
                    </section>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    {!! $faqs->links() !!}
                </div>
                <!-- /.box-footer -->
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-primary limit-p-width">
                <div class="box-body">
                    <div class="caption">
                        <form class="form-horizontal">
                            <div class="input-group input-group-sm">
                                <input class="form-control" type="text" name="cari" placeholder="Cari">
                                    <span class="input-group-btn">
                                      <button type="submit" class="btn btn-primary btn-flat">Cari</button>
                                    </span>
                            </div>
                        </form>

                        <h3></h3>
                        <a href="{{route('informasi.faq.create')}}"
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