<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Video;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos = Video::all();
        $categories = Categories::all();
        return view('home', compact('videos','categories'));
    }

    public function showByCategories(Request $request){
        $categories = Video::where('id_kategori', $request->id_kategori);
        return view('category.film', compact('categories'));
    }

}
