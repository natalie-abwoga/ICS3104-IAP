<?php
class forms {
    public function signupForm() {
?>
<h1>Sign Up</h1>
<form method="POST" action="Plugins/PHPMailer/mail.php">
  <div class="mb-3">
    <label for="exampleInputName1" class="form-label">Name</label>
    <input type="text" class="form-control" id="exampleInputName1" name="name" required>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" required>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
  </div>

  <?php $this->submit_button("Sign Up", "signup"); ?>
  <a href="signin.php">Already have an account? Log in</a>
</form>
<?php
    }

    private function submit_button($value, $name) {
        ?>
        <button type="submit" class="btn btn-primary" name="<?php echo $name; ?>" value="<?php echo $value; ?>">
            <?php echo $value; ?>
        </button>
        <?php
    }

    public function loginForm() {
        ?>
<h1>Sign In</h1>
<form method="POST" action="signin_process.php">
  <div class="mb-3">
    <label for="signinEmail" class="form-label">Email address</label>
    <input type="email" class="form-control" id="signinEmail" name="email" required>
  </div>

  <div class="mb-3">
    <label for="signinPassword" class="form-label">Password</label>
    <input type="password" class="form-control" id="signinPassword" name="password" required>
  </div>

  <?php $this->submit_button("Sign In", "signin"); ?>
  <a href="signup.php">Don't have an account? Sign up</a>
</form>
<?php
    }
}
?>




