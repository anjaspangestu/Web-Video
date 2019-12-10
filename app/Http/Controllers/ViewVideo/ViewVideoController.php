<?php

namespace App\Http\Controllers\ViewVideo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Video;
use App\Like;
use App\Comment;

class ViewVideoController extends Controller
{
    public function index(Request $request){
      $video = Video::where('slug_video', $request->slug_video)->first();
      $comment = Comment::where('id_video', $request->id)->get();
      $like = Like::where('id_video', $request->id)->count();
      return view('user.view_video.view_video', compact('video','comment', 'like'));
    }

    public function likeVideo(Request $request){
      try {
        $video = Video::where('id', $request->id_video)->first();
        $datalike = new Like;
        $datalike->likes += 1;
        $datalike->id_member = Auth::user()->id;
        $datalike->id_video = $video->id;
        $datalike->save();

        return response()
          ->json(['status' => true, 'description' => 'Berhasil Menambahkan Data !!!']);

      } catch (\Exception $e) {
        return response()
          ->json(['status' => false, 'description' => $e]);
      }
    }

    public function commentVideo(Request $request){
      try {
        $video = Video::where('id', $request->id_video)->first();
        $datalike = new Like;
        $datalike->komentar = $request->komentar;
        $datalike->id_member = Auth::user()->id;
        $datalike->id_video = $video->id;
        $datalike->save();

        return response()
          ->json(['status' => true, 'description' => 'Data Berhasil Ditambahkan !!!']);

      } catch (\Exception $e) {
        return response()
          ->json(['status' => true, 'description' => $e]);
      }
    }

    public function commentView(Request $request){
      try {
        $comment = DB::table('comments')
                  ->join('users','users.id', '=', 'videos.id_member')
                  ->select('videos.*','users.photo_path', 'users.name')
                  ->get();
                  
        if($comment->count()==0){
          $html = "";
        }
        else{
          $html = "";
          foreach ($comment as $key) {
            $html .= "<div class='channels-card-image'>";
            $html .= "<div class='row'>";
            $html .= "<div class='col-2'>";
            $html .= "<a href='#'><img src='". asset("img/profile_pict/".$key->photo_path) ."' class='img-fluid' alt='people' style='width:50px;height:50px;margin-left:25px;'></a>";
            $html .= "</div>";
            $html .= "<div class='col-10'>";
            $html .= "<div class='form-group'>";
            $html .= "<p><b>". $key->name ."</b><br>". $key->created_at ."</p>";
            $html .= "<span>". $key->komentar ."</span>";
            $html .= "</div>";
            $html .= "</div>";
            $html .= "</div>";
            $html .= "</div>";
            $html .= "<hr>";
          }
          return response()
          ->json(['status' => true, 'description' => 'done !!!', 'data'=> $html]);
        }
      } catch (\Exception $e) {
        return response()
        ->json(['status' => false, 'description'=> $e]);
      }
    }

}
