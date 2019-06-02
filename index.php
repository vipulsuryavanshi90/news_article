<!DOCTYPE html>
<html>

<?php
  require "config/connect.php";
  
    if(isset($_GET['page']) && is_numeric($_GET['page'])){
      $page_number = $_GET['page'];
      }else{
      $page_number =1;
    }
    $records_per_page = 5;
    
    $offset = $records_per_page * ($page_number-1);
    

        $get_count = $conn->query("SELECT COUNT(*) FROM `article`");
        $total_records  = mysqli_fetch_array($get_count);
    
        $total_pages = ceil($total_records[0]/$records_per_page);
    
    $get_articles = $conn->query("SELECT * FROM `article` LIMIT " . $offset. " , ".$records_per_page);    
    
    $articles= array();
    while($row = mysqli_fetch_assoc($get_articles)){
      array_push($articles , $row);
    }
      
   
  
?>

  <head>
    <title>News Articles</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width', initial-scale=1>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg  bg-light sticky-top">
        <a class="navbar-brand" href="#">News Articles</a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home</span></a>
            </li>

        </ul>
        <ul class="navbar-nav">    
            <li class="nav-item">
                <a class="nav-link btn btn-primary" href="add_news_article.html">New Article +</a>
            </li>
        </ul>
    </nav>
  
    <div class="container"> 
      <?php foreach($articles as $row) { ?>
      <div>
        <div class="articles row">
          <div class="col-7">
            <div class="article-title">
              <h4><?php echo $row['title'] ?></h4>
            </div>
            <div class="article-detail">
             <?php echo $row['description'] ?>
            </div>
            <div style="margin-top:100px; color: #888888">
              <span><span>Published BY: </span><?php echo $row['author'] ?></span>
            </div>
          </div>
          <div class="col-3 article-img article-img">
           <?php  if($row['image'] != null){ ?>
            <img src="assets/img/<?php echo $row['image'] ?>">
           <?php } ?>
          </div>
          <div class="col-2 action">
            <span class="fa fa-eye" aria-hidden="true" id="<?php echo $row['id'] ?>"></span>
            <span class="fa fa-edit" aria-hidden="true" id="<?php echo $row['id'] ?>"></span>
          </div>
        </div>
        <hr>
      </div>
      <?php }?>
    <div>
        <ul class="pagination justify-content-center">
          <ul class='pagination' id="pagination">
            <?php if(!empty($total_pages)){
              for($i=1; $i<=$total_pages; $i++){
              
              if($i == 1){
            ?>
              <li class='page-item active'  id="<?php echo $i;?>"><a href='index.php?page=<?php echo $i;?>' class="page-link"><?php echo $i;?></a></li> 
          <?php } else{ ?>
              <li class="page-item" id="<?php echo $i;?>" ><a href='index.php?page=<?php echo $i;?>' class="page-link"><?php echo $i;?></a></li>
         <?php }}}?> 
        </ul>
        </ul>
      </div>
      <hr>
    </div>
    <div class="footer bg-light text-center">
      <p>Footer</p>
    </div>
  </body>
  <script src="assets/js/index.js"></script>

</html>