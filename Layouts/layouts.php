<?php
class layouts {
    public function header($conf) {
        ?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="ICS C Community">
      <title>ICS C Community</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
   </head>
   <body>
      <main>
         <div class="container py-4">
        <?php
    }

    public function nav($conf) {
    ?>
     <nav class="navbar navbar-expand-lg" style="background-color:#001f3f;" aria-label="Main navbar">
        <div class="container-fluid">
           <a class="navbar-brand text-white" href="#">ICS C Community</a> 
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
              data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" 
              aria-expanded="false" aria-label="Toggle navigation"> 
              <span class="navbar-toggler-icon"></span> 
           </button> 
           <div class="collapse navbar-collapse" id="navbarsExample05">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                 <li class="nav-item"> <a class="nav-link text-white" aria-current="page" href="./">Home</a> </li>
                 <li class="nav-item"> <a class="nav-link text-white" href="signup.php">Sign Up</a> </li>
                 <li class="nav-item"> <a class="nav-link text-white" href="signin.php">Sign In</a> </li>
              </ul>
           </div>
        </div>
     </nav>
    <?php
}


    public function banner($conf) {
        ?>
            <div class="p-4 mb-4 bg-primary text-white rounded-3 text-center">
               <h1 class="display-5 fw-bold">Welcome to the ICS C Community</h1>
               <p class="fs-5">Wishing you a successful and fulfilling semester ahead!</p>
            </div>
        <?php
    }

    public function form_content($conf, $ObjForm) {
        ?>
            <div class="row justify-content-center">
               <div class="col-md-6">
                  <div class="p-4 bg-light border rounded-3 shadow-sm">
<?php 
if($_SERVER['PHP_SELF'] == '/nol/signup.php') {
    $ObjForm->signupForm(); 
} elseif($_SERVER['PHP_SELF'] == '/nol/signin.php') {
    $ObjForm->loginForm(); 
} 
?>
                  </div>
               </div>
            </div>
        <?php
    }

    public function footer($conf) {
        ?>
            <footer class="pt-3 mt-4 text-body-secondary border-top text-center">
              <p>Copyright &copy; <?php echo date("Y"); ?> <?php print $conf['site_name']; ?> - All Rights Reserved</p> 
            </footer>
         </div>
      </main>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
   </body>
</html>
        <?php
    }
}
