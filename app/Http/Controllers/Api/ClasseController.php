<?php

namespace App\Http\Controllers\Api;


use App\Models\Classe;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\ClasseResource;
use App\Http\Requests\AddClasseRequest;
use App\Http\Services\Api\EcoleService;
use App\Http\Requests\EditClasseRequest;
use App\Http\Resources\ClasseResourceEcole;


class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "success" => true,
            "data" => ClasseResourceEcole::collection(EcoleService::getClasses(auth()->id()))
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddClasseRequest $request)
    {
        return response()->json([
            "success" => true,
            "data" => new ClasseResource
            (

                Classe::create
                (
                    array_merge
                    (
                        $request->validated(),
                                ["ecole_id" => auth()->user()->id]
                        )
                )
            )
        ], 201);
    }
    /**
     * Display the specified resource.
     */
    public function show(Classe $classe)
    {
        if (! Gate::allows('update-classe', $classe)) {
            return response()->json([
                "success" => false,
                "message" => "Access refusé"
            ],403);
        }
        $classe->load(["ecole"]);
        return response()->json([
            "success" => true,
            "data" => new ClasseResource($classe)
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditClasseRequest $request, Classe $classe)
    {
        if (! Gate::allows('update-classe', $classe)) {
            return response()->json([
                "success" => false,
                "message" => "Access refusé"
            ],403);
        }
        $classe->update($request->validated());
        return response()->json([
            "success" => true,
            "data" => new ClasseResource($classe)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classe $classe)
    {
        if (! Gate::allows('update-classe', $classe)) {
            return response()->json([
                "success" => false,
                "message" => "Access refusé"
            ],403);
        }
        $classe->delete();
        return response()->json([
        ],204);
    }
}
