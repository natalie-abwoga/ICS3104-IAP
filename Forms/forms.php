<?php
class forms {
    public function signupForm() {
?>
<div class="d-flex justify-content-center align-items-center vh-100">
  <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
    <h1 class="text-center mb-4">Sign Up</h1>
    <form method="POST" action="Plugins/PHPMailer/mail.php" onsubmit="return validateSignupForm();">
      <div class="mb-3">
        <label for="exampleInputName1" class="form-label">Name</label>
        <input type="text" class="form-control" id="exampleInputName1" name="name" required minlength="3">
        <div class="invalid-feedback">Please enter at least 3 characters.</div>
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" required>
        <div class="invalid-feedback">Please enter a valid email address.</div>
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password" required minlength="6">
        <div class="invalid-feedback">Password must be at least 6 characters.</div>
      </div>

      <?php $this->submit_button("Sign Up", "signup"); ?>
      <div class="mt-3 text-center">
          <a href="signin.php">Already have an account? Log in</a>
      </div>
    </form>
  </div>
</div>
<?php
    }

    public function loginForm() {
?>
<div class="d-flex justify-content-center align-items-center vh-100">
  <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
    <h1 class="text-center mb-4">Sign In</h1>
    <form method="POST" action="signin_process.php" onsubmit="return validateLoginForm();">
      <div class="mb-3">
        <label for="signinEmail" class="form-label">Email address</label>
        <input type="email" class="form-control" id="signinEmail" name="email" required>
        <div class="invalid-feedback">Please enter a valid email address.</div>
      </div>

      <div class="mb-3">
        <label for="signinPassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="signinPassword" name="password" required minlength="6">
        <div class="invalid-feedback">Password must be at least 6 characters.</div>
        <div class="mt-1">
            <a href="signin.php?action=forgot">Forgot your password?</a>
        </div>
      </div>

      <?php $this->submit_button("Sign In", "signin"); ?>

      <div class="mt-3 text-center">
          <a href="signup.php">Don't have an account? Sign up</a>
      </div>
    </form>
  </div>
</div>
<?php
    }

    public function forgotPasswordForm() {
?>
<div class="d-flex justify-content-center align-items-center vh-100">
  <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
    <h1 class="text-center mb-4">Forgot Password</h1>
    <form method="POST" action="forgot_process.php">
      <div class="mb-3">
        <label for="forgotEmail" class="form-label">Enter your email</label>
        <input type="email" class="form-control" id="forgotEmail" name="email" required>
      </div>
      <?php $this->submit_button("Send Code", "forgot"); ?>
    </form>
  </div>
</div>
<?php
    }

    public function verifyCodeForm() {
?>
<div class="d-flex justify-content-center align-items-center vh-100">
  <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
    <h1 class="text-center mb-4">Verify Code</h1>
    <form method="POST" action="verify_code.php">
      <div class="mb-3">
        <label for="resetCode" class="form-label">Enter the code sent to your email</label>
        <input type="text" class="form-control" id="resetCode" name="code" required>
      </div>
      <?php $this->submit_button("Verify Code", "verify"); ?>
    </form>
  </div>
</div>
<?php
    }

    public function resetPasswordForm() {
?>
<div class="d-flex justify-content-center align-items-center vh-100">
  <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
    <h1 class="text-center mb-4">Reset Password</h1>
    <form method="POST" action="reset_password.php">
      <div class="mb-3">
        <label for="newPassword" class="form-label">New Password</label>
        <input type="password" class="form-control" id="newPassword" name="password" required minlength="6">
        <div class="invalid-feedback">Password must be at least 6 characters.</div>
      </div>
      <?php $this->submit_button("Update Password", "reset"); ?>
    </form>
  </div>
</div>
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
}
?>

<!-- JavaScript Validation -->
<script>
function validateSignupForm() {
    let name = document.getElementById("exampleInputName1").value.trim();
    let email = document.getElementById("exampleInputEmail1").value.trim();
    let password = document.getElementById("exampleInputPassword1").value.trim();

    if (name.length < 3) {
        alert("Name must be at least 3 characters.");
        return false;
    }
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        alert("Invalid email format.");
        return false;
    }
    if (password.length < 6) {
        alert("Password must be at least 6 characters.");
        return false;
    }
    return true;
}

function validateLoginForm() {
    let email = document.getElementById("signinEmail").value.trim();
    let password = document.getElementById("signinPassword").value.trim();

    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        alert("Invalid email format.");
        return false;
    }
    if (password.length < 6) {
        alert("Password must be at least 6 characters.");
        return false;
    }
    return true;
}
</script>








