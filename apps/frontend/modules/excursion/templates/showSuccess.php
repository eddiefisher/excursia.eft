<div class="ex_city">
  <h6 class="title"><?php echo $excursion->getTitle() ?></h6>
  <div class="desc"><?php echo $excursion->getDescription() ?></div>
  <div>Город: <a href="<?php echo url_for('city', array('id' => $excursion->getExcursionCity()->getId())) ?>"><?php echo $excursion->getExcursionCity()->getTitle() ?></a></div>
  <?php if ($excursion->getExcursionCategory()->count()): ?>
  <div class="inform">
    <br />
    <div>
      Категории: 
      <?php foreach ($excursion->getExcursionCategory() as $category): ?>
        <a href="<?php echo url_for('category', array('id' => $category->getId())) ?>"><?php echo $category->getTitle() ?></a>
      <?php endforeach ?>
    </div>
  </div>
  <?php endif ?>
</div>