<!DOCTYPE html>  
<html>

<body ng-app="myApp" ng-controller="lahan">
	<!--  <body> -->
	<div class="gray-bg">
		<div ng-show='benih' class="row">
			<div class="col-sm-2">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>Tambah Benih</h5>
						<div class="ibox-tools">
							<a class="collapse-link">
								<i class="fa fa-chevron-up"></i>
							</a>                           
							<a class="close-link">
								<i class="fa fa-times"></i>
							</a>
						</div>
					</div>
					<div class="ibox-content">
						<form role='form' id="form_kelas">														
							<div class='form-group'>  
								<label for='name'>Kode (no induk)</label>											
								<input type='text' name='kode' class='form-control'>
								<input type='hidden' name='jenis' value='<?php echo"$jn"; ?>'>
							</div>  
							<div class='form-group'>    
								<label for='name'>Kelas Benihnya</label>															
								<input type='text' name='kelas' class='form-control'>
							</div>  														
						</form>
						<button type='button' class='btn btn-default' ng-click='clBenih()'>Close</button>
						<button type="submit" class="btn btn-danger" onclick='addKelas()'>Submit</button>	
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>Daftar Kelas Benih</h5>
						<div class="ibox-tools">
							<a class="collapse-link">
								<i class="fa fa-chevron-up"></i>
							</a>                           
							<a class="close-link">
								<i class="fa fa-times"></i>
							</a>
						</div>
					</div>
					<div class="ibox-content">
						<div class="table-responsive">
							<table class="table table-striped table-bordered ben1" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>No</th>
										<th>kode</th>
										<th>kelas</th>
										<th>Action</th>
										<?php
										$u=base_url();
										
										?>
										
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>			
			<div class="col-sm-2">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>Tambah Varietas</h5>
						<div class="ibox-tools">
							<a class="collapse-link">
								<i class="fa fa-chevron-up"></i>
							</a>                           
							<a class="close-link">
								<i class="fa fa-times"></i>
							</a>
						</div>
					</div>
					<div class="ibox-content">
						
						<form role='form' id="form_varietas">														
							<div class='form-group'>  
								<label for='name'>Kode (no induk)</label>											
								<input type='text' name='kode' class='form-control'>
								<input type='hidden' name='jenis' value='<?php echo"$jn"; ?>'>
							</div>  
							<div class='form-group'>    
								<label for='name'>Varietas</label>															
								<input type='text' name='kelas' class='form-control'>
							</div> 
							<div class='form-group'>    
								<label for='name'>Panen</label>															
								<input type='text' name='panen' class='form-control'>
							</div> 	
							<div class='form-group'>    
								<label for='name'>Produksi/Ha</label>															
								<input type='text' name='pro' class='form-control'>
							</div> 															
						</form>
						<button type='button' class='btn btn-default' ng-click='clBenih()'>Close</button>
						<button type="submit" class="btn btn-danger" onclick='addVar()'>Submit</button>	
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>Daftar Varietas </h5>
						<div class="ibox-tools">
							<a class="collapse-link">
								<i class="fa fa-chevron-up"></i>
							</a>                           
							<a class="close-link">
								<i class="fa fa-times"></i>
							</a>
						</div>
					</div>
					<div class="ibox-content">
						<div class="table-responsive">
							<table class="table table-bordered table-striped var">
								<thead>
									<tr>
										<th>no</th>
										<th>Kode</th>
										<th>varietas</th>
										<th>Panen</th>
										<th>Produksi</th>
										<th>Action</th>										
									</tr>
								</thead>
								<tbody>									
								</tbody>								
							</table>
						</div>
					</div>
				</div>
			</div>			
		</div> <!--row-->
		<div ng-show='formtt' class="row">
			<div class="col-sm-6">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>Tambah Data</h5>
						<div class="ibox-tools">
							<a class="collapse-link">
								<i class="fa fa-chevron-up"></i>
							</a>                         
							<a class="close-link">
								<i class="fa fa-times"></i>
							</a>
						</div>
					</div>
					<div class="ibox-content">
						<form role='form' id="form_daftar">
							<div class='form-group'> 
								<label for='name'>Noinduk</label>	<br>										
								<input style='width:10%;'type='text' name='noinduk0' value='<?php echo"$jn"; ?>'>/
								<select name='noinduk1' ng-model='varit'>
									<option value=''>Kd Var</option>
									<?php foreach($var as $ps)
									{
										echo"<option value='$ps->idVarietas'>$ps->kode</option>";
									}													
									?>
								</select>/
								<select name='noinduk2' ng-model='kb'>
									<option value=''>Kd Benih</option>
									<?php $u=base_url();
									foreach($ben as $ps)
									{
										echo"<option value='$ps->idKelasBenih'>$ps->kode</option>";
										
									}?>	
								</select>/	
								<input style='width:14%;'type='text' name='noinduk3'>/
								<input style='width:14%;'type='text' name='noinduk4'>/								
								<select name='noinduk5'>
									<option value='xx'>Kab</option>								
									<?php 
										foreach($kab as $ps)
										{
											echo"<option value='$ps->kode'>$ps->nama</option>";
											
										}	
									?>
								</select>
								
								
							</div>
							
							<div class='form-group'>  
								<label for='name'>Nama Penangkar</label>
								<select name='nama' class='form-control' ng-model='kab'>
									<option value=''>Nama Penangkar</option>
									<?php foreach($penangkar as $ps)
									{
										echo"<option value='$ps->idPenangkar'>$ps->nama</option>";
									}													
									?>
								</select>		
							</div>  
							<div class='form-group'>    
								<label for='name'>Alamat</label>															
								<input type='text' name='alamat' class='form-control'>
							</div>  
							<div class='form-group'> 
								<label for='name'>Blok</label>															
								<input type='text' name='blok' class='form-control'>
							</div>  
							<div class='form-group'> 
								<label for='name'>Lokasi</label>															
								<input type='text' name='lokasi' class='form-control' >
							</div>  
							<div class='form-group'>   
								<label for='name'>Kelas Benih</label>
								<input type='text' name='benih' class='form-control' value='{{kb}}' disabled>
							</div>  
							
						</div>
					</div>
				</div>	
				<div class="col-sm-3">
					<div class="ibox float-e-margins">
						<div class="ibox-title">
							<h5>...</h5>
							<div class="ibox-tools">
								<a class="collapse-link">
									<i class="fa fa-chevron-up"></i>
								</a>                           
								<a class="close-link">
									<i class="fa fa-times"></i>
								</a>
							</div>
						</div>
						<div class="ibox-content">
							
							<div class='form-group'>   
								<label for='name'>Varietas</label>
								<input type='text' name='var' class='form-control' value='{{varit}}' disabled>
							</div> 
							<div class='form-group'>   
								<label for='name'>Tanggal sebar</label>															
								<input type='text'  placeholder="yyyy-mm-dd" name='sebar' class='form-control' id='name'>
							</div>  
							<div class='form-group'>
								<label for='name'>Tanggal Tanam</label>															
								<input placeholder="yyyy-mm-dd" type='text' name='tanam' class='form-control'>
							</div>  
							<div class='form-group'>  
								<label for='name'>Luas Asal</label>	
								<input type='text' name='luasasal' class='form-control'>
							</div>  
							<div class='form-group'>    
								<label for='name'>Tanggal Panen</label>	
								<input type='text'  placeholder="yyyy-mm-dd" name='panen' class='form-control'>
							</div>  
							<div class='form-group'>
								<label for='name'>Produksi</label>	
								<input type='text' name='produksi' class='form-control'>
							</div>  
							
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="ibox float-e-margins">
						<div class="ibox-title">
							<h5>...</h5>
							<div class="ibox-tools">
								<a class="collapse-link">
									<i class="fa fa-chevron-up"></i>
								</a>                            
								<a class="close-link">
									<i class="fa fa-times"></i>
								</a>
							</div>
						</div>
						<div class="ibox-content">
							<div class='form-group'>  
								<label for='name'>Luas Lulus</label>	
								<input type='text' name='luaslulus' class='form-control'>
							</div>  
							<div class='form-group'>
								<label for='name'>Uji</label>	
								<input type='text' name='uji' class='form-control'>
							</div>  
							<div class='form-group'>   
								<label for='name'>Lulus Uji <?php echo"$jn"; ?></label>	
								<input type='text' name='lulusuji' class='form-control'>
							</div>  
							<div class='form-group'>  
								<label for='name'>Biaya</label>	
								<input type='text' name='biaya' class='form-control'>
							</div>  
							<div class='form-group'>  
								<label for='name'>Status </label>	
								<select name='status' class='form-control'>
									<option value=''>Pilih</option>
									<option value='1'>Sudah</option>
									<option value='0'>Belum</option>																
									
								</select>
								<!--<input type='text' name='status' class='form-control' id='name'>																-->
								<input type='hidden' name='tanaman' class='form-control' id='tanaman' value='<?php echo"$jn"; ?>'>																
							</div> 
							<button type='button' class='btn btn-default' ng-click='cl()'>Close</button>
							<button type="submit" class="btn btn-danger" onclick='p()'>Submit</button>
							<button type="reset" class="btn btn-danger" onclick='p()'>Reset</button>
						</form>	
					</div>
				</div>
			</div>
		</div>
		<div class="row">			
			<div class="col-sm-12">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>Data-Data </h5>
						<div class="ibox-tools">
							<a class="collapse-link">
								<i class="fa fa-chevron-up"></i>
							</a>
							<a class="close-link">
								<i class="fa fa-times"></i>
							</a>
						</div>
					</div>
					<div class="ibox-content">
						<button class='btn btn-xs btn-primary' ng-click='tampil()'>Tambah data</button>
						<button class='btn btn-xs btn-primary' ng-click='tampilBenih()'>Tambah Benih</button>					
						<select name='kab' id='kab' onchange='changeData()'>
							<option value='xx'>Pilih</option>
							<option value=''>Semua Data</option>
							<?php 
							foreach($kab as $ps)
							{
								echo"<option value='$ps->kode'>$ps->nama</option>";
								
							}		
							
							?>
						</select>
						<a href='<?php echo base_url(); ?>pkl/getFile/<?php echo $jn; ?>' class='btn btn-xs btn-success'>Export</a>
						<div class="table-responsive">
							<table class="table table-bordered table-striped dt1">
								<thead>
									<tr>
										<th>no</th>
										<th>action</th>
										<th>No Induk</th>
										<th>Nama Penangkar</th>
										<th>Alamat</th>
										<th>Blok</th>
										<th>Lokasi Area</th>
										<th>Kelas Benih</th>
										<th>Varietas</th>
										<th>Tanggal Sebar</th>
										<th>Tanggal Tanam</th>
										<th>Luas Asal</th>
										<th>Tanggal Panen</th>
										<th>Produksi</th>
										<th>Luas Lulus</th>
										<th>Uji</th>
										<th>Lulus Uji</th>
										<th>Biaya</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									
									<?php 
									$this->load->view('modal');
									$this->load->view('property/modalVar');
									$this->load->view('property/modalBenih');
									
									?>
									
								</table>
							</div>

						</div>
					</div>
				</div>	
			</div>
		</div>
	</body>
	<!-- Data Tables -->
	<script src="<?php echo base_url(); ?>asset/js/plugins/dataTables/jquery.dataTables.js"></script>
	<script src="<?php echo base_url(); ?>asset/js/plugins/dataTables/dataTables.bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>asset/js/plugins/dataTables/dataTables.responsive.js"></script>
	<script src="<?php echo base_url(); ?>asset/js/angular.min.js"></script> <!-- angular -->
	<script type="text/javascript">
	$(function() {
		$('#example1').dataTable();
	});
	
	function editData(id){
            // $('#moda_edit').modal('show');
            save_method = 'update';      
            $.ajax({
            	url : "<?php echo site_url('Pkl/editData')?>/" + id,
            	type: "GET",
            	dataType: "JSON",
            	success: function(data)
            	{  
            		$('[name="noinduk"]').val(data.noinduk); 
            		$('[name="nama"]').val(data.nama);
            		$('[name="alamat"]').val(data.alamat);
            		$('[name="blok"]').val(data.blok);
            		$('[name="lokasi"]').val(data.lokasi); 
            		$('[name="var"]').val(data.varietas);
            		$('[name="benih"]').val(data.kelasbenih);
            		$('[name="sebar"]').val(data.tanggalsebar);
            		$('[name="tanam"]').val(data.tanggaltanam);
            		$('[name="luasasal"]').val(data.luasasal);
            		$('[name="panen"]').val(data.tanggalpanen);
            		$('[name="produksi"]').val(data.produksi);
            		$('[name="luaslulus"]').val(data.luaslulus);
            		$('[name="uji"]').val(data.uji);
            		$('[name="lulusuji"]').val(data.lulusuji);
            		$('[name="biaya"]').val(data.biaya);
            		$('[name="status"]').val(data.status);
            		$('[name="id"]').val(data.idData);
            		
            		
                    $('#myData').modal('show'); // show bootstrap modal when complete loaded

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                	alert('Error get data from ajax');
                }
            });  
}

	function editDataVar(id){
            // $('#moda_edit').modal('show');
            save_method = 'update';      
            $.ajax({
            	url : "<?php echo site_url('Pkl/editDataVar')?>/" + id,
            	type: "GET",
            	dataType: "JSON",
            	success: function(data)
            	{  
            		$('[name="kodeV"]').val(data.kode); 
            		$('[name="varietasV"]').val(data.varietas);
            		$('[name="idV"]').val(data.idVarietas);
            		$('[name="pan"]').val(data.panen);
            		$('[name="prod"]').val(data.produksi);
            		//$('[name="jenis"]').val(data.alamat);            	
            		
            		
                    $('#myVarietas').modal('show'); // show bootstrap modal when complete loaded
                   // $('.modal-title').text('Edit Data Instansi'); // Set title to Bootstrap modal title
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                	alert('Error get data from ajax');
                }
            });
}
	function editDataBen(id){
            // $('#moda_edit').modal('show');
            save_method = 'update';      
            $.ajax({
            	url : "<?php echo site_url('Pkl/editDataBen')?>/" + id,
            	type: "GET",
            	dataType: "JSON",
            	success: function(data)
            	{  
            		$('[name="kodeb"]').val(data.kode); 
            		$('[name="kelasb"]').val(data.kelas);
            		$('[name="idb"]').val(data.idKelasBenih);
            		//$('[name="jenis"]').val(data.alamat);            	
            		
            		
                    $('#myBenih').modal('show'); // show bootstrap modal when complete loaded
                   // $('.modal-title').text('Edit Data Instansi'); // Set title to Bootstrap modal title
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                	alert('Error get data from ajax');
                }
            });
}


