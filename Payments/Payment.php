<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Payment</title>
    <link rel="stylesheet" href="payment_style.css">
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="../Home/images/favicon.png">
    <script>
        function calculateAmount() {
            var eventType = document.getElementById("event").value;
            var numHours = document.getElementById("hours").value;

            var basePrice = 30000; 
            var multiplier = 1;

            switch (eventType) {
                case 'convention_wo_exhib':
                case 'convention_w_exhib':
                    multiplier = 1.5;
                    break;
                case 'tradefair_exhib':
                    multiplier = 2;
                    break;
                case 'grad':
                    multiplier = 1.2;
                    break;
                case 'meeting':
                    multiplier = 1.1;
                    break;
                case 'spec_event':
                    multiplier = 1.8;
                    break;
                default:
                    multiplier = 1;
                    break;
            }

            var totalAmount = basePrice * multiplier * numHours;
            document.getElementById("amount").value = totalAmount.toFixed(2);
        }

        function updatePaymentMethod() {
            var paymentMethod = document.getElementById("payment_method").value;
            var creditCardDiv = document.getElementById("credit_card_input");
            var gcashDiv = document.getElementById("gcash_input");
            var bankTransferDiv = document.getElementById("bank_transfer_input");

            // Hide all payment method specific inputs
            creditCardDiv.style.display = "none";
            gcashDiv.style.display = "none";
            bankTransferDiv.style.display = "none";

            // Show the selected payment method's inputs
            if (paymentMethod === "credit_card" || paymentMethod === "debit_card") {
                creditCardDiv.style.display = "block";
            } else if (paymentMethod === "gcash") {
                gcashDiv.style.display = "block";
            } else if (paymentMethod === "bank_transfer") {
                bankTransferDiv.style.display = "block";
            }
        }

        // Function to set min and max date for event_date and payment_date inputs
        function setupDateInputs() {
            var today = new Date();
            var minPreferredDate = new Date(today);
            minPreferredDate.setDate(minPreferredDate.getDate() + 7); 

            var maxPreferredDate = new Date(today);
            maxPreferredDate.setMonth(maxPreferredDate.getMonth() + 12); 

            var minPaymentDate = new Date(today);
            minPaymentDate.setDate(minPaymentDate.getDate()); 

            var maxPaymentDate = new Date(today);
            maxPaymentDate.setMonth(maxPaymentDate.getMonth() + 3); 

            var eventDateInput = document.getElementById("event_date");
            eventDateInput.min = formatDate(minPreferredDate);
            eventDateInput.max = formatDate(maxPreferredDate);

            var paymentDateInput = document.getElementById("payment_date");
            paymentDateInput.min = formatDate(minPaymentDate);
            paymentDateInput.max = formatDate(maxPaymentDate);
        }

        // Helper function to format date as YYYY-MM-DD for input[type="date"]
        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;

            return [year, month, day].join('-');
        }

        // Call setupDateInputs function on page load
        window.onload = function() {
            setupDateInputs();
        };

        function selectVenueOption(radioButtonId) {
    // Get the radio button element by its ID
    var radioButton = document.getElementById(radioButtonId);

    // Check if the radio button exists and is not already checked
    if (radioButton && !radioButton.checked) {
        // Set the radio button to be checked
        radioButton.checked = true;
    }
    
}
    </script>
</head>

<style>
    /* Navigation styles */
#main-nav {
    position: fixed;
    text-align: right;
    top: 0;
    display: flex;
    justify-content: space-between;
    width: 100%;
    line-height: 100px;
    z-index: 100;
    padding: 0 20px;
    transition: 0.4s;
}

#main-nav a {
    float: right;
    color: rgb(33, 33, 33);
    text-align: right;
    padding: 0px;
    text-decoration: none;
    font-size: 14px;
    line-height: 15px;
    border-radius: 8px;
    margin-right: 30px;
}

#nav-logo {
    float: left;
    margin-left: 25px;
}

