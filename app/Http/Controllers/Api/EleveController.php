<?php

namespace App\Http\Controllers\Api;

use App\Models\Eleve;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Request\AddEleveRequest;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AddEleveRequest $request)
    {
        
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
    public function show(Eleve $eleve)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Eleve $eleve)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Eleve $eleve)
    {
        //
    }
}
