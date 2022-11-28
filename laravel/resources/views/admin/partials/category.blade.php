@foreach( $categories as $sub_category)
    <option
        value="{{$sub_category->id}}">{{str_repeat('---',$level)}}{{$sub_category->name}}
    </option>
    @if(count($sub_category->childrenRecursive)>0)
    @include('admin.partials.category',['categories'=>$sub_category->childrenRecursive,'level'=>$level+1])
    @endif

@endforeach
