<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $mobilenum = $_POST["mobilenum"];
    $carmodel = $_POST["carmodel"];
    $selectedLocation = $_POST["selectlocation"];  // Assuming you have a location input in your form

    // Define an array of email addresses based on the selected location
    $locationEmails = [
        "Chennai" => "prismadverto.tn@gmail.com",
        "Coimbatore" => "isuzuindia.it@gmail.com",
        "Madurai" => "digital.prismadverto@gmail.com",

        // Add more locations and corresponding email addresses as needed
    ];

    // Set the recipient based on the selected location
    $to = $locationEmails[$selectedLocation] ?? "";

    // Set up sender
    $headers = "From: $email\r\n";

    // Email content
    $email_message = "Name: $firstname $lastname\nEmail: $email\nMobile Number: $mobilenum\nCar Model:$carmodel\nLocation: $selectedLocation\n\n$message";

    // Send email
    $mail_sent = mail($to, $subject, $email_message, $headers);

    if ($mail_sent) {
        echo "Thank you for submitting form";
    } else {
        echo "Error sending enquiry.";
    }
}
?>
