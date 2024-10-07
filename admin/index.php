<?php include("templats/menu.php") ?>

<?php

  if(isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];
    echo "<p>$msg</p>";
    unset($_SESSION['msg']);
  }
  if(isset($_SESSION['msg2'])){
    $msg = $_SESSION['msg2'];
    echo "<p>$msg</p>";
    unset($_SESSION['msg2']);
  }

  
  $q = "SELECT * FROM items WHERE is_end = 0 ORDER BY id DESC";
  
  $items = $conn->query($q);

  $items = $items->fetch_all(MYSQLI_ASSOC);

?>

<div class="row offset-sm-1 mt-3">
  <div class="col col-sm-10">

    <?php foreach($items as $item){ ?>

      <div class="card mb-3 item-card">
        <div class="row g-0">
          <div class="col-md-4 item-img text-center">
            <img src="<?php echo $item['img'] ?>" class="img-fluid rounded" alt="Img">
          </div>
          <div class="col-md-8 ">
            <div class="card-body">
              <h5 class="card-title"><?php echo $item['name'] ?></h5>
              <p class="card-text"><?php echo $item['about'] ?></p>
              <h5 class="card-title">&#8377; <?php echo $item['price'] ?> / ticket</h5>
              <p class="card-text"><small class="text-body-secondary">Started From <?php echo $item['sd'] ?></small></p>
              <form class="btn-form" action="../payment/payscript.php" method="POST">
                <input name="price" type="hidden" value="<?php echo $item['price'] ?>">
                <button class="btn btn-success" name="id" value="<?php echo $item['id']; ?>">Buy Now</button>
              </form>

              <?php if(isset($_SESSION['admin']) && isset($_SESSION['ad_pass'])){
                if(($_SESSION['admin'] == admin )&& ($_SESSION['ad_pass'] == ad_pass)){ ?>
                  <form class="btn-form ms-3" action="make-winner.php" method="POST">
                    <button class="btn btn-outline-warning" name="id" value="<?php echo $item['id']; ?>">Make Winner</button>
                  </form>
              <?php }} ?>

            </div>
          </div>
        </div>
      </div>

    <?php } ?>

  </div>
</div>

<?php include("templats/footer.php") ?> 