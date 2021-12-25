<?php
$usersession = $_GET["playerId"];
$result = $pdo->query("SELECT * FROM adminpanel_players WHERE ID = '$usersession'");
foreach($result as $row) 
{
    $userID = $row["id"];
    $playername = $row["playername"];
    $discord = $row["discord"];
    $steam = $row["steam"];
    $license = $row["license"];
    $firstjoin = $row["firstjoin"];
    $playtime = $row["playtime"];

    $d = floor ($playtime / 1440);
    $h = floor (($playtime - $d * 1440) / 60);
    $m = $playtime - ($d * 1440) - ($h * 60);
}
?>

<div class="app-main__outer">
<div class="app-main__inner">
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-id icon-gradient qb-core">
                </i>
            </div>
                <div>Player Information - <?php echo $playername; ?>(Player ID: <?php echo $userID; ?>)
                    <div class="page-title-subheading">On this page you can see more information about any player! If nothing shows go back to the Search Players tab and try again!
                </div>
            </div>
        </div>
    </div>
</div>

<div class="tab-content">
<div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
    <div class="row">
        <div class="col-lg-4">
            <div class="card text-center">
                <div class="card-header">General Information (Out-Of-Character)</div>
                    <div class="card-body">
                    <p><b>Player ID: </b><?php echo $userID; ?> </p>
                    <p><b>Player Name: </b><?php echo $playername; ?> </p>
                    <p><b>Discord: </b><?php echo $discord; ?> </p>
                    <p><b>Rockstar: </b><?php echo $license; ?> </p>
                    <p><b>Steam: </b><?php echo $steam; ?> (Click here for Steam Profile)</p>
                    <p><b>Playtime: </b><?php echo $d; ?> Days, <?php echo $h; ?> Hours, <?php echo $m; ?> Minutes</p>
                    <p><b>First Joined: </b><?php echo $firstjoin; ?> </p>
                </div>
            </div>
        </div>
        <div class="main-card mb-9 card"> <!-- TABLE -->
            <div class="card-header">List Of <?php echo $playername; ?>'s Characters</div>
                <div class="card-body"><h5 class="card-title"></h5>
                    <table class="mb-0 table table-hover">
                        <thead>
                        <tr>
                            <th>Character Name</th>
                            <th>Citizen ID</th>
                            <th>Last Active</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php
                                $character = $pdo->query("SELECT * FROM players WHERE license='$license'");
                                foreach($character as $newrow){
                                    $json = $newrow["charinfo"];
                                    $charactername = json_decode($json);

                                echo
                                '<td><a id="accentcolor" href="characterInfo.php?citizenid=' . $newrow['citizenid'] . '">'. $charactername->{'firstname'}. ' '.$charactername->{'lastname'}. '</td>
                                <td>'. $newrow['citizenid'] .'</td>
                                <td>'. $newrow['last_updated'] .'</td>
                                </tr>';
                                }
                            ?>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-4">
            <div class="card text-center">
                <div class="card-header">Manage User Punishments</div>
                    <div class="card-body">
                    <button class="mb-2 mr-2 btn btn-primary btn-lg btn-block"><a href="https://panel.aidanoh.art/newban.php?playername=<?php echo $playername; ?>&steam=<?php echo $steam; ?>&discord=<?php echo $discord; ?>&license=<?php echo $license; ?>">BAN PLAYER</a></button>
                    <button class="mb-2 mr-2 btn btn-primary btn-lg btn-block">KICK PLAYER</button>
                    <button class="mb-2 mr-2 btn btn-primary btn-lg btn-block"><a href="https://panel.aidanoh.art/newnote.php?playername=<?php echo $playername; ?>&playerid=<?php echo $usersession; ?>"> CREATE NEW NOTE</a></button>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<br>
<div class="main-card mb-9 card"> <!-- TABLE -->
<div class="card-header">List Of <?php echo $playername; ?>'s Notes</div>
    <div class="card-body"><h5 class="card-title"></h5>
        <table class="mb-0 table table-hover">
            <thead>
            <tr>
                <th>Unique Note ID</th>
                <th>Punished By</th>
                <th>Reason For Note</th>
                <th>Punished On</th>
                <th>Manage Note</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <?php
                $note = $pdo->query("SELECT * FROM adminpanel_notes WHERE noteid='$userID'");
                foreach($note as $newrow){
                
                echo 
                '<td>'. $newrow['noteid'] .'</td>
                <td>'. $newrow['punished_by'] .'</td>
                <td>'. $newrow['punish_reason'] .'</td>
                <td>'. $newrow['punished_time'] .'</td>
                <td>'. $newrow['punished_time'] .'</td>
                </tr>';
                }
            ?>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<br>
<div class="main-card mb-9 card"> <!-- TABLE -->
<div class="card-header">List Of <?php echo $playername; ?>'s Bans</div>
    <div class="card-body"><h5 class="card-title"></h5>
        <table class="mb-0 table table-hover">
            <thead>
            <tr>
                <th>Unique Note ID</th>
                <th>Punished By</th>
                <th>Reason For Note</th>
                <th>Punished On</th>
                <th>Manage Note</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <?php
                $note = $pdo->query("SELECT * FROM adminpanel_bans WHERE banid='$userID'");
                foreach($note as $newrow){
                
                echo 
                '<td>'. $newrow['noteid'] .'</td>
                <td>'. $newrow['punished_by'] .'</td>
                <td>'. $newrow['punish_reason'] .'</td>
                <td>'. $newrow['punished_time'] .'</td>
                <td>'. $newrow['punished_time'] .'</td>
                </tr>';
                }
            ?>
            </tr>
            </tbody>
        </table>
    </div>
</div>