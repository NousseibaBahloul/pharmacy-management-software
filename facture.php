<?php 
session_start();
?>

<?php 
	require('fpdf/fpdf.php');
$idfa=$_SESSION['idfa'];
$connect= mysql_connect("localhost","nousseiba","17031999");
$db=mysql_select_db("pharmacie");
$query=mysql_query("SELECT `codefournisseur` FROM `facture` WHERE `idfacture`='$idfa'");
$row=mysql_fetch_object($query);
$cofo=$row->codefournisseur;

	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',24);
	$pdf->Cell(40,10,'Pharmacie . NET');
	$pdf->Image('imgs\3.png',175,10,-800);
	$pdf->Ln(30);
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(30,10,'ID Facture : ');	
	$pdf->SetFont('Arial','',14);
	$pdf->Cell(10,10,$idfa);
	$pdf->Ln(12);	
$query=mysql_query("SELECT `date_facture` FROM `facture` WHERE `idfacture`='$idfa'");
$row=mysql_fetch_object($query);
$dafa=$row->date_facture;	
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(36,10,'Date Facture : ');
	$pdf->SetFont('Arial','',14);
	$pdf->Cell(55,10,$dafa);
$query=mysql_query("SELECT `nom` FROM `fournisseur` WHERE `codefournisseur`='$cofo'");
$row=mysql_fetch_object($query);
$nofo=$row->nom;	
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(44,10,'Nom fournisseur : ');
	$pdf->SetFont('Arial','',14);
	$pdf->Cell(20,10,$nofo);
$query=mysql_query("SELECT `prénom` FROM `fournisseur` WHERE `codefournisseur`='$cofo'");
$row=mysql_fetch_object($query);
$prfo=$row->prénom;
	$pdf->Cell(25,10,$prfo);
	$pdf->Line('10','68','200','68');
$pdf->Ln(30);
	$pdf->SetFont('Arial','B',12);
    $pdf->Cell(1,10,"");
	$pdf->Cell(15,10,'Code');
	$pdf->Cell(35,10,'Nom');
	$pdf->Cell(34,10,'Dosage');
	$pdf->Cell(15,10,'Qut');
	$pdf->Cell(40,10,'Forme');	
	$pdf->Cell(25,10,'Prix PPA');
	$pdf->Cell(30,10,'Date expire');
$pdf->Ln(2);
$query1=mysql_query("SELECT `codeproduit` FROM `facture_produit` WHERE `idfacture`='$idfa'");
$rows1 = mysql_num_rows($query1);

$query2=mysql_query("SELECT `codeproduit` FROM `facture_produit` WHERE `idfacture`='$idfa'");
while ($row2=mysql_fetch_object($query2)){
$copr=$row2->codeproduit;
$query=mysql_query("SELECT * FROM `produit` WHERE `codeproduit`='$copr'");
$row=mysql_fetch_object($query);
$pdf->Ln(12);
    $copr=$row->codeproduit;
    $nom=$row->nom;
  //  $nom_famille=$row->nom_famille;
    $dosage=$row->dosage;
  //  $quantité=$row->quantité;
    $forme=$row->forme;
    $prix_ppa=$row->prix_ppa;
    $date_expiré=$row->date_expiré;
$pdf->SetFont('Arial','',12);
    $pdf->Cell(1,10,"");
	$pdf->Cell(15,10,$copr);
	$pdf->Cell(35,10,$nom);
	$pdf->Cell(34,10,$dosage);
$query4=mysql_query("SELECT `quantité` FROM `facture_produit` WHERE `idfacture`='$idfa' AND `codeproduit`='$copr'");
$row4=mysql_fetch_object($query4);
$quantité=$row4->quantité;	
	$pdf->Cell(15,10,$quantité);
	$pdf->Cell(40,10,$forme);	
	$pdf->Cell(25,10,$prix_ppa);
	$pdf->Cell(30,10,$date_expiré);


}
$pdf->Ln(20);
	
$query5=mysql_query("SELECT `prix_total` FROM `facture` WHERE `idfacture`='$idfa'");
$row5=mysql_fetch_object($query5);
$prix_total=$row5->prix_total;
	$pdf->Cell(16,10,"");
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(30,10,"Prix total :");
	$pdf->SetFont('Arial','',14);
	$pdf->Cell(35,10,$prix_total." DA");
$pdf->Ln(40);

$pdf->Cell(140,10,"");
$pdf->Cell(35,10,"signature");
	$pdf->output();	
?>