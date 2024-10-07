<?php include("templats/menu.php")?>
<?php include("../configs/isLogin.php");?>

<?php

  $q = "SELECT * FROM tickets WHERE user_id = $user_id  ORDER BY id DESC";

  $res = $conn->query($q);

  if($res->num_rows >= 1){
    $tickets = $res->fetch_all(MYSQLI_ASSOC);
?>

<div class="row offset-sm-1 mt-3">
  <div class="col col-sm-10">

    <?php

    foreach($tickets as $ticket){

      $item_id = $conn -> real_escape_string($ticket['item_id']);
      
      $q2 = "SELECT name, price, img From items WHERE id = '$item_id'";

      $res2 = $conn->query($q2);

      $item = $res2->fetch_assoc();

    ?>
        <div class="card  mb-3">
          <div class="row g-0">
            <div class="col-md-4 text-center">
              <img src="<?php echo $item['img']; ?>" class="img-fluid rounded" alt="Image">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Your Lucky NO : <?php echo $ticket['id']; ?></h5>
                <p class="card-text">Item Name : <?php echo $item['name']; ?></p>
                <p class="card-text">Price : &#8377;<?php echo $item['price']; ?></p>
                <p class="card-text"><small class="text-body-secondary">Date and Time = <?php echo $ticket['date']; ?></small></p>
              </div>
            </div>
          </div>
        </div>


    <?php
        }
      }else{
        echo "<p>You have not purchased any tickets</p>";
      }
    ?>

  </div>
</div>
    


<?php include("templats/footer.php") ?>