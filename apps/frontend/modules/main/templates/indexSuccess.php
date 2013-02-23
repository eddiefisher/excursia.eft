<?php $i = 0; foreach ($excursion_citys as $excursion_city): ?>
    <div class="ex_list">
      <h5 class="title"><a href="<?php echo url_for('city', array('id' => $excursion_city->getId())) ?>"><?php echo $excursion_city->getTitle() ?></a></h5>
      <ul>
        <?php foreach ($excursion_city->getActiveExcursions(sfConfig::get('app_limit_excursion_on_hp')) as $excursion): ?>
          <li><a href="<?php echo url_for('excursion', array('id' => $excursion->getId())) ?>"><?php echo $excursion->getTitle() ?></a></li>
        <?php endforeach ?>
      </ul>
    </div>
    <?php if($i%2): ?><div class="clear"></div><?php endif ?>
  <?php $i++; ?>
<?php endforeach; ?>
