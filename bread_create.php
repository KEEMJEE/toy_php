<?php
    $conn = mysqli_connect("localhost", "root", "123456", "myhtml_db");

    $sql ="
    INSERT INTO bread (title, ingredients, description, created)
    VALUES('{$_POST['title']}','{$_POST['ingredients']}','{$_POST['description']}', NOW())
    ";

    $result = mysqli_query($conn, $sql);

    if($result === false)
    {
        echo "문제가 발생";
        echo mysqli_error($conn);
    }
    else{
        echo ("<script>location.href='mybread.php'</script>");
    }
?>