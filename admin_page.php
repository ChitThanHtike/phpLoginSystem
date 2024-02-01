<?php
session_start();
require("./User_database.php");
$name = $_SESSION['name'];
$id= $_SESSION['id'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Google font link  -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- style.Css  -->
    <link rel="stylesheet" href="./template/style.css">
</head>

<body>
    <p><?php echo "Your Id is : $id" ?></p>
    <p><?php echo "Your Name is : $name" ?></p>
    <p><?php echo "Your Email is : $email" ?></p>
    <p><?php echo "Your Password is : $password" ?></p>

    <button class="chatbot-toggler">
        <span class="material-symbols-outlined">mode_comment</span>
        <span class="material-symbols-outlined">close</span>
    </button>
    <div class="chatbot">
        <header>
            <h2>chatbot</h2>
            <span class="close-btn material-symbols-outlined">close</span>
        </header>
        <ul class="chatbox">
            <li class="chat incoming">
                <span class="material-symbols-outlined">smart_toy</span>
                <p>Hi there 👋 <br> How can I help you today?</p>
            </li>
        </ul>
        <div class="chat-input">
            <textarea placeholder="Enter a message ..."></textarea>
            <span id="send-btn" class="material-symbols-outlined">send</span>
        </div>
    </div>
</body>
<script src="./template/script.js" defer></script>

</html>