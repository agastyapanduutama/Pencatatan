
<br>

<div class="card">

	<div class="row">
		<div class="col-6">
			<div class="card-header">
				<h4>Chart Masuk dan Keluar Gula</h4>
			</div>
			<div class="card-body">
				<div class="position-relative mb-4">
					<canvas id="sales-chart" height="200"></canvas>
				</div>
			</div>
		</div>
		<div class="col-6">

			<div class="card-header">
				<h4>Chart Masuk dan Keluar Keuangan</h4>
			</div>
			<div class="card-body">
				<div class="position-relative mb-4">
					<canvas id="money-chart" height="200"></canvas>
				</div>
			</div>
		</div>

		<div class="col-6">
			<canvas id="akumulasiBarang" height="200"></canvas>
		</div>
		<div class="col-6">
			<canvas id="akumulasiUang" height="200"></canvas>
		</div>

	</div>
</div>



<div class="row">
	<div class="col-sm-12 col-md-4">
		<div class="card card-stats card-round">
			<div class="card-body ">
				<div class="row align-items-center">
					<div class="col-icon">
						<div class="icon-big text-center icon-primary bubble-shadow-small">
							<i class="fas fa-balance-scale"></i>
						</div>
					</div>
					<div class="col col-stats ml-3 ml-sm-0">
						<div class="numbers">
							<p class="card-category">Jumlah Transaksi</p>
							<h4 class="card-title"><?= $total ?></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-12 col-md-4">
		<div class="card card-stats card-round">
			<div class="card-body">
				<div class="row align-items-center">
					<div class="col-icon">
						<div class="icon-big text-center icon-success bubble-shadow-small"><i class="fab fa-stack-exchange"></i>
						</div>
					</div>
					<div class="col col-stats ml-3 ml-sm-0">
						<div class="numbers">
							<p class="card-category">Jumlah Transaksi Masuk</p>
							<h4 class="card-title"><?= $totalMasuk ?></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-12 col-md-4">
		<div class="card card-stats card-round">
			<div class="card-body">
				<div class="row align-items-center">
					<div class="col-icon">
						<div class="icon-big text-center icon-danger bubble-shadow-small"><i class="fas fa-exchange-alt"></i>
						</div>
					</div>
					<div class="col col-stats ml-3 ml-sm-0">
						<div class="numbers">
							<p class="card-category">Jumlah Transaksi Keluar</p>
							<h4 class="card-title"><?= $totalkeluar ?></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<div class="card">
	<div class="card-header">
		<div class="card-head-row">
			<h4 class="card-title">10 Transaksi Terakhir</h4>
			<div class="card-tools">
				<button onclick="window.location.reload()"
					class="btn btn-icon btn-link btn-primary btn-xs btn-refresh-card"><span
						class="fa fa-sync-alt"></span></button>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive table-hover table-sales">
			<table id="example2" class="table">
				<thead>
					<tr>
						<td>No</td>
						<td>Waktu Transaksi</td>
						<td>Jenis Transaksi</td>
						<td>Jumlah</td>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
                    foreach ($lastTransaction as $last) : ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $last->created_at ?></td>

						<td><?php echo($last->jenis_transaksi == "1") ? "<span class='btn btn-xs btn-success'>Masuk</span>" : "<span class='btn btn-xs btn-danger'>Keluar</span>"?>
						</td>
						<td><?= $last->jumlah ?> <?= $last->singkatan?></td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>

</div>



<script src="<?= base_url() ?>assets/admin//assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?= base_url('assets/js/Chart.min.js') ?>"></script>


<script>
	var xValues = ["Pengluaran", "Pemasukan",];
	var yValues = [<?= $akumulasiBarangMasuk->jumlah?>, <?= $akumulasiBarangKeluar->jumlah?>];
	var barColors = [
		"#b91d47",
		"#00aba9",
	];

	new Chart("akumulasiBarang", {
	type: "pie",
	data: {
		labels: xValues,
		datasets: [{
		backgroundColor: barColors,
		data: yValues
		}]
	},
	options: {
		title: {
		display: true,
		text: "Akumulasi Transaksi Barang Tahun <?= date("Y")?>"
		}
	}
	});
	var xValues = ["Pengluaran", "Pemasukan",];
	var yValues =[<?= $akumulasiUangMasuk->jumlah?>, <?= $akumulasiUangKeluar->jumlah?>];
	var barColors = [
		"#b91d47",
		"#00aba9",
	];

	new Chart("akumulasiUang", {
	type: "pie",
	data: {
		labels: xValues,
		datasets: [{
		backgroundColor: barColors,
		data: yValues
		}]
	},
	options: {
		title: {
		display: true,
		text: "akumulasi Transaksi Keuangan Tahun <?= date("Y")?>"
		}
	}
	});
</script>

<script>


	

	$(function () {
		'use strict'
		var ticksStyle = {
			fontColor: '#495057',
			fontStyle: 'bold'
		}
		var mode = 'index'
		var intersect = true
		var $salesChart = $('#sales-chart')
		var salesChart = new Chart($salesChart, {
			type: 'bar',
			data: {
				labels: [
					<?php foreach($masukbarang as $masuk):?>
						"<?= $this->req->getBulan($masuk->bulan)?>",	
					<?php endforeach?>
				],
				datasets: [{
					backgroundColor: '#007bff',
					borderColor: '#007bff',
					data: [
						<?php foreach($masukbarang as $masuk):?>
							<?= $masuk->jumlah?>,	
						<?php endforeach?>
					]}, {
					backgroundColor: '#ced4da',
					borderColor: '#ced4da',
					data: [
						<?php foreach($keluarbarang as $keluar):?>
							<?= $keluar->jumlah?>,	
						<?php endforeach?>
					]
				}]
			},
			options: {
				maintainAspectRatio: false,
				tooltips: {
					mode: mode,
					intersect: intersect
				},
				hover: {
					mode: mode,
					intersect: intersect
				},
				legend: {
					display: false
				},
			}
		})
	})
	$(function () {
		'use strict'
		var ticksStyle = {
			fontColor: '#495057',
			fontStyle: 'bold'
		}
		var mode = 'index'
		var intersect = true
		var $salesChart = $('#money-chart')
		var salesChart = new Chart($salesChart, {
			type: 'bar',
			data: {
				labels: [
					<?php foreach($masukuangbarang as $masuk):?>
						"<?= $this->req->getBulan($masuk->bulan)?>",	
					<?php endforeach?>
				],
				datasets: [{
					backgroundColor: '#007bff',
					borderColor: '#007bff',
					data: [
						<?php foreach($masukuangbarang as $masukna):?>
							<?= $masukna->jumlah?>,	
						<?php endforeach?>
					]}, {
					backgroundColor: '#ced4da',
					borderColor: '#ced4da',
					data: [
						<?php foreach($keluaruangbarang as $keluarna):?>
							<?= $keluarna->jumlah?>,	
						<?php endforeach?>
					]
				}]
			},
			options: {
				maintainAspectRatio: false,
				tooltips: {
					mode: mode,
					intersect: intersect
				},
				hover: {
					mode: mode,
					intersect: intersect
				},
				legend: {
					display: false
				},
			}
		})
	})
</script>
