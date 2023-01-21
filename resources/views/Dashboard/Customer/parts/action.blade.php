
<a href="{{route('customers.edit',$id)}}" title="تعديل" class="btn btn-success" >
    {{trans('lang.edit')}}
</a>
<a href="{{route('customers.orders',$id)}}" title="تعديل" class="btn btn-success" >
    {{trans('lang.orders')}}
</a>


<a href="{{route('customers.delete',$id)}}" class="btn btn-danger" title="حذف" onclick=" return confirm('هل متاكد من الحذف ؟ ')">{{trans('lang.delete')}}</a>


