<div class="app-main__outer">
<div class="app-main__inner">
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-drawer icon-gradient qb-core">
                </i>
            </div>
                <div>Character Search
                    <div class="page-title-subheading">This page shows all unique characters that have been created. You can click on the character name to view more information about that character!
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
                                <th>Character ID</th>
                                <th>Character Name (Citizen ID)</th>
                                <th>License (Rockstar License)</th>
                                <th>Account Owner</th>
                                <th>Last Connection</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php
                            $uniquecharacter = $pdo->query("SELECT * FROM players");
                            foreach($uniquecharacter as $newrow){
                                $json = $newrow["charinfo"];
                                $charactername = json_decode($json);

                            echo 
                            '<td>'. $newrow['id'] .'</td>
                            <td><a id="accentcolor" href="characterInfo.php?citizenid=' . $newrow['citizenid'] . '">'. $charactername->{'firstname'}. ' '.$charactername->{'lastname'}. ' ('. $newrow['citizenid'].')</td>
                            <td>'. $newrow['license'] .'</td>
                            <td>'. $newrow['name'] .'</td>
                            <td>'. $newrow['last_updated'] .'</td>
                            </tr>';
                            }
                        ?>
                    </tbody>
                </table>
			</div>
		</div>
	</div>
</div>