<?php 
  require_once 'header.php';
 // require_once 'header.php';
// Example 26-5: signup-copy.php
  echo <<<_END
  <script>
    function checkUser(user)
    {
      if (user.value == '')
      {
        O('info').innerHTML = ''
        return
      }

      params  = "user=" + user.value
      request = new ajaxRequest()
      request.open("POST", "checkuser.php", true)
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
      request.setRequestHeader("Content-length", params.length)
      request.setRequestHeader("Connection", "close")

      request.onreadystatechange = function()
      {
        if (this.readyState == 4)
          if (this.status == 200)
            if (this.responseText != null)
              O('info').innerHTML = this.responseText
      }
      request.send(params)
    } 

    function ajaxRequest()
    {
      try { var request = new XMLHttpRequest() }
      catch(e1) {
        try { request = new ActiveXObject("Msxml2.XMLHTTP") }
        catch(e2) {
          try { request = new ActiveXObject("Microsoft.XMLHTTP") }
          catch(e3) {
            request = false
      } } }
      return request
    }
  </script>
  
_END;

  $error = $user = $pass = $user_type= "";
  if (isset($_SESSION['user'])) destroySession();

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    $name = sanitizeString($_POST['name']);
    $user_type = sanitizeString($_POST['user_type']);
    

    if ($user == "" || $pass == "")
      $error = "Not all fields were entered.<br><br>";
    else
    {
    
      $result = queryMysql("SELECT * FROM USER WHERE user_email='$user'");

      if ($result->num_rows)
        $error = "That username already exists<br><br>";
      else
      {
        queryMysql("INSERT INTO USER (user_email,user_pass,user_name,user_type)
                    VALUES('$user', '$pass','$name','$user_type')");
        
        die("<h4>Account created</h4><a href='myAccount.php?view=$user'>Please Log in.</a><br><br> ");
        
      }
    }
  }

  echo <<<_END
    <div class='main' style="background-color:lightgrey;width:40%; margin-left:25%;padding:50px 50px;border-radius:10px">

      <form method='post' action='signup-copy.php' >
        <h3>Please enter your details to sign up</h3>
        <span style='color:red'>$error</span>
        <span class='fieldname'>Username: </span>
        <input type='text' maxlength='16' name='user' value='$user'
          onBlur='checkUser(this)'><span id='info'></span><br/><br/>
        <span class='fieldname'>Password: </span>
        <input type='text' maxlength='16' name='pass' value='$pass'><br/><br/>
        <span class='name'>Name: </span><br/>
        <input type='text' name='name' value='$name'><br/><br/>

        <span class='user_type'>User Type: </span>
        <select name='user_type'>
          <option value='C' >Customer</option>
          <option value='S'>Seller</option>
        </select>
        <br/><br/>
       

        <span class='fieldname'>&nbsp;</span><br/>
        <input type='submit' value='Sign up'>
      </form>
     </div><br>
_END;
  echo '<center>';
  include("footer.php");
  echo '</center>';
?>


    
    
    
  </body>
</html>