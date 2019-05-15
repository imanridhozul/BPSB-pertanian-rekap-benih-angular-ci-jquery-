<?php     
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller
{
   public function __construct()
		{
			parent::__construct();
			$this->load->model('ModelPkl');			    
			$this->load->model('ModelAll');		 
		}
	public function index()
	{
		$u=base_url();
		$nim='23/12/2016';
		$tahun = substr($nim,6,4);
		$bulan = substr($nim,0,2);
		$tgl = substr($nim,3,2);
		echo "$tahun - $bulan - $tgl
			 <form method='post' action='".$u."/Data/masukinDataKDL/kdl' enctype='multipart/form-data'>
                    <input type='file' name='userfile' ><br><br>
                    <input type='submit' name='submit' value='UPLOAD' class='btn btn-primary'>
                </form><br><br>
		
		";
		
	}	
	//============varietas
	/*function masukinDataKodeVar() { //memasukkan varietas ke db
        $this->load->library('csvimport'); //meload library csvimport.php
        $config['upload_path'] = './asset/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '1000';
        $this->load->library('upload', $config);
        // jika upload gagal, muncul error
        if (!$this->upload->do_upload()) 
		{
            echo "error";
        } 	
		else 
			{
				$file_data = $this->upload->data();
				$file_path =  './asset/'.$file_data['file_name'];

				if ($this->csvimport->get_array($file_path))
				{
					$csv_array = $this->csvimport->get_array($file_path);
						foreach ($csv_array as $row) 
						{
							$aa1=$row['kode'];
							$h = substr($aa1,3);
							$insert_data = array(
								'id'=>'',
								'kode'=>$h,
								'varietas'=>$row['var'],
								'tanaman'=>'pdn',
								'panen'=>'10',
								'produksi'=>'2.5',
								
							);
							$this->ModelAll->insert($insert_data);
							
						}
				}
            }  
    } 	
	public function geet()//dapetin kode varietasnya dari db jadi csv berdsarkan jenis
	{
           
            $data = array();           
			$i=1;
            $this->load->helper('csv');
			$q = $this->ModelAll->getV('pdn'); 
            foreach ($q as $row) {     
                $data[$i] = array($row->kode,$row->varietas);
				$i++;
            } 
			//echo array_to_csv($header);                  
            echo array_to_csv($data,'varietas.csv');                  
            die();
    } */
	//============varietas
	function masukinDataKDL($jenis) 
	{ //memasukkkan data ribuan ke db
        $this->load->library('csvimport'); //meload library csvimport.php
        $config['upload_path'] = './asset/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '1000';
        $this->load->library('upload', $config);
        // jika upload gagal, muncul error
        if (!$this->upload->do_upload()) {
            echo "error";
        } 
		else {
				$file_data = $this->upload->data();
				$file_path =  './asset/'.$file_data['file_name'];
				
				if ($this->csvimport->get_array($file_path)) 
				{$i=0;
					$csv_array = $this->csvimport->get_array($file_path);
							foreach ($csv_array as $row) {
								
								//echo $row['tanam']."<br>";
								$nim = $row['tanam'];
								$tahun1 = substr($nim,6,4);
								$bulan1 = substr($nim,0,2);
								$tgl1 = substr($nim,3,2);
								$tanam = $tahun1."-".$tgl1."-".$bulan1;
								
								$n = $row['sebar'];
								$ta = substr($n,6,4);
								$b = substr($n,0,2);
								$tg = substr($n,3,2);
								$sebar = $ta."-".$tg."-".$b;
								
								$nim1 = $row['panen'];
								$tahun = substr($nim1,6,4);
								$bulan = substr($nim1,0,2);
								$tgl = substr($nim1,3,2);
								$panen = $tahun."-".$tgl."-".$bulan;								
								$penangkar=$this->ModelAll->getPenangkar($row['nama']);								
								if(!$penangkar){
									$this->ModelAll->insertPenangkar($row['nama'],$row['F']);									
								}
								else
								{
									$p = $penangkar->id;
									//$pp = $penangkar->nama;
								}
								$penangkar=$this->ModelAll->getPenangkar($row['nama']);
								$p = $penangkar->id;
								$kodev=$this->ModelAll->getVarByKode($jenis,$row['B']);
								$kodek=$this->ModelAll->getBByKode($jenis,$row['C']);
								$vv=$kodev->id;
								$bb=$kodek->id;								
							//	echo $tanam.'<br>';
								$a = $row['A'].$row['B'].$row['C'].$row['D'].$row['E'].$row['F'];
								$insert_data = array(
									'id'=>'',
									'noinduk'=>$a,
									'nama'=>$p,
									'alamat'=>$row['alamat'],
									'blok'=>$row['blok'],
									'lokasi'=>$row['lokasi'],
									'kelasbenih'=>$bb,
									'varietas'=>$vv,
									'tanggalsebar'=>$sebar,                       
									'tanggaltanam'=>$tanam,                       
									'luasasal'=>$row['luas'],                       
									'tanggalpanen'=>$panen,                       
									'produksi'=>$row['produksi'],                       
									'luaslulus'=>$row['luaslulus'],                       
									'uji'=>$row['uji'],                       
									'lulusuji'=>$row['lulusuji'],                       
									'biaya'=>'',                       
									'status'=>'',  
									'tanaman'=>$jenis,  
									'mt'=>'2016/2017',  
								);
								
								$this->ModelAll->insertD($insert_data);
								$i++;
							}
					}
            }  
    } 
	public function kolekAll($mt,$j)//laporan NTB
	{
		$j = $this->input->post('jenis');
		$mt = $this->input->post('mt');
		$kab = $this->input->post('kab');
		$data = array();
		$this->load->helper('csv');
		$daerah=$this->ModelPkl->getDaerah();
		//$d1=$this->ModelAll->dataBerdasarkanKab($j,$mt,$kab);
		//$data[1] = array('Laporan Realisasi Kegiatan Sertifikasi Benih Tanaman Pangan '.$j,);  
		//$data[1] = array('Laporan Realisasi Kegiatan Sertifikasi Benih Tanaman Pangan '.$j,);  
		//$data[2] = array('MT : ',$mt);  
			$data[3] = array('No.','Kabupaten','Nama Penangkar', 'Kelas Benih', 'Varietas','Unit','Luas Asal', 'Luas lulus', 'Uji Lab', 'Lulus Uji');  
			$data[4] = array('');
            $header[1] = array('','','Laporan Realisasi Kegiatan Sertifikasi Benih Tanaman Pangan /'.$j.' Wilayah NTB',);  
			$header[2] = array('','','Provinsi', ':', 'Nusa Tenggara Barat');
			$header[3] = array('','','Musim Tanam ',':',$mt); 
			$header[4] = array('','','Tahun', ':', '');
			$header[5] = array('','','Sumber Dana', ' : ', 'APBN');
			$header[6] = array('','','Bulan ', ' : ', '');
			$header[7] = array('','','');
			$i=5;$in=1;
		foreach($daerah as $dae)	
		{	//echo $dae->nama;
			$kab = $dae->kode;
			$d1=$this->ModelAll->dataBerdasarkanKab($j,$mt,$kab);
			$tjb=$tujilab=$tlulusujilab=$tluaslulus=$tluasasal=0;
			$fln=0;
			foreach($d1 as $r)//ini dua kali
			{
				//	echo $r->penangkar."<br>";
				$d2=$this->ModelAll->dataBerdasarkanNamaPenangkar($r->nama,$j,$mt,$kab);//ini mencari data kelas benih apa saja di tiap penangkar
				//echo "tes";	
				$flp=0;
				$nr=$r->penangkar;
				foreach($d2 as $r1)
				{
					//echo $r->penangkar."/".$r1->kelasbenih."<br>";
					$d3=$this->ModelAll->dataBerdasarkanKelas($r1->kb,$r->nama,$j,$mt,$kab);//ini mencari dari setiap kelas benih ada varietas apa saja
					foreach($d3 as $r2)
					{
						//echo $r2->varietas."///".$r1->kelasbenih;
						$jb=0;
						$d4=$this->ModelAll->dataBerdasarkanVar($r2->idKelasBenih,$r->nama,$r2->v,$j,$mt,$kab);
						$ujilab=$lulusujilab=$luaslulus=$luasasal=0;
						foreach($d4 as $r3)
						{						
							//echo "===============================================-".$r3->varietas."<br>";	
							$luaslulus=$luaslulus+$r3->luaslulus;
							$luasasal=$luasasal+$r3->luasasal;
							$lulusujilab=$lulusujilab+$r3->lulusuji;
							$ujilab=$ujilab+$r3->uji;
							
							//untuk jumlah per kab
							$tluaslulus=$tluaslulus+$r3->luaslulus;
							$tluasasal=$tluasasal+$r3->luasasal;
							$tlulusujilab=$tlulusujilab+$r3->lulusuji;
							$tujilab=$tujilab+$r3->uji;
							$jb++;
						}
						//echo $r->nama."/".$r1->kelasbenih;
						//echo "/".$r2->varietas."/luas lulus".$luaslulus."/luasasal=".$luasasal."/ujilab".$ujilab."/lulusujilab".$lulusujilab."<br>";
						if($fln==0)
						{
							
							$data[$i]=array($in,$dae->nama,$nr,$r1->kelasbenih,$r2->varietas,$jb,$luasasal,$luaslulus,$ujilab,$lulusujilab);$in++;$i++;
						}
						else
						{
							$data[$i]=array('','',$nr,$r1->kelasbenih,$r2->varietas,$jb,$luasasal,$luaslulus,$ujilab,$lulusujilab);$i++;
						}
						$fln=1;						
						$tjb=$tjb+$jb;
					}
				}				
			}
			if($d1)
			{
				$data[$i]=array('','Jumlah','','','',$tjb,$tluasasal,$tluaslulus,$tujilab,$tlulusujilab);$i++;
			}					
		}
		echo array_to_csv($header);                  
		echo array_to_csv($data,'DataOlahNTB.csv');                  
		die();
	}
	public function laporanKolek()//laporan by Kabupaten
	{		
		$j = $this->input->post('jenis');
		$mt = $this->input->post('mt');
		$kab = $this->input->post('kab');
		if($kab == 'semua')
		{
			$this->kolekAll($mt,$j);
			//echo 'semua';
		}
		else{
			$data = array();
			$this->load->helper('csv');
			$d1=$this->ModelAll->dataBerdasarkanKab($j,$mt,$kab);
			$header[1] = array('','','Laporan Realisasi Kegiatan Sertifikasi Benih Tanaman Pangan /'.$j.' Wilayah '.$kab,);  
			$header[2] = array('','','Provinsi', ':', 'Nusa Tenggara Barat');
			$header[3] = array('','','Musim Tanam ',':',$mt); 
			$header[4] = array('','','Tahun', ':', '');
			$header[5] = array('','','Sumber Dana', ' : ', 'APBN');
			$header[6] = array('','','Bulan ', ' : ', '');
			$header[7] = array('','','');		
			$data[3] = array('No.','Nama Penangkar', 'Kelas Benih', 'Varietas','Unit','Luas Asal', 'Luas lulus', 'Uji Lab', 'Lulus Uji');  
			$data[4] = array('');			
			$i=5;$in=1;
			$tunit=$tujilab=$tlulusujilab=$tluaslulus=$tluasasal=0;
			foreach($d1 as $r)//ini dua kali
			{
				//	echo $r->penangkar."<br>";
				$d2=$this->ModelAll->dataBerdasarkanNamaPenangkar($r->nama,$j,$mt,$kab);//ini mencari data kelas benih apa saja di tiap penangkar
				foreach($d2 as $r1)
				{
					//echo $r->penangkar."/".$r1->kelasbenih."<br>";
					$d3=$this->ModelAll->dataBerdasarkanKelas($r1->kb,$r->nama,$j,$mt,$kab);//ini mencari dari setiap kelas benih ada varietas apa saja
					foreach($d3 as $r2)
					{
						//echo $r2->varietas."///".$r1->kelasbenih;
						$d4=$this->ModelAll->dataBerdasarkanVar($r2->idKelasBenih,$r->nama,$r2->v,$j,$mt,$kab);
						$unit=$ujilab=$lulusujilab=$luaslulus=$luasasal=0;
						foreach($d4 as $r3)
						{						
							//echo "===============================================-".$r3->varietas."<br>";	
							$luaslulus=$luaslulus+$r3->luaslulus;
							$luasasal=$luasasal+$r3->luasasal;
							$lulusujilab=$lulusujilab+$r3->lulusuji;
							$ujilab=$ujilab+$r3->uji;
							$unit++;
							$tluaslulus=$tluaslulus+$r3->luaslulus;
							$tluasasal=$tluasasal+$r3->luasasal;
							$tlulusujilab=$tlulusujilab+$r3->lulusuji;
							$tujilab=$tujilab+$r3->uji;
						}
						$tunit=$tunit+$unit;
						//echo $r->nama."/".$r1->kelasbenih;
					//	echo "/".$r2->varietas."/luas lulus".$luaslulus."/luasasal=".$luasasal."/ujilab".$ujilab."/lulusujilab".$lulusujilab."<br>";
						$data[$i]=array($in,$r->penangkar,$r1->kelasbenih,$r2->varietas,$unit,$luasasal,$luaslulus,$ujilab,$lulusujilab);$in++;$i++;
					}
				}
			}
			$data[$i]=array('Jumlah','','','',$tunit,$tluasasal,$tluaslulus,$tujilab,$tlulusujilab);$in++;$i++;
			echo array_to_csv($header);                  
			echo array_to_csv($data,'DataOlahKab.csv');                  
			die();
		}
		
	}
	//================kolek by varietas
	public function laporanKolekVarietas()//laporan
	{
		
		$j = $this->input->post('jenis');
		$mt = $this->input->post('mt');
		$mt2 = $this->input->post('mt2');
		$kab = $this->input->post('kab');
		
		if($kab == 'semua')
		{
			$this->kolekAllVarietas($mt,$j,$mt2);
			//echo 'semua';
		}
		else{
			$this->load->helper('csv');			
			$junit=$tp1=$tujilab1=$tlulusujilab1=$tluaslulus1=$tluasasal1=0;
			$jasumsi=$jluasasal=$jluaslulus=0;
			$tp=$tujilab=$tlulusujilab=$tluaslulus=$tluasasal=0;
			$d1=$this->ModelAll->dataBerdasarkanVarietas($j,$mt,$kab,$mt2);
			$fln=0;
			$jb=0;
			$jb1=0;$in=0;$i=5;
			$header[1] = array('','','Laporan Realisasi Kegiatan Sertifikasi Benih Tanaman Pangan By Varietas /'.$j.' Wilayah Kabupaten'.$kab,);  
			$header[2] = array('','','Provinsi', ':', 'Nusa Tenggara Barat');
			$header[3] = array('','','Musim Tanam ',':',$mt.' dan '.$mt2); 
			$header[4] = array('','','Tahun', ':', '');
			$header[5] = array('','','Sumber Dana', ' : ', 'APBN');
			$header[6] = array('','','Bulan ', ' : ', '');
			$header[7] = array('','','');			
			$data[2] = array('');  
			$data[3] = array('No.','Kabupaten','Varietas', 'Kelas Benih','Unit','Luas Asal', 'Luas lulus','Asumsi Produksi', 'Uji Lab', 'Lulus Uji',
				'','Unit','Luas Asal', 'Luas lulus','Asumsi Produksi','Uji Lab', 'Lulus Uji','','Total Unit','Total Luas Asal','Total Luas Lulus','Total Asumsi'
			);  
			$data[4] = array('');		
			foreach($d1 as $r)//ini dua kali
			{				
					
				$d2=$this->ModelAll->dataBerdasarkanKls($j,$mt,$kab,$r->idV,$mt2);
				foreach($d2 as $r1)
				{
					
					$d3=$this->ModelAll->dataKbV($j,$mt,$kab,$r->idV,$r1->kb);
					$d4=$this->ModelAll->dataKbV($j,$mt2,$kab,$r->idV,$r1->kb);
					$p1=$unit1=$ujilab1=$lulusujilab1=$luaslulus1=$luasasal1=0;
					$p=$unit=$ujilab=$lulusujilab=$luaslulus=$luasasal=0;
					$sunit=$sluasasal=$sluaslulus=$sasumsi=0;
					foreach($d3 as $r2)
					{
						$luaslulus=$luaslulus+$r2->luaslulus;
						$luasasal=$luasasal+$r2->luasasal;
						$lulusujilab=$lulusujilab+$r2->lulusuji;
						$ujilab=$ujilab+$r2->uji;					
						$p=$p+$r2->produksi;					
						//===untuk total perkab
						$tluaslulus=$tluaslulus+$r2->luaslulus;
						$tluasasal=$tluasasal+$r2->luasasal;
						$tlulusujilab=$tlulusujilab+$r2->lulusuji;
						$tujilab=$tujilab+$r2->uji;
						$tp=$tp+$r2->produksi;	
						$unit++;
						$jb++;
					}
					foreach($d4 as $r2)
					{					
						$luaslulus1=$luaslulus1+$r2->luaslulus;
						$luasasal1=$luasasal1+$r2->luasasal;
						$lulusujilab1=$lulusujilab1+$r2->lulusuji;
						$ujilab1=$ujilab1+$r2->uji;	
						$p1=$p1+$r2->produksi;							
						//===untuk total perkab
						$tluaslulus1=$tluaslulus1+$r2->luaslulus;
						$tluasasal1=$tluasasal1+$r2->luasasal;
						$tlulusujilab1=$tlulusujilab1+$r2->lulusuji;
						$tujilab1=$tujilab1+$r2->uji;
						$tp1=$tp1+$r2->produksi;	
						$unit1++;
						$jb1++;
					}
					$sunit=$unit+$unit1;$junit=$junit+$sunit;
					$sluasasal=$luasasal+$luasasal1;
					$sluaslulus=$luaslulus+$luaslulus1;
					$sasumsi=$p1+$p;$jasumsi=$jasumsi+$sasumsi;$jluasasal=$jluasasal+$sluasasal;
					$jluaslulus=$jluaslulus+$sluaslulus;
					if($fln==0)
					{						
						$data[$i]=array('',$kab,$r->varietas,$r1->kelasbenih,$unit,$luasasal,$luaslulus,$p,$ujilab,$lulusujilab,
							'',$unit1,$luasasal1,$luaslulus1,$p1,$ujilab1,$lulusujilab1,'',$sunit,$sluasasal,$sluaslulus,$sasumsi	
						);$i++;$in++;
					}
					else
					{
						$data[$i]=array('','',$r->varietas,$r1->kelasbenih,$unit,$luasasal,$luaslulus,$p,$ujilab,$lulusujilab,
						'',$unit1,$luasasal1,$luaslulus1,$p1,$ujilab1,$lulusujilab1,'',$sunit,$sluasasal,$sluaslulus,$sasumsi	
						);$i++;
					}					
					$fln=1;
				}
							
			}
			if($d1)
			{
				$tunit1=$tasumsi1=$tujilab1=$tlulusujilab1=$tluaslulus1=$tluasasal1=0;	
				//mt2
				$tunit=$tasumsi=$tujilab=$tlulusujilab=$tluaslulus=$tluasasal=0;
				//total mt1 + mt2
				$t1=$t2=$t3=$t4=0;
				//kesimpulan dibawah tiap kabupaten
				$ks=$this->ModelAll->kesimpulan($j,$mt,$mt2,$kab);
				//echo $kab."<br><br>";
				foreach($ks as $rri)
				{
					//echo $rri->kelasbenih."====".$rri->mt."<br>";
					$p1=$unit1=$ujilab1=$lulusujilab1=$luaslulus1=$luasasal1=0;
					$p=$unit=$ujilab=$lulusujilab=$luaslulus=$luasasal=0;
					$sunit=$sluasasal=$sluaslulus=$sasumsi=0;
					$ks1=$this->ModelAll->kesimpulanKelas($j,$mt,$kab,$rri->kb);
					$ks2=$this->ModelAll->kesimpulanKelas($j,$mt2,$kab,$rri->kb);
					foreach($ks1 as $r2)
					{
						//echo "================ ".$r2->luaslulus.",";
						$luaslulus=$luaslulus+$r2->luaslulus;
						$luasasal=$luasasal+$r2->luasasal;
						$lulusujilab=$lulusujilab+$r2->lulusuji;
						$ujilab=$ujilab+$r2->uji;					
						$p=$p+$r2->produksi;$unit++;			
					}
					//echo"<br>";
					foreach($ks2 as $r2)
					{
						$luaslulus1=$luaslulus1+$r2->luaslulus;
						$luasasal1=$luasasal1+$r2->luasasal;
						$lulusujilab1=$lulusujilab1+$r2->lulusuji;
						$ujilab1=$ujilab1+$r2->uji;	
						$p1=$p1+$r2->produksi;$unit1++;			
					}
					$sunit=$unit+$unit1;
					$sluasasal=$luasasal+$luasasal1;
					$sluaslulus=$luaslulus+$luaslulus1;
					$sasumsi=$p1+$p;
					
					$data[$i]=array('','Jumlah',$rri->kelasbenih,'',$unit,$luasasal,$luaslulus,$p,$ujilab,$lulusujilab,'',$unit1,
					$luasasal1,$luaslulus1,$p1,$ujilab1,$lulusujilab1,'',$sunit,$sluasasal,$sluaslulus,$sasumsi);$i++;
					//untuk total
					//mt1
					$tunit=$tunit+$unit;
					$tluasasal=$tluasasal+$luasasal;
					$tluaslulus=$tluaslulus+$luaslulus;
					$tasumsi=$tasumsi+$p;
					//mt2
					$tunit1=$tunit1+$unit1;
					$tluasasal1=$tluasasal1+$luasasal1;
					$tluaslulus1=$tluaslulus1+$luaslulus1;
					$tasumsi1=$tasumsi1+$p1;						
										
				}
				$t1=$tunit+$tunit1;$t2=$tluasasal+$tluasasal1;$t3=$tluaslulus+$tluaslulus1;$t4=$tasumsi+$tasumsi1;
				$data[$i]=array('','Total','','',$tunit,$tluasasal,$tluaslulus,$tasumsi,$tujilab,$tlulusujilab,'',$tunit1,
					$tluasasal1,$tluaslulus1,$tasumsi1,$tujilab1,$tlulusujilab1,'',$t1,$t2,$t3,$t4);$i++;
				$data[$i]=array('');$i++;						
			}
				$waktu = date("Y-m-d");
				echo array_to_csv($header);                  
				echo array_to_csv($data,'Data PerVarietas Kabupaten'.$kab.' tanggal '.$waktu.'.csv');    
		}
		
	}
	
	
	public function kolekAllVarietas($mt,$j,$mt2)//laporan
	{		
		$kab="";
		/*$j = $this->input->post('jenis');
		$mt = $this->input->post('mt');
		$mt2 = $this->input->post('mt2');
		$kab = $this->input->post('kab');*/
			$data = array();
			$this->load->helper('csv');			
			$dr = $this->ModelAll->getKab($kab)->row();	
			$header[1] = array('','','Laporan Realisasi Kegiatan Sertifikasi Benih Tanaman Pangan By Varietas /'.$j.' Wilayah NTB',);  
			$header[2] = array('','','Provinsi', ':', 'Nusa Tenggara Barat');
			$header[3] = array('','','Musim Tanam ',':',$mt.' dan '.$mt2); 
			$header[4] = array('','','Tahun', ':', '');
			$header[5] = array('','','Sumber Dana', ' : ', 'APBN');
			$header[6] = array('','','Bulan ', ' : ', '');
			$header[7] = array('','','');			
			$data[2] = array('','','','','','','',$mt.'','','','','','','',$mt2.'');  
			$data[3] = array('No.','Kabupaten','Varietas', 'Kelas Benih','Unit','Luas Asal', 'Luas lulus','Asumsi Produksi', 'Uji Lab', 'Lulus Uji',
				'','Unit','Luas Asal', 'Luas lulus','Asumsi Produksi','Uji Lab', 'Lulus Uji','','Total Unit','Total Luas Asal','Total Luas Lulus','Total Asumsi'
			);  
			$data[4] = array('');		
			$i=5;$in=1;
			$daerah=$this->ModelPkl->getDaerah();
		foreach($daerah as $dae)	//for dae
		{	
			$kab = $dae->kode;
			$junit=$tp1=$tujilab1=$tlulusujilab1=$tluaslulus1=$tluasasal1=0;
			$jasumsi=$jluasasal=$jluaslulus=0;
			$tp=$tujilab=$tlulusujilab=$tluaslulus=$tluasasal=0;
			$d1=$this->ModelAll->dataBerdasarkanVarietas($j,$mt,$kab,$mt2);
			$fln=0;
			$jb=0;
			$jb1=0;
			foreach($d1 as $r)//ini dua kali
			{				
					
				$d2=$this->ModelAll->dataBerdasarkanKls($j,$mt,$kab,$r->idV,$mt2);
				foreach($d2 as $r1)
				{
					
					$d3=$this->ModelAll->dataKbV($j,$mt,$kab,$r->idV,$r1->kb);
					$d4=$this->ModelAll->dataKbV($j,$mt2,$kab,$r->idV,$r1->kb);
					$p1=$unit1=$ujilab1=$lulusujilab1=$luaslulus1=$luasasal1=0;
					$p=$unit=$ujilab=$lulusujilab=$luaslulus=$luasasal=0;
					$sunit=$sluasasal=$sluaslulus=$sasumsi=0;
					foreach($d3 as $r2)
					{
						$luaslulus=$luaslulus+$r2->luaslulus;
						$luasasal=$luasasal+$r2->luasasal;
						$lulusujilab=$lulusujilab+$r2->lulusuji;
						$ujilab=$ujilab+$r2->uji;					
						$p=$p+$r2->produksi;					
						//===untuk total perkab
						$tluaslulus=$tluaslulus+$r2->luaslulus;
						$tluasasal=$tluasasal+$r2->luasasal;
						$tlulusujilab=$tlulusujilab+$r2->lulusuji;
						$tujilab=$tujilab+$r2->uji;
						$tp=$tp+$r2->produksi;	
						$unit++;
						$jb++;
					}
					foreach($d4 as $r2)
					{					
						$luaslulus1=$luaslulus1+$r2->luaslulus;
						$luasasal1=$luasasal1+$r2->luasasal;
						$lulusujilab1=$lulusujilab1+$r2->lulusuji;
						$ujilab1=$ujilab1+$r2->uji;	
						$p1=$p1+$r2->produksi;							
						//===untuk total perkab
						$tluaslulus1=$tluaslulus1+$r2->luaslulus;
						$tluasasal1=$tluasasal1+$r2->luasasal;
						$tlulusujilab1=$tlulusujilab1+$r2->lulusuji;
						$tujilab1=$tujilab1+$r2->uji;
						$tp1=$tp1+$r2->produksi;	
						$unit1++;
						$jb1++;
					}
					$sunit=$unit+$unit1;$junit=$junit+$sunit;
					$sluasasal=$luasasal+$luasasal1;
					$sluaslulus=$luaslulus+$luaslulus1;
					$sasumsi=$p1+$p;$jasumsi=$jasumsi+$sasumsi;$jluasasal=$jluasasal+$sluasasal;
					$jluaslulus=$jluaslulus+$sluaslulus;
					if($fln==0)
					{						
						$data[$i]=array($in,$dae->nama,$r->varietas,$r1->kelasbenih,$unit,$luasasal,$luaslulus,$p,$ujilab,$lulusujilab,
							'',$unit1,$luasasal1,$luaslulus1,$p1,$ujilab1,$lulusujilab1,'',$sunit,$sluasasal,$sluaslulus,$sasumsi	
						);$i++;$in++;
					}
					else
					{
						$data[$i]=array('','',$r->varietas,$r1->kelasbenih,$unit,$luasasal,$luaslulus,$p,$ujilab,$lulusujilab,
						'',$unit1,$luasasal1,$luaslulus1,$p1,$ujilab1,$lulusujilab1,'',$sunit,$sluasasal,$sluaslulus,$sasumsi	
						);$i++;
					}					
					$fln=1;
				}
							
			}
			if($d1)
			{
				$tunit1=$tasumsi1=$tujilab1=$tlulusujilab1=$tluaslulus1=$tluasasal1=0;	
				//mt2
				$tunit=$tasumsi=$tujilab=$tlulusujilab=$tluaslulus=$tluasasal=0;
				//total mt1 + mt2
				$t1=$t2=$t3=$t4=0;
				//kesimpulan dibawah tiap kabupaten
				$ks=$this->ModelAll->kesimpulan($j,$mt,$mt2,$kab);
				//echo $kab."<br><br>";
				foreach($ks as $rri)
				{
					//echo $rri->kelasbenih."====".$rri->mt."<br>";
					$p1=$unit1=$ujilab1=$lulusujilab1=$luaslulus1=$luasasal1=0;
					$p=$unit=$ujilab=$lulusujilab=$luaslulus=$luasasal=0;
					$sunit=$sluasasal=$sluaslulus=$sasumsi=0;
					$ks1=$this->ModelAll->kesimpulanKelas($j,$mt,$kab,$rri->kb);
					$ks2=$this->ModelAll->kesimpulanKelas($j,$mt2,$kab,$rri->kb);
					foreach($ks1 as $r2)
					{
						//echo "================ ".$r2->luaslulus.",";
						$luaslulus=$luaslulus+$r2->luaslulus;
						$luasasal=$luasasal+$r2->luasasal;
						$lulusujilab=$lulusujilab+$r2->lulusuji;
						$ujilab=$ujilab+$r2->uji;					
						$p=$p+$r2->produksi;$unit++;			
					}
					//echo"<br>";
					foreach($ks2 as $r2)
					{
						$luaslulus1=$luaslulus1+$r2->luaslulus;
						$luasasal1=$luasasal1+$r2->luasasal;
						$lulusujilab1=$lulusujilab1+$r2->lulusuji;
						$ujilab1=$ujilab1+$r2->uji;	
						$p1=$p1+$r2->produksi;$unit1++;			
					}
					$sunit=$unit+$unit1;
					$sluasasal=$luasasal+$luasasal1;
					$sluaslulus=$luaslulus+$luaslulus1;
					$sasumsi=$p1+$p;
					
					$data[$i]=array('','Jumlah',$rri->kelasbenih,'',$unit,$luasasal,$luaslulus,$p,$ujilab,$lulusujilab,'',$unit1,
					$luasasal1,$luaslulus1,$p1,$ujilab1,$lulusujilab1,'',$sunit,$sluasasal,$sluaslulus,$sasumsi);$i++;
					//untuk total
					//mt1
					$tunit=$tunit+$unit;
					$tluasasal=$tluasasal+$luasasal;
					$tluaslulus=$tluaslulus+$luaslulus;
					$tasumsi=$tasumsi+$p;
					//mt2
					$tunit1=$tunit1+$unit1;
					$tluasasal1=$tluasasal1+$luasasal1;
					$tluaslulus1=$tluaslulus1+$luaslulus1;
					$tasumsi1=$tasumsi1+$p1;						
										
				}
				$t1=$tunit+$tunit1;$t2=$tluasasal+$tluasasal1;$t3=$tluaslulus+$tluaslulus1;$t4=$tasumsi+$tasumsi1;
				$data[$i]=array('','Total','','',$tunit,$tluasasal,$tluaslulus,$tasumsi,$tujilab,$tlulusujilab,'',$tunit1,
					$tluasasal1,$tluaslulus1,$tasumsi1,$tujilab1,$tlulusujilab1,'',$t1,$t2,$t3,$t4);$i++;
				$data[$i]=array('');$i++;						
			}
			
		}//for dae
		
		
		//untuk semua data ntb
		$junit=$tp1=$tujilab1=$tlulusujilab1=$tluaslulus1=$tluasasal1=0;
		$jasumsi=$jluasasal=$jluaslulus=0;
		$tp=$tujilab=$tlulusujilab=$tluaslulus=$tluasasal=0;
		$bw1=$this->ModelAll->dataBawahVar($j,$mt,$mt2);
		$data[$i]=array('','');$in++;$i++;
		$in=1;
		foreach($bw1 as $r)
		{
			//echo $r->varietas.'<br>';
			$bw2=$this->ModelAll->dataBawahKls($j,$mt,$mt2,$r->idV);
			$p1=$unit1=$ujilab1=$lulusujilab1=$luaslulus1=$luasasal1=0;
			$p=$unit=$ujilab=$lulusujilab=$luaslulus=$luasasal=0;
			$sunit=$sluasasal=$sluaslulus=$sasumsi=0;
			foreach($bw2 as $r2)
			{
				//echo '======='.$r2->kelasbenih.'======='.$r2->mt.'<br>';
				$bw31=$this->ModelAll->dataBawah($j,$mt,$r->idV,$r2->kb);
				$bw32=$this->ModelAll->dataBawah($j,$mt2,$r->idV,$r2->kb);
				foreach($bw31 as $r3)
				{					
					//echo"=====================mt 16/17 <br>";
						$luaslulus=$luaslulus+$r3->luaslulus;
						$luasasal=$luasasal+$r3->luasasal;
						$lulusujilab=$lulusujilab+$r3->lulusuji;
						$ujilab=$ujilab+$r3->uji;					
						$p=$p+$r3->produksi;					
						//===untuk total perkab
						/*$tluaslulus=$tluaslulus+$r3->luaslulus;
						$tluasasal=$tluasasal+$r3->luasasal;
						$tlulusujilab=$tlulusujilab+$r3->lulusuji;
						$tujilab=$tujilab+$r3->uji;
						$tp=$tp+$r3->produksi;	*/
						$unit++;
						//$jb++;
					
				}
				foreach($bw32 as $r3)
				{
					//echo"=====================mt 17 <br>";
						$luaslulus1=$luaslulus1+$r3->luaslulus;
						$luasasal1=$luasasal1+$r3->luasasal;
						$lulusujilab1=$lulusujilab1+$r3->lulusuji;
						$ujilab1=$ujilab1+$r3->uji;	
						$p1=$p1+$r3->produksi;							
						//===untuk total perkab
						/*$tluaslulus1=$tluaslulus1+$r3->luaslulus;
						$tluasasal1=$tluasasal1+$r3->luasasal;
						$tlulusujilab1=$tlulusujilab1+$r3->lulusuji;
						$tujilab1=$tujilab1+$r3->uji;
						$tp1=$tp1+$r3->produksi;	*/
						$unit1++;
						//$jb1++;
					
				}
					$sunit=$unit+$unit1;
					$sluasasal=$luasasal+$luasasal1;
					$sluaslulus=$luaslulus+$luaslulus1;
					$sasumsi=$p1+$p;					
				$data[$i]=array($in,'',$r->varietas,$r2->kelasbenih,$unit,$luasasal,$luaslulus,$p,$ujilab,$lulusujilab,
						'',$unit1,$luasasal1,$luaslulus1,$p1,$ujilab1,$lulusujilab1,'',$sunit,$sluasasal,$sluaslulus,$sasumsi	
						);$in++;$i++;
				$p1=$unit1=$ujilab1=$lulusujilab1=$luaslulus1=$luasasal1=0;
				$p=$unit=$ujilab=$lulusujilab=$luaslulus=$luasasal=0;
			}
		}
				
				//ini untuk kesimpulan akhir jumlahnya untuk ntb
				$kab='';
				$ks=$this->ModelAll->kesimpulanAkhir($j,$mt,$mt2,$kab);
				//echo $kab."<br><br>";
				
				foreach($ks as $rri)
				{
					//echo $rri->kelasbenih."====".$rri->mt."<br>";
					$p1=$unit1=$ujilab1=$lulusujilab1=$luaslulus1=$luasasal1=0;
					$p=$unit=$ujilab=$lulusujilab=$luaslulus=$luasasal=0;
					$sunit=$sluasasal=$sluaslulus=$sasumsi=0;
					$ks1=$this->ModelAll->kesimpulanKelas($j,$mt,$kab,$rri->kb);
					$ks2=$this->ModelAll->kesimpulanKelas($j,$mt2,$kab,$rri->kb);
					foreach($ks1 as $r2)
					{
						//echo "================ ".$r2->luaslulus.",";
						$luaslulus=$luaslulus+$r2->luaslulus;
						$luasasal=$luasasal+$r2->luasasal;
						$lulusujilab=$lulusujilab+$r2->lulusuji;
						$ujilab=$ujilab+$r2->uji;					
						$p=$p+$r2->produksi;$unit++;			
					}
					//echo"<br>";
					foreach($ks2 as $r2)
					{
						$luaslulus1=$luaslulus1+$r2->luaslulus;
						$luasasal1=$luasasal1+$r2->luasasal;
						$lulusujilab1=$lulusujilab1+$r2->lulusuji;
						$ujilab1=$ujilab1+$r2->uji;	
						$p1=$p1+$r2->produksi;$unit1++;			
					}
					$sunit=$unit+$unit1;
					$sluasasal=$luasasal+$luasasal1;
					$sluaslulus=$luaslulus+$luaslulus1;
					$sasumsi=$p1+$p;
					$data[$i]=array('','Jumlah',$rri->kelasbenih,'',$unit,$luasasal,$luaslulus,$p,$ujilab,$lulusujilab,'',$unit1,
					$luasasal1,$luaslulus1,$p1,$ujilab1,$lulusujilab1,'',$sunit,$sluasasal,$sluaslulus,$sasumsi);$i++;
					//$data[$i]=array('');$i++;$in++;	
							
				}
		
		$waktu = date("Y-m-d");
	echo array_to_csv($header);                  
echo array_to_csv($data,'Data PerVarietas NTB tanggal '.$waktu.'.csv');                  
	die();	
		
	}
	
	//===============================//end kolek var===========
	public function createLaporan() //ini laporan csv berdasarkan kabupatennya
	{
            $da['jenis'] = $this->input->post('jenis');
			$mtt=$da['mt'] = $this->input->post('mt');
			$da['kab'] = $this->input->post('kab');
			
            $data = array();
            $header = array();
            $i=2;
			$in=1;
            $data[1] = array('No.', 'Nomor Induk', 'Nama Penangkar', 'Alamat', 'Blok', 'Lokasi Areal', 'Kelas Benih',
			'Varietas', 'tgl Sebar', 'tgl Tanam', 'Luas Asal (Ha)', 'Perkiraan Tanggal Panen', 'Perkiraan Produksi',
			'Luas Lulus', 'Uji (Ton)', 'Lulus (Ton)', 'Biaya', 'Status');  
			$data[2] = array('');
            $header[1] = array('Laporan Buku induk');
			$header[2] = array('Musim Tanam', ' : ', ''.$mtt);
			$header[3] = array('', '', '');
			$header[4] = array('', '', '');
            $this->load->helper('csv');
			$q = $this->ModelAll->dataLaporan($da); 
            foreach ($q as $row) {     
				if($row->status==1)
				{
					$sta="Sudah";
				}
				else{
					$sta="Belum";
				}
                $data[++$i] = array($in,$row->noinduk,$row->nama,$row->alamat,$row->blok,
				$row->lokasi,$row->kelasbenih,$row->varietas,$row->tanggalsebar,$row->tanggaltanam,
				$row->luasasal,$row->tanggalpanen,$row->produksi,$row->luaslulus,$row->uji,$row->lulusuji,$row->biaya,$sta);
				$in++;
            } 
			echo array_to_csv($header);                  
            echo array_to_csv($data,'PKL.csv');                  
			die();
    } 
	
}