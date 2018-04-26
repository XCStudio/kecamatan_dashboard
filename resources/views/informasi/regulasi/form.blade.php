<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Kecamatan <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select name="kecamatan_id" class="form-control" id="kecamatan_id" style="width: 100%;"></select>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipe <span class="required">*</span></label>

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::select('tipe_regulasi', \App\Models\TipeRegulasi::pluck('nama', 'id'), null,['class'=>'form-control', 'id'=>'tipe', 'required']) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Judul <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text( 'judul', null, [ 'class' => 'form-control', 'placeholder' => 'Judul Regulasi' ,'required'=>'required'] ) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi <span class="required">*</span></label>

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::textarea('deskripsi', null,['class'=>'form-control', 'placeholder'=>'Deskripsi', 'required'=>'required']) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">File Regulasi <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="file" name="file_regulasi" class="form-control" >
    </div>
</div>
<div class="ln_solid"></div>
