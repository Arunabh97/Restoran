<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "../includes/header.php"; ?>
<?php 


    if(isset($_GET['id'])) {

        $id = $_GET['id'];

        $query = "SELECT * FROM foods WHERE id='$id'";
        $app = new App;
    
        $one = $app->selectOne($query);

        if(isset($_SESSION['user_id'])) {
            $q = "SELECT * FROM cart WHERE item_id='$id' AND user_id='$_SESSION[user_id]'";
            $count  = $app->validateCart($q);
        }



        if(isset($_POST['submit'])) {

            $item_id = $_POST['item_id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $image = $_POST['image'];
            $user_id = $_SESSION['user_id'];
            $quantity = $_POST['quantity'];
    
    
            $query = "INSERT INTO cart (item_id, name, price, image, user_id, quantity) VALUES (:item_id, 
            :name, :price, :image, :user_id, :quantity)";
    
            $arr = [
                ":item_id" =>  $item_id,
                ":name" =>  $name,
                ":price" =>  $price,
                ":image" =>  $image,
                ":user_id" =>  $user_id,
                ":quantity" =>  $quantity,
            ];
    
            $path = "add-cart.php?id=".$id."";
    
            $app->insert($query, $arr, $path);
    
        }
        

    }  else {
        echo "<script>window.location.href='".APPURL."/404.php'</script>";

    }
    


?>
<style>
    .custom-quantity {
    width: 205px;
    height: 50px;
}

.custom-quantity .btn {
    width: 50px; 
    font-size: 2rem; 
}

.custom-quantity input[type="number"] {
    width: calc(100% - 60px); 
    text-align: center;
}

    </style>
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo $one->name; ?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Cart</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-md-6">
                        <div class="row g-3">
                            <div class="col-12 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="<?php echo APPIMAGES; ?>/<?php echo $one->image; ?>">
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h1 class="mb-4"><?php echo $one->name; ?></h1>
                        <p class="mb-4">
                        <?php echo $one->description; ?>
                        </p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h3>Price: ₹ <?php echo $one->price; ?> </h3>                                   
                                </div>
                            </div>
                           
                        </div>
                        <form method="POST" action="add-cart.php?id=<?php echo $id; ?>">
                            <input type="hidden" name="item_id" value="<?php echo $one->id; ?>">
                            <input type="hidden" name="name" value="<?php echo $one->name; ?>">
                            <input type="hidden" name="image" value="<?php echo $one->image; ?>">
                            <input type="hidden" name="price"  value="<?php echo $one->price; ?>">
                            <div class="input-group mb-3 custom-quantity">
                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="decreaseQuantity()">-</button>
                                <input type="text" class="form-control form-control-sm" name="quantity" value="1">
                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="increaseQuantity()">+</button>
                            </div>
                            <?php if(isset($_SESSION['user_id'])) : ?>
                        <?php if($one->stock_quantity <= 0) : ?>
                            <p class="text-danger">Out of Stock</p>
                        <?php else : ?>
                            <p>Available Stock: <?php echo $one->stock_quantity; ?></p>
                            <?php if($count > 0) : ?>
                                <button name="submit" type="submit" class="btn btn-primary py-3 px-5 mt-2" disabled>Added to Cart</button>
                            <?php else : ?>
                                <button name="submit" type="submit" class="btn btn-primary py-3 px-5 mt-2">Add to Cart</button>
                            <?php endif; ?>
                        <?php endif; ?>    
                    <?php endif; ?>    
                </form>    
            </div>
        </div>
    </div>
</div>

<script>
    function decreaseQuantity() {
        var quantityInput = document.querySelector('input[name="quantity"]');
        var currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    }

    function increaseQuantity() {
        var quantityInput = document.querySelector('input[name="quantity"]');
        var currentValue = parseInt(quantityInput.value);
        if (currentValue < 5) { // Maximum quantity is 5
            quantityInput.value = currentValue + 1;
        }
    }
</script>

<?php require "../includes/footer.php"; ?>

   