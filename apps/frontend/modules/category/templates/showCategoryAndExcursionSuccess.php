<div class="ex_city_lists">
  <h5 class="title">Категория: <?php echo $excursion_category->getTitle() ?></h5>
  <?php if ($excursion_category->getExcursions()->count()): ?>
  <div class="ex_city_list_item">
    <?php foreach ($excursion_category->getExcursions() as $excursion): ?>
      <div class="ex_city">
        <h6 class="title"><a href="<?php echo url_for('excursion', array('id' => $excursion->getId())) ?>"><?php echo $excursion->getTitle() ?></a></h6>
        <div class="desc"><?php echo $excursion->getDescription() ?></div>
        <?php if ($excursion->getExcursionCategory()->count()): ?>
        <div class="category">
          <br />
          Категории: 
          <?php foreach ($excursion->getExcursionCategory() as $category): ?>
            <a href="<?php echo url_for('category', array('id' => $category->getId())) ?>"><?php echo $category->getTitle() ?></a>
          <?php endforeach ?>
        </div>
        <?php endif ?>
      </div>
    <?php endforeach ?>
  </div>
  <?php endif ?>
</div>
