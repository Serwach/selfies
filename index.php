<?php
  session_start();
?>

<!DOCTYPE html>
<html>

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Selfies - serwis społecznościowy</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>  
        <script src="js/lubieto.js"></script>             
</head>


<body onload="setFocus();">
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          <form action="zarejestruj.php" method="post" class="form" id="regForm">
            <i><h4>Dołącz do nas!</h4></i><br/>
            <input type="nick" name="nick" class="form-control" placeholder="nick"><br/> 
            <input type="email" name="email" class="form-control" placeholder="email"><br/> 
            <input type="password" name="haslo1" class="form-control" placeholder="hasło">   <br/>   
            <input type="password" name="haslo2" class="form-control" placeholder="powtórz hasło"><br/>       
            <button type="submit" class="btn btn-primary">Zarejestruj</button>
          </form>
        </div> 
      </div>
    </div>
  </div>

    <div class="container" id="myContainer">

<div class="row">
            <br/>
            <form action="zaloguj.php" role="form" method="post" class="form-inline" id="logForm">
              <input type="email" name="email" class="form-control" placeholder="email">
              <input type="password" name="haslo" class="form-control" placeholder="hasło">              
              <button type="submit" class="btn btn-info">Zaloguj</button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Rejestracja</button>
<?php
              if(isset($_SESSION['blad'])) 
              {
                echo $_SESSION['blad'];  
                unset($_SESSION['blad']);               
              } 
              else
              {
                echo "<br/><br/><br/>";
              }
?>
            </form>
          </div>

<div class="row">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="item">
            <img src="img/img1.jpg">
          </div>
          <div class="item active">
            <img src="img/img2.jpg">
          </div>
          <div class="item">
            <img src="img/img3.jpg">
          </div>
          <div class="item">
            <img src="img/img4.jpg">
          </div>
        </div>
      </div>
</div>
<br/><br/><div class="row">
           <div class="footer">
              <i>2016 &copy; selfies</i><br/><br/><br/>
            </div>
          </div>
  </div>
</body>
</html>