<?php
  session_start();

  $id=$_SESSION['id'];

  require_once("connect.php");
    
  $db = @new mysqli($host, $db_user, $db_password, $db_name);
    
  if($db->connect_errno!=0) echo "Error: ".$db->connect_errno;
  
  $zapytanie1 = "select uzytkownicy.nick, wiadomosci.idwysylajacego, wiadomosci.idodbiorcy, wiadomosci.tresc, wiadomosci.data from 
  uzytkownicy, wiadomosci where (uzytkownicy.id=wiadomosci.idwysylajacego and wiadomosci.idodbiorcy='$id')
  or (uzytkownicy.id=wiadomosci.idodbiorcy and wiadomosci.idwysylajacego='$id') group by wiadomosci.id desc";

  $wynik1 = $db->query($zapytanie1);

  $ile1 = $wynik1->num_rows; 

?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Selfies - serwis społecznościowy</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.vertical-tabs.css">
  <link href="css/style.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script>  
  <script src="js/js.js"></script>  
</head>
<body onload="setFocus();">
  <div class="modal fade" id="myMessModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          <form action="wyslijwiadomosc.php" method="post" class="form" id="regForm">
            <h4><i>Nowa wiadomość</i></h4><br/>
                
              <input type="nick" name="nick" class="form-control" placeholder="nick"><br/>

              <textarea type="tresc" name="tresc" class="form-control" placeholder="treść" rows="3" id="space"></textarea><br/>     

              <button type="submit" class="btn btn-default">Wyślij</button>

          </form>
        </div> 
      </div>
    </div>
  </div>






  <div class="container" id="myContainer">
    <div class="row">
      <br/><br/><br/>
      <div class="col-md-2">
      </div>
      <div class="col-md-8">
        <div class="col-md-4">
          <h4><i><br/>selfies</i></h4>
        </div>
        <div class="col-md-4">
          <form action="szukaj.php" method="post" class="form">       
            <div class="form-group">
              <div class="col-xs-8">                
                <input class="form-control" type="search" name="nick" placeholder="...">
              </div>
            </div>
            <button type="submit" class="btn btn-default">Szukaj </button>
          </form>
        </div>
                
        <div class="col-md-4">
          <br/>
          <a href="osczasu.php"><img src="icons/newpost.png" width="24px" height="24px" ></a>
          <a href="wiadomosci.php"><img src="icons/messages.png" width="24px" height="24px" ></a> 
          <a href="profil.php"><img src="icons/profile.png" width="24px" height="24px" ></a>
          <a href="ustawienia.php"><img src="icons/settings.png" width="24px" height="24px" ></a> 
          <a href="wyloguj.php"><img src="icons/logout.png" width="24px" height="24px" ></a>
        </div>
      </div>
      <div class="col-md-2">
      </div>
    </div>
    <br/><br/>
    <div class="row">
      <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
          <div class="panel panel-default">
            <div class="panel-body">
              <h3>Twoje wiadomości</h3><br/>
                <div class="col-md-1">
                </div>
                <div class="col-md-10">
                  <div class="panel panel-default">
                    <div class="panel-body" id="myPanel">
                      <div class="row">
<?php
  for($i=0;$i<$ile1;$i++)
  {
    $krotka1 = $wynik1->fetch_assoc();
    $data = date_create($krotka1['data']);
?>                  
                        <div class="col-md-2">
                          <h5><?php echo date_format($data, 'd/m/y'); ?><br/><?php echo date_format($data, 'g:i A'); ?></h5>
                        </div>       
                        <div class="col-md-2">
                          <h5><b><?php echo $krotka1['nick']; ?></b></h5>
                        </div>      
                        <div class="col-md-8">
                          <h5><?php echo $krotka1['tresc']; ?><hr/></h5>
                        </div>                                        
<?php
  }
?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-1">
                </div>
                <div class="row">
                  <div class="col-md-2">
                  </div>
                  <div class="col-md-8">
                    <br/><button type="button" class="btn btn-default" data-toggle="modal" data-target="#myMessModal">Nowa wiadomość</button><br/><br/>
                  </div>
                  <div class="col-md-2">
                  </div>
                </div>
            </div>
          </div>
        </div>
        <div class="col-md-2">
        </div>
      </div>
    </div>


    <div class="row">
      <div class="footer">
        <i>2016 &copy; selfies</i><br/><br/><br/>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>   
  </div>
</body>
</html>