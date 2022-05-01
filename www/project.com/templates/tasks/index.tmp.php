<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta neme="viewport" 
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  </head>
  <a href="/tasks/create">Add</a>
  <body>
    <h1>Tasks</h1>  
    <?php foreach ($tasks as $task) {?>
      <ul>
        <li>
          <a href="/tasks/<?php $escape($task->id) ?>">
            <?php $escape($task->title) ?> : <?php $escape($task->status) ?>
          </a>
        </li>
      </ul>
    <?php } ?>
  </body>
</html>