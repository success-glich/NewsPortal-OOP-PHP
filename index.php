<?php include_once('header.php');

$latest=$news->getLatestNews();
// print_r($latest);
$slider=$news->getSliderNews();
// print_r($slider);
?>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div class="container">
    <div class="content">
      <div id="featured_slide">
        <ul id="featurednews">
          <?php foreach($slider as $slide) {?>
            
          <li><img src="admin/images/<?php echo $slide->feature_image; ?>" alt=" hello buddy " />
            <div class="panel-overlay">
              <h2><?php echo $slide->title; ?></h2>
              <p><?php echo substr($slide->short_description,0,70); ?><br />
                <a href="#">Continue Reading &raquo;</a></p>
            </div>
          </li>
          <?php } ?>
         
            
        
        </ul>
      </div>
    </div>
    <div class="column">
      <ul class="latestnews">

        <?php foreach($latest as $ln){ ?>
         <!-- <?php  print_r($ln); ?> -->
          <li><img src="admin/images/<?php echo $ln->feature_image ?>" width="100" height="100"  alt="latest News" />
          <p><strong><a href="news.php?id=<?php echo $ln->id ?>"><?php echo $ln->title; ?></a></strong>
          <br>
          <?php echo substr($ln->short_description,0,150);?>
        </li>
        
        <?php } ?>
        
  
       
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="adblock">
    <div class="fl_left"><a href="#"><img src="images/demo/468x60.gif" alt="" /></a></div>
    <div class="fl_right"><a href="#"><img src="images/demo/468x60.gif" alt="" /></a></div>
    <br class="clear" />
  </div>
  <div id="hpage_cats">
    <?php //print_r($acat); 
    $i=0;
    foreach($acat as $cat){
      if( $i%2 == 0){
        $class="fl_left";

      }else{
        $class="fl_right";
      }
      $news->category_id=$cat->id;
      $fn=$news->getFeatureNewsByCategory();
    //   $fn=$fn[0];

        $i++;
    ?>
    
    <div class="<?php echo $class; ?>">
      <h2><a href="category.php?id=<?php echo $cat->id ?>"> <?php echo $cat->name; ?> &raquo;</a></h2>
      <img src="images/demo/100x100.gif" alt="" />
      <p><strong><a href="news.php?id=<?php echo $fn->id; ?>"><?php echo $fn->title; ?></a></strong></p>
      <p><?php echo $fn->short_description ?></p>
    </div>
    <?php if($class=="fl_right"){
      echo '  <br class="clear" />';
    }
    ?>
    <?php } ?>
   
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div class="container">
    <div class="content">
      <div id="hpage_latest">
        <h2>Feugiatrutrum rhoncus semper</h2>
        <ul>
          <li><img src="images/demo/190x130.gif" alt="" />
            <p>Nullamlacus dui ipsum conseqlo borttis non euisque morbipen a sdapibulum orna.</p>
            <p>Urnau ltrices quis curabitur pha sellent esque congue magnisve stib ulum quismodo nulla et.</p>
            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
          </li>
          <li><img src="images/demo/190x130.gif" alt="" />
            <p>Nullamlacus dui ipsum conseqlo borttis non euisque morbipen a sdapibulum orna.</p>
            <p>Urnau ltrices quis curabitur pha sellent esque congue magnisve stib ulum quismodo nulla et.</p>
            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
          </li>
          <li class="last"><img src="images/demo/190x130.gif" alt="" />
            <p>Nullamlacus dui ipsum conseqlo borttis non euisque morbipen a sdapibulum orna.</p>
            <p>Urnau ltrices quis curabitur pha sellent esque congue magnisve stib ulum quismodo nulla et.</p>
            <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
          </li>
        </ul>
        <br class="clear" />
      </div>
    </div>
    <div class="column">
      <div class="holder"><a href="#"><img src="images/demo/300x250.gif" alt="" /></a></div>
      <div class="holder"><a href="#"><img src="images/demo/300x80.gif" alt="" /></a></div>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<?php include_once('footer.php') ?>