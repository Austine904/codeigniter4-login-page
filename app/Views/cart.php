<h2>Your Cart</h2>

<?php if (!empty($cart_items)): ?>
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php foreach ($cart_items as $item): ?>
            <tr>
                <td><?= esc($item['product_name']) ?></td>
                <td><?= esc($item['quantity']) ?></td>
                <td>$<?= esc($item['price']) ?></td>
                <td>
                    <a href="<?= site_url('cart/remove/' . $item['id']) ?>">Remove</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Your cart is empty.</p>
<?php endif; ?>
