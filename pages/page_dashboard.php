<?php
$result = $pdo->query("SELECT count(*) FROM players"); 
$Stat1 = $result->fetchColumn();

$result2 = $pdo->query("SELECT count(*) FROM adminpanel_players"); 
$Stat2 = $result2->fetchColumn();

$result3 = $pdo->query("SELECT count(*) FROM adminpanel_bans"); 
$Stat3 = $result3->fetchColumn();

$arrContextOptions=array(
      "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );  
$apiversion = file_get_contents('https://api.aidanoh.art/adminpanel_version.json', false, stream_context_create($arrContextOptions));
$apilink = file_get_contents('https://api.aidanoh.art/adminpanel_link.json', false, stream_context_create($arrContextOptions));
$panelversion = file_get_contents('./functions/currentversion.json');

?>

<div class="app-main__outer">
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-menu icon-gradient qb-core">
                    </i>
                </div>
                <div>Dashboard
                    <div class="page-title-subheading">This dashboard shows all statistics about your server and is the main home page of the admin panel!
                    </div>
                </div>
            </div>
        </div>
    </div>   

    <?php
    if($apiversion > $panelversion)
    {echo '<div class="alert alert-danger fade show"><h4 class="alert-heading"><b>OUTDATED PANEL VERSION</b></h4><p>This version of the panel is outdated. You are on v'.$panelversion.' and the latest version is currently v'.$apiversion.' - Update now by clicking <a href="'.$apilink.'"> <b>HERE</b></a></p></div>';}
    ?>
    
    <li class="list-group-item-danger list-group-item"><b>WARNING: This panel is no where near ready for main stream use. We do not recomend that you use it in a live environment</b></li>
    <br>

<div class="row">
<div class="col-md-6 col-xl-4">
    <div class="card mb-3 widget-content">
        <div class="widget-content-outer">
            <div class="widget-content-wrapper">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Characters</div>
                    <div class="widget-subheading">Number of unique characters created on the server</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-danger"><?php echo $Stat1; ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6 col-xl-4">
    <div class="card mb-3 widget-content">
        <div class="widget-content-outer">
            <div class="widget-content-wrapper">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Users</div>
                    <div class="widget-subheading">Number of unique players that have joined the server</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-danger"><?php echo $Stat2; ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6 col-xl-4">
    <div class="card mb-3 widget-content">
        <div class="widget-content-outer">
            <div class="widget-content-wrapper">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Bans</div>
                    <div class="widget-subheading">Total number of unique bans served ever</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-danger"><?php echo $Stat3; ?></div>
                </div>
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
                <div class="card-header">CURRENT SESSION INFO (FOR TESTING PURPOSES)</div>
                    <div class="card-body">
                    <p><b>Staff Name: </b><?=$_SESSION['name']?> </p>
                    <p><b>Staff ID: </b><?=$_SESSION['id']?> </p>
                    <p><b>Staff Role: </b><?=$_SESSION['role']?> </p>
                    <p><b>Discord ID: </b><?=$_SESSION['discord']?> </p>
                    <p><b>Rockstar License: </b><?=$_SESSION['rockstar']?> </p>
                </div>
            </div>
        </div>

        <div class="card text-center">
                <div class="card-header">CURRENT VERSIONS</div>
                    <div class="card-body">
                    <p><b>Panel version: </b>v<?php echo $panelversion; ?> </p>
                    <p><b>API Version: </b>v<?php echo $apiversion ?> </p>
                    <p><b>Outdated? </b><?php if($apiversion > $panelversion){echo "true";}else{echo "false";} ?> </p>
                </div>
            </div>
        </div>
</div>