<?php
	function generateRow(){
		$contents = '';
		include_once('connect.php');
		$sql = "SELECT * FROM data_pelajar";

		//use for MySQLi OOP
		$query = $conn->query($sql);
		while($row = $query->fetch_assoc()){
			$contents .= "
			<tr>
				<td>".$row['ID']."</td>
				<td>".$row['nama']."</td>
				<td>".$row['ndp']."</td>
				<td>".$row['semester']."</td>
				<td>".$row['bengkel']."</td>
				<td>".$row['masa_pergi']."</td>
				<td>".$row['masa_balik']."</td>
				<td>".$row['sebab_sakit']."</td>
				<td>".$row['tarikh']."</td>
				<td>".$row['ProfilePic']."</td>
			</tr>
			";
		}
		////////////////

		//use for MySQLi Procedural
		// $query = mysqli_query($conn, $sql);
		// while($row = mysqli_fetch_assoc($query)){
		// 	$contents .= "
		// 	<tr>
		// 		<td>".$row['id']."</td>
		// 		<td>".$row['firstname']."</td>
		// 		<td>".$row['lastname']."</td>
		// 		<td>".$row['address']."</td>
		// 	</tr>
		// 	";
		// }
		////////////////
		
		return $contents;
	}

	require_once('tcpdf/tcpdf.php');  
    $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Data Maklumat Pelajar");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '
      	<h2 align="center">DATA MAKLUMAT PELAJAR</h2>
      	<h4>Senarai Nama</h4>
      	<table border="1" cellspacing="0" cellpadding="1" >  
           <tr>  
                <th width="3%">#</th>
				<th width="15%">Nama</th>
				<th width="8%">NDP</th>
				<th width="8%">Semester</th>
				<th width="18%">Bengkel</th>
				<th width="8%">Masa Pergi</th>
				<th width="8%">Masa Balik</th>
				<th width="9%">Sebab Sakit</th>
				<th width="9%">Tarikh</th>
				<th width="15%">Kelulusan</th>
           </tr>  
      ';  
    $content .= generateRow();  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('data_pelajar.pdf', 'I');
	

?>