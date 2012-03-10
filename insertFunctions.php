<?php

function createApp($username, $business_name){
	include 'vars.php';

        $link = mysqli_connect($db_server, $userName, $passwd, $dbName)
                or die("Could not connect : " . mysqli_connect_error() );

        $query = "INSERT INTO Apps (USER_NAME) VALUES ('$username')";
        $result = mysqli_query($link, $query)
                or die ("Insert Apps query failed: ". mysql_error());

	$appId = getMostRecentAppId($username);

	$query = "INSERT INTO BasicInfo (APP_ID, BUSINESS_NAME) VALUES ($appId, '$business_name')";
        $result = mysqli_query($link, $query)
                or die ("Insert BasicInfo query failed: ". mysql_error());

	return $appId;
}

function getMostRecentAppId($username) {
	include 'vars.php';

        $link = mysqli_connect($db_server, $userName, $passwd, $dbName)
                or die("Could not connect : " . mysqli_connect_error() );


	$query = "SELECT APP_ID FROM Apps WHERE USER_NAME = '$username'";
        $result = mysqli_query($link, $query)
                or die ("Select query failed: ". mysql_error());
        $mostRecentAppId = -1;

        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        if($line['APP_ID'] > $mostRecentAppId){
                                $mostRecentAppId = $line['APP_ID'];
                        }
        }

	return $mostRecentAppId;
}

function inputBasicInfo($appId, $street, $city, $state, $phone, $tagline, $desc) {
	include 'vars.php';

        $link = mysqli_connect($db_server, $userName, $passwd, $dbName)
                or die("Could not connect : " . mysqli_connect_error() );
	
	$query = "UPDATE BasicInfo SET STREET_ADDRESS = '$street', CITY = '$city', STATE = '$state', "
			."PHONE = $phone, TAGLINE = '$tagline', DESCRIPTION = $desc "
			."WHERE APP_ID = $appId";
        $result = mysqli_query($link, $query)
                or die ("Update BasicInfo query failed: ". mysql_error());

}

?>
