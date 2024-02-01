<?php
    declare(strict_types=1);
    error_reporting(E_ALL);
    ini_set('display_errors','1');

    session_start();
    require("./User_database.php");
    $errorPassword="";
    if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
        
        $result = mysqli_query($conn, "SELECT * FROM user_account WHERE Email ='$email'");
        $count1 = mysqli_num_rows($result);
        if($count1 >0){
            $row = mysqli_fetch_assoc($result);
            $hash = $row['Password'];

            if(password_verify($password,$hash)){
                $query = mysqli_query($conn,"SELECT * FROM user_account WHERE Email ='$email' and Password='$hash'");
                $count2= mysqli_num_rows($query);
                if($count2>0){
                    $row = mysqli_fetch_assoc($query);
                    $_SESSION['name']= $row['Name'];
                    $_SESSION['email']=$row['Email'];
                    $_SESSION['id']=$row['id'];
                    $_SESSION['password']= $password;
                    header('location:./admin_page.php?');
                }
            }else{
                $errorPassword ="Password Wrong!";
            }
        }else{
            echo '<script>alert("Account not Found!")</script>';
        }
    }
       
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Css link -->
    <link rel="stylesheet" href="style.css">
    <!-- Cdn Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>LogIn Form</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
</head>

<body>
    <section>
        <article>
            <div class="left">
                <img src="./svg/undraw_mobile_encryption_re_yw3o.svg" alt="">
                <span>
                    don't have account
                    <a href="./register.php">
                        Create account
                    </a>
                </span>
            </div>
            <div class="right">

                <main>
                    Log In
                </main>

                <form action="" class="input-area" method="POST">
                    <span class="user">
                        <i class="fa-regular fa-user"></i>
                        <input type="email" class="username" name="email" placeholder="Username">
                    </span>
                    <span class="pwd">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" class="password" name="password" placeholder="Password">
                        <small class="text-danger"><?php echo $errorPassword?></small>
                    </span>

                    <input type="checkbox" class="checkbox">
                    <span>Remember me</span>
                    <input type="submit" value="login" name="login" class="btn bg-primary text-white ms-5 d-block ">
                </form>


                <span>
                    don't have account
                    <a href="./register.php">
                        Create account
                    </a>
                </span>
                <div class="other-login">
                    <span>or Login with</span>
                    <i class="fa-brands fa-facebook-f face-book"></i>
                    <i class="fa-brands fa-instagram instagram"></i>

                    <i class="fa-brands fa-twitter twitter"></i>
                </div>
            </div>
        </article>
    </section>


</body>

</html>