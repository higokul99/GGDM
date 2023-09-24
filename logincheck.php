<?php
// Database connection details
// $hostname = 'your_hostname';
// $username = 'your_username';
// $password = 'your_password';
// $database = 'your_database';

// // Establish a database connection
// $conn = new mysqli($hostname, $username, $password, $database);
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
include_once('db_connect.php');

$username = $_POST['username'];
$password = $_POST['password'];

$table = 'login';
//$sql = "SELECT * FROM $table WHERE username = '$username' AND (account_status = 'New' OR account_status = 'Approved')";

$sql = "SELECT * FROM $table WHERE username = '$username' AND (status = 'New' OR status = 'Verified')";
echo $sql;

//$result = $conn->query($sql);
$result = mysql_query($sql);
//$result->num_rows
if (mysql_num_rows($result) > 0) 
{
    $_SESSION['username'] = $username;
    //$row = $result->fetch_assoc();
    $row = mysql_fetch_assoc($result);
    $Table_Password = $row['password'];
    $type_of_user = $row['type'];
    $Name = $row['name'];

if ($password == $Table_Password) 
    {
    echo "<script>alert('Login successful! Welcome, $Name.');</script>";
    echo "Login successful! Welcome, $Name.";
        //Special condition
        //$root = 'Wednesday';

switch ($type_of_user) {
    case 'User':
        echo "User login success";
        $_SESSION['usertype'] = $type_of_user;
        //echo "<script>location.href='Admin2/2index.php'</script>";
        echo "<script>location.href='User/index.php'</script>";
        break;
    case 'Admin':
        echo "Admin login success!";
        $_SESSION['usertype'] = $type_of_user;
        echo "<script>location.href='Adminfolder/examples/2homepage.php'</script>";
        break;
    case 'Advertiser':
        $_SESSION['usertype'] = $type_of_user;
        echo "Warehouse login success!";
        echo "<script>location.href=''</script>";
        
        break;
    case 'Manager':
        echo "It's Thursday!";
        //echo "<script>location.href = 'login.php';</script>";
        break;
    case 'Advertiser':
        echo "Advertiser Login Success!";
        echo "<script>location.href='2Advertiser/2Homepage.php'</script>"; 
        break;
    case 'Publisher':
        echo "Publisher Login Success!";
        echo "<script>location.href='3Publisher/2Homepage.php'</script>"; 
        break;
    case 'Friday':
                echo "It's Friday!";
                //echo "<script>location.href = 'login.php';</script>";
                break;
    default:
        echo "Internal Error occured!";
        break;
}


    } else 
    {
        $message = "Invalid Password. Try Again!";
        $location = "index.php";

        echo "<script>alert('$message');</script>";
        echo "<script>location.href = '$location';</script>";
        echo $message;
    }
} else {

    $message = "Invalid Username/Password or Account is Blocked/Rejected!";
    $location = "index.php";

    echo "<script>alert('$message');</script>";
    echo "<script>location.href = '$location';</script>";
    echo $message;
}

?>
