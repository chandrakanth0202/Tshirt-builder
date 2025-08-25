<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Cart</title>
</head>
<body>
<h2>Your Cart</h2>

<?php if (empty($items)): ?>
  <p>Cart is empty. <a href="/builder">Build one</a></p>
<?php else: ?>
  <table border="1" cellpadding="6">
    <tr>
      <th>Color</th>
      <th>Design</th>
      <th>Text</th>
      <th>Font</th>
      <th>Price</th>
    </tr>
    <?php $total = 0; ?>
    <?php foreach ($items as $it): ?>
      <?php $total += $it['price']; ?>
      <tr>
        <td><?= esc($it['color']['name']) ?></td>
        <td><?= esc($it['design']['name'] ?? '—') ?></td>
        <td><?= esc($it['custom_text'] ?: '—') ?></td>
        <td><?= esc($it['font']['name'] ?? 'Default') ?></td>
        <td>₹<?= number_format($it['price']) ?></td>
      </tr>
    <?php endforeach ?>
    <tr>
      <td colspan="4" style="text-align:right"><b>Grand Total</b></td>
      <td><b>₹<?= number_format($total) ?></b></td>
    </tr>
  </table>
<?php endif; ?>

<p><a href="/builder">Customize another</a></p>
</body>
</html>
