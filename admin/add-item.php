<?php include("templats/menu.php") ?>
<?php include("../configs/isAdmin.php"); ?>



<?php
  if(isset($_POST['submit'])){
    $name = $conn -> real_escape_string( $_POST['name']);
    $about = $conn -> real_escape_string( $_POST['about']);
    $price = $conn -> real_escape_string( $_POST['price']) ;
    $target = $conn -> real_escape_string($_POST['target']);
    $img = $conn -> real_escape_string($_POST['img']);


    $q = "INSERT INTO items (name, about, img, price, target) VALUES ( '$name', '$about', '$img', '$price', '$target')";

    $res = $conn->query($q);

    if($res == true){
      $_SESSION["msg"] = "Item Successfully Uploded..";
      header("location:".SITE_URL."index.php");
    }
  }
?>

<div class="row offset-md-2 mt-3">

  <?php
    if(isset($_SESSION['msg'])){
      $msg = $_SESSION['msg'];
      echo "<p>$msg</p>";
      unset($_SESSION['msg']);
    }
  ?>

  <div class="col col-md-8">
    <h2>Add Item</h2>
    
    <form method="POST" action="" class="needs-validation" novalidate>
      <div class="mb-3">
        <label for="name" class="form-label">Name Of Item</label>
        <input  placeholder="Name Of Item" type="text" class="form-control" id="name" name="name" required>
      </div>
      
      <div class="mb-3">
        <label for="about" class="form-label">About This</label>
        <input  placeholder="Enter info.. about this" type="text" class="form-control" id="about" name="about" required>
      </div>
      
      <div class="mb-3">
        <label for="img" class="form-label">Image</label>
        <input type="text" placeholder="URL / LINK" class="form-control" id="img" name="img" required>
      </div>
      
      <div class="mb-3">
        <label for="price" class="form-label">Ticket Price</label>
        <input placeholder="Enter Price" type="number" class="form-control" id="price" name="price" required>
      </div>

      <div class="mb-3">
        <label for="target" class="form-label">Target</label>
        <input placeholder="Enter target" type="number" class="form-control" id="target" name="target" required>
      </div>

      <button name="submit" value="yes" type="submit" class="btn btn-primary mb-3">Upload Item</button>
    </form>

  </div>
</div>

<?php include("templats/footer.php") ?> 