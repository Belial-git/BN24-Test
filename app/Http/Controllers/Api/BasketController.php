<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use app\Http\Resources\Api\BasketResource;
use app\Models\Api\Basket;
use App\Models\Api\BasketItem;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BasketResource::collection(Basket::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'basket_id' => 'required',
            'product_id' => 'required',
            'price' => 'required'
        ]);
        return BasketItem::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new BasketResource(Basket::query()->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $basket = Basket::query()->find($id);
        $basket->update($request->all());
        return $basket;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return BasketItem::destroy($id);
    }
}
