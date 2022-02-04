<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller
{

    protected $_nama = 'PT. Batavia Indo Global';
    protected $_alamat = 'Modern Cikande Industrial Estate Block D No 1 & 2 Jalan Raya Jakarta Serang KM 68 Banten. Serang 42186. Indonesia';
    protected $_motto = 'Think Big';


    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('permit_in_out_model');
        $this->load->library('form_validation');
        $this->load->library('pdf_barcode');
        $this->load->library('pdf_invoice');
    }

    public function permit_in_out($id)
    {
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf = new PDF_BARCODE();
        $pdf->SetTitle('Permit In Out');
        $pdf->AddPage();
        $pdf->AliasNbPages();

        $permit= $this->permit_in_out_model->get_all_id($id);
        foreach($permit as $row){
            $id = $row['id'];
            $person_id = $row['person_id'];
            $permit_date = $row['permit_date'];
            $person_name = $row['person_name'];
            $necessity = $row['necessity'];
            $time = $row['time'];
            $category = $row['category'];
            $part_departments_name = $row['part_departments_name'];
            $departments = $row['departments'];

            if ($category==1) {
                $_category="Permit In";
            }else{
                $_category="Permit Out";
            }

        }
        $tempdir = "uploads/qr/"; 
        if (!file_exists($tempdir))
            mkdir($tempdir);

        $isi_teks1 = $id;
        $namafile1 = $id.".png";
        $quality1 = 'H'; 
        $ukuran1 = 8; 
        $padding1 = 0; 
        QRCode::png($isi_teks1,$tempdir.$namafile1,$quality1,$ukuran1,$padding1);

        // QRcode::png($id,$id.".png");

        $pdf->SetFont('Times','I',8);
        $pdf->image(base_url().'assets/img/logo.jpg',10,10,10,10);
        $pdf->image(base_url().'assets/img/logo_print.png',20,26,30,23);
        
        $pdf->Image('uploads/qr/'.$id.".png", 160, 30, 20, 20, "png");

        $pdf->cell(10);
        $pdf->cell(0,3,$this->_nama,0,1);
        $pdf->cell(10);
        $pdf->cell(0,3,$this->_motto,0,1);
        $pdf->cell(10);
        $pdf->cell(0,3,$this->_alamat,0,1);

        $_nmbulan = array('','Januari','Pebruari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember');
        $pdf->ln(5);
        $pdf->Cell(190,110,'',1,0,'C');
        
        $pdf->ln(5);        
        $pdf->SetFont('Arial','B',14);
        $pdf->cell(0,7,'PT. BATAVIA INDO GLOBAL',0,1,'C');
        $pdf->cell(0,7,'PERMIT IN/OUT',0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->cell(0,7,'Number ID : '.$person_id,0,1,'C');

        $pdf->EAN13(10,140,$id, 5, 0.5, 9);

        $pdf->ln(5);
        $pdf->SetFont('Arial','',10);
        $pdf->SetWidths(array(40,5,175));
        $pdf->SetAligns(array('L','C','L'));
        $pdf->cell(5);
        $pdf->row(array('Date',':',$permit_date));
        $pdf->cell(5);
        $pdf->row(array('Employee Name',':',$person_name));
        $pdf->cell(5);
        $pdf->row(array('Category',':',$_category));
        $pdf->cell(5);
        $pdf->row(array('Necessity',':',$necessity));
        $pdf->cell(5);
        $pdf->row(array('Time',':',$time));
        
        $pdf->ln(20);
        $pdf->SetFontsType(array('','','',''));
        $pdf->SetWidths(array(40,55,50,60));
        $pdf->SetAligns(array('C','C','C','C'));
        $pdf->row(array('Employee Name','Departement Head','Security Post','HRD Manager'));
        $pdf->SetWidths(array(40,55,50,60));
        $pdf->row(array('','','',''));
        $pdf->row(array('','','',''));
        $pdf->row(array('','','',''));

        $pdf->SetFont('Arial','BU',9);
        $pdf->row(array($person_name,'___________','___________','___________'));
        $pdf->SetWidths(array(40,55,50,60));
        $pdf->SetFont('Arial','',9);
        $pdf->row(array($part_departments_name,$departments,'Internal Security','HR & GA'));

        $pdf->Output();
    }


    public function invoice()
    {
        $no_resi = $this->uri->segment(3);
        $pelanggan = $this->pelanggan_model->get_all_join_pelanggan_penerima_by_noresi($no_resi);
        $pelanggan = $this->penerimaan_model->get_all_join_pelanggan_penerima_by_noresi($no_resi);
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf = new PDF_BARCODE();
        // membuat halaman baru
        $pdf->AddPage();
        $pdf->AliasNbPages();
        // setting jenis font yang akan digunakan
        $pdf->SetTitle('Invoice - ' . $no_resi);
        //set font to arial, bold, 14pt
        $pdf->SetFont('Arial', 'B', 14);
        foreach ($pelanggan as $row) {

            //Cell(width , height , text , border , end line , [align] )

            $pdf->Cell(130, 5, 'PT. Antaran Logistik', 0, 0);
            $pdf->Cell(59, 5, 'INVOICE', 0, 1); //end of line

            //set font to arial, regular, 12pt
            $pdf->SetFont('Arial', '', 12);

            $pdf->Cell(130, 5, '[Street Address]', 0, 0);
            $pdf->Cell(59, 5, '', 0, 1); //end of line

            $pdf->Cell(130, 5, '[City, Country, ZIP]', 0, 0);
            $pdf->Cell(25, 5, 'Date', 0, 0);
            $pdf->Cell(34, 5, date('d-m-Y', strtotime($row['tanggal_dibuat'])), 0, 1); //end of line

            $pdf->Cell(130, 5, 'Phone [+12345678]', 0, 0);
            $pdf->Cell(25, 5, 'Invoice #', 0, 0);
            $pdf->Cell(34, 5, $row['no_resi'], 0, 1); //end of line

            $pdf->Cell(130, 5, 'Fax [+12345678]', 0, 0);
            $pdf->Cell(25, 5, 'Customer ID', 0, 0);
            $pdf->Cell(34, 5, $row['no_ic_passport'], 0, 1); //end of line

            //make a dummy empty cell as a vertical spacer
            $pdf->Cell(189, 10, '', 0, 1); //end of line

            //billing address
            $pdf->Cell(100, 5, 'Bill to', 0, 1); //end of line

            //add dummy cell at beginning of each line for indentation
            $pdf->Cell(10, 5, '', 0, 0);
            $pdf->Cell(90, 5, $row['nama_pelanggan'], 0, 1);

            $pdf->Cell(10, 5, '', 0, 0);
            $pdf->Cell(90, 5, $row['no_ic_passport'], 0, 1);

            $pdf->Cell(10, 5, '', 0, 0);
            $pdf->Cell(90, 5, $row['alamat_pelanggan'], 0, 1);

            $pdf->Cell(10, 5, '', 0, 0);
            $pdf->Cell(90, 5, $row['hp'], 0, 1);

            //make a dummy empty cell as a vertical spacer
            $pdf->Cell(189, 10, '', 0, 1); //end of line

            $pdf->UPC_A(150, 60, $row['no_ic_passport'], 10, 0.5, 9);
        }
        //invoice contents
        $pdf->SetFont('Arial', 'B', 12);

        $pdf->Cell(130, 5, 'Description Barang', 1, 0);
        $pdf->Cell(25, 5, 'Size', 1, 0);
        $pdf->Cell(34, 5, 'Amount', 1, 1); //end of line

        $pdf->SetFont('Arial', '', 11);
        $total = 0;
        //Numbers are right-aligned so we give 'R' after new line parameter
        $barang = $this->barang_model->get_all_by_no_resi($no_resi);
        foreach ($barang as $row) {
            $total += $row['harga'];
            $pdf->Cell(130, 5, $row['nama_barang'] . ' # ' . $row['no_resi_barang'], 1, 0);
            $pdf->Cell(25, 5, $row['size'], 1, 0);
            $pdf->Cell(34, 5, $row['harga'], 1, 1, 'R'); //end of line
        }

        //summary
        $pdf->Cell(130, 5, '', 0, 0);
        $pdf->Cell(25, 5, 'Subtotal', 0, 0);
        $pdf->Cell(10, 5, 'RM', 1, 0);
        $pdf->Cell(24, 5, number_format($total), 1, 1, 'R'); //end of line

        // $pdf->Cell(130, 5, '', 0, 0);
        // $pdf->Cell(25, 5, 'Taxable', 0, 0);
        // $pdf->Cell(4, 5, '$', 1, 0);
        // $pdf->Cell(30, 5, '0', 1, 1, 'R'); //end of line

        // $pdf->Cell(130, 5, '', 0, 0);
        // $pdf->Cell(25, 5, 'Tax Rate', 0, 0);
        // $pdf->Cell(4, 5, '$', 1, 0);
        // $pdf->Cell(30, 5, '10%', 1, 1, 'R'); //end of line

        // $pdf->Cell(130, 5, '', 0, 0);
        // $pdf->Cell(25, 5, 'Total Due', 0, 0);
        // $pdf->Cell(4, 5, '$', 1, 0);
        // $pdf->Cell(30, 5, '4,450', 1, 1, 'R'); //end of line
        $pdf->Output();
    }


    public function label_barang()
    {

        // $pdf = new FPDF('l','mm','A4');//Lenskape
        $pdf = new FPDF('P', 'mm', 'A4'); //Potret
        $pdf = new PDF_BARCODE(); //Potret
        // membuat halaman baru
        $pdf->AddPage();
        $pdf->AliasNbPages();
        // setting jenis font yang akan digunakan
        $pdf->SetTitle('Label Barang');

        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 4, $this->uri->segment(3), 0, 1, 'C');
        $pdf->Cell(0, 4, 'Tanggal', 0, 1, 'C');
        $pdf->Cell(7, 4, '', 0, 1);

        $pdf->EAN13(10, 10, '123456789012', 5, 0.5, 9);

        // $pdf->SetFont('Arial', '', 10);
        // $pdf->Cell(8, 6, 'Kota Asal :', 1, 0, 'C');
        // $pdf->Cell(35, 6, 'Johor Malaysia', 1, 0, 'C');
        // $pdf->Cell(200, 6, 'Kota Tujuan :', 1, 0, 'C');
        // $pdf->Cell(8, 6, 'Serang Banten', 0, 1, 'C');

        //set font to arial, bold, 14pt
        $pdf->SetFont('Arial', 'B', 14);

        //Cell(width , height , text , border , end line , [align] )

        $pdf->Cell(130, 5, 'GEMUL APPLIANCES.CO', 0, 0);
        $pdf->Cell(59, 5, 'INVOICE', 0, 1); //end of line

        //set font to arial, regular, 12pt
        $pdf->SetFont('Arial', '', 12);

        $pdf->Cell(130, 5, '[Street Address]', 0, 0);
        $pdf->Cell(59, 5, '', 0, 1); //end of line

        $pdf->Cell(130, 5, '[City, Country, ZIP]', 0, 0);
        $pdf->Cell(25, 5, 'Date', 0, 0);
        $pdf->Cell(34, 5, '[dd/mm/yyyy]', 0, 1); //end of line

        $pdf->Cell(130, 5, 'Phone [+12345678]', 0, 0);
        $pdf->Cell(25, 5, 'Invoice #', 0, 0);
        $pdf->Cell(34, 5, '[1234567]', 0, 1); //end of line

        $pdf->Cell(130, 5, 'Fax [+12345678]', 0, 0);
        $pdf->Cell(25, 5, 'Customer ID', 0, 0);
        $pdf->Cell(34, 5, '[1234567]', 0, 1); //end of line

        //make a dummy empty cell as a vertical spacer
        $pdf->Cell(189, 10, '', 0, 1); //end of line

        //billing address
        $pdf->Cell(100, 5, 'Bill to', 0, 1); //end of line

        //add dummy cell at beginning of each line for indentation
        $pdf->Cell(10, 5, '', 0, 0);
        $pdf->Cell(90, 5, '[Name]', 0, 1);

        $pdf->Cell(10, 5, '', 0, 0);
        $pdf->Cell(90, 5, '[Company Name]', 0, 1);

        $pdf->Cell(10, 5, '', 0, 0);
        $pdf->Cell(90, 5, '[Address]', 0, 1);

        $pdf->Cell(10, 5, '', 0, 0);
        $pdf->Cell(90, 5, '[Phone]', 0, 1);

        //make a dummy empty cell as a vertical spacer
        $pdf->Cell(189, 10, '', 0, 1); //end of line

        //invoice contents
        $pdf->SetFont('Arial', 'B', 12);

        $pdf->Cell(130, 5, 'Description', 1, 0);
        $pdf->Cell(25, 5, 'Taxable', 1, 0);
        $pdf->Cell(34, 5, 'Amount', 1, 1); //end of line

        $pdf->SetFont('Arial', '', 12);

        //Numbers are right-aligned so we give 'R' after new line parameter

        $pdf->Cell(130, 5, 'UltraCool Fridge', 1, 0);
        $pdf->Cell(25, 5, '-', 1, 0);
        $pdf->Cell(34, 5, '3,250', 1, 1, 'R'); //end of line

        $pdf->Cell(130, 5, 'Supaclean Diswasher', 1, 0);
        $pdf->Cell(25, 5, '-', 1, 0);
        $pdf->Cell(34, 5, '1,200', 1, 1, 'R'); //end of line

        $pdf->Cell(130, 5, 'Something Else', 1, 0);
        $pdf->Cell(25, 5, '-', 1, 0);
        $pdf->Cell(34, 5, '1,000', 1, 1, 'R'); //end of line

        //summary
        $pdf->Cell(130, 5, '', 0, 0);
        $pdf->Cell(25, 5, 'Subtotal', 0, 0);
        $pdf->Cell(4, 5, '$', 1, 0);
        $pdf->Cell(30, 5, '4,450', 1, 1, 'R'); //end of line

        $pdf->Cell(130, 5, '', 0, 0);
        $pdf->Cell(25, 5, 'Taxable', 0, 0);
        $pdf->Cell(4, 5, '$', 1, 0);
        $pdf->Cell(30, 5, '0', 1, 1, 'R'); //end of line

        $pdf->Cell(130, 5, '', 0, 0);
        $pdf->Cell(25, 5, 'Tax Rate', 0, 0);
        $pdf->Cell(4, 5, '$', 1, 0);
        $pdf->Cell(30, 5, '10%', 1, 1, 'R'); //end of line

        $pdf->Cell(130, 5, '', 0, 0);
        $pdf->Cell(25, 5, 'Total Due', 0, 0);
        $pdf->Cell(4, 5, '$', 1, 0);
        $pdf->Cell(30, 5, '4,450', 1, 1, 'R'); //end of line



        $pdf->Output();
    }

    public function invoice_requisition()
    {
    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf = new PDF_Invoice();
    $pdf->AddPage();
    $pdf->addSociete( "REQUISITION FORM",
                    "MonAdresse\n" .
                    "75000 PARIS\n".
                    "R.C.S. PARIS B 000 000 007\n" .
                    "Capital : 18000 " . EURO );
    $pdf->fact_dev( "Devis ", "TEMPO" );
    $pdf->temporaire( "Approved By BOD" );
    $pdf->addDate( "03/12/2003");
    $pdf->addClient("CL01");
    $pdf->addPageNumber("1");
    $pdf->addClientAdresse("Modern Cikande Industrial Estate Block D No 1 & 2 Jalan Raya Jakarta Serang KM 68 Banten. Serang 42186. Indonesia");
    $pdf->addReglement("");
    $pdf->addEcheance("03/12/2003");
    $pdf->addNumTVA("FR888777666");
    $pdf->addReference("Devis ... du ....");
    $cols=array( "REFERENCE"    => 23,
                "DESIGNATION"  => 78,
                "QUANTITE"     => 22,
                "P.U. HT"      => 26,
                "MONTANT H.T." => 30,
                "TVA"          => 11 );
    $pdf->addCols( $cols);
    $cols=array( "REFERENCE"    => "L",
                "DESIGNATION"  => "L",
                "QUANTITE"     => "C",
                "P.U. HT"      => "R",
                "MONTANT H.T." => "R",
                "TVA"          => "C" );
    $pdf->addLineFormat( $cols);
    $pdf->addLineFormat($cols);

    $y    = 109;
    $line = array( "REFERENCE"    => "REF1",
                "DESIGNATION"  => "Carte Mère MSI 6378\n" .
                                    "Processeur AMD 1Ghz\n" .
                                    "128Mo SDRAM, 30 Go Disque, CD-ROM, Floppy, Carte vidéo",
                "QUANTITE"     => "1",
                "P.U. HT"      => "600.00",
                "MONTANT H.T." => "600.00",
                "TVA"          => "1" );
    $size = $pdf->addLine( $y, $line );
    $y   += $size + 2;

    $line = array( "REFERENCE"    => "REF2",
                "DESIGNATION"  => "Câble RS232",
                "QUANTITE"     => "1",
                "P.U. HT"      => "10.00",
                "MONTANT H.T." => "60.00",
                "TVA"          => "1" );
    $size = $pdf->addLine( $y, $line );
    $y   += $size + 2;

    $pdf->addCadreTVAs();
            
    // invoice = array( "px_unit" => value,
    //                  "qte"     => qte,
    //                  "tva"     => code_tva );
    // tab_tva = array( "1"       => 19.6,
    //                  "2"       => 5.5, ... );
    // params  = array( "RemiseGlobale" => [0|1],
    //                      "remise_tva"     => [1|2...],  // {la remise s'applique sur ce code TVA}
    //                      "remise"         => value,     // {montant de la remise}
    //                      "remise_percent" => percent,   // {pourcentage de remise sur ce montant de TVA}
    //                  "FraisPort"     => [0|1],
    //                      "portTTC"        => value,     // montant des frais de ports TTC
    //                                                     // par defaut la TVA = 19.6 %
    //                      "portHT"         => value,     // montant des frais de ports HT
    //                      "portTVA"        => tva_value, // valeur de la TVA a appliquer sur le montant HT
    //                  "AccompteExige" => [0|1],
    //                      "accompte"         => value    // montant de l'acompte (TTC)
    //                      "accompte_percent" => percent  // pourcentage d'acompte (TTC)
    //                  "Remarque" => "texte"              // texte
    $tot_prods = array( array ( "px_unit" => 600, "qte" => 1, "tva" => 1 ),
                        array ( "px_unit" =>  10, "qte" => 1, "tva" => 1 ));
    $tab_tva = array( "1"       => 19.6,
                    "2"       => 5.5);
    $params  = array( "RemiseGlobale" => 1,
                        "remise_tva"     => 1,       // {la remise s'applique sur ce code TVA}
                        "remise"         => 0,       // {montant de la remise}
                        "remise_percent" => 10,      // {pourcentage de remise sur ce montant de TVA}
                    "FraisPort"     => 1,
                        "portTTC"        => 10,      // montant des frais de ports TTC
                                                    // par defaut la TVA = 19.6 %
                        "portHT"         => 0,       // montant des frais de ports HT
                        "portTVA"        => 19.6,    // valeur de la TVA a appliquer sur le montant HT
                    "AccompteExige" => 1,
                        "accompte"         => 0,     // montant de l'acompte (TTC)
                        "accompte_percent" => 15,    // pourcentage d'acompte (TTC)
                    "Remarque" => "Avec un acompte, svp..." );

    $pdf->addTVAs( $params, $tab_tva, $tot_prods);
    $pdf->addCadreEurosFrancs();
    $pdf->Output();
    }

}

/* End of file C_cetak.php */
/* Location: ./application/controllers/C_cetak.php */