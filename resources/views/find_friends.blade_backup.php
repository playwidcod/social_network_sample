@include('layouts.crud')
<!-- for friend request -->
<!-- <script src="http://localhost:8000/storage/Client-Side-Pagination-Plugin-jQuery-cPager/js/cPager.js"></script> -->
<style type="text/css">
.btn{
  height: 38px;
    width: 99px;
}
.pending{
  height: 38px;
    width: 99px;
    background: skyblue;
}
.accepted{
  height: 38px;
    width: 99px;
    background: lightgreen; 
}
.delete_req{
  height: 20px;
  width: 97px;
  background: orange;
  border:1px solid white;
  color:white;
}
.accept_req{
  height: 20px;
  width: 97px;
  background: blue;
  border:1px solid white;
  color:white;
}   
</style>
<script>
$(document).ready(function(){

  var sess_email = "{{ session()->get('email') }}";
var i = -1;
var requester = '';
var sesid = '';
                var count = -1;
             
var err = 0;
    $.ajax({
          url: '/getstatus',
          dataType: 'JSON',
          type: 'get',
          success: function(data) {

            $.each(data,function(key,value){
               i++;
                  $(".find").append('<table border="1" class="post li-item hide"  style="border-color:white;margin-left: 300px;"><tr><td style="padding:10px;width:67px;"><img name="profile_pic" src="http://localhost:8000/storage/downloads/' + value.profile_pic + '" height="70" width="70"><div class="frdname" name="frdname">' + value.name + '</div><input type="hidden" class="frdid" name="frdid" value=' + value.id + '></td><td width="700" align="right"><button class="btn">Send Request</button></td></tr></table>');
  //for checking request came 
                sesid = "<?php echo session()->get('id')?>";
                var usr = $(document).children().find(".frdid").eq(i).val();
                    $.ajax({
                      headers: {
                          'X-CSRF-Token': "{{csrf_token()}}"
                      },
                      url: '/reqstatus_get',
                      dataType: 'html',
                      data:{usr:sesid},
                      type: 'post',
                      success:function(data){
                        count++;
                        data = JSON.parse(data);
                        cnt_usr_id = $(document).children().find(".frdid").eq(count).val();
                        $.each(data,function(ind,val){
                           if(cnt_usr_id == val.user_requested){
                              if(val.status == 1){
                              $(document).children().find(".btn").eq(count).html("Accepted").addClass('accepted').attr("disabled",'disabled');;
                            }else if(val.status == 0){
                              $(document).children().find(".btn").eq(count).html("Pending").addClass('pending');
                            }
                           }
                        });
                      }
                    });
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
                          $.each(json, function(key,value){
                             if(cnt_usr_id == value['requester']){
                              if(value['status'] == 0){
                                $(document).children().find(".btn").eq(count).hide().parent().append('<div class="request_avail"><button class="accept_req">Accept</div><button class="delete_req">Remove</div>');
                                    $(".req_came").html("Request "+$(".accept_req").length);
                                  $(".accept_req").on('click',function(e){
                                    accept_usr = $(this).parent().parent().parent().parent().find(".frdid").val();
                                    $.ajax({
                                        headers: {
                                             'X-CSRF-Token': "{{csrf_token()}}"
                                        },
                                        url:'/accept',
                                        dataType:'html',
                                        type:'post',
                                        data:{accept_usr:accept_usr},
                                        success:function(data){
                                          location.reload();
                                        }
                                     });
                                  });
                                  $(".delete_req").on('click',function(e){
                                    delete_usr = $(this).parent().parent().parent().parent().find(".frdid").val();
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
                                          location.reload();
                                        }
                                     });
                                  });
                              }else{
                                $(document).children().find(".btn").eq(count).html("Friend").addClass('Friend').attr("disabled",'disabled');
                              }
                              
                             }
                          }); 
                      }
                  });
            });
            //       $("#listShow").cPager({
            //   jPagesSize: 2,
            //   pageid: "pager",
            //   itemClass: "post"
            // });
            // $("#listShow").cPager({
            //   pageSize: 3,                                                  
            //   pageid: "pager",
            //   itemClass: "post",
            //   pageIndex: 1
            // });
               $("button.btn").click(function(){
                        clicked = $(this).html('pending');
                         if($(this).html() == 'pending'){
                          $(this).addClass('pending');
                         }
                          requester = "<?php echo session()->get('id')?>";
                         
                         user_requested = $(this).parent().parent().find(".frdid").val();
                         $.ajax({
                            headers: {
                                 'X-CSRF-Token': "{{csrf_token()}}"
                            },
                            url:'/request',
                            dataType:'html',
                            type:'post',
                            data:{user_requested:user_requested,requester:requester},
                            success:function(data){
                              
                            }
                         });
                      }); 
          }
    }); 
    
});  
</script>
<!-- for friend request -->
<h1 align="center">Find Friends</h1>

<div class="find" id="listShow"></div>
<!-- <div class="turn-page" id="pager"></div> -->