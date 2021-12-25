<div class="app-main__outer">
<div class="app-main__inner">
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-car icon-gradient qb-core">
                </i>
            </div>
                <div>Player-Owned Vehicle List
                    <div class="page-title-subheading">This page shows all player-owned vehicles that are owned on your server!
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="header-title"></h4>
                    <table id="basic-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Vehicle ID</th>
                                <th>License Plate</th>
                                <th>Owned By (Citizen ID) </th>
                                <th>Vehicle Model</th>
                                <th>Vehicle Model Hash</th>
                                <th>Current Garage</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php
                            $uniquevehicle = $pdo->query("SELECT * FROM player_vehicles");
                            foreach($uniquevehicle as $newrow){
                                $citid = $newrow['citizenid'];

                            $charname = $pdo->query("SELECT * FROM players WHERE citizenid='$citid'");
                            foreach($charname as $newrow2){
                                $json = $newrow2["charinfo"];
                                $charactername = json_decode($json);
                            }
                            
                            echo 
                                '<td>'. $newrow['id'] .'</td>
                                <td><a id="accentcolor" href="vehicleInfo.php?plate=' . $newrow['plate'] . '">'. $newrow['plate'].' </td>
                                <td><a id="accentcolor" href="characterInfo.php?citizenid=' . $newrow['citizenid'] . '">'. $charactername->{'firstname'}. ' '.$charactername->{'lastname'}. ' ('. $newrow['citizenid'].')</td>
                                <td>'. $newrow['vehicle'] .'</td>
                                <td>'. $newrow['hash'] .'</td>
                                <td>'. $newrow['garage'] .'</td>
                                </tr>';
                            }
                        ?>
                    </tbody>
                </table>
			</div>
		</div>
	</div>
</div>