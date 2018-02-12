<div class="form-group">
    <label for="penduduk_id" class="control-label col-md-4 col-sm-3 col-xs-12">Nama Penduduk <span class="required">*</span></label>

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::select('penduduk_id', [], null, ['class' => 'form-control', 'required'=>true, 'id'=>'penduduk_id']) !!}
    </div>
</div>
<div class="form-group">
    <label for="alamat" class="control-label col-md-4 col-sm-3 col-xs-12">Alamat <span class="required">*</span></label>

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::textarea('alamat', null,['class'=>'textarea', 'placeholder'=>'Alamat', 'required'=>'required', 'class' => 'form-control', 'id'=>'alamat']) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-4 col-sm-3 col-xs-12">Tanggal Pengajuan <span class="required">*</span></label>

    <div class="col-md-2 col-sm-2 col-xs-3">
        {!! Form::text('tanggal_pengajuan', null, ['placeholder' => 'Tanggal Pengajuan','class' => 'form-control datepicker', 'required'=>true]) !!}
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-4 col-sm-3 col-xs-12">Status <span class="required">*</span></label>

    <div class="col-md-2 col-sm-2 col-xs-3">
        {!! Form::select('status', ['PENGAJUAN'=>'Pengajuan', 'PROSES'=>'Sedang Diproses', 'SELESAI' => 'Selesai'],null, ['class' => 'form-control', 'required'=>true]) !!}
    </div>
</div>
<div class="ln_solid"></div>
