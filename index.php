<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login with Regex PHP</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
<style>
  body {
    font-family: MonoLisa, Fira Code;    /* coding font*/
    background-color: #f0f0f0;
    margin-top: 120px;
  }
  .container {
    max-width: 400px;
    margin-top: 100px;
    margin: 50px auto;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 20px 20px 60px #bebebe, 
                -20px -20px 60px #ffffff;
  }
  input[type="text"],
  input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: none;
    border-radius: 8px;
    background-color: #e0e0e0;
    box-shadow: 5px 5px 15px #bebebe, 
                -5px -5px 15px #ffffff;
  }
  .password-toggle-btn {
    position: relative;
    float: right;
    top: -33px;
    right: 10px;
    cursor: pointer;
    color: #777;
    font-size: 0.9em;
  }
  .password-toggle-btn:hover {
    color: #555;
  }
  input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
    box-shadow: 5px 5px 15px #bebebe, 
                -5px -5px 15px #ffffff;
  }
  input[type="submit"]:hover {
    background-color: #45a049;
    transform: translateY(-3px);
  }
  .error {
    color: red;
    font-size: 0.8em;
    margin-top: 5px;
  }
</style>
</head>
<body>
<div class="container">
  <h2 class="mb-4 text-center">Login Form</h2>
  <form id="loginForm" action="" method="post" onsubmit="return validateForm()">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" id="email" name="email" class="form-control" required>
      <div id="emailError" class="error"><?php echo $emailError ?? ''; ?></div>
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <div style="position:relative;">
        <input type="password" id="password" name="password" class="form-control" required>
        <span class="password-toggle-btn" onclick="togglePassword()">Show</span>
      </div>
      <div id="passwordError" class="error"><?php echo $passwordError ?? ''; ?></div>
    </div>
    <input type="submit" value="Login" class="btn btn-primary">
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
/* Function to validate form inputs */
function validateForm() {
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  var passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.*[a-zA-Z]).{8,}$/;
  
  var emailValid = emailPattern.test(email);
  var passwordValid = passwordPattern.test(password);
  
  if (!emailValid) {
    Swal.fire({
      icon: 'error',
      title: 'Invalid email format',
      text: 'Please enter a valid email address.'
    });
    return false;
  }
  
  if (!passwordValid) {
    Swal.fire({
      icon: 'error',
      title: 'Invalid password format',
      text: 'Please make sure your password meets the criteria.'
    });
    return false;
  }
  
  Swal.fire({
    icon: 'success',
    title: 'Login successful',
    text: 'You have successfully logged in.'
  });
  
  return true;
}

/* Function to toggle password visibility */
function togglePassword() {
  var passwordInput = document.getElementById("password");
  var passwordToggleBtn = document.querySelector(".password-toggle-btn");
  
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    passwordToggleBtn.textContent = "Hide";
  } else {
    passwordInput.type = "password";
    passwordToggleBtn.textContent = "Show";
  }
}
</script>
</body>
</html>
