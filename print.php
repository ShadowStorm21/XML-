<?Php session_start();

include 'dbconnection.php';
include 'fpdf\fpdf.php';




/// query mysql table and fetch records
	$oid = $_SESSION['order_id'];
	$stmt = $conn -> query("select pids from orders where oid =".$oid);
	$rows = $stmt -> fetchAll(PDO::FETCH_ASSOC);
	$n = $stmt -> rowCount();
	$pids = json_decode($rows[0]['pids']);
	
	$max_name = 190;
	$max_desc = 530;
	$products = Array();
	
	
	$pdf = new FPDF('L','mm','A3'); 
	$pdf -> AddPage();
	$pdf -> SetFont('Arial','B',16);
	$pdf -> SetFillColor(193,229,252); // Background color of header
	
	$pdf->Write(10,"User : " .$_SESSION['uname']."");
	$pdf->Write(10,"  /id ," .$_SESSION['uid']."");
	$pdf->Write(10," . Any issue you can contact us by sending the order id '" .$_SESSION['order_id']."'");
	$pdf->Ln();
	
	
	foreach($pids as $pid) {
			$sql = $conn->query("select * from product where pid = ".intval($pid));
			$row = $sql -> fetchAll(PDO::FETCH_ASSOC);
			$product = $row[0];
			array_push($products,$product);
			$max_name = max($max_name,$pdf->getStringWidth($product['pname']));
			$max_desc = max($max_desc,$pdf->getStringWidth($product['description']));
	}
	
		$max_name/=2;
		$max_desc/=2.1;
	
	
	 
	// Header starts ///   Cell($width, $hight=0, $textt='', $border=0, $linebreak=0, $align='', $fillcolor=false, $link='')
	$pdf -> Cell(10,10,'PID',1,0,'C',true); // First header column 
	$pdf -> Cell($max_name,10,'product name',1,0,'C',true); // Second header column
	$pdf -> Cell($max_desc,10,'product details',1,0,'C',true); // Third header column 
	$pdf -> Cell(15,10,'Price',1,0,'C',true); // Third header column 
	$pdf -> Cell(20,10,'tag',1,1,'C',true); // Third header column 

	
	$pdf->SetAutoPageBreak(true);
	//// header ends ///////
	$tempFontSize = 10;
	$pdf-> SetFont('Arial','',$tempFontSize);
	$pdf-> SetFillColor(235,236,236); // Background color of header 
	$fill = false; // to give alternate background fill color to rows 
	
	
		foreach($products as $product) {
		$pdf -> Cell(10,10,$product['pid'],1,0,'C',$fill);
		
		while($pdf->getStringWidth($product['pname']) > $max_name){// loop until the string width is smaller than cell width
			$pdf->SetFontSize($tempFontSize -= 0.1);
		}
		$pdf -> Cell($max_name,10,$product['pname'],1,0,'L',$fill);
		$tempFontSize = 10;
		
		
		while($pdf->getStringWidth($product['description']) > $max_desc){// loop until the string width is smaller than cell width
			$pdf->SetFontSize($tempFontSize -= 0.1);
		}
		$pdf -> Cell($max_desc,10,$product['description'],1,0,'L',$fill);
		$tempFontSize = 10;

		
		$pdf -> Cell(15,10,$product['price'],1,0,'C',$fill);
		$pdf -> Cell(20,10,$product['tag'],1,1,'C',$fill);
		$fill = !$fill; 
		} // to give alternate background fill  color to rows
	
		$pdf -> Output('D','filename.pdf');
	 // you can use output() only to display on pdf content on browser only
	
/// end of records /// 


?>