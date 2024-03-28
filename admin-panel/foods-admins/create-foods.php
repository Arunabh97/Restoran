<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layouts/header.php"; ?>
<?php 


    $app = new App;   
    $app->validateSessionAdminInside();


    if(isset($_POST['submit'])) {

        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $meal_id = $_POST['meal_id'];
        $image = $_FILES['image']['name'];
        $stock_quantity = $_POST['stock_quantity'];

        $dir = "foods-images/" . basename($image);


        $query = "INSERT INTO foods (name, price, description, meal_id, image, stock_quantity) VALUES (:name, 
        :price, :description, :meal_id, :image, :stock_quantity)";

        $arr = [
            ":name" =>  $name,
            ":price" =>  $price,
            ":description" =>  $description,
            ":meal_id" =>  $meal_id,
            ":image" =>  $image,
            ":stock_quantity" => $stock_quantity,
        ];

        $path = "show-foods.php";

        if(move_uploaded_file($_FILES['image']['tmp_name'], $dir)) {
          $app->register($query, $arr, $path);

        }


    }



?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Food Items</h5>
          <form method="POST" action="create-foods.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="Name" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="price" id="form2Example1" class="form-control" placeholder="Price" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                        <input type="number" name="stock_quantity" id="form2Example1" class="form-control" placeholder="Stock Quantity" />
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="file" name="image" id="form2Example1" class="form-control"  />
                 
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
               
                <div class="form-outline mb-4 mt-4">

                  <select name="meal_id" class="form-select  form-control" aria-label="Default select example">
                    <option selected>Choose Meal</option>
                    <option value="1">Breakfast</option>
                    <option value="2">Launch</option>
                    <option value="3">Dinner</option>
                    <option value="4">Starters</option>
                    <option value="5">Main Courses</option>
                    <option value="6">Vegetarian</option>
                    <option value="7">Desserts</option>
                    <option value="8">Beverages</option>
                  </select>
                </div>

                <br>
              

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
<?php require "../layouts/footer.php"; ?>
