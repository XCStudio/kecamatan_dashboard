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
        <form id="skfromkec" name="skfromkec" action="/dash-kecamatan2/informasi/faq.php" method="POST">
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
                    document.getElementById("faq_last").innerHTML = "";
                    return;
                } else {

                    //1
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("faq_last").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "getfaq.php?qq=" + strkec + "&desa=" + strdesa + "&tahun=" + strtahun + "&faqType=normal&idfaq=ALL", true);
                    xmlhttp.send();
                }

                if (strkec.length == 0) {
                    document.getElementById("faq_table").innerHTML = "";
                    return;
                } else {
                    //1
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("faq_table").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "getfaqTable.php?qq=" + strkec + "&desa=" + strdesa + "&tahun=" + strtahun + "&faqType=normal&idfaq=ALL", true);
                    xmlhttp.send();
                }
            }

            function setDetailAndSubmit(id) {
                var mySelect = document.getElementById("kecamatan").value;
                var mySelectdesa = document.getElementById("desalist").value;
                var mySelecttahun = document.getElementById("listyear").value;

                if (mySelect.length == 0) {
                    document.getElementById("faq_last").innerHTML = "";
                    return;
                } else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("faq_last").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "getfaq.php?qq=" + mySelect + "&desa=" + mySelectdesa + "&tahun=" + mySelecttahun + "&faqType=normal&idfaq=" + id, true);
                    xmlhttp.send();
                }
            }

            function setInputAndSubmit(input) {
                var form = document.getElementById("skfrom");
                var inputEl = document.getElementById("frmaksi");
                var inputEl2 = document.getElementById("idfaq");
                var inputEl3 = document.getElementById("tipefaq");
                inputEl3.value = input
                form.submit();
            }

            function setInputAndSubmit2(input, input2) {
                var form = document.getElementById("skfrom");
                document.getElementById("frmaksi").value = "EDIT";
                var inputEl2 = document.getElementById("idfaq");
                var inputEl3 = document.getElementById("tipefaq");
                inputEl2.value = input2;
                inputEl3.value = input
                form.submit();
            }
        </script>
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <div class="timeline-body" id="faq_last"><h1><strong>FAQ</strong></h1>

                            <p>We at Eternity Web have been building web experiences for over 16 years. In that time we
                                have
                                gained a vast amount of experience and knowledge. We crafted this FAQ page to answer
                                many of
                                the frequently asked questions we were asked along the way.</p>

                            <p>Q: I am totally new to this "website thing". How does the whole process work?<br>
                                A: Never fear, that's why we are here. You can learn about our time proven process in
                                ourprocess section.<br>
                                <br>
                                Q: How long has Eternity Web been building websites?<br>
                                A: Eternity Web was founded in 2000 by President + Founder, Michael Lannen. You can
                                learn
                                more on our about page.<br>
                                <br>
                                Q: How much does a website cost?<br>
                                A: The cost of a website can vary depending on various factors, just like the cost of a
                                house may vary. Though our website projects generally start in the $5,000 range for
                                basic
                                business sites and range upward depending on your unique needs.<br>
                                <br>
                                Q: How does the payment process work?<br>
                                A: The project starts with a 50% deposit. After design sign off and before we move into
                                programming, we collect 25%. Once we have completed and fulfilled our scope, the final
                                25%
                                is collected and your website is then scheduled for launch.<br>
                                <br>
                                Q: What kind of businesses do you work with?<br>
                                A: We work with a broad range of company types [small start-ups, large corporations,
                                nonprofits, B2B, B2C and more] across many business industries [technology, food,
                                apparel,
                                health + beauty, camps, travel, finance, arts, fair trade, and more.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <div class="timeline-body" id="faq_list">
                            <form id="skfrom" name="myform" action="Formfaq.php" method="POST">
                                <input id="frmaksi" name="aksi" value="ADD" type="hidden">
                                <input id="idfaq" name="idfaq" value="1" type="hidden">
                                <input id="tipefaq" name="tipefaq" value="normal" type="hidden">

                                <table id="faq_table" class="table table-bordered table-hover"><br>
                                    <b>Warning</b>: session_start(): Cannot send session cache limiter - headers already
                                    sent (output started at
                                    /home/kompak_dashboard/dashboard.kompak.or.id/dash-kecamatan2/informasi/getfaqTable.php:1)
                                    in <b>/home/kompak_dashboard/dashboard.kompak.or.id/dash-kecamatan2/informasi/getfaqTable.php</b>
                                    on line <b>4</b><br>
                                    <thead>
                                    <tr>
                                        <th>FAQ Topic</th>
                                        <th>Tanggal</th>
                                        <th>By</th>
                                        <th>Detail</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>JUDUL ke 3</td>
                                        <td>2017-11-05 09:07:07</td>
                                        <td>1</td>
                                        <td><a href="javascript:;" onclick="setDetailAndSubmit('3');"
                                               class="small-box-footer">show <i
                                                        class="fa fa-arrow-circle-right"></i></a>
                                            <a href="javascript:;" onclick="setInputAndSubmit2('normal','3');"
                                               class="small-box-footer">Edit <i class="fa fa-pencil-square-o"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pertanyaan yang sering muncul</td>
                                        <td>2017-11-05 08:42:25</td>
                                        <td>2</td>
                                        <td><a href="javascript:;" onclick="setDetailAndSubmit('2');"
                                               class="small-box-footer">show <i
                                                        class="fa fa-arrow-circle-right"></i></a>
                                            <a href="javascript:;" onclick="setInputAndSubmit2('normal','2');"
                                               class="small-box-footer">Edit <i class="fa fa-pencil-square-o"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>We at Eternity Web have been building web experiences for over 16 years</td>
                                        <td>2017-11-05 01:25:54</td>
                                        <td>1</td>
                                        <td><a href="javascript:;" onclick="setDetailAndSubmit('1');"
                                               class="small-box-footer">show <i
                                                        class="fa fa-arrow-circle-right"></i></a>
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

    </section>
    <!-- /.content -->
@endsection