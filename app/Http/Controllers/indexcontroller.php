<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\larav_model;
use \App\friendships;
use \App\user_likes_comments;
use \App\user_comments;
use \App\posts_model;
use \App\chats;
use DB;
use Validator;
use Auth;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
class indexcontroller extends Controller
{
   public function home(Request $request){
   	$data = array(
      'user_requested' => Auth::user()->id,
      'status' => '1'
         );
    $user_requested = DB::table('posts')
    ->select('posts.id','posts.title','posts.description','posts.post_vdo','users.name','users.profile_pic')  
    ->join('friendships','posts.usr_id','=','friendships.requester')
    ->join('users','friendships.requester','=','users.id')
    ->where($data)
    ->offset($request->offset)
    ->limit($request->limit)
    ->get();

    $data1 = array(
      'requester' => Auth::user()->id,
      'status' => '1'
         );
    $user_requested1 = DB::table('posts')
    ->select('posts.id','posts.title','posts.description','posts.post_vdo','users.name','users.profile_pic')  
    ->join('friendships','posts.usr_id','=','friendships.user_requested')
    ->join('users','friendships.user_requested','=','users.id')
    ->where($data1)
    ->offset($request->offset)
    ->limit($request->limit)
    ->get();
    $arr1 = json_decode($user_requested1);
    $arr = json_decode($user_requested);
    $jsonArray1 = array_merge($arr,$arr1);
     //newly updated likes start
   $new_arr =  array();
    foreach ($jsonArray1 as $key => $value) {
      $value = get_object_vars($value);
      $wth_lk = user_likes_comments::where(['post_id'=>$value['id']])->count();
      $ses_usr_lkd = user_likes_comments::select('user_like')->where(['post_id'=>$value['id'],'user_id'=>Auth::user()->id])->get();
      $likeval = json_decode(json_encode($ses_usr_lkd),True);
      $value['likes'] = $wth_lk;
      $value['auth_lkd'] = $likeval;
      array_push($new_arr, $value);
    }
    echo json_encode($new_arr);
   }
   public function edit(Request $request){
   	$data = new larav_model();
   	$data->datee = $request->datee;
   	$data->gender = $request->gender;
   	$data->email = $request->email;
   	$data->phone = $request->phone; 
    if($request->profile_pic){
     $image = $request->profile_pic->store('public/downloads');
     $image = explode("/",$image);
     $data->profile_pic = $image[2];
    }
    // print_r($data);exit;
   	DB::table('users')->where('id', Auth()->user()->id)->update($data->toArray());
   	return redirect('/editpro');
   }
     public function getstatus(Request $request){

    $new = DB::table('users')
      ->WhereNotIn('id',function($q){
        $q->select('requester')->from('friendships')->where('user_requested',auth()->user()->id);
      })
      ->WhereNotIn('id',function($q){
        $q->select('user_requested')->from('friendships')->where('requester',auth()->user()->id);
      })
      ->WhereNotIn('id',function($q){
        $q->select('id')->from('users')->where('id',auth()->user()->id);
      })
      ->select('name','id','profile_pic')
      ->orderBy('id','desc')
      ->offset($request->offset)
      ->limit($request->limit)
      ->get();
      foreach ($new as $key => $value) {
        $this_arr = get_object_vars($value);
        print_r("<table border='1' class='post li-item hide'  style='border-color:white;margin-left: 300px;'><tr><td style='padding:10px;width:67px;'>
          <img name='profile_pic' src='".URL('/')."/storage/downloads/".$this_arr['profile_pic']."' height='70' width='70'><div class='frdname' name='frdname'>".$this_arr['name']."</div>
          <input type='hidden' class='frdid' name='frdid' id='".$this_arr['id']."' value='".$this_arr['id']."'></td><td width='700' align='right'><button class='btn'>Send Request</button></td></tr></table>");
      }
  }
}
