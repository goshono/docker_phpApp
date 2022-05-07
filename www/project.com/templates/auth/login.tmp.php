<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta charset="viewport"
        content="width=divice-width, user-scalable=no, initial-scale=1.0, maximum=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<?php if(empty($error) === false){ $escape($error); } ?>

<form action="/auth/login" method="POST">
  <ul>
    <li>
      <label>
        User Name:
        <input type="text" name="name">
      </label>
    </li>
    <li>
      <label>
        Password:
        <input type="text" name="password">
      </label>
    </li>
  </ul>

  <input type="submit" value="Login">
</form>
</body>
</html>