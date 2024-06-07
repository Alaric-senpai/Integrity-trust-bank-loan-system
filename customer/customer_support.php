<?php
require '../client.php';
if(!isset($_SESSION['token'])){
    header("location: login.php");
    exit();
}
$token = $_SESSION['token'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer support</title>
    <?php require '../favicon.php'; ?>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/loan.css">
</head>
<body>
    <div class="container-full">
        <?php require './config/sidebar.php'; require 'invalid.php'; ?>
        <div class="content" id="content">
            <h1 class="p-3">Customer Support</h1>
           <div class="customer-support w-98 ">
                <div class="support text-bg-dark p-3 rounded-2 w-100">
                    <form action="" method="post w-100 text-bg-dark w-75">
                        <div class="mb-3 w-100">
                            <input type="text" name="fname" id="fname"text-bg-dark placeholder="Your full name" class="form-control  ">
                        </div>
                        <div class="mb-3 w-100">
                            <input type="email" name="email" id="email" placeholder="Your email here" class="form-control ">
                        </div>
                        <div class="mb-3 w-100">
                            <textarea name="message" id="message" placeholder="yout message here" class="form-control "></textarea>
                        </div>
                        <div class="mb-3 w-100 d-grid place-items-center">
                            <button type="submit" name="support" class="btn btn-primary w-50 ">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="address text-bg-dark p-3 rounded-2">
                    <h3>contact details</h3>
                    <div class="mb-3">
                        <h6>Official address</h6>
                        <p>123 Loan Street Nairobi</p>
                    </div>
                    <div class="mb-3">
                        <h6>Phone number</h6>
                        <p>+12345678901</p>
                    </div>
                    <div class="mb-3">
                        <h6>email address</h6>
                        <p>integritybank@gmail.com</p>
                    </div>
                </div>
           </div>
           <div id="map">

           </div>
        </div>
    </div>
    <script src="./js/script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
<script>
    function initMap() {
        // Replace the address with the one you want to show
        const address = <?php echo json_encode($address); ?>;
        
        // Geocode the address
        const geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'address': address }, function(results, status) {
            if (status === 'OK') {
                const map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 15,
                    center: results[0].geometry.location
                });
                const marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }
</script>

</body>
</html>