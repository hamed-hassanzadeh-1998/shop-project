@php use Illuminate\Support\Facades\Session; @endphp
@extends('admin.layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{asset('/admin/dist/css/dropzone.css')}}">
@endsection
@if(Session::has('add_success'))
    <div class="alert alert-success">
        <div> {{session('add_success')}}
        </div>
    </div>
@endif

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ایجاد محصول جدید</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.partials.form-error')
                <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label for="title">نام :</label>
                                <input type="text" name="title" class="form-control"
                                       placeholder="نام محصول را وارد کنید...">
                            </div>
                            <div class="form-group">
                                <label for="slug">slug :</label>
                                <input type="text" name="slug" class="form-control"
                                       placeholder="slug محصول را وارد کنید...">
                            </div>
                            <div class="form-group">
                                <label for="status">وضعیت انتشار :</label>
                                <div class="form-control">
                                <input type="radio" name="status" value="0" checked class="margin"><span class="margin">منتشر نشده</span>
                                <input type="radio" name="status" value="1" class="margin"><span class="margin">منتشر شده</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="category">دسته بندی :</label>
                                <select name="category" id="" class="form-control" multiple>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @if(count($category->childrenRecursive)>0)
                                            @include('admin.partials.category',['categories'=>$category->childrenRecursive,'level'=>1])
                                        @endif
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="brand">برند :</label>
                                <select name="brand" id="" class="form-control" >
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->title}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">توضیحات :</label>
                                <input type="text" name="description" class="form-control"
                                       placeholder=" توضیحات محصول را وارد کنید...">
                            </div>
                            <div class="form-group">
                                <label for="price">قیمت :</label>
                                <input type="number" name="price" class="form-control"
                                       placeholder="قیمت محصول را وارد کنید...">
                            </div>
                            <div class="form-group">
                                <label for="discount_price">قیمت ویژه:</label>
                                <input type="number" name="discount_price" class="form-control"
                                       placeholder="قیمت ویژه محصول را وارد کنید...">
                            </div>
                            <div class="form-group">
                                <label for="meta_title">عنوان سئو :</label>
                                <input type="text" name="meta_title" class="form-control"
                                       placeholder=" عنوان سئوی دسته بندی را وارد کنید...">
                            </div>
                            <div class="form-group">
                                <label for="meta_desc">توضیحات سئو :</label>
                                <textarea type="text" name="meta_desc" class="form-control"
                                          placeholder="توضیحات سئوی دسته بندی راه وارد کنید..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">کلمات کلیدی سئو :</label>
                                <input type="text" name="meta_keywords" class="form-control"
                                       placeholder="کلمات کلیدی سئو را وارد کنید...">
                            </div>

                            <div class="form-group">
                                <label for="photo">تصویر:</label>
                                <input type="hidden" name="photo_id" id="brand-photo">
                                <div id="photo" class="dropzone">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('/admin/dist/js/dropzone.js')}}"></script>
    <script>
        var drop = new Dropzone('#photo', {
            addRemoveLinks: true,
            maxFiles: 1,
            url: "{{ route('photos.upload') }}",
            sending: function (file, xhr, formData) {
                formData.append("_token", "{{csrf_token()}}")
            },
            success: function (file, response) {
                document.getElementById('brand-photo').value = response.photo_id
            }
        });
    </script>
@endsection
