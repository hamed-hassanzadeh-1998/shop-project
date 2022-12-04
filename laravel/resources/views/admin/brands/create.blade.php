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
                <h3 class="box-title pull-right">ایجاد برند جدید</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.partials.form-error')
                <form action="{{route('brands.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label for="title">نام :</label>
                                <input type="text" name="title" class="form-control"
                                       placeholder="نام برند را وارد کنید...">
                            </div>
                            <div class="form-group">
                                <label for="meta_title">توضیحات :</label>
                                <input type="text" name="description" class="form-control"
                                       placeholder=" توضیحات برند را وارد کنید...">
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