.nav-menu {
    float: right;
    padding: 8px 10px;
    margin-right: 20px;
    color: black;
}

.nav-menu li {
    position: relative;
    display: inline-block;
}

.nav-menu li:hover {
    text-decoration: underline;
}

.nav-menu a.active {
    text-decoration: underline;
}

.nav-menu ul {
    text-align: right;
    display: flex;
    list-style-type: none;
    gap: 20px;
}

.nav-menu ul li {
    position: relative;
    text-align: right;
}

.nav-menu .dropdown {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background: rgba(255, 255, 255, 0.8);
    min-width: 150px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: max-height 0.3s ease-out;
    overflow: hidden;
    z-index: 1;
    max-height: 10px;
    padding: 0;
    margin: 0;
}

.nav-menu .dropdown a {
    display: block;
    padding: 1px;
    text-align: center;
    text-decoration: none;
}

.nav-menu ul li:hover .dropdown {
    display: block;
    max-height: 290px;
    text-decoration: underline;
    padding: 0;
    margin: 0;
}

.nav-menu-btn {
    display: none;
}

@media screen and (max-width: 786px) {
    .nav-menu-btn {
        display: block;
    }

    .nav-menu-btn i {
        font-size: 30px;
        color: #473535;
        padding: 10px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 5px 5px 5px;
        cursor: pointer;
        transition: .3s;
        margin-right: 20px;
    }

    .nav-menu-btn i:hover {
        background: rgba(255, 255, 255, 0.15);
    }

    #main-nav {
        padding: 8px 10px !important;
    }

    .nav-menu.responsive {
        background: linear-gradient(white, transparent);
        top: 100px;
        text-align: center;
    }

    .nav-menu {
        text-align: center;
        position: absolute;
        top: -800px;
        width: 100%;
        height: 90vh;
        transition: 0.3s;
        display: flex;
    }
    .nav-menu ul {
        flex-direction: column;
    }
    .nav-menu.active {
        display: block;
    }
    .nav-menu ul li .dropdown {
        display: none;
        position: bottom;
        top: 100%;
        left: 0;
        background: rgba(255, 255, 255, 0.8);
        padding: 5px 10px;
        min-width: 150px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: max-height 0.3s ease-out;
        max-height: 0;
        overflow: hidden;
    }
    
    .nav-menu ul li .dropdown li {
        margin: 0 0 10px;
    }
    
    .nav-menu ul li .dropdown li a {
        color: #000;
        padding: 5px 14px;
        text-decoration: none;
        display: block;
        white-space: nowrap;
    }
    
    .nav-menu ul li .dropdown li a:hover {
        text-align: center;
        background: rgba(0, 0, 0, 0.1);
    }
    
    .nav-menu ul li:hover .dropdown {
        display: block;
        max-height: 300px;
    }

    .works-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
        padding: 0 50px;
    }
}

.profile-pic{
    width: 50px; 
    height: 50px;
    border-radius: 50%;
    cursor: pointer;
    margin-top: 30px;
}
.sub-menu-wrap{
    position: absolute;
    top: 100%;
    right: 10%;
    width: 320px;
    max-height: 0px;
    overflow: hidden;
    transition: max-height 0.5s;
}
.sub-menu-wrap.open-menu{
    max-height: 800px;
}
.sub-menu{
    background: #fff;
    padding: 20px;
    margin: 10px;
}
.user-info{
    display: flex;
    align-items: center;
}
.user-info h3{
    font-weight: 500;
}
.user-info img{
    width: 60px;
    border-radius: 50%;
    margin-right: 15px;
}
.sub-menu hr{
    border: 0;
    height: 1px;
    width: 100%;
    background: #ccc;
    margin: 15px 0 10px;
}
.sub-menu-link{
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #525252;
    margin: 12px 0;
}
.sub-menu-link p{
    width: 100%;
}
.sub-menu-link img{
    width: 40px;
    background: #e5e5e5;
    border-radius: 50%;
    padding: 8px;
    margin-right: 15px;
}
.sub-menu-link span{
    font-size: 22px;
    transition: transform 0.5s;
}
.sub-menu-link:hover span{
    transform: translateX(5px);
}
.sub-menu-link:hover p{
   font-weight: 600;
}
.hide {
    display: none;
}
</style>

