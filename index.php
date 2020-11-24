<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,700,800" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Dej 24</title>
</head>

<body>
    <!--Responsive Hero Image with CSS Text + Button + popup Full-Width. If you like my work, please credit author: www.action360.ca @action360ca Enjoy!-->


    <?php
mt_srand(date('Ymd'));
$number = mt_rand(50, 5000);

$mysqli = new mysqli("localhost", "root", "", "DEJ-24");

$stmt = $mysqli->prepare("SELECT * FROM plat ORDER BY RAND(?) LIMIT 1");
$stmt->bind_param('i', $number);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();


?>

    <div class="hero-image" style="height: 100%;">
        <div class="hero-text">
            <h1 style="font-style: Georgia; color: #fff; font-size:50px;">Dej 24</h1>
            <p>Chaque jour un plat spécial</p>
            <button id="btnOpenForm">COMMANDER</button>
        </div>
        <div class="hero-exclusions">
            <a href="#popup1">
                <p class="exclusions">Découvrir le plat du jour
</p>
            </a>
        </div>

        <div id="popup1" class="overlay">
            <div class="popup">
                <a class="close" href="#">&times;</a>
                <div class="content">
                    <br><br>
                    <h2>Chaque jour un plat spécial, a 45 DH seulement </h2>

                    Le plat du jour 
                    <p><?= $row['name']; ?></p>
                    <img src="<?= $row['img']; ?>" alt="" srcset="">
                    <br><br><br>
                </div>
            </div>
        </div>
        <!--lightbox style popup goes here-->
    </div>



<div class="form-popup-bg">
  <div class="form-container">
    <button id="btnCloseForm" class="close-button">X</button>
    <h1>Commandez maintenant</h1>
    <!-- <p>For more information. Please complete this form.</p> -->
    <form action="action.php" method="POST">
      <div class="form-group">
        <label for="">Nom</label>
        <input name="name" type="text" class="form-control" />
      </div>
      <div class="form-group">
        <label for="">Telephone</label>
        <input name="tele" class="form-control" type="text" />
      </div>
      <div class="form-group">
        <label for="">Email</label>
        <input name="mail" class="form-control" type="text" />
      </div>
      <div class="form-group">
        <label for=""> Address</label>
        <input name="address" class="form-control" type="text" />
      </div>
      <div class="form-group">
        <input name="cmd" class="form-control" type="hidden"  value="<?= $row['name']; ?>"/>
      </div>
      <button type="submit" name="submit" >Commandez</button>
    </form>
  </div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

<script>
    
    function closeForm() {
  $('.form-popup-bg').removeClass('is-visible');
}

$(document).ready(function($) {
  
  /* Contact Form Interactions */
  $('#btnOpenForm').on('click', function(event) {
    event.preventDefault();

    $('.form-popup-bg').addClass('is-visible');
  });
  
    //close popup when clicking x or off popup
  $('.form-popup-bg').on('click', function(event) {
    if ($(event.target).is('.form-popup-bg') || $(event.target).is('#btnCloseForm')) {
      event.preventDefault();
      $(this).removeClass('is-visible');
    }
  });
  
  
  
  });

</script>
</html>


