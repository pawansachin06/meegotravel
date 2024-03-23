<?php

namespace App\Http\Controllers;

use App\Models\Sim;
use App\Services\AiraloApi;
use App\Services\PayPalApi;
use Illuminate\Http\Request;
use Exception;

class SimController extends Controller
{
    protected $airaloApi;
    protected $payPalApi;

    public function __construct(
        AiraloApi $airaloApi, PayPalApi $payPalApi
    ) {
        $this->airaloApi = $airaloApi;
        $this->payPalApi = $payPalApi;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $items = Sim::withCount('labTests')
        //             ->paginate(10)->withQueryString();
        // return view('sims.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $req, $countrySlug)
    {
        $countryCode = $this->airaloApi->getCountryCodeFromSlug($countrySlug);
        if(empty($countryCode)) abort(404);

        $res = $this->airaloApi->getPackages([
            'filter' => [
                'country' => $countryCode,
                'limit' => 1,
            ],
        ]);
        $group = $res['data'][0] ?? [];

        if( !empty($req->dev) ){
            dd($group);
        }

        return view('sims.show', [
            'group'=> $group,
            'countrySlug' => $countrySlug,
            'title' => $group['title'],
            'image' => $group['image'],
            'country_code' => $group['country_code'],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sim $sim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sim $sim)
    {
        //
    }

    public function checkout(Request $req, $countrySlug, $packageId)
    {
        $type = $countrySlug == 'world' ? 'global' : 'local';
        $countryCode = $this->airaloApi->getCountryCodeFromSlug($countrySlug);

        $res = $this->airaloApi->getPackages([
            'filter' => ['type' => $type, 'country' => $countryCode],
            'limit' => $type == 'local' ? 1 : 100,
        ]);

        $package = [];
        $operator = [];
        if(empty($res['data'])) abort(500, 'Connection Timeout, try again');

        foreach ($res['data'] as $value) {
            if($value['slug'] == $countrySlug){
                if(!empty($value['operators'])){
                    foreach ($value['operators'] as $_operator) {
                        if(!empty($_operator['packages'])){
                            foreach ($_operator['packages'] as $_package) {
                                if($_package['id'] == $packageId){
                                    $operator = $_operator;
                                    $package = $_package;
                                }
                            }
                        }
                    }
                }
            }
        }

        $compatibleDevices = $this->airaloApi->getCompatibleDevices();

        if( !empty($req->dev) ){
            dd($package, $operator, $compatibleDevices);
        }

        return view('sims.checkout', [
            'operator' => $operator,
            'package' => $package,
            'compatibleDevices' => $compatibleDevices,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sim $sim)
    {
        //
    }
}
