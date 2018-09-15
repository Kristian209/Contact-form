<?php

$msg = '';
$msgClass ="";
  //Check For Submit
if(filter_has_var(INPUT_POST, 'submit')){
  //Get Form Data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  //Check Requiered Fields
  if(!empty($name) && !empty($email) && !empty($message)){
    echo 'Message Submitted';
  }else{
     $msg = 'Please fill in all fields';
     $msgClass = 'alert-danger';
  }
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
    <title>Contact Me</title>
  </head>
<body>

<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">My Website</a>
    </div>
  </div>
</nav>
<div class="container">
  <?php if($msg != ''): ?>
  <div class="alert <?php echo $msgClass; ?>"<?php echo $msg ?></div>
  <?php endif; ?>
 <form method="post" >
   <div class="form-group" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label>Name</label>
     <textarea type="text" value="" name="name" class="form-control"></textarea>
   </div>
   <div class="form-group">
    <label>Email</label>
     <textarea type="text" value="" name="email" class="form-control"></textarea>
   </div>
   <div class="form-group">
    <label>Message</label>
     <textarea type="text" value="" name="message" class="form-control"></textarea>
   </div>
   <br>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
 </form>
</div>

</body>
</html>
