<?php
	include 'vars.php';

/*checks to see if user is logged in already and redirects*/
        if(isset($_COOKIE['user'])){
                header("Location: ".$main_url);
        }

/*starts connection to mysql*/
        $link = mysqli_connect($db_server, $userName, $passwd, $dbName)
                or die("Could not connect : " . mysqli_connect_error() );

        global $id;
/*if the username has been entered it checks password in Authenticate table*/
        if(isset($_POST['username']))
        {
                $username = strtoupper(addslashes($_POST['username']));
                $pass = sha1($_POST['password']);
                $query = "SELECT AUTH_ID FROM Members WHERE UPPER(USERNAME)='$username'";
                $auth_id = mysqli_query($link, $query)
                        or die("Query failed : " . mysql_error());

                $line = mysqli_fetch_array($auth_id, MYSQLI_ASSOC);
                $id = $line['AUTH_ID'];


                $query = "SELECT PASSWORD FROM Authenticate WHERE Auth_ID='$id'";
                $result = mysqli_query($link, $query)
                        or die("Query failed : " . mysql_error());

                $line = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$pass_result = $line['PASSWORD'];


/*if the password is correct, the cookie is set and the user is redirected to main.html. If the information is not valid, an error message is displayed*/
                if($pass==$pass_result){
                        setcookie('user',"$username", time()-1);
                        setcookie('user', "$username");
                        
			header("Location: ".$main_url);
                }else{
                        print "Wrong username and password combination!";
                }

      	}

/*user is able to send them to register.php*/
        if(isset($_POST['Register'])){
                header("Location: ".$register_url);
        }
?>

<style type="text/css" media="all">

body {
        font-family: sans-serif;
        text-align: center;
}

</style>

<html>
<body>

<form name="login" method="POST">
        <label for="username">Username:</label> <input type="text" name="username" /><br />
        <label for="password">Password:</label> <input type="password" name="password" /><br />
        <input type="submit" value="Submit" />
        <input type="submit" name="Register" value="Register" />
</form>

</body>
</html>

