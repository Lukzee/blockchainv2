<?php
require_once 'path.php';
require_once 'connection.php';
require_once 'class/crud_class.php';
require_once 'class/dprot_class.php';
require_once 'header.php';

$req = @$_REQUEST['req'];
empty($req) ? $req = 'home' : '';

switch (strtolower($req)) {
    case 'home':
        require_once 'home.php';
        break;

    case 'auditor':
        require_once 'dashAuditor.php';
        break;

    case 'examiner':
        require_once 'dashExaminer.php';
        break;

    case 'exam-officer':
        require_once 'dashExaOfficer.php';
        break;

    case 'panelau':
        require_once 'panelAuditor.php';
        break;

    case 'admin':
        require_once 'panelExaminer.php';
        break;

    case 'paneleo':
        require_once 'panelExaOfficer.php';
        break;

    case 'out':
        require_once 'out.php';
        break;
    
    default:
        require_once 'home.php';
        break;
}


require_once 'footer.php';
?>