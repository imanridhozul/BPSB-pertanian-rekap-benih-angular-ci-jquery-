

	<div class='modal fade' id='myVarietas' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
	  <div class='modal-dialog' role='document'>
		<div class='modal-content'>
		  <div class='modal-header'>
			<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			<h4 class='modal-title' id='myModalLabel'>Update Varietas</h4>
		  </div>
		  <div class='modal-body'>							  
					 <form role='form' id='updateVarietas'>
						
						<div class='form-group'>   
							 <label for='name'>Kode</label>															
							<input type='text' name='kodeV' class='form-control' id='name'>
						</div>  
						<div class='form-group'>
							 <label for='name'>Varietas</label>															
							<input type='text' name='varietasV' class='form-control' id='name'>
							<input type='hidden' name='jenisV' class='form-control' id='name' value='<?php echo $jn; ?>'>
							<input type='hidden' name='idV' class='form-control' id='name'>
							
						</div>  
						<div class='form-group'>   
							 <label for='name'>Panen</label>															
							<input type='text' name='pan' class='form-control' id='name'>
							
						</div>  
						<div class='form-group'>   
							 <label for='name'>Produksi</label>															
							<input type='text' name='prod' class='form-control' id='name'>
						</div>  
							<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
							<button onclick='updateVarietas()' class='btn btn-danger'>Submit</button>	
					 </form>	

		  </div>
		  <div class='modal-footer'>
			
		
		  </div>
		</div>
	  </div>
	</div>					

