<?php
        require_once "config.php";
        require('./PHP/components/fpdf.php');
        $id = htmlspecialchars($_GET["id"]);
        $pin = htmlspecialchars($_GET["pin"]);

        // SQL query
        $strSQL = "SELECT * FROM invoices WHERE invoices_id = '".$id."' AND bill_zip = '".$pin."'";

        // Execute the query
        $rs = mysqli_query($conn, $strSQL);

        $noOfItems =  15;

        foreach ($rs as $dbValues) {

        class PDF extends FPDF
        {
        // Page header
        function Header()
        {
            // Logo
            // $this->Image('./icons/Logo.png',10,6,30);
            // $this->Image('./images/blankInvoice.jpg', 0, 0, $this->w, $this->h);
            // // Arial bold 15
            // $this->SetFont('Arial','B',15);
            // // Move to the right
            // $this->Cell(80);
            // // Title
            // $this->Cell(30,10,'Title',1,0,'C');
            // // Line break
            // $this->Ln(20);
        }

        // Page footer
        function Footer()
        {
            // // Position at 1.5 cm from bottom
            // $this->SetY(-15);
            // // Arial italic 8
            // $this->SetFont('Arial','I',8);
            // // Page number
            // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
        }

        // Instanciation of inherited class
        $pdf = new PDF();        

        // Second Page
        $pdf->AliasNbPages();
        $pdf->AddPage('P', 'Letter');
        $pdf->Image('./images/blankInvoice.jpg', 0, 0, 0, 0);
        $pdf->SetFont('Times','',11);

        // Add borders for adjustments by replacing  0, 0, with 1, 0, for lines belowe VVVVV
        $pdf->SetXY(156,32);
        $pdf->Cell(22, 8, date('m/d/Y', strtotime($dbValues['invoiceDate'])), 0, 0, 'C');

        $pdf->SetXY(178,32);
        $pdf->Cell(25, 8, $dbValues['invoices_id'], 0, 0, 'C');

        $pdf->SetXY(16,58);
        $pdf->Cell(70, 6, $dbValues['bill_business_name'], 0, 0, 'L');

        $pdf->SetXY(16,64);
        $pdf->Cell(70, 6, $dbValues['bill_address'], 0, 0, 'L');

        $pdf->SetXY(16,70);
        $pdf->Cell(70, 6, $dbValues['bill_city'].', '. $dbValues['bill_state']." ".$dbValues['bill_zip'], 0, 0, 'L');

        $pdf->SetXY(120,58);
        $pdf->MultiCell(70, 6, $dbValues['shipTo'] ? $dbValues['shipTo'] : 'SAME AS BILL TO', 0, 'L');
        
        $pdf->SetFont('Times','B',13);
        $pdf->SetXY(13,103);
        $pdf->Cell(28, 8, $dbValues['po_no'], 0, 0, 'C');

        $pdf->SetFont('Times','',11);
        $pdf->SetXY(41,103);
        $pdf->Cell(29, 8, $dbValues['terms'], 0, 0, 'C');

        $pdf->SetXY(65,103);
        $pdf->Cell(29, 8, $dbValues['rep'], 0, 0, 'C');

        $pdf->SetXY(90,103);
        $pdf->Cell(24, 8, date('m/d/Y', strtotime($dbValues['shipDate'])), 0, 0, 'C');

        $pdf->SetXY(110,103);
        $pdf->Cell(29, 8, $dbValues['via'], 0, 0, 'C');

        $pdf->SetXY(140,103);
        $pdf->Cell(29, 8, $dbValues['fob'], 0, 0, 'C');

        $pdf->SetXY(175,103);
        $pdf->Cell(29, 8, $dbValues['project'], 0, 0, 'C');

        for ($i = 1; $i <= $noOfItems; $i++) {
            $pdf->SetXY(13,112+($i*7));
            $pdf->Cell(28, 7, $dbValues['part'.$i.'Quantity'] ? $dbValues['part'.$i.'Quantity'] : '', 0, 0, 'C');
        }

        for ($i = 1; $i <= $noOfItems; $i++) {
            $pdf->SetXY(42,112+($i*7));
            $pdf->Cell(29, 7, strlen($dbValues['part'.$i.'Item']) > 10 ? substr($dbValues['part'.$i.'Item'],0,10)."..." : $dbValues['part'.$i.'Item'], 0, 0, 'L'); 
        }

        for ($i = 1; $i <= $noOfItems; $i++) {
            $pdf->SetXY(70,112+($i*7));
            $pdf->Cell(68, 7, $dbValues['part'.$i.'ItemDesc'], 0, 0, 'L');
        }

        for ($i = 1; $i <= $noOfItems; $i++) {
            $pdf->SetXY(138,112+($i*7));
            if ($dbValues['part'.$i.'ItemDesc']){
                $pdf->Cell(26, 7, $dbValues['part'.$i.'SalesPrice'] != 0 ? "$" . $dbValues['part'.$i.'SalesPrice'] : '$0.00', 0, 0, 'R');
            }
        }

        for ($i = 1; $i <= $noOfItems; $i++) {
            $pdf->SetXY(173,112+($i*7));
            if ($dbValues['part'.$i.'ItemDesc']){
                $pdf->Cell(24, 7, $dbValues['part'.$i.'SalesPrice'] != 0 ? "$" . number_format((($dbValues['part'.$i.'SalesPrice'] * $dbValues['part'.$i.'Quantity'])),2) : '$0.00', 0, 0, 'R');
            }
        }

        $pdf->SetXY(173,232);
        $pdf->Cell(30, 12, "$" . number_format($dbValues['finalPrice'], 2, '.', ','), 0, 0, 'C');

        $pdf->SetXY(13,245);
        // $pdf->Cell(57, 15, $dbValues['invoice_phone'], 0, 0, 'C');
        $pdf->MultiCell(57, 6, $dbValues['invoice_phone'], 0, 'C');

        $pdf->SetXY(70,245);
        // $pdf->Cell(68, 15, $dbValues['invoice_email'], 0, 0, 'C');
        $pdf->MultiCell(68, 6, $dbValues['invoice_email'], 0, 'C');

        // for($i=1;$i<=20;$i++)
        //     $pdf->Cell(0,10,'Printing line number '.$i,0,1);
        $pdf->Output('I', 'Invoice.pdf');

        }
?>