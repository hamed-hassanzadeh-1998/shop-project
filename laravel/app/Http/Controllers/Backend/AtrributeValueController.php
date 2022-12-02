<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AttributeGroup;
use App\Models\AttributeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AtrributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributesValue = AttributeValue::query()->with('attributeGroup')->paginate(10);
        return view('admin.attributes-value.index', compact(['attributesValue']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributes_group = AttributeGroup::all();
        return view('admin.attributes-value.create', compact(['attributes_group']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'attribute' => 'required'
        ],
            [
                'title.required' => 'لطفا نام مقدار ویژگی را وارد کنید',
                'attribute.required' => 'لطفا نام ویژگی را وارد کنید',
            ]);

        $value = new AttributeValue();
        $value->title = $request->input('title');
        $value->attributeGroup_id = $request->input('attribute');
        $value->save();
        Session::flash('add_success', 'مقدار ویژگی جدید با موفقیت اضافه شد.');
        return Redirect::route('attributes-value.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attributesValue=AttributeValue::query()->with('attributeGroup')->where('id',$id)->first();
        $attributesGroup=AttributeGroup::all();
        return view('admin.attributes-value.edit',compact(['attributesValue','attributesGroup']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $value = AttributeValue::query()->findOrFail($id);
        $value->title = $request->input('title');
        $value->attributeGroup_id = $request->input('attribute');
        $value->save();
        Session::flash('edit_success', 'مقدار ویژگی '.$value->title.' با موفقیت به روزرسانی شد.');
        return Redirect::route('attributes-value.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attributes=AttributeValue::query()->findOrFail($id);
        $attributes->delete();
        Session::flash('delete_success', 'ویژگی '.$attributes->title.'  با موفقیت حذف شد.');
        return Redirect::route('attributes-value.index');

    }
}
