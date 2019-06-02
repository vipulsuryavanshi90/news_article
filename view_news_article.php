<!DOCTYPE html>
<html>

<?php

     require "config/connect.php";
  
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
      $article_id = $_GET['id'];
      $get_article = $conn->query("SELECT * FROM `article` where `id` = $article_id");    
      $article= array();
        while($row = mysqli_fetch_assoc($get_article)){
          array_push($article , $row);
        }
      }
      foreach($article as $news){
        $title = $news['title'] ? $news['title'] : '';
        $content = $news['content'] ? $news['content'] : '';
        $author = $news['author'] ? $news['author'] : '';
        $id =  $news['id'];
        $img = $news['image'];
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

        <div class="articles row">
          <div class="col-7">
            <div class="article-title">
              <h4><?php echo $title ?></h4>
            </div>
            <div class="article-detail">
             <?php echo $content ?>
            </div>
          </div>
          <div class="col-3 article-img article-img">
           <?php  if($img != null){ ?>
            <img src="assets/img/<?php echo $img ?>">
           <?php } ?>
          </div>
          <div class="col-2 action">
            <button class="fa btn fa-btn btn-danger"  id="<?php echo $id ?>">Edit</button>
          </div>
        </div>
    </div>
    <div class="footer bg-light text-center">
      <p>Footer</p>
    </div>
  </body>

 <script src="assets/js/view_news_article.js"></script>
</html>