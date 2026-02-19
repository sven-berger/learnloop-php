<div class="p-4 bg-white border rounded mb-4">
<form method="POST">
  <div class="mb-3">
    <label class="form-label" for="name">Name</label>
    <input
      class="form-control"
      id="name"
      name="name"
      value="<?= htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
      placeholder="Bitte gib deinen Namen ein:"
      required
    />
  </div>

  <div class="mb-3">
    <label class="form-label" for="randomNumber">Zufällige Zahl (1–10)</label>
    <input
      type="number"
      id="randomNumber"
      name="randomNumber"
      class="form-control"
      min="1"
      max="10"
      value="<?= htmlspecialchars($_POST['randomNumber'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
      placeholder="z.B.  5"
      required
    />
  </div>

  <div class="my-3">
    <label class="form-label" for="selectMulti">Multi-Faktor</label>
    <select class="form-select" id="selectMulti" name="selectMulti" required>
      <option value="">Bitte wählen:</option>
      <option value="2">2</option>
      <option value="4">4</option>
      <option value="6">6</option>
      <option value="8">8</option>
      <option value="10">10</option>
      <option value="ownLetter">Eigene Zahl</option>
    </select>
  </div>

  <button type="submit" class="btn btn-danger">Absenden</button>
</form>
</div>

<?php
if (isset($_POST['name'], $_POST['randomNumber'], $_POST['selectMulti'])): ?>
<div class="p-4 bg-white border rounded mb-4">

<div class="mt-4">
 <h2>Hallo <?= $name; ?>, wie geht es dir?</h2>
    <p class='mt-4'><span class='fw-bolder text-danger'><?= $randomNumber; ?></span> <span style="font-size: 11px;">
      (Deine Zahl)</span> x <span class='fw-bolder text-danger'><?= $selectMulti; ?></span> <span style="font-size: 11px;">
      (Dein auswählter Multi-Faktor)</span> ergibt: <span class='fw-bolder text-success'><?= $finalNumber; ?></span></p>
</div>
</div>

<?php endif; ?>

<script src="/src/View/js/formOwnInput.js"></script>
