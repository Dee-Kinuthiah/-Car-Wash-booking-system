<?php
// Set up for MySQL Connection using mysqli
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'car';

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Escape user inputs for security
$Name = $conn->real_escape_string($_POST['Name']);
$Service_Type = $conn->real_escape_string($_POST['Service_Type']);
$Car_Reg = $conn->real_escape_string($_POST['Car_Reg']);
$Price = $conn->real_escape_string($_POST['Price']);
$Comments = $conn->real_escape_string($_POST['Comments']);

// Protecting form from submitting empty data
if (!$Name || !$Service_Type || !$Car_Reg || !$Price || !$Comments) {
    echo '<body bgcolor="#3a4c38">';
    echo '<center>';
    echo "<h2>Please enter the required details</h2>";
    echo "<br/>";
    echo "<br/>";
    echo "<font size='5'>" . "Click" . "<a href='ticket.php'>" . "  " . "here" . "</a>" . "  " . "to ticket" . "</font>";
    echo '</center>';
    echo '</body>';

    exit;
}

// Prepare an insert statement
$sql = "INSERT INTO `ticketing` (`Name`, `Service_Type`, `Car_Reg`, `Price`, `Date_In`, `Comments`) 
        VALUES (?, ?, ?, ?, CURDATE(), ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $Name, $Service_Type, $Car_Reg, $Price, $Comments);

// Execute the statement
if ($stmt->execute()) {
    echo '<script type="text/javascript">
            alert("New Record is Added thank you");
            window.location = "ticket.php";
          </script>';
} else {
    die('Could not enter data: ' . $stmt->error);
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>