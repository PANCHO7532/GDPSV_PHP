<?php
/////////////////////////////////////////
// Geometry Dash - Level Upload Module //
// P7COMunications LTD S.A - PANCHO7532//
/////////////////////////////////////////

//Including Configurations...
include "inc/config.inc.php";
include "inc/funct.inc.php";

//Collecting IP of client...
$reqip = $_SERVER['REMOTE_ADDR'];

//Checking if SQL its enabled from configuration file...
if(is_numeric($sqlmode) AND $sqlmode == '1') {
	include 'sqlmod/uploadGJLevel21.php';
}
//Collecting and setting up gameVersion of client
if(!is_numeric($_POST['gameVersion'])) {
	echo "-1";
	die;
}

if(empty($_POST['gameVersion'])) {
	$gameVersion = '10';
} else {
	$gameVersion = new_antinj1($_POST['gameVersion']);
}

if(!is_numeric($_POST['binaryVersion'])) {
	echo "-1";
	die;
}

if(empty($_POST['binaryVersion'])) {
	$binaryVersion = '10';
} else {
	$binaryVersion = new_antinj1($_POST['binaryVersion']);
}

//Collecting User account information
if(isset($_POST['udid']) AND !empty($_POST['udid'])) {
	//First we will check if user_data is available, in false case, we will register an temp account to upload the level.
	$udid = new_antinj1($_POST['udid']);
	$userName = new_antinj2($_POST['userName']);
	if(!file_exists($db_fol."/users/usr_".$udid."-".$userName.".php")) {
		//Registering user
		//userID Counting
		include $db_fol."/users/userIDcounter.php";
		$value = $val + 1;
		$filec = $db_fol."/users/userIDcounter.php";
		$stagec = fopen($filec, "w");
		fwrite($stagec, "<?php\r\n $"."val = '".$value."';\r\n");
		fclose($stagec);
		$fileunreg = $db_fol."/users/usr_".$udid."-".$userName.".php";
		$stagewr = fopen($fileunreg, "w");
		fwrite($stagewr, "<?php\r\n$"."extID = '".$udid."';\r\n$"."uid = '".$value."';\r\n?>");
		fclose($stagewr);
		//authentication (? nope
		//First, collecting level_data...
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
		if(empty($_POST['levelName'] AND $_POST['levelDesc'] AND $_POST['extraString'] AND $_POST['seed'] AND $_POST['seed2'] AND $_POST['levelString'] AND $_POST['levelInfo'])) {
			echo "-1";
			die;
		} else {
			$levelName = new_antinj1($_POST['levelName']);
			$levelDesc = $_POST['levelDesc']; //I don't putted anti-inject because idk what characters are used in lvl desc. (yeah, the copy&paste of this you can see ;3;)
			$extraString = new_antinj1($_POST['extraString']);
			$seed = new_antinj2($_POST['seed']);
			$levelString = new_antinj3($_POST['levelString']);
			$levelInfo = new_antinj3($_POST['levelInfo']);
		}
		if(!isset($_POST['secret']) AND $_POST['secret'] != $secret1) {
			echo "-1";
			die;
		} else {
			$fakevar = "1233"; //seriously? :v
		}
		
		//Begin Auth.
		include $db_fol."/users/usr_".$udid."-".$userName.".php";
		if($extID == $udid) {
			//Begin ID Generation
			include $db_fol."/levels/counter.php";
			$value = $val + 1;
			$filec1 = $db_fol."/levels/counter.php";
			$stagec1 = fopen($filec1, "w");
			fwrite($stagec1, "<?php\r\n $"."val = '".$value."';\r\n");
			fclose($stagec1);
			//Begin level writing...
			$levelfile = $db_fol."/levels/lvl_".$value.".php";
			$levelstagew = fopen($levelfile, "a");
			//PASTE...
			$levelName = new_antinj1($_POST['levelName']);
			$levelDesc = $_POST['levelDesc']; //I don't putted anti-inject because idk what characters are used in lvl desc. (yeah, the copy&paste of this you can see ;3;)
			$extraString = new_antinj1($_POST['extraString']);
			$seed = new_antinj2($_POST['seed']);
			$levelString = new_antinj3($_POST['levelString']);
			$levelInfo = new_antinj3($_POST['levelInfo']);
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
			//WRITING
			fwrite($levelstagew, "<?php\r\n$"."lvlID = '".$value."';\r\n$"."lvlname = '".$levelName."';\r\n$"."desc = '".$levelDesc."';\r\n$"."string = '".$levelString."';\r\n$"."lvlInfo = '".$levelInfo."';\r\n$"."extraStr = '".$extraString."';\r\n$"."levelver = '".$levelVersion."';\r\n$"."levelLen = '".$levelLength."';\r\n$"."audioTrack = '".$audioTrack."';\r\n$"."auto = '".$auto."';\r\n$"."password = '".$password."';\r\n$"."original = '".$original."';\r\n$"."twoPlayer = '".$twoPlayer."';\r\n$"."songID = '".$songID."';\r\n$"."objects = '".$objects."';\r\n$"."coins = '".$coins."';\r\n$"."requestedStars = '".$requestedStars."';\r\n$"."unlisted = '".$unlisted."';\r\n$"."ldm = '".$ldm."';\r\n$"."lvlauthor = '".$userName."';\r\n$"."ownerAccID = '0';\r\n$"."extID = '".$udid."';\r\n$"."requestIP = '".$reqip."';\r\n?>");
			fclose($levelstagew);
			//ENDING
			echo $value;
			die;
		} else {
			echo "-1";
			die;
		}	
	} else {
		//Well if the user file exists, its time to authenticate (yeah, time for another copy&paste)
		include $db_fol."/users/usr_".$udid."-".$userName.".php";
		if($extID == $udid) {
			//Begin ID Generation
			include $db_fol."/levels/counter.php";
			$value = $val + 1;
			$filec = $db_fol."/levels/counter.php";
			$stagec = fopen($filec, "w");
			fwrite($stagec, "<?php\r\n $"."val = '".$value."';\r\n");
			fclose($stagec);
			//Begin level writing...
			$levelfile = $db_fol."/levels/lvl_".$value.".php";
			$levelstagew = fopen($levelfile, "a");
			//Another copy&paste to review things...
			$levelName = new_antinj1($_POST['levelName']);
			$levelDesc = $_POST['levelDesc']; //I don't putted anti-inject because idk what characters are used in lvl desc. (yeah, the copy&paste of this you can see ;3;)
			$extraString = new_antinj1($_POST['extraString']);
			$seed = new_antinj2($_POST['seed']);
			$levelString = new_antinj3($_POST['levelString']);
			$levelInfo = new_antinj3($_POST['levelInfo']);
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
			//WRITING...
			fwrite($levelstagew, "<?php\r\n$"."lvlID = '".$value."';\r\n$"."lvlname = '".$levelName."';\r\n$"."desc = '".$levelDesc."';\r\n$"."string = '".$levelString."';\r\n$"."lvlInfo = '".$levelInfo."';\r\n$"."extraStr = '".$extraString."';\r\n$"."levelver = '".$levelVersion."';\r\n$"."levelLen = '".$levelLength."';\r\n$"."audioTrack = '".$audioTrack."';\r\n$"."auto = '".$auto."';\r\n$"."password = '".$password."';\r\n$"."original = '".$original."';\r\n$"."twoPlayer = '".$twoPlayer."';\r\n$"."songID = '".$songID."';\r\n$"."objects = '".$objects."';\r\n$"."coins = '".$coins."';\r\n$"."requestedStars = '".$requestedStars."';\r\n$"."unlisted = '".$unlisted."';\r\n$"."ldm = '".$ldm."';\r\n$"."lvlauthor = '".$userName."';\r\n$"."ownerAccID = '0';\r\n$"."extID = '".$udid."';\r\n$"."requestIP = '".$reqip."';\r\n?>");
			fclose($levelstagew);
			//ENDING
			echo $value;
			die;
		}
	}
} else {
	//lets try some shitty technique here
	//09/03: SECTION BELLOW NEEDS TO BE FIXED .-. DONT TEST
	// Useful code: if(!is_numeric($_POST['accountID'] OR empty($_POST['accountID']) AND !isset($_POST['gjp']) OR empty($_POST['gjp']) AND !isset($_POST['userName']) OR empty($_POST['userName'])) {
	if(!is_numeric($_POST['accountID']) AND empty($_POST['accountID'] AND $_POST['gjp'] AND $_POST['userName'])) {
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
	if(empty($_POST['levelName'] AND $_POST['levelDesc'] AND $_POST['extraString'] AND $_POST['seed'] AND $_POST['seed2'] AND $_POST['levelString'] AND $_POST['levelInfo'])) {
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

	//Now.. We need to start to work on it.
	//First we need to check user authentication for upload the levelData
	include $db_fol."users/usr_".$userName.".php";

	//Decode DB saved password...
	$decodedInternalpsw = new_xordec($mstr, $password_reg);
	
	//Start AUTH and writing a new level file save
	if($username_reg == $userName AND $decodedInternalpsw == $gjp) {
		//Begin ID Generation
		include $db_fol."/levels/counter.php";
		$value = $val + 1;
		$filec = $db_fol."/levels/counter.php";
		$stagec = fopen($filec, "w");
		fwrite($stagec, "<?php\r\n $"."val = '".$value."';\r\n");
		fclose($stagec);
		//Begin level writing...
		$levelfile = $db_fol."/levels/lvl_".$value.".php";
		$levelstagew = fopen($levelfile, "a");
		fwrite($levelstagew, "<?php\r\n$"."lvlID = '$value';\r\n$"."lvlname = '$levelName';\r\n$"."desc = '$levelDesc';\r\n$"."string = '$levelString';\r\n$"."lvlInfo = '$levelInfo';\r\n$"."extraStr = '$extraString';\r\n$."."levelver = '$levelVersion';\r\n$"."levelLen = '$levelLength';\r\n$"."audioTrack = '$audioTrack';\r\n$"."auto = '$auto';\r\n$"."password = '$password';\r\n$"."original = $original;\r\n$."."twoPlayer = '$twoPlayer';\r\n$"."songID = '$songID';\r\n$"."objects = '$objects';\r\n$"."coins = '$coins';\r\n$"."requestedStars = '$requestedStars';\r\n$"."unlisted = '$unlisted';\r\n$"."ldm = '$ldm';\r\n$"."lvlauthor = '$userName';\r\n$"."ownerAccID = '$accountID';\r\n$"."requestIP = '$reqip';\r\n?>");
		fclose($levelstagew);
		//ENDING
		echo $value;
		die;
	} else {
		echo "-1";
		die;
	}
	//I think what this its done. :)
}
?>