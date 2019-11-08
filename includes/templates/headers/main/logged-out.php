<!-- Start nav one -->
<nav class="row col-sm-12 m-auto navbar log_nav">

  <!-- Start LEFT nav ONE -->
  <div class="col-md-3">
    <ul class="navbar-nav m-auto">
      <li class="list_home">
        <a class="site-title" href="index.php">
          عريش ستور
        </a>
      </li>
    </ul>

  </div>
  <!-- Search form -->
    <form class="form-inline md-form form-sm mt-0 col-md-3">
      <i class="fas fa-search" aria-hidden="true"></i>
      <input class="form-control" type="text" placeholder="Search" aria-label="Search">

    </form>


  <!-- End LEFT nav ONE -->

  <!-- Start RIGHT nav ONE -->
  <div class="col-md-6">
    <ul class="row">
      <li class="list_home_top dropdown">
        <a class="nav-link a_header dropdown-toggle" href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="false">
          <i class="fas fa-users fa-2x" aria-hidden="true"></i>
          اعضاء
        </a>

        <ul class="child_cat dropdown-menu">
          <li class="">
              <a href="login.php" class="log-sign">
                دخول
                <i class="fas fa-sign-in-alt fa-1x"></i>
                </a>
          </li>
          <li class="">
              <a href="register.php" class="log-sign">
                تسجيل
                <i class="fas fa-registered fa-1x" aria-hidden="true"></i>
              </a>
          </li>
        </ul>

      </li>
      <li class="list_home_top">
        <a class="nav-link a_header" href="#">
          <i class="fas fa-bolt fa-2x" aria-hidden="true"></i>
          المساعدة
        </a>
      </li>

      <li class="list_home_top">
        <a class="nav-link a_header" href="#">
          <i class="fas fa-cart-plus fa-2x" aria-hidden="true"></i>
          سلة المشتريات
        </a>
      </li>

    </ul>
  </div>
  <!-- Start RIGHT nav ONE -->
</nav>
<!-- end nav one -->
<!-- Start nav two  -->
<nav class="navbar navbar-expand-lg col-sm-12 down_nav">

  <ul id="menu" class="row m-auto">
    <?php
    $top_nav_cat = get_all_rec('*', 'categories', 'parent = 0', 'ID DESC', 4);

      foreach ($top_nav_cat as $cat) {
         ?>

        <li class="dropdown <?php if(isset($_GET['page_title']) && $_GET['page_title'] == str_replace(' ', '-', $cat['Name'])) { echo "acitveTwo";} ?>">
           <?php
          echo "<a class='nav-link a_header dropdown-toggle' data-toggle='dropdown' data-hover='dropdown' data-delay='1000' data-close-others='false' href='categories.php?pageid=".$cat['ID']."&page_title=".str_replace(' ', '-', $cat['Name'])."'>";
            echo $cat['Name'];
          echo "</a>"; ?>
        <?php
        $down_nav_cat = get_all_rec("*", "sub_categories", "category_id = {$cat['ID']}", "id_sub DESC", 4);
        if (!empty($down_nav_cat)) { ?>
        <ul class="child_cat dropdown-menu">
        <?php
        foreach ($down_nav_cat as $down) { ?>
        <li>
          <?php
          echo "<a href='categories.php?pageid=".$down['id_sub']."&page_title=".str_replace(' ', '-', $down['name_sub'])."'>";
            echo $down['name_sub'];
          echo "</a>"; ?>
        </li>
    <?php  }  ?>
  </ul>
<?php } ?>
</li>

<?php  } ?>
  </ul>
</nav>
