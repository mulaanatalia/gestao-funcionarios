<?php
@session_start();
include_once "../../../includes.php";
include_once "../../../app/api/callapi.php";

$extras = new Extras();

$response = callapi($mainUrl . "aluno/" . $_GET['id'], "GET");


$data = [
    "estado" => $_GET['estado'] ?? null,
    "aluno_id" => $_GET['id'] ?? null,
    "servico_id" => $_GET['servico_id'] ?? null,
    "escola_id"=>!empty($_GET['escola_id']) ? $_SESSION["escola_id"] : null,
    "delegacao_id" => $_GET['delegacao_id'] ?? null,
    "page" => 1,
    "per_page" => 20,
];

$pedido = callapi($mainUrl . "pedido", "GET", $data);
// print_r($pedido);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Ficha do Aluno</title>
	<style>
		body {
			font-family: Arial, sans-serif;
		}
		h1 {
			text-align: center;
			margin-top: 0;
		}
		table {
			width: 100%;
			border-collapse: collapse;
			margin-bottom: 20px;
		}
		th, td {
			padding: 10px;
			text-align: left;
			border: 1px solid #ddd;
		}
		th {
			background-color: #f2f2f2;
		}
	</style>
</head>
<body>
	<h1>Ficha do Aluno Nª: <?=$response->codigo?></h1>
	<table>
		<tr>
			<th>Nome Completo:</th>
			<td><?=$response->nome ." ". $response->outros_nomes ." ". $response->apelido?></td>
		</tr>
		<tr>
			<th>Data de Nascimento:</th>
			<td><?=$extras->date_format2($response->data_nascimento)?></td>
		</tr>
		<tr>
			<th>Estado Civil:</th>
			<td><?=$response->estado_civil->descricao?></td>
		</tr>
		<tr>
			<th>Sexo:</th>
			<td><?= $response->genero == "M" ? "Masculino" : "Femenino" ?></td>
		</tr>
		<tr>
			<th>E-mail:</th>
			<td><?=$response->email?></td>
		</tr>
		<tr>
			<th>Tipo Identificação:</th>
			<td><?=$response->tipo_documento->descricao?></td>
		</tr>
		<tr>
				<th>Numero de Identificação:</th>
				<td><?= $response->numero_documento ?></td>
		</tr>
		<tr>
				<th>País de Origem:</th>
				<td><?= $response->pais->nome ?></td>
		</tr>
        <tr>
				<th>Classe de Veiculo:</th>
				<td><?= $response->classe->descricao ?></td>
		</tr>
        <tr>
				<th>Contacto Principal:</th>
				<td><?= $response->telefone1 ?></td>
		</tr>
        <tr>
				<th>Contacto Principal:</th>
				<td><?= $response->telefone1 ?></td>
		</tr>
        <tr>
				<th>Contacto Alternativo:</th>
				<td><?= $response->telefone2 ?></td>
		</tr>
        <tr>
				<th>Contacto Alternativo:</th>
				<td><?= $response->telefone2 ?></td>
		</tr>
        <tr>
				<th>Contacto Alternativo:</th>
				<td><?= $response->telefone2 ?></td>
		</tr>
        <tr>
				<th>Profissão:</th>
				<td><?= $response->profissao ?></td>
		</tr>
        <tr>
				<th>Endereço:</th>
				<td><?= $response->endereco ?></td>
		</tr>
        <tr>
				<th>Escola:</th>
				<td><?= $response->escola->nome ?></td>
		</tr>
        <tr>
				<th>Provincia:</th>
				<td><?= $response->provincia->nome ?></td>
		</tr>
        <tr>
				<th>Distrito:</th>
				<td><?= $response->distrito->nome ?></td>
		</tr>
	</table>
	
	<h2>Histórico de Serviços</h2>
    <?php
if (!empty($pedido->data)) :
    
    ?>
	<table>
		<thead>
			<tr>
				<!-- <th>Data</th>
				<th>Serviço</th>
				<th>Status</th> -->
                <th>#</th>
                <th>Delegação</th>
                <th>Entidade</th>
                <th>Referencia</th>
                <th>Serviço</th>
                <th>Hora da Marcação</th>
			</tr>
		</thead>
		<tbody>
			<!-- <tr>
				<td>01/01/2022</td>
				<td>Matrícula</td>
				<td>Concluído</td>
			</tr>
			<tr>
				<td>05/03/2022</td>
				<td>Requerimento de Aproveitamento de Disciplina</td>
				<td>Em andamento</td>
			</tr>
			<tr>
				<td>20/05/2022</td>
				<td>Trancamento de Disciplina</td>
				<td>Concluído</td>
			</tr> -->
            <?php $cont = 1;
            $total_valor = 0;
            foreach ($pedido->data as $row) : ?>
                <tr>
                    <td scope="row"><?= $cont++ ?></td>
                    <td><?= $row->delegacao->nome ?></td>
                    <td><?= $row->entidade ?></td>
                    <td><?= $row->referencia ?></td>
                    <td><?= $row->servico->descricao ?></td>
                    <td><?= $row->hora_marcacao ?? "<span class='badge badge-warning' style='padding: 20px; background-color: yellow; border-radius: 5px; font-size: 10px;'>Aguardando pelo pagamento</span>" ?></td>
                </tr>
            <?php
            endforeach; ?>
		</tbody>
	</table>
    <?php 
    else :
        ?>
            <div class="alert alert-info" style="text-align: center; padding: 20px; background-color: blue; border-radius: 5px;" role="alert">
                <strong class="text-capitalize">Alerta!</strong>
                Nenhum registo encontrado.
            </div>
        <?php
        endif;
    ?>
</body>
</html>