<body>

    <!-- Navigation panel -->
    <nav id="main-nav">
        <!-- Logo -->
        <div id="nav-logo">
            <a href="../Home/index.php" class="logo">
                <img src="../Home/images/header-logo.png" alt="Company logo" width="110">
            </a>
        </div>

        <!-- Nav Menu -->
        <div class="nav-menu" id="navMenu" style="font-family: Hammersmith One, Arial, sans-serif;">
            <ul>
                <li><a href="../Home/index.php">Home</a></li>
                <li><a href="#" class="link">Venues</a>
                    <ul class="dropdown">
                        <li><a href="../Venue-1/Venue-1.php">Brooklyn Botanic Garden</a></li>
                        <li><a href="../Venue-2/Venue-2.php">Lotte Hotel</a></li>
                        <li><a href="../Venue-3/Venue-3.html">Verdant Haven</a></li>
                    </ul>
                </li>
                <li><a href="../Payments/Payment.php" class="link">Reserve Now</a></li>
                <?php if (!isset($_SESSION['user_id'])) : ?>
                    <li><a href="../Profile/logging.php" class="link">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <!-- Mobile Menu Button -->
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="menuFunction()">=</i>
        </div>
        <!-- End Main Menu -->
    </nav>

    <!-- End Navigation panel -->


    <?php if (isset($_SESSION['user_id'])) : ?>
        <div class="ayokona" style="position: fixed; right: 60px; top: 40px; margin-top: 0;">
            <img src="../Profile/images/user.png" class="profile-pic" id="top-profile" onclick="toggleMenu()">
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="../Profile/images/user.png">
                        <h3 style="font-family: 'Poppins', sans-serif;"><?php echo htmlspecialchars($_SESSION['username']); ?></h3>
                    </div>
                    <hr>
                    <a href="../Profile/profile.php" class="sub-menu-link">
                        <img src="../Profile/images/profile.png">
                        <p style="font-family: 'Poppins', sans-serif; text-align: left;">Edit Profile</p>
                        <span>></span>
                    </a>
                    <a href="../Profile/logout.php" class="sub-menu-link">
                        <img src="../Profile/images/logout.png">
                        <p style="font-family: 'Poppins', sans-serif; text-align: left;">Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <div class="container" >
        <div class="event_box" style="margin-top: 50px;">
            <h3>Plan your event</h3>
            <form action="process_payment.php" method="post">
                <div class="row">
                    <div class="col">
                        <div class="input">
                            <label>Event Name<br></label>
                            <input type="text" name="event_name" placeholder="Event Name" required>
                        </div>
                        <div class="input">
                            <label>Preferred Date<br></label>
                            <input type="date" name="event_date" id="event_date" placeholder="" required>
                        </div>
                        <div class="input">
                            <label>Preferred Time<br></label>
                            <input type="time" name="event_time" id="event_time" placeholder="" required>
                        </div>
                        <table>
                            <tr>
                                <td>
                                    <div class="input">
                                        <label>Event Type<br></label>
                                        <div class="dropdown">
                                            <select name="event_type" id="event" class="dropdown-select" onchange="calculateAmount()" required>
                                                <option value="" disabled selected>Select Event Type</option>
                                                <option value="convention_wo_exhib">Convention without Exhibition</option>
                                                <option value="convention_w_exhib">Convention with Exhibition</option>
                                                <option value="tradefair_exhib">Trade Fair / Exhibition</option>
                                                <option value="grad">Graduation</option>
                                                <option value="meeting">Meeting</option>
                                                <option value="spec_event">Special Event</option>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="input">
                                        <label>Number of Hours<br></label>
                                        <div class="dropdown">
                                            <select name="num_hours" id="hours" class="dropdown-select" onchange="calculateAmount()" required>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="input">
                            <label for="">Choose Venue</label>
                            <div class="venue-option" onclick="selectVenueOption('venue1_radio')">
                                <input type="radio" id="venue1_radio" name="venue_id" value="1" />
                                Brooklyn Botanic Garden<br>
                                <img src="../Venue-1/img/event1pic1.jpg" alt="Venue 1" class="venue-image">
                            </div>
                            <div class="venue-option" onclick="selectVenueOption('venue2_radio')">
                                <input type="radio" id="venue2_radio" name="venue_id" value="2" />
                                Lotte Hotel<br>
                                <img src="../Venue-2/img/img2-02.jpg" alt="Venue 2" class="venue-image">
                            </div>
                            <div class="venue-option" onclick="selectVenueOption('venue3_radio')">
                                <input type="radio" id="venue3_radio" name="venue_id" value="3" />
                                Verdant Haven<br>
                                <img src="../Venue-3/img/Venue-bg-1.jpg" alt="Venue 3" class="venue-image">
                            </div>
                        </div>
                        <h3>Client Information</h3>
                        <table>
                            <tr>
                                <td>
                                    <div class="input">
                                        <label>Name<br></label>
                                        <input type="text" name="client_name" placeholder="" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input">
                                        <label>Email Address<br></label>
                                        <input type="email" name="email" placeholder="" required>
                                    </div>
                                </td>
                                <td>
                                    <div class="input">
                                        <label>Contact Number<br></label>
                                        <input type="tel" name="contact_number" placeholder="" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input">
                                        <label>Organization Name<br></label>
                                        <input type="text" name="organization_name" placeholder="" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="input">
                                        <label>Organization Address<br></label>
                                        <input type="text" name="organization_address" placeholder="" required>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

        </div>
        <div class="summary_box" style="margin-top: 50px;">
            <h3>Payment Information</h3>
            <div class="input">
                <label>Amount to Pay<br></label>
                <input type="text" id="amount" name="amount" readonly>
            </div>
            <div class="input">
                <label>Payment Date<br></label>
                <input type="date" name="payment_date" id="payment_date" required>
            </div>
            <div class="input">
                <label>Payment Method<br></label>
                <div class="dropdown">
                    <select name="payment_method" id="payment_method" class="dropdown-select" onchange="updatePaymentMethod()" required>
                        <option value="" disabled selected>Select Payment Method</option>
                        <option value="credit_card">Credit Card</option>
                        <option value="debit_card">Debit Card</option>
                        <option value="gcash">Gcash</option>
                        <option value="bank_transfer">Bank Transfer</option>
                    </select>
                </div>
            </div>
            <div id="credit_card_input" class="payment-input" style="display: none;">
                <label for="ccn">Credit Card Number:</label>
                <input id="ccn" type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" 
                       autocomplete="cc-number" maxlength="19" 
                       placeholder="xxxx xxxx xxxx xxxx">
            </div>
            <div id="gcash_input" class="payment-input" style="display: none;">
                <label for="gcash_number">Gcash Number:</label>
                <input id="gcash_number" type="text" name="gcash_number" placeholder="Gcash Number">
            </div>
            <div id="bank_transfer_input" class="payment-input" style="display: none;">
                <label for="bank_account">Bank Account Number:</label>
                <input id="bank_account" type="text" name="bank_account" placeholder="Bank Account Number">
            </div>
            <button type="submit" style="margin-top: 20px;">Submit Payment</button>
        </div>
        </form>
    </div>
    <script>
        // Ensure setupDateInputs is called after the document is fully loaded
        document.addEventListener('DOMContentLoaded', function () {
            setupDateInputs();
        });
        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }
        window.addEventListener('scroll', function() {
            var profilePic = document.getElementById('top-profile');
            if (window.scrollY > 0) {
                profilePic.classList.add('hide');
            } else {
                profilePic.classList.remove('hide');
            }
        });
    </script>
    <script src="../Home/all.js"></script>
</body>
</html>
