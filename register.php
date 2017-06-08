<?php
require 'includes/config.php';

// $userDetails = (!empty($_GET['username']) && !empty($_GET['email']) && !empty($_GET['password'])) ? htmlspecialchars($_GET['username'] && $_GET['email'] && $_GET['password'],  ENT_QUOTES, 'utf-8') : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $first_name = $last_name = $email = $password = '';

  $first_name = e($_POST['first_name']);
  $last_name = e($_POST['last_name']);
  $email = e($_POST['email']);
  $password = e($_POST['password']);
  $passwordConfirm = e($_POST['password-confirm']);
  $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
  $errors['first_name'] = validateFirstName($first_name);
  $errors['last_name'] = validateLastName($last_name);
  $errors['email'] = validateEmail($email);
  $errors['password'] = validatePassword($password);
  $errors['password-confirm'] = false;

  if ($_POST['password'] !== $_POST['password-confirm']) {
    $errors['password-confirm'] = "Passwords do not match!";
  }


    if (!$errors['first_name'] && !$errors['last_name'] && !$errors['email'] && !$errors['password'] && !$errors['password-confirm']) {


      $registered = addUser($dbh, $first_name, $last_name, $email, $hashedPassword);  
      $user = getUser($dbh, $first_name, $last_name);

      if($registered) {
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $user['id'];
        $_SESSION['admin'] = $user['admin'];
        addMessage('success', "You have registered successfully");
        redirect("index.php");
      }
  }
}

require 'partials/header.php';
require 'partials/navigation.php';

?>

<!-- beginning of registration form -->

<div class="container">

  <div class="row">
    <div class="col-md-12">
    </div>
  </div>

 <div><?= showMessages(); ?></div>
  
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-inverse">
      <div class="panel-heading register">Register</div>
      <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="register.php" onsubmit="return validate()">

          <div class="form-group">
            <label for="first_name" class="col-md-4 control-label">First Name</label>

            <div class="col-md-6">
              <input id="first_name" type="text" class="form-control" name="first_name" value="" autofocus="">
            </div>
            <span class="text-danger"><?= !empty($errors['first_name']) ? $errors['first_name'] : ''  ?></span>
          </div>

          <div class="form-group">
            <label for="last_name" class="col-md-4 control-label">Last Name</label>

            <div class="col-md-6">
              <input id="last_name" type="text" class="form-control" name="last_name" value="" autofocus="">
            </div>
            <span class="text-danger"><?= !empty($errors['last_name']) ? $errors['last_name'] : ''  ?></span>
          </div>


          <div class="form-group">
            <label for="email" class="col-md-4 control-label">E-mail Address</label>

            <div class="col-md-6">
              <input id="email" type="text" class="form-control" name="email" value="" >
            </div>
            <span class="text-danger"><?= !empty($errors['email']) ? $errors['email'] : ''  ?></span>
          </div>

          <div class="form-group">
            <label for="password" class="col-md-4 control-label">Password</label>

            <div class="col-md-6">
              <input id="password" type="password" class="form-control" name="password" >
            </div>
            <span class="text-danger"><?= !empty($errors['password']) ? $errors['password'] : ''  ?></span>
          </div>

          <div class="form-group">
            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

            <div class="col-md-6">
              <input id="password-confirm" type="password" class="form-control" name="password-confirm" >
            </div>
            <span class="text-danger"><?= !empty($errors['password-confirm']) ? $errors['password-confirm'] : ''  ?></span>
          </div>

          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-inverse">Register</button>
            </div>
          </div>
          
          
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<!-- end of registration form -->

<?php 
require 'partials/footer.php';
?>