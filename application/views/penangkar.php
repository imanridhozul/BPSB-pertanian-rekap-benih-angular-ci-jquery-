 <!DOCTYPE html>      
<html>

<body>

	<!--  <body> -->
	<div class="gray-bg">
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
				 <a class='btn btn-xs btn-primary' href='#tambah' data-toggle='modal'>tambah</a>
					
						<div class="table-responsive">
							<table class="table table-bordered table-striped dt1">
								<thead>
									<tr>
										<th>no</th>
										<th>Nama</th>
										<th>Desa</th>
										<th>Kecamatan</th>
										<th>Kabupaten</th>
										<th>Nomor Rekomendasi</th>
										<th>Penilaian</th>
										<th>Action</th>
										
									</tr>
								</thead>
								<tbody>
									
																	<?php 
										$u = base_url();
									$this->load->view('property/modalPenangkar');
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
	
	$(".dt1").dataTable({
	"ajax":{
		"url":"<?php echo $u."pkl/getForTablePenangkar/";?>",
		"type":"POST"
	}
});

function update(){
		$.ajax({
			url : "<?php echo site_url('Pkl/updatePenangkar')?>",
			type: "POST",
			data: $('#updatesPenangkar').serialize(),
			dataType: "JSON",
			success: function(data){ 
            if(data.status) //if success close modal and reload ajax table
            {
            	//$('#myBenih'+data.id).modal('hide');
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
function tambah(){
		$.ajax({
			url : "<?php echo site_url('Pkl/tambahPenangkar')?>",
			type: "POST",
			data: $('#tambahh').serialize(),
			dataType: "JSON",
			success: function(data){ 
            if(data.status) //if success close modal and reload ajax table
            {
            	//$('#myBenih'+data.id).modal('hide');
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

function editDataPenangkar(id){
            // $('#moda_edit').modal('show');
            save_method = 'update';      
            $.ajax({
            	url : "<?php echo site_url('Pkl/editDataPenangkar')?>/" + id,
            	type: "GET",
            	dataType: "JSON",
            	success: function(data)
            	{  
            		$('[name="nama"]').val(data.nama); 
            		$('[name="desa"]').val(data.desa); 
            		$('[name="kec"]').val(data.kecamatan); 
            		$('[name="kab"]').val(data.kabupaten); 
            		$('[name="norek"]').val(data.norek);
            		$('[name="id"]').val(data.idPenangkar);
            		$('[name="penilaian"]').val(data.penilaian);
            		//$('[name="jenis"]').val(data.alamat);            	
            		
            		
                    $('#myPenangkar').modal('show'); // show bootstrap modal when complete loaded
                   // $('.modal-title').text('Edit Data Instansi'); // Set title to Bootstrap modal title
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                	alert('Error get data from ajax');
                }
            });
}

function hapusPenangkar(id){
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
					url : "<?php echo site_url('Pkl/hapusPenangkar')?>/" + id,
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
	
</script>

	<!-- Custom and plugin javascript -->
	
	<script src="<?php echo base_url(); ?>asset/js/inspinia.js"></script>
	<script src="<?php echo base_url(); ?>asset/js/plugins/metisMenu/jquery.metisMenu.js"></script>
	<script src="<?php echo base_url(); ?>asset/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	</html>
