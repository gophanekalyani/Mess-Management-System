<?php
	session_start();
  if(isset($_POST['login'])){
    include('includes/connection.php');
    $query = "select * from users where email = '$_POST[email]' AND password = '$_POST[password]'";
  	$query_run = mysqli_query($connection,$query);
    if(mysqli_num_rows($query_run)){
			$_SESSION['email'] = $_POST['email'];
			while($row = mysqli_fetch_assoc($query_run)){
				$_SESSION['fname'] = $row['fname'];
				$_SESSION['lname'] = $row['lname'];
				$_SESSION['uid'] = $row['sno'];
			}
      echo "<script type='text/javascript'>
      	window.location.href = 'user_dashboard.php';
      </script>";
    }
    else{
      echo "<script type='text/javascript'>
      	alert('Please enter correct email and password.');
      	window.location.href = 'index.php';
      </script>";
    }
  }

  if(isset($_POST['register'])){
    include('includes/connection.php');
    $query = "insert into users values(null,'$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[password]',$_POST[mobile],'$_POST[address]',0)";
    $query_run = mysqli_query($connection,$query);
    if($query_run){
      echo "<script type='text/javascript'>
        alert('Registeration successfully...');
        window.location.href = 'index.php';
      </script>";
    }
    else{
      echo "<script type='text/javascript'>
        alert('Registeration failed...Plz try again.');
        window.location.href = 'index.php';
      </script>";
    }
  }

	if(isset($_POST['admin_login'])){
    include('includes/connection.php');
    $query = "select * from admins where email = '$_POST[email]' AND password = '$_POST[password]'";
  	$query_run = mysqli_query($connection,$query);
    if(mysqli_num_rows($query_run)){
			$_SESSION['email'] = $_POST['email'];
			while($row = mysqli_fetch_assoc($query_run)){
				$_SESSION['fname'] = $row['fname'];
				$_SESSION['lname'] = $row['lname'];
				$_SESSION['email'] = $row['email'];
			}
      echo "<script type='text/javascript'>
      	window.location.href = 'admin pannel/admin_dashboard.php';
      </script>";
    }
    else{
      echo "<script type='text/javascript'>
      	alert('Please enter correct email and password.');
      	window.location.href = 'index.php';
      </script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <!-- Bootsrap Files -->
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"></link>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/juqery_latest.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
		<!-- CSS Files -->
		<link rel="stylesheet" href="css/styles.css">
    <script type="text/javascript">
      function resetData(){
        document.getElementById('fname').value = "";
        document.getElementById('lname').value = "";
        document.getElementById('email').value = "";
        document.getElementById('password').value = "";
        document.getElementById('mobile').value = "";
        document.getElementById('address').value = "";
      }
    </script>
  </head>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Website</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <section id="Home">
        <nav>
            <div class="logo">
                <img src="image/logo.png">
                <div class="container-fluid">
  			<a class="navbar-brand" href="index.php"><h3 style="color:white;">Mess Management System</h3></a>
  		    <ul class="nav navbar-nav navbar-center">
  		      
  					
  					
  		    </ul>
  		</div>
            </div>

            <ul>
                <li><a href="#Home">Home</a></li>
                <li><a href="#About">About</a></li>
                <li><a href="#Menu">Menu</a></li>
                <li><a href="#Gallary">Gallary</a></li>
                <li class="nav-item">
  <button type="button" data-toggle="modal" data-target="#login_modal" id="login_button" class="plain-button">User Login</button>
</li>
<li class="nav-item">
  <button type="button" data-toggle="modal" data-target="#register_modal" id="register_button" class="plain-button">Register</button>
</li>
<li class="nav-item">
  <button type="button" data-toggle="modal" data-target="#admin_login_modal" id="admin_login_button" class="plain-button">Admin Login</button>
</li>

            </ul>

            <div class="icon">
                <i class="fa-solid fa-magnifying-glass"></i>
                <i class="fa-solid fa-heart"></i>
                <i class="fa-solid fa-cart-shopping"></i>
            </div>

        </nav>

        <div class="main">

            <div class="men_text">
                <h1>Get Fresh<span>Food</span><br>in a Easy Way</h1>
            </div>

            <div class="main_image">
                <img src="image/main_img.png">
            </div>

        </div>

        <p>
            "Food is not just sustenance; it's a celebration of life itself. Fresh ingredients connect us to the earth, 
            reminding us that every meal can be a vibrant expression of nature's abundance.
             When we choose to eat seasonally and locally, we honor the cycles of the land and the people who cultivate it.
             "Reminding us that every meal can be a vibrant expression of nature's abundance." Fresh food bursts with flavor, color, 
             and nutrition, reflecting the richness of the environment. When we choose to cook with seasonal ingredients, we embrace the
              full spectrum of tastes that each season offers, from the bright, refreshing flavors of spring to the hearty, comforting notes of winter."
        </p>

        
    </section>



    <!--About-->

    <div class="about" id="About">
        <div class="about_main">

            <div class="image">
                <img src="image/Food-Plate.png">
            </div>

            <div class="about_text">
                <h1><span>About</span>Us</h1>
                <h3>Why Choose us?</h3>
                <p>
                    Our Mission
                    At Tastety Bites, our mission is to elevate the dining experience through exceptional mess management, fostering a clean,
                    efficient, and welcoming environment. We believe that a well-organized mess hall is not just a place to eat; it is a 
                    community hub where relationships are built, cultures are shared, and nourishment is celebrated.
                </p>
            </div>

        </div>

        

    </div>



    <!--Menu-->

    <div class="menu" id="Menu">
    <h1>Our<span>Menu</span></h1>

    <div class="menu_box">
        <div class="menu_card">
            <div class="menu_image">
                <img src="image/buger.jpg">
            </div>
            <div class="small_card">
                <i class="fa-solid fa-heart"></i>
            </div>
            <div class="menu_info">
                <h2>Buger</h2>
                <p>
                    A juicy, grilled beef patty nestled between freshly baked buns, topped with crisp lettuce, tomato, and our signature sauce. Perfectly balanced flavors in every bite!
                </p>
                <h3>₹200.00</h3>
                <div class="menu_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
            </div>
        </div>

        <div class="menu_card">
            <div class="menu_image">
                <img src="image/pasta.jpg">
            </div>
            <div class="small_card">
                <i class="fa-solid fa-heart"></i>
            </div>
            <div class="menu_info">
                <h2>Pasta</h2>
                <p>
                    Delicate strands of pasta cooked to perfection, tossed in a rich tomato sauce, and garnished with fresh basil and grated parmesan for a classic Italian delight.
                </p>
                <h3>₹200.00</h3>
                <div class="menu_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
            </div>
        </div>

        <div class="menu_card">
            <div class="menu_image">
                <img src="image/lasagna.webp">
            </div>
            <div class="small_card">
                <i class="fa-solid fa-heart"></i>
            </div>
            <div class="menu_info">
                <h2>Lasagna</h2>
                <p>
                    Layers of pasta, rich meat sauce, and creamy béchamel, all baked to golden perfection. A comforting dish that warms the heart and soul!
                </p>
                <h3>₹200.00</h3>
                <div class="menu_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
            </div>
        </div>

        <div class="menu_card">
            <div class="menu_image">
                <img src="image/chocolate_Drink.jpg">
            </div>
            <div class="small_card">
                <i class="fa-solid fa-heart"></i>
            </div>
            <div class="menu_info">
                <h2>Chocolate Drink</h2>
                <p>
                    A luscious blend of rich cocoa and creamy milk, topped with whipped cream and chocolate shavings. A heavenly treat for chocolate lovers!
                </p>
                <h3>₹200.00</h3>
                <div class="menu_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
            </div>
        </div>

        <div class="menu_card">
            <div class="menu_image">
                <img src="image/pizza.jpg">
            </div>
            <div class="small_card">
                <i class="fa-solid fa-heart"></i>
            </div>
            <div class="menu_info">
                <h2>Pizza</h2>
                <p>
                    A classic pizza topped with gooey mozzarella, zesty tomato sauce, and your choice of fresh toppings, all baked to a crispy perfection. Ideal for sharing (or not)!
                </p>
                <h3>₹200.00</h3>
                <div class="menu_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
            </div>
        </div>

        <div class="menu_card">
            <div class="menu_image">
                <img src="image/Hot_dog.jpg">
            </div>
            <div class="small_card">
                <i class="fa-solid fa-heart"></i>
            </div>
            <div class="menu_info">
                <h2>Hot Dog</h2>
                <p>
                    A plump sausage grilled to perfection, served in a soft bun, and topped with mustard, ketchup, and fresh onions. A classic street food favorite!
                </p>
                <h3>₹200.00</h3>
                <div class="menu_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
            </div>
        </div>

        <div class="menu_card">
            <div class="menu_image">
                <img src="image/juse.jpg">
            </div>
            <div class="small_card">
                <i class="fa-solid fa-heart"></i>
            </div>
            <div class="menu_info">
                <h2>Juice</h2>
                <p>
                    A refreshing blend of fresh fruits, expertly squeezed to create a vibrant and nutritious drink. Perfect for quenching your thirst!
                </p>
                <h3>₹200.00</h3>
                <div class="menu_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
            </div>
        </div>

        <div class="menu_card">
            <div class="menu_image">
                <img src="image/biryani.webp">
            </div>
            <div class="small_card">
                <i class="fa-solid fa-heart"></i>
            </div>
            <div class="menu_info">
                <h2>Biryani</h2>
                <p>
                    Aromatic basmati rice layered with spiced meat, slow-cooked to perfection, and served with raita. A dish that promises a burst of flavors!
                </p>
                <h3>₹200.00</h3>
                <div class="menu_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
            </div>
        </div>

        <div class="menu_card">
            <div class="menu_image">
                <img src="image/chocolate.jpg">
            </div>
            <div class="small_card">
                <i class="fa-solid fa-heart"></i>
            </div>
            <div class="menu_info">
                <h2>Chocolate</h2>
                <p>
                    A decadent dessert made with rich chocolate, offering a blissful experience with each mouthful. The ultimate indulgence for chocolate lovers!
                </p>
                <h3>₹200.00</h3>
                <div class="menu_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
            </div>
        </div>

        <div class="menu_card">
            <div class="menu_image">
                <img src="image/ice_cream.jpg">
            </div>
            <div class="small_card">
                <i class="fa-solid fa-heart"></i>
            </div>
            <div class="menu_info">
                <h2>Ice Cream</h2>
                <p>
                    Creamy and smooth ice cream made with natural ingredients, available in a variety of flavors to satisfy your sweet tooth. A perfect treat for all ages!
                </p>
                <h3>₹200.00</h3>
                <div class="menu_icon">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
            </div>
        </div>
    </div>
</div>


    <!--Gallary-->

    <div class="gallary" id="Gallary">
        <h1>Our<span>Gallary</span></h1>

        <div class="gallary_image_box">
            <div class="gallary_image">
                <img src="image/indian thali.jpg">

                <h3>Food</h3>
                <p>
                    Maharashtrian food: a delicious blend of spices, tradition, and coastal flavors
                </p>
                
            </div>

            <div class="gallary_image">
                <img src="image/south.jpg">

                <h3>Food</h3>
                <p>
                    From idlis to dosas, South Indian
                    cuisine is a journey of taste
                </p>
                
            </div>

            <div class="gallary_image">
                <img src="image/punjabi.jpg">

                <h3>Food</h3>
                <p>
                    Golden, crispy, and comforting—parathas are happiness on a plate
                </p>
                
            </div>

            <div class="gallary_image">
                <img src="image/bengali.jpg">

                <h3>Food</h3>
                <p>
                    Bengali food: a celebration of flavors, from sweet to savory
                </p>
                
            </div>

            <div class="gallary_image">
                <img src="image/nonveg.jpg">

                <h3>Food</h3>
                <p>
                    Non-veg delights: where flavor meets passion
                </p>
                
            </div>

            <div class="gallary_image">
                <img src="image/gujarati.jpg">

                <h3>Food</h3>
                <p>
                    Dhokla: a fluffy bite of happiness from Gujarat.
                </p>
                
            </div>

        </div>

    </div>




    <!--Review-->

    <div class="review" id="Review">
        <h1>Customer<span>Review</span></h1>

        <div class="review_box">
            <div class="review_card">

                <div class="review_profile">
                    <img src="image/cv1.jpg">
                </div>

                <div class="review_text">
                    <h2 class="name">Neha Rathore</h2>

                    <div class="review_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>

                    <div class="review_social">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-linkedin-in"></i>
                    </div>

                    <p>
                        Service: "The service at Tastety Bites is excellent! The staff is polite and attentive,
                         going above and beyond to provide a wonderful eating experience". 

                        Food: "The food was absolutely delicious, especially the smoked salmon".  
                        Menu: "The menu offered a delightful array of dishes, each expertly crafted with fresh, high-quality ingredients". 
                    
                    </p>

                </div>

            </div>

            <div class="review_card">

                <div class="review_profile">
                    <img src="image/cv2.jpg">
                </div>

                <div class="review_text">
                    <h2 class="name">Rahul Deshmukh</h2>

                    <div class="review_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>

                    <div class="review_social">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-linkedin-in"></i>
                    </div>

                    <p>
                        "Food quality is really awesome, balanced spices less oily, overall best ever I have eaten" 

                        "Delicious food, and service is really praisable" 
                        "Food is of the best quality with fast service and friendly behavior" 
                        "It's a complete package, quantity, quality, taste, and price" 
                        "The food taste is ok but served cold" 
                    </p>

                </div>

            </div>

            <div class="review_card">

                <div class="review_profile">
                    <img src="image/cv3.jpg">
                </div>

                <div class="review_text">
                    <h2 class="name">Trupti Singh</h2>

                    <div class="review_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>

                    <div class="review_social">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-linkedin-in"></i>
                    </div>

                    <p>
                        "I’ve been dining at [Mess Name] for the past few months, and it has quickly become one of my favorite places to eat! The menu is diverse, 
                        offering a delightful mix of local and international dishes. Each meal is not only tasty but also nutritious.
                    </p>

                </div>

            </div>

            <div class="review_card">

                <div class="review_profile">
                    <img src="image/cv4.jpg">
                </div>

                <div class="review_text">
                    <h2 class="name">Rohit More</h2>

                    <div class="review_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>

                    <div class="review_social">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-linkedin-in"></i>
                    </div>

                    <p>
                        The food is consistently delicious, with a great variety that caters to different tastes.
                         I particularly love the themed dinner nights—they make dining here feel special!
                    </p>

                </div>

            </div>

        </div>

    </div>


    <!--Team-->

    <div class="team">
        <h1>Our<span>Team</span></h1>

        <div class="team_box">
            <div class="profile">
                <img src="image/shivani.jpeg">

                <div class="info">
                    <h2 class="name">Shivani Dhumal</h2>
                    

                    <div class="team_icon">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-instagram"></i>
                    </div>

                </div>

            </div>

            <div class="profile">
                <img src="image/payal.png">

                <div class="info">
                    <h2 class="name">Payal Dhongade</h2>
                   

                    <div class="team_icon">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-instagram"></i>
                    </div>

                </div>

            </div>

            <div class="profile">
                <img src="image/kalyani.jpeg">

                <div class="info">
                    <h2 class="name">Kalyani Ghophane</h2>
                    

                    <div class="team_icon">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-instagram"></i>
                    </div>

                </div>

            </div>

            <div class="profile">
                <img src="image/rutu.jpg">

                <div class="info">
                    <h2 class="name">Rutuja Jamdhade</h2>
                    <p class="bio">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

                    <div class="team_icon">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-instagram"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>



    <!--Footer-->

    <footer>
        <div class="footer_main">

            <div class="footer_tag">
                <h2>Location</h2>
                <p>Nashik</p>
                <p>Niphad</p>
                <p>Pune</p>
                <p>Munmbai</p>
                
            </div>

            <div class="footer_tag">
                <h2>Quick Link</h2>
                <p>Home</p>
                <p>About</p>
                <p>Menu</p>
                <p>Gallary</p>
                
            </div>

            <div class="footer_tag">
                <h2>Contact</h2>
                <p>+94 12 3456 789</p>
                <p>+94 25 5568456</p>
                <p>johndeo123@gmail.com</p>
                <p>foodshop123@gmail.com</p>
            </div>

            <div class="footer_tag">
                <h2>Our Service</h2>
                <p>Fast Delivery</p>
                <p>Easy Payments</p>
                <p>24 x 7 Service</p>
            </div>

            <div class="footer_tag">
                <h2>Follows</h2>
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-linkedin-in"></i>
            </div>

        </div>

        <p class="end">Design by<span><i class="fa-solid fa-face-grin"></i> WT Master Code</span></p>

    </footer>



    

  		</div>
  	</nav><br><br><br>
    <div class="container">
      <!-- LOGIN MODAL -->
      <div class="modal fade" id="login_modal">
        <div class="modal-dialog">
          <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Login Form</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <form action="" method="post">
            <div class="form-group">
              <label for="email">Email:</label>
              <input class="form-control" type="text" name="email" placeholder="Your Email" required>
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input class="form-control" type="password" name="password" placeholder="Your Password" required>
            </div>
            <button class="btn btn-primary" type="submit" name="login">Login</button><br>
          </form>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </div>
      </div>
    </div>
    <!-- Register Modal  -->
    <div class="modal fade" id="register_modal">
      <div class="modal-dialog">
        <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Registeration Form</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-group">
            <label for="name">First Name:</label>
            <input type="text" class="form-control" name="fname" placeholder="Enter First Name" id="fname" required="">
          </div>
          <div class="form-group">
            <label for="name">Last Name:</label>
            <input type="text" class="form-control" name="lname" placeholder="Enter Last Name" id="lname" required="">
          </div>
          <div class="form-group">
            <label for="name">Email ID:</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email ID" id="email" required="">
          </div>
          <div class="form-group">
            <label for="name">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password" id="password" required="">
          </div>
          <div class="form-group">
            <label for="name">Mobile No:</label>
            <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile No" id="mobile" required="">
          </div>
          <div class="form-group">
            <label>Address:</label>
            <textarea name="address" rows="4" cols="55" placeholder="Enter Address Here..." id="address"></textarea>
          </div>
          <button type="submit" class="btn btn-primary" name="register">Register</button>&nbsp;&nbsp;
          <button type="button" class="btn btn-danger" name="reset" onclick="resetData()" >Reset</button>
        </form>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  </div>
	<!-- Admin LOGIN MODAL -->
	<div class="modal fade" id="admin_login_modal">
		<div class="modal-dialog">
			<div class="modal-content">
		<!-- Modal Header -->
		<div class="modal-header">
			<h4 class="modal-title">Admin Login</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
		<!-- Modal body -->
		<div class="modal-body">
			<form action="" method="post">
				<div class="form-group">
					<label for="email">Email:</label>
					<input class="form-control" type="text" name="email" placeholder="Your Email" required>
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input class="form-control" type="password" name="password" placeholder="Your Password" required>
				</div>
				<button class="btn btn-primary" type="submit" name="admin_login">Login</button><br>
			</form>
		</div>
		<!-- Modal footer -->
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		</div>
		</div>
	</div>
</div>
</body>
</html>