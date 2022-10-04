<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCampsiteRequest;
use App\Http\Requests\UpdateCampsiteRequest;
use App\Http\Resources\CampsiteResource;
use App\Models\Campsite;

class CampsiteController extends Controller
{
    public function index()
    {
        $campsites = Campsite::all();
        return CampsiteResource::collection($campsites);
    }

    public function store(StoreCampsiteRequest $request)
    {
        return Campsite::create($request->validated());
    }

    public function show(Campsite $campsite)
    {
        return new CampsiteResource($campsite);
    }

    public function update(UpdateCampsiteRequest $request, Campsite $campsite)
    {
        $campsite->update($request->validated());
        return new CampsiteResource($campsite);
    }

    public function destroy(Campsite $campsite)
    {
        $campsite->delete();
        return response()->noContent();
    }
}
