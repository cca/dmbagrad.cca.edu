<div class="container">

  <form class="form-signin col-md-4 col-md-offset-4" method='post'>
    <h2 class="form-signin-heading">Please sign in</h2>
     <?php if ($message): ?>
        <h4 style='color: <?= $message['status'] == 'ok' ? 'green' : 'red' ?>;'><?= $message['body'] ?></h4>    
      <?php endif ?>  
    <label for="inputEmail" class="sr-only">Username</label>
    <input type="text" id="inputEmail" class="form-control" placeholder="Username" name='username' required autofocus>
    <br>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" name='password' placeholder="Password" required>
    <br>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  </form>

</div> <!-- /container -->