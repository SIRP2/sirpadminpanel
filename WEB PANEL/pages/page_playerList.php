<div class="app-main__outer">
<div class="app-main__inner">
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users icon-gradient qb-core">
                </i>
            </div>
                <div>Player Search
                    <div class="page-title-subheading">This page shows all unique players that have joined your server. You can click on the player's name to view more information about that player!
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
                                <th>Player ID</th>
                                <th>Player Name</th>
                                <th>License (Rockstar License)</th>
                                <th>Discord ID</th>
                                <th>Steam Identifier</th>
                                <th>First Join</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php
                            $uniqueuser = $pdo->query("SELECT * FROM adminpanel_players");
                            foreach($uniqueuser as $newrow){
                            
                            echo 
                            '<td>'. $newrow['id'] .'</td>
                            <td><a id="accentcolor" href="playerInfo.php?playerId=' . $newrow['id'] . '">'. $newrow['playername'].'</td>
                            <td>'. $newrow['license'] .'</td>
                            <td>'. $newrow['discord'] .'</td>
                            <td>'. $newrow['steam'] .'</td>
                            <td>'. $newrow['firstjoin'] .'</td>
                            </tr>';
                            }
                        ?>
                    </tbody>
                </table>
			</div>
		</div>
	</div>
</div>