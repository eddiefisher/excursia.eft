<h1>Все города</h1>
<div>
  <ul class="ex_3_list">
    <?php foreach ($excursion_citys as $excursion_city): ?>
      <?php if ($excursion_city->getExcursions()->count()): ?>
      <li><a href="<?php echo url_for('city', array('id' => $excursion_city->getId())) ?>"><?php echo $excursion_city->getTitle() ?> (<?php echo $excursion_city->getExcursions()->count() ?>)</a></li>
      <?php else: ?>
        <li><?php echo $excursion_city->getTitle() ?></li>
      <?php endif ?>
    <?php endforeach ?>
  </ul>
</div>
