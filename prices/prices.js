
        function update(val,event){
            var productID = val;
            
            var data = $("#edit-product"+val).serialize();
            
           event.preventDefault();
           $.ajax({
			   		url: 'editPrice.php',
			    	type: 'POST',
			       	data: data,
                    success: function(data) {
                        
                      $('#modal'+productID).modal('hide');
                      $('body').removeClass('modal-open');
                      $('.modal-backdrop').remove();
                       readPrices();
                        
                    }
			       
			     });
       }
       
        $('.add-btn-color').on('click', function(event){
      event.preventDefault();
      $('#modalAddProduct').modal('show').find('.modal-content').load($(this).attr('href'));
    });
	$(document).ready(function(){
		
		readPrices(); 
		
   
		$(document).on('click', '#delete-product', function(event){
			
			var productId = $(this).data('id');
			SwalDelete(productId);
			event.preventDefault();
		});
        
      
       
        
	});
        
		$(document).on('click','#save',function(event) {
         var data = $("#insert-product").serialize();
         
           event.preventDefault();
           $.ajax({
			   		url: 'insertPrice.php',
			    	type: 'POST',
			       	data: data,
                    success: function(data) {
                      $('#modalAddProduct').modal('hide');
                       readPrices();
                        
                      
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
					readPrices();
			     })
			     .fail(function(){
			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
			     });
			  });
		    },
			allowOutsideClick: false			  
		});	
		
	}
	
	function readPrices(){
		$('#load-products').load('read-prices.php');	
	}