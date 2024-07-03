<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageModel;

class HomeController extends Controller
{
    public function home() {
        $getPage = PageModel::getSlug('home');
        $data['getPage'] = $getPage;

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
        $getPage = PageModel::getSlug('contact');
        $data['getPage'] = $getPage;

        $data['meta_title'] = $getPage->meta_title;
        $data['meta_description'] = $getPage->meta_description;
        $data['meta_keywords'] = $getPage->meta_keywords;

        return view('pages.contact', $data);
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
