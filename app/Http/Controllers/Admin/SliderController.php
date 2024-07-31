<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SliderModel;
use Auth;
use Str;

class SliderController extends Controller
{
    public function list(){
        $data['getRecord'] = SliderModel::getRecord();
        $data['header_title'] = 'Slider';
        return view('admin.slider.list', $data);
    }

    public function add(){
        $data['header_title'] = 'Add New Slider';
        return view('admin.slider.add', $data);
    }

    public function insert(Request $request){

        $slider = new SliderModel;
        $slider->title = trim($request->title);
        $slider->intro_subtitle = trim($request->intro_subtitle);
        $slider->button_name = trim($request->button_name);
        $slider->button_link = trim($request->button_link);

        $file = $request->file('image_name');
        $ext = $file->getClientOriginalExtension();
        $randomStr = Str::random(20);
        $filename = strtolower($randomStr).'.'.$ext;

        $file->move('upload/slider/', $filename);

        $slider->image_name = trim($filename);
        $slider->status = trim($request->status);
        $slider->save();

        toastr()->info('Slider Created Successfully!');
        return redirect('admin/slider/list');
    }

    public function edit($id){
        $data['getRecord'] = SliderModel::getSingle($id);
        $data['header_title'] = 'Edit Slider';
        return view('admin.slider.edit', $data);
    }

    public function update($id, Request $request){

        $slider = SliderModel::getSingle($id);
        $slider->title = trim($request->title);
        $slider->intro_subtitle = trim($request->intro_subtitle);
        $slider->button_name = trim($request->button_name);
        $slider->button_link = trim($request->button_link);

        if ($request->file('image_name')) {
            $file = $request->file('image_name');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
    
            $file->move('upload/slider/', $filename);
            $slider->image_name = trim($filename);
        }

        $slider->status = trim($request->status);
        $slider->save();

        toastr()->success('Slider Updated Successfully!');
        return redirect('admin/slider/list');
    }

    public function delete($id){
        $slider = SliderModel::getSingle($id);
        $slider->is_delete = 1;
        $slider->save();

        return redirect()->back();
    }
}
