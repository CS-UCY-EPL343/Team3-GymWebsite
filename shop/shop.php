
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    
  
</head>
<body>
    
     
    <nav class="navbar navbar-expand-lg navbar-light bg-custom">
 
  <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

        
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <a class="navbar-brand ml-auto mx-auto" href="#">
          <img src="../img/logo-test.png" alt="" width="70" height="90">
        </a>
    <ul class="navbar-nav navbar-light bg-light ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="../index.html"><i class="fas fa-home fa-fw"> </i>Home </a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="../profile.html"> <i class="fas fa-user fa-fw"></i>Profile</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="../programs.html"><i class="fas fa-dumbbell fa-fw"></i>Programs</a>
      </li>
    
          <li class="nav-item">
        <a class="nav-link" href="../extra-facilities.html"><i class="fas fa-calendar-check fa-fw"></i>Extra Facilities</a>
      </li>
         <li class="nav-item">
        <a class="nav-link" href="../shop/shop.php"><i class="fas fa-shopping-cart fa-fw"></i>Shop</a>
      </li>
         <li class="nav-item">
        <a class="nav-link" href="../prices.html"><i class="fas fa-dollar-sign fa-fw"></i>Prices</a>
      </li>
         <li class="nav-item">
        <a class="nav-link" href="../announcements.html"><i class="fas fa-bullhorn fa-fw"></i>Announcements</a>
      </li>
    </ul>
    
  </div>
</nav>

<div class="jumbotron shop-cover jumbotron-fluid" id="top-jumpo2">
  <div class="container text-center">
      
      <div class="row">
   <div class="col-md-2"></div>
    <div class="col-md-8"><p> </p> 
          <div class="text-center">
        <h1> Shop </h1>
              <p> Have a look at the products that our gym is selling. For more information do not hesitate to contact us.</p>
        </div>

          </div>
          <div class="col-md-2"></div>
      </div>
  </div>
</div>
    
    <div class= "container">
     <div class="row add">
        
         <a href="add-product.html" class="btn btn-primary round add-btn-color">Add Product</a>
         
          <div class="modal fade" id="modalAddProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
         <div class="modal-dialog" role="document">
    <div class="modal-content">
        
             </div>
              </div>
</div>
    </div>
    </div>
    <div class="products-section" id="load-products">
    
        <br>
      <br>
    </div>
<!-- Footer -->
<footer class="page-footer top-menu color-footer">
  
      
      <div class="container">
				
					
						
							<div class="row">
								<div class="col-md-4">
                                 <div class="top-margin">
									<div class="icon"> <i class="fas fa-mobile-alt"></i></div>
                                    <div class="loc">
										
										<p> Tel. 24726444, 99481883 <br>Email: mspetsioti81@hotmail.com</p>
                                       
									</div>
                                    </div>
								</div>
								<div class="col-md-4 ">
                                     <div class="top-margin">
                                   <div class="icon"> <i class="fas fa-map-marker-alt"></i></div>
                                    <div class="loc">
										
										<p> Nikos Theophanous,<br> Xylophagou 7520, Larnaca</p>
									</div>
                                        </div>
								</div>
								<div class="col-md-4">
                                    <div class="top-margin-cstm text-center">
                                   <p> Socialise with us!</p>
                                       <a href="http://facebook.com">    <i class="fab fa-facebook"></i>        </a>                                
                                    </div>
								</div>
                                
							</div>
						
					
				</div>
			

  </footer>
  <!-- Footer -->
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>

   <script>
    
        function update(val){
            var productID = val;
            
            var data = $("#edit-product"+val).serialize();
            
           event.preventDefault();
           $.ajax({
			   		url: 'editPro.php',
			    	type: 'POST',
			       	data: data,
                    success: function(data) {
                        
                      $('#modal'+productID).modal('hide');
                      $('body').removeClass('modal-open');
                      $('.modal-backdrop').remove();
                       readProducts();
                        
                    }
			       
			     });
       }
      $('#edit-product').on('click', function(e){
      e.preventDefault();
      var edit_productID = $(this).data('id');
      $('#edit-product').modal('show').find('.modal-content').load($(this).attr('href'));
    });
       
        $('.add-btn-color').on('click', function(e){
      e.preventDefault();
      $('#modalAddProduct').modal('show').find('.modal-content').load($(this).attr('href'));
    });
	$(document).ready(function(){
		
		readProducts(); 
		
   
		$(document).on('click', '#delete-product', function(e){
			
			var productId = $(this).data('id');
			SwalDelete(productId);
			e.preventDefault();
		});
        
      
       
        
	});
        
		$(document).on('click','#save',function(e) {
         var data = $("#insert-product").serialize();
         
           event.preventDefault();
           $.ajax({
			   		url: 'insertPro.php',
			    	type: 'POST',
			       	data: data,
                    success: function(data) {
                      $('#modalAddProduct').modal('hide');
                       readProducts();
                        
                      
                    }
			       
			     });
       })
        
	
	
	function SwalDelete(productId){
		
		swal({
			title: 'Are you sure?',
			text: "It will be deleted permanently!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!',
			showLoaderOnConfirm: true,
			  
			preConfirm: function() {
			  return new Promise(function(resolve) {
			       
			     $.ajax({
			   		url: 'delete.php',
			    	type: 'POST',
			       	data: 'delete='+productId,
			       	dataType: 'json'
			     })
			     .done(function(response){
			     	swal('Deleted!', response.message, response.status);
					readProducts();
			     })
			     .fail(function(){
			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
			     });
			  });
		    },
			allowOutsideClick: false			  
		});	
		
	}
	
	function readProducts(){
		$('#load-products').load('read-products.php');	
	}
	
</script>
</body>
</html>
