<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageModel;
use Auth;
use Str;

class PageController extends Controller
{
    public function list(){
        $data['getRecord'] = PageModel::getRecord();
        $data['header_title'] = 'Page';

        return view('admin.pages.list', $data);
    }

    public function edit($id){
        $data['getRecord'] = PageModel::getSingle($id);
        $data['header_title'] = 'Edit Page';
        return view('admin.pages.edit', $data);
    }

    public function update($id, Request $request){

        $page = PageModel::getSingle($id);
        $page->name = trim($request->name);
        $page->title = trim($request->title);
        $page->description_one = trim($request->description_one);
        $page->description_two = trim($request->description_two);

        $page->meta_title = trim($request->meta_title);
        $page->meta_description = trim($request->meta_description);
        $page->meta_keywords = trim($request->meta_keywords);
        $page->save();

        if(!empty($request->file('image'))){
            
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $randomStr = $page->id.Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;

            $file->move('upload/pages/', $filename);

            $page->image_name = trim($filename);
            $page->save();
        }

        toastr()->success('Page Updated Successfully!');
        return redirect('admin/page/list');
    }

    public function system_settings() {
        // $data['getRecord'] = PageModel::getSingle($id);
        $data['header_title'] = 'System Settings';
        return view('admin.setting.system_settings', $data);
    }
}
