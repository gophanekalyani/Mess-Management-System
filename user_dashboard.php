<?php
  include('includes/header.php');
  if(isset($_SESSION['email'])){
    include('includes/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mess Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style2.css">

    <!-- Bootstrap CSS for Modals and Buttons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

    <!-- Navbar Section -->
    <header>
        <div class="navbar">
            <div class="logo">
                <img src="images/logo.jpg" alt="Logo">
                <h1>Food<span class="highlight">Corner</span></h1>
            </div>
            <nav>
                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Menu</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li><a href="#">Review</a></li>
                    <li><a href="#">Order</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Dashboard Section -->
    <section class="dashboard">
        <div class="container">
            <h2 class="section-title">Your Mess Dashboard</h2>
            
            <div class="dashboard-cards">
                <!-- Today's Order -->
                <div class="order-card">
                    <h3>Today's Order</h3>
                    <?php
                      $today = date("l");
                      $query = "select * from menu where day='$today'";
                      $query_run = mysqli_query($connection, $query);
                      while($row = mysqli_fetch_assoc($query_run)){
                    ?>
                    <ul>
                    <li>Breakfast: Scrambled eggs, toast, and coffee</li>
                        <li>Lunch: Chicken curry, rice, and salad</li>
                        <li>Dinner: Grilled fish, mashed potatoes, and veggies</li>

                    </ul>
                    <?php } ?>
                </div>

                <!-- Tomorrow's Order -->
                <div class="order-card">
                    <h3>Tomorrow's Order</h3>
                    <?php
                      $tomorrow = date("l", strtotime('+1 day'));
                      $query = "select * from menu where day='$tomorrow'";
                      $query_run = mysqli_query($connection, $query);
                      while($row = mysqli_fetch_assoc($query_run)){
                    ?>
                    <ul>
                    <li>Breakfast: Oatmeal, fruits, and juice</li>
                        <li>Lunch: Veggie stir-fry, noodles, and soup</li>
                        <li>Dinner: Paneer tikka, naan, and dessert</li>
                    </ul>
                    <?php } ?>
                </div>
            </div>

            <!-- Notifications Section -->
            <div class="notifications">
                <h3>Important Notifications</h3>
                <ul>
                    <marquee direction="up" scrollamount="2">
                        <li>Please always wear a mask and sanitize your hands.</li>
                        <li>Always maintain social distance.</li>
                        <li>Give your valuable feedback to improve our service.</li>
                    </marquee>
                </ul>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <a href="edit_profile.php" class="btn btn-warning">Edit Profile</a>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fee_status_modal">View Fee Status</button>
                <a href="feedback.php" class="btn btn-danger">Submit Feedback</a>
            </div>
        </div>
    </section>

    <!-- Fee Status Modal -->
    <div class="modal fade" id="fee_status_modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Your Fee Status</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal Body -->
          <div class="modal-body">
            <?php
              $query = "select fee_status from users where sno = $_SESSION[uid]";
              $query_run = mysqli_query($connection,$query);
              while($row = mysqli_fetch_assoc($query_run)){
                if($row['fee_status'] == 1){
                  echo "<p>Your fee is paid successfully.</p>";
                } else {
                  echo "<p>Your fee is still due.</p>";
                }
              }
            ?>
          </div>
          <!-- Modal Footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Weekly Meal Modal -->
    <div class="modal fade" id="meal_modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Full Week Menu</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal Body -->
          <div class="modal-body">
            <?php
              $query = "select * from menu";
              $query_run = mysqli_query($connection,$query);
              while($row = mysqli_fetch_assoc($query_run)){
                echo "<h4>" . $row['day'] . "</h4>";
                echo "<p>Breakfast: " . $row['meal1'] . "<br>";
                echo "Lunch: " . $row['meal2'] . "<br>";
                echo "Dinner: " . $row['meal4'] . "</p>";
              }
            ?>
          </div>
          <!-- Modal Footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

            <!-- -->
    <div id="wrapper">    

        <nav>
            <!-- Navigation content goes here -->
        </nav>

       <!--  <div class="container"> 
            <p class="text py-4 mb-3 fs-3 text-center">Let's find something tasty</p>          
       </div>  -->

        <div class="container mb-5">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Breakfast
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="images/tea.webp" class="card-img-top" alt="Food Photo">
                                        <div class="card-body">
                                            <h5 class="card-title">Tea</h5>
                                            <p class="card-text">A warm and comforting beverage to start your day.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="images/coffee.jpg" class="card-img-top" alt="Food Photo">
                                        <div class="card-body">
                                            <h5 class="card-title">Coffee</h5>
                                            <p class="card-text">The perfect pick-me-up with a rich and bold flavor</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="images/paratha.jpg" class="card-img-top" alt="Food Photo">
                                        <div class="card-body">
                                            <h5 class="card-title">Paratha</h5>
                                            <p class="card-text">Flaky, buttery, and delicious Indian flatbread.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="images/idli-sambhar.jpg" class="card-img-top" alt="Food Photo">
                                        <div class="card-body">
                                            <h5 class="card-title">Idli Sambar</h5>
                                            <p class="card-text">A comforting South Indian staple with fluffy idlis.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="images/upma.jpg" class="card-img-top" alt="Food Photo">
                                        <div class="card-body">
                                            <h5 class="card-title">Upma</h5>
                                            <p class="card-text">A savory and satisfying Indian breakfast dish.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Lunch
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="images/chhole-bhature.jpg" class="card-img-top" alt="Food Photo">
                                        <div class="card-body">
                                            <h5 class="card-title">Chole Bhature</h5>
                                            <p class="card-text">A classic North Indian dish with fluffy bhature and spicy chole.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="images/gulab-jamun.jpg" class="card-img-top" alt="Food Photo">
                                        <div class="card-body">
                                            <h5 class="card-title">Gulab Jamun</h5>
                                            <p class="card-text">Fried dough balls soaked in sweet syrup.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="images/panner.jpg" class="card-img-top" alt="Food Photo">
                                        <div class="card-body">
                                            <h5 class="card-title">Paneer Tikka Masala</h5>
                                            <p class="card-text">A popular Indian vegetarian dish with grilled paneer cheese in a creamy spiced tomato sauce.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="images/roti.jpg" class="card-img-top" alt="Food Photo">
                                        <div class="card-body">
                                            <h5 class="card-title">Butter Roti</h5>
                                            <p class="card-text">A simple and delicious Indian flatbread with buttery goodness.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="images/rice.jfif" class="card-img-top" alt="Food Photo">
                                        <div class="card-body">
                                            <h5 class="card-title">Jeera Rice</h5>
                                            <p class="card-text">Basmati rice cooked with cumin seeds for a flavorful twist.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="images/dal.jpg" class="card-img-top" alt="Food Photo">
                                        <div class="card-body">
                                            <h5 class="card-title">Dal Tadka</h5>
                                            <p class="card-text">A comforting and nutritious lentil-based dish.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="images/chhas.jpeg" class="card-img-top" alt="Food Photo">
                                        <div class="card-body">
                                            <h5 class="card-title">Chhas</h5>
                                            <p class="card-text">A refreshing and healthy yogurt-based drink.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Dinner
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="images/papad.jpg" class="card-img-top" alt="Food Photo">
                                        <div class="card-body">
                                            <h5 class="card-title">Masala Papad</h5>
                                            <p class="card-text">A crispy and crunchy Indian appetizer.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="images/bhaji.jpg" class="card-img-top" alt="Food Photo">
                                        <div class="card-body">
                                            <h5 class="card-title">Bhaji-Paw</h5>
                                            <p class="card-text">A popular Indian street food with spicy vegetable bhaji and soft buttered pav.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="images/pulav.jpg" class="card-img-top" alt="Food Photo">
                                        <div class="card-body">
                                            <h5 class="card-title">Pulav</h5>
                                            <p class="card-text">A fragrant and flavorful rice dish with vegetables and spices.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="images/kadhi.webp" class="card-img-top" alt="Food Photo">
                                        <div class="card-body">
                                            <h5 class="card-title">Kadhi</h5>
                                            <p class="card-text">A tangy and creamy yogurt-based curry with pakoras.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="images/chhas.jpeg" class="card-img-top" alt="Food Photo">
                                        <div class="card-body">
                                            <h5 class="card-title">Chhas</h5>
                                            <p class="card-text">A refreshing and healthy yogurt-based drink.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <!-- Footer content goes here -->
        </footer>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
<?php
} else {
  header('location:index.php');
}
?>
