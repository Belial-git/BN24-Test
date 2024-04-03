<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserBasketResource;
use App\Models\UserBasket;
use Illuminate\Http\Request;

class UserBasketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserBasketResource::collection(UserBasket::all());
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
    public function show(string $id)
    {
        return new UserBasketResource(UserBasket::query()->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
