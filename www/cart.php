<?php
session_start();
require "templates/header.php"; ?>

<div class="container">
    <div class="text-center"><h2>Cart</h2></div>

    <?php if (isset($_SESSION) && isset($_SESSION['cart'])) { ?>
        <form action="api/buy.php" method="POST">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="width-20p">Name</th>
                    <th class="width-20p">Type</th>
                    <th class="width-20p">Cost</th>
                    <th class="width-20p">Amount</th>
                    <th class="width-20p">Total cost</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $products = require "data/products.php";
                $totalSum = 0;
                foreach ($_SESSION['cart'] as $k => $v):
                    if ($v == 0) continue;
                ?>
                    <tr>
                        <td class="width-20p"><?php echo($products[$k]->name); ?></td>
                        <td class="width-20p"><?php echo($products[$k]->type); ?></td>
                        <td class="width-20p"><?php echo($products[$k]->value); ?> ₴</td>
                        <td class="width-20p"><?php echo($v); ?></td>
                        <td class="width-20p"><?php echo($products[$k]->value * $v); ?> ₴</td>
                    </tr>
                <?php
                    $totalSum += $products[$k]->value * $v;
                    endforeach;
                ?>
                <tr>
                    <td>Total:</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo $totalSum; ?> ₴</td>
                </tr>
                </tbody>
            </table>
            <div class="float-right"><input type="submit" class="btn float-right" value="Buy"></div>
        </form>
    <?php } else { ?>
        <div class="text-center"><a href="products.php">You have not chosen any products. Press here to open Products list</a></div>
    <?php } ?>
</div>

<?php require "templates/footer.php"; ?>
