<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

class PageController extends Controller
{
    public function check_usage(Request $req)
    {
        $breadcrumbs = [ ['name'=> 'Check Usage', 'link'=> route('check-usage')] ];
        return view('pages.check-usage', [
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function faqs(Request $req)
    {
        $breadcrumbs = [ ['name'=> 'FAQ', 'link'=> route('faqs')] ];
        return view('pages.faqs', [
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function topup(Request $req)
    {
        return view('pages.topup');
    }

    public function troubleshoot(Request $req){
        $breadcrumbs = [ ['name'=> 'Help & Support', 'link'=> route('troubleshoot')] ];
        return view('pages.troubleshoot', [
            'breadcrumbs' => $breadcrumbs,
        ]);
    }
}
