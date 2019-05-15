<!DOCTYPE html>
<html>
 <!-- Data Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
 <body ng-app="myApp" ng-controller="lahan">
	<div class="gray-bg">
		<div class="row">			
			 <div class="col-sm-6 col-sm-offset-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Basic Data Tables example with responsive plugin</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                      
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
	</div>
</body>
<script type="text/javascript">
            $(function() {
                $('.jenis2').dataTable();
            });
			
			
        </script>  
		<script>
        var app = angular.module('myApp', []);
        app.controller('lahan', function($scope,$http) {
            $scope.tes = 'hai';
		//by departemen berdsarkan prodi 
		
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
