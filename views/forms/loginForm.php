

<br><br><br>
<div class="row justify-content-md-center">
    
    <div class="col-md-8">
        <form action="login.php" method="POST">
            <div class="card">
            <article class="card-body">

            <h4 class="card-title mb-4 mt-1">Sign in</h4>
                 <form>
                <div class="form-group">
                    <label>Your email</label>
                    <input name="username" class="form-control" placeholder="Email" type="email" value="<?= $username; ?>" required>
                </div>
                <div class="form-group">
                   
                    <label>Your password</label>
                    <input name="password"class="form-control" placeholder="******" type="password" required>
                </div>
                <div class="form-group"> 
                <div class="checkbox">
                  <label> <input type="checkbox"> Save password </label>

                </div>
                </div>  
                <div class="form-group">
                    <button type="submit" name="submit-login" class="btn btn-primary btn-block"> Login  </button>
                </div>

                <?php
                if(!empty($run->msg)){
                ?>
                    <div class="alert alert-danger" role="alert">
                        <b><center><?php echo $run->msg; ?></center></b>
                        
                    </div>
                <?php
                }
                ?>
            </form>
            </article>
            </div> 
         </form>
    </div>
   
</div>