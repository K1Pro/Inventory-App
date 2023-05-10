<?php
        require_once "config.php";
        $id = htmlspecialchars($_GET["id"]);
        $pin = htmlspecialchars($_GET["pin"]);

        // SQL query
        $strSQL = "SELECT * FROM invoices WHERE invoices_id = '".$id."' AND bill_zip = '".$pin."'";

        // Execute the query
        $rs = mysqli_query($conn, $strSQL);

        $noOfItems =  15;

        foreach ($rs as $dbValues) {
       
        


            // require('fpdf.php');

            // $pdf = new FPDF();
            // $pdf->AddPage();
            // $pdf->SetFont('Arial','B',16);
            // $pdf->Cell(40,200,$dbValues['invoices_id']);
            // $pdf->Output();


            require('./PHP/components/fpdf.php');

        class PDF extends FPDF
        {
        // Page header
        function Header()
        {
            // Logo
            // $this->Image('./icons/Logo.png',10,6,30);
            $this->Image('./images/blankInvoice.jpg', 0, 0, $this->w, $this->h);
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
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times','',12);
        // for($i=1;$i<=20;$i++)
        //     $pdf->Cell(0,10,'Printing line number '.$i,0,1);
        $pdf->Output();

        }
?>