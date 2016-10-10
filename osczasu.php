<?php
  include_once("tutorial.php");
  $tutorial = new Tutorial();
  $krotki = $tutorial->get_rows();
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
    <div class="row">
      <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-body">
              O czym teraz myślisz?
            </div>
          </div>
        </div>
        <div class=\"col-md-3\">
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-body" id="left">
              <form action="wyslijpost.php" method="post" class="form">
                <textarea type="tresc" name="tresc" class="form-control" placeholder="..." rows="3" id="space"></textarea><br/>       
                  <button type="submit" class="btn btn-default">Opublikuj</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-3">
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-body">
              Co słychać u Twoich znajomych?
            </div>
          </div>
        </div>
        <div class="col-md-3">
        </div>
      </div>
    </div>

    <?php foreach($krotki as $krotka) { ?>
        <div class="row">
          <div class="col-md-3">
          </div>
          <div class="col-md-6">
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
            <div class="col-md-3">
            </div>
          </div>
    <?php
      }
    ?>

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