</script> 
<script type="text/javascript">
var x='';
$(".dt1").dataTable({
	"ajax":{
		"url":"<?php echo $u."pkl/getDeskripsi/$jn/";?>"+x,
		"type":"POST"
	}
});
$(".ben1").dataTable({
	"ajax":{
		"url":"<?php echo $u."pkl/getDataBenih/$jn";?>",
		"type":"POST"
	}
});

$(".var").dataTable({
	"ajax":{
		"url":"<?php echo $u."pkl/getDataVar/$jn";?>",
		"type":"POST"
	}
});

function changeData() {
	$('.dt1').dataTable().fnDestroy();
	x = document.getElementById("kab").value;
	$(".dt1").dataTable({
		"ajax":{
			"url":"<?php echo $u."pkl/getDeskripsi/$jn/";?>"+x,
			"type":"POST"
		}
	});
}
</script>   


<script>
var app = angular.module('myApp', []);
app.controller('lahan', function($scope,$http) {
	$scope.tes = 'hai';
	//	$scope.x = document.getElementById("kab").value;
	
	//mnghilangkan data mahasiswa
	$scope.tampil = function(){
		$scope.formtt = true;	
		
	};
	$scope.tampilBenih = function(){
		$scope.benih = true;	
		
	};
	$scope.cl = function(){
		$scope.formtt = false;	
		
	};
	$scope.clBenih = function(){
		$scope.benih = false;	
		
	};
	
	
 });//ttp controller

