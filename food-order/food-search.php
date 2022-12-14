<?php include('partials-front/menu.php');?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php
              //get the search keyword
              $search = $_POST['search'];
            ?>
            
            <h2>Foods on Your Search <a href="#" class="text-white"><?php echo $search;?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
               
                //sql query to get food based on search keyword
                $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$searchsearch%'OR description LIKE '%$search'";
                //execute the qurey
                $res = mysqli_query($conn, $sql);
                //count Rows
                $count = mysqli_num_rows($res);
                //check whether food avaliable or not
                if($count>0)
                {
                    //food avaliable
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $id = $row['price'];
                        $price = $row['description'];
                        $image_name = $row['image_name'];
                        ?>
                         
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php
                                        //check whether image name is avaliable or not
                                        if($image_name=="")
                                        {
                                            //image not avaliable
                                            echo "<div class='error'>Image not Avaliable</div>";
                                        }
                                        else
                                        {
                                            //image avaliable
                                            ?>
                                             <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                            <?php
                                        }
                                    ?>
                                    
                                </div>

                                <div class="food-menu-desc">
                                    <h4><?php echo $title;?></h4>
                                    <p class="food-price"><?php echo $price;?></p>
                                    <p class="food-detail">
                                       <?php echo $description;?>
                                    </p>
                                    <br>

                                    <a href="#" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>

                        <?php
                    }
                }
                else
                {
                  //food not avaliable
                  echo "<div class='error'>Food not Found</div>";
                }
            ?>


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php');?>