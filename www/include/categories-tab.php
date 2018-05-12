<div class="tab-content" data-tab-name="categories">
    <ul class="catalog-list">
        <?php
        $category = mysqli_query($link, "SELECT * FROM category order by category ");
        if (mysqli_num_rows($category) > 0) {
            $row5 = mysqli_fetch_array($category);
            do {
                echo ' 
        
                        <li class=catalog-item>
                            <div class=category-item-name>' . $row5["category"] . '</div>
                            <div class="delete1"><a href="adminpanel-sprav.php?id_ud=' . $row5["id_category"] . '&action=deletecateg">x</a></div> 
                        </li>';
            } while ($row5 = mysqli_fetch_array($category));
        };
        ?>   

        <li class="create-catalog-item">
            <div class="create-item">
                Добавить
            </div>
            <div class="create-form">
                <form name="formprof" action="" method="post"> 
                    <input type="text" id="categ" name="categ"  class="list-input" placeholder="Введите название" value="">
                    <input class="new-item" type="submit" name="button-category" id="button-category" value="V">
                </form>
            </div>
        </li>
    </ul>
</div>