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
        // Global eSIMs in this order
        // 1. Global
        // 2. Europe
        // 3. Saudi
        // 4. United Kingdom (GB)
        // 5. UAE

        $groups = [];
        $totalOffers = 0;
        $maxOffers = 15;

        // get Global and Europe offers first
        $res = $this->airaloApi->getPackages([
            'filter'=> ['type' => 'global'],
            'limit'=> 10,
        ]);
        if(!empty($res['data'])){
            foreach ($res['data'] as $value) {
                if($value['slug'] == 'world' || $value['slug'] == 'europe'){
                    $groups[] = $value;
                    if(!empty($value['operators'])){
                        foreach ($value['operators'] as $operator) {
                            $totalOffers += count($operator['packages']);
                        }
                    }
                }
            }
        }

        if($totalOffers < $maxOffers){
            // get saudi arabia (SA) offers
            $res = $this->airaloApi->getPackages([
                'filter'=> ['type' => 'local', 'country'=> 'SA'],
                'limit'=> 15,
            ]);
            if( !empty($res['data']) ){
                foreach ($res['data'] as $value) {
                    if($value['country_code'] == 'SA'){
                        $groups[] = $value;
                        if(!empty($value['operators'])){
                            foreach ($value['operators'] as $operator) {
                                $totalOffers += count($operator['packages']);
                            }
                        }
                    }
                }
            }
        }

        if($totalOffers < $maxOffers){
            // get united kingdom (GB) offers
            $res = $this->airaloApi->getPackages([
                'filter'=> ['type' => 'local', 'country'=> 'GB'],
                'limit' => 15,
            ]);
            if( !empty($res['data']) ){
                foreach ($res['data'] as $value) {
                    if($value['country_code'] == 'GB'){
                        $groups[] = $value;
                        if(!empty($value['operators'])){
                            foreach ($value['operators'] as $operator) {
                                $totalOffers += count($operator['packages']);
                            }
                        }
                    }
                }
            }
        }

        if($totalOffers < $maxOffers){
            // get united arab emirates (AE) offers
            $res = $this->airaloApi->getPackages([
                'filter'=> ['type' => 'local', 'country'=> 'AE'],
                'limit' => 15,
            ]);
            if( !empty($res['data']) ){
                foreach ($res['data'] as $value) {
                    if($value['country_code'] == 'AE'){
                        $groups[] = $value;
                        if(!empty($value['operators'])){
                            foreach ($value['operators'] as $operator) {
                                $totalOffers += count($operator['packages']);
                            }
                        }
                    }
                }
            }
        }

        $countryGroups = [];
        $res = $this->airaloApi->getPackages([
            'filter'=> ['type' => 'local'],
            'limit' => 20,
        ]);
        if(!empty($res['data'])){
            $countryGroups = $res['data'];
        }


        if(!empty($req->dev)){
            dd($countryGroups , 'Sorted Packages', $totalOffers, $groups);
        }
        return view('pages.index', [
            'count' => 0,
            'maxOffers' => $maxOffers,
            'type' => 'local',
            'groups'=> $groups,
            'countryGroups' => $countryGroups,
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
