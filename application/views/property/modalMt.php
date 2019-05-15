<div class='modal fade' id='mtIn' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
										  <div class='modal-dialog' role='document'>
											<div class='modal-content'>
											  <div class='modal-header'>
												<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
												
												<h4 class='modal-title' id='myModalLabel'>Detail Lowongan</h4> <hr>
												<a class='btn btn-xs btn-success' onclick='updatesData()'>Submit</a>
											  </div>
											  <div class='modal-body'>					
														<form role='form' id='insertMt' method='post' action='<?php echo base_url(); ?>Pkl/insertMt/'>
																<div class='form-group'>  
																	<label for='name'>Mt</label>
																	<input type='text' name='mt'>
																</div>  
																<div class='form-group'>  
																	<label for='name'>Status</label>
																		<select name='status' class='form-control'>
																			<option value='1'>Aktif</option>
																			<option value='0'>Tidak Aktif</option>
																			
																			
																		</select>	
																</div>  						
																<button class='btn btn-xs btn-primary'>Tambah</button>
															
														</form>
											  <div class='modal-footer'>
												 <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
											  </div>
											</div>
										  </div>
										</div>		
										
										
										
										
								