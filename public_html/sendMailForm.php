<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="images/logo/logo64.png" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <title>Send a newsletter</title>
<?php 
    include("common/header.php");
?>
    </head>
    <style>

        textarea {
            margin: 2%;
            width: 90%;
        }

    </style>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>

<?php


    if(isset($_SESSION['adminID']))
    {

?>
    <body>
        <main>
            <div class="container">
                    <form action="phpmailer/mailer.php" method=POST>
                        <div class="wrap-input">
                            <input type="text" name='subject' id="subject" placeholder="The subject of the newsletter">
                        </div>
                        <div>
                            <textarea name="message" id="message" cols="30" rows="30" placeholder="text of the newsletter"></textarea>
                        </div>
                        <br><br>
                        <div class="button-container">
                            <button name='submit' class="login-button" type="submit">SEND</button>
					    </div> 
                    </form>

            </div> 
        </main>

<?php

    }

    else
    {
?>
    <main>
        <div class="container">

            <div class="text1">You don't have permissions to view this page</div>

        </div>

</main>

<?php

    }

    include("common/footer.php");
?>

    </body>
</html>
