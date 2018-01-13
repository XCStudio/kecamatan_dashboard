@extends('layouts.dashboard_template')

@section('content')
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
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
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

                    <link rel="stylesheet" href="style.css" type="text/css">
                    <script src="amcharts/amcharts.js" type="text/javascript"></script>
                    <script src="amcharts/serial.js" type="text/javascript"></script>

                    <div id="chartdivALL" style="width: 100%; height: 400px; overflow: visible; text-align: left;">
                        <div style="position: relative;" class="amcharts-main-div">
                            <div style="overflow: hidden; position: relative; text-align: left; width: 1640px; height: 400px; padding: 0px;"
                                 class="amcharts-chart-div">
                                <svg version="1.1"
                                     style="position: absolute; width: 1640px; height: 400px; top: -0.100006px; left: 0px;">
                                    <desc>JavaScript chart by amCharts 3.21.12</desc>
                                    <g>
                                        <path cs="100,100" d="M0.5,0.5 L1639.5,0.5 L1639.5,399.5 L0.5,399.5 Z"
                                              fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1"
                                              stroke-opacity="0" class="amcharts-bg"></path>
                                    </g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g>
                                        <g class="amcharts-pie-item" aria-label="Tamat Sarjana/Sederajat: 0.18% 8 ">
                                            <path cs="1000,1000"
                                                  d=" M819.0751727171527,130.00534583800675 L818.3353108908749,66.00962250841218 A144,144,0,0,1,820.0000000000001,66 L820,130 A80,80,0,0,0,819.0751727171527,130.00534583800675 Z"
                                                  fill="#B0DE09" stroke="#FFFFFF" stroke-width="1" stroke-opacity="0"
                                                  fill-opacity="1" class="amcharts-pie-slice"></path>
                                            <path cs="100,100" d="M819.5,66.5 L819.5,46.5 L827.5,46.5" fill="none"
                                                  stroke-opacity="0.2" stroke="#000000" class="amcharts-pie-tick"
                                                  visibility="visible"></path>
                                        </g>
                                        <g class="amcharts-pie-item" aria-label="Tamat Diploma/Sederajat: 0.48% 21 ">
                                            <path cs="1000,1000"
                                                  d=" M816.6484076412283,130.07023815461088 L813.9671337542111,66.12642867829956 A144,144,0,0,1,818.3353108908749,66.00962250841218 L819.0751727171527,130.00534583800675 A80,80,0,0,0,816.6484076412283,130.07023815461088 Z"
                                                  fill="#F8FF01" stroke="#FFFFFF" stroke-width="1" stroke-opacity="0"
                                                  fill-opacity="1" class="amcharts-pie-slice"></path>
                                            <path cs="100,100" d="M816.5,66.5 L816.5,31.5 L808.5,31.5" fill="none"
                                                  stroke-opacity="0.2" stroke="#000000" class="amcharts-pie-tick"
                                                  visibility="visible"></path>
                                        </g>
                                        <g class="amcharts-pie-item" aria-label="Tamat SMA/Sederajat: 14.03% 610 ">
                                            <path cs="1000,1000"
                                                  d=" M756.1873200117138,161.7512500398965 L705.137176021085,123.1522500718137 A144,144,0,0,1,813.9671337542111,66.12642867829956 L816.6484076412283,130.07023815461088 A80,80,0,0,0,756.1873200117138,161.7512500398965 Z"
                                                  fill="#FCD202" stroke="#FFFFFF" stroke-width="1" stroke-opacity="0"
                                                  fill-opacity="1" class="amcharts-pie-slice"></path>
                                            <path cs="100,100" d="M753.5,82.5 L744.5,65.5 L736.5,65.5" fill="none"
                                                  stroke-opacity="0.2" stroke="#000000" class="amcharts-pie-tick"
                                                  visibility="visible"></path>
                                        </g>
                                        <g class="amcharts-pie-item" aria-label="Tamat SMP/Sederajat: 17.66% 768 ">
                                            <path cs="1000,1000"
                                                  d=" M748.4020990481442,245.68950236817903 L691.1237782866597,274.2411042627222 A144,144,0,0,1,705.137176021085,123.1522500718137 L756.1873200117138,161.7512500398965 A80,80,0,0,0,748.4020990481442,245.68950236817903 Z"
                                                  fill="#FF9E01" stroke="#FFFFFF" stroke-width="1" stroke-opacity="0"
                                                  fill-opacity="1" class="amcharts-pie-slice"></path>
                                            <path cs="100,100" d="M677.5,197.5 L657.5,195.5 L649.5,195.5" fill="none"
                                                  stroke-opacity="0.2" stroke="#000000" class="amcharts-pie-tick"
                                                  visibility="visible"></path>
                                        </g>
                                        <g class="amcharts-pie-item" aria-label="Tidak Bersekolah: 27.83% 1,210 ">
                                            <path cs="1000,1000"
                                                  d=" M820,130 L820,66 A144,144,0,0,1,961.7312862918775,235.46060655306292 L898.7396034954875,224.1447814183683 A80,80,0,0,0,820,130 Z"
                                                  fill="#FF0F00" stroke="#FFFFFF" stroke-width="1" stroke-opacity="0"
                                                  fill-opacity="1" class="amcharts-pie-slice"></path>
                                            <path cs="100,100" d="M930.5,118.5 L946.5,105.5 L954.5,105.5" fill="none"
                                                  stroke-opacity="0.2" stroke="#000000" class="amcharts-pie-tick"
                                                  visibility="visible"></path>
                                        </g>
                                        <g class="amcharts-pie-item" aria-label="Tamat SD: 39.81% 1,731 ">
                                            <path cs="1000,1000"
                                                  d=" M898.7396034954875,224.1447814183683 L961.7312862918775,235.46060655306292 A144,144,0,0,1,691.1237782866597,274.2411042627222 L748.4020990481442,245.68950236817903 A80,80,0,0,0,898.7396034954875,224.1447814183683 Z"
                                                  fill="#FF6600" stroke="#FFFFFF" stroke-width="1" stroke-opacity="0"
                                                  fill-opacity="1" class="amcharts-pie-slice"></path>
                                            <path cs="100,100" d="M840.5,353.5 L843.5,372.5 L851.5,372.5" fill="none"
                                                  stroke-opacity="0.2" stroke="#000000" class="amcharts-pie-tick"
                                                  visibility="visible"></path>
                                        </g>
                                    </g>
                                    <g></g>
                                    <g>
                                        <g>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="start" class="amcharts-pie-label"
                                                  transform="translate(958,105)" style="cursor: default;"
                                                  visibility="visible">
                                                <tspan y="6" x="0">Tidak Bersekolah: 1,210</tspan>
                                                <tspan y="19" x="0">(27.83%)</tspan>
                                            </text>
                                        </g>
                                        <g>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="start" class="amcharts-pie-label"
                                                  transform="translate(855,372)" style="cursor: default;"
                                                  visibility="visible">
                                                <tspan y="6" x="0">Tamat SD: 1,731 (39.81%)</tspan>
                                            </text>
                                        </g>
                                        <g>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="end" class="amcharts-pie-label"
                                                  transform="translate(645,195)" style="cursor: default;"
                                                  visibility="visible">
                                                <tspan y="6" x="0">Tamat SMP/Sederajat: 768</tspan>
                                                <tspan y="19" x="0">(17.66%)</tspan>
                                            </text>
                                        </g>
                                        <g>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="end" class="amcharts-pie-label"
                                                  transform="translate(732,65)" style="cursor: default;"
                                                  visibility="visible">
                                                <tspan y="6" x="0">Tamat SMA/Sederajat: 610</tspan>
                                                <tspan y="19" x="0">(14.03%)</tspan>
                                            </text>
                                        </g>
                                        <g>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="end" class="amcharts-pie-label"
                                                  transform="translate(804,31)" style="cursor: default;"
                                                  visibility="visible">
                                                <tspan y="6" x="0">Tamat Diploma/Sederajat: 21</tspan>
                                                <tspan y="19" x="0">(0.48%)</tspan>
                                            </text>
                                        </g>
                                        <g>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="start" class="amcharts-pie-label"
                                                  transform="translate(831,46)" style="cursor: default;"
                                                  visibility="visible">
                                                <tspan y="6" x="0">Tamat Sarjana/Sederajat: 8</tspan>
                                                <tspan y="19" x="0">(0.18%)</tspan>
                                            </text>
                                        </g>
                                    </g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g>
                                        <g>
                                            <text y="13" fill="#555" font-family="Verdana" font-size="25px" opacity="1"
                                                  font-weight="bold" text-anchor="middle" transform="translate(820,229)"
                                                  class="amcharts-label" style="pointer-events: none;">
                                                <tspan y="13" x="0">2017</tspan>
                                            </text>
                                            <text y="8" fill="#555" font-family="Verdana" font-size="15px" opacity="1"
                                                  font-weight="bold" text-anchor="middle" transform="translate(820,204)"
                                                  class="amcharts-label" style="pointer-events: none;">
                                                <tspan y="8" x="0">Tahun</tspan>
                                            </text>
                                        </g>
                                    </g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                </svg>
                            </div>
                            <div class="amcharts-export-menu amcharts-export-menu-top-right amExportButton">
                                <ul>
                                    <li class="export-main"><a href="#"><span>menu.label.undefined</span></a>
                                        <ul>
                                            <li><a href="#"><span>Download as ...</span></a>
                                                <ul>
                                                    <li><a href="#"><span>PNG</span></a></li>
                                                    <li><a href="#"><span>JPG</span></a></li>
                                                    <li><a href="#"><span>SVG</span></a></li>
                                                    <li><a href="#"><span>PDF</span></a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#"><span>Save as ...</span></a>
                                                <ul>
                                                    <li><a href="#"><span>CSV</span></a></li>
                                                    <li><a href="#"><span>XLSX</span></a></li>
                                                    <li><a href="#"><span>JSON</span></a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#"><span>Annotate ...</span></a></li>
                                            <li><a href="#"><span>Print</span></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection