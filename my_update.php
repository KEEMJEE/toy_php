<?php
$list = '';
$conn = mysqli_connect("localhost", "root", "123456", "myhtml_db");
$sql = "select * from bread";
$result = mysqli_query($conn, $sql);                
while($row = mysqli_fetch_array($result))
{
    $list = $list."<li><a href = \"mybread.php?id={$row['id']}\">{$row['title']}</a></li>";
}

$article = array(
    'title'=>'빵을 고르세요.',
    'ingredients'=>'재료',
    'description'=>'레시피'
);

if(isset($_GET['id']))
{
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']); 
    $sql = "select * from bread where id = {$filtered_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title'] = $row['title'];
    $article['ingredients'] = $row['ingredients'];
    $article['description'] = $row['description'];

}
?>

<html>
    <head>
        <meta charset = "utf-8">
        <link rel = "stylesheet" type = "text/css" href = "janfont.css">
        <title>WishList</title>
        <style>
            div{
                width:100%;
                height:500px;
                margin:10px;
                padding:0px;
                border:0px;
            }
            div.left{
                width:40%;
                margin-top:0px;
                border:10px solid orange;
                border-radius:15px;
                float:left;
                box-sizing:content-box;
                background:wheat;
            }
            a:link{color:black; text-decoration:none;}
            a:visited{color:black;}
            a:hover{color:orange;}
            a:active{color:orange;}
            a:focus{color:orange;}
        </style>
    </head>

    <body bgcolor = "wheat">
    <div><r2>        
    <div class="left">
        <ol>
        <h1>위시리스트</h1>
            <h2>
                <?php
                    echo $list;
                 ?>
            </h2>
        </ol>
        
        <ol>
        <h4>※빵과 레시피를 수정하세요.※</h4>
        <form action = "bread_update.php" method = "POST">
            <input type = "hidden" name = "id" value = "<?=$_GET['id']?>">
            <p><input type = "text" name = "title" placeholder = "빵"
                value = "<?=$article['title']?>"></p>
            <p><textarea name = "ingredients" placeholder = "재료"><?=$article['ingredients']?></textarea></p>
            <p><textarea name = "description" placeholder = "레시피"><?=$article['description']?></textarea></p>
            <p><input type = "submit" value = "수정"></p>
        </form>
        </ol>
    </div>
    
    <div class = "left">
        <ol>
            <h1>
                <?php
                    echo $article['title'];
                ?>
            </h1>
            <h2>
                <?php
                    echo nl2br($article['ingredients']);
                ?>
            </h2>
            <h4>
                <?php
                    echo nl2br($article['description']);
                ?>
            </h4>
        </ol>
    </div>

    </r2></div>
    </body>
</html>