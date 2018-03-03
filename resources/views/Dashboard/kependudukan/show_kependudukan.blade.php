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

            <form class="form-horizontal">
                <div class="col-md-4">

                    <div class="form-group">
                        <label for="list_kecamatan" class="col-sm-4 control-label">Kecamatan</label>

                        <div class="col-sm-8">
                            <input type="hidden" id="defaultProfil" value="{{ $defaultProfil }}">
                            <select class="form-control" id="list_kecamatan" name="kecamatan">
                                @foreach($list_kecamatan as $kecamatan)
                                    @if($kecamatan->kecamatan_id == $defaultProfil)
                                        <option value="{{ $kecamatan->kecamatan_id }}"
                                                selected="true">{{ $kecamatan->kecamatan->nama }}</option>
                                    @else
                                        <option value="{{ $kecamatan->kecamatan_id }}">{{ $kecamatan->kecamatan->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="list_desa" class="col-sm-4 control-label">Desa</label>

                        <div class="col-sm-8">
                            <select class="form-control" id="list_desa">
                                <option value="ALL">ALL</option>
                                @foreach($list_desa as $desa)
                                    <option value="{{$desa->id}}">{{$desa->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="list_year" class="col-sm-4 control-label">Tahun</label>

                        <div class="col-sm-8">
                            <select class="form-control" id="list_year">
                                @foreach($year_list as $year)
                                    <option value="{{$year}}">{{$year}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.row -->

    {{--Div replace by Kecamatan--}}

    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Penduduk</span>
                    <span class="info-box-number" id="total_penduduk">{!! $total_penduduk !!}</span>
                    <a id="hrefpenduduk" class="small-box-footer"
                       href="data.php?cat=allpenduduk&amp;kec=5203090&amp;desa=ALL&amp;tahun=2017">Detail Info <i
                                class="fa fa-arrow-circle-right"></i></a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-male"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Laki-Laki</span>
                    <span class="info-box-number" id="total_lakilaki">{!! $total_lakilaki !!}</span>
                    <a id="hrefpenduduklakilaki" class="small-box-footer"
                       href="data.php?cat=allpenduduklaki&amp;kec=5203090&amp;desa=ALL&amp;tahun=2017">Detail Info
                        <i
                                class="fa fa-arrow-circle-right"></i></a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-female"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Perempuan</span>
                    <span class="info-box-number" id="total_perempuan">{!! $total_perempuan !!}</span>
                    <a id="hrefpendudukperempuan" class="small-box-footer"
                       href="data.php?cat=allpendudukperempuan&amp;kec=5203090&amp;desa=ALL&amp;tahun=2017">Detail
                        Info
                        <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span><img src="{{asset("img/cacat_logo.png")}}" style="width:90px;height:90px;float:left;">
                    <!-- <i class="fa fa-wheelchair"></i> --></span>

                <div class="info-box-content">
                    <span class="info-box-text">Disabilitas</span>
                    <span class="info-box-number" id="total_disabilitas">{!! $total_disabilitas !!}</span>
                    <a id="hrefpendudukcacat" class="small-box-footer"
                       href="data.php?cat=allpendudukcacat&amp;kec=5203090&amp;desa=ALL&amp;tahun=2017">Detail Info
                        <i
                                class="fa fa-arrow-circle-right"></i></a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>


        <!-- /.col -->
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-8">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Grafik Penduduk Per Tahun</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-center">
                                <strong></strong>
                            </p>

                            <div id="chart_pertumbuhan_penduduk"
                                 style="width: 100%; height: 300px; overflow: visible; text-align: left;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box bg-green">
                <span class="info-box-icon"><i class="ion ion-card"></i></span>

                <div class="info-box-content">
                    <span class="info-box-number">KTP</span>
                    <span class="info-box-text" id="data_ktp">{!! $ktp_terpenuhi !!} dari {!! $total_penduduk !!}
                        Jiwa Terpenuhi</span>

                    <div class="progress">
                        <div id="ktp_persen" class="progress-bar" style="width: {!! $ktp_persen_terpenuhi !!}%"></div>
                    </div>
                    <span id="ktp_terpenuhi" class="progress-description">{!! $ktp_persen_terpenuhi !!}
                        % Jiwa Terpenuhi</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

            <div class="info-box bg-red">
                <span class="info-box-icon"><i class="ion ion-ios-paper-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-number">Akta Kelahiran</span>
                    <span class="info-box-text" id="data_akta">{!! $akta_terpenuhi !!} dari {!! $total_penduduk !!}
                        Jiwa Terpenuhi</span>

                    <div class="progress">
                        <div id="akta_persen" class="progress-bar" style="width: {!! $akta_persen_terpenuhi !!}%"></div>
                    </div>
                    <span id="akta_terpenuhi" class="progress-description">{!! $akta_persen_terpenuhi !!}% Jiwa Terpenuhi</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

            <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="ion ion-clipboard"></i></span>

                <div class="info-box-content">
                    <span class="info-box-number">Akta Nikah</span>
                    <span class="info-box-text" id="data_nikah">{!! $aktanikah_terpenuhi !!}
                        dari {!! $total_penduduk !!}
                        Jiwa Terpenuhi</span>

                    <div class="progress">
                        <div id="nikah_persen" class="progress-bar"
                             style="width: {!! $aktanikah_persen_terpenuhi !!}%"></div>
                    </div>
                    <span id="nikah_terpenuhi" class="progress-description">{!! $aktanikah_persen_terpenuhi !!}% Jiwa Terpenuhi</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.row -->

        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" id="idtest">Jumlah Penduduk Berdasarkan Usia</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i>
                        </button>
                    </div>
                </div>

                <!-- ./box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-12 col-xs-6">
                            <div id="chart_usia"
                                 style="width:100%; height: 500px; overflow: visible; text-align: left;">

                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <!-- /.row -->
    </div>
</section>
<!-- /.content -->
@endsection

@include('partials.asset_amcharts')
@include('partials.asset_select2')
@push('scripts')
<script>
    $(function () {

        // Select 2 Kecamatan
        $('#list_kecamatan').select2();
        $('#list_desa').select2();
        $('#list_year').select2();

        // Change div das_kependudukan when Kecamatan changed
        $('#list_kecamatan').on('select2:select', function (e) {
            var kid = e.params.data;
            var did = $('#list_desa').find(":selected").val();
            var year = $('#list_year').find(":selected").text();

            change_das_kependudukan(kid.id, did, year);
        });

        $('#list_desa').on('select2:select', function (e) {
            var kid = $('#list_kecamatan').val();
            var did = e.params.data;
            var year = $('#list_year').find(":selected").text();

            change_das_kependudukan(kid, did.id, year);
        });

        $('#list_year').on('select2:select', function (e) {
            var kid = $('#list_kecamatan').val();
            var did = $('#list_desa').find(":selected").val();
            var year = this.value;
            change_das_kependudukan(kid, did, year);
        });


        var kid = $('#list_kecamatan').val();
        if (kid == null) {
            kid = $('#defaultProfil').val();
        }
        var did = $('#list_desa').find(":selected").val();
        var year = $('#list_year').find(":selected").text();

        change_das_kependudukan(kid, did, year);


    });

    function change_das_kependudukan(kid, did, year) {
        $.ajax('{!! route('dashboard.show-kependudukan') !!}', {
            data: {kid: kid, did: did, y: year}
        }).done(function (data) {

            $('#total_penduduk').html(data.total_penduduk);
            $('#total_lakilaki').html(data.total_lakilaki);
            $('#total_perempuan').html(data.total_perempuan);
            $('#total_disabilitas').html(data.total_disabilitas);
            $('#total_disabilitas').html(data.total_disabilitas);

            $('#data_ktp').html(data.ktp_terpenuhi + ' dari ' + data.total_penduduk + ' Jiwa Terpenuhi');
            $('#ktp_persen').css('width', data.ktp_persen_terpenuhi + '%');
            $('#ktp_terpenuhi').html(data.ktp_persen_terpenuhi + '% Jiwa Terpenuhi');

            $('#data_akta').html(data.akta_terpenuhi + ' dari ' + data.total_penduduk + ' Jiwa Terpenuhi');
            $('#akta_persen').css('width', data.akta_persen_terpenuhi + '%');
            $('#akta_terpenuhi').html(data.akta_persen_terpenuhi + '% Jiwa Terpenuhi');

            $('#data_nikah').html(data.aktanikah_terpenuhi + ' dari ' + data.total_penduduk + ' Jiwa Terpenuhi');
            $('#nikah_persen').css('width', data.aktanikah_persen_terpenuhi + '%');
            $('#nikah_terpenuhi').html(data.aktanikah_persen_terpenuhi + '% Jiwa Terpenuhi');

            create_chart_penduduk(data.data_pertumbuhan);
            create_chart_usia(data.data_umur);
        });
    }

    function create_chart_penduduk(data) {
        // Chart Pertumbuhan Penduduk
        var chart_penduduk = AmCharts.makeChart("chart_pertumbuhan_penduduk", {
            "type": "serial",
            "theme": "light",
            "marginTop": 0,
            "marginRight": 80,
            "dataProvider": data,
            "valueAxes": [{
                "axisAlpha": 0,
                "position": "left"
            }],
            "graphs": [{
                "id": "g1",
                "balloonText": "[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>",
                "bullet": "round",
                "bulletSize": 8,
                "lineColor": "#d1655d",
                "lineThickness": 2,
                "negativeLineColor": "#637bb6",
                "type": "smoothedLine",
                "valueField": "value",
                /*"balloon":{
                 "drop":true
                 }*/
            }],
            "chartCursor": {
                "categoryBalloonDateFormat": "YYYY",
                "cursorAlpha": 0,
                "valueLineEnabled": true,
                "valueLineBalloonEnabled": true,
                "valueLineAlpha": 0.5,
                "fullWidth": true
            },
            "dataDateFormat": "YYYY",
            "categoryField": "year",
            "categoryAxis": {
                "minPeriod": "YYYY",
                "parseDates": true,
                "minorGridAlpha": 0.1,
                "minorGridEnabled": true
            },
            "export": {
                "enabled": true
            }
        });
    }

    function create_chart_usia(data) {
        // Chart Perbandingan Usia
        var chart_usia = AmCharts.makeChart("chart_usia", {
            "theme": "light",
            "type": "serial",
            "startDuration": 2,
            "dataProvider": data,
            "valueAxes": [{
                "position": "left",
                "title": "Jumlah Penduduk"
            }],
            "graphs": [{
                "balloonText": "[[category]]: <b>[[value]]</b>",
                "fillColorsField": "color",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "valueField": "value"
            }],
            "depth3D": 20,
            "angle": 30,
            "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },
            "categoryField": "umur",
            "categoryAxis": {
                "gridPosition": "start",
                "labelRotation": 90
            },
            "export": {
                "enabled": true
            }

        });
    }
</script>

@endpush