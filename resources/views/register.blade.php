<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="form-container">
        <h1>Register form</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="profile_img" id="">
            <input type="text" name="username" id="">
            <input type="text" name="email" id="">
            <input type="password" name="password">
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>