  <!DOCTYPE html>   
<html>
<!-- Data Tables -->
<link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
<link href="css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
<body ng-app="myApp" ng-controller="lahan">
	<div class="gray-bg">
	<?php 
			echo $this->session->flashdata('msg');
			echo $this->session->flashdata('editmt');
			echo $this->session->flashdata('insertmt');
			echo $this->session->flashdata('hpsmt');
			
			
	?>
		<div class="row">	
			<br>
			<!-- <div class="col-sm-6 col-sm-offset-3">-->
			<div class="col-sm-4">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>Daftar Tanaman</h5>
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
						<table class="table table-bordered table-striped jenis2">
							<thead>
								<tr>
									<th>no</th>
									<th>Kode</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1;$u=base_url();
								foreach($jenis as $jj)
								{
									echo"<tr><td>$i</td><td>$jj->tanaman</td><td>
									<form method='post' action='".$u."Pkl/detail'>
									<input type='hidden' name='jenis' value='$jj->tanaman'>
									<button type='submit' class='btn btn-sm btn-success'><span class='glyphicon glyphicon-eye-open'>  Detail</button>
									</form></td>
									</tr>
									";
									$i++;
								}

								?>					
							</tbody>					
						</table>
						</div>
					</div>
				</div>
			</div>	
<div class="col-sm-4">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>Musim Tanam</h5>
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
							<table class="table table-bordered table-striped mt">
								<thead>
									<tr>
										<th>no</th>
										<th>MT</th>
										<th>status</th>
										<th>acttion</th>
									</tr>
								</thead>
								<tbody>
								<?php 
										$u = base_url();
										$i=1;
									 foreach($mt as $ps)
									{
										echo"
											<tr><td>$i</td><td>$ps->idMt</td><td>";if($ps->aktif==1){echo "Aktif";} else {echo "tidak aktif";}echo"</td>
											<td> <a class='btn btn-xs btn-success' href='#edit$i' data-toggle='modal'>	<i class='fa fa-pencil'></i>edit</a>
											<a href='".$u."pkl/hapusMT/$ps->idMt'><span class='glyphicon glyphicon-trash'></span></a>
											
											</td>
											
											</tr>
										
										";
										echo"
											<div class='modal fade' id='edit$i' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
									  <div class='modal-dialog' role='document'>
										<div class='modal-content'>
										  <div class='modal-header'>
											<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
											<h4 class='modal-title' id='myModalLabel'>Update Musim Tanam</h4>
										  </div>
										  <div class='modal-body'>							  
													 <form role='form' method='post' action='".$u."pkl/editMt'>
														
														<div class='form-group'>   
															 <label for='name'>Mt</label>															
															<input type='text' name='mt' class='form-control' value='$ps->idMt'>
														</div>  
														<div class='form-group'>   
																	<label for='name'>Status</label>
																		<select name='status' class='form-control'>
																			<option value='1'"; if($ps->aktif == 1){echo "selected";} echo">Aktif</option>
																			<option value='0'"; if($ps->aktif==0) {echo "selected";}echo ">Tidak Aktif</option>
																			
																			
																		</select>	
														</div>  
																									
															<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
															<button type='submit' class='btn btn-md btn-primary'>Simpan</button>	
													 </form>	

										  </div>
										  <div class='modal-footer'>
											
										
										  </div>
										</div>
									  </div>
									</div>					      
										
										
										";
										$i++;
									}													
								?>
								</table>
							</div>
									<div class='modal fade' id='mtIn' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
												  <div class='modal-dialog' role='document'>
													<div class='modal-content'>
													  <div class='modal-header'>
														<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>														
														<h4 class='modal-title' id='myModalLabel'>Tambah Data</h4> <hr>
													
													  </div>
													  <div class='modal-body'>					
																<form role='form' id='insertMt' method='post' action='<?php echo base_url(); ?>Pkl/insertMt/'>
																		<div class='form-group'>  
																			<label for='name'>Mt</label>
																			<input class='form-control' type='text' name='mt'>
																		</div>  
																		<div class='form-group'>  
																			<label for='name'>Status</label>
																			<select name='status' class='form-control'>
																			
																			<option value=''>status</option>
																			<option value='1'>Aktif</option>
																			<option value='0'>Tidak Aktif</option>
																			
																			
																			</select>	
																		</div>  						
																		<button class='btn btn-xs btn-primary'>Simpan</button>
																	
																</form>
													  <div class='modal-footer'>
														 <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
													  </div>
													</div>
												  </div>
									</div></div>		<br>
							<a class='btn btn-xs btn-primary' href='#mtIn' data-toggle='modal'>Tambah</a>
					</div> 
			</div>	
