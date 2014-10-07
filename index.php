<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'fenixapi/Fenix.class.php';

$api = Fenix::getSingleton();
$api->Auth();

$id = $api->getIstId();

if ($id == "") die("We could not get your IST ID, please reload the page");

$person = $api->getPerson();

$degrees = array(2761663971585, 2761663971567, 2761663971475, 2761663971474);

$EIC = false;
foreach ($person->roles as $role) {
	if ($role->type == "STUDENT") {
        foreach ($role->registrations as $degree) {
            if (in_array($degree->id, $degrees)) {
                $EIC = true;
                break;
            }
                 
        }
        break;
    }
}

if (!$EIC) die("You must be a LEIC/MEIC student");

?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<meta http-equiv="content-type" content="text/html;charset=utf-8">
    	<title>
		Simulação de pré-inscrições de MEIC - Alameda e Taguspark
	</title>
</head>
<body>
 
<iframe src="https://docs.google.com/spreadsheet/embeddedform?formkey=dG1fZjQtWnBMTkhGTUlCSzhuRHl5X1E6MA" width="760" height="600" frameborder="0" marginheight="0" marginwidth="0">A carregar...</iframe>

</body>
</html>