</script>
<script>
//utk data
function hapus(id){
		swal({
			title: 'Konfirmasi?',
			text: "Apakah anda yakin ingin menghapus data ini!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya',
			closeOnConfirm: true
		},
		function(isConfirm) {
			if (isConfirm) {
				$.ajax({
					url : "<?php echo site_url('Pkl/deleteData')?>/" + id,
					type: "POST",
					dataType: "JSON",
					success: function(data){ 
                if(data.status) //if success close modal and reload ajax table
                {                    
                	
                	$(".dt1").DataTable().ajax.reload(null, false);
                    /*swal({
                            title: "Data Berhasil dihapus",
                            type: "",
							closeOnConfirm: true
							
						});*/
				
			}

		},
		error: function (jqXHR, textStatus, errorThrown)
		{
			alert('Error adding / update data');
		}       
	});
			}
		});
	}
function p(){
	$.ajax({
		url : "<?php echo site_url('Pkl/addData')?>",
		type: "POST",
		data: $('#form_daftar').serialize(),
		dataType: "JSON",
		success: function(data){ 
            if(data.status) //if success close modal and reload ajax table
            {
            	
            	$(".dt1").DataTable().ajax.reload(null, false);
            	swal('Success', 'Data ditambahkan', 'success');
            	
            }
            else
            {
            	alert('error adding data');
            }
        },
        
    });
}
function updatesData(){
	$.ajax({
		url : "<?php echo site_url('Pkl/update')?>",
		type: "POST",
		data: $('#updatesData').serialize(),
		dataType: "JSON",
		success: function(data){ 
            if(data.status) //if success close modal and reload ajax table
            {
				 //$('#myData'+data.id).modal('hide');
				 $(".dt1").DataTable().ajax.reload(null, false);
				 swal('Success', 'Data diubah', 'success');
				 
				}
				else
				{
					alert('error adding data');
				}
			},
			
		});
}




	//===========benih
	function addKelas(){
		$.ajax({
			url : "<?php echo site_url('Pkl/addDataBenih')?>",
			type: "POST",
			data: $('#form_kelas').serialize(),
			dataType: "JSON",
			success: function(data){ 
            if(data.status) //if success close modal and reload ajax table
            {
            	$(".ben1").DataTable().ajax.reload(null, false);
            	swal('Success', 'Data ditambahkan', 'success');
            	
            }
            else
            {
            	alert('error adding data');
            }
        },
        
    });
	}
	function updateBenih(){
		$.ajax({
			url : "<?php echo site_url('Pkl/updateBenih')?>",
			type: "POST",
			data: $('#updateBenih').serialize(),
			dataType: "JSON",
			success: function(data){ 
            if(data.status) //if success close modal and reload ajax table
            {
            	//$('#myBenih'+data.id).modal('hide');
            	$(".ben1").DataTable().ajax.reload(null, false);
            	swal('Success', 'Data diubah', 'success');
            	
            }
            else
            {
            	alert('error adding data');
            }
        },
        
    });
	}
	
	function hapusBenih(id){
		swal({
			title: 'Konfirmasi?',
			text: "Apakah anda yakin ingin menghapus data ini!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya',
			closeOnConfirm: true
		},
		function(isConfirm) {
			if (isConfirm) {
				$.ajax({
					url : "<?php echo site_url('Pkl/deleteDataBenih')?>/" + id,
					type: "POST",
					dataType: "JSON",
					success: function(data){ 
                if(data.status) //if success close modal and reload ajax table
                {                    
                	
                	$(".ben1").DataTable().ajax.reload(null, false);
                    /*swal({
                            title: "Data Berhasil dihapus",
                            type: "",
							closeOnConfirm: true
							
						});*/
				
			}

		},
		error: function (jqXHR, textStatus, errorThrown)
		{
			alert('Data tidak dapat dihapus!');
		}       
	});
			}
		});
	}
	
	
	
	
	
	///=============varietas
	function addVar(){
		$.ajax({
			url : "<?php echo site_url('Pkl/addVar')?>",
			type: "POST",
			data: $('#form_varietas').serialize(),
			dataType: "JSON",
			success: function(data){ 
            if(data.status) //if success close modal and reload ajax table
            {
            	$(".var").DataTable().ajax.reload(null, false);
            	swal('Success', 'Data ditambahkan', 'success');
            	
            }
            else
            {
            	alert('error adding data');
            }
        },
        
    });
	}
	function updateVarietas(){
		$.ajax({
			url : "<?php echo site_url('Pkl/updateVarietas')?>",
			type: "POST",
			data: $('#updateVarietas').serialize(),
			dataType: "JSON",
			success: function(data){ 
            if(data.status) //if success close modal and reload ajax table
            {
            	//$('#myVarietas'+data.id).modal('hide');
            	$(".var").DataTable().ajax.reload(null, false);
            	swal('Success', 'Data diubah', 'success');
            	
            }
            else
            {
            	alert('error adding data');
            }
        },
        
    });
	}
	
	
	function hapusVarietas(id){
		swal({
			title: 'Konfirmasi?',
			text: "Apakah anda yakin ingin menghapus data ini!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya',
			closeOnConfirm: true
		},
		function(isConfirm) {
			if (isConfirm) {
				$.ajax({
					url : "<?php echo site_url('Pkl/deleteDataVarietas')?>/" + id,
					type: "POST",
					dataType: "JSON",
					success: function(data){ 
                if(data.status) //if success close modal and reload ajax table
                {                    
                	
                	$(".var").DataTable().ajax.reload(null, false);
                    /*swal({
                            title: "Data Berhasil dihapus",
                            type: "",
							closeOnConfirm: true
							
						});*/
				
			}

		},
		error: function (jqXHR, textStatus, errorThrown)
		{
			alert('Data tidak dapat dihapus!');
		}       
	});
			}
		});
	}
	///===============varietas
	
	</script>
	<!-- Custom and plugin javascript -->
	
	<script src="<?php echo base_url(); ?>asset/js/inspinia.js"></script>
	<script src="<?php echo base_url(); ?>asset/js/plugins/metisMenu/jquery.metisMenu.js"></script>
	<script src="<?php echo base_url(); ?>asset/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	</html>
