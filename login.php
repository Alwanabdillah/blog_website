<?php
require_once __DIR__ . "/../model/model.php";
require_once __DIR__ . "/../model/users.php";


$User = new Users();
if (isset($_POST['submit'])) {
  $result = $User->login($_POST['email'], $_POST['password']);
  if (gettype($result) == 'string') {
    echo "<script>
        alert('{$result}');
        </script>";
  } else {
    echo "<script>
        alert('Login Berhasil');
        window.location.href = './../pages/index.php';
        </script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen">
  <div class="w-full max-w-sm bg-white rounded-lg shadow-lg p-8">
    <h2 class="text-2xl font-bold text-center text-gray-700">Welcome Back</h2>
    <form method="post" action="" class="space-y-4 mt-6" enctype="multipart/form-data" novalidate="">
      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
        <input type="email" id="email" name="email" placeholder="example@domain.com" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300">
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
        <input type="password" id="password" name="password" placeholder="********" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300">
      </div>

      <!-- Submit Button -->
      <button type="submit" name="submit" class="w-full mt-4 py-2 bg-blue-500 text-white font-bold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">
        Login
      </button>

      <!-- Additional Links -->
      <p class="text-sm text-gray-600 text-center mt-4">
        Don't have an account? <a href="register.php" class="text-blue-500 hover:underline">Sign up</a>
      </p>
    </form>
  </div>
</body>

</html>