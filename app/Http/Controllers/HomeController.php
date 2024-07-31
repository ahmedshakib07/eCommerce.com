<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageModel;
use App\Models\SystemSettingsModel;
use App\Models\ContactUsModel;
use App\Models\SliderModel;
use App\Mail\ContactUsMail;
use Session;
use Auth;
use Mail;

class HomeController extends Controller
{
    public function home() {
        $getPage = PageModel::getSlug('home');
        $data['getPage'] = $getPage;
        
        $data['getSlider'] = SliderModel::getRecordActive();

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;

        return view('home', $data);
    }

    public function about() {

        $getPage = PageModel::getSlug('about');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;

        return view('pages.about', $data);
    }

    public function contact() {

        $first_number = mt_rand(0,9);
        $second_number = mt_rand(0,9);

        $data['first_number'] = $first_number;
        $data['second_number'] = $second_number;

        Session::put('total_sum', $first_number + $second_number);

        $getPage = PageModel::getSlug('contact');
        $data['getPage'] = $getPage;

        $data['getSystemSetting'] = SystemSettingsModel::getSingle();

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;

        return view('pages.contact', $data);
    }

    public function submit_contact(Request $request) {

        if (!empty(Session::get('total_sum')) && !empty($request->verification)) {
            if (trim(Session::get('total_sum')) == trim($request->verification)) {
                $save = new ContactUsModel;
                if (!empty(Auth::check())) {
                    $save->user_id = Auth::user()->id;
                }
                $save->name = trim($request->name);
                $save->email = trim($request->email);
                $save->phone = trim($request->phone);
                $save->subject = trim($request->subject);
                $save->message = trim($request->message);
        
                $save->save();
        
                $getSystemSetting = SystemSettingsModel::getSingle();
                Mail::to($getSystemSetting->email)->send(new ContactUsMail($save));
        
                toastr()->success('Submitted Successfully!');
                return redirect()->back();
            } else {
                toastr()->error('Incorrect Verification!');
                return redirect()->back();
            }
        }else {
            toastr()->error('Incorrect Verification!');
            return redirect()->back();
        }
        
    }

    public function faq() {
        $getPage = PageModel::getSlug('faq');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;

        return view('pages.faq', $data);
    }

    public function payment_method() {
        $getPage = PageModel::getSlug('payment-method');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;

        return view('pages.payment_method', $data);
    }

    public function money_back_guarantee() {
        $getPage = PageModel::getSlug('money-back-guarantee');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;

        return view('pages.money_back_guarantee', $data);
    }

    public function returns() {
        $getPage = PageModel::getSlug('returns');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;

        return view('pages.returns', $data);
    }

    public function shipping() {
        $getPage = PageModel::getSlug('shipping');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;

        return view('pages.shipping', $data);
    }

    public function terms_conditions() {
        $getPage = PageModel::getSlug('terms-conditions');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;

        return view('pages.terms_conditions', $data);
    }

    public function privacy_policy() {
        $getPage = PageModel::getSlug('privacy-policy');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;

        return view('pages.privacy_policy', $data);
    }
}
