<!-- header for shop -->
  <?php  //header.php
 session_start();

 require_once 'functions.php';
 $appname='iShop';
 $userstr = '';

  //user logs in
  if (isset($_SESSION['user']))
  {
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = "$user";
    $loginout= "Log Out";
    $loginoutLink='logout.php';
  }
  else 
  {
    $loggedin = FALSE;
    $loginout="Log In";
    $loginoutLink='login.php';
    
  }
   $result=queryMysql("SELECT * FROM USER WHERE user_email='$user'");
   $row = mysqli_fetch_array($result);
   if (!$result)
    {   
        die("Database connection failed." .
         mysqli_error($connection));
    }

    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>GalzCloset</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
        <link rel="stylesheet" type="text/css" href="main.css" />  
       
    </head> 


    <body>
        <nav class='navbar navbar-default'>
        <div class="container">
        <div class='navbar-header'>
            <a href='index.php' class='navbar-brand'><i>iShop</i></a>
            <form>
              <div class="form-group">
                <div class="input-group ">
                    <span class="input-group-addon dropdown-toggle" data-toggle='dropdown' role='button' aria-haspopup="true" aria-expanded='false'>All <span class='caret'></span> </span>
                        
                    <ul class='dropdown-menu'>
                        <li><a href='#'>Fashion &#38; Jewelry</a></li>
                        <li><a href='#'>Clothes</a></li>
                        <li><a href='#'>Shoes</a></li>
                        <li><a href='#'>Cosmetics</a></li>
                    </ul>           
                    <input class="form-control" type="text" id="inputDollars" placeholder="Search...">
                    <span class="input-group-addon"> <span class="glyphicon glyphicon-search"></span></span>

                </div>
                    <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#collapsemenu' aria-expanded='false'>
                      <span class='sr-only'>Toogle navigation</span>
                     <span class='icon-bar'></span><span class='icon-bar'></span><span class='icon-bar'></span>        
                    </button> 

                    <!----- menu icon for navigation -->
            

              <div class='collapse navbar-collapse' id='collapsemenu'>
                 <ul class='nav navbar-nav navbar-right'>
                    <li><a href='index.php'>Home</a></li>
                    <?php 
                      if($loggedin){
                        echo "<li><a href='myAccount.php'>$userstr</a></li>";
 
                      }
                    ?>
                   <?php 
                    echo "<li><a href='$loginoutLink'>$loginout</a></li>  ";
                    if (!$loggedin)
                    {
                     echo "<li><a href='signup-copy.php'>Register</a></li>";
                    }
                   ?>
                    
                   
                   <li><a href='#'><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
                  </ul> </div>               
              </div>
            </form>
            
            
        </div>

       
      </div>
    </nav>

    <!-- end of header --> 
 


