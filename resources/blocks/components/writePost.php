<!-- Form for  new posts -->
<form method="POST" action="/resources/lib/makePost.php">
	<input type="hidden" name="postAction" value="createPost">
	<input type="text" name="title" placeholder="Add title">
	<textarea name="link" placeholder="Add your link here"></textarea>
   <textarea name="content" placeholder="Add your text here"></textarea>
   <button type="submit">Post</button>
</form>
