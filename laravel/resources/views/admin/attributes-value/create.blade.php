@extends('admin.layouts.master')


@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ایجاد مقادیر ویژگی جدید</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if(Session::has('error_attributes'))
                    <div class="alert alert-danger">
                        <div>{{session('error_attributes')}}</div>
                    </div>
                @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <form action="{{route('attributes-value.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label for="attribute_group">انتخاب ویژگی :</label>

                                    <select name="attribute" id="" class="form-control">
                                        <option>انتخاب کنید</option>
                                        @foreach($attributes_group as $attribute )
                                        <option value="{{$attribute->id}}">{{$attribute->name}}</option>
                                        @endforeach
                                    </select>


                            </div>
                            <div class="form-group">
                                <label for="name">مقدار :</label>
                                <input type="text" name="title" class="form-control"
                                       placeholder=" مقدار ویژگی را وارد کنید..." value="{{old('title')}}">
                            </div>
                            <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>

@endsection
