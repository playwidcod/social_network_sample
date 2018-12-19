@include('layouts.crud')
<div class="content">
<style type="text/css">
.error{
	color:red;
}	
</style>
<h1 align="center">Post</h1>
<form method="post" id="post" action="/user_post" enctype="multipart/form-data">
	<input type = "hidden" name = "_token" value = "{{csrf_token()}}">
	<label>Title</label><br><input type="text" name="title"><br>
	<label>Description</label><br><input type="text" name="description"><br>
	<label>Upload Your Post</label><br><input type="file" id="vid" name="post_vdo" accept="video/*"><br>	
	<br><input type="submit" name="submit" value="Post" style="width: 155px;">
</form>
<p id="demo"></p>
<script type="text/javascript">
var myVideos = [];
window.URL = window.URL || window.webkitURL;

document.getElementById('vid').onchange = setFileInfo;

function setFileInfo() {
  var files = this.files;
  myVideos.push(files[0]);
  var video = document.createElement('video');
  video.preload = 'metadata';

  video.onloadedmetadata = function() {
    window.URL.revokeObjectURL(video.src);
    var duration = video.duration;
    myVideos[myVideos.length - 1].duration = duration;
    updateInfos();
  }

  video.src = URL.createObjectURL(files[0]);
}


function updateInfos() {
  var infos = document.getElementById('infos');
  infos.textContent = "";
  for (var i = 0; i < myVideos.length; i++) {
    infos.textContent += myVideos[i].name + " duration: " + myVideos[i].duration + '\n';
    var test = myVideos[i].duration > 301.634;
    // alert(test); 
     if(test == true){
     	alert("Video duration is must be 5minutes and low");
     	$("#vid").val('');
     }
  }
}
</script>
<script>
	$('form[id="post"]').validate({
  rules: {
    title: 'required',
    description: 'required',
    post_vdo: 'required',
    title: {
      required: true,
      minlength: 5,
    },
    description: {
      required: true,
      minlength: 8,
    },
    post_vdo: {
      required: true,
    }
  },
  messages: {
    title: 'This is not a valid required',
    description:'This is required',
    post_vdo:'This is required',
    title: {
          minlength: 'Minmium length of the Title should be 5'
       },
    description: {
          minlength: 'Minmium length of the Description should be 8'
    }   
  },
  submitHandler: function(form) {
    form.submit();
    alert("Posted successfully");
  }
});
</script>
<pre id="infos"></pre>
</div>