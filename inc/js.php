 <!-- Option 1: Bootstrap Bundle with Popper -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
 <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


 <!-- animation script -->

 <script src="<?php echo $linkPrefix; ?>js/global.js"></script>
 <script src="<?php echo $linkPrefix; ?>js/tooltip.js"></script>
 <script>
     AOS.init();
 </script>
 <script>  
 $('.add-to-cart').on('click', function(e){
  e.preventDefault();
  // var prod_id = $('input[name="prod_id"]').val(),
  //   quantity = $('input[name="quantity"]').val();
  var prod_id = $(this).data("this-pid"),
    quantity = $(this).data("this-qty");
  // alert(prod_id);
  // alert(quantity);
  $.ajax({
    url:'inc/ajax_add_to_cart.php',
    method:"POST",
    data:{prod_id, quantity},
    success: function(response){
      if(response==1){
        alertify.warning('Product added to cart.');
      }else{
        if(response==2){
          alertify.warning('Product already in your cart.');
        }else{
          alertify.warning('Something went wrong, Please try again.');
        }
      }
    },
    error: function(response){
      //console.log(response);
      alertify.error('Something went wrong, Please try again.');
    }
   })

  });  
</script>
<script type="text/javascript">
$('.state').on('change', function(){
	var city = $(this).val();
	$.ajax({
		url : '../inc/ajax-city.php',
		type : 'post',
		data : { city : city},

		success: function(response){
			$('#city').html(response);
			console.log(response);

		},
		error: function(response){
			console.log(response);
		}
	});
});
</script>