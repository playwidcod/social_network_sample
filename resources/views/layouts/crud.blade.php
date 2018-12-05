
<!DOCTYPE html>
<html>
<head>
    <title>index</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<!--font awesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="//{{ Request::getHost() }}:8000/socket.io/socket.io.js"></script>
import Echo from "laravel-echo"

window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001'
});
<!--font awesome-->
<style type="text/css">
.post{
  margin-left: 30px;
  /*border: 2px solid red;*/
  padding: 10px;  
}
.nav-bar{
  background: #3187ab;
  padding: 2px;
}
li{
  display: inline;
  padding: 5px;
}

.dropbtn {
    /*background-color: #4CAF50;*/
    color: black;
    border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}
.dropdown-content a:hover {background-color: #3187ab;color:white;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: grey;color:white;}

.header img {
  float: left;
  width: 70px;
  height: 70px;
  background: #555;
  margin-left: 19px;

}
.header img:hover {
  float: left;
  width: 68px;
  height: 68px;
  background: #555;
  margin-left: 19px;
  border:white solid 2px;
}
.header h1 {
  /*position: relative;*/
  top: 18px;
  left: 10px;
  margin-left: 100px;
}
.profile:hover{
  border:white solid 2px;
}
input:hover{ 
  border-bottom-color: #3187ab;
}
button:hover{ 
  border-bottom-color: #3187ab;
}
h1:hover{
  text-decoration: underline;
  text-decoration-color: #3187ab;

}
h2{
  text-decoration: none;
  position: relative;
}
h2:after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 0%;
  border-bottom: 2px solid #3187ab;;
  transition: 0.6s;
}
h2:hover:after {
  width: 100%;
}
/*.chat{
    position: fixed;
    margin-left: 1300px;
    margin-top: 610px;
    border: 1px solid grey;
    height: 20px;
    width: 200px;
    padding: 5px;
    background: grey;
} */
.chattings{
      height: 530px;
  width: 268px;
  padding: 5px;
  background: grey;
  position: fixed;
      /*margin-top: 310px;*/
    margin-left: 1200px;
}
olderchat{
  background: #cde5ef;
  height: 360px;
  width: 250px;
      padding: 5px;
  overflow: scroll;
  position: absolute;
  padding: 5px;
}
button.msg_send{
  width: 154px;
  background: #cde5ef;
  color:black;
      margin-left: 52px;
}
button.msg_close{
  width: 154px;
  background: #cde5ef;
  color:black;
      margin-left: 52px;
}
input.msg{
  height: 47px;
  width: 203px;
  margin-top: 359px;
}
recieved{
  background:#2b752b;
  color:white;
  padding: 5px;
  position: absolute;
  left: 0;
}
sent{
  background: #3187ab;
  color:white;
  padding: 5px;
  position: absolute;
  right: 0;
}
</style>
<script>
      function get_chats_func(id){  
      $(document).find(".chattings").find("user").parent().find("olderchat").children().remove();
        $.ajax({
          headers: {
            'X-CSRF-Token': "{{csrf_token()}}"
          },
          url:'/get_chats',
          dataType:'json',
          type:'post',
          data:{frdid:id},
          success:function(data){
            data.sort(function(a, b){
                return a.id - b.id;
            });
            
            $.each(data,function(){
              //haveto
              if(this.user_id == "<?php echo session()->get('id') ?>"){
                 $(document).find(".chattings").find("user").parent().find("olderchat#older"+this.friend_id+"").append('<sent><td align="left">'+this.user_chat+'</td></sent><br><br>');
              }
              if(this.friend_id == "<?php echo session()->get('id') ?>"){
                 $(document).find(".chattings").find("user").parent().find("olderchat#older"+this.user_id+"").append('<recieved><td align="right">'+this.user_chat+'</td></recieved><br><br>');
              }
            });
          }
        });
      }
      function get_count_online(){
        $(".dropup-content").children().remove();
        $("cht").html('');
          $.ajax({
            url:'/check_online',
            dataType:'json',
            type:'GET',
            success:function(data){
              $.each(data,function(){
                $("cht").html(data.length);
             return  $(".dropup-content").append('<div class="user"><img height="25" width="25" src={{URL('/')}}/storage/downloads/'+this.profile_pic+'><chat_user id='+this.user_id+'>'+this.name+'</chat_user>&nbsp;&nbsp;<button class="messege_user">Messege</button></div>');
              });
            }
          });
      }
      function messege_send(mesge,frdid){
            $.ajax({
              headers: {
                   'X-CSRF-Token': "{{csrf_token()}}"
              },
              url:'/messege',
              dataType:'html',
              type:'post',
              data:{mesge:mesge,frdid:frdid},
              success:function(data){
                $('input.msg').val('');
                var id = frdid;
               return get_chats_func(id);
              }
            });
          }    
    $(document).ready(function(){

        var eml = "<?php echo session()->get('email') ?>"; 
        $.ajax({ 
           type: 'GET', 
           url: '{{URL('/')}}/test', 
           dataType: 'json',
          success: function(data){ 
            $.each(data, function(index, element) {
                if(eml == element.email){
                    $("username").html(element.name);
                    var url = "{{URL('/')}}/storage/downloads/"+element.profile_pic;
                    $(".profile").attr('src',url);
                    $(".logo").attr('src',url);
                }
                if("{{URL::current()}}" == "{{URL('/')}}/editpro"){
                  if(eml == element.email){
                    if(element.gender == 'male'){
                        $("input[id=male]").attr('checked', 'checked');
                      }else{
                        $("input[id=female]").attr('checked', 'checked');
                      }
                      if(element.terms == 'on'){
                        $("input[id=terms]").attr('checked', 'checked');
                      }
                         $("username").html(element.name);
                         $(".datee").val(element.datee);
                         $(".email").val(element.email);
                         $(".phone").val(element.phone);
                         $(".username").val(element.name);
                         $(".catagories").val(element.catagories);
                         $(".password").val(element.password);
                         //for date
                         birthday = element.datee.toString();
                    var yearThen = parseInt(birthday.substring(0,4), 10);
                    var monthThen = parseInt(birthday.substring(5,7), 10);
                    var dayThen = parseInt(birthday.substring(8,10), 10);

                    var today = new Date();
                    var dob = new Date(yearThen, monthThen-1, dayThen);
                    var differenceInMilisecond = today.valueOf() - dob.valueOf();
                    var year_age = Math.floor(differenceInMilisecond / 31536000000);
                    var day_age = Math.floor((differenceInMilisecond % 31536000000) / 86400000);
                    // alert(day_age);
                    if ((today.getMonth() == dob.getMonth()) && (today.getDate() == dob.getDate())) {
                        alert("Happy B'day!!!");
                    }
                     $(".bday").val(year_age);
                     //for date
                     var url = "{{URL('/')}}/storage/downloads/"+element.profile_pic;
                      $(".profile").attr('src',url);
                    }
                }
            });
           }
        });
        var sesid = "<?php echo session()->get('id') ?>"; 

            $.ajax({
                      headers: {
                          'X-CSRF-Token': "{{csrf_token()}}"
                      },
                      url: '/reqstatus',
                      dataType: 'html',
                      type: 'post',
                      data: {sesid: sesid},
                      success: function(data) {
                          json = JSON.parse(data);
                          $(".req_came").html(json.length);
                          $(".req_came").ready(function(){
                            $.each(json, function(key,value){
                               $(".accporrem").append('<div class="requested" style="padding: 14px;"><input type="hidden" value="'+value.requester+'"class="hd"><img height="20" width="20" src="{{URL('/')}}/storage/downloads/'+value.profile_pic+'"><label>'+value.name+'</label><button class="accept_req">Accept</button><button class="delete_req">Remove</div>')
                             }); 
                          });
                        $(".accept_req").on('click',function(e){
                              $(this).parent().addClass('act');
                              accept_usr = $(this).parent().find(".hd").val();
                                    $.ajax({
                                        headers: {
                                             'X-CSRF-Token': "{{csrf_token()}}"
                                        },
                                        url:'/accept',
                                        dataType:'html',
                                        type:'post',
                                        data:{accept_usr:accept_usr},
                                        success:function(data){
                                          alert('Accepted');
                                         $(".req_came").html(parseInt($(".req_came").html()) - 1);
                                         $(".act").remove();
                                        }
                                     });
                        });
                        $(".delete_req").on('click',function(e){
                           $(this).parent().addClass('del');
                                    delete_usr = $(this).parent().find(".hd").val();
                                      sesid = "<?php echo session()->get('id')?>";
                                    $.ajax({
                                        headers: {
                                             'X-CSRF-Token': "{{csrf_token()}}"
                                        },
                                        url:'/remove_user',
                                        dataType:'html',
                                        type:'post',
                                        data:{delete_usr:delete_usr,sesid:sesid},
                                        success:function(data){
                                          alert("Removed from friend request");
                                          $(".req_came").html(parseInt($(".req_came").html()) - 1);
                                          $(".del").remove();
                                        }
                                     });
                                  });  
                      }
                  });
          get_count_online();
      $(document).on('click',".messege_user",function(){
        $("apd").children().remove();
          var name = $(this).parent().find('chat_user').html();  
          var id = $(this).parent().find('chat_user').attr('id');
          var src = $(this).parent().find('img').attr('src');
        $("apd").append('<div class="chattings"><img src='+src+' height="40" width="40" align="center"><br><label>Messege:</label><user id='+id+'>'+name+'</user><br><olderchat id=older'+id+'></olderchat><br><input type="text" class="msg" placeholder="messege.."><button class="msg_send">Send</button><br><button class="msg_close">close</button></div>');
          get_chats_func(id);
       
        $(".msg_close").on('click',function(){
          $(this).parent().remove();
          $(document).find(".chattings").find("user").parent().find("olderchat").children().remove();
        });
      });
      $(document).on('click','.msg_send',function(){
          var mesge = $(this).parent().find('input.msg').val();
          var frdid = $(this).parent().find('user').attr('id');
          messege_send(mesge,frdid);
      });
    });
