
<?php
 session_start();
 include_once "db_connection.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UgaTours - Tour Packages</title>
    <link rel="stylesheet" href="tour-packages.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

</head>
<body>
    <?php
    include_once "nav.php";
    ?>

    <main>
    <aside>
    <div class="carousel">
        <div class="carousel-images">
            <img src="./photos/giraffe.jpg" alt="Giraffe" class="park-img">
            <img src="./photos/murchison-falls.jpg" alt="Murchison Falls" class="park-img">
            <img src="./photos/elephants.jpg" alt="Elephants" class="park-img">
            <img src="./photos/museum.jpg" alt="Museum" class="park-img">
            <img src="./photos/flavia.jpg" alt="Flavia" class="park-img">
            <img src="./photos/tourists.jpg" alt="Tourists" class="park-img">
            <img src="./photos/adventure.jpg" alt="Flavia" class="park-img">
        </div>
        <button class="carousel-btn prev" onclick="moveSlide(-1)">&#10094;</button>
        <button class="carousel-btn next" onclick="moveSlide(1)">&#10095;</button>
    </div>

    
</aside>
        <section class="tour-packages">
            <h2>Tour Packages</h2>

            <?php
           
            // Fetch tour packages
            $sql = "SELECT * FROM tours";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<div class="package">';
                    echo '<h3>' . htmlspecialchars($row["name"]) . '</h3>';
                    echo '<p>- ' . htmlspecialchars($row["description"]) . '</p>';
                    echo '<p>- Duration: ' . htmlspecialchars($row["duration"]) . ' @Ugx ' . number_format($row["price"]) . '</p>';
                    echo '<button class="book-btn" onclick="openBookingForm(\'' . htmlspecialchars($row["name"]) . '\', ' . $row["tour_id"] . ')">Book now</button>';
                    echo '</div>';
                }
            } else {
                echo "No tour packages available.";
            }

            $conn->close();
            ?>

        </section>
        <div class="activities">
        <h3><a>Tourist Activities</a></h3>
        <ul>
            <li>Zip lining</li>
            <li>Bird watching</li>
            <li>Camping</li>
            <li>Game Drive</li>
        </ul>
    </div>
     

    </main>

    <footer>
        <p>&copy; 2024 UgaTours. All rights reserved.</p>
    </footer>

    <div id="bookingForm" style="display:none;">
    <form id="bookingDetailsForm" method="POST" action="process_booking.php">
        <h2>Booking Details</h2>
        <input type="hidden" id="tourId" name="tour_id">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Your Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="button" onclick="confirmBooking()">Confirm Booking</button>
        <button type="button" onclick="closeBookingForm()">Cancel</button>
    </form>
</div>


    <script>
 function confirmBooking() {
    // Show SweetAlert confirmation dialog
    Swal.fire({
        title: 'Confirm Booking',
        text: "Are you sure you want to confirm this booking?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // If confirmed, submit the form
            document.getElementById('bookingDetailsForm').submit();
        }
    });
}
function confirmBooking() {
    // Show SweetAlert confirmation dialog
    Swal.fire({
        title: 'Confirm Booking',
        text: "Are you sure you want to confirm this booking?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // If confirmed, submit the form
            document.getElementById('bookingDetailsForm').submit();
        }
    });
}
function openBookingForm(tourName, tourId) {
    fetch('loggedin.php')
        .then(response => response.json())
        .then(data => {
            if (data.isLoggedIn) {
                // Show SweetAlert confirmation dialog
                Swal.fire({
                    title: 'Confirm Booking',
                    text: "Are you sure you want to confirm this booking for " + tourName + "?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Confirm',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If confirmed, submit the booking with the tour ID and user info
                        document.getElementById('tourId').value = tourId;
                        document.getElementById('bookingDetailsForm').submit(); 
                        
                       
                        // Ensure this form is still in the DOM
                    }
                });
            } else {
                alert("Log in to proceed");
                window.location.href = "login.html";
            }
        })
        .catch(error => console.error('Error:', error));
}

function closeBookingForm() {
    document.getElementById('bookingForm').style.display = 'none';
}
let currentSlide = 0;
const autoScrollInterval = 3000; // Change slide every 3 seconds
const images = document.querySelectorAll('.carousel-images img');
const totalSlides = images.length;

function moveSlide(direction) {
    currentSlide += direction;

    // Wrap around if out of bounds
    if (currentSlide < 0) {
        currentSlide = totalSlides - 1; // Go to last slide
    } else if (currentSlide >= totalSlides) {
        currentSlide = 0; // Go to first slide
    }

    // Move the carousel
    const offset = -currentSlide * 100; // Each slide takes 100% width
    document.querySelector('.carousel-images').style.transform = `translateX(${offset}%)`;
}

// Automatic scrolling functionality
setInterval(() => {
    moveSlide(1); // Move to the next slide
}, autoScrollInterval);

// Initialize carousel by moving to the first slide
moveSlide(0);

    </script>
</body>
</html>
