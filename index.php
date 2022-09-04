<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>woocommarce wish list ajax</title>
</head>
<body>

    <div class="header-wishlist-icon">
        <a href="<?php echo get_page_link(2402); ?>"><i class="fa-light fa-heart"></i></a>
        <span class="wishlist-count">
           <?php 
              $count = 0;
              if( function_exists( 'yith_wcwl_count_products' ) ){
                echo $count = yith_wcwl_count_products();
              }
           ?>
        </span>
     </div>
    
</body>
</html>