</div>			
			<div ng-show='lap1' class="col-sm-4">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>Laporan berdasarkan Penangkar</h5>
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
						<form role='form' id='kumulatif' method='post' action='<?php echo base_url(); ?>data/laporanKolek/'>
							<div class='form-group'>  
								<label for='name'>Pilih Jenis Tanaman</label>
								<select name='jenis' class='form-control' >
									<option value=''>Pilih Tanaman</option>
									<?php foreach($jenis as $jj)
									{
										echo"<option value='$jj->tanaman'>$jj->tanaman</option>";
									}													
									?>
								</select>		
							</div>  

							<label for='name'>Daerah</label>
							<select name='kab' class='form-control'>
								<option value=''>Pilih Kabupaten</option>
								<option value='semua'>NTB</option>
								<?php foreach($kab as $ps)
								{
									echo"<option value='$ps->kode'>$ps->nama</option>";
								}													
								?>
							</select>	
							<label for='name'>MT</label>
							<select name='mt' class='form-control'>
								<option value=''>Pilih MT</option>
								<?php foreach($mt as $ps)
								{
									echo"<option value='$ps->idMt'>$ps->idMt</option>";
								}													
								?>
							</select>	<br>	
							<button class='btn btn-xs btn-primary' ng-click='getLaporan()'>Rekap Data</button>
							<a class='btn btn-xs btn-danger' ng-click='cl_lap1()'>Close</a>	<br>
						</div> 
						
					</form>
					
				</div> 
			</div>
			
			
			
			<div ng-show='lap2' class="col-sm-4">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>Laporan Berdasarkan Varietas</h5>
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
						<form role='form' id='kumulatif' method='post' action='<?php echo base_url(); ?>data/laporanKolekVarietas/'>
							<div class='form-group'>  
								<label for='name'>Pilih Jenis Tanaman</label>
								<select name='jenis' class='form-control' >
									<option value=''>Pilih Tanaman</option>
									<?php foreach($jenis as $jj)
									{
										echo"<option value='$jj->tanaman'>$jj->tanaman</option>";
									}													
									?>
								</select>		
							</div>  

							<label for='name'>Daerah</label>
							<select name='kab' class='form-control'>
								<option value='xxx'>Pilih Kabupaten</option>
								<option value='semua'>NTB</option>
								<?php foreach($kab as $ps)
								{
									echo"<option value='$ps->kode'>$ps->nama</option>";
								}													
								?>
							</select>	
							<label for='name'>MT</label>
							<select name='mt' class='form-control'>
								<option value=''>Pilih MT</option>
								<?php foreach($mt as $ps)
								{
									echo"<option value='$ps->idMt'>$ps->idMt</option>";
								}													
								?>
							</select>
						<label for='name'>MT</label>
							<select name='mt2' class='form-control'>
								<option value=''>Pilih MT</option>
								<?php foreach($mt as $ps)
								{
									echo"<option value='$ps->idMt'>$ps->idMt</option>";
								}													
								?>
							</select>							<br>	
							
							<button class='btn btn-xs btn-primary'>Rekap Data</button>
							<a class='btn btn-xs btn-danger' ng-click='cl_lap2()'>Close</a>	<br>
						</div> 
					</form>
				</div> 
			</div>
			
			
			
			
			<div ng-show='lap3' class="col-sm-4">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>Laporan Buku Induk</h5>
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
						<form role='form' id='kumulatif' method='post' action='<?php echo base_url(); ?>data/createlaporan/'>
							<div class='form-group'>  
								<label for='name'>Pilih Jenis Tanaman</label>
								<select name='jenis' class='form-control' >
									<option value=''>Pilih Tanaman</option>
									<?php foreach($jenis as $jj)
									{
										echo"<option value='$jj->tanaman'>$jj->tanaman</option>";
									}													
									?>
								</select>		
							</div>  

							<label for='name'>Daerah</label>
							<select name='kab' class='form-control'>
								<option value='xx'>Pilih Kabupaten</option>
								<option value=''>NTB</option>
								<?php foreach($kab as $ps)
								{
									echo"<option value='$ps->kode'>$ps->nama</option>";
								}													
								?>
							</select>	
							<label for='name'>MT</label>
							<select name='mt' class='form-control'>
								<option value=''>Pilih MT</option>
								<?php foreach($mt as $ps)
								{
									echo"<option value='$ps->idMt'>$ps->idMt</option>";
								}													
								?>
							</select>	<br>	
							<button class='btn btn-xs btn-primary' ng-click='tampil()'>Laporan</button>
							<a class='btn btn-xs btn-danger' ng-click='cl_lap3()'>Close</a>	<br>
						</div>  
					</form>
				</div>  
			</div>
			
			<div ng-hide='menulap' class="col-sm-4">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>Menu Laporan</h5>
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
						<button class='btn btn-xs btn-primary' ng-click='tlap1()'>Laporan Penangkar</button>	
						<button class='btn btn-xs btn-primary' ng-click='tlap2()'>Laporan varietas</button>
						<button class='btn btn-xs btn-primary' ng-click='tlap3()'>Laporan Buku Induk</button>
					</div>
				</div>
			</div>	 
			
			
		</div>
	</div>	


