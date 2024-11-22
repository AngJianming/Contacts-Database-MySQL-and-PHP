
<?php 
include('conn.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
        }
        .login-container {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: white;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .login-container h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-container input[type="submit"],
        .login-container input[type="reset"] {
            padding: 10px;
            width: 48%;
            margin: 5px 1%;
            border: none;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            border-radius: 4px;
        }
        .login-container input[type="reset"] {
            background-color: #dc3545;
        }
        .login-container input[type="submit"]:hover,
        .login-container input[type="reset"]:hover {
            opacity: 0.9;
        }
        .register-link {
            text-align: center;
            margin-top: 10px;
        }
        .register-link a {
            color: #007BFF;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>User Login</h2>
        <form method="POST" action="process_login.php">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <div>
                <input type="submit" value="Login">
                <input type="reset" value="Reset">
            </div>
        </form>
        <div class="register-link">
            No account yet? <a href="register.php">Register here</a>
        </div>
    </div>

</body>
</html>
