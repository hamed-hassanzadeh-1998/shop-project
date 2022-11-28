@extends('admin.layouts.master')


@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ایجاد دسته بندی جدید</h3>
                <div class="text-left">
{{--                    <a class="btn btn-app" href="{{route('categories.create')}}">--}}
{{--                        <i class="fa fa-plus"></i> جدید--}}
{{--                    </a>--}}
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if(Session::has('error_category'))
                    <div class="alert alert-danger">
                        <div>{{session('error_category')}}</div>
                    </div>
                @endif

                    <form action="/administrator/categories" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <label for="name">نام :</label>
                                    <input type="text" name="title" class="form-control" placeholder="ایجاد عنوان دسته بندی">
                                </div>
                                <div class="form-group">
                                    <label for="name">دسته والد :</label>
                                    <select name="category_parent" id="" class="form-control">
                                        <option value="null">
                                            بدون والد
                                        </option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                            </div>
                        </div>
                    </form>

            </div>
        </div>
    </section>


@endsection
