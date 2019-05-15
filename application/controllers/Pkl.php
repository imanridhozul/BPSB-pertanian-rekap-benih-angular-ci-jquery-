<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pkl extends CI_Controller
{
   public function __construct()
		{
			parent::__construct();
			$this->load->model('ModelPkl');
			$this->load->model('ModelAll');	
		}
	public function index()
	{
	
		$data['jenis'] = $this->ModelPkl->dataHome();
		$data['kab'] = $this->ModelPkl->getDaerah();
		$data['mt'] = $this->ModelPkl->getMt()->result();
		$data['title']='Halaman Home';
		$this->load->view('head',$data);
		$this->load->view('row');
		$this->load->view('homes',$data);		
	}
	//=====================data data =================================
	public function editData($id){
        $t=$this->ModelPkl->getDataById($id);
        $row = $t->row();
		 echo json_encode($row);
        
    }
	public function detail()
	{
		$jenis = $this->input->post('jenis');
		$dk = $this->ModelPkl->getDataByJenis($jenis);
		$d['kat'] = $dk->result();
		$d['penangkar'] = $this->ModelPkl->getPenangkar()->result();
		$d['kab'] = $this->ModelAll->getKab()->result();
		$db = $this->ModelPkl->getBenihByJenis($jenis);
		$d['ben'] = $db->result();
		$d['jn'] = $jenis;		
		$d['var'] = $this->ModelPkl->getVarietasByJenis($jenis)->result();
		$data['title']='Halaman Data || '.$jenis;
		$this->load->view('head',$data);
		$this->load->view('row');
		$this->load->view('detail',$d);		
		
	}
	/*public function tes_detail($jenis)
	{
		//$jenis = $this->input->post('jenis');
		$d['kat'] = $this->ModelPkl->getDataByJenis($jenis);
		$d['ben'] = $this->ModelPkl->getBenihByJenis($jenis);
		$d['jn'] = $jenis;		
		$d['var'] = $this->ModelPkl->getVarietasByJenis($jenis);
		$this->detail($d);
		
	}*/
	public function getDeskripsi()//for tabel detail
	{	
		$j=$this->uri->segment('3');
		$kab=$this->uri->segment('4');
		$query=$this->ModelPkl->getDataByJenisKab($j,$kab);
		$data=array();
    	$no=0;
    	foreach ($query->result_array() as $dt) {
			if($dt['status']==0)
			{
				$st='Belum';
			}
			else
			{
				$st='Sudah';
			}
    		$no++;
    		array_push($data, array(
    			$no,
				'<button class="btn btn-xs btn-success" href="" onclick="editData('.$dt['idData'].')"><span class="glyphicon glyphicon-eye-open"></span></button> ||
				<a class="btn btn-xs btn-danger" href="#" onclick="hapus('.$dt['idData'].')"><span class="glyphicon glyphicon-trash"></span></a>',
    			$dt['noinduk'],$dt['nama'],$dt['alamat'],$dt['blok'],
    			$dt['lokasi'],$dt['kelasbenih'],$dt['varietas'],$dt['tanggalsebar'],
    			$dt['tanggaltanam'],$dt['luasasal'],$dt['tanggalpanen'],$dt['produksi'],
    			$dt['luaslulus'],$dt['uji'],$dt['lulusuji'],$dt['biaya'],
    			$st,	
    		));
    	};
		$this->output->set_content_type('aplication/json')->set_output(json_encode(array('data'=>$data)));
	}
	public function update()
	{	
		$data['noinduk'] = $this->input->post('noinduk');
		$data['nama'] = $this->input->post('nama');
		$data['alamat'] = $this->input->post('alamat');
		$data['lokasi'] = $this->input->post('lokasi');
		$data['benih'] = $this->input->post('benih');
		$data['blok'] = $this->input->post('blok');
		$data['var'] = $this->input->post('var');
		$data['sebar'] = $this->input->post('sebar');
		$data['tanam'] = $this->input->post('tanam');
		$data['panen'] = $this->input->post('panen');
		$data['luasasal'] = $this->input->post('luasasal');
		$data['produksi'] = $this->input->post('produksi');
		$data['luaslulus'] = $this->input->post('luaslulus');
		$data['uji'] = $this->input->post('uji');
		$data['lulusuji'] = $this->input->post('lulusuji');
		$data['status'] = $this->input->post('status');
		$data['biaya'] = $this->input->post('biaya');
		$id=$data['id'] = $this->input->post('id');
		$this->ModelPkl->updateData($data);
		 $da =  array( 'status' =>TRUE,
                        'id' =>$id,                        
        );		
		echo json_encode($da);		
	}	

	public function addData()
	{	
		$data['noinduk0'] = $this->input->post('noinduk0');
		$data['noinduk1'] = $this->input->post('noinduk1');
		$data['noinduk2'] = $this->input->post('noinduk2');
		$data['noinduk3'] = $this->input->post('noinduk3');
		$data['noinduk4'] = $this->input->post('noinduk4');
		$data['noinduk5'] = $this->input->post('noinduk5');
		$data['nama'] = $this->input->post('nama');
		$data['alamat'] = $this->input->post('alamat');
		$data['lokasi'] = $this->input->post('lokasi');
		$data['benih'] = $this->input->post('benih');
		$data['blok'] = $this->input->post('blok');
		$data['var'] = $this->input->post('var');
		$data['sebar'] = $this->input->post('sebar');
		$data['tanam'] = $this->input->post('tanam');
		$data['panen'] = $this->input->post('panen');
		$data['luasasal'] = $this->input->post('luasasal');
		$data['produksi'] = $this->input->post('produksi');
		$data['luaslulus'] = $this->input->post('luaslulus');
		$data['uji'] = $this->input->post('uji');
		$data['lulusuji'] = $this->input->post('lulusuji');
		$data['status'] = $this->input->post('status');
		$data['biaya'] = $this->input->post('biaya');		
		$data['tanaman'] = $this->input->post('tanaman');		
		$this->ModelPkl->addData($data);
		echo json_encode(array("status" => TRUE));
	}
	public function deleteData($id)
	{		
		$this->ModelPkl->deleteData($id);
		echo json_encode(array("status" => TRUE));			
	}
	 public function getFile($jenis)//all file by jenis ex : kdl or pdn (semua data dalam suatu tanaman jadi satu ) ini button export dihalaman detail
	 {
           
            $data = array();
            $header = array();
            $i=2;
			$in=1;
            $data[1] = array('No.', 'Nomor Induk', 'Nama Penangkar', 'Alamat', 'Blok', 'Lokasi Areal', 'Kelas Benih',
			'Varietas', 'tgl Sebar', 'tgl Tanam', 'Luas Asal (Ha)', 'Perkiraan Tanggal Panen', 'Perkiraan Produksi',
			'Luas Lulus', 'Uji (Ton)', 'Lulus (Ton)', 'Biaya', 'Status');  
			$data[2] = array('');
            $header[1] = array('');
			$header[2] = array('', '', '');
			$header[3] = array('', '', '');
			$header[4] = array('', '', '');
            $this->load->helper('csv');
			$q = $this->ModelPkl->getDataByJenis($jenis)->result(); 
            foreach ($q as $row) {     
                $data[++$i] = array($in,$row->noinduk,$row->nama,$row->alamat,$row->blok,
				$row->lokasi,$row->kelasbenih,$row->varietas,$row->tanggalsebar,$row->tanggaltanam,
				$row->luasasal,$row->tanggalpanen,$row->produksi,$row->luaslulus,$row->uji,$row->lulusuji,$row->biaya,$row->status);
				$in++;
            } 
			echo array_to_csv($header);                  
            echo array_to_csv($data,'PKL.csv');                  
            die();
    } 
	
	//=====================data data =========================================
	
	
	
	
	
	//========benih=======
	public function addDataBenih()
	{	
		$data['jenis'] = $this->input->post('jenis');
		$data['kode'] = $this->input->post('kode');
		$data['kelas'] = $this->input->post('kelas');
		$this->ModelPkl->addDataBenih($data);
		echo json_encode(array("status" => TRUE));
	}
	public function editDataBen($id){
        $t=$this->ModelPkl->getDataBenById($id);
        $row = $t->row();
		 echo json_encode($row);
        
    }
	public function updateBenih()
	{	
		$data['jenis'] = $this->input->post('jenisb');
		$id=$data['id'] = $this->input->post('idb');
		$data['kode'] = $this->input->post('kodeb');
		$data['kelas'] = $this->input->post('kelasb');
		 $da =  array( 'status' =>TRUE,
                        'id' =>$id,                        
        );
		$this->ModelPkl->updateBenih($data);
		echo json_encode($da);
	}
	public function getDataBenih()
	{	
		$j=$this->uri->segment('3');
		$query=$this->ModelPkl->getBenihByJenis($j);
		$data=array();
    	$no=0;
    	foreach ($query->result_array() as $dt) {
			
    		$no++;
    		array_push($data, array(
    			$no,
    			$dt['kode'],
    			$dt['kelas'],			
    			'<button class="btn btn-xs btn-success" onclick="editDataBen('.$dt['idKelasBenih'].')"><span class="glyphicon glyphicon-eye-open"></span></button>
				<a class="btn btn-xs btn-danger" href="#" onclick="hapusBenih('.$dt['idKelasBenih'].')"><span class="glyphicon glyphicon-trash"></span></a>
				',		
    		));
    	};
		$this->output->set_content_type('aplication/json')->set_output(json_encode(array('data'=>$data)));
	}
	
	public function deleteDatabenih($id)
	{		
		$this->ModelPkl->deleteDataBenih($id);
		echo json_encode(array("status" => TRUE));	
		
	}
	//========benih=======
	
	
	
	
	//=====================Varietas =========================================
	public function addVar()
	{	
		$data['jenis'] = $this->input->post('jenis');
		$data['kode'] = $this->input->post('kode');
		$data['kelas'] = $this->input->post('kelas');
		$data['pro'] = $this->input->post('pro');
		$data['panen'] = $this->input->post('panen');
		$this->ModelPkl->addVar($data);		
		echo json_encode(array("status" => TRUE));
	}
	public function editDataVar($id){
        $t=$this->ModelPkl->getDataVarById($id);
        $row = $t->row();
		 echo json_encode($row);
        
    }
	public function updateVarietas()
	{	
		$data['jenis'] = $this->input->post('jenisV');
		$id=$data['id'] = $this->input->post('idV');
		$data['kode'] = $this->input->post('kodeV');
		$data['pan'] = $this->input->post('pan');
		$data['prod'] = $this->input->post('prod');
		$data['varietas'] = $this->input->post('varietasV');
		 $da =  array( 'status' =>TRUE,
                        'id' =>$id,                        
        );		
		$this->ModelPkl->updateVarietas($data);
		echo json_encode($da);
	}
	public function getDataVar()
	{	
		$j=$this->uri->segment('3');
		$query=$this->ModelPkl->getVarietasByJenis($j);
		$data=array();
    	$no=0;
    	foreach ($query->result_array() as $dt) {
			
    		$no++;
			$u=base_url();
    		array_push($data, array(
    			$no,
    			$dt['kode'],
    			$dt['varietas'],			
				$dt['panen'],	
				$dt['produksi'],	
    			'<button class="btn btn-xs btn-success" href="" onclick="editDataVar('.$dt['idVarietas'].')"><span class="glyphicon glyphicon-eye-open"></span></button>
				<a class="btn btn-xs btn-danger" href="#" onclick="hapusVarietas('.$dt['idVarietas'].')"><span class="glyphicon glyphicon-trash"></span></a>
				',			
    				
    		));
    	};
		$this->output->set_content_type('aplication/json')->set_output(json_encode(array('data'=>$data)));
	}
	
	public function deleteDataVarietas($id)
	{		
		$this->ModelPkl->deleteDataVarietas($id);		
		echo json_encode(array("status" => TRUE));	
		
	}
	//=====================Varietas =========================================
	
	
	
	
	//=====================Penangkar =========================================
	public function Penangkar()
	{		
		$data['title']='Penangkar Home';
		$data['kab'] = $this->ModelAll->getKab()->result();
		$this->load->view('head',$data);
		$this->load->view('row');
		$this->load->view('penangkar',$data);
		
		
	}
	public function editDataPenangkar($id)
	{		
		 $t=$this->ModelPkl->getDataPenangkarById($id);
        $row = $t->row();
		 echo json_encode($row);
		
	}
	public function updatePenangkar()
	{	
		$data['nama'] = $this->input->post('nama');
		$id=$data['id'] = $this->input->post('id');
		$data['desa'] = $this->input->post('desa');
		$data['kec'] = $this->input->post('kec');
		$data['kab'] = $this->input->post('kab');
		$data['pen'] = $this->input->post('penilaian');
		$data['norek'] = $this->input->post('norek');
		 $da =  array( 'status' =>TRUE,
                        'id' =>$id,                        
        );
			
	$this->ModelPkl->updatePenangkar($data);
		echo json_encode($da);
	}
	public function tambahPenangkar()
	{	
		$data['nama'] = $this->input->post('namat');
		//$id=$data['id'] = $this->input->post('idt');
		$data['desa'] = $this->input->post('desat');
		$data['kec'] = $this->input->post('kect');
		$data['kab'] = $this->input->post('kabt');
		$data['pen'] = $this->input->post('penilaiant');
		$data['norek'] = $this->input->post('norekt');
	$this->ModelPkl->tambahPenangkar($data);
	echo json_encode(array("status" => TRUE));	
	}
	public function getForTablePenangkar()
	{	
		
		$query=$this->ModelPkl->getPenangkar();
		$data=array();
    	$no=0;
    	foreach ($query->result_array() as $dt) {
			
    		$no++;
			$u=base_url();
    		array_push($data, array(
    			$no,
    			$dt['nama'],
    			$dt['desa'],			
    			$dt['kecamatan'],			
    			$dt['ka'],			
    			$dt['norek'],			
    			$dt['penilaian'],			
    		
    						
    			'<button class="btn btn-xs btn-success" href="" onclick="editDataPenangkar('.$dt['idPenangkar'].')"><span class="glyphicon glyphicon-eye-open"></span></button>
				<a class="btn btn-xs btn-danger" href="#" onclick="hapusPenangkar('.$dt['idPenangkar'].')"><span class="glyphicon glyphicon-trash"></span></a>
				',			
    				
    		));
    	};
		$this->output->set_content_type('aplication/json')->set_output(json_encode(array('data'=>$data)));
	}
	public function hapusPenangkar($id)
	{		
		$this->ModelPkl->hapusPenangkar($id);
		echo json_encode(array("status" => TRUE));	
		
	}
	//===========================end penangkar=========================================
	//===========================mt =========================================
	public function getTableMt()
	{	
		
		$query=$this->ModelPkl->getMt();
		$data=array();
    	$no=0;
    	foreach ($query->result_array() as $dt) {
			if($dt['aktif']==1)
			{
				$s='aktif';
			}
			else{
				$s='tidak aktif';
			}
    		$no++;
			$u=base_url();
    		array_push($data, array(
    			$no,
    			$dt['mt'],
    			$s,					
    		
    						
    			'<button class="btn btn-xs btn-success" href="" onclick="editDataPenangkar('.$dt['iimt'].')"><span class="glyphicon glyphicon-eye-open"></span></button>
				<a class="btn btn-xs btn-danger" href="#" onclick="hapusVarietas('.$dt['mt'].')"><span class="glyphicon glyphicon-trash"></span></a>
				',			
    				
    		));
    	};
		$this->output->set_content_type('aplication/json')->set_output(json_encode(array('data'=>$data)));
	}
	public function editMt()
	{	
		$data['mt'] = $this->input->post('mt');
		//$id=$data['id'] = $this->input->post('idt');
		$data['status'] = $this->input->post('status');	
		$this->ModelPkl->editMt($data);
		$this->session->set_flashdata('editmt', '<div id="success-alert" class="alert alert-success alert-dismissable">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                 <center><h5>Data Musim Tanam Berhasil diperbaharui ! </h5></center>
	              </div>');
		redirect('pkl');
		//echo json_encode(array("status" => TRUE));	
	}
	public function insertMt()
	{	
		$this->session->set_flashdata('insertmt', '<div id="success-alert" class="alert alert-success alert-dismissable">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                 <center><h5>Data Musim Tanam Berhasil ditambah ! </h5></center>
	              </div>');
		$data['mt'] = $this->input->post('mt');
		//$id=$data['id'] = $this->input->post('idt');
		$data['status'] = $this->input->post('status');	
		$this->ModelPkl->insertMt($data);
		redirect('pkl');
		//echo json_encode(array("status" => TRUE));	
	}
	public function hapusMt()
	{	
		
		
		
		 $id = $this->uri->segment(3);
		 $id2 = $this->uri->segment(4);
		 $d = $this->ModelPkl->hapusMt($id,$id2);
	
		//redirect('pkl');
		//echo json_encode(array("status" => TRUE));	
	}
	
	
}