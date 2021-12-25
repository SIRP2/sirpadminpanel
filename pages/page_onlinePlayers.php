<div class="app-main__outer">
<div class="app-main__inner">
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-drawer icon-gradient qb-core">
                </i>
            </div>
                <div>All Online Players
                    <div class="page-title-subheading">This page shows all players that are currently online!
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
                                <th>Online ID</th>
                                <th>Player Name</th>
                                <th>License (Rockstar License)</th>
                                <th>Discord ID</th>
                                <th>Steam Identifier</th>
                                <th>Ping</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php
                            $json = file_get_contents('http://192.158.233.99:30120/players.json'); /* USING A TEST SERVER AIDAN AND PLASMA USE */
                            $data = json_decode($json, true);

                            foreach($data as $newrow) {
                            echo 
                            '<td>'. $newrow["id"] .'</td>
                            <td>'. $newrow["name"] .'</td>
                            <td>'. $newrow["identifiers"][1] .'</td>
                            <td>'. $newrow["identifiers"][4] .'</td>
                            <td>'. $newrow["identifiers"][0] .'</td>
                            <td>'. $newrow["ping"] .'</td>
                            </tr>';
                            }
                        ?>
                    </tbody>
                </table>
			</div>
		</div>
	</div>
</div>