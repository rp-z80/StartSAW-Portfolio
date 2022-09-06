<?php
    if(isset($_SESSION['adminID'])) {
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        include '../../connection.php';

        require 'vendor/autoload.php';
        if(isset($_POST['submit'])) {
            $mail = new PHPMailer(true);
            $mail->AddEmbeddedImage('../images/newsletterheader.png','newsletterlogo' ,'newsletterlogo.png');
            try {
                $query = "SELECT id, firstname, email FROM users WHERE newsletter=1";
                $result = mysqli_query($conn, $query) or die("no user in the table");;
                $message = $_POST['message'];
                $subject = $_POST['subject'];

                while($values = mysqli_fetch_array($result)) {

                    $id = $values['id'];
                    $name = $values['firstname'];
                    $to = $values['email'];


                    //$mail->SMTPDebug = 2;
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = '*******';
                    $mail->Password = "*******";
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    $mail->setFrom('*********', 'John from Harsh Noises');
                    $mail->addBCC(''.$to.'', ''.$name.'');

                    //content
                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                    $mail->Body= "<html>
                                    <head>
                                    </head>
                                    <body> 
                                        <header> <img src="."cid:newsletterlogo"."></header>
                                        <p>Dear ".$name.", </p>
                                        <p>".$message."</p>
                                        <footer>
                                            Do you want to unsubscribe to our newsletter? check on your 
                                            <a href="."https://webdev19.dibris.unige.it/~S4675079/update_profile.php".">user page</a>
                                            <br><br>
                                            <p>&copy 2021 Harsh Noises Software</p>
                                        </footer>
                                    </body>
                                </html>";
                    $mail->send();
                    $mail->clearAddresses();
                    $mail->clearAllRecipients();
                }
            } catch (Exception $e) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error:' . $mail->ErrorInfo;
            }
        }
        
        header('Location: ../sendMailForm.php');
    } else {
        echo "no";
    }
?>
