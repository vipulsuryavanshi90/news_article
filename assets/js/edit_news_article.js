

    $( "#updateArticle" ).on('submit' , function( e ) {
 
      e.preventDefault();
    
   $.ajax({
      url: "controller/update_article.php", 
      type: "POST",             
      data: new FormData(this), 
      contentType: false,       
      cache: false,             
      processData:false,        
      success: function(data)   
      {
        var status = JSON.parse(data);
        console.log(status.message);
        if(status.message){
          $('#alert-message').html("<div class='alert alert-success alert-dismissible'><strong>Success!"+status.message+"</strong> </div>");
          $('#success-message').show();

          $('#title').val('');
          $('#description').val('');
          $('#image').val('');
          $('#author').val('');
          $('#content').val('');

        }
        else if(status.error){
          $('#alert-message').html("<div class='alert alert-danger alert-dismissible' ><strong>Danger!"+status.error+"</strong> </div>");
          $('#success-message').show();

        }
      }
  });
 });