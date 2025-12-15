<?php
session_start();
include "db.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['name'];
            header("Location: index.html"); // goes to index after login
        } else {
            $error = "Wrong password";
        }
    } else {
        $error = "User not found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: Arial, sans-serif;
        }

        body{
            height:100vh;
            background: linear-gradient(135deg, #2575fc, #6a11cb);
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .login-box{
            background:#fff;
            width:350px;
            padding:30px;
            border-radius:12px;
            box-shadow:0 10px 30px rgba(0,0,0,0.2);
        }

        .login-box h2{
            text-align:center;
            margin-bottom:20px;
            color:#333;
        }

        .input-box{
            position:relative;
            margin-bottom:15px;
        }

        .input-box i{
            position:absolute;
            top:50%;
            left:10px;
            transform:translateY(-50%);
            color:#777;
            font-size:18px;
        }

        .input-box input{
            width:100%;
            padding:10px 10px 10px 35px;
            border:1px solid #ccc;
            border-radius:6px;
            outline:none;
        }

        .input-box input:focus{
            border-color:#2575fc;
        }

        button{
            width:100%;
            padding:10px;
            background:#2575fc;
            color:white;
            border:none;
            border-radius:6px;
            font-size:16px;
            cursor:pointer;
        }

        button:hover{
            background:#1a5fd3;
        }

        .error{
            background:#ffe0e0;
            color:#b00000;
            padding:8px;
            border-radius:5px;
            margin-bottom:10px;
            text-align:center;
            font-size:14px;
        }

        p{
            text-align:center;
            margin-top:15px;
            font-size:14px;
        }

        a{
            color:#2575fc;
            text-decoration:none;
        }

        a:hover{
            text-decoration:underline;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login</h2>

    <?php if (isset($error)) { ?>
        <div class="error"><?php echo $error; ?></div>
    <?php } ?>

    <form method="POST">
        <div class="input-box">
            <i class='bx bx-envelope'></i>
            <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="input-box">
            <i class='bx bx-lock'></i>
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <button type="submit" name="login">Login</button>
    </form>

    <p>New user? <a href="register.php">Register</a></p>
</div>

</body>
</html>
