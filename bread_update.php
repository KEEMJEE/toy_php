<?php
    $conn = mysqli_connect("localhost", "root", "123456", "myhtml_db");

    settype($_POST['id'], 'integer');
    $filtered = array(
        'id' => mysqli_real_escape_string($conn, $_POST['id']),
        'title' => mysqli_real_escape_string($conn, $_POST['title']),
        'ingredients' => mysqli_real_escape_string($conn, $_POST['ingredients']),
        'description' => mysqli_real_escape_string($conn, $_POST['description'])
    );
    $sql ="
    UPDATE bread set
    title = '{$filtered['title']}',
    ingredients = '{$filtered['ingredients']}',
    description = '{$filtered['description']}'
    where id = {$filtered['id']}
    ";

    $result = mysqli_query($conn, $sql);
    if($result === false)
    {
        echo "문제가 발생";
        echo mysqli_error($conn);
    }
    else
    {
        echo ("<script>location.href='mybread.php'</script>");        
    }
?>