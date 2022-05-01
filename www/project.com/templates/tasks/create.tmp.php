<!DOCTYPE html>
<html lang=en>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initila-scale=1.0, maximumn-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  </head>
  <body>
    <form action="/tasks/" method="POST">
      <ul>
        <li>
          <label>
            Title:
            <input type="text" name="title">
          </label>
        </li>
        <li>
          <label>
            Status:
            <input type="text" name="status">
          </label>
        </li>
      </ul>

      <input type="submit" value="Add">
    </form>
  </body>
</html>