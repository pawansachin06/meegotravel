<?php

namespace App\Http\Controllers;

use App\Models\Sim;
use Illuminate\Http\Request;
use Exception;

class SimController extends Controller
{
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
    public function show(Sim $sim)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sim $sim)
    {
        //
    }
}
