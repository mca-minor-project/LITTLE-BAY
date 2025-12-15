<?php
include "db.php";

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password)
            VALUES ('$name', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.html");
    } else {
        echo "Email already exists";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: Arial, sans-serif;
        }

        body{
            height:100vh;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .register-box{
            background:#fff;
            padding:30px;
            width:320px;
            border-radius:10px;
            box-shadow:0 10px 25px rgba(0,0,0,0.2);
            text-align:center;
        }

        h2{
            margin-bottom:20px;
            color:#333;
        }

        input{
            width:100%;
            padding:10px;
            margin:10px 0;
            border:1px solid #ccc;
            border-radius:5px;
            outline:none;
        }

        input:focus{
            border-color:#2575fc;
        }

        button{
            width:100%;
            padding:10px;
            background:#2575fc;
            color:#fff;
            border:none;
            border-radius:5px;
            font-size:16px;
            cursor:pointer;
        }

        button:hover{
            background:#1a5fd3;
        }

        p{
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

<div class="register-box">
    <h2>Register</h2>

    <form method="POST">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="register">Register</button>
    </form>

    <p>Already have account? <a href="login.php">Login</a></p>
</div>

</body>
</html>
