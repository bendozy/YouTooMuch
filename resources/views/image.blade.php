<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Papermashup.com | PHP GD Image And Text Overlay Tutorial</title>
    <link href="../style.css" rel="stylesheet" type="text/css" />
    <style>
      input {
        border:1px solid #ccc;
        padding:8px;
        font-size:14px;
        width:300px;
      }
      .submit {
        width:110px;
        background-color:#FF6;
        padding:3px;
        border:1px solid #FC0;
        margin-top:20px;
      } 
    </style>
  </head>
  <body>
    <img src="@if(isset($filename)){{$filename}}@endif>" width="800" height="600"/><br/><br/>
    <p>You can edit the image above by typing your details in below. It'll then generate a new image which you can right click on and save to your computer.</p>

    <div class="dynamic-form">
      <form action="/createImage" method="post">
        <label>Name</label>
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="text" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>" name="name" maxlength="15" placeholder="Name"><br/>
        <input name="submit" type="submit" class="btn btn-primary" value="Update Image" />
      </form>
    </div>

  </body>
</html>
