@extends('adminLayouts.app')


@section('content')

     <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{trans('lang.orders')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">{{trans('lang.dashboard')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('customers')}}">{{trans('lang.customers')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('lang.orders')}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

     <div class="card card-solid">
         <div class="card-body pb-0">
             <div class="row">
                 @foreach($order->products as $product)

                 <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                     <div class="card bg-light d-flex flex-fill">
                         <div class="card-header text-muted border-bottom-0">
                             {{$product->product->name}}
                         </div>
                         <div class="card-body pt-0">
                             <div class="row">
                                 <div class="col-7">
                                     <h2 class="lead"><b>{{$product->price}}</b></h2>
                                 </div>
                             </div>
                         </div>

                     </div>
                 </div>
                 @endforeach
             </div>
         </div>
         <!-- /.card-body -->

         <!-- /.card-footer -->
     </div>



@endsection
@section('script')


@endsection

