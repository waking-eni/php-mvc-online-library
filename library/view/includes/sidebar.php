<?php
    require_once __DIR__.'/../../controller/categoryController.php';
    require_once __DIR__.'/../../controller/authorController.php';
?>

<!-- toggle sidebar always visible button-->
<div id="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Toggle Sidebar</span>
            </button>

        </div>
    </nav>
</div>

<div class="sidebar-header">
    <h3>Navigation</h3>
</div>

<ul class="list-unstyled components">
    <li class="active">
        <!-- categories submenu -->
        <a href="#categoriesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Categories</a>
        <ul class="collapse list-unstyled" id="categoriesSubmenu">

        <?php
            try {
                $categoryCon = new CategoryController();
                $categories = $categoryCon->fetchCategories();
            } catch(Exception $e) {
                echo 'Caught exception: '.$e->getMessage();
            }

            //list all categories
            if($categories && !empty($categories)) {
                foreach($categories as $key => $category) {
                    echo '<li>';
                    echo '<a class="nav-link active" href="listByCategory.php?category='
                        .$category["name"].'">'.$category['name'].'</a>';
                    echo '</li>';
                }
            }
        ?>

    </li>

    <li>
        <!-- authors submenu -->
        <a href="#authorsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Authors</a>
        <ul class="collapse list-unstyled" id="authorsSubmenu">

        <?php
            try {
                $authorCon = new AuthorController();
                $authors = $authorCon->fetchAuthors();
            } catch(Exception $e) {
                echo 'Caught exception: '.$e->getMessage();
            }

            //list all authors
            if($authors && !empty($authors)) {
                foreach($authors as $key => $author) {
                    echo '<li>';
                    echo '<a class="nav-link active" href="listByCategory.php?category='
                        .$author["name"].'">'.$author['name'].'</a>';
                    echo '</li>';
                }
            }
        ?>

    </li>
</ul>
