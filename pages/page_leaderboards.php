<div class="app-main__outer">
<div class="app-main__inner">
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-network icon-gradient qb-core">
                </i>
            </div>
                <div>Leaderboards
                    <div class="page-title-subheading">On this page you can see all leaderboards for your server!
                </div>
            </div>
        </div>
    </div>
</div>
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    PLEASE NOTE: You can click on the headers on the table, such as <b>Bank Account Amount</b>, to sort by smallest or largest numbers!
</div>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="header-title"><b>Richest Players</b></h4>
                    <table id="basic-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Character ID</th>
                                <th>Character Name (Citizen ID)</th>
                                <th>Bank Account Amount</th>
                                <th>Cash Account Amount</th>
                                <th>Crypto Account Amount</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php
                            $uniquecharacter = $pdo->query("SELECT * FROM players");
                            foreach($uniquecharacter as $newrow){
                                $json = $newrow["charinfo"];
                                $charactername = json_decode($json);
                                $eachcid = $newrow['citizenid'];

                            $uniqueaccount = $pdo->query("SELECT * FROM players WHERE citizenid='$eachcid'");
                            foreach($uniqueaccount as $newrow2){
                                $json2 = $newrow2["money"];
                                $bankaccount = json_decode($json2);
                            }

                            echo 
                            '<td>'. $newrow['id'] .'</td>
                            <td><a id="accentcolor" href="characterInfo.php?citizenid=' . $newrow['citizenid'] . '">'. $charactername->{'firstname'}. ' '.$charactername->{'lastname'}. ' ('. $newrow['citizenid'].')</td>
                            <td>$'. $bankaccount->{'bank'} .'</td>
                            <td>$'. $bankaccount->{'cash'} .'</td>
                            <td>'. $bankaccount->{'crypto'} .'</td>
                            </tr>';
                            }
                        ?>
                    </tbody>
                </table>
			</div>
		</div>
	</div>
</div>