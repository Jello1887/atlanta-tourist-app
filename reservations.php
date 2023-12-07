<?php
require 'includes/header.php';
$attraction = isset($_GET['attraction']) ? $_GET['attraction'] : 'default';
$attraction = htmlspecialchars($attraction);
?>
<body>
    <main>
        <section>
            <h1 style="text-align: center;">Make Your Reservation For <?php echo htmlspecialchars($attraction); ?></h1>
            <div id="resFormWrap">
                <form id="reservationForm" method="POST">
                    
                    <input type="hidden" name="attraction" value="<?php echo $attraction; ?>">

                    <label for="firstName">First Name:</label>
                    <input type="text" id="firstName" name="firstName" required><br>

                    <label for="lastName">Last Name:</label>
                    <input type="text" id="lastName" name="lastName" required><br>

                    <label for="streetAddress">Street Address:</label>
                    <input type="text" id="streetAddress" name="streetAddress"><br>

                    <label for="city">City:</label>
                    <input type="text" id="city" name="city"><br>

                    <label for="state">State:</label>
                    <select name="state" id="state">
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                    </select><br>

                    <label for="zipcode">Zipcode:</label>
                    <input type="text" id="zipcode" name="zipcode"><br>

                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" required><br>

                    <label for="phoneNumber">Phone Number:</label>
                    <input type="text" id="phoneNumber" name="phoneNumber"><br>

                    <label for="age">Age:</label>
                    <select id="age" name="age">
                        <option value="Under 18">Under 18</option>
                        <option value="18-25">18-25</option>
                        <option value="26-35">26-35</option>
                        <option value="36-45">36-45</option>
                        <option value="46-55">46-55</option>
                        <option value="56+">56+</option>
                    </select><br>

                    <label for="reservationDate">Date of Reservation:</label>
                    <input type="date" id="reservationDate" name="reservationDate"><br>

                    <label for="totalGuests">Total Number of Guests:</label>
                    <input type="number" id="totalGuests" name="totalGuests"><br>

                    <label for="comments">Comments:</label>
                    <textarea id="comments" name="comments"></textarea><br>

                    <button type="submit">Submit</button>
                </form>
            </div>
            <div id="confirmationMessage"></div>
        </section>
    </main>
    <script>
document.getElementById('reservationForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var formData = new FormData(this);
    fetch('process-reservations.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json()) 
    .then(data => {
        // Check if there are any errors
        if (data.errors) {
            // Handle errors (e.g., displaying them to the user)
        } else {
            // Update the confirmation message
            var confirmationMessage = document.getElementById('confirmationMessage');
            confirmationMessage.innerText = data.message;

            // Apply styles to show and animate the confirmation message
            confirmationMessage.style.display = 'block';
            confirmationMessage.style.opacity = '1';
            confirmationMessage.style.transform = 'translateY(0)';
            
            // Hide the form
            document.getElementById('resFormWrap').style.display = 'none';
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

    </script>
    <?php
require 'includes/footer.php';
?>