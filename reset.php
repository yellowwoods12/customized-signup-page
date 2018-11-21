<?php 

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
      $email=$_POST['email'];
      $sql = "SELECT email FROM userlist WHERE email='$email'";
     $query =mysqli_query($conn,$sql);
     if ($query->num_rows == 0) {
     echo '<script language="javascript">';
echo 'alert("Email Id is not registered. Please try again !!")';
echo '</script>';
    die();
    }
    $token=getRandomString(10);
    $sql="INSERT INTO `tokens` (`token`, `email`) VALUES ('{$token}','{$email}')";
    $query =mysqli_query($conn,$sql);
    function getRandomString($length) 
   {
    $validCharacters = "ABCDEFGHIJKLMNPQRSTUXYVWZ123456789";
    $validCharNumber = strlen($validCharacters);
    $result = "";

    for ($i = 0; $i < $length; $i++) {
    $index = mt_rand(0, $validCharNumber - 1);
    $result .= $validCharacters[$index];
    }
return $result;}
    function mailresetlink($to,$token){
    $subject = "Forgot Password";
   $uri = 'http://'. $_SERVER['HTTP_HOST'] ; 
 $message = '
<html>
<head>
<title>Forgot Password</title>
</head>
<body>
<p>Click on the given link to reset your password <a href="'.$uri.'/dsw project/forgot.php?token='.$token.'">Reset     
Password</a></p>

</body>
</html>
';
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= 'From: Admin<triptii.shukla12@gmail.com>' . "\r\n";
$headers .= 'Cc: emailtest@jessicarosedavidson.co.uk' . "\r\n";

if(mail($to,$subject,$message,$headers)){
echo "We have sent the password reset link to your  email id <b>".$to."</b>"; 
}}

if(isset($_POST['email']))mailresetlink($email,$token);
?>