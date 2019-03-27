 function update(val,event){
            var productID = val;
            
             var data = new FormData($("#edit-product"+val).get(0));
            
           event.preventDefault();
           $.ajax({
			   		url: 'editSer.php',
			    	type: 'POST',
			       	data: data,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                       
                      $('#modal'+productID).modal('hide');
                      $('body').removeClass('modal-open');
                      $('.modal-backdrop').remove();
                       readProducts();
                        
                    }
			       
			     });
       }
       
        $('.add-btn-color').on('click', function(event){
      event.preventDefault();
      $('#modalAddProduct').modal('show').find('.modal-content').load($(this).attr('href'));
    });
	$(document).ready(function(){
		
		readProducts(); 
		
   
		$(document).on('click', '#delete-product', function(event){
			
			var productId = $(this).data('id');
			SwalDelete(productId);
			event.preventDefault();
		});
        
      
       
        
	});
        
		$(document).on('click','#save',function(event) {
         var data = new FormData($("#insert-product").get(0));
         
           event.preventDefault();
           $.ajax({
			   		url: 'insertSer.php',
			    	type: 'POST',
			       	data: data,
                    contentType: false,
                    processData: false,
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
		$('#load-products').load('read-service.php');	
	}