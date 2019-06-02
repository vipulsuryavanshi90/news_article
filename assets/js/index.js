    
    $("#pagination li").on('click',function(e){
       e.preventDefault();
    
       var page_num= this.id;
       window.open("index.php?page=" + page_num, "_self");
      
    });

    $(".action .fa-eye").on('click', function(){

          window.open("view_news_article.php?id=" + this.id, "_self");
    });
    $(".action .fa-edit").on('click', function(){
      
          window.open("edit_news_article.php?id=" + this.id, "_self");
    });
