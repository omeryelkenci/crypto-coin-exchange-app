<?php

require_once('src/Controller/CryptoDataController.php');

$crypto_data_controller = New CryptoDataController();
$data =  json_decode($crypto_data_controller->get_json_data()); 

?>
<!DOCTYPE html>
<html>
<head>
	<title>Skyned Project</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" >
</head>
<body>
	<div class="container content">
		<div class="text-center">
			<h1>Skyned Project</h1>
		</div>
		<div class="table-responsive">
			<table id="crypto-data-datatable" class="table table-striped">
				<thead>
					<tr role="row">
						<th class="sorting" tabindex="0">Rank</th>
						<th class="sorting" tabindex="0">Name</th>
						<th class="sorting" tabindex="0">Price</th>
						<th class="sorting" tabindex="0">Market Cap</th>
						<th class="sorting" tabindex="0">Vwap 24Hr</th>
						<th class="sorting" tabindex="0">Supply</th>
						<th class="sorting" tabindex="0">Volume 24Hr</th>
						<th class="sorting" tabindex="0">Change 24Hr</th>
						<th class="sorting" tabindex="0">Trade</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach ($data->data as $key => $value) {
							echo 
								'<tr> 
									<td>'.$value->rank.'</td>' .
									'<td>'.$value->name.'-'.$value->symbol.'</td>' .
									'<td>&#36;'.number_format($value->priceUsd, 2, '.', ',').'</td>' .
									'<td>'.round(number_format($value->marketCapUsd, 4, ',', '.'), 2).'b</td>' .
									'<td>&#36;'.number_format($value->vwap24Hr, 2, '.', ',').'</td>' .
									'<td>'.round(number_format($value->supply, 2, ',', '.'), 2).'m</td>' .
									'<td>'.round(number_format($value->volumeUsd24Hr, 4, ',', '.'), 2).'b</td>' .
									'<td>'.round($value->changePercent24Hr, 2).'%</td>' .
									'<td>Trade</td>' .
								'</tr>'
							;
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
	$(document).ready( function () {
		$('#crypto-data-datatable').DataTable();
	} );
</script>
</html>