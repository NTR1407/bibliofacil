<?php

require('php/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('imagenes/Escudo-Colegio_1.png',20,8,33);

    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Paz y Salvo',0,0,'C');
    // Salto de línea
    $this->Ln(35);
    
    $this->Cell(10, 10, 'Id', 1, 0, "C", 0);
    $this->Cell(45, 10, 'Nombres', 1, 0, "C", 0);
    $this->Cell(45, 10, 'Apellidos', 1, 0, "C", 0);
    $this->Cell(45, 10, 'Correo', 1, 0, "C", 0);
    $this->Cell(45, 10, utf8_decode('Identificación'), 1, 1, "C", 0);
    
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require('php/Conexion_bd_pdf.php');


$id = isset($_GET('id')) ? $_GET('id') : 0;
$consulta = "SELECT id_usuario, nombres, apellidos, email, identificación 
            FROM usuario 
            WHERE paz_y_salvo = 'S' and id = ? ";
/*$statement = $pdo->prepare($consulta);
$statement->execute(array($id));
$results = $statement->fetchAll();*/

$resultado = $mysqli->query($consulta);


$pdf = new PDF();
$pdf->AliasnbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(10, 10, $row['id_usuario'], 1, 0, "C", 0);
    $pdf->Cell(45, 10, $row['nombres'], 1, 0, "C", 0);
    $pdf->Cell(45, 10, $row['apellidos'], 1, 0, "C", 0);
    $pdf->Cell(45, 10, $row['email'], 1, 0, "C", 0);
    $pdf->Cell(45, 10, $row['identificación'], 1, 1, "C", 0);
}




$pdf->Output();
    


?>