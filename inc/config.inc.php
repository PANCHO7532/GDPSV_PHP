<?php
///////////////////////////////////////////////////
// GDPS Configuration File                       //
// Copyright P7COMunications - PANCHO7532        //
///////////////////////////////////////////////////

//Enable SQL Method? (You can enable SQL Storage for Accounting, levels, stats, etc.)
//Enable = 1 \/ Disable = 0
//05/03/18: Function not available for the moment.
$sqlmode = '0';

//Geometry Jump Secret String...
//Validation Strings to verify what everything is ok :)
//WARNING: Don't change it if you don't have any idea about what is this.
$secret1 = 'Wmfd2893gb7';

//Local Database location
//If SQL Method is disabled this directory will store Level data, accounts, stats, etc.
//WARNING: Inside the new folder must be the same storage structure to work correctly!
$db_fol = 'dbgdps1';

//Master XOR String
//Used for encode sensitive data, if do you change/lost this string all your database data may be unreachable and unrecoverable.
//After installing and mounting our GDPS version, we recommend to change the default key for avoid hackers to decode the data.
//Default Key: gdps1234
$mstr = 'gdps1234';
?>