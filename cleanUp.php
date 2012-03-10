<?php

function removeApp($appId) {
        include 'vars.php';
        
	$link = mysqli_connect($db_server, $userName, $passwd, $dbName)
                or die("Could not connect : " . mysqli_connect_error() );

        $query = "DELETE FROM Apps WHERE APP_ID = $appId";
        $result = mysqli_query($link, $query)
                or die ("Delete from Apps query failed: ".$appId. mysql_error());

        $query = "DELETE FROM BasicInfo WHERE APP_ID = $appId";
        $result = mysqli_query($link, $query)
                or die ("Delete from BasicInfo query failed: ".$appId. mysql_error());

        $query = "DELETE FROM Menu WHERE APP_ID = $appId";
        $result = mysqli_query($link, $query)
                or die ("Delete from Menu query failed: ".$appId. mysql_error());	

}

function removeUser($username) {
        include 'vars.php';

        $link = mysqli_connect($db_server, $userName, $passwd, $dbName)
                or die("Could not connect : " . mysqli_connect_error() );

	$query = "SELECT * FROM Apps WHERE USER_NAME = '$username'";
        $result = mysqli_query($link, $query)
                or die ("Select from Apps query failed: ".$username. mysql_error());
	
	while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo $line['APP_ID'];
		removeApp($line['APP_ID']);
        }

	$query = "SELECT AUTH_ID FROM Members WHERE USERNAME = '$username'";
        $result = mysqli_query($link, $query)
                or die ("Delete from Members query failed: ".$username. mysql_error());
	$line = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$authId = $line['AUTH_ID'];
        
	$query = "DELETE FROM Members WHERE USERNAME = '$username'";
	$result = mysqli_query($link, $query)
                or die ("Delete from Members query failed: ".$username.$query. mysql_error());

	$query = "DELETE FROM Authenticate WHERE Auth_ID = $authId";
	$result = mysqli_query($link, $query)
		or die ("Delete from Authenticate query failed: ".$authId. mysql_error());

}

?>



