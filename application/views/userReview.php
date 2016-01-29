<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>User Reviews</title>
 <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-       theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <u><a href="/books">Home</a></u></br>
            </div>
            <div class="col-md-4">
                <u><a href="/books/add">Add Book and Review</a></u></br>
            </div>
            <div class="col-md-4">
                <u><a href="/logout">Logout</a></u>
            </div>
        </div>
<?php foreach ($userInfo as $user) { ?> <?php } ?>
    <h3>User Alias: <?= ucfirst($user['alias']); ?></h3> 
    <h5>Name: <?= ucfirst($user['first_name']);?> <?= ucfirst($user['last_name']);?></h5>
    <h5>Email: <?= ucfirst($user['email']); ?></h5>
    <h5>Total Reviews: <?= implode($count);?></h5></br>

<h4>Posted Reviews on the following books: </h4>
  <?php foreach($userInfo as $user) { ?>
     <u><a href="/books/addReview2/<?= $user['book_id'];?>"><?= ucfirst($user['book_title']);?></a></u></br>
    <?php } ?>


</body>
</html>