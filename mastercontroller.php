<?php
include 'db_connect.php';



// ------------------------------------------------------------------------------LOGIN -->
if(isset($_POST['login']))
{
  $username=$_POST['username'];
  $password=$_POST['password'];

  $count1=0; $count2=0;
  $count1=substr_count($username, "'");
  $count2=substr_count($password, "'");
  $err=0;
  if ($count1>0 || $count2>0)
     $err=1;

$query = mysql_query("SELECT * FROM login WHERE username='".$username."' AND password='".$password."'");
$resultcheck = mysql_num_rows($query);
if($resultcheck > 0)
{
	$flag=0;
	while($row = mysql_fetch_array($query))
		{
		$flag=1;
		$type = $row['type'];
	
		//echo $row['type'];
		switch ($type) {
			case 'User':
				$table='register';
				break;
			case 'Warehouse':
				$table='register_warehouse';
				break;
            case 'Admin':
                $table='login';
                break;
			default:
				echo "<script>alert('Invalid User ID and Password!')</script>";
				echo "<script><a href='index.php?msg=Invalid Username or Password'></a></script>";
				break;
		}
	

	    $_SESSION['username'] = $username;
		}

	// $xx = mysql_query("SELECT * FROM ".$table." WHERE username='".$username."'");
	// echo "SELECT * FROM ".$table." WHERE username='".$username."'";	
	// while ($xc = mysql_fetch_array($xx))
	// {
	// $name = $xc['name'];
	// if($type == 'user')
	// 		{
	// 		$x=$xc['user_id'];
	// 		$stat = $xc['user_status'];
	// 		}

	// 	else if($type == 'officer')
	// 		{
	// 		$x=$xc['off_id'];
	// 		$stat = $xc['off_status'];
	// 		}
	// 	else if($type == 'admin')
	// 	{
	// 		$x=$xc['adm_id'];
	// 		$stat = 1;
	// 	}
	// 	else {
	// 		$x=$xc['off_id'];
	// 		$stat = $xc['off_status'];
	// 	}

	// $unique_id = $x;
	
	
	// $_SESSION['unique_id'] = $unique_id;
	// $_SESSION['name'] = $name;
	// $_SESSION['status'] = $status;
	
	// }
  	if($err>0)
  		{
  			echo "invalid 0000";
  			//echo "<script>alert('Access Denied!... Try Again')</script>";
  			//echo "<script><a href='index.php?msg=Invalid Username or Password'></a></script>";
		}
	else if($flag==1 && $type=="User")
			{
				//echo "<script>location.href='User_home.php'</script>";
				echo "User login success";
			}
		else if($flag==1 && $type=="Admin")
				{
					echo "<script>location.href='Admin/Admin_home.php'</script>";
                    echo "Admin login success";
				}
				
		else if($flag==1 && $type=="Warehouse")
				{
					//echo "<script>location.href='officer_home.php'</script>";
                    echo "Warehouse login success";
				}
		
		else if($flag==1 && $type=="trafficpolice")
				{
					echo "Tp";
					//echo "<script>location.href='tp_home.php'</script>";
				}
		}
else
{
		//echo "<script>alert('Invalid Username And Password!')</script>";
		//echo "<script>location.href='index.php?msg=Invalid Username or Password'</script>";
		echo "invalid no rows";
		echo "<script>alert('ERR999: Invalid User ID and Password!')</script>";
		//echo "<script>location.href='index.php'</script>";
}

}
// ------------------------------------------------------------------------------LOGIN CLOSE -->
?>