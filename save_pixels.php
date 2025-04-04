<?php
	$conn = new mysqli("localhost", "root", "", "pixelart");
	if ($conn->connect_error) {
		die("Falha na conexão: " . $conn->connect_error);
	}
	
	$posicao = $_POST['posicao'];
	$cor = $_POST['cor'];
	
	// Verifica se o pixel já existe
	$sql = "SELECT id FROM pixels WHERE posicao = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $posicao);
	$stmt->execute();
	$stmt->store_result();
	
	if ($stmt->num_rows > 0) {
		// Atualiza a cor se já existir
		$sql = "UPDATE pixels SET cor = ? WHERE posicao = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("si", $cor, $posicao);
	} else {
		// Insere um novo pixel
		$sql = "INSERT INTO pixels (posicao, cor) VALUES (?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("is", $posicao, $cor);
	}
	
	$stmt->execute();
	$stmt->close();
	$conn->close();
?>
