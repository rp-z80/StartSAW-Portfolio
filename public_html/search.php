<!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <link rel="stylesheet" type="text/css" href="styles/productPageStyle.css">
        <link rel="shortcut icon" href="images/logo/logo64.png" type="image/x-icon">
        <title>Products</title>

        <?php
            include("common/header.php");
        ?>

    </head>

    <body>
        <main>
            <div class="container">
                    <form class="forme" action="search.php" method="GET">
                        <div class="barContainer">
                            <input type="text" name="search" placeholder="Search products...">
                        </div>
                        <span class="searchButtonContainer">
                            <div class="button-container">
                                <button class="login-button" type="submit" name="submitSearch">Search</button>
                            </div>
                        </span>
                    </form>
                </div>
                <?php
                    include("../connection.php");

                    if(isset($_GET['submitSearch'])) 
                    {
                        $search = mysqli_real_escape_string($_GET['search']);

                        $sql = "SELECT * FROM products WHERE name LIKE '%$search%' OR description LIKE '%$search%' ";

                        $result = mysqli_query($conn, $sql);
                        $queryResult = mysqli_num_rows($result);

                        if($queryResult > 0) {
                            while($row = mysqli_fetch_assoc($result)) 
                            {
                                echo ("
                                <div class=box>
                                    <div class="."image-container"."> 
                                        <img src=".$row['icon']." width=90%>
                                    </div>
                                    <span class="."textContainer".">
                                        <div class="."elements".">
                                            ".$row['name']."
                                            <span class="."elements".">
                                                ".$row['version']."
                                            </span>
                                        </div>
                                        <div class="."description".">
                                            ".$row['description']."
                                        </div>
                                        <div>
                                            <a href="."#".">Download</a>
                                        </div>
                                    </span>
                                </div>
                                    ");
                            }
                        } else {
                            echo "<div class=box>
                            <div class="."elements"."> There's no such product!
                            </div>
                        </div>";
                        }
                    }
                ?>
        </main>
    </body>
    <?php
        include("common/footer.php");
    ?>
</html>
