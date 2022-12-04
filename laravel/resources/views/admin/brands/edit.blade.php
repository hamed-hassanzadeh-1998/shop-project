@extends('admin.layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{asset('/admin/dist/css/dropzone.css')}}">
@endsection

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right"> ویرایش برند {{ $brand->title }} </h3>
            </div>
            <!-- /.box-header -->
            @include('admin.partials.form-error')
            <div class="box-body">
                @if(Session::has('error_category'))
                    <div class="alert alert-danger">
                        <div>{{session('error_category')}}</div>
                    </div>
                @endif

                <form action="{{route('brands.update', $brand->id)}}" method="POST">
                    <input type="hidden" name="_method" value="PATCH">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label for="image">تصویر برند:</label>
                                <img src="{{$brand->photo->path}}" alt="">
                            </div>
                            <div class="form-group">
                                <label for="name">نام :</label>
                                <input type="text" name="title" class="form-control" value="{{ $brand->title }}"
                                       placeholder="عنوان برند را وارد کنید...">
                            </div>
                            <div class="form-group">
                                <label for="meta_title">توضیحات :</label>
                                <input type="text" name="description" class="form-control"
                                       placeholder=" توضیحات برند را وارد کنید..." value="{{$brand->description}}">
                            </div>
                            <div class="form-group">
                                <label for="photo">تصویر:</label>
                                <input type="hidden" name="photo_id" id="brand-photo" value="{{$brand->photo_id}}">
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
