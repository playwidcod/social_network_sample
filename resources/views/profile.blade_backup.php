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
</style>

<popups class="popups" align="center" style="display: none;">
<!--   <h1>Update Your Post</h1>
  <label>Title :</label><input type="text" name="tile" class="tile"><br>
  <label>Description :</label><input type="text" name="descr" class="descr"><br>
  <update>Update</update></popups><br> -->
</popups>
<script>

 $(document).ready(function(){
 
       $.ajax({ 
           type: "GET", 
           url: '/profile_dat', 
           dataType: 'json',
          success: function(data){
            $.each(data, function(){
              $(".post").append('<div class="title li-item hide" ><h3>'+this.title+'</h3><input type="hidden" class="post_id" value="'+this.id+'"><input type="hidden" class="sr" value="'+this.post_vdo+'"><div class="video"><video width="320" height="240" controls><source class="vdo" src="{{URL('/')}}/storage/downloads/videofolder/'+this.post_vdo+'" type="video/*"><source class="vdo" src="{{URL('/')}}/storage/downloads/videofolder/'+this.post_vdo+'" type="video/*"><source class="vdo" src="{{URL('/')}}/storage/downloads/videofolder/'+this.post_vdo+'" type="video/*">Your browser does not support the video tag.</video></div><div class="description"><p><b>Description:</b>&nbsp;<des>'+this.description+'</des></p></div><button class="delete">Delete the post</button><p><button id="myBtn">Edit Post</button></p>&nbsp;&nbsp;&nbsp;Like:&nbsp;<like>'+this.likes+'</like><br><br><b>Comments:</b><comments class="comments'+this.id+'"></comments><textarea class="comment" placeholder="comment here..."></textarea><br><button class="user_comment" style="background:#3187aa;color:white;">Comment</button></div></div>'); 
              
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

                      // console.log(data);
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
            });
           }
        });  
 
                $(document).on('click','.loadMore', function (e) {
                  $(".loadMore").parent().parent().removeClass("test");
                  $(this).parent().parent().addClass("test");
                                e.preventDefault();
                                $(this).parent().parent().find(".row:hidden").slice(0, 2).slideDown();
                                if ($(this).parent().parent().find(".row:hidden").length == 0) {
                                    $("#load").fadeOut('slow');
                                }
                                $('html,body').animate({
                                    scrollTop: $(this).offset().top
                                }, 1500);
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
                                            $(document).find(".active"+this.post_id+"").find('comments').append('<button style="float:left;" class="loadMore">Load more</button><br><br>');
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
       var title = $(this).parent().parent().find("h3").html();
       var description = $(this).parent().parent().find("des").html();
        var id = $(this).parent().parent().find("input.post_id").val();
       $("popups.popups").html('');
        $("popups.popups").slideDown().append('<h1>Update Your Post</h1><label>Title :</label><input type="text" name="tile" class="tile" value='+title+'><br><label>Description :</label><input type="text" name="descr" class="descr" value='+description+'><br><br><button class="update_pos">Update</button><button class="close">close</button>');
        $("button.close").on('click',function(){
            $("popups.popups").slideUp();
        });
        $(".update_pos").on('click',function(){
            title = $(this).parent().find(".tile").val();
            description = $(this).parent().find(".descr").val();
            $.ajax({
              headers: {
                          'X-CSRF-Token': "{{csrf_token()}}"
                      },
                    url:"/upd_post",
                    type:'post',
                    data:{title:title,id:id,description:description},
                    dataType:'html',
                    success:function(data){
                      $("popups.popups").slideUp();
                      alert("updated");
                      location.reload();
                    }
            });
        });

  });
    $(document).on('click','.delete_cmt',function(){
        // $(this).parent().parent().find("div#231.row").css({"background":"red"}).remove();
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
 });   
</script>
<h1 align="center"><username></username>
  <div align="left" class="turn-page" id="pager"></div><br>
<img class="profile" style="height: 50px;width: 50px;"><hr>

</h1>
<br>
<post  class="post" id="listShow">		
</post><br>
</body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

