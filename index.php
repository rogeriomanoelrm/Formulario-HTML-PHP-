<link rel="stylesheet" href="style.css">

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Celke - Listar</title>
</head>

<body>

    <!-- <a href="index.php">Listar</a><br> -->
    <!-- <br><button><a href="create.php"></a>ADD</button> -->





    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    require './Conn.php';
    require './User.php';

    $listUsers = new User();
    $result_users = $listUsers->list();
    ?>


    <div class="header">

        <h1>Product List</h1>

        <div class="addmassdel">

            <a href="create.php"><button id="pladdbtn">ADD</button></a>

            <form method="post" action="delete.php">

                <button id="delete-product-btn" type="submit">MASS DELETE</button>

        </div>

    </div>
    
    <?php
$dimension1 = isset($_POST['dimension1']) ? $_POST['dimension1'] : '';
$dimension2 = isset($_POST['dimension2']) ? $_POST['dimension2'] : '';
$dimension3 = isset($_POST['dimension3']) ? $_POST['dimension3'] : '';
$book_weight = isset($_POST['book_weight']) ? $_POST['book_weight'] : '';
$dvd_size = isset($_POST['dvd_size']) ? $_POST['dvd_size'] : '';

?>

<div class="father">
    <?php foreach ($result_users as $row_user) {
        extract($row_user);
    ?>
        <div class="son">
            <div class="check">
                <input class="delete-checkbox" type="checkbox" name="delete[]" value="<?php echo $id ?>">
            </div>
            <p>SKU: <?php echo $sku ?></p>
            <p>Name: <?php echo $name ?></p>
            <p>Price: <?php echo $price ?> $</p>
            <p><?php echo 'Dimension: ' . $dimension1 .'x'. $dimension2 .'x'. $dimension3 ?></p>
            <p><?php echo 'Weight(kg): ' . $book_weight ?></p>
            <p><?php echo 'Size(mb): ' . $dvd_size ?></p>
        </div>
    <?php } ?>
</div>









    </form>

</body>

</html>