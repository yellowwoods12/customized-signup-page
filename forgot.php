<?php error_reporting(E_ALL); ini_set('display_errors', 1);
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
if (isset($_GET['token'])) {

$token = $_GET['token'];

$sql = "SELECT email FROM tokens WHERE token='" . $token . "' and used=0";
$query = mysqli_query($conn,$sql);

if(mysqli_num_rows($query) > 0){

    while ($row = mysqli_fetch_array($query)) {

        $email = $row['email'];
        $_SESSION['email'] = $email;

    }

 }

}

if(!isset($_POST['password'])){
echo '<form method="post">
enter your new password:<input type="password" name="password" />
<input type="submit" value="Change Password">
</form>
';}

if (!empty($_POST['password']) && isset($_SESSION['email'])) {
$pass=$_POST['password'];
$pass = password_hash($pass, PASSWORD_DEFAULT);
$sql = "UPDATE userlist SET password= '$pass' where email='$email'";
$query = mysqli_query($conn, $sql);

if (mysqli_affected_rows($query)){
mysqli_query($mysqli_conn, "UPDATE tokens SET ``used`=(`used`+1) WHERE `token`='$token'");
  echo "Your password is changed successfully";
}
else {
echo "An error occured: " . mysqli_error($mysqli_conn);
}


}
?>