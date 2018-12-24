@include('layouts.crud')
<body>
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

<script src="https://cdn.jsdelivr.net/jpages/0.7/js/jPages.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{URL('/')}}/storage/Client-Side-Pagination-Plugin-jQuery-cPager/css/cPager.css">
<script src="{{URL('/')}}/storage/Client-Side-Pagination-Plugin-jQuery-cPager/js/cPager.js"></script>
<script src="http://localhost:8000/storage/js_files/profile.js"></script>

<style type="text/css">
.title{
	border:4px outset #dad2d2;
	width: 320px;
    padding: 2px;
    background: #ccd6e2;
    float: left;
    margin-left: 10px;
}
h3{
	/*margin-left: 124px;*/
    /*margin-bottom: -21px;*/
    margin-top: 5px;
}
p{
	margin-left: 12px;
}
.pagination{
	float: left;
    margin-top: 343px;
    margin-left: -120px;
    /*background: grey;*/
}
.popups{
  background: white;
  height: 200px;
  width: 500px;
  border:5px inset #3187ab;
  margin-left: 500px;
  position: fixed;
} 
.video {
 max-width: 600px; 
  overflow: hidden;
}

.videosList {
  height: 330px;
  width: 600px;
  margin-bottom: 50px;
}

/* Hide Play button + controls on iOS */
video::-webkit-media-controls {
    display:none !important;
} 
</style>

<<<<<<< HEAD

<!--script>
=======
<popups class="popups" align="center" style="display: none;">
<!--   <h1>Update Your Post</h1>
  <label>Title :</label><input type="text" name="tile" class="tile"><br>
  <label>Description :</label><input type="text" name="descr" class="descr"><br>
  <update>Update</update></popups><br> -->
</popups>
<script>
<<<<<<< HEAD
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a
function get_comments(post_id,not_need){
      $.ajax({
        headers: {
            'X-CSRF-Token': "{{csrf_token()}}"
          },                                                                                            
        url:"/comments_viewable_opt",
        type:'post',
        dataType:'json',
        data:{lk_ct:post_id,not_need:not_need},
        success:function(data){
          var i = 0;
        $.each(data,function(){
          i++;
          $(document).find('.comments'+this.post_id+'').append('<div class="row" id='+this.id+'><img height="20" width="20" src="{{URL('/')}}/storage/downloads/'+this.profile_pic+'"><usr>'+this.name+'</usr><br><b>Comment:</b><li>'+this.user_comments+'</li><button class="delete_cmt">Delete</button><hr></div>');
          if(i == parseInt(data.length)){
                $(document).find(".active"+this.post_id+"").find('comments.comments'+this.post_id+'').append('<button style="float:left;" class="loadMore">Load more</button><br><br>');
                }     
            });
        if(data.length == 0){ 
            $(document).find('.comments'+post_id+'').children().last().append('<no_comments style="color:red;">No more comments</no_comments>');
          }
          }
      });
    }
<<<<<<< HEAD
=======
=======

