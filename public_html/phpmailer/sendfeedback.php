<?php
    include "../connection.php";

    if(!isset($_POST['submit'])) {
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $to = '#';
        $name = $_POST['name'];
        $mailheader = "MIME-Version: 1.0" . "\r\n";
        $mailheader .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $mailheader .= 'From: '.$name.'<'.$email.'>'. "\r\n";

        if(!empty($mail) && !empty($name) && !empty($subject) && !empty($message)) {
            $body = '<h2>Contact Request Submitted</h2>
                    <h4>Name</h4><p>'.$name.'</p>
                    <h4>Email</h4><p>'.$email.'</p>
                    <h4>Subject</h4><p>'.$subject.'</p>
                    <h4>Message</h4><p>'.$message.'</p>';

            mail($to, $subject, $body, $mailheader);
        }
    }
    //print phpinfo();
    header('Location: ../contact_us.php');
    
?>