</script>
</head>
<body style="position: relative;">
<div class="nav-bar">
<div class="header">
  <img class="logo" src="">
  <h1><a href="/" style="text-decoration: none;color:black;">Friendship Stories</a></h1>
</div>
  <b><label style="margin-left: 96px;">Welcome&nbsp;&nbsp;<username></username></label><!--i class="fa fa-bell" style="font-size:24px">
  </i--></b><ul style="display: inline;margin-left: 847px;"><div class="dropdown"><button style="background: red;color:white;" class="req_came dropbtn"></button><div style="background: red;color:white;border:none;height: 17px;float: left;margin-top: 1px;">Request -</div>&nbsp;
  <div class="dropdown-content accporrem" style="width: 294px;margin-left: -182px;">
  </div>
  </div><li><div class="dropdown">
  <button class="dropbtn">Menu</button>
  <div class="dropdown-content">  
    <a href="/profile"><img class="profile" style="height: 50px;width: 50px;"></img><br><username></username></a>
    <a href="/post">Post</a>
    <a href="/find_friends">Find Friends</a>
    <a href="/changepass">Change Password</a>
    <a href="/editpro">Edit Profile</a>
    <a href="/logout">Logout</a>
  </div>
</div></li></ul></div>
<!-- <div class="chat">Chat</div> -->
<style type="text/css">
.dropupbtn {
    background-color: #3498DB;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    margin-left: 1260px;
        position: fixed;
            margin-top: 500px;
    width: 200px;
    padding: 5px;        
}

.dropup {
    position: relative;
    display: inline-block;
}

.dropup-content {
    display: none;
       position: fixed;
    background-color: #f1f1f1;
    min-width: 160px;
    bottom: 50px;
    z-index: 1;
    margin-left: 1260px;
        margin-bottom: 100px;
}

.dropup-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    /*margin-left: 1260px;*/
}

/*.dropup-content a:hover {background-color: #ccc; }*/

.dropup:hover .dropup-content {
    display: block;
    margin-left: 1260px;margin-top: 30px;
}

.dropup:hover .dropbtn {
    background-color: #2980B9;margin-left: 1260px;    position: fixed;
}  
</style>
<div class="dropup">
  <button class="dropupbtn">Chat <label>Online:</label><cht></cht></button>
  <div class="dropup-content">

  </div>
</div>
<apd></apd>
