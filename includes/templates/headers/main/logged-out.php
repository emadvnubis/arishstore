<!-- Start nav one -->
<div class="container">
<nav class="row col-sm-12 m-auto navbar log_nav">

  <!-- Start LEFT nav ONE -->
  <div class="col-md-4">
    <ul class="row">
      <li class="list_home_top">
        <img width="55" src="admin/uploads/arish-store.jpeg" alt="">

        <a class="site-title" href="index.php">
          عريش ستور
        </a>
      </li>
    </ul>

  </div>
  <div class="col-md-4">
    <form class="form-inline md-form form-sm mt-0 search_form">
      <i class="fas fa-search"></i>
      <input class="form-control text-center search_input" type="text" placeholder="ابحث فى الموقع" aria-label="Search">
    </form>
  </div>
  <!-- Start RIGHT nav ONE -->
  <div class="col-md-4">
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
      <li class="list_home_top dropdown">
        <a class="nav-link a_header" href="#">
          <i class="fas fa-bolt fa-2x" aria-hidden="true"></i>
          المساعدة
        </a>

        <ul class="child_cat dropdown-menu">
          <li class="upper_li">
             <a class="upper_a" href="">
               عربى
             </a>
          </li>
          <li class="upper_li">
             <a class="upper_a" href="">
               اتصل بنا
             </a>
          </li>
          <li class="upper_li">
             <a class="upper_a" href="">
               شكاوى واقتراحات
             </a>
          </li>
        </ul>
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
</div>
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
