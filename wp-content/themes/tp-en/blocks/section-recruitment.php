<?php
$recruitment = get_sub_field('recruitment');
foreach ($recruitment as &$item) {
  $item->department = get_post_field('department', $item->ID);;
}
$title = get_sub_field('title');
$subTitle = get_sub_field('sub_title');
$departmentOptions = array_values(array_unique(array_map(function ($v) {
  return get_post_field('department', $v->ID);
},$recruitment)));
?>
<script>
    var jobList = <?php echo json_encode($recruitment)?>;
</script>

<div class="container container-xl" id="recruitment-list">
    <!--search-->
    <section class="search">
        <p class="search__sub-title"><?php echo $subTitle?></p>
        <p class="search__title"><?php echo $title?></p>
        <div class="search__input">
            <input
                    type="text"
                    placeholder="Nhập tên công việc"
                    class="search__job"
            />
            <select class="search__department">
                <option value="">None</option>
                <?php foreach ($departmentOptions as $key => $value): ?>
                  <option value="<?php echo $value ?>"><?php echo $value ?></option>
              <?php endforeach; ?>

            </select>
            <div class="btn-search">Tìm kiếm</div>
        </div>
    </section>

    <!--job-->
    <section class="job">
      <?php foreach ($recruitment as $key => $value): ?>
          <div class="job__card" id="job__card-<?php echo $value->ID ?>">
              <a class="text-2xl te font-bold" href="<?php echo $value->guid?>"><?php echo $value->post_title ?></a>
              <div class="tag-blue"><?php echo get_post_field('department', $value->ID) ?></div>
              <div class="job__footer">
                  <span><?php echo get_post_field('address', $value->ID) ?></span>
                  <span><?php echo get_post_field('salary', $value->ID) ?></span>
              </div>
          </div>
      <?php endforeach; ?>

    </section>
</div>





