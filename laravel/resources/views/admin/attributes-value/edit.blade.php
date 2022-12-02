@extends('admin.layouts.master')


@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right"> ویرایش ویژگی {{ $attributesValue->name }} </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if(Session::has('error_category'))
                    <div class="alert alert-danger">
                        <div>{{session('error_category')}}</div>
                    </div>
                @endif

                <form action="{{route('attributes-value.update', $attributesValue->id)}}" method="POST">
                    <input type="hidden" name="_method" value="PATCH">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label for="name">مقدار :</label>
                                <input type="text" name="title" class="form-control"
                                       value="{{ $attributesValue->title }}"
                                       placeholder="مقدار ویژگی را وارد کنید...">
                            </div>
                            <div class="form-group">
                                <label for="category_parent">ویژگی :</label>
                                <select name="attribute" id="" class="form-control">
                                    @foreach($attributesGroup as $attribute )
                                        <option
                                            value="{{$attribute->id}}" @if($attribute->id==$attributesValue->attributeGroup->id) selected @endif>{{$attribute->name}}</option>
                                    @endforeach
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
