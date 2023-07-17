<?php
    session_start();
    if(!isset($_SESSION["username"]))
    {
        header("location:index.php");
    }
    require("connection.php");
?>
<html>
    <head>
        <title>Messenger</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        
    </body>
    <div id="main_home">
        <div id="userinfo">
            <?php
            echo $_SESSION["username"];
            ?>
            <a href="logout.php">Logout</a>
        </div>
        <div id="msgscreen">
            <?php
            $sql="SELECT * FROM message";
            $result=mysqli_query($conn, $sql);
            echo "<table>
            <tr>
            <th></th>
            <th></th>
            </tr>
            ";
            while($row=mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td style='font-size: 20px; '>".$row['username']."</td>";
                echo "<td style='font-size: 23px; background-color: blue; '>".$row['content']."</td>";
                echo "</tr>";
            }
            echo"</table>";
            ?>
        </div>
        <div id="msgbox">
           <form method="post" action="send.php">
            <textarea name="message" cols="15" rows="5"></textarea>
            <div>
             <button type="submit">Send</button>
            </div>
           </form>
        </div>
    </div>
    </html>