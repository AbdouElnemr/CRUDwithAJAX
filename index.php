<?php
include 'server.php';
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <script src="jquery-3.3.1.js"></script>
        <script src="scripts.js"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <center>
        <div class="wrapper">

            <?php echo $comments; ?> 

            <form class="comment_form">
                <div>
                    <label for="name">Name : </label>
                    <input type="text" name="name" id="name">
                </div>
                <div>
                    <label for="comment">Upload Image Product : </label>
                    <input type="file"  name="image" id="file" cols="30" rows="5">
                </div>
                <button type="button" id="submit_btn">POST</button>
                <button type="button" id="update_btn" style="display: none;">UPADTE</button>
            </form>
        </div>

    </center>
</body>
</html>