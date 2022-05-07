<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=divice-width, user-scalable=no, initila-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">        
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  User: <?php $escape($user->name) ?>
  <a href="/auth/logout">Logout</a>
</body>
</html>