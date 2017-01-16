<div class="row">
    <div class="col-md-12">
        <!-- Log in form -->
        <form action="/resources/lib/login.php" class="margin-bottom" method="POST">
        	<div class="form-group">
        		<label for="username"></label>
        		<input type="text" name="username" id="username" class="form-control" placeholder="Email or username">
        	</div>
        	<div class="form-group">
        		<label for="id"></label>
        		<input type="password" name="password" id="password" class="form-control" placeholder="Password">
        	</div>
        	<button type="submit" class="login btn-accent white btn btn-danger">Log in</button>
        </form>
    </div>

    <div class="col-md-12">
        <!-- Register form -->
        <form action="/resources/lib/register.php" method="POST">
            <div class="form-group">
                <label for="fullname"></label>
                <input type="text" name="fullname" id= "fullname" class="form-control" placeholder="Full Name">
            </div>
            <div class="form-group">
                <label for="usernameRegister"></label>
                 <input type="text" name="username" class="form-control" id="usernameRegister" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="email"></label>
                 <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="passwordRegister"></label>
                <input type="password" name="password" class="form-control" id="passwordRegister" placeholder="Password">
            </div>
           <button type="submit" class="register btn-accent btn-danger btn white">Register for Linkify</button>
        </form>
    </div>

</div>
