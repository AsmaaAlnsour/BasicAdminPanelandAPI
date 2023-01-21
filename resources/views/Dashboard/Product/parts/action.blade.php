
<a href="{{route('products.edit',$id)}}" title="تعديل" class="btn btn-success" >
    {{trans('lang.edit')}}
</a>



<a href="{{route('products.delete',$id)}}" class="btn btn-danger" title="حذف" onclick=" return confirm('هل متاكد من الحذف ؟ ')">{{trans('lang.delete')}}</a>


