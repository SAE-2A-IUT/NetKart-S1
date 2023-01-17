<?php
/**
 *
 * @param $l_username
 * @param $l_date
 * @return string
 */
function getSessionCode($l_username, $l_date){
    $l_username = substr(bin2hex($l_username),0,2);

    $l_session = $l_username. bin2hex($l_date) ;

    return  $l_username. dechex($l_date);
}


header('Location: create-session.php?success=true&session='.getSessionCode('Tibo',date('is')));
?>
