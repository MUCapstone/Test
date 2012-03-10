<?php
$output = shell_exec('ls');
$output2 = shell_exec('cd app_builds');
$output3 = shell_exec('ls app_builds');

echo $output;
echo '<br>';
echo $output2;
echo '<br>';
echo $output3;


?>