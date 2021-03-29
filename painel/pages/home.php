<?php
	$pegarUsuariosTotais = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios`");
	$pegarUsuariosTotais->execute();

	$pegarUsuariosTotais = $pegarUsuariosTotais->rowCount();

	$pegarRelatoriosTotais = MySql::conectar()->prepare("SELECT * FROM `tb_admin.relatorios`");
	$pegarRelatoriosTotais->execute();

	$pegarRelatoriosTotais = $pegarRelatoriosTotais->rowCount();

	$pegarFaturasTotais = MySql::conectar()->prepare("SELECT * FROM `tb_admin.faturas`");
	$pegarFaturasTotais->execute();

	$pegarFaturasTotais = $pegarFaturasTotais->rowCount();

	$user = $_SESSION['nome'];
?>

<?php if ($user == 'Tiberius'): ?>
	<div class="box-content w100">
			<h2><i class="fa fa-home"></i> Painel de Controle - <?php echo NOME_EMPRESA ?></h2>

			<div class="box-metricas">
				<div class="box-metrica-single">
					<div class="box-metrica-wraper">
						<h2>Trader Cadastrados</h2>
						<p><?php echo $pegarUsuariosTotais; ?></p>
					</div><!--box-metrica-wraper-->
				</div><!--box-metrica-single-->
				<div class="box-metrica-single">
					<div class="box-metrica-wraper">
						<h2>Total de Relatórios</h2>
						<p><?php echo $pegarRelatoriosTotais; ?></p>
					</div><!--box-metrica-wraper-->
				</div><!--box-metrica-single-->
				<div class="box-metrica-single">
					<div class="box-metrica-wraper">
						<h2>Total de Faturas</h2>
						<p><?php echo $pegarFaturasTotais ?></p>
					</div><!--box-metrica-wraper-->
				</div><!--box-metrica-single-->
				<div class="clear"></div>
			</div><!--box-metricas-->

	</div><!--box-content-->

	<div class="box-content w100 right">
	<h2><i class="fa fa-rocket" aria-hidden="true"></i> Lista de Usuários</h2>

		<div class="table-responsive">
			<div class="row">
				<div class="col">
					<span>Nome</span>
				</div><!--col-->
				<div class="col">
					<span>email</span>
				</div><!--col-->
				<div class="clear"></div>
			</div><!--row-->

			<?php
				$usuariosPainel = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios`");
				$usuariosPainel->execute();
				$usuariosPainel = $usuariosPainel->fetchAll();
				foreach ($usuariosPainel as $key => $value) {

			?>
			<div class="row">
				<div class="col">
					<span><?php echo $value['nome'] ?></span>
				</div><!--col-->
				<div class="col">
					<span><?php echo $value['user'] ?></span>
				</div><!--col-->
				<div class="clear"></div>
			</div><!--row-->
			<?php } ?>
		</div><!--table-responsive-->
	</div><!--box-content-->

	<div class="clear"></div>
