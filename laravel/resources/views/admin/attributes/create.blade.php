@extends('admin.layouts.master')


@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ایجاد ویژگی جدید</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if(Session::has('error_attributes'))
                    <div class="alert alert-danger">
                        <div>{{session('error_attributes')}}</div>
                    </div>
                @endif

                <form action="{{route('attributes-group.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label for="name">عنوان :</label>
                                <input type="text" name="title" class="form-control"
                                       placeholder="عنوان دسته بندی ویژگی را وارد کنید...">
                            </div>
                            <div class="form-group">
                                <label for="category_parent">نوع :</label>
                                <select name="type" id="" class="form-control">
                                    <option value="select">لیست تکی</option>
                                    <option value="multiple">لیست چندتایی</option>
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
