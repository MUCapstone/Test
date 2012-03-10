<?php

$app_id;
$username;

function generateApp($appId) {
	global $app_id;
	$app_id = $appId;
	createIndexFile();
}

function createDir() {
	include 'vars.php';
	global $app_id, $username;

	echo " APP ID IS ". $app_id;
	$link = mysqli_connect($db_server, $userName, $passwd, $dbName)
		or die("Could not connect : " . mysqli_connect_error() );

	$query = "SELECT * FROM Apps WHERE APP_ID = $app_id";
	$result = mysqli_query($link, $query) 
		or die ("Create dir query failed: ". mysql_error());

	while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$username = $line['USER_NAME'];
			$app_name = $line['APP_NAME'];
	}
	
	if(is_dir("./../apps/".$username)){
		mkdir("./../apps/".$username."/".$app_id."/", 0755);
	} else {
		mkdir("./../apps/".$username."/".$app_id."/", 0755, TRUE);
	}
}

function createIndexFile() {
        include 'vars.php';
	global $app_id, $username;

        $link = mysqli_connect($db_server, $userName, $passwd, $dbName)
                or die("Could not connect : " . mysqli_connect_error() );

        $query = "SELECT * FROM BasicInfo WHERE APP_ID = $app_id";
        $result = mysqli_query($link, $query)
                or die ("Index file query failed: ". mysql_error());

        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $business_name = $line['BUSINESS_NAME'];
                        $tagline = $line['TAGLINE'];
			$description = $line['DESCRIPTION'];
        }

	$data = file_get_contents("./../apps/templates/index.html");
	
	$data = str_replace("BUSINESS_NAME", $business_name, $data);
	$data = str_replace("TAGLINE", $tagline, $data);
	$data = str_replace("DESCRIPTION", $description, $data);

	file_put_contents("./../apps/".$username."/".$app_id."/index.html", $data);
}


?>
