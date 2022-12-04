@extends('admin.layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{asset('/admin/dist/css/dropzone.css')}}">
@endsection
@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ایجاد برند جدید</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        <div>{{session('error')}}</div>
                    </div>
                @endif

                <form action="{{route('brands.store')}}" method="POST" >
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
    <script src="{{asset('/admin/dist/js/dropzone.js')}}"></script>
    <script>
        var drop=new Dropzone('#photo',{
            url:"{{route('photos.create')}}"
        })
    </script>
@endsection
