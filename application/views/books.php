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
    <h2>Welcome, <?php echo $this->session->userdata('first_name'); ?>!</h2>
        <div class="row">
            <div class="col-md-8">
                <u><a href="/books/add">Add Book and Review</a></u></br>
            </div>
            <div class="col-md-4">
                <u><a href="/logout">Logout</a></u>
            </div>
    </div>
    </div></br></br>
    
<div class="container">
<div class="row">
    <div class="col-md-8">
        <u><h4>Recent Book Reviews</h4></u></br>
            <?php $number_output = 0 ?>
				<?php foreach($topReviews as $topReview)  { ;
					$number_output++;
				if($number_output > 3) break; ?>
                <h5><u><a href="/books/addReview2/<?= $topReview['book_id']; ?>"><?php echo ucfirst($topReview['book_title']);?></a></u></h5>
					<p>Rating <?php 
						$x = $topReview['rating'];
						for ($i = 0; $i < $x; $i++)
						{ ?>
							<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						<? } ?> </p>
                 <h5><u><a href="/books/user_review/<?= $topReview['user_id']; ?>"><?= ucfirst($topReview['alias']); ?></a></u> says: <?= $topReview['review']; ?></h5>
    <h6>Posted on <?= date('M j, Y', strtotime($topReview['created_at'])); ?>
       </br></br><?php } ?>
    
    </div>
    <div class="col-md-4">
      <h4>Other Books with Reviews</h4>
        <div style="height:300px;width:200px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
            <?php for($i = 3; $i < count($otherBooks); $i++) { ?>
              <u><a href="/reviews/one_review/<?= $otherBooks[$i]['id']; ?>"><?php echo ucfirst($otherBooks[$i]['book_title']);?></a></u></br>
          <?php } ?>
        </div>
    </div>
  </div>
</body>
</html>