<?php else: ?>
	<div class="box-content w100 right">
	<h2><i class="fa fa-rocket" aria-hidden="true"></i> Visão Geral - Relatórios</h2>

	<?php
		$graficos = MySql::conectar()->prepare("SELECT * FROM `tb_admin.relatorios` WHERE nome_usuario LIKE '%$user%'");
		$graficos->execute();
		$graficos = $graficos->fetchAll();
	?>

	<form class="left" method="get">
		<select name="mes">
			<option value="">Selecione o Mês</option>
			<option value="janeiro">Janeiro</option>
			<option value="fevereiro">Fevereiro</option>
			<option value="marco">Março</option>
			<option value="abril">Abril</option>
			<option value="maio">Maio</option>
			<option value="2026">2026</option>
			<option value="julho">Julho</option>
			<option value="agosto">Agosto</option>
			<option value="setembro">Setembro</option>
			<option value="outubro">Outubro</option>
			<option value="novembro">Novembro</option>
			<option value="dezembro">Dezembro</option>
		</select>
		<input type="submit" name="" value="Procurar">
	</form>

	<?php

		$mes = $_GET['mes'];

			if ($mes != '') {
				if ($mes == 'janeiro') {
					$mes = '01';
				}elseif ($mes == 'fevereiro') {
					$mes = '02';
				}elseif ($mes == 'marco') {
					$mes = '03';
				}elseif ($mes == 'abril') {
					$mes = '04';
				}elseif ($mes == 'maio') {
					$mes = '05';
				}elseif ($mes == 'junho') {
					$mes = '06';
				}elseif ($mes == 'julho') {
					$mes = '07';
				}elseif ($mes == 'agosto') {
					$mes = '08';
				}elseif ($mes == 'setembro') {
					$mes = '09';
				}elseif ($mes == 'outubro') {
					$mes = '10';
				}elseif ($mes == 'novembro') {
					$mes = '11';
				}elseif ($mes == 'dezembro') {
					$mes = '12';
				}else {
					echo '';
				}
			}else {
				$mes = 'Não existe relatórios ainda';
			}


		$graficoRelatorios = MySql::conectar()->prepare("SELECT * FROM `tb_admin.relatorios` WHERE nome_usuario LIKE '%$user%'");
		$graficoRelatorios->execute();

		$json = [];
		$json2 = [];
		// $json3 = [];

		while ($row = $graficoRelatorios->fetch(PDO::FETCH_ASSOC)) {
			$date = $row['data'];
			$dateMes = $row['data'];
			$gain = $row['gain'];
			$loss = $row['los'];
			$corretagem = $row['corretagem'];
			$registro = $row['registro'];
			$ir = $row['ir'];
			$iss = $row['iss'];
			$valor1 = $row['valor'];
			$dateMes = explode('/', $dateMes);
			$dateMes = $dateMes[1];

			if ($mes == $dateMes) {
				$json[] = $date;
				$json2[] = $gain-$loss-$corretagem-$registro-$ir-$iss;
			}

			// $json3[] = 'rgba(50, 168, 82, 0.2)';
		}
	?>

	<div class="box-content w100">
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

		<canvas id="myChart" width="400" height="200"></canvas>
		<script>
			const ctx1 = document.getElementById('myChart').getContext('2d');
			const data = <?php echo json_encode($json2) ?>;
			// const colours = data.map((value) => value < 0 ? 'red' : 'green');

			new Chart(ctx1, {
			  type: 'bar',
			  data: {
			    labels: <?php echo json_encode($json); ?>,
			    datasets: [{
			      label: "Valores (Mês)",
			      borderColor: 'rgba(140, 179, 255, 0.2)',
			      backgroundColor: 'rgba(140, 179, 255, 0.2)',
			      data: data,
			      fill: false,

			    }]
			  },
			  options: {
			    legend: {
			    	display: true
			    },

			    //Escalas
			    scales: {
			          yAxes: [{ //Eixo Y
			              display: true,
			              ticks: {
			                  beginAtZero: true   //Começa no zero
			              }
			          }]
			    }
			  }
			})

		</script>
	</div>
	</div><!--box-content-->


	<div class="box-content w100 right">
	<h2><i class="fa fa-rocket" aria-hidden="true"></i> Visão Geral - Faturas</h2>

	<?php
		$graficosFaturas = MySql::conectar()->prepare("SELECT * FROM `tb_admin.faturas` WHERE trader LIKE '%$user%'");
		$graficosFaturas->execute();
		$graficosFaturas = $graficosFaturas->fetchAll();
	?>

	<form class="left" method="get">
		<select name="anoFatura">
			<option value="">Selecione o Ano</option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
			<option value="2023">2023</option>
			<option value="2024">2024</option>
			<option value="2025">2025</option>
			<option value="2026">2026</option>
			<option value="2027">2027</option>
			<option value="2028">2028</option>
			<option value="2029">2029</option>
			<option value="2030">2030</option>
		</select>
		<input type="submit" name="" value="Procurar">
	</form>

	<?php

		$anoFatura = $_GET['anoFatura'];

		$mediaFatura = MySql::conectar()->prepare("SELECT * FROM `tb_admin.faturas` WHERE trader LIKE '%$user%'");
		$mediaFatura->execute();

		$json4 = [];
		$json5 = [];
		// $json6 = [];

		while ($row = $mediaFatura->fetch(PDO::FETCH_ASSOC)) {
			$date = $row['data'];
			$dateAno = $row['data'];
			$money = $row['valor'];
			$dateAno = explode('/', $dateAno);
			$dateAno = $dateAno[2];

			if ($anoFatura == $dateAno) {
				$json4[] = $date;
				$json5[] = (int)$money;
			}

			// $json6[] = 'rgba(50, 168, 82, 0.2)';
		}
	?>

	<div class="box-content w100">

		<canvas id="myChart2" width="400" height="200"></canvas>
		<script>
			const ctx2 = document.getElementById('myChart2').getContext('2d');
			const array = <?php echo json_encode($json5) ?>;
			const color = data.map((array) => array < 0 ? 'red' : 'green');

			new Chart(ctx2, {
				type: 'bar',
				data: {
					labels: <?php echo json_encode($json4); ?>,
					datasets: [{
						label: "Valores (Mês)",
						backgroundColor: 'rgba(255, 99, 132, 0.2)',
						data: array,
						fill: false,

					}]
				},
				options: {
					legend: {
						display: true
					},

					//Escalas
					scales: {
						yAxes: [{ //Eixo Y
								display: true,
								ticks: {
										beginAtZero: true
								},
						}]
					}
				}
			})
		</script>
	</div>
	</div><!--box-content-->

	<div class="clear"></div>

<?php endif; ?>
