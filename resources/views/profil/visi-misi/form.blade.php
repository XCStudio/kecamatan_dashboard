<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Kecamatan <span class="required">*</span></label>

    <div class="col-md-6 col-sm-6 col-xs-12">
        <select name="kecamatan_id" class="form-control" id="kecamatan_id" style="width: 100%;">
            <option value="1" selected="selected">Aikmel</option>
            <option value="2">Sarang Selatan</option>
            <option value="3">Cipunagara</option>
            <option value="4">Pegaden Baru</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Visi <span class="required">*</span></label>

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::textarea('visi', null,['class'=>'textarea', 'placeholder'=>'Visi Kecamatan', 'style'=>'width: 100%;
         height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;', 'required'=>'required']) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Misi <span class="required">*</span></label>

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::textarea('misi', null,['class'=>'textarea', 'placeholder'=>'Misi Kecamatan', 'style'=>'width: 100%;
         height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;', 'required'=>'required']) !!}
    </div>
</div>
<div class="ln_solid"></div>
