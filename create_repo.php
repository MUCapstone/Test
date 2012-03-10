<?php

function create_repo($pg_user)
{
	$user = $pg_user;
	$username = "MUCapstone";
	$token = "bd7457c0d81ce45026844e0fc3a6fffd";
	$post_string = 'name=' .$user. '&description=PhoneGap repo for ' .$user.'';

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://github.com/api/v2/json/repos/create");
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_USERPWD, $username . '/token:' . $token);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 2);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
	$response = curl_exec($ch);
	curl_close($ch);
	return json_decode($response);
}

//we would pass the user name they registered with obviously
$phonegap_user = "Test_Repo";
create_repo($phonegap_user);
	
?>