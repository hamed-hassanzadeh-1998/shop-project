@extends('admin.layouts.master')


@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right"> ویرایش ویژگی {{ $attributesGroup->name }} </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if(Session::has('error_category'))
                    <div class="alert alert-danger">
                        <div>{{session('error_category')}}</div>
                    </div>
                @endif

                <form action="{{route('attributes-group.update', $attributesGroup->id)}}" method="POST">
                    <input type="hidden" name="_method" value="PATCH">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label for="name">عنوان :</label>
                                <input type="text" name="title" class="form-control" value="{{ $attributesGroup->name }}"
                                       placeholder="عنوان دسته بندی را وارد کنید...">
                            </div>
                            <div class="form-group">
                                <label for="category_parent">دسته والد :</label>
                                <select name="type" id="" class="form-control">
                                    <option value="select" @if($attributesGroup->type == 'select') selected @endif>تکی</option>
                                    <option value="multiple" @if($attributesGroup->type == 'multiple') selected @endif>لیست</option>
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
