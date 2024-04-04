<?php
$conn = mysqli_connect('localhost', 'root', '', 'db');
$username = $_POST['email'];
$password = $_POST['password'];
if ($conn) {
    $sql = "SELECT * FROM signup WHERE email = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        echo "<script>alert('Logged in successfully');</script>";
        header("Location: test.html");
        exit();
    } else {
        echo "<script>alert('Invalid username or password');</script>";
        echo "<h1>Login failed. Invalid username or password.</h1>";
        header("Location: /Applications/MAMP/htdocs/Project/project_disease.html");
        exit();
    }
} else {
    echo 'Connection failed';
}
?>