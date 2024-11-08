<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            background-color: #3a4c38;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 640px;
            margin: 0 auto;
            padding: 10px;
            background-color: #fff;
        }
        .header img {
            width: 100%;
        }
        .nav {
            background-color: #FF0000;
            text-align: center;
            padding: 5px 0;
        }
        .nav a {
            color: #fff;
            text-decoration: none;
            font-size: 1.2em;
        }
        .login-form {
            background-color: silver;
            padding: 20px;
            border-radius: 5px;
        }
        .login-form h2 {
            margin-bottom: 20px;
        }
        .login-form label {
            display: block;
            margin-bottom: 5px;
        }
        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-form input[type="submit"] {
            background-color: #3a4c38;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 4px;
        }
        .footer {
            text-align: center;
            padding: 10px 0;
            background-color: #3a4c38;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="footer">
            <img src="banner.gif2" alt="Banner">
        </div>
        <div class="nav">
            <a href="index.php">Home</a>
        </div>
        <div class="login-form">
            <form name="login" action="processlogin.php" method="POST">
                <h2><b>Admin Control Panel</b></h2>
                <label for="Username">User  Name</label>
                <input type="text" name="Username" id="Username" required>
                
                <label for="Password">Password</label>
                <input type="password" name="Password" id="Password" required>
                
                <input type="submit" value="LOGIN">
            </form>
        </div>
        <div class="footer">
            &copy; 2024 all rights reserved 
        </div>
    </div>
</body>
</html>