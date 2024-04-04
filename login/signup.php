<?php
error_reporting(0);
    $name=$_POST['fullName'];
   $username=$_POST['userName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $conn=mysqli_connect('localhost','root','','db');
    if($conn)
    {
            $sql = "SELECT * FROM signup WHERE userName = '$username' OR email = '$email';";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            if (mysqli_num_rows($result) > 0) {
                // OUTPUT DATA OF EACH ROW
                while($row = mysqli_fetch_assoc($result)) {
                    if($username==$row['userName'])
                    {
                        
                         $i=$i+1;
                    }
                    if($email==$row['email'])
                    {
                        $j=$j+1;
                    }
                }
            }
            if ($count >= 1) {
                if($i>=1)
                {
                    echo "<script>alert('failed to register as username already exist');</script>";
                    header("Location:/Applications/MAMP/htdocs/login/delay.php"); 
                    exit();
                }
                else if($j>=1)
                {
                    echo "<script>alert('failed to register as email already exist');</script>";
                header("Location: /Applications/MAMP/htdocs/login/delay1.php");
                exit();
                }
                else{
                    echo "<script>alert('failed to register as both email and name exist');</script>";
                header("Location: /Applications/MAMP/htdocs/login/delay2.php");
                exit();
                }
                
                header("Location: /Applications/MAMP/htdocs/login/index.html");
                
            }
             else {
                echo "<script>alert('registered successfully');</script>";
        $query="insert into signup values ('$name','$username','$email','$password')";
        mysqli_query($conn,$query);
        header("Location: /Applications/MAMP/htdocs/login/index.html");
    exit();
    }
}
else
{
	echo 'connection is failed';
}

?> 
