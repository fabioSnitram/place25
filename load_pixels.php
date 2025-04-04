<?php
$conn = new mysqli("localhost", "root", "", "pixelart");

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "SELECT posicao, cor FROM pixels";
$result = $conn->query($sql);

$pixels = [];
while ($row = $result->fetch_assoc()) {
    $pixels[] = $row;
}

echo json_encode($pixels);
$conn->close();
?>
