<?php
$vehicle = $_GET["plate"];
$result = $pdo->query("SELECT * FROM player_vehicles WHERE plate = '$vehicle'");
foreach($result as $row) 
{
    $vehicleid = $row["id"];
    $citizenid = $row["citizenid"];
    $realplate = $row["plate"];
    $fakeplate = $row["fakeplate"];
    $model = $row["vehicle"];
    $modelhash = $row["hash"];
    $garage = $row["garage"];
    $fuel = $row["fuel"];
    $engine = $row["engine"];
    $body = $row["body"];
    $mileage = $row["drivingdistance"];
    $milageformatted = number_format($mileage);
}
?>

<div class="app-main__outer">
<div class="app-main__inner">
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-car icon-gradient qb-core">
                </i>
            </div>
                <div>Vehicle Information - <?php echo $vehicle; ?>
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
                <div class="card-header">General Information</div>
                    <div class="card-body">
                    <p><b>Vehicle Owned By: </b><?php echo $citizenid; ?> </p>
                    <p><b>License Plate: </b><?php echo $realplate; ?> </p>
                    <p><b>Fake Plate (If Applicable): </b><?php echo $fakeplate; ?> </p>
                    <p><b>Vehicle Model (Hash): </b><?php echo $model; ?>(<?php echo $modelhash; ?>) </p>
                    <p><b>Current Garage: </b><?php echo $garage; ?></p>
                    <p><b>Vehicle ID: </b><?php echo $vehicleid; ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card text-center">
                <div class="card-header">Vehicle Info</div>
                    <div class="card-body">
                    <p><b>Fuel Level: </b><?php echo $fuel; ?>% </p>
                    <p><b>Engine Status: </b><?php echo $engine; ?> / 1000</p>
                    <p><b>Body Status: </b><?php echo $body; ?> / 1000</p>
                    <p><b>Distance Driven: </b><?php echo $milageformatted; ?> (UNKNOWN UNITS</p>
                    <p><b>Tuned? </b>< YES OR NO ></p>
                    <p><b>Tuned? </b>< YES OR NO ></p>
                </div>
            </div>
        </div>
            <div class="col-lg-4">
            <div class="card text-center">
                <div class="card-header">Manage Vehicle Information</div>
                    <div class="card-body">
                    <button class="mb-2 mr-2 btn btn-primary btn-lg btn-block">EDIT REAL LICENSE PLATE</button>
                    <button class="mb-2 mr-2 btn btn-primary btn-lg btn-block">EDIT FAKE LICENSE PLATE</button>
                    <button class="mb-2 mr-2 btn btn-primary btn-lg btn-block">IMPOUND VEHICLE</button>
                    <button class="mb-2 mr-2 btn btn-primary btn-lg btn-block">CHANGE CURRENT PARKED GARAGE</button>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>