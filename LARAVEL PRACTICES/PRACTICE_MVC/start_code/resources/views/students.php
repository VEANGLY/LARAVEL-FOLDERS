<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
</head>
<body>
    <h2>List of students</h2>
    <ul>
        <?php foreach($allStudents as $student){
        $name = $student["name"];
        $age = $student["age"];
        $class = $student["class"];
        ?>
        <li><?php echo $name ?> is in class <?php echo $class?> is age <?php echo $age?></li>
        <?php
           }
        ?>
    </ul>
</body>

</html>