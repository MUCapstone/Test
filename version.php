<?php
ini_set('display_errors', 'On');
$db=new SQLiteDatabase("db.sqlite");

//create table 'USERS' and insert sample data

$db->query("BEGIN;
		CREATE TABLE users (id INTEGER(4) UNSIGNED PRIMARY KEY, name CHAR(255), email CHAR(255));
	
		INSERT INTO users (id,name,email) VALUES (NULL, 'Brian Trenhaile', 'brianltren@gmail.com');
		INSERT INTO users (id,name,email) VALUES (NULL, 'Brenden Smith', 'bcszp9@mail.missouri.edu');
	
		//Commit changes
		COMMIT;");
		
//fetch rows from the 'USERS' database table
$result=$db->query("SELECT * FROM users");

//loop over rows of database tables
while($row=$result->fetch(SQLITE_ASSOC)){
	//fetch current row
	echo $row['id'].' '.$row['name'].' '.$row['email'].'<br />';
}
?>