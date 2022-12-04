const mix=require('laravel-mix');

mix.styles(['resources/backend/css/dropzone.min.css'],'public/admin/dist/css/dropzone.css')
    .scripts(['resources/backend/js/dropzone.min.js'],'public/admin/dist/js/dropzone.js');

