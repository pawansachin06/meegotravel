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
        // Local eSIMs only
        $packages = $this->airaloApi->getPackages([
            'filter'=> ['type' => 'local'],
            'limit'=> 10,
        ]);
        if(!empty($req->dev)){
            dd('Local Packages', $packages);
        }
        return view('pages.index', [
            'type' => 'local',
            'packages'=> @$packages['data'],
        ]);
    }

    public function regional(Request $req)
    {
        // regional eSIMs only
        $packages = $this->airaloApi->getPackages([
            'filter'=> ['type'=> 'global'],
            'limit'=> 25,
        ]);
        if(!empty($req->dev)){
            dd('Regional Packages', $packages);
        }
        return view('pages.index', [
            'type' => 'regional',
            'packages'=> @$packages['data'],
        ]);
    }

    public function global(Request $req)
    {
        // Global eSIMs only
        $packages = $this->airaloApi->getPackages([
            'filter'=> ['type'=> 'global', 'country'=> ''],
            'limit'=> 25,
        ]);
        if(!empty($req->dev)){
            dd('Global Packages', $packages);
        }
        return view('pages.index', [
            'type' => 'global',
            'packages'=> @$packages['data'],
        ]);
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
