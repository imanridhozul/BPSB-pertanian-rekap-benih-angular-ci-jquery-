
	<div class='modal fade' id='myBenih' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
	  <div class='modal-dialog' role='document'>
		<div class='modal-content'>
		  <div class='modal-header'>
			<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			<h4 class='modal-title' id='myModalLabel'>Update Benih</h4>
		  </div>
		  <div class='modal-body'>							  
					 <form role='form' id='updateBenih'>
						
						<div class='form-group'>   
							 <label for='name'>Kode</label>															
							<input type='text' name='kodeb' class='form-control' id='name'>
						</div>  
						<div class='form-group'>
							 <label for='name'>Benih</label>															
							<input type='text' name='kelasb' class='form-control' id='name'>
							<input type='hidden' name='jenisb' class='form-control' id='name' value='<?php echo $jn; ?>'>
							<input type='hidden' name='idb' class='form-control' id='name'>
						</div>  																							
							<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
							<button onclick='updateBenih()' class='btn btn-danger'>Submit</button>	
					 </form>	

		  </div>
		  <div class='modal-footer'>
			
		
		  </div>
		</div>
	  </div>
</div>					
