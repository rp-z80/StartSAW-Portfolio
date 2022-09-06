<?php
    include("../../connection.php");

    $sql = "SELECT * FROM products WHERE supported = false ORDER BY name";
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
                            <a href="."#".">Download</a>
                        </div>
                    </span>
                </div>
                    ");
                
        }
    } else {
        echo "<div class=box>
                <div class="."elements"."> There's nothing to see here
             </div>
            </div>";
    }
?>