<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Books Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel = "stylesheet" type= "text/css" href = "/assets/css/bootstrap.css"/>
</head>
<body>
<div class = "main">
<div class="container">
    <div class="row">
        <div class="row">
            <div class="col-md-4">
                <u><a href="/books">Home</a></u></br>
            </div>
            <div class="col-md-4">
                <u><a href="/books/add">Add Another Book and Review</a></u></br>
            </div>
            <div class="col-md-4">
                <u><a href="/logout">Logout</a></u>
        </div></br>
</div>
</div></br></br>

<div class="page-header">
<h3><?= ucfirst($bookInfo['book_title']); ?></h3>
<h4><?= ucfirst($author_name['author_name']); ?></h4>
</div>

<div class="container">
<div class="row">
    <div class="col-md-8">
        <u><h4>Review</h4></br></u>
<?php 
date_default_timezone_set("America/Los_Angeles");?>
    
          <?php foreach ($reviewInfo as $review) { ?>
          <h5> Rating: <?php 
						$x = $review['rating'];
						for ($i = 0; $i < $x; $i++)
						{ ?>
							<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
              <? } ?></h5>
    <h5><u><a href="/books/user_review/<?= $review['user_id']; ?>"</a><?= ucfirst($review['alias']); ?></a></u> says: <?= $review['review']; ?>.</h5>
        <h6>Posted on <?= date('M j, Y', strtotime($review['created_at'])); ?> at <?= date('h:i:s A', strtotime($review['created_at'])); ?></h6>
<?php if($review['user_id'] === $this->session->userdata['id']){
//                <!--delete user review or its review-->
?> <a href = "/delete/<?= $review['id']; ?>">Delete this Review</a></br><?php 	
        } 
    ?>

<?php } ?>
    </div>
<!--//======================ADD A REVIEW=================================================//-->
    <div class="col-md-4">
    <h4>Add a Review:</h4>
        <form action = "/books/add_quick_review/<?= $review['book_id']; ?>" method="post">
            <input type="text" class="form-control" id="add_review" name = "add_review" value = ''>
            <label>Rating:</label>
            <select name = 'rating'>
                <option value = 1>1 </option>
                <option value = 2>2 </option>
                <option value = 3>3 </option>
                <option value = 4>4 </option>
                <option value = 5>5 </option>
            </select></br></br>
            <input type="submit" value="Submit Review"></input></br>
        </form>
    </div>
  </div>
</body>
</html>