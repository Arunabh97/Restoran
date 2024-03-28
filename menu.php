<?php require "config/config.php"; ?>
<?php require "libs/App.php"; ?>
<?php require "includes/header.php"; ?>

<?php 


    $query = "SELECT * FROM foods WHERE meal_id=4";
    $app = new App;
    $meals_4 = $app->selectAll($query);


    $query = "SELECT * FROM foods WHERE meal_id=5";
    $app = new App;
    $meals_5 = $app->selectAll($query);

    $query = "SELECT * FROM foods WHERE meal_id=6";
    $app = new App;
    $meals_6 = $app->selectAll($query);

    $query = "SELECT * FROM foods WHERE meal_id=7";
    $app = new App;
    $meals_7 = $app->selectAll($query);

    $query = "SELECT * FROM foods WHERE meal_id=8";
    $app = new App;
    $meals_8 = $app->selectAll($query);

?>
<style>
    .tab-content{
        margin: 0 40px;
    }
    </style>
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Menu</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Menu</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- Menu Start -->
<div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
                    <h1 class="mb-5">Menu Items</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-4">
                            <i class="fa fa-coffee fa-2x text-primary"></i>
                            <div class="ps-3">
                                <small class="text-body">Tasty Bites</small>
                                <h6 class="mt-n1 mb-0">Starters/Appetizers</h6>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-5">
                            <i class="fa fa-utensils fa-2x text-primary"></i>
                            <div class="ps-3">
                                <small class="text-body">Yummy Mains</small>
                                <h6 class="mt-n1 mb-0">Main Courses</h6>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-6">
                            <i class="fa fa-leaf fa-2x text-success"></i>
                            <div class="ps-3">
                                <small class="text-body">Green Goodness</small>
                                <h6 class="mt-n1 mb-0">Vegetarian/Vegan Options</h6>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-7">
                            <i class="fa fa-birthday-cake fa-2x text-warning"></i>
                            <div class="ps-3">
                                <small class="text-body">Sweet Treats</small>
                                <h6 class="mt-n1 mb-0">Desserts</h6>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-8">
                            <i class="fa fa-cocktail fa-2x text-danger"></i>
                            <div class="ps-3">
                                <small class="text-body">Liquid Delights</small>
                                <h6 class="mt-n1 mb-0">Beverages</h6>
                            </div>
                        </a>
                    </li>
                    </ul>

                    <div class="tab-content px-5">
                        <div id="tab-4" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <?php foreach($meals_4 as $meal_4) : ?>
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid rounded" src="<?php echo APPIMAGES; ?>/<?php echo $meal_4->image; ?>" alt="" style="width: 80px;">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span><?php echo $meal_4->name; ?></span>
                                                    <span class="text-primary">₹<?php echo $meal_4->price; ?></span>
                                                </h5>
                                                <small class="fst-italic" style="color: green; font-size: 15px;"><?php echo $meal_4->description; ?></small>
                                                <?php if ($meal_4->stock_quantity <= 0) : ?>
                                                    <p class="text-danger">Out of Stock</p>
                                                <?php else : ?>
                                                    <p>In Stock Available</p>
                                                <?php endif; ?>
                                                <a type="button" href="<?php echo APPURL; ?>/food/add-cart.php?id=<?php echo $meal_4->id; ?>" class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">view</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div id="tab-5" class="tab-pane fade show p-0">
                            <div class="row g-4">
                            <?php foreach($meals_5 as $meal_5) : ?>

                                <div class="col-lg-6">
                                        <div class="d-flex align-items-center">
                                                <img class="flex-shrink-0 img-fluid rounded" src="<?php echo APPIMAGES; ?>/<?php echo $meal_5->image; ?>" alt="" style="width: 80px;">
                                                <div class="w-100 d-flex flex-column text-start ps-4">
                                                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                        <span><?php echo $meal_5->name; ?></span>
                                                        <span class="text-primary">₹<?php echo $meal_5->price; ?></span>
                                                    </h5>
                                                    <small class="fst-italic" style="color: blue; font-size: 15px;"><?php echo $meal_5->description; ?></small>
                                                    <?php if ($meal_5->stock_quantity <= 0) : ?>
                                                        <p class="text-danger">Out of Stock</p>
                                                    <?php else : ?>
                                                        <p>In Stock Available</p>
                                                    <?php endif; ?>
                                                    <a type="button" href="<?php echo APPURL; ?>/food/add-cart.php?id=<?php echo $meal_5->id; ?>" class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">view</a>
                                                </div>
                                        </div>
                                </div>
                                <?php endforeach; ?>
                            </div>    
                        </div>
                        <div id="tab-6" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <?php foreach($meals_6 as $meal_6) : ?>

                                        <div class="col-lg-6">
                                                <div class="d-flex align-items-center">
                                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo APPIMAGES; ?>/<?php echo $meal_6->image; ?>" alt="" style="width: 80px;">
                                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                                <span><?php echo $meal_6->name; ?></span>
                                                                <span class="text-primary">₹<?php echo $meal_6->price; ?></span>
                                                            </h5>
                                                            <small class="fst-italic" style="color: green; font-size: 15px;"><?php echo $meal_6->description; ?></small>
                                                            <?php if ($meal_6->stock_quantity <= 0) : ?>
                                                                <p class="text-danger">Out of Stock</p>
                                                            <?php else : ?>
                                                                <p>In Stock Available</p>
                                                            <?php endif; ?>
                                                            <a type="button" href="<?php echo APPURL; ?>/food/add-cart.php?id=<?php echo $meal_6->id; ?>" class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">view</a>
                                                        </div>
                                                </div>
                                        </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div id="tab-7" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <?php foreach($meals_7 as $meal_7) : ?>

                                        <div class="col-lg-6">
                                                <div class="d-flex align-items-center">
                                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo APPIMAGES; ?>/<?php echo $meal_7->image; ?>" alt="" style="width: 80px;">
                                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                                <span><?php echo $meal_7->name; ?></span>
                                                                <span class="text-primary">₹<?php echo $meal_7->price; ?></span>
                                                            </h5>
                                                            <small class="fst-italic" style="color: blue; font-size: 15px;"><?php echo $meal_7->description; ?></small>
                                                            <?php if ($meal_7->stock_quantity <= 0) : ?>
                                                                <p class="text-danger">Out of Stock</p>
                                                            <?php else : ?>
                                                                <p>In Stock Available</p>
                                                            <?php endif; ?>
                                                            <a type="button" href="<?php echo APPURL; ?>/food/add-cart.php?id=<?php echo $meal_7->id; ?>" class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">view</a>
                                                        </div>
                                                </div>
                                        </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div id="tab-8" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <?php foreach($meals_8 as $meal_8) : ?>

                                        <div class="col-lg-6">
                                                <div class="d-flex align-items-center">
                                                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo APPIMAGES; ?>/<?php echo $meal_8->image; ?>" alt="" style="width: 80px;">
                                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                                <span><?php echo $meal_8->name; ?></span>
                                                                <span class="text-primary">₹<?php echo $meal_8->price; ?></span>
                                                            </h5>
                                                            <small class="fst-italic" style="color: green; font-size: 15px;"><?php echo $meal_8->description; ?></small>
                                                            <?php if ($meal_8->stock_quantity <= 0) : ?>
                                                                <p class="text-danger">Out of Stock</p>
                                                            <?php else : ?>
                                                                <p>In Stock Available</p>
                                                            <?php endif; ?>
                                                            <a type="button" href="<?php echo APPURL; ?>/food/add-cart.php?id=<?php echo $meal_8->id; ?>" class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">view</a>
                                                        </div>
                                                </div>
                                        </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->

<?php require "includes/footer.php"; ?>