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

        // First Page
        $pdf->AliasNbPages();
        $pdf->AddPage('P', 'Letter');
        $pdf->Image('./images/blankInvoice.jpg', 0, 0, 0, 0);
        $pdf->SetFont('Times','',11);

        $pdf->SetXY(156,32);
        $pdf->Cell(22, 8, date('m/d/Y', strtotime($dbValues['invoiceDate'])), 1, 0, 'C');

        $pdf->SetXY(178,32);
        $pdf->Cell(25, 8, $dbValues['invoices_id'], 1, 0, 'C');

        $pdf->SetXY(16,58);
        $pdf->Cell(70, 6, $dbValues['bill_business_name'], 1, 0, 'L');

        $pdf->SetXY(16,64);
        $pdf->Cell(70, 6, $dbValues['bill_address'], 1, 0, 'L');

        $pdf->SetXY(16,70);
        $pdf->Cell(70, 6, $dbValues['bill_city'].', '. $dbValues['bill_state']." ".$dbValues['bill_zip'], 1, 0, 'L');

        $pdf->SetXY(120,58);
        $pdf->MultiCell(70, 6, $dbValues['shipTo'] ? $dbValues['shipTo'] : 'SAME AS BILL TO', 1, 'L');
        
        // Second Page
        $pdf->AliasNbPages();
        $pdf->AddPage('P', 'Letter');
        $pdf->Image('./images/blankSlip.jpg', 0, 0, 0, 0);

        $pdf->SetXY(156,32);
        $pdf->Cell(22, 8, date('m/d/Y', strtotime($dbValues['invoiceDate'])), 1, 0, 'C');

        $pdf->SetXY(178,32);
        $pdf->Cell(25, 8, $dbValues['invoices_id'], 1, 0, 'C');

        $pdf->SetXY(16,58);
        $pdf->Cell(70, 6, $dbValues['bill_business_name'], 1, 0, 'L');

        $pdf->SetXY(16,64);
        $pdf->Cell(70, 6, $dbValues['bill_address'], 1, 0, 'L');

        $pdf->SetXY(16,70);
        $pdf->Cell(70, 6, $dbValues['bill_city'].', '. $dbValues['bill_state']." ".$dbValues['bill_zip'], 1, 0, 'L');

        $pdf->SetXY(120,58);
        $pdf->MultiCell(70, 6, $dbValues['shipTo'] ? $dbValues['shipTo'] : 'SAME AS BILL TO', 1, 'L');
        

        // for($i=1;$i<=20;$i++)
        //     $pdf->Cell(0,10,'Printing line number '.$i,0,1);
        $pdf->Output('I', 'Invoice.pdf');

        }
?>