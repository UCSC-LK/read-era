<nav>
  <ol>
    <?php if(isset($crumbs)):?>
      <?php foreach ($crumbs as $crumb):?>
         <li><a href="<?=$crumb[1]?>"><?=$crumb[0]?></a></li>
     <?php endforeach;?>
    <?php endif;?>
  </ol>
</nav>