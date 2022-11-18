<?php
require 'header.php';
startPage("Détails de la session",[K_STYLE."main",K_STYLE."host-session"],[]);

$l_player_two = [ 'score' => 6942, 'nickname' => 'Infelix'];
$l_player_three = [ 'score' => 4321, 'nickname' => 'Pelote'];
$l_player_four = [ 'score' => 0, 'nickname' => 'Tipo'];
$l_player_one = [ 'score' => 9999, 'nickname' => 'Mario(n)'];

$l_players = [$l_player_one,$l_player_two,$l_player_three,$l_player_four];

?>


<div class="body">
    <div class="left">
        <h1>Participants</h1>
        <?php
        $l_player_position = 0;
        foreach ($l_players as $l_player){
            ?>
            <div class="player<?php if ($l_player_position % 2 == 0) {echo ' even';} ?>">
                <span class="left"><?php echo $l_player['nickname'] ;?></span>
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
        ?>
    </div>
    <div class="right">
        <h1>Temps restant</h1>
        <span>03 : 14 : 15</span>
        <h1>Code session</h1>
        <span>ARJM3D</span>
    </div>
</div>

<?php
require 'footer.php';
endPage();
?>
