 <?php session_start();?>
 <!--Navigation bar-->
 <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
     <div class="container">
         <img class="logo" src="public/imgs/logo.png" alt="">
         <!--<h2 class="brand">Male Fashion</h2>-->
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
             <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                 <li class="nav-item">
                     <a class="nav-link" href="/">Home</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="/shop">Shop</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">Blog</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="/contact">Contact Us</a>
                 </li>
                 <!-- <?php if (!isset($_SESSION['logged_in'])) : ?>
                     <li class="nav-item">
                         <a class="nav-link" href="/login">Login</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="/register">Register</a>
                     </li>
                 <?php endif; ?> -->
                 <li class="nav-item">
                     <a href="/cart"><i class="fas fa-shopping-bag">
                        <?php if(isset($_SESSION['quantity']) && $_SESSION['quantity'] != 0){?>
                        <span class="cart-quantity"><?php echo $_SESSION['quantity'];?></span>
                        <?php }?>
                    </i></a>
                     <a href="/account"><i class="fas fa-user"></i></a>
                 </li>

             </ul>

         </div>
     </div>
 </nav>