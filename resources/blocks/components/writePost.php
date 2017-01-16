<!-- Form for  new posts -->
<form method="POST" action="/resources/lib/makePost.php">
    <div class="form-group">
        <input type="hidden" name="postAction" class="form-control" value="createPost">
    </div>
    <div class="form-group">
        <label for="title"></label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Add title">
    </div>
    <div class="form-group">
       <label for="link"></label>
       <textarea name="link" id="link" class="form-control" placeholder="Add your link here"></textarea>
    </div>
    <div class="form-group">
       <label for="content"></label>
       <textarea name="content"  id="content" class="form-control" placeholder="Add your text here"></textarea>
    </div>
   <button type="submit" class="btn btn-accent white btn-danger">Make a post</button>
</form>
