
<?php
session_start();
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

   $servername="localhost";
   $username="root";
   $password="root";
   $dbname="multiuserlogin";

   $conn = mysqli_connect($servername, $username, $password, $dbname);
   
  



   if(isset($_POST["Login"]))
   {
   	$user=$_POST['user'];
   	$pass=$_POST['pass'];
   	$usertype=$_POST['usertype'];
    $query = "SELECT* FROM multiuserlogin WHERE username='".$user."' and password='".$pass."' and usertype='".$usertype."'";

   	$result=mysqli_query($conn, $query);
    
    $count=mysqli_num_rows($result);
   	if($result)
   	{
   		while($rows=mysqli_fetch_array($result)){
   			echo "you are logged in";
   		}
        if($count>0){


   		if($usertype=="admin"){
   			
   			$_SESSION['u_admin']="$user";
   			
            header("location:admin.php");
   			

   		}elseif($usertype=="user"){
   			
   			$_SESSION['u_name']="$user";
   		  
   		    header("location:user.php");

   		}
   	
   			
   		else{
   			echo "no result";

   		}
   		}
   	}
   	}
   

   

?>

<html>
<head>
<meta  charset="utf-8">
<title>Multi user login system</title>
</head>

<body>
	<form method="post">
		<table>
			<tr>
				<td>Username:<input type="text" name="user" placeholder="enter your username"></td>
			</tr>

			<tr>
				<td>Password:<input type="text" name="pass" placeholder="enter your password"></td>
			</tr>
			<tr>
				<td>Select user type:<select name="usertype">
					<option value="admin">admin</option>
					<option value="user">user</option>

				   </select>
			    </td>
		    </tr>

		    <tr>
			    <td><input type="submit" name="Login" value="Login"></td>
			    <td><button><a href="newuser.php">Newuser</a></button></td>

		    </tr>

		</table>
	</form>
</body>
</head>
</html>