>>>>>>> 580f059565a09bf54d379eb93e6b7ed6bf55ab45
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a
 $(document).ready(function(){
 
       $.ajax({ 
           type: "GET", 
           url: '/profile_datt', 
           dataType: 'json',
          success: function(data){
            $.each(data, function(){
              file = this.post_vdo.split('.');
<<<<<<< HEAD
              $(".post").append('<div class="title li-item hide" ><h3 id="title'+this.id+'">'+this.title+'</h3><input type="hidden" class="post_id" id="post_id'+this.id+'" value="'+this.id+'"><input type="hidden" class="sr" value="'+file[0]+'"><div class="video"><img src="{{URL('/')}}/storage/downloads/thumbnail/'+file[0]+'.jpg" height="240" width="315"><video autoplay muted style="display:none;" width="320" height="240" controls><source class="vdo" src="{{URL('/')}}/storage/downloads/videofolder/'+this.post_vdo+'" type="video/mp4"><source class="vdo" src="{{URL('/')}}/storage/downloads/videofolder/'+this.post_vdo+'" type="video/mp4"><source class="vdo" src="{{URL('/')}}/storage/downloads/videofolder/'+this.post_vdo+'" type="video/mp4">Your browser does not support the video tag.</video></div><div class="description"><p><b>Description:</b>&nbsp;<des id="desc'+this.id+'">'+this.description+'</des></p></div><button class="delete">Delete the post</button><p><button class="myBtn'+this.id+'" id="myBtn">Edit Post</button></p>&nbsp;&nbsp;&nbsp;Like:&nbsp;<like>'+this.likes+'</like><br><br><b>Comments:</b><comments class="comments'+this.id+'"></comments><textarea class="comment" placeholder="comment here..."></textarea><br><button class="user_comment" style="background:#3187aa;color:white;">Comment</button></div></div>'); 
=======
<<<<<<< HEAD
              $(".post").append('<div class="title li-item hide" ><h3 id="title'+this.id+'">'+this.title+'</h3><input type="hidden" class="post_id" id="post_id'+this.id+'" value="'+this.id+'"><input type="hidden" class="sr" value="'+file[0]+'"><div class="video"><img src="{{URL('/')}}/storage/downloads/thumbnail/'+file[0]+'.jpg" height="240" width="315"><video autoplay muted style="display:none;" width="320" height="240" controls><source class="vdo" src="{{URL('/')}}/storage/downloads/videofolder/'+this.post_vdo+'" type="video/mp4"><source class="vdo" src="{{URL('/')}}/storage/downloads/videofolder/'+this.post_vdo+'" type="video/mp4"><source class="vdo" src="{{URL('/')}}/storage/downloads/videofolder/'+this.post_vdo+'" type="video/mp4">Your browser does not support the video tag.</video></div><div class="description"><p><b>Description:</b>&nbsp;<des id="desc'+this.id+'">'+this.description+'</des></p></div><button class="delete">Delete the post</button><p><button class="myBtn'+this.id+'" id="myBtn">Edit Post</button></p>&nbsp;&nbsp;&nbsp;Like:&nbsp;<like>'+this.likes+'</like><br><br><b>Comments:</b><comments class="comments'+this.id+'"></comments><textarea class="comment" placeholder="comment here..."></textarea><br><button class="user_comment" style="background:#3187aa;color:white;">Comment</button></div></div>'); 
=======
              $(".post").append('<div class="title li-item hide" ><h3>'+this.title+'</h3><input type="hidden" class="post_id" value="'+this.id+'"><input type="hidden" class="sr" value="'+file[0]+'"><div class="video"><img src="{{URL('/')}}/storage/downloads/thumbnail/'+file[0]+'.jpg" height="240" width="315"><video autoplay muted style="display:none;" width="320" height="240" controls><source class="vdo" src="{{URL('/')}}/storage/downloads/videofolder/'+this.post_vdo+'" type="video/mp4"><source class="vdo" src="{{URL('/')}}/storage/downloads/videofolder/'+this.post_vdo+'" type="video/mp4"><source class="vdo" src="{{URL('/')}}/storage/downloads/videofolder/'+this.post_vdo+'" type="video/mp4">Your browser does not support the video tag.</video></div><div class="description"><p><b>Description:</b>&nbsp;<des>'+this.description+'</des></p></div><button class="delete">Delete the post</button><p><button id="myBtn">Edit Post</button></p>&nbsp;&nbsp;&nbsp;Like:&nbsp;<like>'+this.likes+'</like><br><br><b>Comments:</b><comments class="comments'+this.id+'"></comments><textarea class="comment" placeholder="comment here..."></textarea><br><button class="user_comment" style="background:#3187aa;color:white;">Comment</button></div></div>'); 
>>>>>>> 580f059565a09bf54d379eb93e6b7ed6bf55ab45
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a

$(".video").hover(function(){
    $(this).parent().find(".video").children("img").css({"display":"none"});
    $(this).parent().find(".video").children("video").css({"display":""});
    }, function(){
    $(this).parent().find(".video").children("img").css({"display":""});
    $(this).parent().find(".video").children("video").css({"display":"none"});
});
              $("#listShow").cPager({
                          jPagesSize: 5,
                          pageid: "pager",
                          itemClass: "title"
                        });
                        $("#listShow").cPager({
                          pageSize: 4,                                                  
                          pageid: "pager",
                          itemClass: "title",
                          pageIndex: 1
                        });
               $.ajax({
                    headers: {
                        'X-CSRF-Token': "{{csrf_token()}}"
                      },                                                                                            
                    url:"/comments_viewable",
                    type:'post',
                    dataType:'json',
                    data:{lk_ct:this.id},
                    success:function(data){

<<<<<<< HEAD
                          var i = 0;
                        $.each(data,function(){
                              i++;
                             $(document).find('.comments'+this.post_id+'').append('<div class="row" id='+this.id+'><img height="20" width="20" src="{{URL('/')}}/storage/downloads/'+this.profile_pic+'"><usr>'+this.name+'</usr><br><b>Comment:</b><li>'+this.user_comments+'</li><button id="delete_cmt'+this.id+'" class="delete_cmt">Delete</button><hr></div>');
=======
<<<<<<< HEAD
                          var i = 0;
                        $.each(data,function(){
                              i++;
                             $(document).find('.comments'+this.post_id+'').append('<div class="row" id='+this.id+'><img height="20" width="20" src="{{URL('/')}}/storage/downloads/'+this.profile_pic+'"><usr>'+this.name+'</usr><br><b>Comment:</b><li>'+this.user_comments+'</li><button id="delete_cmt'+this.id+'" class="delete_cmt">Delete</button><hr></div>');
=======
                      // console.log(data);
                          var i = 0;
                        $.each(data,function(){
                              i++;
                             $(document).find('.comments'+this.post_id+'').append('<div class="row" id='+this.id+'><img height="20" width="20" src="{{URL('/')}}/storage/downloads/'+this.profile_pic+'"><usr>'+this.name+'</usr><br><b>Comment:</b><li>'+this.user_comments+'</li><button class="delete_cmt">Delete</button><hr></div>');
>>>>>>> 580f059565a09bf54d379eb93e6b7ed6bf55ab45
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a
                             
                             if(data.length > 3){
                              $(document).find('.comments'+this.post_id+'').parent().addClass('active'+this.post_id+'');
                                
                                if(i == data.length){
                                  $(document).find(".active"+this.post_id+"").find('comments').children(".row").slice(1, data.length).hide();

                                  $(document).find(".active"+this.post_id+"").find('comments').children(".loadMore").remove();
                                 
                                  $(document).find(".active"+this.post_id+"").find('comments').append('<button style="float:left;" class="loadMore">Load more</button><br><br>');
                                }
                             }
                        });
                    }
              });
            });
           }
        });  
 
                $(document).on('click','.loadMore', function (e) {
                  $(".loadMore").parent().parent().removeClass("test");
                  $(this).parent().parent().addClass("test");
                                e.preventDefault();
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a
                                // $(this).parent().parent().find(".row:hidden").slice(0, 3).slideDown();
          get_cmt_lt = parseInt($(this).parent().parent().find("comments").children("div.row:visible").length);
                        not_need = new Array();
                        for (var i = 0; i < get_cmt_lt; i++) {
                          comt_id = $(this).parent().parent().find("comments").children("div.row").eq(i).attr('id');
                                    not_need.push(comt_id);
                                      
                                    }   
                                     // console.log(not_need);            
                                post_id = $(this).parent().parent().find("input.post_id").val();
                                if(get_cmt_lt >= 4){
                                  // alert(post_id);
                                  $(this).next().remove();
                                  $(this).next().remove();
                                  $(this).remove();
                                    get_comments(post_id,not_need);
                                }else{
                                  $(this).parent().parent().find(".row:hidden").slice(0, 3).slideDown();
                                }
                                // alert(get_cmt_lt);return false;
                                if ($(this).parent().parent().find(".row:hidden").length == 0) {
                                    $("#load").fadeOut('slow');
                                }
                                // $('html,body').animate({
                                //     scrollTop: $(this).offset().top
                                // }, 1500);
<<<<<<< HEAD
=======
=======
                                $(this).parent().parent().find(".row:hidden").slice(0, 2).slideDown();
                                if ($(this).parent().parent().find(".row:hidden").length == 0) {
                                    $("#load").fadeOut('slow');
                                }
                                $('html,body').animate({
                                    scrollTop: $(this).offset().top
                                }, 1500);
>>>>>>> 580f059565a09bf54d379eb93e6b7ed6bf55ab45
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a
                            });
   $(document).on('click',".delete",function(){

        var user_post = $(this).parent().find('input.post_id').val();
        var src = $(this).parent().find('input.sr').val();
        // alert(user_post);
       $.ajax({ 
           headers: {
              'X-CSRF-Token': "{{csrf_token()}}"
            },
           type: 'POST', 
           url: '{{URL('/')}}/deletepost', 
           data:{user_post:user_post,src:src},
           dataType: 'html',
          success: function(data){
            $(document).find("div.title").children("comments.comments"+user_post+"").parent().remove();
           }
        });
    }); 
$(document).on('click',".user_comment",function(){
                var post_id = $(this).parent().find('.post_id').val();
                var user_id = "{{ session()->get('id') }}";
                var comment = $(this).parent().find('.comment').val();
                 // console.log(comment);      
                if(comment == ''){
                    alert("please enter your comment");return false;
                }
                $(this).attr("disabled","disabled");
                $.ajax({
                    headers: {  
                          'X-CSRF-Token': "{{csrf_token()}}"
                      },
                    url:"/comment",
                    type:'post',
                    data:{user_id:user_id,post_id:post_id,comment:comment},
                    dataType:'html',
                    success:function(data){
                        //haveto
                        $("comments.comments"+post_id+"").children("div.row").remove();
                        $('.comment').val('');
                        $("comments.comments"+post_id+"").siblings("button.user_comment").prop("disabled",false);
                          $.ajax({
                              headers: {
                                  'X-CSRF-Token': "{{csrf_token()}}"
                                },                                                                                            
                              url:"/comments_viewable",
                              type:'post',
                              dataType:'json',
                              data:{lk_ct:post_id},
                              success:function(data){

                                    var i = 0;
                                  $.each(data,function(){
                                        i++;
                                       $(document).find('.comments'+this.post_id+'').append('<div class="row" id='+this.id+'><img height="20" width="20" src="{{URL('/')}}/storage/downloads/'+this.profile_pic+'"><usr>'+this.name+'</usr><br><b>Comment:</b><li>'+this.user_comments+'</li><button class="delete_cmt">Delete</button><hr></div>');
                                       if(data.length > 3){
                                        $(document).find('.comments'+this.post_id+'').parent().addClass('active'+this.post_id+'');
                                          if(i == data.length){
                                            $(document).find(".active"+this.post_id+"").find('comments').children(".row").slice(1, data.length).hide();
                                            $(document).find(".active"+this.post_id+"").find('comments').children(".loadMore").remove();
<<<<<<< HEAD
                                            $(document).find(".active"+this.post_id+"").find('comments').append('<button style="float:left;" class="loadMore">Load more</button>');
=======
<<<<<<< HEAD
                                            $(document).find(".active"+this.post_id+"").find('comments').append('<button style="float:left;" class="loadMore">Load more</button>');
=======
                                            $(document).find(".active"+this.post_id+"").find('comments').append('<button style="float:left;" class="loadMore">Load more</button><br><br>');
>>>>>>> 580f059565a09bf54d379eb93e6b7ed6bf55ab45
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a
                                          }
                                       }
                                  });
                              }
                          });
                        //haveto
                    }
                });  
            });
  $(document).on('click',"#myBtn",function(){
    $(window).scrollTop(0);
<<<<<<< HEAD
    $("popups.popups").children().remove();
       var title = $(this).parent().parent().find("h3").html();
       var description = $(this).parent().parent().find("des").html();
        var id = $(this).parent().parent().find("input.post_id").val();
       
        $("popups.popups").append('<h1>Update Your Post</h1><label>Title :</label><input style="white-space: pre;" type="text" name="tile" class="tile" value="'+title+'"><br><label>Description :</label><input type="text" name="descr" class="descr" value="'+description+'"><br><br><button class="update_pos">Update</button><button class="close">close</button>').slideDown();
=======
<<<<<<< HEAD
    $("popups.popups").children().remove();
       var title = $(this).parent().parent().find("h3").html();
       var description = $(this).parent().parent().find("des").html();
        var id = $(this).parent().parent().find("input.post_id").val();
       
        $("popups.popups").append('<h1>Update Your Post</h1><label>Title :</label><input style="white-space: pre;" type="text" name="tile" class="tile" value="'+title+'"><br><label>Description :</label><input type="text" name="descr" class="descr" value="'+description+'"><br><br><button class="update_pos">Update</button><button class="close">close</button>').slideDown();
=======
       var title = $(this).parent().parent().find("h3").html();
       var description = $(this).parent().parent().find("des").html();
        var id = $(this).parent().parent().find("input.post_id").val();
       $("popups.popups").html('');
        $("popups.popups").slideDown().append('<h1>Update Your Post</h1><label>Title :</label><input type="text" name="tile" class="tile" value='+title+'><br><label>Description :</label><input type="text" name="descr" class="descr" value='+description+'><br><br><button class="update_pos">Update</button><button class="close">close</button>');
>>>>>>> 580f059565a09bf54d379eb93e6b7ed6bf55ab45
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a
        $("button.close").on('click',function(){
            $("popups.popups").slideUp();
        });
        $(".update_pos").on('click',function(){
            title = $(this).parent().find(".tile").val();
            description = $(this).parent().find(".descr").val();
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a
            if(title == ''){
              alert("please enter title");
              return false;
            }
            if(description == ''){
              alert("please enter description");
              return false;
            }
<<<<<<< HEAD
=======
=======
>>>>>>> 580f059565a09bf54d379eb93e6b7ed6bf55ab45
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a
            $.ajax({
              headers: {
                          'X-CSRF-Token': "{{csrf_token()}}"
                      },
                    url:"/upd_post",
                    type:'post',
                    data:{title:title,id:id,description:description},
                    dataType:'html',
                    success:function(data){
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a

                      $("input#post_id"+id+".post_id").parent().find("h3#title"+id+"").html(title);
                      $("input#post_id"+id+".post_id").parent().children().find("des#desc"+id+"").html(description);
                      $("popups.popups").slideUp();
                      // alert("updated");
<<<<<<< HEAD
=======
=======
                      $("popups.popups").slideUp();
                      alert("updated");
                      location.reload();
>>>>>>> 580f059565a09bf54d379eb93e6b7ed6bf55ab45
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a
                    }
            });
        });
  });
<<<<<<< HEAD
  
    $(document).on('click','.delete_cmt',function(){
=======
<<<<<<< HEAD
  
    $(document).on('click','.delete_cmt',function(){
=======

 

    $(document).on('click','.delete_cmt',function(){
        // $(this).parent().parent().find("div#231.row").css({"background":"red"}).remove();
>>>>>>> 580f059565a09bf54d379eb93e6b7ed6bf55ab45
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a
        var comt_id = $(this).parent().attr('id');
        var post_id = $(this).parent().parent().parent().children("input.post_id").val();
        $.ajax({
          headers: {
              'X-CSRF-Token': "{{csrf_token()}}"
          },
          url:"/deletecomment",
          type:'post',
          data:{comt_id:comt_id},
          dataType:'html',
          success:function(data){
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a
            $("comments.comments"+post_id+"").find("div#"+comt_id+".row").next().show();
            $("comments.comments"+post_id+"").find("div#"+comt_id+".row").remove();

            if( parseInt($("comments.comments"+post_id+"").children("div.row").length) < 4){
              $("comments.comments"+post_id+"").children("button.loadMore").next().remove();
              $("comments.comments"+post_id+"").children("button.loadMore").next().remove();
              $("comments.comments"+post_id+"").children().show();
              $("comments.comments"+post_id+"").children("button.loadMore").remove();
            }
          }
        });
    });
    
<<<<<<< HEAD
=======
=======
              $("comments.comments"+post_id+"").children("div.row").remove();
              $.ajax({
                              headers: {
                                  'X-CSRF-Token': "{{csrf_token()}}"
                                },                                                                                            
                              url:"/comments_viewable",
                              type:'post',
                              dataType:'json',
                              data:{lk_ct:post_id},
                              success:function(data){

                                    var i = 0;
                                  $.each(data,function(){
                                        i++;
                                       $(document).find('.comments'+this.post_id+'').append('<div class="row" id='+this.id+'><img height="20" width="20" src="{{URL('/')}}/storage/downloads/'+this.profile_pic+'"><usr>'+this.name+'</usr><br><b>Comment:</b><li>'+this.user_comments+'</li><button class="delete_cmt">Delete</button><hr></div>');
                                       if(data.length > 3){
                                        $(document).find('.comments'+this.post_id+'').parent().addClass('active'+this.post_id+'');
                                          if(i == data.length){
                                            $(document).find(".active"+this.post_id+"").find('comments').children(".row").slice(1, data.length).hide();
                                            $(document).find(".active"+this.post_id+"").find('comments').children(".loadMore").remove();
                                            $(document).find(".active"+this.post_id+"").find('comments').append('<button style="float:left;" class="loadMore">Load more</button><br><br>');
                                          }
                                       }
                                  });
                              }
                          });
          }
        });
    });
>>>>>>> 580f059565a09bf54d379eb93e6b7ed6bf55ab45
>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a
 });   
</script-->
<h1 align="center"><username></username>
  <div align="left" class="turn-page" id="pager"></div><br>
<img ng-src="@{{testtpro}}" class="profile" style="height: 50px;width: 50px;"><hr>

</h1>
<br>
<<<<<<< HEAD
<script>
 app.controller('profil', function($scope, $http) {
$http.get("http://localhost:8000/profile_dat").then(function(response) {
    $scope.users_posts = response.data;
    $scope.edit_postprof = function(x){
      $("popups").css({"display":"block"});
      $scope.edit_titleprof = x.title;
      $scope.edit_descprof = x.description;
      $scope.edit_idprof = x.id;
      }
      $scope.upd_profpost = function(profpost){
          upd_title = $(".titleupd").val();
          upd_desc = $(".descriptionupd").val();
          upd_postid =$(".idupd").val();
          data = {title:upd_title,description:upd_desc,id:upd_postid};
        $http.post("http://localhost:8000/upd_post",data)
          .then(function (data, status, headers, config) {
            alert(data.data);
            $("popups").css({"display":"none"});
            });
        }
      $scope.updpost_cncl = function(){
        $("popups").css({"display":"none"});
      }
      
      $scope.delete_profpost = function(x){
        user_post = x.id;
        file = x.post_vdo.split(".");
        src = file[0];
        // console.log(src);return false;
        data ={user_post:user_post,src:src};
        $http.post("http://localhost:8000/deletepost",data)
        .then(function(data, status, headers, config){
          alert(data.data);
          $(document).find("div.title").children("comments.comments"+user_post+"").parent().remove();
        });
      }
      $scope.prof_comment = function(cmt,x){
        comment = cmt.prof_comt;
        post_id = x.id;
        data = {post_id:post_id,comment:comment};
        $http.post("http://localhost:8000/comment",data)
        .then(function(data, status, headers, config){
          alert(data.data);
          $("comments.comments"+post_id+"").children("div.row").remove();
          $('.comment').val('');
          $("comments.comments"+post_id+"").siblings("button.user_comment").prop("disabled",false);
          
            dataa = {lk_ct:post_id};
            console.log(data);
            $http.post("http://localhost:8000/comments_viewable",dataa)
            .then(function(data, status, headers, config){
              var i = 0;
              data2 = data.data;
            });
        });
      }
    });
 });
 
</script>
<div ng-controller="profil">
<popups class="popups" align="center" style="display:none;margin-top:-193px">
  <h1>Update Your Post</h1>
  <input type="hidden" class="idupd" ng-value="edit_idprof">
  <label>Title :</label><input type="text" class="titleupd" ng-value="edit_titleprof" name="tile" class="tile"><br>
  <label>Description :</label><input type="text" class="descriptionupd" ng-value="edit_descprof" name="descr" class="descr"><br>
  &nbsp;<button ng-click="upd_profpost(profpost)">Update</button>&nbsp;&nbsp;<button ng-click="updpost_cncl()">Cancel</button><br>
</popups>
<post  class="post" id="listShow">
<div ng-repeat="x in users_posts">
<div style="display:none;">
@{{file = x.post_vdo.split(".")}}
</div>
<div class="title li-item hide" >
<h3 id="title@{{x.id}}" ng-model="titleprof">@{{x.title}}</h3>
<input type="hidden" ng-model="post_idprof" class="post_id" id="post_id@{{x.id}}" value="@{{x.id}}">
<input type="hidden" ng-model="srprof" class="sr" value="@{{file[0]}}">
<div class="video">
<img class="imghover" src="{{URL('/')}}/storage/downloads/thumbnail/@{{file[0]}}.jpg" height="240" width="315">
<video loop preload="none" style="display:none;" width="320" height="240" controls class="videosList">
<source class="vdo" src="{{URL('/')}}/storage/downloads/videofolder/@{{x.post_vdo}}" type="video/mp4">
<source class="vdo" src="{{URL('/')}}/storage/downloads/videofolder/@{{x.post_vdo}}" type="video/mp4">
<source class="vdo" src="{{URL('/')}}/storage/downloads/videofolder/@{{x.post_vdo}}" type="video/mp4">
Your browser does not support the video tag.</video>
</div>
<div class="description"><p><b>Description:</b>&nbsp;
<des id="desc@{{x.id}}" ng-model="descriptionprof">@{{x.description}}</des></p>
</div><button class="delete" ng-click="delete_profpost(x)">Delete the post</button>
<p><button class="myBtn@{{x.id}}" ng-click="edit_postprof(x)" id="myBtn">Edit Post</button>
</p>&nbsp;&nbsp;&nbsp;Like:&nbsp;<like>@{{x.likes}}</like><br><br>
<b>Comments:</b><comments class="comments@{{x.id}}"></comments>
<textarea ng-model="cmt.prof_comt" class="comment" placeholder="comment here..."></textarea><br>
<button ng-click="prof_comment(cmt,x)" class="user_comment" style="background:#3187aa;color:white;">Comment</button>
</div>
</div>
</div>		
</post>
</div>
=======
<post  class="post" id="listShow">		
<<<<<<< HEAD
</post>
=======
</post><br>
>>>>>>> 580f059565a09bf54d379eb93e6b7ed6bf55ab45

>>>>>>> b5a99ca91dca6a92e73ab7ed5d39d140919c6e3a
</body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