</div>
</div>
</body>
	<script src="<?php echo base_url(); ?>asset/js/angular.min.js"></script> <!-- angular -->
	
<script>
var app = angular.module('myApp', []);
app.controller('lahan', function($scope,$http) {
	$scope.tes = 'hai';
	//	$scope.x = document.getElementById("kab").value;
	
	//mnghilangkan data mahasiswa
	$scope.tlap1 = function(){
		$scope.lap1 = true;	
		$scope.menulap = true;	
		
		
	};
	$scope.cl_lap1 = function(){
		$scope.lap1 = false;	
		$scope.menulap = false;	
	};
	
	
	$scope.tlap2 = function(){
		$scope.lap2 = true;	
		$scope.menulap = true;	
		
		
	};
	$scope.cl_lap2 = function(){
		$scope.lap2 = false;	
		$scope.menulap = false;	
	};
	
	
	$scope.tlap3= function(){
		$scope.lap3 = true;	
		$scope.menulap = true;	
		
		
	};
	$scope.cl_lap3 = function(){
		$scope.lap3 = false;	
		$scope.menulap = false;	
	};
	
	
	
	
	
 });//ttp controller

</script>


<script type="text/javascript">
$(function() {
	$('.jenis2').dataTable();
});
$(function() {
	$('.mt').dataTable();
});


function getLaporan(){
	$.ajax({
		url : "<?php echo site_url('Data/laporanKolek')?>",
		type: "POST",
		data: $('#kumulatif').serialize(),
		dataType: "JSON",
		success: function(data){ 
            if(data.status) //if success close modal and reload ajax table
            {
				// $(".var").DataTable().ajax.reload(null, false);
				swal('Success', 'Data ditambahkan', 'success');
				
			}
			else
			{
				alert('error adding data');
			}
		},

	});
}

</script>  

<!-- Custom and plugin javascript -->
<!-- Data Tables -->
<script src="<?php echo base_url(); ?>asset/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>asset/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url(); ?>asset/js/plugins/dataTables/dataTables.responsive.js"></script>
<script src="<?php echo base_url(); ?>asset/js/angular.min.js"></script> <!-- angular -->
<script src="<?php echo base_url(); ?>asset/js/inspinia.js"></script>
<script src="<?php echo base_url(); ?>asset/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo base_url(); ?>asset/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
</html>
