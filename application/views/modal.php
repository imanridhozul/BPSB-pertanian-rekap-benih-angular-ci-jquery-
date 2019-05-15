<div class='modal fade' id='myData' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
										  <div class='modal-dialog' role='document'>
											<div class='modal-content'>
											  <div class='modal-header'>
												<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
												
												<h4 class='modal-title' id='myModalLabel'>Edit</h4> <hr>
												<a class='btn btn-xs btn-success' onclick='updatesData()'>Update</a>
											  </div>
											  <div class='modal-body'>					
															<div class='form-group'>    
															 <form role='form' id='updatesData'>
																 <label for='name'>No Induk</label>
																<input type='text' name='noinduk' class='form-control' id='name' value=''>
															</div>  
																	<div class='form-group'>  
																	<label for='name'>Status </label>	
																	 <select name='status' class='form-control'>
																		<option value=''>Pilih</option>
																		<option value='1'>Sudah</option>
																		<option value='0'>Belum</option>	
																		</select>							
																		<input type='hidden' name='id' class='form-control'>																
																	</div> 
																<?php
																echo"<div class='form-group'>   
																 <label for='name'>Penangkar</label>
																 <select class='form-control' name='nama'>
																	<option value=''>pilih</option>";
																	foreach($penangkar as $ps)
																	{
																		echo"<option value='$ps->idPenangkar'>$ps->nama</option>";
																	}													
																	echo"</select>															
																
																	</div> ";
															
															
																?>
														    	<div class='form-group'>    
																 <label for='name'>Alamat</label>															
																<input type='text' name='alamat' class='form-control' id='name'>
															</div>  
															<div class='form-group'> 
																 <label for='name'>Blok</label>															
																<input type='text' name='blok' class='form-control' id='name'>
															</div>  
															<div class='form-group'> 
																 <label for='name'>Lokasi</label>															
																<input type='text' name='lokasi' class='form-control' id='name'>
															</div>  
															<?php
																echo"<div class='form-group'>   
																 <label for='name'>Kelas Benih</label><select class='form-control' name='benih' id='kategori'>
																	<option value=''>pilih</option>";
																	foreach($ben as $ps)
																	{
																		echo"<option value='$ps->idKelasBenih'>$ps->kode</option>";
																	}													
																	echo"</select>															
																
															</div> ";
															
															
															?>
															<?php
																echo"<div class='form-group'>   
																 <label for='name'>Varietas</label><select class='form-control' name='var' id='kategori'>
																	<option value=''>pilih</option>";
																	foreach($var as $ps)
																	{
																		echo"<option value='$ps->idVarietas'>$ps->kode</option>";
																	}													
																	echo"</select>															
																
															</div> ";
															
															
															?>
																<div class='form-group'>   
																 <label for='name'>Tanggal sebar</label>															
																<input type='text' name='sebar' class='form-control' id='name' value=''>
															</div>  
															<div class='form-group'>
																 <label for='name'>Tanggal Tanam</label>															
																<input type='text' name='tanam' class='form-control' id='name' value=''>
															</div>  
															<div class='form-group'>  
																<label for='name'>Luas Asal</label>	
																<input type='text' name='luasasal' class='form-control' id='name' value=''>
															</div>  
															<div class='form-group'>    
																<label for='name'>Tanggal Panen</label>	
																<input type='text' name='panen' class='form-control' id='name' value=''>
															</div>  
															<div class='form-group'>
																<label for='name'>Produksi</label>	
																<input type='text' name='produksi' class='form-control' id='name' value=''>
															</div>  
															<div class='form-group'>  
																<label for='name'>Luas Lulus</label>	
																<input type='text' name='luaslulus' class='form-control' id='name' value=''>
															</div>  
															<div class='form-group'>
																<label for='name'>Uji</label>	
																<input type='text' name='uji' class='form-control' id='name' value=''>
															</div>  
															<div class='form-group'>   
																<label for='name'>Lulus Uji</label>	
																<input type='text' name='lulusuji' class='form-control' id='name' value=''>
															</div>  
															<div class='form-group'>  
																<label for='name'>Biaya</label>	
																<input type='text' name='biaya' class='form-control' id='name' value=''>
															</div>  
														 </form>
											  
											   </div>
											  <div class='modal-footer'>
												 <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
											  </div>
											</div>
										  </div>
										</div>		
										
										
										
										
								