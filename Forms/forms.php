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
  <div class="mt-3 text-center">
      <a href="signin.php">Already have an account? Log in</a>
  </div>
</form>
<?php
    }

    private function submit_button($value, $name) {
        ?>
        <div class="d-flex justify-content-center mt-3">
            <button type="submit" class="btn btn-primary" name="<?php echo $name; ?>" value="<?php echo $value; ?>">
                <?php echo $value; ?>
            </button>
        </div>
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
    <div class="mt-1">
        <a href="signin.php?action=forgot">Forgot your password?</a>
    </div>
  </div>

  <?php $this->submit_button("Sign In", "signin"); ?>
  
  <div class="mt-3 text-center">
      <a href="signup.php">Don't have an account? Sign up</a>
  </div>
</form>
<?php
    }

    public function forgotPasswordForm() {
?>
<h1>Forgot Password</h1>
<form method="POST" action="forgot_process.php">
  <div class="mb-3">
    <label for="forgotEmail" class="form-label">Enter your email</label>
    <input type="email" class="form-control" id="forgotEmail" name="email" required>
  </div>
  <?php $this->submit_button("Send Code", "forgot"); ?>
</form>
<?php
}

public function verifyCodeForm() {
?>
<h1>Verify Code</h1>
<form method="POST" action="verify_code.php">
  <div class="mb-3">
    <label for="resetCode" class="form-label">Enter the code sent to your email</label>
    <input type="text" class="form-control" id="resetCode" name="code" required>
  </div>
  <?php $this->submit_button("Verify Code", "verify"); ?>
</form>
<?php
}

public function resetPasswordForm() {
?>
<h1>Reset Password</h1>
<form method="POST" action="reset_password.php">
  <div class="mb-3">
    <label for="newPassword" class="form-label">New Password</label>
    <input type="password" class="form-control" id="newPassword" name="password" required>
  </div>
  <?php $this->submit_button("Update Password", "reset"); ?>
</form>
<?php
}



}
?>






