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
        $description = $news['description'] ? $news['description'] : '';
        $content = $news['content'] ? $news['content'] : '';
        $author = $news['author'] ? $news['author'] : '';
        $id =  $news['id'];
      }


?>
  <head>
    <title>News Articles</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width', initial-scale=1>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
     <link rel="stylesheet" href="assets/css/add_edit.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg bg-light sticky-top">
        <a class="navbar-brand" href="#">News Articles</a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</span></a>
            </li>
        </ul>
    </nav>
  
    <div class="container"> 
      <div id='alert-message'>
      </div>
    
      <form  id="updateArticle" action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="title">Title:</label>
          <input type="text" class="form-control" id="id" name="id" value="<?php echo $id ?>" hidden>
          <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required value="<?php echo $title ?>">
        </div>
        <div class="form-group">
          <label for="description">Description:</label>
          <textarea class="form-control" id="description" name="description" rows="1" required ><?php echo $description ?></textarea>
        </div>
        <div class="form-group">
          <label for="content">Content:</label>
          <textarea class="form-control" id="content" name="content" rows="2" required ><?php echo $content ?></textarea>
        </div>
        <div class="form-group">author
          <label for="author">Author:</label>
          <input type="text" class="form-control" id="author" name="author" placeholder="Enter author name"  value="<?php echo $author ?>">
        </div>
        <div class="form-group">
          <label for="image">Image:</label>
          <input type="file" class="form-control-file" name="image" id="image">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Update</button>          
        </div>
      </form>
    </div>
    <div class="footer bg-light text-center">
      <p>Footer</p>
    </div>
  </body>

  
  <script src="assets/js/edit_news_article.js"></script>
  

</html>