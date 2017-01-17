<?php
foreach($posts as $post) {
    $postContent = $post["content"];
    $postTitle = $post["title"];
    $postPublished = $post["published"];
    $postUsername = $post["username"];
    $postAvatar = $post["avatar"];
    $uid = $post["uid"];
    $postid = $post["postid"];
    $postLink = $post["link"];
 ?>
 <div class="container">
     <div class="row vertical-align">
         <!-- Avatar-->
         <div class="col-md-4">
             <img src="/resources/img/users/<?php echo $uid ?>/<?php echo $postAvatar; ?>" style="width: 100%; height: 100%;" alt="user avatar">

         </div>
         <div class="col-md-8">
             <div class="row">
                 <!-- Post title -->
                 <div class="col-md-12">
                     <h4><?= $postTitle; ?></h4><br>
                 </div>
                 <!-- Post link -->
                 <div class="col-md-12 padding-bottom">
                     <a href="#"><?= $postLink; ?></a>
                 </div>
                 <!-- Link description  -->
                 <div class="col-md-12 padding-bottom">
                     <p><?= $postContent; ?></p>
                 </div>

                 <!-- Like and unlike counters -->
                 <?php
                 $likesNumber = dbGet($connection, "SELECT COUNT(id) AS likes FROM likes WHERE postid = '$postid'");
                           $unlikesNumber = dbGet($connection, "SELECT COUNT(id) AS likes FROM unlikes WHERE postid = '$postid'");
                  ?>

                  <!--Like and dislike counters output -->
                 <div class="col-md-12 padding-bottom">
                     <div class="row">
                         <div class="col-md-12">
                             <p><?php echo $likesNumber[0]['likes']?> people like this</p>
           <p><?php echo $unlikesNumber[0]['likes']?> people dislike this</p>
                         </div>

                     </div>
                 </div>

             </div>

         </div>
     </div>

     <div class="row margin-top">

       <div class="col-md-8">
           <!-- Edit post -->
           <form method="POST" action="/resources/lib/editPost.php">
             <fieldset>
                 <legend>Edit your post here</legend>
             <div class="form-group">
               <input type="hidden" name="editAction" value="editPost">
               <input type="hidden" name="urlid" value="<?= $postid?>">
             </div>
             <div class="form-group">
               <label for="newTitle"></label>
               <input type="text" name="newTitle" value= "<?= $postTitle?>" id="newTitle" class="form-control">
             </div>
             <div class="form-group">
                <label for="newLink"></label>
                <textarea name="newLink" placeholder="<?= $postLink?>" id="newLink" class="form-control"></textarea>
             </div>
             <div class="form-group">
               <label for=""></label>
               <textarea name="newContent" placeholder="<?= $postContent?>" id="newContent" class="form-control"></textarea>
             </div>
              <button class="btn btn-accent btn-danger white" type="submit">Edit</button>
            </fieldset>
           </form>
       </div>

       <div class="col-md-4">
           <!-- Delete post -->
           <form method="POST" action="/resources/lib/deletePost.php">
             <fieldset>
                 <legend>Delete your post here</legend>
             <div class="form-group">
               <input type="hidden" name="deleteAction" value="deletePost">
               <input type="hidden" name="idPost" value="<?= $postid ?>">
             </div>
              <button class="btn btn-accent btn-danger white" type="submit">Delete</button>
            </fieldset>
           </form>
       </div>

     </div>

 </div>


 <?php
 }
 ?>
