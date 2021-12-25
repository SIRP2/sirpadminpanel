<?php
$citizenid = $_GET["citizenid"];
$character = $pdo->query("SELECT * FROM players WHERE citizenid = '$citizenid'");
foreach($character as $row){
    $charid = $row["id"];
    $rockstar = $row["license"];
    $owner = $row["name"];
    $lastplayed = $row["last_updated"];
    $jsoncharinfo = $row["charinfo"];
    $charinfo = json_decode($jsoncharinfo);
    $jsonmetadata = $row["metadata"];
    $metadata = json_decode($jsonmetadata);
    $jsonmoney= $row["money"];
    $money = json_decode($jsonmoney);
    $moneyformatted = number_format($money);
    $jsonjob= $row["job"];
    $job = json_decode($jsonjob);
    $jsongang= $row["gang"];
    $gang = json_decode($jsongang);
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
                <div>Character Information - <?php echo $citizenid; ?> (<?php echo $charinfo->{'firstname'}; ?> <?php echo $charinfo->{'lastname'}; ?>)
                    <div class="page-title-subheading">On this page you can see more information about any character! If nothing shows go back to the Search Characters tab and try again!
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
                    <p><b>Character ID: </b><?php echo $charid; ?> </p>
                    <p><b>Owned By:</b> <?php echo $owner; ?></p>
                    <p><b>Last Played:</b> <?php echo $lastplayed; ?></p>
                    <p><b>License:</b> <?php echo $rockstar; ?></p>
                    <p><b>Discord ID:</b> Pending Add</p>
                    <p><b>User ID:</b> Pending Add</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card text-center">
                <div class="card-header">General Information (In-Character)</div>
                    <div class="card-body">
                    <p><b>Character Name:</b> <?php echo $charinfo->{'firstname'}; ?> <?php echo $charinfo->{'lastname'}; ?></p>
                    <p><b>Nationality:</b> <?php echo $charinfo->{'nationality'}; ?></p>
                    <p><b>Gender:</b> <?php echo $charinfo->{'gender'}; ?></p>
                    <p><b>Birthdate:</b> <?php echo $charinfo->{'birthdate'}; ?></p>
                    <p><b>Phone Number:</b> <?php echo $charinfo->{'phone'}; ?></p>
                    <p><b>Blood Type:</b> <?php echo $metadata->{'bloodtype'}; ?></p>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper"> Change Phone Number</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card text-center">
                <div class="card-header">Banking Information</div>
                    <div class="card-body">
                    <p><b>Account Number:</b> $<?php echo $charinfo->{'account'}; ?></p>
                    <p><b>Wallet ID:</b> $<?php echo $metadata->{'walletid'}; ?></p>
                    <p><b>Bank:</b> $<?php echo $money->{'bank'}; ?></p>
                    <p><b>Cash:</b> $<?php echo $money->{'cash'}; ?></p>
                    <p><b>Crypto:</b> $<?php echo $money->{'crypto'}; ?></p>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper"> Alter Bank Amount </span>
                    </button>

                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper"> Alter Cash Amount </span>
                    </button>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<br>

<div class="tab-content">
<div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
    <div class="row">
        <div class="col-lg-4">
            <div class="card text-center">
                <div class="card-header">Job Information</div>
                    <div class="card-body">
                    <p><b>Job:</b> <?php echo $job->{'label'}; ?></p>
                    <p><b>Job Grade:</b> <?php echo $job->{'grade, name'}; ?></p> <!-- GOTTA FIGURE OUT HOW TO DO JSON INSIDE JSON? *if that make sense* -->
                    <p><b>Job Payment:</b> $<?php echo $job->{'payment'}; ?></p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card text-center">
                <div class="card-header">Gang Information</div>
                    <div class="card-body">
                    <p><b>Gang Name:</b> <?php echo $gang->{'label'}; ?></p>
                    <p><b>Gang Rank:</b> <?php echo $gang->{'label'}; ?></p>
                    <p><b>Is Boss?</b> <?php echo $gang->{'isboss'}; ?></p>
                </div>
            </div>
        </div>

        <div class="main-card mb-9 card">
            <div class="card-header">Apartments Information</div>
                <div class="card-body"><h5 class="card-title"></h5>
                    <table class="mb-0 table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Apartment Name</th>
                            <th>Apartment Type</th>
                            <th>Apartment Specific Location</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php
                                $apartment = $pdo->query("SELECT * FROM apartments WHERE citizenid='$citizenid'");
                                foreach($apartment as $newrow){
                                
                                echo 
                                '<td>1</td>
                                <td>'. $newrow['name'] .'</td>
                                <td>'. $newrow['type'] .'</td>
                                <td>'. $newrow['label'] .'</td>
                                </tr>';
                                }
                            ?>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>