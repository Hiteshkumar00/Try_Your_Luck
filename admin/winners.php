<?php include("templats/menu.php") ?>
<?php 

$q = "SELECT * FROM winners ORDER BY id DESC";

$res = $conn->query($q);

$winners = $res->fetch_all(MYSQLI_ASSOC);
?>

<div class="row offset-sm-1 mt-3">
  <div class="col col-sm-10">

    <?php 
    foreach($winners as $winner){

      $user_id = $conn -> real_escape_string($winner['winner_id']);
      $item_id = $conn -> real_escape_string($winner['item_id']);

      $q2 = "SELECT full_name, email FROM users WHERE id = $user_id";
      $res2 = $conn->query($q2);
      $user = $res2->fetch_assoc();

      $q3 = "SELECT img, name, sd, price FROM items WHERE id = $item_id";
      $res3 = $conn->query($q3);
      $item = $res3->fetch_assoc();
    ?>

    <div class="card mb-3 ">
      <div class="row g-0">
        <div class="col-md-4 text-center">
          <img src="<?php echo $item['img']; ?>" class="img-fluid rounded" alt="img">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Winner : <?php echo $user['full_name']; ?></h5>
            <p class="card-text">Email : <?php echo $user['email']; ?></p>
            <p class="card-text">Lucky No : <?php echo $winner['lucky_no']; ?></p>
            <p class="card-text">Item : <?php echo $item['name']; ?></p>
            <p class="card-text">Ticket price : &#8377;<?php echo $item['price']; ?></p>
            <p class="card-text">
              <small class="text-body-secondary">Start : <?php echo $item['sd']; ?></small>
              <small class="text-body-secondary p-3">End : <?php echo $winner['date']; ?></small>
            </p>
          </div>
        </div>
      </div>
    </div>

    <?php 
    }
    ?>
  </div>
</div>


<?php include("templats/footer.php") ?> 