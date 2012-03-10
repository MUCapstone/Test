<?php
	include 'vars.php';

/*checks to see if user is logged in already and redirects*/
        if(isset($_COOKIE['user'])){
                header("Location: ".$main_url);
        }

/*establishes connection to mysql*/
        $link = mysqli_connect($db_server, $userName, $passwd, $dbName)
                or die("Could not connect : " . mysqli_connect_error() );
/*if there has been a username entered it adds slashes so that the username is secure and checks that passwords entered are the same*/
        if(isset($_POST['username'])){
                $username = addslashes($_POST['username']);
                $pass = sha1($_POST['password']);
                $cpass = sha1($_POST['cpassword']);
                $email = $_POST['email'];

/*if it the user has entered valid information, then the member is added to the database*/
                if($pass==$cpass){

                        $query = "INSERT INTO Authenticate (PASSWORD) VALUES ('$pass')";
                        $result = mysqli_query($link, $query)
                                or die("Query failed : " . mysql_error());

                        $query = "SELECT Auth_ID FROM Authenticate WHERE PASSWORD='$pass'";
                        $result = mysqli_query($link, $query)
                                or die("Query failed : " . mysql_error());

                        $line = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $id = $line['Auth_ID'];
                        
                        $query = "INSERT INTO Members (USERNAME, EMAIL, AUTH_ID) VALUES ('$username', '$email', '$id')";
                        $result = mysqli_query($link, $query)
                                or die("Query failed : " . mysql_error());
                        }
			
			header("Location: ".$login_url);
                }

mysqli_close($link);
?>

<head>
<title>Register</title>
<style type="text/css" media="all">

body {
        text-align: center;
}

#monkeybutts {
        width: 350px;
        margin: 0 auto;
        text-align: right;
        background-color: white;
        border: 2px solid black;
        padding: 0px 5px;
}

h2 {
        padding: 0px;
        text-align: center;
}

</style>
</head>
<html>
<body>

<div id="monkeybutts">
<h2>Registration Information</h2>
<form name="register" method="POST">
        <label for="username">Username:</label> <input type="text" name="username" /><br />
        <label for="password">Password:</label> <input type="password" name="password" /><br />
        <label for="cpassword">Confirm Password:</label> <input type="password" name="cpassword" /><br />
        <label for="email">Email Address:</label> <input type="text" name="email" /><br />
        <input type="submit" value="Submit" />
</form>
</div>

</body>
</html>

