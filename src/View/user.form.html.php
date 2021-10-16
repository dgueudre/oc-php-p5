<form method="POST" action="?module=User&action=<?= empty($user) ? 'insert' : 'update' ?>">
  <input type="hidden" name="id" value="<?= $user->id ?? '' ?>" />
  <div class="mb-3">
    <label for="login" class="form-label">Login</label>
    <input type="text" class="form-control" id="login" name="login" value="<?= $user->login ?? '' ?>">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" value="<?= $user->password ?? '' ?>">
  </div>
  <div class="mb-3">
    <label for="mail" class="form-label">Email address</label>
    <input type="email" class="form-control" id="mail" name="mail" value="<?= $user->mail ?? '' ?>" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>