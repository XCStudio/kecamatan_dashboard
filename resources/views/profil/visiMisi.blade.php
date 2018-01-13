@extends('layouts.dashboard_template')

@section('content')
    <script>
        function addlist() {
            var mySelect = document.getElementById("kecamatan").value;

            if (mySelect.length == 0) {
                document.getElementById("desalist").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("desalist").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "../getDesaList.php?IDKecamatan=" + mySelect, true);
                xmlhttp.send();
            }

            if (mySelect.length == 0) {
                document.getElementById("listyear").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("listyear").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "../getYearList.php", true);
                xmlhttp.send();
            }

            var mySelectdesa = document.getElementById("desalist").value;
            if (mySelectdesa.length == 0) {
                mySelectdesa = "ALL";
            }

            var mySelecttahun = document.getElementById("listyear").value;
            if (mySelecttahun.length == 0) {
                mySelecttahun = "ALL";
            }
            showDataUmum(mySelect, mySelectdesa, mySelecttahun);
        }

        function addlistnd() {
            var mySelect = document.getElementById("kecamatan").value;

            if (mySelect.length == 0) {
                document.getElementById("listyear").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("listyear").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getYearList.php", true);
                xmlhttp.send();
            }

            var mySelectdesa = document.getElementById("desalist").value;
            if (mySelectdesa.length == 0) {
                mySelectdesa = "ALL";
            }

            var mySelecttahun = document.getElementById("listyear").value;
            if (mySelecttahun.length == 0) {
                mySelecttahun = "ALL";
            }
            showDataUmum(mySelect, mySelectdesa, mySelecttahun);
        }

        function addlistrd() {
            var mySelect = document.getElementById("kecamatan").value;

            var mySelectdesa = document.getElementById("desalist").value;
            if (mySelectdesa.length == 0) {
                mySelectdesa = "ALL";
            }

            var mySelecttahun = document.getElementById("listyear").value;
            if (mySelecttahun.length == 0) {
                mySelecttahun = "ALL";
            }

            showDataUmum(mySelect, mySelectdesa, mySelecttahun);
        }
    </script>

    <form id="skfromkec" name="skfromkec" action="/dash-kecamatan2/profil/visimisi.php" method="POST">
        <div class="box">
            <div class="box-header with-border">

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="col-sm-3">Kecamatan:</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="kecamatan" name="kecamatan" onchange="addlist();">"&gt;
                                <option value="5203090">Aikmel</option>
                                <option value="5203030">Terara</option>
                                <option value="5203070">Selong</option>
                                <option value="5203010">Keruak</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="col-sm-3 sm">Desa:</label>

                        <div class="col-sm-9">
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
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="col-sm-3">Tahun:</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="listyear" onchange="addlistrd();">
                                <option value="ALL">ALL</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
    <script>
        function showDataUmum(strkec, strdesa, strtahun) {
            if (strkec.length == 0) {
                document.getElementById("visimisi_last").innerHTML = "";
                return;
            } else {

                //1
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("visimisi_last").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getvisimisi.php?qq=" + strkec + "&desa=" + strdesa + "&tahun=" + strtahun + "&visimisiType=normal&idvisimisi=ALL", true);
                xmlhttp.send();
            }

            if (strkec.length == 0) {
                document.getElementById("visimisi_table").innerHTML = "";
                return;
            } else {
                //1
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("visimisi_table").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getvisimisiTable.php?qq=" + strkec + "&desa=" + strdesa + "&tahun=" + strtahun + "&visimisiType=normal&idvisimisi=ALL", true);
                xmlhttp.send();
            }
        }

        function setDetailAndSubmit(id) {
            var mySelect = document.getElementById("kecamatan").value;
            var mySelectdesa = document.getElementById("desalist").value;
            var mySelecttahun = document.getElementById("listyear").value;

            if (mySelect.length == 0) {
                document.getElementById("visimisi_last").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("visimisi_last").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getvisimisi.php?qq=" + mySelect + "&desa=" + mySelectdesa + "&tahun=" + mySelecttahun + "&visimisiType=normal&idvisimisi=" + id, true);
                xmlhttp.send();
            }
        }

        function setInputAndSubmit(input) {
            var form = document.getElementById("skfrom");
            var inputEl = document.getElementById("frmaksi");
            var inputEl2 = document.getElementById("idvisimisi");
            var inputEl3 = document.getElementById("tipevisimisi");
            inputEl3.value = input
            form.submit();
        }

        function setInputAndSubmit2(input, input2) {
            var form = document.getElementById("skfrom");
            document.getElementById("frmaksi").value = "EDIT";
            var inputEl2 = document.getElementById("idvisimisi");
            var inputEl3 = document.getElementById("tipevisimisi");
            inputEl2.value = input2;
            inputEl3.value = input
            form.submit();
        }
    </script>
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <div class="tab-content">
                    <div class="timeline-body" id="visimisi_last"><p><a
                                    href="http://localhost/kecamatanver1.0/backup/old_visimisi.html#">VISI :</a></p>

                        <p>Terwujudnya Bantul yang informatif melalui pembangunan sistem informasi dan komunikasi
                            berbasis teknologi, terintegarsi, berkesinambungan dan ramah lingkungan.</p>

                        <p>&nbsp;</p>

                        <p><a href="http://localhost/kecamatanver1.0/backup/old_visimisi.html#">MISI :</a></p>

                        <p>1. Meningkatkan pelayanan informasi data yang berkualitas dan memadai bagi berbagai pemangku
                            kepentingan.<br>
                            2. Mewujudkan birokrasi pemerintahan yang efektif, efisien, transparan dan akuntabel guna
                            meningkatkan pelayanan prima serta mencapai good governance.<br>
                            3. Mengembangkan sistem informasi dan komunikasi berbasis teknologi yang ramah lingkungan
                            dan berdaya saing.</p>

                        <p>Silahkan mengisi detail visimisi.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <div class="tab-content">
                    <div class="timeline-body" id="visimisi_list">
                        <form id="skfrom" name="myform" action="Formvisimisi.php" method="POST">
                            <input id="frmaksi" name="aksi" value="ADD" type="hidden">
                            <input id="idvisimisi" name="idvisimisi" value="1" type="hidden">
                            <input id="tipevisimisi" name="tipevisimisi" value="normal" type="hidden">

                            <table id="visimisi_table" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>visimisi Topic</th>
                                    <th>Tanggal</th>
                                    <th>By</th>
                                    <th>Detail</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>informatif melalui pembangunan sistem informasi dan komunikasi berbasis
                                        teknologi
                                    </td>
                                    <td>2017-11-05 21:10:24</td>
                                    <td>1</td>
                                    <td><a href="javascript:;" onclick="setDetailAndSubmit('1');"
                                           class="small-box-footer">show <i class="fa fa-arrow-circle-right"></i></a>
                                        <a href="javascript:;" onclick="setInputAndSubmit2('normal','1');"
                                           class="small-box-footer">Edit <i class="fa fa-pencil-square-o"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="javascript:;" onclick="setInputAndSubmit('normal');"
                                           class="small-box-footer">Add <i class="fa fa-plus-circle"></i></a>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection