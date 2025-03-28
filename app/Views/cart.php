
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Products</title>

     <!-- css file -->
     <link rel="stylesheet" href="css/style.css">
     
     <!-- font awesome link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <!-- Header-->
     <?php include 'header.php' ?>

     
     <div class="container">

          <?php 
     if(isset($display_message)){
        foreach( $display_message as $display_message){
        echo "<div class='display_message'>
        <span>$display_message</span>
        <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
     </div>";
    }

}
     ?>


        <section class="products">
            <h1 class="heading">Let's Shop</h1>
            <div class="product_container">
               
  
               
               <?php

                $select_product=mysqli_query($conn, "SELECT * FROM products");

                if(mysqli_num_rows($select_product)>0){

                    while($fetch_product=mysqli_fetch_assoc($select_product)){
                       // echo $fetch_product['name'];
                        ?>
                     <form action="" method="post">
                    <div class="edit_form">
                        <img src="images/<?php echo $fetch_product['image'] ?>" alt="">
                        <h3><?php echo $fetch_product['name'] ?></h3>
                        <div class="price"><?php echo $fetch_product['price'] ?>/-</div>
                        <input type="hidden" name="name" value="<?php echo $fetch_product['name'] ?>">
                        <input type="hidden"name="price" value="<?php echo $fetch_product['price'] ?>">
                        <input type="hidden"name="image"value= "<?php echo $fetch_product['image'] ?>">
                        <input type="submit" name= "add_to_cart" class="submit_btn cart_btn" value="Add to Cart">
                    </div>
                </form>
                <?php
               
                    }
                }else{
                    echo "<div class='empty_text'>No products Available</div>";
                } ?>
               
        </section>
     </div>
</body>
</html>

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 bg-white form-wrapper mb-5">
            <div class="container">
                <h3><?= $user['firstname'].' '.$user['lastname'] ?></h3>
                <hr>
                <?php if (session()->get('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>

                <form class="" action="<?= base_url('/profile') ?>" method="post">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" name="firstname" value="<?= set_value('firstname', $user['firstname']) ?>">
                            </div>

                        </div>


                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" name="lastname" value="<?= set_value('lastname', $user['lastname']) ?>">
                            </div>

                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" readonly id="email" value="<?=$user['email'] ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" value="">
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="password_confirm">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="">
                            </div>
                        </div>

                        <div class="row">                        
                        <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>


                    </div>

                        <!-- validation error output -->
                        <?php if (isset($validation)): ?>
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors() ?> 
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </form>

            </div>

        </div>

    </div>


</div>