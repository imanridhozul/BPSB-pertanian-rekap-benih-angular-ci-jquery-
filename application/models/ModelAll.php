<?php 
    class ModelAll extends CI_model
	{
		function __construct()
		{
			parent::__construct();
		}
		//==============================laporan kolek all====================================
		function dataBerdasarkanKab($j,$mt,$kab){
			return $this->db->query("select data_kdl.idPenangkar as nama, 
			kelasbenih.kelas as kelasbenih, data_kdl.idData as id,noinduk,
			penangkar.nama as penangkar,alamat, blok,lokasi,tanggalsebar,tanggaltanam, 
			luasasal,tanggalpanen,data_kdl.produksi,luaslulus,uji,lulusuji,biaya, 
			status,data_kdl.tanaman,idMt 
			from data_kdl,penangkar,kelasbenih,varietas 
			where data_kdl.idPenangkar=penangkar.idPenangkar and data_kdl.idVarietas=varietas.idVarietas 
			and kelasbenih.idKelasBenih = data_kdl.idKelasBenih and
			data_kdl.tanaman='$j' and idMt='$mt' and  noinduk like '%$kab' group by data_kdl.idPenangkar")->result();
		}
		function dataBerdasarkanNamaPenangkar($nama,$j,$mt,$kab){
			return $this->db->query("SELECT kelasbenih.kelas as kelasbenih, data_kdl.idKelasBenih as kb, data_kdl.idData,noinduk,
			alamat, blok,lokasi
			luasasal,tanggalpanen,data_kdl.produksi,luaslulus,uji,lulusuji,biaya, 
			status,data_kdl.tanaman,idMt 
			FROM `data_kdl`,kelasbenih
			where kelasbenih.idKelasBenih = data_kdl.idKelasBenih and data_kdl.idPenangkar='$nama' and idMt='$mt' and data_kdl.tanaman='$j' group by data_kdl.idKelasBenih")->result();
		}
		function dataBerdasarkanKelas($kelas,$nama,$j,$mt,$kab){	
			return $this->db->query("SELECT idKelasBenih,varietas.varietas as varietas, data_kdl.idVarietas as v, data_kdl.idData,noinduk,
			alamat, blok,lokasi
			luasasal,tanggalpanen,data_kdl.produksi,luaslulus,uji,lulusuji,biaya, 
			status,data_kdl.tanaman,idMt 
			FROM `data_kdl`,varietas
			where varietas.idVarietas = data_kdl.idVarietas and idPenangkar='$nama' and idKelasBenih='$kelas' and idMt='$mt' and data_kdl.tanaman='$j' group by data_kdl.idVarietas 
			")->result();
		}	
		function dataBerdasarkanVar($kelas,$nama,$var,$j,$mt,$kab){
	
			return $this->db->query("SELECT * FROM `data_kdl` 
			where idPenangkar='$nama' and idKelasBenih='$kelas' and idVarietas='$var' and idMt='$mt' and tanaman='$j'")->result();
		}
		
		function getV($j){
	
			return $this->db->query("SELECT idVarietas,kode,varietas FROM `varietas` where tanaman='$j'")->result();
		}
		function getVarByKode($j,$kode){
	
			return $this->db->query("SELECT idVarietas,kode,varietas FROM `varietas` where tanaman='$j' and kode='$kode'")->row();
		}
		function getBByKode($j,$kode){
	
			return $this->db->query("SELECT idKelasBenih,kode FROM `kelasbenih` where kode='$kode'")->row();
		}
		function getKab(){
	
			return $this->db->query("SELECT * from kabupaten");
		}
		function getKabById($k){
	
			return $this->db->query("SELECT * from kabupaten where kode='$k'");
		}
		//=====================end ===================
		//==================== laporan kolek by varietas =================
		function dataBerdasarkanVarietas($j,$mt,$kab,$mt2){
			return $this->db->query("select nama,kelasbenih,id,	noinduk,idV, varietas,penangkar,alamat,blok,lokasi, 
			tanggalsebar,tanggaltanam,luasasal,tanggalpanen,	
			produksi,luaslulus,uji,	lulusuji,biaya,status ,tanaman,	idMt 
			from 
			(select data_kdl.idPenangkar as nama, 
			kelasbenih.kelas as kelasbenih, data_kdl.idData as id,noinduk, data_kdl.idVarietas as idV, varietas.varietas as varietas,
			penangkar.nama as penangkar,alamat, blok,lokasi,tanggalsebar,tanggaltanam, 
			luasasal,tanggalpanen,data_kdl.produksi,luaslulus,uji,lulusuji,biaya, 
			status,data_kdl.tanaman,idMt 
			from data_kdl,penangkar,kelasbenih,varietas 
			where data_kdl.idPenangkar=penangkar.idPenangkar and data_kdl.idVarietas=varietas.idVarietas
			and kelasbenih.idKelasBenih = data_kdl.idKelasBenih and
			data_kdl.tanaman='$j' and idMt='$mt' and  noinduk like '%$kab' group by data_kdl.idVarietas 
			union
			select data_kdl.idPenangkar as nama, 
			kelasbenih.kelas as kelasbenih, data_kdl.idData as id,noinduk, data_kdl.idVarietas as idV, varietas.varietas as varietas,
			penangkar.nama as penangkar,alamat, blok,lokasi,tanggalsebar,tanggaltanam, 
			luasasal,tanggalpanen,data_kdl.produksi,luaslulus,uji,lulusuji,biaya, 
			status,data_kdl.tanaman,idMt 
			from data_kdl,penangkar,kelasbenih,varietas 
			where data_kdl.idPenangkar=penangkar.idPenangkar and data_kdl.idVarietas=varietas.idVarietas
			and kelasbenih.idKelasBenih = data_kdl.idKelasBenih and
			data_kdl.tanaman='$j' and idMt='$mt2' and  noinduk like '%$kab' group by data_kdl.idVarietas) as x GROUP by varietas
			")->result();
		}	
		function dataBerdasarkanKls($j,$mt,$kab,$va,$mt2){
			return $this->db->query(" select *
			from 
			(select data_kdl.idPenangkar as nama, kelasbenih.kelas as kelasbenih, data_kdl.idKelasBenih as kb,
			data_kdl.idData as id,noinduk, data_kdl.idVarietas as idV, varietas.varietas as varietas, 
			penangkar.nama as penangkar,alamat, blok,lokasi,tanggalsebar,tanggaltanam, luasasal,
			tanggalpanen,data_kdl.produksi,luaslulus,uji,lulusuji,biaya, status,data_kdl.tanaman,idMt 
			from data_kdl,penangkar,kelasbenih,varietas 
			where data_kdl.idPenangkar=penangkar.idPenangkar and data_kdl.idVarietas=varietas.idVarietas and 
			kelasbenih.idKelasBenih = data_kdl.idKelasBenih and data_kdl.tanaman='$j' and idMt='$mt' 
			and noinduk like '%$kab' and data_kdl.idVarietas='$va' group by data_kdl.idKelasBenih 
			union
			select data_kdl.idPenangkar as nama, kelasbenih.kelas as kelasbenih, data_kdl.idKelasBenih as kb,
			data_kdl.idData as id,noinduk, data_kdl.idVarietas as idV, varietas.varietas as varietas, 
			penangkar.nama as penangkar,alamat, blok,lokasi,tanggalsebar,tanggaltanam, luasasal,
			tanggalpanen,data_kdl.produksi,luaslulus,uji,lulusuji,biaya, status,data_kdl.tanaman,idMt 
			from data_kdl,penangkar,kelasbenih,varietas 
			where data_kdl.idPenangkar=penangkar.idPenangkar and data_kdl.idVarietas=varietas.idVarietas and 
			kelasbenih.idKelasBenih = data_kdl.idKelasBenih and data_kdl.tanaman='$j' and idMt='$mt2' 
			and noinduk like '%$kab' and data_kdl.idVarietas='$va' group by data_kdl.idKelasBenih ) as x  GROUP BY kelasbenih
			
			
			")->result();
		}
		function dataKbV($j,$mt,$kab,$va,$kb){
			return $this->db->query("select data_kdl.idPenangkar as nama, kelasbenih.kelas as kelasbenih,
			data_kdl.idKelasBenih as kb, data_kdl.idData as id,noinduk, 
			data_kdl.idVarietas as idV, varietas.varietas as varietas, 
			penangkar.nama as penangkar,alamat, blok,lokasi,tanggalsebar,tanggaltanam, 
			luasasal,tanggalpanen,data_kdl.produksi as produksi,luaslulus,uji,lulusuji,biaya, status,data_kdl.tanaman,idMt 
			from data_kdl,penangkar,kelasbenih,varietas 
			where data_kdl.idPenangkar=penangkar.idPenangkar and data_kdl.idVarietas=varietas.idVarietas and 
			kelasbenih.idKelasBenih = data_kdl.idKelasBenih and data_kdl.tanaman='$j' and idMt='$mt' 
			and noinduk like '%$kab' and data_kdl.idVarietas='$va' and data_kdl.idKelasBenih='$kb'")->result();
		}
		function kesimpulan($j,$mt,$mt2,$kab){
			return $this->db->query("select * from 
			(select data_kdl.idKelasBenih as kb, kelasbenih.kelas as kelasbenih,idMt 
			from data_kdl,kelasbenih where kelasbenih.idKelasBenih = data_kdl.idKelasBenih and data_kdl.tanaman='$j' 
			and noinduk like '%$kab' and idMt='$mt' group by kelasbenih 
			union               
			 select data_kdl.idKelasBenih as kb, kelasbenih.kelas as kelasbenih,idMt
			 from data_kdl,kelasbenih where kelasbenih.idKelasBenih = data_kdl.idKelasBenih and data_kdl.tanaman='$j'
			 and noinduk like '%$kab' and idMt='$mt2' group by kelasbenih) 
			 as x group by x.kelasbenih")->result();
		}
		
		function kesimpulanKelas($j,$mt,$kab,$kb){
			return $this->db->query("select data_kdl.idPenangkar as nama, kelasbenih.kelas as kelasbenih,
			data_kdl.idKelasBenih as kb, data_kdl.idData as id,noinduk, 
			data_kdl.idVarietas as idV, varietas.varietas as varietas, 
			penangkar.nama as penangkar,alamat, blok,lokasi,tanggalsebar,tanggaltanam, 
			luasasal,tanggalpanen,data_kdl.produksi as produksi,luaslulus,uji,lulusuji,biaya, status,data_kdl.tanaman,idMt 
			from data_kdl,penangkar,kelasbenih,varietas 
			where data_kdl.idPenangkar=penangkar.idPenangkar and data_kdl.idVarietas=varietas.idVarietas and 
			kelasbenih.idKelasBenih = data_kdl.idKelasBenih and data_kdl.tanaman='$j' and idMt='$mt' 
			and noinduk like '%$kab' and data_kdl.idKelasBenih='$kb'")->result();
		}
		function kesimpulanAkhir($j,$mt,$mt2,$kab){
			return $this->db->query("select * from 
			(select data_kdl.idKelasBenih as kb, kelasbenih.kelas as kelasbenih,idMt
			from data_kdl,kelasbenih where kelasbenih.idKelasBenih = data_kdl.idKelasBenih and data_kdl.tanaman='$j' 
			and idMt='$mt' group by kelasbenih 
			union               
			 select data_kdl.idKelasBenih as kb, kelasbenih.kelas as kelasbenih,idMt 
			 from data_kdl,kelasbenih where kelasbenih.idKelasBenih = data_kdl.idKelasBenih and data_kdl.tanaman='$j' 
			 and idMt='$mt' group by kelasbenih) 
			 as x group by x.kelasbenih")->result();
		}
		//===================
		function dataBawahVar($j,$mt,$mt2){
			 return $this->db->query("select nama,kelasbenih,id,	noinduk,idV, varietas,penangkar,alamat,blok,lokasi, 
			tanggalsebar,tanggaltanam,luasasal,tanggalpanen,	
			produksi,luaslulus,uji,	lulusuji,biaya,status ,tanaman, idMt 
			from 
			(select data_kdl.idPenangkar as nama, 
			kelasbenih.kelas as kelasbenih, data_kdl.idData as id,noinduk, data_kdl.idVarietas as idV, varietas.varietas as varietas,
			penangkar.nama as penangkar,alamat, blok,lokasi,tanggalsebar,tanggaltanam, 
			luasasal,tanggalpanen,data_kdl.produksi,luaslulus,uji,lulusuji,biaya, 
			status,data_kdl.tanaman,idMt 
			from data_kdl,penangkar,kelasbenih,varietas 
			where data_kdl.idPenangkar=penangkar.idPenangkar and data_kdl.idVarietas=varietas.idVarietas 
			and kelasbenih.idKelasBenih = data_kdl.idKelasBenih and
			data_kdl.tanaman='$j' and idMt='$mt' group by data_kdl.idVarietas 
			union
			select data_kdl.idPenangkar as nama, 
			kelasbenih.kelas as kelasbenih, data_kdl.idData as id,noinduk, data_kdl.idVarietas as idV, varietas.varietas as varietas,
			penangkar.nama as penangkar,alamat, blok,lokasi,tanggalsebar,tanggaltanam, 
			luasasal,tanggalpanen,data_kdl.produksi,luaslulus,uji,lulusuji,biaya, 
			status,data_kdl.tanaman,idMt 
			from data_kdl,penangkar,kelasbenih,varietas 
			where data_kdl.idPenangkar=penangkar.idPenangkar and data_kdl.idVarietas=varietas.idVarietas 
			and kelasbenih.idKelasBenih = data_kdl.idKelasBenih and
			data_kdl.tanaman='$j' and idMt='$mt2' group by data_kdl.idVarietas) as x GROUP by varietas
			")->result();
		}
		function dataBawahKls($j,$mt,$mt2,$va){
			 return $this->db->query(" select *
			from 
			(select data_kdl.idPenangkar as nama, kelasbenih.kelas as kelasbenih, data_kdl.idKelasBenih as kb,
			data_kdl.idData as id,noinduk, data_kdl.idVarietas as idV, varietas.varietas as varietas, 
			penangkar.nama as penangkar,alamat, blok,lokasi,tanggalsebar,tanggaltanam, luasasal,
			tanggalpanen,data_kdl.produksi,luaslulus,uji,lulusuji,biaya, status,data_kdl.tanaman,idMt 
			from data_kdl,penangkar,kelasbenih,varietas 
			where data_kdl.idPenangkar=penangkar.idPenangkar and data_kdl.idVarietas=varietas.idVarietas and 
			kelasbenih.idKelasBenih = data_kdl.idKelasBenih and data_kdl.tanaman='$j' and idMt='$mt' 
			and data_kdl.idVarietas='$va' group by data_kdl.idKelasBenih 
			union
			select data_kdl.idPenangkar as nama, kelasbenih.kelas as kelasbenih, data_kdl.idKelasBenih as kb,
			data_kdl.idData as id,noinduk, data_kdl.idVarietas as idV, varietas.varietas as varietas, 
			penangkar.nama as penangkar,alamat, blok,lokasi,tanggalsebar,tanggaltanam, luasasal,
			tanggalpanen,data_kdl.produksi,luaslulus,uji,lulusuji,biaya, status,data_kdl.tanaman,idMt 
			from data_kdl,penangkar,kelasbenih,varietas 
			where data_kdl.idPenangkar=penangkar.idPenangkar and data_kdl.idVarietas=varietas.idVarietas and 
			kelasbenih.idKelasBenih = data_kdl.idKelasBenih and data_kdl.tanaman='$j' and idMt='$mt2' 
			and data_kdl.idVarietas='$va' group by data_kdl.idKelasBenih ) as x  GROUP BY kelasbenih		
			
			")->result();
		}
		function dataBawah($j,$mt,$va,$kb){
			return $this->db->query("select data_kdl.idPenangkar as nama, kelasbenih.kelas as kelasbenih,
			data_kdl.idKelasBenih as kb, data_kdl.idData as id,noinduk, 
			data_kdl.idVarietas as idV, varietas.varietas as varietas, 
			penangkar.nama as penangkar,alamat, blok,lokasi,tanggalsebar,tanggaltanam, 
			luasasal,tanggalpanen,data_kdl.produksi as produksi,luaslulus,uji,lulusuji,biaya, status,data_kdl.tanaman,idMt 
			from data_kdl,penangkar,kelasbenih,varietas 
			where data_kdl.idPenangkar=penangkar.idPenangkar and data_kdl.idVarietas=varietas.idVarietas and 
			kelasbenih.idKelasBenih = data_kdl.idKelasBenih and data_kdl.tanaman='$j' and idMt='$mt' 
			and data_kdl.idVarietas='$va' and data_kdl.idKelasBenih='$kb'")->result();
		}
		//==================
		function insert($data){
			 $this->db->insert('varietas', $data);
		}
		function insertD($data){
			 $this->db->insert('data_kdl', $data);
		}
		function getPenangkar($nama){

			return $this->db->query("SELECT * FROM penangkar where nama='$nama'")->row();
		}
		function insertPenangkar($nama,$kab){

			return $this->db->query("insert into penangkar values('','$nama','','','$kab','','')");
		}
		function dataLaporan($d){
			$mt=$d['mt'];
			$j=$d['jenis'];
			$daerah=$d['kab'];
			//echo $mt."/".$j."/".$daerah;
			return $this->db->query("select varietas.varietas as varietas, kelasbenih.kelas as kelasbenih, data_kdl.idData,noinduk,
			penangkar.nama,alamat, blok,lokasi,tanggalsebar,tanggaltanam, 
			luasasal,tanggalpanen,data_kdl.produksi,luaslulus,uji,lulusuji,biaya, 
			status,data_kdl.tanaman,idMt 
			from data_kdl,penangkar,kelasbenih,varietas 
			where data_kdl.idPenangkar=penangkar.idPenangkar and data_kdl.idVarietas=varietas.idVarietas
			and kelasbenih.idKelasBenih = data_kdl.idKelasBenih and
			data_kdl.tanaman='$j' and idMt='$mt' and  noinduk like '%$daerah'
			
			")->result();
		}
	}	
?>