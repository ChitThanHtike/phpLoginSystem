<?php

require_once("./User_database.php");
function checkStrongPassword($password){
    $upperStatus = false;
    $lowerStatus = false;
    $numberStatus= false;
    $specialStatus= false;

    if(preg_match('/[A-Z]/', $password)){
        $upperStatus = true;
    }
    if(preg_match('/[a-z]/', $password)){
        $lowerStatus = true;
    }
    if(preg_match('/[0-9]/', $password)){
        $numberStatus = true;
    }
    if(preg_match('/[!@#$%^&*]/', $password)){
        $specialStatus = true;
    }
    if($upperStatus && $lowerStatus && $numberStatus && $specialStatus){
        return true;
    }else{
        return false;
    }
}

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $errorName=$errorEmail=$errorPassword=$errorConfirmPassword=$passowordNotMatch="";
    $hashPassword = password_hash($password,PASSWORD_BCRYPT);
    // echo $hashPassword;

    if($name==null ||$name ==""){
        $errorName="Fill name";
    }
    if($email ==null|| $email ==""){
        $errorEmail="Fill email.";
    }
    if($password ==null|| $password ==""){
        $errorPassword ="Fill password";
    }
    if($confirmPassword ==null || $confirmPassword ==""){
        $errorConfirmPassword ="Fill password";
    }
    if($name!=""&& $email !=""&& $password !="" && $confirmPassword !=""){
        $sql = mysqli_query($conn,"SELECT * FROM user_account WHERE Email ='$email'");
        $query = mysqli_num_rows($sql);
        if($query >0){
                $errorEmail="Email is exist!";
        }else{
            if(strlen($password)>=6 && strlen($confirmPassword)>=6){
                if($password == $confirmPassword){
                    $status = checkStrongPassword($password);
                    if($status){
                        $sql ="INSERT INTO user_account(Name,Email,Password) VALUES ('$name','$email','$hashPassword')";
                        if(mysqli_query($conn, $sql)){
                            header("location:./login.php");
                            
                        }else{
                            echo "Query fail....".mysqli_error($conn);

                        }
                    }else{
                        $errorPassword="Password must contain{A-Z,a-z,0-9,@#$%&*}";
                    }
                }else{
                    $passowordNotMatch ="Passoword doesn't match.";
                }
            }else{
                $errorPassword="Password must be greater than 6!";
                $errorConfirmPassword="Password must be greater than 6!";
            }
        }  
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="row ">
            <div class="offset-2 col-8">
                <div class="card m-3">
                    <div class="card-body bg-gray">
                        Register
                        <form method="POST">
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control">
                                <small class="text-danger"><?php echo $errorName?></small>
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control">
                                <small class="text-danger"><?php echo $errorEmail?></small>
                            </div>
                            <div class="mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                                <small class="text-danger"><?php echo $errorPassword?></small>
                            </div>
                            <div class="mb-3">
                                <label for="">Confirm Password</label>
                                <input type="password" name="confirmPassword" class="form-control">
                                <small
                                    class="text-danger"><?php echo $errorConfirmPassword ?><?php echo $passowordNotMatch?></small>
                            </div>
                            <button type="submit" name="register"
                                class="btn bg-dark text-white float-end">Register</button>
                            <label for="">Go to <a href="./login.php"> Login</a></label>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>








</body>

</html>