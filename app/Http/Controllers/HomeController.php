<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        $data['meta_title'] = 'Home';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        return view('home', $data);
    }

    public function about() {
        $data['meta_title'] = 'About us';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        return view('page.about', $data);
    }

    public function contact() {
        $data['meta_title'] = 'Contact us';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        return view('page.contact', $data);
    }

    public function faq() {
        $data['meta_title'] = 'FAQ';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        return view('page.faq', $data);
    }

    public function payment_method() {
        $data['meta_title'] = 'Payment Method';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        return view('page.payment_method', $data);
    }

    public function money_back_guarantee() {
        $data['meta_title'] = 'money_back_guarantee';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        return view('page.money_back_guarantee', $data);
    }

    public function returns() {
        $data['meta_title'] = 'returns';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        return view('page.returns', $data);
    }

    public function shipping() {
        $data['meta_title'] = 'shipping';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        return view('page.shipping', $data);
    }

    public function terms_conditions() {
        $data['meta_title'] = 'Terms Conditions';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        return view('page.terms_conditions', $data);
    }

    public function privacy_policy() {
        $data['meta_title'] = 'Privacy Policy';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        return view('page.privacy_policy', $data);
    }
}
