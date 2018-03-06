<?php
/////////////////////////////////////////////
// Functions To-Be Included in module      //
// Copyright P7COMunications - PANCHO7532  //
/////////////////////////////////////////////

//Anti-Inject function
function new_antinj1($data) {
	str_replace("'<>/.\\[]=?()!·$%&´+`^\"", "", $data);
	echo $data;
}

function new_antinj2($data) {
	str_replace("'<>/.\\[]?()!·$%&´`^\"", "", $data);
	echo $data;
}

function new_antinj3($data) {
	str_replace("'<>.\\[]=?()!·$%&´`^\"", "", $data);
	echo $data;
}
?>