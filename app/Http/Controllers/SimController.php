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
            'title' => $res['data'][0]['title'],
            'image' => $res['data'][0]['image'],
            'country_code' => $res['data'][0]['country_code'],
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

    public function checkout(Request $req)
    {
        // return $this->payPalApi->postOrder();
        return view('sims.checkout');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sim $sim)
    {
        //
    }
}
