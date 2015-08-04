<?php if(isset($_POST['bk_booking'])){
    $email = htmlspecialchars($_POST["bk_email"]);
    $first_name = htmlspecialchars($_POST["bk_first_name"]);
    $sure_name = htmlspecialchars($_POST["bk_sure_name"]);
    $country = htmlspecialchars($_POST["bk_country"]);
    $address = htmlspecialchars($_POST["bk_address"]);
    $phone = htmlspecialchars($_POST["bk_phone"]);
    $date = htmlspecialchars($_POST["bk_date"]);
    $adults = htmlspecialchars($_POST["bk_adults"]);
    $message = htmlspecialchars($_POST["bk_message"]);

    $myemail = get_option('admin_email');

    $blog = get_bloginfo('name');

    $subject = 'New booking message from ' . $blog;

    $message_to_myemail = "Sent a new text message about traveling!

    First name: $first_name

    Sure name: $sure_name

    E-mail: $email

    Country: $country

    Address: $address

    Phone: $phone

    Date: $date

    Adults: $adults

    Message: $message

    ";

    $from  = "From: $email \r\n Reply-To: $email \r\n";
    wp_mail($myemail, $subject, $message_to_myemail, $from);
} ?>