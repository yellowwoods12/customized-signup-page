<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login and Signup form</title>
  <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  <!-- Inspiration
  https://dribbble.com/shots/2311260-Day-1-Sign-Up-and-Login-Animated
-->

<section class="user-authentication">
  <div class="user_options-container">
    <div class="user_options-text">
      <div class="user_options-unregistered">
        <h2 class="user_unregistered-title">Don't have an account?</h2>
        <p class="user_unregistered-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis nibh in leo lacinia blandit et quis lorem.</p>
        <button class="user_unregistered-signup" id="signup-button">Sign up</button>
      </div>

      <div class="user_options-registered">
        <h2 class="user_registered-title">Have an account?</h2>
        <p class="user_registered-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras quis nibh in leo lacinia blandit et quis lorem.</p>
        <button class="user_registered-login" id="login-button">Login</button>
      </div>
    </div>
    
    <div class="user_options-forms" id="user_options-forms">
      <div class="user_forms-login">
        <h2 class="forms_title">Login</h2>
        <form class="forms_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
          <fieldset class="forms_fieldset">
            <div class="forms_field">
              <input type="email" placeholder="Email" class="forms_field-input" name="email" required autofocus />
            </div>
            <div class="forms_field">
              <input type="password" placeholder="Password" class="forms_field-input" name="password" required />
            </div>
          </fieldset>
          <div class="forms_buttons">
            <button type="button" class="forms_buttons-forgot" id="forget-button">Forgot password?</button>
            <button type="submit" class="forms_buttons-action" name="login">Login</button>
						<a class="forms_buttons-mb-button" id="signup-button-mb">Sign up</a>
          </div>
        </form>
      </div>
      <div class="user_forms-signup">
        <h2 class="forms_title">Sign Up</h2>
        <form class="forms_form" action="signup.php" method="POST">
          <fieldset class="forms_fieldset">
            <div class="forms_field">
              <input type="text" placeholder="Full Name" class="forms_field-input" name="name" required />
            </div>
            <div class="forms_field">
              <input type="email" placeholder="Email" class="forms_field-input" name="email" required />
            </div>
               
            <div class="forms_field">
              <input type="password" placeholder="Password" class="forms_field-input" name="password" required />
            </div>
          </fieldset>
          <div class="forms_buttons">
            <button type="submit" class="forms_buttons-action">Sign up</button>
						<a class="forms_buttons-mb-button" id="login-button-mb">Login</a>
          </div>
        </form>
      </div>
			<div class="user_forms-forgot">
        <h2 class="forms_title">Forgot Password</h2>
        <form class="forms_form" action="reset.php" method="post">
          <fieldset class="forms_fieldset">
            <div class="forms_field">
              <input type="email" placeholder="Email" class="forms_field-input" name="email" required autofocus />
            </div>
          </fieldset>
          <div class="forms_buttons">
            <button type="submit" class="forms_buttons-action" name="reset">Send reset link</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
  
  

    <script  src="js/index.js"></script>
<?php 
if(isset($_POST['login']))
{
    $email = $_POST['email'];
   $pass = $_POST['password'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * from userlist WHERE email='$email' AND password='$pass'";
$result=mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
    header("Location:home.php");
    exit;
    ;

;

} else {
    echo '<script language="javascript">';
echo 'alert("Invalid Credentials. Please try again !!")';
echo '</script>';
}

$conn->close();

}

?>

</body>

</html>
