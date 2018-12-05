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

class upload_status extends Controller
{
   public function user_like(Request $request){
      $count = DB::table('likes')->select('user_like')->where(['user_id'=>$request->user_id,'post_id'=>$request->post_id])->count();
      // print_r($count);exit;
      if($count > 0){ 
    $db = DB::table('likes')->select('user_like')->where(['user_id'=>$request->user_id,'post_id'=>$request->post_id])->get();

    foreach ($db as $key => $value) {
      $array = json_decode(json_encode($value), True);
      // print_r();
      if($array['user_like'] == '1'){
          echo "updated";
        $data = array(
          'user_like' => '0'
        );
        DB::table('likes')->where(['user_id'=>$request->user_id,'post_id'=>$request->post_id])->update($data);
      }
      if($array['user_like'] == '0'){
          echo "updated";
        $data = array(
          'user_like' => '1'
        );
        DB::table('likes')->where(['user_id'=>$request->user_id,'post_id'=>$request->post_id])->update($data);
      }
    }
    }
    if($count == '0'){
      // print_r("first like");
      $new = DB::table('likes')->where(['user_id'=>$request->user_id,'post_id'=>$request->post_id])->get();

      if(empty(json_decode(json_encode($new)))){
        $fs_lk_wn_cmt = new user_likes_comments;
        $fs_lk_wn_cmt->user_like = '1';
        $fs_lk_wn_cmt->user_id = $request->user_id;
        $fs_lk_wn_cmt->post_id = $request->post_id;
        $fs_lk_wn_cmt->save();
      }
    }   
  }

  public function comments_viewable(Request $request){
    $data = array(
      'post_id'=>$request->lk_ct
    );
    $db = DB::table('comments')
    ->select('user_comments','post_id','profile_pic','name','comments.id')
    ->join('users','comments.user_id','=','users.id')
    ->where($data)
     ->orderBy('id', 'desc')
    ->get();
    echo json_encode($db);
  }
  public function user_comment(Request $request){

        $fs_lk_wn_cmt = new user_comments;
        $fs_lk_wn_cmt->user_comments = $request->comment;
        $fs_lk_wn_cmt->user_id = $request->user_id;
        $fs_lk_wn_cmt->post_id = $request->post_id;
        $fs_lk_wn_cmt->save();
  }
  public function view_oldr_cmts(Request $request){
    $data = array(
      'post_id'=>$request->post_id,
         );
    $db = DB::table('comments')
    ->select('name','profile_pic','user_comments','user_id','comments.id')
    ->join('users','comments.user_id','=','users.id')
    ->where($data)
    ->orderBy('id', 'desc')
    ->get();
    return $db;
  }

  public function deletecomment(Request $request){
    $data = array(
      'user_id' => auth()->user()->id,
      'id'=> $request->comt_id
    );
    $cred = count(DB::table('comments')
    ->where($data)
    ->get());
    if($cred == '0'){
       return json_encode('You are not allowed to delete');
    }else if($cred == '1'){
      DB::table('comments')->where($data)->delete();
      return json_encode('deleted'); 
    }
  }
}
