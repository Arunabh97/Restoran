<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "../includes/header.php"; ?>

<?php
if(!isset($_SESSION['user_id'])) {
    echo "<script>window.location.href='".APPURL."'</script>";
}

$app = new App;

if(isset($_POST['update_cart'])) {
    foreach($_POST['quantity'] as $item_id => $quantity) {
        $quantity = (int)$quantity;
        if($quantity <= 0) {
            $app->delete("DELETE FROM cart WHERE id='$item_id'");
        } else {
            $app->update("UPDATE cart SET quantity=$quantity WHERE id='$item_id'");
        }
    }
}

$query = "SELECT * FROM cart WHERE user_id='$_SESSION[user_id]'";
$cart_items = $app->selectAll($query);

$all_price = 0;

if(is_array($cart_items) || is_object($cart_items)) {
    foreach($cart_items as $cart_item) {
        $all_price += ($cart_item->price * $cart_item->quantity);
    }
} else {
    $cart_items = [];
}

$_SESSION['total_price'] = $all_price;

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX" crossorigin="anonymous" />
<style>
    .total-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin-bottom: 20px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .total-table th,
    .total-table td {
        padding: 12px;
        text-align: center;
        border-bottom: 1px solid #f0f0f0;
    }

    .total-table th {
        background-color: #f8f9fa;
        color: #333;
        font-weight: 600;
        text-transform: uppercase;
    }

    .total-table tbody tr:last-child td {
        border-bottom: none;
    }

    .total-highlight {
        background-color: #ffd700;
        color: #333;
        padding: 8px 12px;
        border-radius: 5px;
        font-weight: bold;
    }

    .btn-delete {
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 8px 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-delete:hover {
        background-color: #c82333;
    }
</style>


<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Cart</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="container">
    <div class="col-md-12">
        <form method="POST" action="cart.php">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($cart_items as $cart_item) : ?>
                        <tr>
                            <td><img src="<?php echo APPIMAGES; ?>/<?php echo $cart_item->image; ?>" style="width: 50px; height: 50px"></td>
                            <td><?php echo $cart_item->name; ?></td>
                            <td>₹<?php echo $cart_item->price; ?></td>
                            <td><input type="number" name="quantity[<?php echo $cart_item->id; ?>]" value="<?php echo $cart_item->quantity; ?>" min="1" readonly></td>
                            <td>₹<?php echo $cart_item->price * $cart_item->quantity; ?></td>
                            <td><a href="<?php echo APPURL; ?>/food/delete-item.php?id=<?php echo $cart_item->id; ?>" class="btn btn-danger text-white"><i class="fa-solid fa-trash"></i> Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </form>
        
        <div class="row">
            <div class="col-md-12">
                <table class="total-table">
                    <tr></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>
                        <td>
                            <strong>Total:</strong>
                            <span class="total-highlight">₹<?php echo $all_price; ?></span>
                        </td>
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6"> <!-- Adjust the column size as per your layout -->
                <button type="submit" name="explore" class="btn btn-primary" onclick="window.location.href = '../menu.php';">Explore Menu</button>
            </div>
            <div class="col-md-6 text-md-right"> <!-- Adjust the column size as per your layout -->
                <form method="POST" action="checkout.php" class="d-flex justify-content-end"> <!-- Using Bootstrap utility classes to align content to the end -->
                    <input type="hidden" name="total_price" value="<?php echo $all_price; ?>">
                    <button type="submit" class="btn btn-success">Proceed to Checkout</button>
                </form>
            </div>
        </div>


    </div>
</div>

<?php require "../includes/footer.php"; ?>
