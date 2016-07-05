<?php
// Условие для лендинга
if (current_path()=='node/90116' or
    current_path()=='node/92220' or
    current_path()=='node/92221' or
    current_path()=='node/95924') {
			 	$str_addres = current_path();
				$str_addres = str_replace("node/","",$str_addres);
			include('page--'.$str_addres.'.tpl.php');
		}

else {

if( (isset($_SESSION['division']) AND $_SESSION['division'] == "student")){
    include('page-student.tpl.php');
        } else {
            include('page-school.tpl.php');
        }

}
