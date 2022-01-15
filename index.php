<?php require 'db_conn.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do_list</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main-section">
        <div class="add-section">
            <form action="">
                <input type="text" 
                       name="title" 
                       placeholder="This field is required" />
                <button type="submit">Add &nbsp; <span>&#43;</span></button>
            </form>
        </div>
        <?php 
            $todos = $conn->query("SELECT * FROM todos ORDER BY id DESC");
        ?>
        <div class="show-todo-section">
            <?php if($todos->rowCount() <= 0) { ?>
                <div class="todo-item">
                    <div class="empty">
                        <img src="img/f.png" width=100% />
                        <img src="img/Ellipsis.gif" width=80px />
                    </div>
                </div>
            <?php } ?>

            <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo-item">
                    <span id="<?php echo $todo['id']; ?>"
                          class="remove-to-do">x</span>
                    <input type="checkbox">
                    <h2><?php echo $todo['title'] ?></h2>
                    <br>
                    <small>created: 14/01/2022</small>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>