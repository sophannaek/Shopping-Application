<!-- already work  -->
<?php include 'header.php' ;?>
<?php
	$error = $user = $pass = "";

	if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    
    if ($user == "" || $pass == "")
        $error = "Not all fields were entered<br>";
    else
    {
      $result =queryMysql("SELECT user_email,user_pass FROM USER
        WHERE user_email='$user' AND user_pass='$pass'");

      if ($result->num_rows == 0)
      {
        $error = "<span class='error'>Username/Password
                  invalid</span><br><br>";
      }
      else
      {
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;
        die("You are now logged in. Please <a href='myAccount.php?view=$user'>" .
          "click here</a> to continue.<br><br>");
       // include 'myAccount.php';
        //header("Locaton:myAccount.php");
      }
    }
  }

//if the user hasn't signed into her account 
  if(!$loggedin){
  echo <<<_END
  <!DOCTYPE html>
  <html>

  	<main style="width:50%; margin-left:25%; background-color:lightgrey;padding:50px 50px;border-radius:10px">
  		<form action="login.php" method="post">

  			<fieldset style="border-color:#F6F3F2; font-weight: bold;border-radius:5px">
  				<center><h3>Sign in</h3></center><hr>
  				Email address:<br><input size="20%" type="text" name="user" value="$user" /><br><br>
  				Password: <br><input size="20%" type="password" name="pass" value="$pass"><br><br>
  				<span class='fieldname' style="color:red">$error</span>
  				<a href="#" >forget your password?</a>
  				<br><br>

  				<button onclick="location.href='index.php'" type="button">Back to HomePage</button>
  				<input type="submit" value="sign in"> 
  			</fieldset>
  		</form>
  	</main>

  	<center>
_END;
}
else{
  echo "you have already signed in! Go to "."<a href='myAccount.php'>my Account</a>";}

include("footer.php");
echo "</center>";
?>
