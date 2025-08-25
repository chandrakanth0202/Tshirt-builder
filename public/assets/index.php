<?php
session_start();

// Handle add to cart
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $color = $_POST['color'] ?? '';
    $design = $_POST['design'] ?? '';

    $cart = $_SESSION['cart'] ?? [];
    $cart[] = [
        'color' => $color,
        'design' => $design
    ];
    $_SESSION['cart'] = $cart;

    header('Location: index.php?page=cart');
    exit;
}

// Determine page
$page = $_GET['page'] ?? 'builder';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>T-shirt Builder</title>
    <style>
        #tshirt-preview { position: relative; width: 300px; }
        #tshirt-preview img { position: absolute; top: 0; left: 0; width: 300px; }
    </style>
</head>
<body>

<?php if($page === 'builder'): ?>
    <h1>T-shirt Builder</h1>

    <div id="tshirt-preview">
        <img id="base" src="assets/images/colors/red.png" alt="T-shirt Base">
        <img id="overlay" src="assets/images/designs/logo1.png" alt="Design Overlay">
    </div>

    <form method="post" action="">
        <label>Color:</label>
        <select id="color" name="color">
            <option value="red.png">Red</option>
            <option value="blue.png">Blue</option>
            <option value="green.png">Green</option>
        </select>

        <label>Design:</label>
        <select id="design" name="design">
            <option value="logo1.png">Logo 1</option>
            <option value="logo2.png">Logo 2</option>
            <option value="logo3.png">Logo 3</option>
        </select>

        <button type="submit">Add to Cart</button>
    </form>

    <a href="?page=cart">Go to Cart</a>

    <script>
        const baseImg = document.getElementById('base');
        const overlayImg = document.getElementById('overlay');
        const colorSelect = document.getElementById('color');
        const designSelect = document.getElementById('design');

        colorSelect.addEventListener('change', () => {
            baseImg.src = 'assets/images/colors/' + colorSelect.value;
        });
        designSelect.addEventListener('change', () => {
            overlayImg.src = 'assets/images/designs/' + designSelect.value;
        });
    </script>

<?php elseif($page === 'cart'): ?>
    <h1>Cart</h1>

    <?php if(empty($_SESSION['cart'])): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <ul>
            <?php foreach($_SESSION['cart'] as $item): ?>
                <li>Color: <?= htmlspecialchars($item['color']) ?>, Design: <?= htmlspecialchars($item['design']) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <a href="?page=builder">Back to Builder</a>
<?php endif; ?>

</body>
</html>
