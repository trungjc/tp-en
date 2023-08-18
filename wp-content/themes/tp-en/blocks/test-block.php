<!--text-->
<?php echo $item['title'] ?>

<!--static-->
<img src="<?php echo get_template_directory_uri(); ?>/assets/images/scroll-down.svg" alt=""/>
<!--if-->
<?php
if ($a > $b)
  echo "a is bigger than b";
?>

<?php
if ($a > $b) {
  echo "a is greater than b";
} else {
  echo "a is NOT greater than b";
}
?>

<!--forEach-->
<?php foreach ($my_array as $key => $value): ?>
    <li>Key: <?php echo $key; ?>, Value: <?php echo $value; ?></li>
<?php endforeach; ?>