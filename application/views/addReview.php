<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add Book and Review</title>
 <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-       theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
</head>
    
<body>
    <div class = "container">
        <div class="row">
            <div class="col-md-8">
                <u><a href="/books">Home</a></u></br>
            </div>
            <div class="col-md-4">
                <u><a href="/logout">Logout</a></u>
        </div></br>
    <h2>Add a New Book Title and a Review</h2>
    <form action="/books/add_book_review" class="form-group" method="post">
        <label>Book Title:</label>
        <input type="text" name="book_title"></input></br>
        <label>Author:</label></br>
        <label>Choose from the list: </label>
            <select name="author_list">
                <option></option>
                <?php foreach ($displayAuthors as $displayAuthor) { ?>
			     <option value = "<?= $displayAuthor['id'] ?>"> <?= $displayAuthor['author_name']?> </option>
			   				<?php } ?>
        </select></br>
        <label>Or add a new author:</label>
        <input type="text" name="newAuthor"></input></br>
        <label>Review:</label>
        <input type="text" name="book_review"></input></br>
        <label>Rating:</label>
        <select name = 'rating'>
            <option value = 1>1 </option>
            <option value = 2>2 </option>
            <option value = 3>3 </option>
            <option value = 4>4 </option>
            <option value = 5>5 </option>
        </select></br></br>
        <button type = 'submit' class= "btn btn-success" role='button'>Add Book and Review</button>
    </form>	
    </div>
	<!-- VALIDATION AUTHOR ERROR -->
    <?php echo $this->session->flashdata("author_error"); ?></br>
    <?php echo $this->session->flashdata("review_error"); ?>
</body>
</html>