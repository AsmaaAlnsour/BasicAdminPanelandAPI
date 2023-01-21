@extends('adminLayouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{trans('lang.customer')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">{{trans('lang.dashboard')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('customers')}}">{{trans('lang.customer')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('lang.create_customer')}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="card card-primary">
                <div class="card-header">
                 </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post"  id="form" action="{{route('customers.store')}}" enctype="multipart/form-data">
                    @csrf
                    @include('Dashboard.Customer.form')

                </form>
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->




@endsection
@section('script')

@endsection

