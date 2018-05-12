<div class="tab-content active" data-tab-name="countries">
    <ul class="catalog-list">
        <?php
        $result = mysqli_query($link, "SELECT* from country");
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            do {
                echo ' 
                        <li class=catalog-item>
                            <div class=category-item-name>' . $row["country_name"] . '</div>
                            <div class="delete1"><a href="adminpanel-sprav.php?id_ud=' . $row["id_country"] . '&action=deletecount">x</a></div>
                        </li>';
            } while ($row = mysqli_fetch_array($result));
        };
        ?> 
        <li class="create-catalog-item">
            <div class="create-item">
                Добавить
            </div>
            <div class="create-form">
                <form name="formcount" action="" method="post"  >
                    <input type="text" id="coun" name="coun" class="list-input" placeholder="Введите название" value="">
                    <input class="new-item" type="submit" name="button-country" id="button-tovar" value="V">
                </form>
            </div>
        </li>
    </ul>
</div>