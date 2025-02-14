<?php
$page = 'foods';
include('partials-front/menu.php');
?>
</nav>
<!-- fOOD sEARCH Section Starts Here -->
<section class="">
    <div class="container">
        <?php

        $search = mysqli_real_escape_string($conn, $_POST['search']);

        ?>


        <h2> Your result <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container s-head" style="border: 2px solid blue;">
        <h1 class="text-center">Menu</h1>

        <?php

        $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);
        if ($count > 0) {
            //Food Available
            while ($row = mysqli_fetch_assoc($res)) {
                //Get the details
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];
        ?>
        <div class="container">
    <div class="row">
        <div class="food-menu-box m-2 p-2" style="border: 2px solid green; border-radius:100px;">
            <div class=" food-menu-img">
                <?php
                        if ($image_name == "") {
                            //Image not Available
                            echo "<div class='error'>Image not Available.</div>";
                        } else {
                            //Image Available
                        ?>
                <img src="<?php echo $SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza"
                    class="img-responsive img-curve h-25 w-25 m-2 p-2"
                    style="border: 2px solid green; border-radius:100px;">
                <?php

                        }
                        ?>

            </div>
            <div class="col">
            <div class="food-menu-desc">
                <h4><?php echo $title; ?></h4>
                <p class="food-price">&#8377; <?php echo $price; ?> &#8725;</p>
                <p class="food-detail">
                    <?php echo $description; ?>
                </p>
                <br>

                <a href="<?php echo $SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary m-4 p-2"
                    style="border: 2px solid green; border-radius:100px;">Order
                    Now</a>
            </div>
            </div>
        </div>

        <?php
            }
        } else {
            //Food Not Available
            echo "<div class='error'>food not availble.</div>";
        }

        ?>
        <div class="clearfix"></div>
    </div>
    </div>
    </div>

</section>
<!-- fOOD Menu Section Ends Here -->



<!-- <?php include('partials-front/footer.php'); ?> -->
