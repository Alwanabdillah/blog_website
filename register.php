<?php
require_once __DIR__ . '/../model/users.php';

$Users = new Users();
if (isset($_POST['submit'])) {
  $datas = [
    "post" => $_POST,
    "files" => $_FILES

  ];

  $result = $Users->register($datas);
  if (gettype($result)  == 'string') {
    echo "<script>alert('{$result}');
        window.location.href = 'register.php';
        </script>";
  } else {
    echo "<script>
        alert('Register akun berhasil');
        window.location.href = './../login.php';
        </script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen">
  <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
    <h2 class="text-2xl font-bold text-center text-gray-700">Create Account</h2>
    <form method="post" action="" class="mt-6 space-y-4 needs-validation" enctype="multipart/form-data" novalidate="">
      <!-- Full Name -->
      <div>
        <label for="full_name" class="block text-sm font-medium text-gray-600">Full Name</label>
        <input type="text" id="full_name" name="full_name" placeholder="John Doe" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300">
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
        <input type="email" id="email" name="email" placeholder="example@domain.com" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300">
      </div>

      <!-- Gender -->
      <div>
        <label for="gender" class="block text-sm font-medium text-gray-600">Gender</label>
        <select id="gender" name="gender" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300">
          <option value="">Select Gender</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
      </div>

      <!-- Phone Number -->
      <div>
        <label for="phone" class="block text-sm font-medium text-gray-600">Phone Number</label>
        <input type="text" id="phone" name="phone" placeholder="+123456789" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300">
      </div>

      <!-- Avatar -->
      <div>
        <label for="avatar" class="block text-sm font-medium text-gray-600">Choose file</label>
        <input type="file" name="avatar" id="avatar" class="block w-full mt-2 px-4 py-1.5 border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
      file:bg-gray-50 file:border-0
      file:me-4
      file:py-2 file:px-4">
      </div>

      <!-- Bio -->
      <div>
        <label for="bio" class="block text-sm font-medium text-gray-600">Bio</label>
        <textarea id="bio" name="bio" placeholder="Tell us a little about yourself..." class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"></textarea>
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
        <input type="password" id="password" name="password" placeholder="********" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300">
      </div>

      <!-- Confirm Password -->
      <div>
        <label for="confirm_password" class="block text-sm font-medium text-gray-600">Confirm Password</label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="********" class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300">
      </div>

      <!-- Submit Button -->
      <button type="submit" name="submit" class="w-full mt-4 py-2 bg-blue-500 text-white font-bold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">
        Register
      </button>
    </form>
  </div>
</body>

</html>