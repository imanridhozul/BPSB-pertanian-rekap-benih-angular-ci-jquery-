<?php     
    class ModelPkl extends CI_model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		function dataHome(){
			return $this->db->query("select tanaman from varietas group by tanaman")->result();
		}		
		
		//==================data==================
		function getDataByJenis($jenis){//retrieve all data
			$ss=$this->db->query("select * from mt where aktif=1")->row();		
			$r=$ss->idMt;
			return $this->db->query("select varietas.varietas as varietas, kelasbenih.kelas as kelasbenih, data_kdl.idData,noinduk,
			penangkar.nama,alamat, blok,lokasi,tanggalsebar,tanggaltanam, 
			luasasal,tanggalpanen,data_kdl.produksi,luaslulus,uji,lulusuji,biaya, 
			status,data_kdl.tanaman,idMt 
			from data_kdl,penangkar,kelasbenih,varietas 
			where data_kdl.idPenangkar=penangkar.idPenangkar and data_kdl.idVarietas=varietas.idVarietas 
			and kelasbenih.idKelasBenih = data_kdl.idKelasBenih and
			data_kdl.tanaman='$jenis'and idMt='$r'");
		}
		function getDataById($id){//retrieve by id	
			return $this->db->query("select * from data_kdl where idData='$id'");
		
		}
		function getDataByJenisKab($jenis,$kab){//retrieve by kab
			$ss=$this->db->query("select * from mt where aktif='1'")->row();	
		$r=$ss->idMt;	
			return $this->db->query("select varietas.varietas as varietas, kelasbenih.kelas as kelasbenih, data_kdl.idData,noinduk,
			penangkar.nama,alamat, blok,lokasi,tanggalsebar,tanggaltanam, 
			luasasal,tanggalpanen,data_kdl.produksi,luaslulus,uji,lulusuji,biaya, 
			status,data_kdl.tanaman,idMt 
			from data_kdl,penangkar,kelasbenih,varietas 
			where data_kdl.idpenangkar=penangkar.idPenangkar and data_kdl.idVarietas=varietas.idVarietas
			and kelasbenih.idKelasBenih = data_kdl.idKelasBenih and
			data_kdl.tanaman='$jenis' and idMt='$r' and  noinduk like '%$kab'");
		}		
		function deleteData($id){
			return $this->db->query("delete from data_kdl where idData='$id'");
		}
		 function updateData($data){
		    $n1=$data['noinduk'];
		    $n12=$data['nama'];
		    $n2=$data['alamat'];
		    $n3=$data['blok'];
		    $n4=$data['lokasi'];
		    $n5=$data['benih'];
		    $n6=$data['var'];
		    $n7=$data['sebar'];
		    $n8=$data['tanam'];
		    $n9=$data['luasasal'];
		    $n11=$data['panen'];
		    $n22=$data['produksi'];
		    $n33=$data['luaslulus'];
		    $n44=$data['uji'];
		    $n55=$data['lulusuji'];
		    $n66=$data['status'];
		    $n77=$data['biaya'];
		    $n88=$data['id'];
			//echo $n12;
			return $this->db->query("update data_kdl set noinduk='$n1', idPenangkar='$n12',alamat='$n2',blok='$n3',lokasi='$n4',idKelasBenih='$n5',
				idVarietas='$n6',tanggalsebar='$n7',tanggaltanam='$n8',luasasal='$n9',tanggalpanen='$n11',
				produksi='$n22',luaslulus='$n33',uji='$n44',lulusuji='$n55',biaya='$n77',status='$n66' where idData='$n88'");
			
		}
		function addData($data){
		    $n0=$data['noinduk0'];$n01=$data['noinduk1'];$n02=$data['noinduk2'];$n03=$data['noinduk3'];$n04=$data['noinduk4'];
			$n05=$data['noinduk5'];			
		    $n12=$data['nama'];
		    $n2=$data['alamat'];
		    $n3=$data['blok'];
		   $n4=$data['lokasi'];
		   // $n5=$data['benih'];
		    //$n6=$data['var'];
		    $n7=$data['sebar'];
		    $n8=$data['tanam'];
		    $n9=$data['luasasal'];
		    $n11=$data['panen'];
		    $n22=$data['produksi'];
		    $n33=$data['luaslulus'];
		    $n44=$data['uji'];
		    $n55=$data['lulusuji'];
		    $n66=$data['status'];
		    $n77=$data['biaya'];
		    $n88=$data['tanaman'];
			$s = $this->db->query("select * from kelasbenih where idKelasBenih='$n02'")->row();$s5= $s->kode;
			$penangkar = $this->db->query("select * from penangkar where idPenangkar='$n12'")->row();$idpenangkar=$penangkar->idPenangkar;$n12=$penangkar->nama;
			$s1 = $this->db->query("select * from varietas where idVarietas='$n01' and tanaman='$n0'")->row();$s6= $s1->kode;
			$nLengkap=$n0.$s6.$s5.$n03.$n04.$n05;
			if($n11=='')
			{
				$aa=$s1->panen;
				$date = new DateTime("$n8");
				$date->modify("+$aa day");			
				$e = $date->format("Y-m-d");
			}
			else{
				$e='2020-01-01';
			}
			if($n22!='')
			{
				$n22='100';
			}
			else
			{
				$n22=$s1->produksi*$n9;
			}
			$ss=$this->db->query("select * from mt where aktif=1")->row();
			return $this->db->query("insert into data_kdl values ('',
				'$nLengkap','$idpenangkar','$n2','$n3','$n4','$n02','$n01','$n7','$n8','$n9',
				'$e','$n22','$n33','$n44','$n55','$n77','$n66','$n88','$ss->idMt'
			)");
			
		}
		//=======================data ====================
		
		
		
		
		//=======================Benih ====================
		function getDataBenById($id)
		{//retrieve by id		
			return $this->db->query("select * from kelasbenih where idKelasBenih='$id'");			
		}		
		function getBenihByJenis($jenis){ //get benih by kode tanaman ex : kdl
			return $this->db->query("select * from kelasbenih");
		}	
		function addDataBenih($data){
		    $n1=$data['kode'];
		    $n12=$data['kelas'];
		    $n2=$data['jenis'];
		    return $this->db->query("insert into kelasbenih values ('',
				'$n1','$n12','$n2'
			)");
		}
		function updateBenih($data){
		    $id=$data['id'];
		    $n1=$data['kode'];
		    $n12=$data['kelas'];
		    $n2=$data['jenis'];		 
		    return $this->db->query("update kelasbenih set kode='$n1', kelas='$n12' where idKelasBenih='$id'");
		}
		function deleteDataBenih($id){
			return $this->db->query("delete from kelasbenih where idKelasBenih='$id'");
		}
		//=======================benih ====================
		
		
		
		
		
		
		//=======================varietas ====================
		/*function getVar($kode){ 
			return $this->db->query("select * from varietas where tanaman='$kode'")->result();
		}*/	
		function getDataVarById($id)
		{//retrieve by id		
			return $this->db->query("select * from varietas where idVarietas='$id'");			
		}
		function getVarietasByJenis($jenis){ //get varietas by kode tanaman ex : kdl
			return $this->db->query("select * from varietas where tanaman='$jenis'");
		}	
		function addVar($data){
		    $n1=$data['kode'];
		    $n12=$data['kelas'];
		    $n2=$data['jenis'];
			$p=$data['pro'];
		    $panen=$data['panen'];
		    return $this->db->query("insert into varietas values ('',
				'$n1','$n12','$n2','$panen','$p'
			)");
		}
		function updateVarietas($data){
		    $id=$data['id'];
		    $n1=$data['kode'];
		    $n12=$data['varietas'];
		    $n2=$data['jenis'];
		    $n3=$data['pan'];
		    $n4=$data['prod'];
		    return $this->db->query("update varietas set kode='$n1', varietas='$n12' , panen='$n3', produksi='$n4' where idVarietas='$id'");
		}
		function deleteDataVarietas($id){
			return $this->db->query("delete from varietas where idVarietas='$id'");
		}
		
		
		
		//=========penangkar===========
		function getPenangkar(){
			return $this->db->query("select idPenangkar,penangkar.nama as nama, kabupaten.nama as ka, norek,penilaian,kecamatan, desa from penangkar,kabupaten where kabupaten.kode = penangkar.kabupaten order by nama asc");
		}
		function getDataPenangkarById($id){
			return $this->db->query("select * from penangkar where idPenangkar=$id");
		}
		function updatePenangkar($data){
		    $id=$data['id'];
		    $n1=$data['nama'];
		    $n2=$data['desa'];
		    $n3=$data['kec'];
		    $n4=$data['kab'];
		    $n5=$data['pen'];
		    $n6=$data['norek'];		  
		    return $this->db->query("update penangkar set nama='$n1', desa='$n2', kecamatan='$n3',kabupaten='$n4', penilaian='$n5',norek='$n6' where idPenangkar='$id'");
		}
		function hapusPenangkar($id){
			$this->db->query("delete from data_kdl where idPenangkar='$id'");
			return $this->db->query("delete from penangkar where idPenangkar='$id'");
		}
		function tambahPenangkar($data){		
		    $n1=$data['nama'];
		    $n2=$data['desa'];
		    $n3=$data['kec'];
		    $n4=$data['kab'];
		    $n5=$data['pen'];
		    $n6=$data['norek'];
		  
		    return $this->db->query("insert into penangkar values ('','$n1','$n2','$n3','$n4','$n6','$n5')");
		}
		function getDaerah(){
			return $this->db->query("select * from kabupaten")->result();
		}	
		
		//=========end penangkar===========
		
		function getMt(){
			return $this->db->query("select * from mt");
		}
		function getMtById($id){
			return $this->db->query("select * from mt where idMt='$id'")->result();
		}	
		function hapusMt($id,$id2){
			$baru="";
			if($id2=="")
			{
			
				$baru=$id;
				echo $baru;
			}
			else{
				
				$baru=$id."/".$id2;echo $baru;
			}
			
		$query=$this->db->query("select * from data_kdl where idMt='$baru'");
		if ($query->num_rows() > 0)
		{
			
						$this->session->set_flashdata('hpsmt', '<div id="success-alert" class="alert alert-success alert-dismissable">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                 <center><h5>Tidak Bisa Dihapus Karena terdapat data  </h5></center>
	              </div>');
		}
		else{
			//echo "tidak ada";
			$d=$this->db->query("delete from mt where idMt='$baru'");
			$this->session->set_flashdata('hpsmt', '<div id="success-alert" class="alert alert-success alert-dismissable">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                 <center><h5>Data Musim Tanam Berhasil dihapus ! </h5></center>
	              </div>');
		}
		redirect('pkl');
			
			//$d=$this->db->query("delete from mt where mt='$id'");
			
			
		}	
		function editMt($data){		
		    $n1=$data['mt'];
		    $n2=$data['status'];		 
		    return $this->db->query("update mt set aktif='$n2' where idMt='$n1'");
		}
		function insertMt($data){		
		    $n1=$data['mt'];
		    $n2=$data['status'];		 
		    return $this->db->query("insert into mt values('$n1','$n2')");
		}
		
		
		
      
		
}

?>