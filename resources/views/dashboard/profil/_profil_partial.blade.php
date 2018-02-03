<div class="row">
    <div class="col-md-3">
        <!-- profil Image -->
        <div class="box box-primary">
            <div class="box-body box-profil">
                <h4 class="profil-username text-center">Kecamatan <span
                            id="kecamatantitle">{!! ucwords($profil->kecamatan->nama) !!} </span></h4>
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Luas wilayah</b> <a class="pull-right"
                                               id="luaswilayah">{{ $profil->dataumum->luas_wilayah }}
                            km<sup>2</sup></a>
                    </li>
                    <li class="list-group-item">
                        <b>Jumlah Penduduk</b> <a class="pull-right"
                                                  id="jumlahpenduduk">{{ $profil->dataumum->jumlah_penduduk }}
                            orang</a>
                    </li>
                    <li class="list-group-item">
                        <b>Kepadatan Penduduk</b> <a class="pull-right"
                                                     id="kepadatanpenduduk">{{ $profil->dataumum->kepadatan_penduduk }}
                            orang/km<sup>2</sup></a>
                    </li>
                    <li class="list-group-item">
                        <b>Kelurahan/Desa</b> <a class="pull-right" id="kelurahandesa">24</a>
                    </li>
                </ul>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tentang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <strong><i class="fa fa-file-text-o margin-r-5"></i> Info Pelayanan </strong>

                <div id="InfoPelayanan" style="margin:0px 0px 0px 0px;">
                    <ul>
                        <li><a href="http://localhost/kecamatanver1.0/documentation/SYARATSURATPENGANTAR.doc">Surat
                                Pengantar Pembuatan Akta Kelahiran</a></li>
                        <li><a href="#">Surat Pindah Keluar</a></li>
                        <li><a href="#">Surat Keterangan Tidak mampu</a></li>
                        <li><a href="#">Surat Izin Gangguan</a></li>
                        <li><a href="#">Surat Izin Tempat Usaha</a></li>
                        <li><a href="#">Surat Izin Usaha Mikro Kecil</a></li>
                    </ul>
                </div>
                <hr>

                <!--
                  <strong><i class="fa fa-map-marker margin-r-5"></i> Lokasi</strong>

                  <p class="text-muted">SEKOTONG, SEKOTONG</p>

                  <hr>
                -->
                <!--
                  <strong><i class="fa fa-map-marker margin-r-5"></i> Parawisata</strong>

                  <p class="text-muted">SEKOTONG, SEKOTONG</p>

                  <hr>
                -->
                <!--
                  <strong><i class="fa fa-pencil margin-r-5"></i> Kemampuan Usaha</strong>
                  <p>
                    <span class="label label-danger">Bertani</span>
                    <span class="label label-success">Berdagang</span>
                    <span class="label label-info">Guru</span>
                    <span class="label label-warning">Beternak</span>
                  </p>
                  <hr>
                -->
                <strong><i class="fa fa-book margin-r-5"></i> Kontak</strong>
                <br><br>

                <p id="kontakdetail" style="font-size: 8pt;">

                <p style="text-align: center;"><strong>Kantor Camat {!! $profil->kecamatan->nama !!}<br></strong> {!! $profil->alamat !!}, {!! $profil->kode_pos !!}<br>Telp: {!! $profil->telepon !!}/e-mail: {!! $profil->email !!}</p></p><p>
                </p></div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#peta" data-toggle="tab">Peta</a></li>
                <li><a href="#profil" data-toggle="tab">Profil</a></li>
                <li><a href="#data-umum" data-toggle="tab">Data Umum</a></li>
                <li><a href="#organisasi" data-toggle="tab">Struktur Organisasi</a></li>
                <li><a href="#desa" data-toggle="tab">Desa</a></li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane" id="profil">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th class="col-md-2">Nama Kecamatan</th>
                            <td class="col-md-9">: {!! ucwords($profil->kecamatan->nama) !!}</td>
                        </tr>

                        <tr>
                            <th class="col-md-2">Tahun Pembentukan</th>
                            <td class="col-md-9">: No Field</td>
                        </tr>

                        <tr>
                            <th class="col-md-2">Dasar Hukum Pembentukan</th>
                            <td class="col-md-9">: No Field</td>
                        </tr>

                        <tr>
                            <th class="col-md-2">Nomor Kode Wilayah</th>
                            <td class="col-md-9">: {!! ucwords($profil->kecamatan->id) !!}</td>
                        </tr>

                        <tr>
                            <th class="col-md-2">Kode Pos</th>
                            <td class="col-md-9">: {!! ucwords($profil->kode_pos) !!}</td>
                        </tr>

                        <tr>
                            <th class="col-md-2">Kabupaten/Kota</th>
                            <td class="col-md-9">: {!! ucwords($profil->kabupaten->nama) !!}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="data-umum">
                    <!-- The timeline -->
                    <div class="row">
                        <div class="col-md-6">
                            <legend>Info Wilayah</legend>
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <th class="col-md-4">Tipologi</th>
                                    <td class="col-md-8">: {!! ucwords($profil->dataumum->tipologi ) !!}</td>
                                </tr>

                                <tr>
                                    <th class="col-md-2">Luas Wilayah</th>
                                    <td class="col-md-9">: {{ $profil->dataumum->luas_wilayah }}
                                        <span>km<sup>2</sup></span></td>
                                </tr>

                                <tr>
                                    <th class="col-md-2">Dasar Hukum Pembentukan</th>
                                    <td class="col-md-9">: No Field</td>
                                </tr>

                                <tr>
                                    <th class="col-md-2">Nomor Kode Wilayah</th>
                                    <td class="col-md-9">: {!! ucwords($profil->kecamatan->id) !!}</td>
                                </tr>

                                <tr>
                                    <th class="col-md-2">Kode Pos</th>
                                    <td class="col-md-9">: {!! ucwords($profil->kode_pos) !!}</td>
                                </tr>

                                <tr>
                                    <th class="col-md-2">Kabupaten/Kota</th>
                                    <td class="col-md-9">: {!! ucwords($profil->kabupaten->nama) !!}</td>
                                </tr>

                                <tr>
                                    <th class="col-md-2">Jumlah Penduduk</th>
                                    <td class="col-md-9">: {!! $profil->dataumum->jumlah_penduduk !!}</td>
                                </tr>

                                <tr>
                                    <th class="col-md-2">Laki Laki</th>
                                    <td class="col-md-9">: {!! $profil->dataumum->jml_laki_laki !!}</td>
                                </tr>

                                <tr>
                                    <th class="col-md-2">Perempuan</th>
                                    <td class="col-md-9">: {!! $profil->dataumum->jml_perempuan !!}</td>
                                </tr>

                                <tr>
                                    <th class="col-md-2">Jumlah Penduduk Miskin</th>
                                    <td class="col-md-9">: No Field</td>
                                </tr>

                                </tbody>
                            </table>

                            <br>
                            <legend>Batas Wilayah</legend>
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <th class="col-md-4">Utara</th>
                                    <td class="col-md-8">
                                        : {!! ucwords($profil->dataumum->bts_wil_utara) !!}</td>
                                </tr>

                                <tr>
                                    <th class="col-md-2">Timur</th>
                                    <td class="col-md-9">: {!! $profil->dataumum->bts_wil_timur !!}</td>
                                </tr>

                                <tr>
                                    <th class="col-md-2">Selatan</th>
                                    <td class="col-md-9">: {!! $profil->dataumum->bts_wil_selatan!!}</td>
                                </tr>

                                <tr>
                                    <th class="col-md-2">Barat</th>
                                    <td class="col-md-9">: {!! $profil->dataumum->bts_wil_barat !!}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <legend>Jumlah Sarana & Prasarana</legend>

                            <h4>A. Sarana Kesehatan</h4>
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <th class="col-md-4">1. Puskesmas</th>
                                    <td class="col-md-8">
                                        : {!! ucwords($profil->dataumum->jml_puskesmas) !!}</td>
                                </tr>

                                <tr>
                                    <th class="col-md-2">2. Puskesmas Pembantu</th>
                                    <td class="col-md-9">
                                        : {!! $profil->dataumum->jml_puskesmas_pembantu !!}</td>
                                </tr>

                                <tr>
                                    <th class="col-md-2">3. Posyandu</th>
                                    <td class="col-md-9">: {!! $profil->dataumum->jml_posyandu!!}</td>
                                </tr>

                                <tr>
                                    <th class="col-md-2">4. Pondok Bersalin</th>
                                    <td class="col-md-9">: {!! $profil->dataumum->jml_pondok_bersalin !!}</td>
                                </tr>

                                </tbody>
                            </table>

                            <h4>B. Sarana Pendidikan</h4>
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <th class="col-md-4">1. PAUD</th>
                                    <td class="col-md-8">: {!! $profil->dataumum->jml_paud !!}</td>
                                </tr>

                                <tr>
                                    <th class="col-md-2">2. SD</th>
                                    <td class="col-md-9">: {!! $profil->dataumum->jml_sd !!}</td>
                                </tr>

                                <tr>
                                    <th class="col-md-2">3. SMP</th>
                                    <td class="col-md-9">: {!! $profil->dataumum->jml_smp !!}</td>
                                </tr>

                                <tr>
                                    <th class="col-md-2">4. SMA</th>
                                    <td class="col-md-9">: {!! $profil->dataumum->jml_sma !!}</td>
                                </tr>

                                </tbody>
                            </table>

                            <h4>C. Sarana Umum</h4>
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <th class="col-md-4">1. Masjid Besar</th>
                                    <td class="col-md-8">: {!! $profil->dataumum->jml_masjid_besar !!}</td>
                                </tr>

                                <tr>
                                    <th class="col-md-2">2. Gereja</th>
                                    <td class="col-md-9">: {!! $profil->dataumum->jml_gereja !!}</td>
                                </tr>

                                <tr>
                                    <th class="col-md-2">3. Pasar</th>
                                    <td class="col-md-9">: {!! $profil->dataumum->jml_pasar !!}</td>
                                </tr>

                                <tr>
                                    <th class="col-md-2">4. Balai Pertemuan</th>
                                    <td class="col-md-9">: {!! $profil->dataumum->jml_balai_pertemuan !!}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="organisasi">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th class="col-md-3">Camat</th>
                            <td class="col-md-8">: {!! $profil->nama_camat !!}</td>
                        </tr>

                        <tr>
                            <th class="col-md-3">Sekretaris Camat</th>
                            <td class="col-md-8">: {!! $profil->sekretaris_camat !!}</td>
                        </tr>

                        <tr>
                            <th class="col-md-3">Kepala Seksi Pemerintahan Umum</th>
                            <td class="col-md-8">: {!! $profil->kepsek_pemerintahan_umum !!}</td>
                        </tr>

                        <tr>
                            <th class="col-md-3">Kepala Seksi Kesejahteraan Masyarakat</th>
                            <td class="col-md-8">: {!! $profil->kepsek_kesejahteraan_masyarakat !!}</td>
                        </tr>

                        <tr>
                            <th class="col-md-3">Kepala Seksi Pemberdayaan Masyarakat</th>
                            <td class="col-md-8">: {!! $profil->kepsek_pemberdayaan_masyarakat !!}</td>
                        </tr>

                        <tr>
                            <th class="col-md-3">Kepala Seksi Pelayanan Umum</th>
                            <td class="col-md-8">: {!! $profil->kepsek_pelayanan_umum !!}</td>
                        </tr>

                        <tr>
                            <th class="col-md-3">Kepala Seksi Ketentraman dan Ketertiban</th>
                            <td class="col-md-8">: {!! $profil->kepsek_trantib !!}</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="center"><img id="strukturpic" src="http://dashboard.kompak.or.id/dash-kecamatan2/ammap/images/struktur-aikmel.jpg"></div>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="desa">
                    <h1>Under Construction!</h1>
                </div>

                <div class="active tab-pane" id="peta">
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="row">
                            <div class="col-md-9 col-sm-8">
                                <img id="petakecamatan"
                                     src="http://dashboard.kompak.or.id/dash-kecamatan2/ammap/images/aikmel.jpg">
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>