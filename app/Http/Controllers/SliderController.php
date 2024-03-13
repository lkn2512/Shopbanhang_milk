<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('admin.dashboard');
        } else {
            return Redirect::to('admin-login')->send();
        }
    }
    public function manage_slider()
    {
        $all_slide = Slider::orderby('slider_id', 'desc')->get();
        return view('admin.slider.list_slide')->with(compact('all_slide'));
    }

    public function add_slider()
    {
        return view('admin.slider.add_slider');
    }
    public function insert_slider(Request $request)
    {
        $data = $request->all();
        $this->AuthLogin();
        $get_image = $request->file('slider_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/slider', $new_image);

            $slider = new Slider();
            $slider->slider_name = $data['slider_name'];
            $slider->slider_image = $new_image;
            $slider->slider_status = $data['slider_status'];
            $slider->slider_desc = $data['slider_desc'];
            $slider->save();
            Session::put('message_success', 'Thêm thành công!');
            return Redirect::to('add-slider');
        } else {
            return Redirect::to('add-slider');
        }
    }
    public function unactive_slide($slider_id)
    {
        $this->AuthLogin();
        DB::table('tbl_slider')->where('slider_id', $slider_id)->update(['slider_status' => 1]);
        return Redirect::to('manage-slider');
    }
    public function active_slide($slider_id)
    {
        $this->AuthLogin();
        DB::table('tbl_slider')->where('slider_id', $slider_id)->update(['slider_status' => 0]);
        return Redirect::to('manage-slider');
    }
    public function edit_slide($slider_id)
    {
        $this->AuthLogin();
        $edit_sli = Slider::where('slider_id', $slider_id)->get();
        $manager_sli = view('admin.slider.edit_slider')->with('edit_sli', $edit_sli);
        return view('admin_layout')->with('admin.slider.edit_slider', $manager_sli);
    }
    public function update_slide(Request $request, $slider_id)
    {
        $this->AuthLogin();
        $data = $request->all();
        $slider = Slider::find($slider_id);
        $slider->slider_name = $data['slider_name'];
        $slider->slider_status = $data['slider_status'];
        $slider->slider_desc = $data['slider_desc'];
        $get_image = $request->file('slider_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/slider', $new_image);
            $slider->slider_image = $new_image;
        }
        $slider->save();
        Session::put('message_success', 'Đã cập nhật lại Banner!');
        return Redirect::to('manage-slider');
    }
    public function delete_slide($slider_id)
    {
        $this->AuthLogin();
        DB::table('tbl_slider')->where('slider_id', $slider_id)->delete();
        return Redirect::to('manage-slider');
    }
}
