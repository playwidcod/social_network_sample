<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\larav_model;
use \App\friendships;
use \App\user_likes_comments;
use \App\user_comments;
use \App\posts_model;
use DB;
use Validator;
use Auth;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class fileController extends Controller
{
   public function user_post(Request $request){

    $data = new larav_model();
    $data->email = session()->get('email');
    $data->title = $request->title;
    $data->description = $request->description;
    $video = $request->post_vdo->store('public/downloads/videofolder');
    $video = explode("/",$video);
    $vid = explode(".",$video[3]);
    $vido_url = "/opt/lampp/htdocs/blog/storage/app/public/downloads/videofolder/".escapeshellcmd($video[3]);
    $cmd = "ffmpeg -i $vido_url 2>&1";

    $second = 5;
    if (preg_match('/Duration: ((\d+):(\d+):(\d+))/s', `$cmd`, $time)) {
        $total = ($time[2] * 3600) + ($time[3] * 60) + $time[4];
        $second = rand(1, ($total - 1));
    }

    $image  = "/opt/lampp/htdocs/blog/storage/app/public/downloads/thumbnail/$vid[0].jpg";
    $cmdd = "ffmpeg -i /opt/lampp/htdocs/blog/storage/app/public/downloads/videofolder/$video[3] -deinterlace -an -ss $second -t 00:00:01 -r 1 -y -vcodec mjpeg -f mjpeg $image 2>&1";
    exec($cmdd);

    if($vid[1] !== "mp4"){
        clearstatcache(); 
        $exc_path = "ffmpeg -i /opt/lampp/htdocs/blog/storage/app/public/downloads/videofolder/".$video[3]." -c copy /opt/lampp/htdocs/blog/storage/app/public/downloads/videofolder/".$vid[0].".mp4";
        exec($exc_path);
        unlink("file:///home/bsetec/Downloads/htdocs/blog/storage/app/public/downloads/videofolder/".$video[3]);
        $data->post_vdo = $vid[0].".mp4";
    }else{
        $data->post_vdo = $video[3];
    } 

    $data->usr_id = Auth()->user()->id;
    DB::table('posts')->insert($data->toArray());
    return redirect('/profile');
  }
}
