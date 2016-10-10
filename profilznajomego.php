<?php
  include_once("tutorial.php");
  $tutorial = new Tutorial();
  $krotki = $tutorial->get_rows();
?>

<?php

  session_start();

  if(isset($_SESSION['z_id'])) $id=$_SESSION['z_id'];
  else $id=$_SESSION['id'];        
    
  require_once("connect.php");
    
  $db = @new mysqli($host, $db_user, $db_password, $db_name);
    
  if($db->connect_errno!=0) echo "Error: ".$db->connect_errno;
  
  $zapytanie1 = "select * from uzytkownicy where uzytkownicy.id='$id'";

  $wynik1 = $db->query($zapytanie1);

  $krotka1 = $wynik1->fetch_assoc();
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
  <link href="css/style.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script>  
  <script src="js/js.js"></script>  

<script type="text/javascript">
/**
* Function Name: cwRating()
* Function Author: CodexWorld
* Description: cwRating() function is used for implement the rating system. cwRating() function insert like or dislike data into the database and display the rating count at the target div.
* id = Unique ID, like or dislike is based on this ID.
* type = Use 1 for like and 0 for dislike.
* target = Target div ID where the total number of likes or dislikes will display.
**/
function cwRating(id,type,target){
  $.ajax({
    type:'POST',
    url:'rating.php',
    data:'id='+id+'&type='+type,
    success:function(msg){
      if(msg == 'err'){
        alert('Some problem occured, please try again.');
      }else{
        $('#'+target).html(msg);
      }
    }
  });
}
</script>

</head>
<body>
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
 


  <div class="col-md-2">
  </div>
  <div class="col-md-8" id="myCol">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="row">
          <div class="col-md-4">
            <img class="img-circle" width="200" height="200" src="data:image/png;base64,<?php echo base64_encode($krotka1['profilowe']);?>"> 
          </div>
          <div class="col-md-8" id="myProfInfo">
            <h3><?php echo $krotka1['nick'];?></h3>
<?php
                  if(isset($_SESSION['z_id'])) 
                  {
                    if(isset($_SESSION['oczekiwanie'])) echo "Oczekiwanie";
                    else echo "<a href=\"wyslijzaproszenie.php\">Zaproś do grona znajomych</a>";
                  }
                  else         
                  {
                    echo "<br/>";
                  }
?>

            <h4>Posty: <?php echo $krotka1['posty'];?></h4>
            <h4>Zdjęcia: <?php echo $krotka1['zdjecia'];?></h4>
            <h4>Znajomi: <?php echo $krotka1['znajomi']?></h4><br/><br/>
          </div>             
        </div>

        <div id="myCarousel" class="carousel-slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="item active">
              <div class="row">
                <div class="panel panel-default">
                  <div class="panel-body" id="myPost">
                    <h4>Posty użytkownika</h4><br/>                    
                      <div class "col-md-2">
                      </div>     
                      <div class "col-md-2">
                        <div class="row">
                          <div class="col-md-2">
                          </div>
                          <div class="col-md-8">
                            <div class="panel panel-default">
                              <div class="panel-body">
                                O czym teraz myślisz?
                              </div>
                            </div>
                          </div>
                          <div class="col-md-2">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-2">
                          </div>
                          <div class="col-md-8">
                            <div class="panel panel-default">
                              <div class="panel-body" id="left" >
                                <form action="wyslijpost.php" method="post" class="form">
                                  <textarea type="tresc" name="tresc" class="form-control" placeholder="..." rows="3" id="space"></textarea><br/>       
                                  <button type="submit" class="btn btn-default">Opublikuj</button>
                                </form>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-2">
                          </div>
                        </div>
<?php
  $wynik1->free_result();

    foreach($krotki as $krotka) { ?>
        <div class="row">
          <div class="col-md-2">
          </div>
          <div class="col-md-8">
          <div class="panel panel-default">
          <div class="panel-body" id="left">
            <img class="img-circle" width="36" height="36" src="data:image/png;base64,<?php echo base64_encode($krotka['profilowe']);?>">  
                &nbsp;<b><?php echo $krotka['nick'] ?></b><br/><br/>
                <?php echo $krotka['tresc'] ?><br/><br/>
                  <span id="lubie"><img src="icons/like.png" width="18px" height="18px" 
                    onClick="cwRating(<?php echo $krotka['id']; ?>,1,'lubie<?php echo $krotka['id']; ?>')"></span> 
                  
                  <span class="counter" id="lubie<?php echo $krotka['id']; ?>"><?php echo $krotka['lubie']; ?></span>&nbsp;

                  <span id="lubie"><img src="icons/dislike.png" width="18px" height="18px" 
                    onClick="cwRating(<?php echo $krotka['id']; ?>,0,'nielubie<?php echo $krotka['id']; ?>')"></span>

                  <span class="counter" id="nielubie<?php echo $krotka['id']; ?>"><?php echo $krotka['nielubie']; ?></span>&nbsp;
                </div>
              </div>
            </div>
            <div class="col-md-2">
            </div>
          </div>
    <?php
      }

  

  $zapytanie3 = "select * from uzytkownicy, zdjecia where uzytkownicy.id=zdjecia.iduzytkownika and uzytkownicy.id='$id' 
  group by zdjecia.id desc";

  $wynik3 = $db->query($zapytanie3);
  
  $ile3 = $wynik3->num_rows;

?>
                        </div> 
                        <div class "col-md-2">
                        </div>      
                      </div>
                    </div>
                  </div> 
                </div>
                <div class="item" id="2">
                  <div class="row">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <h4>Zdjęcia</h4><br/>

<?php
                          for($i=0;$i<$ile3;$i++)
                          {
                            $krotka3 = $wynik3->fetch_assoc();
                            $grafika3 = $krotka3['plik'];
                            if($i%3==2) echo "<div class=\"row\">";

                            echo
                         "<div class=\"col-md-4\" width=\"150px\" height=\"150px\">
                            <img class=\"img-thumbnail\" src='data:image/jpeg;base64,".base64_encode($grafika3)."'  >
                          </div>";
                            if($i%3==2) echo "<br/><br/><br/><br/></div>";
                          }

?>
                      </div>
                    </div>
                  </div> 
                </div>
                <div class="item">
                  <div class="row">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <h4>Znajomi</h4><br/>

<?php

  $wynik3->free_result();
  

  $zapytanie4 = "select uzytkownicy.nick, uzytkownicy.profilowe from uzytkownicy, znajomi where
  znajomi.stat = 'Znajomy' and (uzytkownicy.id=znajomi.zapraszajacyid and znajomi.zaproszonyid='$id') 
  or (uzytkownicy.id=znajomi.zaproszonyid and znajomi.zapraszajacyid='$id')";

  $wynik4 = $db->query($zapytanie4);
  
  $ile4 = $wynik4->num_rows;

for($i=0;$i<$ile4;$i++)
{
                          $krotka4 = $wynik4->fetch_assoc();
                          $grafika4 = $krotka4['profilowe'];
                          $nick = $krotka4['nick'];
                          echo "<div class=\"col-md-4\">
                            <img class=\"img-circle\" src='data:image/jpeg;base64,".base64_encode($grafika4)."' width=\"150px\" height=\"150px\" >
                            <br/><h5>".$nick."</h5>
                          </div>";
}
?>
                      </div>
                    </div>
                  </div> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>      
    <div class="col-md-2">
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>   
  </div>
</body>
</html>

<?php

  $db->close(); 


?>