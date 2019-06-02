 

 $( "#submitArticle" ).on('submit' , function( e ) {
      
      e.preventDefault();
       var form_data = new FormData(this)
   $.ajax({
      url: "controller/add_article.php", 
      type: "POST",             
      data: form_data, 
      contentType: false,       
      cache: false,             
      processData:false,        
      success: function(data)   
      {

        var status = JSON.parse(data)
        console.log(status.error);
        if(status.message){
          $('#alert-message').html("<div class='alert alert-success alert-dismissible' ><strong>Success!"+status.message+"</strong> </div>");
          $('#success-message').show();

          $('#title').val('');
          $('#description').val('');
          $('#image').val('');
          $('#author').val('');
          $('#content').val('');
            
        }else if(status.error){
          $('#alert-message').html("<div class='alert alert-danger alert-dismissible' ><strong>Danger!"+status.error+"</strong> </div>");
          $('#success-message').show();

        }
      }
  });
 });