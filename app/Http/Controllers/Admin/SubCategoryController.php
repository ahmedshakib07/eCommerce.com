<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use Auth;

class SubCategoryController extends Controller
{
    public function list(){
        $data['getRecord'] = SubCategoryModel::getRecord();
        $data['header_title'] = 'Sub Category';
        return view('admin.subcategory.list', $data);
    }

    public function add(){
        $data['getCategory'] = CategoryModel::getRecord();
        $data['header_title'] = 'Add New Sub Category';
        return view('admin.subcategory.add', $data);
    }

    public function insert(Request $request){

        request()->validate([
            'slug' => 'required|unique:sub_category'
        ]);

        $subcategory = new SubCategoryModel;
        $subcategory->category_id = trim($request->category_id);
        $subcategory->name = trim($request->name);
        $subcategory->slug = trim($request->slug);
        $subcategory->status = trim($request->status);
        $subcategory->meta_title = trim($request->meta_title);
        $subcategory->meta_description = trim($request->meta_description);
        $subcategory->meta_keywords = trim($request->meta_keywords);
        $subcategory->created_by = Auth::user()->id;
        $subcategory->save();

        toastr()->info('Success! Sub Category Created Successfully!');
        return redirect()->back();
    }

    public function edit($id){
        $data['getCategory'] = CategoryModel::getRecord();
        $data['getRecord'] = SubCategoryModel::getSingle($id);
        $data['header_title'] = 'Edit Sub Category';
        return view('admin.subcategory.edit', $data);
    }

    public function update($id, Request $request){

        request()->validate([
            'slug' => 'required|unique:sub_category,slug,'.$id
        ]);

        $subcategory = SubCategoryModel::getSingle($id);
        $subcategory->category_id = trim($request->category_id);
        $subcategory->name = trim($request->name);
        $subcategory->slug = trim($request->slug);
        $subcategory->status = trim($request->status);
        $subcategory->meta_title = trim($request->meta_title);
        $subcategory->meta_description = trim($request->meta_description);
        $subcategory->meta_keywords = trim($request->meta_keywords);
        $subcategory->save();

        toastr()->success('Success! Sub Category Updated Successfully!');
        return redirect()->back();
    }

    public function delete($id){
        $category = SubCategoryModel::getSingle($id);
        $category->is_delete = 1;
        $category->save();

        return redirect()->back();
    }

    public function get_sub_category(Request $request){
        // dd($request->all());

        $category_id = $request->id;
        $get_sub_category = SubCategoryModel::getRecordSubCategory($category_id);
        $html = '';
        $html .= '<option value="">Select</option>';
        foreach ($get_sub_category as $value){
            $html .= '<option value="'.$value->id.'">'.$value->name.'</option>';
        }
        $json['html'] = $html;
        echo json_encode($json);
    }
}
