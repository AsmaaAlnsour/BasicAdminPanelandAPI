<div class="card-body row">
    <div class="form-group  col-4">
        <label>{{trans('lang.name')}}<span
                class="text-danger">*</span></label>
        <input name="name" placeholder="{{trans('lang.name')}}"  value="{{ old('name', $data->name ?? '') }}" class="form-control  {{ $errors->has('name') ? 'border-danger' : '' }}" type="text"
               maxlength="255" />

        @if($errors->has('name'))
            <span  class="text-danger m-2 ">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="form-group  col-4">
        <label>{{trans('lang.email')}}<span
                class="text-danger">*</span></label>
        <input name="email" placeholder="{{trans('lang.name')}}"  value="{{ old('email', $data->email ?? '') }}" class="form-control  {{ $errors->has('email') ? 'border-danger' : '' }}" type="email"
               maxlength="255" />

        @if($errors->has('email'))
            <span  class="text-danger m-2 ">{{ $errors->first('email') }}</span>
        @endif
    </div>


    <div class="form-group  col-4">
        <label>{{trans('lang.balance')}}<span
                class="text-danger">*</span></label>
        <input name="balance" placeholder="{{trans('lang.balance')}}"  value="{{ old('balance', $data->balance ?? '') }}" class="form-control  {{ $errors->has('balance') ? 'border-danger' : '' }}" type="number"
               maxlength="255" />

        @if($errors->has('balance'))
            <span  class="text-danger m-2 ">{{ $errors->first('balance') }}</span>
        @endif
    </div>

    <div class="form-group  col-6">
        <label>{{trans('lang.password')}}
            @if(request()->segment(2) == 'create') <span class="text-danger">*</span>@endif
        </label>
        <input name="password" placeholder="{{trans('lang.password')}}"  value="{{ old('password') }}" class="form-control  {{ $errors->has('password') ? 'border-danger' : '' }}" type="password"
               maxlength="255" />

        @if($errors->has('password'))
            <span  class="text-danger m-2 ">{{ $errors->first('password') }}</span>
        @endif
    </div>
    <div class="form-group  col-6">
        <label>{{trans('lang.password_confirmation')}}
            @if(request()->segment(2) == 'create') <span class="text-danger">*</span> @endif
        </label>
        <input name="password_confirmation" placeholder="{{trans('lang.password_confirmation')}}"  value="{{ old('password_confirmation') }}" class="form-control  {{ $errors->has('password_confirmation') ? 'border-danger' : '' }}" type="password"
               maxlength="255" />
    </div>


</div>
<div class="card-footer text-left">
    <button type="Submit" id="submit" class="btn btn-success">{{trans('lang.save')}}</button>
    <a href="{{ URL::previous() }}" class=" btn btn-primary">{{trans('lang.cancel')}}</a>
</div>

