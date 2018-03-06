<?php
/////////////////////////////////////////
// Geometry Dash - Level Upload Module //
// P7COMunications LTD S.A - PANCHO7532//
/////////////////////////////////////////

//Including Configurations...
include 'inc/config.inc.php';
include 'inc/funct.inc.php';

//Checking if SQL its enabled from configuration file...
if(is_numeric AND $sqlmode == '1') {
	include 'sqlmod/uploadGJLevel21.php';
}
//Collecting and setting up gameVersion of client
if(empty($_POST['gameVersion']) OR !is_numeric($_POST['gameVersion'])) {
	$gameVersion = '10';
} else {
	$gameVersion = new_antinj1($_POST['gameVersion']);
}

if(empty($_POST['binaryVersion']) OR !is_numeric($_POST['binaryVersion'])) {
	$binaryVersion = '10';
} else {
	$binaryVersion = new_antinj1($_POST['binaryVersion']);
}

//Collecting User account information
//if(!is_numeric($_POST['accountID'] OR empty($_POST['accountID']) AND !isset($_POST['gjp']) OR empty($_POST['gjp']) AND !isset($_POST['userName']) OR empty($_POST['userName'])) {
if(!is_numeric($_POST['accountID'] OR empty($_POST['accountID'] AND $_POST['gjp'] AND $_POST['userName']) AND !isset($_POST['gjp'] AND $_POST['userName'])) {
	echo "-1";
	die;
} else {
	$accountID = new_antinj2($_POST['accountID']);
	$gjp = new_antinj2($_POST['gjp']);
	$userName = new_antinj2($_POST['userName']);
}

//Collecting Level Information
if(!is_numeric($_POST['levelID'] AND $_POST['levelVersion'] AND $_POST['levelLength'] AND $_POST['audioTrack'] AND $_POST['auto'] AND $_POST['password'] AND $_POST['original'] AND $_POST['twoPlayer'] AND $_POST['songID'] AND $_POST['objects'] AND $_POST['coins'] AND $_POST['requestedStars'] AND $_POST['unlisted'] AND $_POST['ldm'])) {
	echo "-1";
	die;
} else {
	$levelID = new_antinj1($_POST['levelID']);
	$levelVersion = new_antinj1($_POST['levelVersion']);
	$levelLength = new_antinj1($_POST['levelLength']);
	$audioTrack = new_antinj1($_POST['audioTrack']);
	$auto = new_antinj1($_POST['auto']);
	$password = new_antinj1($_POST['password']);
	$original = new_antinj1($_POST['original']);
	$twoPlayer = new_antinj1($_POST['twoPlayer']);
	$songID = new_antinj1($_POST['songID']);
	$objects = new_antinj1($_POST['objects']);
	$coins = new_antinj1($_POST['coins']);
	$requestedStars = new_antinj1($_POST['requestedStars']);
	$unlisted = new_antinj1($_POST['unlisted']);
	$ldm = new_antinj1($_POST['ldm']);
}
if(empty($_POST['levelName'], $_POST['levelDesc'], $_POST['extraString'], $_POST['seed'], $_POST['seed2'], $_POST['levelString'], $_POST['levelInfo'])) {
	echo "-1";
	die;
} else {
	$levelName = new_antinj1($_POST['levelName']);
	$levelDesc = $_POST['levelDesc']; //I don't putted anti-inject because idk what characters are used in lvl desc.
	$extraString = new_antinj1($_POST['extraString']);
	$seed = new_antinj2($_POST['seed']);
	$levelString = new_antinj3($_POST['levelString']);
	$levelInfo = new_antinj3($_POST['levelInfo']);
}
if(!isset($_POST['secret']) AND $_POST['secret'] != $secret1) {
	echo "-1";
	die;
} else {
	$fakevar = "1234"; //idk why i make this var
}
//Collecting IP of client...
$ip = $_SERVER['REMOTE_ADDR'];

//Now.. We need to start to work on it.
//First we need to check user authentication for upload the levelData
include $db_fol."users/usr_".$userName.".php";

//Decode DB saved password...
$decodedInternalpsw = new_xordec($mstr, $password_reg);

//Start AUTH and writing a new level file save
if($username_reg == $userName AND $decodedInternalpsw == $gjp) {
	//Begin ID Generation
	include $db_loc."/users/counter.php";
	$value = $val + 1;
	$filec = $db_loc."/users/counter.php";
	$stagec = fopen($filec, "w");
	fwrite($stagec, "<?php\r\n $"."val = '".$value."';\r\n");
	fclose($stagec);
	//Begin level writing...
	$levelfile = $db_fol."/levels/lvl_".$value.".php";
	$levelstagew = fopen($levelfile, "a");
	fwrite($levelstagew, "<?php\r\n$"."lvlID = '$value';\r\n$"."lvlname = '$levelName';\r\n$"."desc = '$levelDesc';\r\n$"."string = '$levelString';\r\n$"."lvlInfo = '$levelInfo';\r\n$"."extraStr = '$extraString';\r\n$."."levelver = '$levelVersion';\r\n$"."levelLen = '$levelLength';\r\n$"."audioTrack = '$audioTrack';\r\n$"."auto = '$auto';\r\n$"."password = '$password';\r\n$"."original = $original;\r\n$."."twoPlayer = '$twoPlayer';\r\n$"."songID = '$songID';\r\n$"."objects = '$objects';\r\n$"."coins = '$coins';\r\n$"."requestedStars = '$requestedStars';\r\n$"."unlisted = '$unlisted';\r\n$"."ldm = '$ldm';\r\n?>");
	fclose($levelstagew);
	//ENDING
	echo $value;
	die;
} else {
	echo "-1";
	die;
}
?>