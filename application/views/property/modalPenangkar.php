						<div class='modal fade' id='tambah' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
									  <div class='modal-dialog' role='document'>
										<div class='modal-content'>
										  <div class='modal-header'>
											<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
											<h4 class='modal-title' id='myModalLabel'>Update Penangkar</h4>
										  </div>
										  <div class='modal-body'>							  
													 <form role='form' id='tambahh'>
														
														<div class='form-group'>   
															 <label for='name'>Nama Penangkar</label>															
															<input type='text' name='namat' class='form-control' id='name'>
														</div>  
														<div class='form-group'>   
															 <label for='name'>Desa</label>															
															<input type='text' name='desat' class='form-control' id='name'>
														</div>  
														<div class='form-group'>   
															 <label for='name'>Kecamatan</label>															
															<input type='text' name='kect' class='form-control' id='name'>
														</div>  
														<div class='form-group'>   
															 <label for='name'>Kabupaten</label>															
															<select class='form-control' name='kabt'>
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
															 <label for='name'>Nomor Rekomendasi</label>															
															<input type='text' name='norekt' class='form-control' id='name'>							
														</div> 
														<div class='form-group'>
															 <label for='name'>Penilaian</label>															
															<input type='text' name='penilaiant' class='form-control' id='name'>							
														</div>  																							
															<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
															<a onclick='tambah()' class='btn btn-danger'>Simpan</a>	
													 </form>	

										  </div>
										  <div class='modal-footer'>
											
										
										  </div>
										</div>
									  </div>
									</div>					      

	<div class='modal fade' id='myPenangkar' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
	  <div class='modal-dialog' role='document'>
		<div class='modal-content'>
		  <div class='modal-header'>
			<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			<h4 class='modal-title' id='myModalLabel'>Update Penangkar</h4>
		  </div>
		  <div class='modal-body'>							  
					 <form role='form' id='updatesPenangkar'>
						
						<div class='form-group'>   
							 <label for='name'>nama</label>															
							<input type='text' name='nama' class='form-control' id='name'>
						</div>  
						<div class='form-group'>   
							 <label for='name'>desa</label>															
							<input type='text' name='desa' class='form-control' id='name'>
						</div>  
						<div class='form-group'>   
							 <label for='name'>kecamatan</label>															
							<input type='text' name='kec' class='form-control' id='name'>
						</div>  
						<div class='form-group'>
							 <label for='name'>kabupaten</label>															
							<input type='text' name='kab' class='form-control' id='name'>							
							<input type='hidden' name='id' class='form-control' id='name'>							
						</div>  
						<div class='form-group'>
							 <label for='name'>nomor rekomendasi</label>															
							<input type='text' name='norek' class='form-control' id='name'>							
						</div> 
						<div class='form-group'>
							 <label for='name'>penilaian</label>															
							<input type='text' name='penilaian' class='form-control' id='name'>							
						</div>  																							
							<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
							<a onclick='update()' class='btn btn-danger'>Simpan</a>	
					 </form>	

		  </div>
		  <div class='modal-footer'>
			
		
		  </div>
		</div>
	  </div>
	</div>	


	
	
