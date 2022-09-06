<!DOCTYPE html>
<html>
    <head>
        
        <link rel="shortcut icon" href="images/logo/logo64.png" type="image/x-icon">

        <?php
            include("common/header.php");
        ?>

        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <link rel="stylesheet" type="text/css" href="styles/productPageStyle.css">
        <title>Products</title>


        
    </head>

    <style>

    .olderProductsBox 
    {
        align-self: center;
        display: flex;
        justify-content: center;
        width: 100%;
    }

    </style>

	<script src="scripts/utility.js"></script>

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
                $sql = "SELECT * FROM products WHERE supported = true ORDER BY name";
                $result = mysqli_query($conn, $sql);
                $queryResult = mysqli_num_rows($result);
                
                if($queryResult>0) {
                    while($row = mysqli_fetch_assoc($result)) {
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
                                        <a href=".$row['link'].">Download</a>
                                    </div>
                                </span>
                            </div>
                                ");
                    }
                } 

                else 
                {
                    echo "<div class=box>
                            <div class="."elements"."> There's nothing to see here
                            </div>
                        </div>";
                }
            ?>
            <div class="box">
                <div class="button-container">
                    <button class="login-button" type="submit" id="showProductsButton" name="submit" onclick="showOlderProducts()">Show older products</button>
                </div>
            </div>
            <div id="olderProducts" class="olderProductsBox">
            </div>
        </main>
    </body>

    <script>

    clicked=true;
    
    function showOlderProducts() 
    {
        xhr = getXMLHttpRequestObject();
        xhr.onreadystatechange = function() 
        {
			if((xhr.readyState == 4) && (xhr.status == 200))
			{
                if(clicked) 
                {
				    document.getElementById("olderProducts").innerHTML = xhr.responseText;
                    document.getElementById("showProductsButton").innerHTML = "Hide older products";
                    clicked=false;
                } 

                else 
                {
                    document.getElementById("olderProducts").innerHTML = "";
                    document.getElementById("showProductsButton").innerHTML = "Show older products";
                    clicked=true;
                }
            }

			else
				document.getElementById("olderProducts").innerHTML = "";
		}


        let url = encodeURI("scripts/showOlderProducts.php");
		xhr.open('GET', url, true);
		xhr.send(null);
    }

    </script>

    <?php
        include("common/footer.php");
    ?>
    
</html>