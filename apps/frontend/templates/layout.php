<!DOCTYPE html>
<html>
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
<body>
  <?php include_partial('header/show') ?>
  <div class="container_16">
    <div class="grid_16">
      <?php echo $sf_content ?>
    </div>
  </div>
  <?php include_partial('footer/show') ?>
</body>
</html>