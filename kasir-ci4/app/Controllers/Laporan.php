<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProduk;
use App\Models\ModelLaporan;


class Laporan extends BaseController
{
    public function __construct() 
    {
        $this->ModelProduk = new ModelProduk();
        $this->ModelLaporan = new ModelLaporan();
    }
 public function PrintDataProduk()
 {
    $data = [
        'judul' => 'Laporan Data Produk',
        'produk' => $this->ModelProduk->AllData(),
        'page' => 'laporan/v_print_lap_produk',
         ];
         return view('laporan/v_template_print_laporan', $data);
     }

     public function LaporanHarian()
     {
        $data = [
            'judul'=> 'Laporan',
             'subjudul'=> 'Laporan Harian',
             'menu'=> 'Laporan',
             'submenu'=> 'Laporan-harian',
             'page' =>'laporan/v_laporan_harian',
             ];
             return view('v_template', $data);
     }

     public function ViewLaporanHarian()
     {
        $tgl = $this->request->getPost('tgl');
        $data = [
            'dataharian' => $this->ModelLaporan->DataHarian($tgl),
        ];
         
       $response = [
        'data' => view('laporan/v_tabel_laporan_harian', $data)
       ];

       echo json_encode($response);
      // echo dd($this->ModelLaporan->DataHarian($tgl));
     }

 }

