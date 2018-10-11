<html>
<body style="margin-left:100">

<h2>Create Account</h2>

<form action="form.php" method="post">
			Username:<br>
			<input type="text" name="username" placeholder="Username"><br>
			Password: <br>
			<input type="password" name="password1" placeholder="Password"><br>
			Confirm Password: <br>
			<input type="password" name="password2" placeholder="Confirm Password"><br>
			First Name:<br>
			<input type="text" name="first_name" placeholder= "First Name"><br>
			Last Name:<br>
			<input type="text" name="last_name" placeholder="Last Name"><br>
			Email:<br>
			<input type="text" name="email" placeholder="Email"><br>
			Address: <br>
			<input type="text" name="address" placeholder="Address"><br>
			Phone Number:<br>
			<input type="text" name="phonec" placeholder="Phone Number"><br>
			Emergency Contact Name:<br>
			<input type="text" name="name" placeholder="Emergency Name"><br>
			Emergency Contact Phone Number:<br>
			<input type="text" name="phonee" placeholder="Emergrncy Phone"><br>
			<br>
			<input type="hidden" name="sign_up" value="go">
			<button type="submit">Sign Up</button>
</form>



<?php

if($_POST['sign_up'] == "go"){

$servername = "classdb.it.mtu.edu";
$username = "derek_squared_rw";
$password = "12345678";
$dbname = "derek_squared";
$port = "3307";
$bool = 1;

    if($_POST['username'] == ""){
      echo "<font color=red>  * Need Username <br/></font>";
      $bool = 0;
    }
    if($_POST['password1'] == ""){
      echo "<font color=red>  * Need Password <br/> ";
      $bool = 0;
    }
    if($_POST['password2'] == ""){
      echo "<font color=red>  * Need to Confirm Password <br/>";
      $bool = 0;
    }
    if($_POST['password1'] != $_POST['password2']){
      echo "<font color=red>  * Passwords Dont Match <br/>";
      $bool = 0;
    }
//63
    if($_POST['first_name'] == ""){
      echo "<font color=red>  * Need First Name <br/>";
      $bool = 0;
    }
    if($_POST['last_name'] == ""){
      echo "<font color=red>  * Need Last Name <br/>";
      $bool = 0;
    }
    if($_POST['email'] == ""){
      echo "<font color=red>  * Need Email <br/>";
      $bool = 0;
    }
    if($_POST['address'] == ""){
      echo "<font color=red>  * Need Address <br/>";
      $bool = 0;
    }
     if($_POST['phonec'] == ""  || 10 != strlen($_POST['phonec'])){
         echo "<font color=red>  * Need Phone Number <br/>";
         $bool = 0;
    }
     if($_POST['name'] == ""){
      echo "<font color=red>  * Need Emegency Contact Name <br/>";
      $bool = 0;
    }
     if($_POST['phonee'] == "" || 10 != strlen($_POST['phonee'])){
         echo "<font color=red>  * Need Emergency Contact Phone Number <br/>";
         $bool = 0;
    }
    
  
    //93
try{
  $conn = new PDO('mysql:host=classdb.it.mtu.edu;port=3307;dbname=derek_squared', 'derek_squared_rw','12345678');

    if($bool == 1){
      $username = $_POST['username'];
       $first_name = $_POST['first_name'];
       $last_name = $_POST['last_name'];
       $password = password_hash($_POST['password1'], PASSWORD_DEFAULT);
       $address =  $_POST['address'];
       $email =  $_POST['email'];
       $phonec =  $_POST['phonec'];
       $name = $_POST['name'];
       $phonee =  $_POST['phonee'];



      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $conn->prepare( "INSERT INTO camper (username, first_name, last_name, password, address, email, phone_number, emergency_name, emergency_phone) values (:u,:f,:l,:p,:a,:e,:phc,:n,:phe)");

      $stmt->bindParam(':u', $username);
      $stmt->bindParam(':f', $first_name);
      $stmt->bindParam(':l', $last_name);	
      $stmt->bindParam(':p', $password );
      $stmt->bindParam('a', $address);
      $stmt->bindParam('e', $email);
      $stmt->bindParam('phc', $phonec);
      $stmt->bindParam('n', $name);
      $stmt->bindParam('phe', $phonee);


      $stmt->execute();
          
    }
} catch(PDOException $e) {
   echo "Error" . $e -> getMessage(); 
}
} 

?>

</body>
</html>