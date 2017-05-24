<?php error_reporting( E_ALL ); ?>
<?php require "templates/header.php"; ?>

<div class="container">
    <div class="text-center"><h2>Products</h2></div>
    <form action="api/add_to_cart.php" method="POST">
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="width-25p">Name</th>
                <th class="width-25p">Type</th>
                <th class="width-25p">Cost</th>
                <th class="width-25p">Amount</th>
            </tr>
            </thead>
            <tbody>

            <?php
                $products = require "data/products.php";
                foreach ($products as $k => $v):
            ?>
                <tr>
                    <td><?php echo($v->name); ?></td>
                    <td><?php echo($v->type); ?></td>
                    <td><?php echo($v->value); ?> ₴</td>
                    <td>
                        <input name="<?php echo $k; ?>" class="form-control number-small inline-block" type="number" value="0">
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <input type="submit" class="btn float-right" value="Add to cart">
    </form>
</div>

<?php require "templates/footer.php"; ?>