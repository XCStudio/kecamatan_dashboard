<div class="form-group">
    <label for="kecamatan" class="control-label col-md-4 col-sm-3 col-xs-12">Kecamatan</label>

    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="hidden" id="defaultProfil" value="{{ $defaultProfil }}">
        <select class="form-control" id="kecamatan_id" name="kecamatan_id">
          @foreach($list_kecamatan as $kecamatan)
              @if($kecamatan->kecamatan_id == $defaultProfil)
                <option value="{{ $kecamatan->kecamatan_id }}" selected="true">{{ $kecamatan->kecamatan->nama }}</option>
              @else
                <option value="{{ $kecamatan->kecamatan_id }}">{{ $kecamatan->kecamatan->nama }}</option>
              @endif
          @endforeach
      </select>
    </div>
</div>
<div class="form-group">
    <label for="nama" class="control-label col-md-4 col-sm-3 col-xs-12">Nama <span class="required">*</span></label>

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('nama', null, ['class' => 'form-control', 'required' => true, 'id'=>'nama']) !!}
    </div>
</div>
<div class="form-group">
    <label for="website" class="control-label col-md-4 col-sm-3 col-xs-12">Website <span class="required">*</span></label>

    <div class="col-md-6 col-sm-6 col-xs-12">
         {!! Form::url('website', null, ['class' => 'form-control',  'id'=>'website', 'required' => true]) !!}
    </div>
</div>
<div class="form-group">
    <label for="luas_wilayah" class="control-label col-md-4 col-sm-3 col-xs-12">Luas Wilayah (km<sup>2</sup>)<span class="required">*</span></label>

    <div class="col-md-6 col-sm-6 col-xs-12">
         {!! Form::number('luas_wilayah', null, ['class' => 'form-control',  'id'=>'luas_wilayah', 'required' => true]) !!}
    </div>
</div>

<div class="ln_solid"></div>
