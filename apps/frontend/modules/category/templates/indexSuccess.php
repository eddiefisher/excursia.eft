<h1 class="title">Все категории</h1>
<div>
  <ul class="ex_3_list">
    <?php foreach ($excursion_categorys as $excursion_category): ?>
      <?php if ($excursion_category->getExcursions()->count()): ?>
      <li><a href="<?php echo url_for('category', array('id' => $excursion_category->getId())) ?>"><?php echo $excursion_category->getTitle() ?> (<?php echo $excursion_category->getExcursions()->count() ?>)</a></li>
      <?php else: ?>
        <li><?php echo $excursion_category->getTitle() ?></li>
      <?php endif ?>
    <?php endforeach ?>
  </ul>
</div>