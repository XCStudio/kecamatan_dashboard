<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">First Name <span class="required">*</span></label>

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text( 'first_name', null, [ 'class' => 'form-control', 'placeholder' => 'First Name', 'pattern' => '[A-Za-z]{1,}'] ) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Last Name <span class="required">*</span></label>

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text( 'last_name', null, [ 'class' => 'form-control', 'placeholder' => 'Last Name', 'pattern' => '[A-Za-z]{1,}'] ) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>

    <div class="col-md-6 col-sm-6 col-xs-12">
        @if(empty($user))
            {!! Form::text( 'email', null, [ 'class' => 'form-control', 'placeholder' => 'Email'] ) !!}
        @else
            {!! Form::text( 'email', null, [ 'class' => 'form-control', 'placeholder' => 'Email', 'readOnly' => true] ) !!}
        @endif
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone </label>

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text( 'phone', null, [ 'class' => 'form-control', 'placeholder' => '0xxxxxxxxxxx'] ) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Photo Profile </label>

    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="file" name="image" class="form-control">
    </div>
</div>
@if(empty($user))
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password <span class="required">*</span></label>

        <div class="col-md-6 col-sm-6 col-xs-12">
            {!! Form::password( 'password', [ 'class' => 'form-control password'] ) !!}
        </div>
        <div class="col-md-1 col-sm-1 col-xs-12">
            <button type="button" class="btn showpass"><i class="fa fa-eye" aria-hidden="true"></i></button>
        </div>
    </div>
@endif
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Address <span class="required">*</span></label>

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::textarea( 'address', null, [ 'class' => 'form-control',  'cols' => 10, 'rows' => 5 ] ) !!}
    </div>
</div>

@if(empty($user))
    <div class="form-group">
        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Role <span class="required">*</span></label>

        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('role', $item, null, ['class' => 'form-control']) }}
        </div>
    </div>
@elseif(Sentinel::getUser()->id == 1)
    @if($user->id !=1)
        <div class="form-group">
            <label class="col-md-3 col-sm-3 col-xs-12 control-label">Role <span class="required">*</span></label>

            <div class="col-md-6 col-sm-6 col-xs-12">
                {{ Form::select('role', $item, !empty(old('role'))?old('role'):$user->role->first()->slug, ['class' => 'form-control']) }}
            </div>
        </div>
        @endif
        @endif

                <!-- @if(empty($user))
                <div class="form-group">
                  <label class="col-md-3 col-sm-3 col-xs-12 control-label">Active</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="checkbox">
                      <label>
                        {!! Form::checkbox( 'status', !empty( $user ) ? $user->is_active : 0),null  !!}
                </label>
              </div>
            </div>
          </div>
          @endif -->

        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <a href="{{ route('setting.user.index') }}">
                    <button type="button" class="btn btn-default">Cancel</button>
                </a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
