<?php
if(isset($_POST['session_code'])){
    require 'database/database.php';
    require 'constants.php';
    $l_db = new database();
    $l_db->connection();
    $l_session_code = $_POST['session_code'];
    $l_session = $l_db->getSessionByCode($l_session_code)[0];
    if (isset($l_session['id_groupejoueur'])){
        $l_players = [];
        foreach ($l_db->getSessionByCode($l_session_code) as $l_player){
            $l_players[]=[
                'score'     => $l_player['score'],
                'nickname'  => $l_player['pseudo_groupe'],
            ];
        }
    }
}
else {
    header('Location: error.html');
}
$l_player_position = 0;
foreach ($l_players as $l_player){
    $l_is_my_name = ($l_player['nickname'] == $_POST['player_name']);
    ?>
    <div class="player<?php if ($l_is_my_name){echo ' me';}elseif($l_player_position % 2 == 0) {echo ' even';} ?>">
        <span class="left"><?php echo $l_player['nickname'] ; if ($l_is_my_name){echo ' (moi)';}?></span>
        <div class="right"><?php
            if ($l_player_position == 0) {
                ?><img id="crown" src="<?php echo K_IMAGE?>crown.png"><?php
            }
            echo $l_player['score'] ;?>
        </div>
    </div>
    <?php
    ++$l_player_position;
}