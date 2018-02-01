<div class="row">
    <div class="col-md-6">
        <legend>Info Wilayah</legend>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kecamatan <span class="required">*</span></label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <select name="kecamatan_id" class="form-control" data-placeholder="Pilih Kecamatan" id="kecamatan_id">
                    @foreach(\App\Models\Profil::getProfilTanpaDataUmum() as $profil)
                        @if($profil->kecamatan_id == $data_umum->kecamatan_id)
                            <option value="{{ $profil->kecamatan_id }}"
                                    selected="true">{{ $profil->kecamatan->nama }}</option>
                        @else
                            <option value="{{ $profil->kecamatan_id }}">{{ $profil->kecamatan->nama }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipologi <span class="required">*</span></label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::textarea('tipologi', null,['placeholder'=>'Tipologi', 'class'=>'form-control', 'required', 'rows'=>2]) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Luas Wilayah <span
                        class="required">*</span></label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::text('luas_wilayah', null,['placeholder'=>'0', 'class'=>'form-control', 'required', 'style'=>'text-align:right;']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Penduduk <span
                        class="required">*</span></label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::number('jumlah_penduduk', null,['placeholder'=>'0', 'class'=>'form-control', 'required', 'style'=>'text-align:right;']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Laki Laki <span
                        class="required">*</span></label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::number('jml_laki_laki', null,['placeholder'=>'0', 'class'=>'form-control', 'required', 'style'=>'text-align:right;']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Perempuan <span
                        class="required">*</span></label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::number('jml_perempuan', null,['placeholder'=>'0', 'class'=>'form-control', 'required', 'style'=>'text-align:right;']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kepadatan Penduduk <span
                        class="required">*</span></label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::number('kepadatan_penduduk', null,['placeholder'=>'0', 'class'=>'form-control', 'required', 'style'=>'text-align:right;']) !!}
            </div>
        </div>

        <br>
        <legend>Batas Wilayah</legend>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Utara <span class="required">*</span></label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::textarea('bts_wil_utara', null,['placeholder'=>'Batas Utara', 'class'=>'form-control', 'required', 'rows' => 2]) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Timur <span class="required">*</span></label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::textarea('bts_wil_timur', null,['placeholder'=>'Batas Timur', 'class'=>'form-control', 'required', 'rows' => 2]) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Selatan <span class="required">*</span></label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::textarea('bts_wil_selatan', null,['placeholder'=>'Batas Selatan', 'class'=>'form-control', 'required', 'rows' => 2]) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Barat <span class="required">*</span></label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::textarea('bts_wil_barat', null,['placeholder'=>'Batas Barat', 'class'=>'form-control', 'required', 'rows' => 2]) !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">

        <legend>Jumlah Sarana Kesehatan</legend>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Puskesmas <span class="required">*</span></label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::number('jml_puskesmas', null,['placeholder'=>'0', 'class'=>'form-control', 'required', 'style'=>'text-align:right;']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Puskesmas Pembantu <span class="required">*</span></label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::number('jml_puskesmas_pembantu', null,['placeholder'=>'0', 'class'=>'form-control', 'required', 'style'=>'text-align:right;']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Posyandu <span class="required">*</span></label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::number('jml_posyandu', null,['placeholder'=>'0', 'class'=>'form-control', 'required', 'style'=>'text-align:right;']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pondok Bersalin <span
                        class="required">*</span></label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::number('jml_pondok_bersalin', null,['placeholder'=>'0', 'class'=>'form-control', 'required', 'style'=>'text-align:right;']) !!}
            </div>
        </div>

        <br>
        <legend>Jumlah Sarana Pendidikan</legend>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">PAUD <span class="required">*</span></label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::number('jml_paud', null,['placeholder'=>'0', 'class'=>'form-control', 'required', 'style'=>'text-align:right;']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">SD <span class="required">*</span></label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::number('jml_sd', null,['placeholder'=>'0', 'class'=>'form-control', 'required', 'style'=>'text-align:right;']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">SMP <span class="required">*</span></label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::number('jml_smp', null,['placeholder'=>'0', 'class'=>'form-control', 'required', 'style'=>'text-align:right;']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">SMA <span class="required">*</span></label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::number('jml_sma', null,['placeholder'=>'0', 'class'=>'form-control', 'required', 'style'=>'text-align:right;']) !!}
            </div>
        </div>

        <br>
        <legend>Jumlah Sarana Umum</legend>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Masjid Besar <span
                        class="required">*</span></label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::number('jml_masjid_besar', null,['placeholder'=>'0', 'class'=>'form-control', 'required', 'style'=>'text-align:right;']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Gereja <span class="required">*</span></label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::number('jml_gereja', null,['placeholder'=>'0', 'class'=>'form-control', 'required', 'style'=>'text-align:right;']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pasar <span class="required">*</span></label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::number('jml_pasar', null,['placeholder'=>'0', 'class'=>'form-control', 'required', 'style'=>'text-align:right;']) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Balai Pertemuan <span
                        class="required">*</span></label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::number('jml_balai_pertemuan', null,['placeholder'=>'0', 'class'=>'form-control', 'required', 'style'=>'text-align:right;']) !!}
            </div>
        </div>


    </div>
</div>

<div class="ln_solid"></div>
