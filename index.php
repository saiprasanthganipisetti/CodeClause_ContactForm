<html>
    <head>
        <title>Contact Form</title>
        <link rel = "stylesheet" href= "style.css">
        <script src="https://www.google.com/recaptcha/api.js"></script>
    </head>
    <body>
        <div class="contact-form">
            <h2>Contact Us</h2>
            <form method= "post" action="">
                <input type="text" name = "name" placeholder = "Enter your name" required>
                <input type="text" name = "phone" placeholder = "Enter your Mobile Number" required>
                <input type="email" name = "email" placeholder = "Enter your email" required>
                <input type = "text" name = "country" placeholder = "select your country" required>
                <textarea name="message" id="" cols="30" rows="10" placeholder = "Enter your message"></textarea>
                <div class="g-recaptcha" data-sitekey="6LfXLUElAAAAAP60rhQ6LCTx_u4JgK4HV-3niKnJ"></div>
                <input class = "submit-btn" type="submit" name = "submit" value = "Send Message">
            </form>
            <div class = "status">
                <?php
                    if(isset($_POST['submit'])){
                        $username = $_POST['name'];
                        $phone = $_POST['phone'];
                        $email = $_POST['email'];
                        $country = $_POST['country'];
                        $message = $_POST['message'];

                        $email_from = 'saiprasanth1976@gmail.com';
                        $email_subject = 'New Contact form submission';
                        $email_body = "Name : $username.\n".
                                      "Phone No : $phone.\n". 
                                      "Email Id : $email.\n". 
                                      "From : $country.\n". 
                                      "Messaga : $message.\n";
                        
                        $to_email = "20pa1a0541@vishnu.edu.in";
                        // $headers = "From : $email_from \r\n";
                        // $headers = "Reply-To: $email\r\n";

                        $secretKey = "6LfXLUElAAAAALru7jaRHEnnaXPw7qu0mt-efc9-";
                        $responseKey = $_POST['g-recaptcha-response'];
                        $userIP = $_SERVER['REMOTE_ADDR'];
                        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
                        $response = file_get_contents($url);
                        $response = json_decode($response);
                        
                        if($response->success)
                        {
                            echo "Message sent successfully!";
                        }
                        else
                        {
                            echo "<span>Invalid Captcha, Please Try Again</span>";
                        }
                    }
                ?>
            </div>
        </div>
    </body>
    
</html>