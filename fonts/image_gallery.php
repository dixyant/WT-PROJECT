
<?php
require_once "../backend/connection.php"
?>
<!DOCTYPE html>
<html>
  <main>
    
    <head>
      <div id="Head">
        <h1>My Gallery</h1>
      </div>
      
      
      <title>
        Gallery | Dikshyant Adhikari
      </title>
      <link rel="stylesheet" href="../css/image_gallery.css">
      
    </head>
    <body>
      
        <div class="row">
          <div class="column">
          <?php
          $path='../uploads/';
          $sql="SELECT  image  FROM images";
          $stmt=$con->prepare($sql);
          $stmt->execute();
          $stmt->bind_result($resource);
          $stmt->store_result();
          $i=0;
          while($stmt->fetch()){
            if(file_exists($path.$resource)){
              if ($i==2){
              $i=0;
              ?>
              </div>
              <div class="column">
              <?php
              }
          ?>
              <img src=<?=$path.$resource?>>
              <?php $i++;?>
              <br>
          <?php
            }
          };
          ?>
         </div>
        </div>
      
      
      
    </body>
  </main>
  
</html>