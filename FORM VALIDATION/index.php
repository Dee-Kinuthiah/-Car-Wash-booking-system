<?php
$con = mysqli_connect("localhost", "root", "", "car");

$errors = [];
$successful = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate input fields
    if (empty($fname)) {
        $errors['fname'] = "* First Name is required.";
    }
    if (empty($lname)) {
        $errors['lname'] = "* Last Name is required.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "* Not a valid e-mail address.";
    }
    if (strlen($password) < 8) {
        $errors['password'] = "* Password must contain at least 8 characters.";
    }
    if ($password !== $confirm_password) {
        $errors['confirm_password'] = "* Passwords do not match.";
    }

    // If no errors, proceed to registration
    if (empty($errors)) {
        $fname = mysqli_real_escape_string($con, $fname);
        $lname = mysqli_real_escape_string($con, $lname);
        $email = mysqli_real_escape_string($con, $email);
        
        // Hash the password with a salt
        $salt = createSalt();
        $hashedPassword = hash('sha256', $salt . hash('sha256', $password));
        
        // Check if email already exists
        $search_query = mysqli_query($con, "SELECT * FROM members WHERE email = '$email'");
        if (mysqli_num_rows($search_query) > 0) {
            $errors['email'] = "Email address is unavailable.";
        } else {
            // Insert new member into the database
            $sql = "INSERT INTO members(`fname`, `lname`, `email`, `salt`, `password`) VALUES ('$fname', '$lname', '$email', '$salt', '$hashedPassword')";
            mysqli_query($con, $sql);
            $successful = "<h3>You are successfully registered.</h3>";
            // Clear input fields
            $_POST = [];
        }
    }
}

function createSalt() {
    return substr(md5(uniqid(rand(), true)), 0, 3);
}
?>

<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <title>Registration page and Login</title>
</head>
<body>
<div id="container">
    <div class="login">
        <form method="post" action="login.php">
            <table>
                <tr>
                    <td><h1>E-mail</h1></td>
                    <td><h1>Password</h1></td>
                </tr>
                <tr>
                    <td><input type="text" name="login_email" id="login_email"></td>
                    <td><input type="password" name="login_password" id="login_password"></td>
                    <td><input type="submit" name="submit" id="login" value="Login"></td>
                </tr>
                <tr>
                    <td colspan="3"><?php if (isset($_GET['message'])) { echo "<h2>" . $_GET['message'] . "</h2>"; } ?></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="form">
        <form method="post" action="index.php">
            <table>
                <tr>
                    <td colspan="2"><?php if (!empty($successful)) { echo $successful; } ?></td>
                </tr>
                <tr>
                    <td><input type="text" name="fname" id="fname" placeholder="First Name" value="<?php echo htmlspecialchars($_POST['fname'] ?? ''); ?>"></td>
                    <td><input type="text" name="lname" id="lname" placeholder="Last Name" value="<?php echo htmlspecialchars($_POST['lname'] ?? ''); ?>"></td>
                </tr>
                <tr>
                    <td><?php echo isset($errors['fname']) ? "<h2>" . $errors['fname'] . "</h2>" : ''; ?></td>
                    <td><?php echo isset($errors['lname']) ? "<h2>" . $errors['lname'] . "</h2>" : ''; ?></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="email" id="email" placeholder="E-mail Address" value="<?php echo htmlspecialchars($_POST['email'] ??'');