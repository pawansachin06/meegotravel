<?php

namespace App\Http\Controllers;

use App\Services\AiraloApi;
use Illuminate\Http\Request;
use Exception;

class PageController extends Controller
{
    protected $airaloApi;

    public function __construct(AiraloApi $airaloApi)
    {
        $this->airaloApi = $airaloApi;
    }

    public function index(Request $req)
    {
        $packages = $this->airaloApi->getPackages();
        $dev = !empty($req->dev) ? true : false;
        if(!empty($dev)){
            dd($packages);
        }
        return view('pages.index', ['packages' => @$packages['data']]);
    }

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
