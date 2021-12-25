<div class="app-main__outer">
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-menu icon-gradient qb-core">
                    </i>
                </div>
                <div>Ban List
                    <div class="page-title-subheading">This page displays all bans that have been made on the server all time!
                    </div>
                </div>
            </div>
        </div>
    </div>    

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="header-title"><b>Current Bans</b></h4>
                    <table id="basic-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Ban ID</th>
                                <th>Banned Player</th>
                                <th>Banned By</th>
                                <th>Ban Duration</th>
                                <th>Ban Reason</th>
                                <th>Ban Date</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php
                            $ban = $pdo->query("SELECT * FROM adminpanel_bans");
                            foreach($ban as $newrow){
                                $rockstar = $newrow['banned_license'];
                                $bannedbyid = $newrow['bannedby'];

                            $ban2 = $pdo->query("SELECT * FROM adminpanel_players WHERE license='$rockstar'");
                            foreach($ban2 as $newrow2){
                                $bannedplayername = $newrow2["playername"];
                            }

                            $ban3 = $pdo->query("SELECT * FROM adminpanel_staff WHERE id='$bannedbyid'"); 
                            foreach($ban3 as $newrow3){
                                $bannedbyname = $newrow3["name"];
                            }

                            echo 
                            '<td>'. $newrow['banid'] .'</td>
                            <td><a id="accentcolor" href="playerInfo.php?playerId=' . $newrow2['id'] . '">'. $newrow2['playername'].'</td>
                            <td>'. $newrow3['name'] .'</td>
                            <td>'. $newrow['banned_by'] .'</td>
                            <td>'. $newrow['ban_reason'] .'</td>
                            <td>'. $newrow['ban_date'] .'</td>
                            </tr>';
                            }
                        ?>
                    </tbody>
                </table>
			</div>
		</div>
	</div>
</div> 
