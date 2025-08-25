<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>All Orders</title>
</head>
<body>
<h2>Orders</h2>

<?php if (empty($orders)): ?>
  <p>No orders yet.</p>
<?php else: ?>
  <?php foreach ($orders as $data): ?>
    <h3>Order #<?= $data['order']['id'] ?> (Total: ₹<?= number_format($data['order']['total']) ?>)</h3>
    <ul>
      <?php foreach ($data['items'] as $it): ?>
        <li>
          <?= esc($it['color']) ?> T-shirt, 
          Design: <?= esc($it['design'] ?? '—') ?>, 
          Text: <?= esc($it['custom_text'] ?: '—') ?>, 
          Font: <?= esc($it['font'] ?? 'Default') ?>, 
          Price: ₹<?= number_format($it['price']) ?>
        </li>
      <?php endforeach ?>
    </ul>
    <hr>
  <?php endforeach ?>
<?php endif; ?>

<p><a href="/builder">Build More</a></p>
</body>
</html>
