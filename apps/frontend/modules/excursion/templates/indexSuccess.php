<h1>Excursions List</h1>

<?php foreach ($excursions as $excursion): ?>
  <div class="ex_city">
    <h6 class="title"><a href="<?php echo url_for('excursion', array('id' => $excursion->getId())) ?>"><?php echo $excursion->getTitle() ?></a></h6>
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
<?php endforeach; ?>

