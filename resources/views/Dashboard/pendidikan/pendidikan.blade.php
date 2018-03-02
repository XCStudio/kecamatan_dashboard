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
            <div class="col-md-6">
                <div class="form-group">
                    <table>
                        <tbody>
                        <tr>
                            <td width="20%"><b>Grafik:</b></td>
                            <td>
                            </td>
                            <td>
                                <form>
                                    <select class="form-control" id="listgrafik" name="listgrafik"
                                            onchange="selectgrafik();">
                                        <option value="pendidikan1">Jumlah Penduduk Berdasarkan Tingkat Pendidikan
                                        </option>
                                        ";
                                        <option value="pendidikan2">Jumlah Siswa Menurut Tingkat Pendidikan</option>
                                        ";
                                        <option value="pendidikan3">Perbandingan Jumlah Siswa dan Fasilitas Pendidikan
                                        </option>
                                        ";
                                        <option value="pendidikan4">Jumlah Anak Tidak Bersekolah</option>
                                        ";
                                    </select>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Kecamatan:</b></td>
                            <td>
                            </td>
                            <td>
                                <form>
                                    <select class="form-control" id="kecamatan" name="kecamatan" onchange="addlist();">
                                        <option value="5203090">Aikmel</option>
                                        <option value="5203030">Terara</option>
                                        <option value="5203070">Selong</option>
                                        <option value="5203010">Keruak</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <table>
                        <tbody>
                        <tr>
                            <td width="20%"><b>Desa:</b></td>
                            <td>
                            </td>
                            <td>
                                <select class="form-control" id="desalist" name="desalist" onchange="addlistnd();">
                                    <option value="ALL">ALL</option>
                                    <option value="5203090001">Lenek Daya</option>
                                    <option value="5203090002">Lenek</option>
                                    <option value="5203090003">Lenek Lauq</option>
                                    <option value="5203090004">Kalijaga</option>
                                    <option value="5203090008">Kembang Kerang</option>
                                    <option value="5203090009">Aikmel</option>
                                    <option value="5203090010">Aikmel Utara</option>
                                    <option value="5203090011">Kalijaga Selatan</option>
                                    <option value="5203090012">Kalijaga Timur</option>
                                    <option value="5203090013">Lenek Baru</option>
                                    <option value="5203090014">Kembang Kerang Daya</option>
                                    <option value="5203090015">Aikmel Barat</option>
                                    <option value="5203090016">Lenek Pesiraman</option>
                                    <option value="5203090017">Toya</option>
                                    <option value="5203090018">Lenek Ramban Biak</option>
                                    <option value="5203090019">Lenek Kali Bambang</option>
                                    <option value="5203090020">KalijagaTengah</option>
                                    <option value="5203090021">Bagik Nyaka Santri</option>
                                    <option value="5203090022">Aik Prapa</option>
                                    <option value="5203090023">Sukarema</option>
                                    <option value="5203090024">Kalijaga Baru</option>
                                    <option value="5203090025">Lenek Duren</option>
                                    <option value="5203090026">Keroya</option>
                                    <option value="5203090027">Aikmel Timur</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Tahun:</b></td>
                            <td>
                            </td>
                            <td>
                                <select class="form-control" id="listyear" onchange="addlistrd();">
                                    <option value="ALL">ALL</option>
                                    @foreach($years_list as $year)
                                        <option value="{{$year}}">{{$year}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- /.row -->

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-bar-chart-o"></i>

                    <h3 class="box-title" id="JudulGrafik">Jumlah Penduduk Berdasarkan Tingkat Pendidikan</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="chart_pendidikan" style="width: 90%; height: 500px; overflow: visible; text-align: left;">

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->
@endsection

@include('partials.asset_amcharts')
@push('scripts')
<script>
    $(function () {
        /**
         * Define data for each year
         */
        var chartData = {!! json_encode($data_pendidikan) !!};

        /**
         * Create the chart
         */
        var currentYear = 2015;
        var chart = AmCharts.makeChart( "chart_pendidikan", {
            "type": "pie",
            "theme": "light",
            "dataProvider": [],
            "valueField": "jumlah",
            "titleField": "jenjang",
            "startDuration": 0,
            "innerRadius": 80,
            "pullOutRadius": 20,
            "marginTop": 30,
           /* "titles": [{
                //"text": "South African Economy"
            }],*/
            "allLabels": [{
                "y": "54%",
                "align": "center",
                "size": 25,
                "bold": true,
                "text": "2015",
                "color": "#555"
            }, {
                "y": "49%",
                "align": "center",
                "size": 15,
                "text": "Year",
                "color": "#555"
            }],
            "listeners": [ {
                "event": "init",
                "method": function( e ) {
                    var chart = e.chart;

                    function getCurrentData() {
                        var data = chartData[currentYear];
                        currentYear++;
                        if (currentYear > 2018)
                            currentYear = 2015;
                        return data;
                    }

                    function loop() {
                        chart.allLabels[0].text = currentYear;
                        var data = getCurrentData();
                        chart.animateData( data, {
                            duration: 1000,
                            complete: function() {
                                setTimeout( loop, 3000 );
                            }
                        } );
                    }

                    loop();
                }
            } ],
            "export": {
                "enabled": true
            }
        } );
    });
</script>

@endpush