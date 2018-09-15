<?php

$msg = '';
$msgClass ="";
  //Check For Submit
if(filter_has_var(INPUT_POST, 'submit')){
  //Get Form Data
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);

  //Check Requiered Fields
  if(!empty($name) && !empty($email) && !empty($message)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
      $msg = 'Please provide a valid email';
      $msgClass = 'alert-danger';
    }
    else{
      $msg = 'Message submitted :)';
      $msgClass = 'alert-success';
      $toEmail = 'kristian@sunnerds.com';
      $subject = 'Contact Request From '.$name;
      $body = '<h2>Contact Request</h2>
      <h4>Name</h4><p>.$name.</p>
      <h4>Email</h4><p>.$email.</p>
      <h4>Message</h4><p>.$name.</p>';
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers .= "From: " . $name . "<". $email . ">" . "\r\n";
      if(mail($toEmail, $subject, $body, $headers)){
        $msg = 'Email sent :)';
        $msgClass = 'alert-success';
      }else{
        $msg = 'Your email couldn\'t be sent';
        $msgClass = 'alert-danger';
      }
    }
  }else{
     $msg = 'Please fill in all the fields';
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
  <div class="alert <?php echo $msgClass; ?>"><?php echo $msg ?></div>
  <?php endif; ?>
 <form method="post" >
   <div class="form-group" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label>Name</label>
     <input type="text" value="<?php echo isset($_POST['name']) ? $name : ''; ?>" name="name" class="form-control"></input>
   </div>
   <div class="form-group">
    <label>Email</label>
     <input type="text" value="<?php echo isset($_POST['email']) ? $email : ''; ?>" name="email" class="form-control"></input>
   </div>
   <div class="form-group">
    <label>Message</label>
     <textarea type="text" name="message" class="form-control"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
   </div>
   <br>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
 </form>
</div>

</body>
</html>
