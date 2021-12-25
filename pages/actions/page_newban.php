<?php
$playername = $_GET["playername"];
$discord = $_GET["discord"];
$steam = $_GET["steam"];
$license = $_GET["license"];

function generateBanID($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>

<div class="app-main__outer">
<div class="app-main__inner">
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-hammer icon-gradient qb-core">
                </i>
            </div>
                <div>Create New Ban
                    <div class="page-title-subheading">You're currently creating a new ban for <?php echo $playername ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="tab-content">
<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
    <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Player Info</h5>
            <form class="">
                <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Player Name</label>
                    <div class="col-sm-10"><input class="form-control" value="<?php echo $playername ?>" readonly></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Player's Discord ID</label>
                    <div class="col-sm-10"><input class="form-control" value="<?php echo $discord ?>" readonly></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Player's Steam Identifier</label>
                    <div class="col-sm-10"><input class="form-control" value="<?php echo $steam ?>" readonly></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Player's Rockstar License </label>
                    <div class="col-sm-10"><input class="form-control" value="<?php echo $license ?>" readonly></div>
                </div>
                <h5 class="card-title">Ban Length</h5>
                FOR PERMENANT BANS: If you wish to issue a permenant ban, leave Months, Days & Hours all as 0<br>
                <br><div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Months:</label>
                    <div class="col-sm-10"><input class="form-control" input type="number" value="0"></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Days:</label>
                    <div class="col-sm-10"><input class="form-control" input type="number" value="1"></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Hours:</label>
                    <div class="col-sm-10"><input class="form-control" input type="number" value="0"></div>
                </div>
                <h5 class="card-title">Other Ban Information</h5>
                <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Ban ID</label>
                    <div class="col-sm-10"><input class="form-control" value="<?php echo generateBanID(); ?>" readonly></div>
                </div>
                <div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Ban Reason</label>
                    <div class="col-sm-10"><input class="form-control" placeholder="Remember to include your ban reason!"></div>
                </div>
                <div class="position-relative row form-check">
                    <div class="col-sm-10 offset-sm-2">
                        <button class="btn btn-primary">Submit Ban</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>