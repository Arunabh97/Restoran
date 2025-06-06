<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layouts/header.php"; ?>
<?php 


    $query = "SELECT * FROM foods";
    $app = new App;
    $app->validateSessionAdminInside();

    $foods = $app->selectAll($query);

?>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Foods</h5>
              <a  href="create-foods.php" class="btn btn-primary mb-4 text-center float-right">Create Foods</a>

              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock Quantity</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($foods as $food) : ?>
                    <tr>
                      <th scope="row"><?php echo $food->id; ?></th>
                      <td><img style="width: 60px; height: 60px" src="foods-images/<?php echo $food->image; ?>" </td>
                      <td><?php echo $food->name; ?></td>
                      <td>₹<?php echo $food->price; ?></td>
                      <td><?php echo $food->stock_quantity; ?></td>
                      <td><a href="delete-foods.php?id=<?php echo $food->id; ?>" class="btn btn-danger  text-center ">Delete</a></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>


<?php require "../layouts/footer.php"; ?>
