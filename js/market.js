$(function() {
  $.ajax({                                      
      url: 'getTutors.php',                            
      data: "",                        
      dataType: 'json',                     
      success: function(data) 
      {
        var imageFileName = data[0];             
        var name = data[1];           		 
        
	$('#tutor-list').append(
		'<div class="col-lg-4 col-md-6 text-center"><div class="service-box"><!--<i class="fa fa-4x fa-diamond text-primary sr-icons"></i> --><img src="img/' + imageFileName + '"  alt="No image"><h4>' + name + '</h4><div class="rating centerInDiv"><p class="text-muted">★★★★☆</p><p class="text-muted">CSE 132</p><p class="text-muted">CSE 473</p><p class="text-muted">MATH 132</p></div></div></div>');
      } 
  });
}); 
