<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('pelanggan_model');
        $this->load->model('penerimaan_model');
        $this->load->model('kurir_model');
        $this->load->model('barang_model');
        $this->load->model('harga_model');
        $this->load->model('daftar_barang_model');
        $this->load->model('history_model');
        $this->load->library('form_validation');
        $this->load->library('pdf_barcode');
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
}

/* End of file C_cetak.php */
/* Location: ./application/controllers/C_cetak.php */