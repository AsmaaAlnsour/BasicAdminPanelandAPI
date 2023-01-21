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
        <label>{{trans('lang.price')}}<span
                class="text-danger">*</span></label>
        <input name="price" placeholder="{{trans('lang.price')}}"  value="{{ old('price', $data->price ?? '') }}" class="form-control  {{ $errors->has('rice') ? 'border-danger' : '' }}" type="number"
               maxlength="255" />

        @if($errors->has('price'))
            <span  class="text-danger m-2 ">{{ $errors->first('price') }}</span>
        @endif
    </div>


    <div class="form-group  col-4">
        <label>{{trans('lang.quantity')}}<span
                class="text-danger">*</span></label>
        <input name="quantity" placeholder="{{trans('lang.quantity')}}"  value="{{ old('quantity', $data->quantity ?? '') }}" class="form-control  {{ $errors->has('rice') ? 'border-danger' : '' }}" type="number"
               maxlength="255" />

        @if($errors->has('quantity'))
            <span  class="text-danger m-2 ">{{ $errors->first('quantity') }}</span>
        @endif
    </div>


</div>
<div class="card-footer text-left">
    <button type="Submit" id="submit" class="btn btn-success">{{trans('lang.save')}}</button>
    <a href="{{ URL::previous() }}" class=" btn btn-primary">{{trans('lang.cancel')}}</a>
</div>

