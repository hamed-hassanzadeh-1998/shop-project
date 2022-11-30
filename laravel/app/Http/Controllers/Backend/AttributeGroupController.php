<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AttributeGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AttributeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributesGroup=AttributeGroup::all();
        return view('admin.attributes.index', compact('attributesGroup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributesGroup=new AttributeGroup();
        $attributesGroup->name=$request->input('title');
        $attributesGroup->type=$request->input('type');
        $attributesGroup->save();
        Session::flash('add_success', 'ویژگی جدید با موفقیت اضافه شد.');
        return Redirect::route('attributes-group.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attributesGroup=AttributeGroup::query()->findOrFail($id);
        return  view('admin.attributes.edit',compact('attributesGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attributesGroup=AttributeGroup::query()->findOrFail($id);
        $attributesGroup->name=$request->input('title');
        $attributesGroup->type=$request->input('type');
        $attributesGroup->save();
        Session::flash('edit_success', 'ویژگی '.$attributesGroup->name.'  با موفقیت ویرایش شد.');
        return Redirect::route('attributes-group.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attributes=AttributeGroup::query()->findOrFail($id);
        $attributes->delete();
        Session::flash('delete_success', 'ویژگی '.$attributes->name.'  با موفقیت حذف شد.');
        return Redirect::route('attributes-group.index');

    }
}
