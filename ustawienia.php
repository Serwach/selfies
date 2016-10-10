<?php

  session_start();

  require_once "connect.php"; 

  $id=$_SESSION['id'];
  
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
</head>
<body onload="setFocus();">

  <div class="modal fade" id="mySetModal1">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          <form action="zmiennick.php" method="post" class="form" id="regForm">
            <h4><i>Zmień nick:</i></h4><br/>
                
              <input type="nick" name="nick" class="form-control" placeholder="nowy nick"><br/>
              <input type="password" name="haslo1" class="form-control" placeholder="hasło">   <br/>   
              <input type="password" name="haslo2" class="form-control" placeholder="powtórz hasło"><br/>   
              <button type="submit" class="btn btn-danger">Zmień</button>

          </form>
        </div> 
      </div>
    </div>
  </div>


  <div class="modal fade" id="mySetModal2">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          <form action="zmienemail.php" method="post" class="form" id="regForm">
            <h4><i>Zmień adres e-mail:</i></h4><br/>
                
              <input type="email" name="email" class="form-control" placeholder="nowy email"><br/>
              <input type="password" name="haslo1" class="form-control" placeholder="hasło">   <br/>   
              <input type="password" name="haslo2" class="form-control" placeholder="powtórz hasło"><br/>   
              <button type="submit" class="btn btn-danger">Zmień</button>

          </form>
        </div> 
      </div>
    </div>
  </div>


  <div class="modal fade" id="mySetModal3">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          <form action="zmienhaslo.php" method="post" class="form" id="regForm">
            <h4><i>Zmień hasło:</i></h4><br/>
                
              <input type="password" name="shaslo" class="form-control" placeholder="stare hasło"><br/>
              <input type="password" name="haslo1" class="form-control" placeholder="nowe hasło">   <br/>   
              <input type="password" name="haslo2" class="form-control" placeholder="powtórz nowe hasło"><br/>   
              <button type="submit" class="btn btn-danger">Zmień</button>

          </form>
        </div> 
      </div>
    </div>
  </div>

  <div class="modal fade" id="myDelModal1">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          <form action="usunznajomego.php" method="post" class="form" id="regForm">
            <h4><i>Usuń z grona znajomych:</i></h4><br/>

              <textarea type="tresc" name="tresc" class="form-control" placeholder="podaj nick oraz przyczynę usunięcia" rows="3" id="space"></textarea><br/>
              <input type="password" name="haslo1" class="form-control" placeholder="hasło">   <br/>   
              <input type="password" name="haslo2" class="form-control" placeholder="powtórz hasło"><br/>   
              <button type="submit" class="btn btn-danger">Usuń</button>

          </form>
        </div> 
      </div>
    </div>
  </div>

  <div class="modal fade" id="myDelModal2">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          <form action="usunkonto.php" method="post" class="form" id="regForm">
            <h4><i>Podaj hasło, aby usunąć konto:</i></h4><br/>
              <input type="password" name="haslo1" class="form-control" placeholder="hasło">   <br/>   
              <input type="password" name="haslo2" class="form-control" placeholder="powtórz hasło"><br/>   
              <button type="submit" class="btn btn-danger">Usuń</button>

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
      <div class="col-md-2">
      </div>
      <div class="col-md-8" id="myCol">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="tab-content">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#photos">Edycja zdjęć</a></li>
                <li><a data-toggle="tab" href="#home">Edycja profilu</a></li>
                <li><a data-toggle="tab" href="#inviti">Zaproszenia</a></li>
                <li><a data-toggle="tab" href="#menu1">Zaawansowane</a></li>
                <li><a data-toggle="tab" href="#menu2">Wyślij opinię</a></li>
              </ul>
              <div class="tab-content">
                <div id="photos" class="tab-pane fade in active" height="400px">
                  <h3>Edycja Twojej galerii zdjęć</h3>
                  <div class="row">
                    <div class="col-md-6">
                      <h5>
                      Twoje aktualne zdjęcie profilowe:<br/><br/>
                      <img class="img-circle" width="150" height="150" src="data:image/png;base64,<?php echo base64_encode($krotka1['profilowe']);?>"><br/><br/>
                      <form enctype="multipart/form-data" action="nowezdjecieprofilowe.php" method="post">
                        <input name="zdjecie" type="file" class="btn btn-default" id="leftFile"/><br/>
                        <input type="submit" value="Zmień" class="btn btn-default" />
                      </form>

                      </h5>
                    </div>
                    <div class="col-md-6">
                      <h5>
                      Dodaj nowe zdjęcie:<br/><br/>
                      <img class="img-circle" src="icons/add.png" width="150px" height="150px" ><br/><br/>
                      <form enctype="multipart/form-data" action="nowezdjecie.php" method="post">
                        <input name="zdjecie" type="file" class="btn btn-default" id="rightFile"/><br/>
                        <input type="submit" value="Dodaj" class="btn btn-default"/>
                      </form>
                      </h5>
                    </div>           
                  </div>         
                </div>
                <div id="home" class="tab-pane">
                  <h3>Tutaj możesz zmienić swoje dane</h3>
                  <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                      <div class="panel panel-default">
                        <div class="panel-body">
                          <br/>
                          <div class="row">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10">
                              <div class="panel panel-default">
                                <div class="panel-body">  
                                  <div class="col-md-3" id="right">
                                    Nick:
                                  </div>
                                  <div class="col-md-6" id="left">
                                  <?php echo $krotka1['nick']; ?>
                                  </div>                         
                                  <div class="col-md-3" id="center">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#mySetModal1">Zmień</button>
                                  </div>
                                </div>           
                              </div>                          
                            </div>                         
                            <div class="col-md-1">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10">
                              <div class="panel panel-default">
                                <div class="panel-body">  
                                  <div class="col-md-3" id="right">
                                    E-mail:
                                  </div>
                                  <div class="col-md-6" id="left">
                                  <?php echo $krotka1['email']; ?>
                                  </div>                         
                                  <div class="col-md-3" id="center">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#mySetModal2">Zmień</button>
                                  </div>
                                </div>           
                              </div>                          
                            </div>                         
                            <div class="col-md-1">
                            </div>                            
                          </div>
                          <div class="row">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10">
                              <div class="panel panel-default">
                                <div class="panel-body">  
                                  <div class="col-md-3" id="right">
                                    Hasło:
                                  </div>
                                  <div class="col-md-6" id="left">
                                    <input type="password" name="pass" class="form-control" placeholder="**********">
                                  </div>                         
                                  <div class="col-md-3" id="center">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#mySetModal3">Zmień</button>
                                  </div>
                                </div>           
                              </div>                          
                            </div>                         
                            <div class="col-md-1">
                            </div>                            
                          </div>
                        </div>
                      </div>                     
                    </div>
                    <div class="col-md-2">
                    </div>
                    </div>
                  </div>
                  <div id="inviti" class="tab-pane fade">
                    <h3>Zaproszenia do grona znajomych</h3>
    <?php
                  $zapytanie2 = "select uzytkownicy.id, uzytkownicy.nick, uzytkownicy.profilowe, znajomi.zapraszajacyid, znajomi.zaproszonyid, znajomi.stat 
                  from uzytkownicy, znajomi where uzytkownicy.id=znajomi.zapraszajacyid and znajomi.zaproszonyid='$id' and 
                  znajomi.stat='Oczekiwanie' ";
  
                  $wynik2 = $db->query($zapytanie2);


                  $ile2 = $wynik2->num_rows;

                  if($ile2==0)
                  {
                    echo "<br/>Aktualnie nie masz zaproszeń do grona znajomych.<br/><br/>";
                  }

                  for($i=0;$i<$ile2;$i++)
                      {
                        $krotka2 = $wynik2->fetch_assoc();
                        $grafika2 = $krotka2['profilowe'];
                        $nick2 = $krotka2['nick'];
                        echo "<div class=\"col-md-4\">
                                <img class=\"img-circle\" src='data:image/jpeg;base64,".base64_encode($grafika2)."' width=\"150px\" height=\"150px\" >
                                <br/><h5>".$nick2."</h5>
                                <a href=\"potwierdzznajomosc.php\"><h5>Potwierdź</h5></a><a href=\"odrzucznajomosc.php\"><h5>Odrzuć</h5></a>
                              </div>";




                      }
                  ?>
                  </div>
                    <div id="menu2" class="tab-pane fade">
                      <h3>Formularz zgłoszenia<br/><br/></h3>
                      <div class="col-md-2">
                      </div>
                      <div class="col-md-8">
                        <form action="wyslijzgloszenie.php" method="post" class="form" id="regForm">
                          <textarea type="tresc" name="tresc" class="form-control" placeholder=
                          "Tutaj możesz zgłosić wszelkie uwagi na temat funkcjonowania serwisu oraz użytkowników, którzy są na nim zarejestrowani" rows="5" id="space"></textarea><br/>     
                          <button type="submit" class="btn btn-default">Wyślij</button>
                        </form>
                      </div>
                    <div class="col-md-2">
                    </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                      <h3>Ustawienia zaawansowane<br/><br/></h3>
                  <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                      <div class="panel panel-default">
                        <div class="panel-body">
                          <br/>
                          <div class="row">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10">
                              <div class="panel panel-default">
                                <div class="panel-body">  
                                  <div class="col-md-9" id="left">
                                    Chcesz usunąć znajomego?
                                  </div>
                                  <div class="col-md-3" id="center">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myDelModal1">Tak</button>
                                  </div>
                                </div>           
                              </div>                          
                            </div>                         
                            <div class="col-md-1">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10">
                              <div class="panel panel-default">
                                <div class="panel-body">  
                                  <div class="col-md-9" id="left">
                                    Chcesz usunąć konto?
                                  </div>                   
                                  <div class="col-md-3" id="center">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myDelModal2">Tak</button>
                                  </div>
                                </div>           
                              </div>                          
                            </div>                         
                            <div class="col-md-1">
                            </div>                            
                          </div>
                        </div>
                      </div>                     
                    </div>
                    <div class="col-md-2">
                    </div>
                    </div>
                    </div>
                  </div>   
              </div>
            </div>
          </div>
          <div class="col-md-2">
          </div>
        </div>
      </div>
      <br/>

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