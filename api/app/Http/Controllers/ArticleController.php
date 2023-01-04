<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Article::where('status',1)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article();
        $article->name = $request->name;
        $article->barcode = $request->barcode;
        $article->brand_id = $request->brand_id;
        $article->measure_id = $request->measure_id;
        $article->category_id = $request->category_id;
        $article->buy_price = $request->buy_price;
        $article->sale_price = $request->sale_price;
        $article->minimun_stock = $request->minimun_stock;
        $article->status = $request->minimun_stock;
        $article->save();
        return $article;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return $article;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->name = $request->name;
        $article->barcode = $request->barcode;
        $article->brand_id = $request->brand_id;
        $article->measure_id = $request->measure_id;
        $article->category_id = $request->category_id;
        $article->buy_price = $request->buy_price;
        $article->sale_price = $request->sale_price;
        $article->minimun_stock = $request->minimun_stock;
        $article->status = $request->minimun_stock;
        $article->save();
        return $article;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
