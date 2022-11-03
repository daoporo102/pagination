<?php require 'connectdb.php'; ?>
<?php
$conn = connect();
$sql = "SELECT * FROM `phantrang-p2`";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$item = 3;
$pages = ceil($count / $item);
$page = isset($_GET['page']) && $_GET['page'] >= 1  && $_GET['page'] <= $pages  ? (int)$_GET['page'] : 1;
echo $vitri = ($page * $item)-$item;
$sqltext =  "SELECT * FROM `phantrang-p2` LIMIT $vitri,$item";
$resultText = mysqli_query($conn,$sqltext);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phan trang php</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <div id="wrapper">
        <?php while ($row = mysqli_fetch_array($resultText)) { ?>
            <div class="content">
                <h2><?=$row['title']?></h2>
                <p><?=$row['content']?></p>
            </div>
            <?php }//end while ?> 
        
        <ul>
            <li <?php  if($page==1) { echo "class='disable'"; } ?>   ><a href="02.php?page=<?= 1 ?>">&lsaquo;&lsaquo;</a></li>
            <li <?php  if($page==1) { echo "class='disable'"; } ?>><a href="02.php?page=<?= $page -1 ?>">&lsaquo;</a></li>
            <?php
            for ($i = 1; $i <= $pages; $i++) {
                if ($page == $i) {
            ?>
                    <li><span class="active"><?= $i ?></span></li>
                <?php   } else { ?>
                    <li><a href="02.php?page=<?= $i ?>"><?= $i ?></a></li>



            <?php
                } //end if..else
            }   //end for
            ?>



            <li <?php  if($page==$pages) { echo "class='disable'"; } ?> ><a href="02.php?page=<?= $page + 1 ?>"><span>&rsaquo;</span></a></li>
            <li <?php  if($page==$pages) { echo "class='disable'"; } ?> ><a href="02.php?page=<?= 5 ?>"><span>&rsaquo;&rsaquo;</span></a></li>
        </ul>
    </div>
</body>

</html>