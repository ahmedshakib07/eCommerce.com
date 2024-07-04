<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageModel;
use App\Models\SystemSettingsModel;
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
        $data['getRecord'] = SystemSettingsModel::getSingle();
        $data['header_title'] = 'System Settings';
        return view('admin.setting.system_settings', $data);
    }

    public function update_system_settings(Request $request) {
        $save = SystemSettingsModel::getSingle();

        $save->website_name = trim($request->website_name);
        $save->footer_description = trim($request->footer_description);
        $save->office_address = trim($request->office_address);
        $save->office_day = trim($request->office_day);
        $save->office_time = trim($request->office_time);
        $save->office_weekend = trim($request->office_weekend);
        $save->phone = trim($request->phone);
        $save->mobile = trim($request->mobile);
        $save->email = trim($request->email);
        $save->facebook_link = trim($request->facebook_link);
        $save->twitter_link = trim($request->twitter_link);
        $save->instagram_link = trim($request->instagram_link);
        $save->youtube_link = trim($request->youtube_link);
        $save->pinterest_link = trim($request->pinterest_link);

        // For Logo
        if(!empty($request->file('logo'))){
            
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;

            $file->move('upload/settings/', $filename);

            $save->logo = trim($filename);
        }

        // For favicon
        if(!empty($request->file('favicon'))){
            
            $file = $request->file('favicon');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;

            $file->move('upload/settings/', $filename);

            $save->favicon = trim($filename);
        }

        // For footer_icon
        if(!empty($request->file('footer_icon'))){
            
            $file = $request->file('footer_icon');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr).'.'.$ext;

            $file->move('upload/settings/', $filename);

            $save->footer_icon = trim($filename);
        }

        $save->save();

        toastr()->success('Data Updated Successfully!');
        return redirect()->back();
    }
}
