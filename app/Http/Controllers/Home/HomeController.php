<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Video;

class HomeController extends Controller
{
  // public function __construct()
  // {
  //    $this->middleware('auth');
  // }

  public function index()
  {

      if  (Auth::check()) {
        if (Auth::user()->role_id == 2) {
          $videos = Video::all();
          return view('user.home.home', compact('videos'));
        }
        elseif (Auth::user()->role_id == 1) {
          return view('admin.log-member.log-member');
        }
      }
      else {
        $videos = Video::all();
        return view('user.home.home', compact('videos'));
      }
  }

  public function showByCategories(Request $request){
      $categories = Video::where('id_kategori', $request->id_kategori);
      return view('category.film', compact('categories'));
  }
}
