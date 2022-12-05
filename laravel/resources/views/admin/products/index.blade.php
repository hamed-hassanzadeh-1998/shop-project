@extends('admin.layouts.master')


@section('content')
    <section class="content">
        @if(Session::has('edit_success'))
            <div class="alert alert-success">
                <div> {{session('edit_success')}}
                </div>
            </div>
        @endif

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">محصولات</h3>
                <div class="text-left">
                    <a class="btn btn-app" href="{{route('products.create')}}">
                        <i class="fa fa-plus"></i> جدید
                    </a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        <div>{{session('error')}}</div>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                        <tr>
                            <th class="text-center">شناسه</th>
                            <th class="text-center">کد کالا</th>
                            <th class="text-center">عنوان</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td class="text-center">{{$product->id}}</td>
                                <td >{{$product->sku}}</td>
                                <td >{{$product->title}}</td>
                                <td class="text-center">
                                    <a class="btn btn-warning" href="{{route('products.edit',$product->id)}}">ویرایش</a>
                                    <div class="display-inline-block">
                                        <form action="{{route('products.destroy',$product->id)}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger">حذف</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </section>

@endsection
