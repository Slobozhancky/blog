<div class="alert alert-danger" role="alert">
  <?php 
    if(isset($_SESSION['error'])){ 
        echo $_SESSION['error'];
    }
  ?>
</div>