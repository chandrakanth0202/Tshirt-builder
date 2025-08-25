<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <title>T-Shirt Builder</title>
<link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
  <style>
    .stage { position: relative; width: 360px; height: 420px; margin: 10px auto; }
    .stage img.base { position:absolute; inset:0; width:100%; height:100%; object-fit:contain; }
    .stage img.design { position:absolute; top:120px; left:100px; width:160px; opacity:.95; display:none; }
    .stage .text { position:absolute; top:300px; left:0; right:0; text-align:center; font-size:28px; font-family: Roboto; }
  </style>
</head>
<body>
  <?php if (session('error')): ?>
    <p style="color:red"><?= esc(session('error')) ?></p>
  <?php endif; ?>

  <div class="stage">
    <img id="baseImg" class="base" src="<?= esc($colors[0]['image_path']) ?>" alt="Tshirt">
    <img id="designImg" class="design" src="">
    <div id="textLayer" class="text"></div>
  </div>

  <form method="post" action="/add-to-cart">
    <?= csrf_field() ?>

    <label>Color</label>
    <select name="color_id" id="colorSel">
      <?php foreach($colors as $c): ?>
        <option value="<?= $c['id'] ?>" data-img="<?= esc($c['image_path']) ?>"><?= esc($c['name']) ?></option>
      <?php endforeach ?>
    </select><br><br>

    <label>Design</label>
    <select name="design_id" id="designSel">
      <option value="">None</option>
      <?php foreach($designs as $d): ?>
        <option value="<?= $d['id'] ?>" data-img="<?= esc($d['image_path']) ?>"><?= esc($d['name']) ?></option>
      <?php endforeach ?>
    </select><br><br>

    <label>Custom Text</label>
    <input type="text" name="custom_text" id="customText" maxlength="20"><br><br>

    <label>Font</label>
    <select name="font_id" id="fontSel">
      <option value="">Default</option>
      <?php foreach($fonts as $f): ?>
        <option value="<?= $f['id'] ?>" data-family="<?= esc($f['css_family']) ?>"><?= esc($f['name']) ?></option>
      <?php endforeach ?>
    </select><br><br>

    <button type="submit">Add to Cart</button>
  </form>
  <script src="<?= base_url('assets/js/builder.js') ?>" defer></script>

  <script>
    const baseImg   = document.getElementById('baseImg');
    const designImg = document.getElementById('designImg');
    const textLayer = document.getElementById('textLayer');

    document.getElementById('colorSel').addEventListener('change', e => {
      baseImg.src = e.target.selectedOptions[0].dataset.img;
    });

    document.getElementById('designSel').addEventListener('change', e => {
      const img = e.target.selectedOptions[0].dataset.img;
      if (e.target.value) { designImg.src = img; designImg.style.display='block'; }
      else { designImg.style.display='none'; }
    });

    document.getElementById('customText').addEventListener('input', e => {
      textLayer.textContent = e.target.value;
    });

    document.getElementById('fontSel').addEventListener('change', e => {
      textLayer.style.fontFamily = e.target.selectedOptions[0].dataset.family || 'Roboto';
    });
  </script>
</body>
</html>
