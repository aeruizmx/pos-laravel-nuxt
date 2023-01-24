<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Article;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Article::with(['brand','measure','category'])->where('status',1)->get();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function kardex(Article $article)
    {
        $article->brand = $article->brand;
        $article->measure = $article->measure;
        $article->category = $article->category;
        return $article;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inventory = new Inventory();
        $inventory->motive = $request->motive;
        $inventory->article_id = $request->article_id;
        $inventory->buy = $request->buy_price;
        $inventory->sale = $request->sale_price;
        $inventory->amount = $request->amount;
        $inventory->type = $request->type;
        $inventory->save();
        return $inventory;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
}
