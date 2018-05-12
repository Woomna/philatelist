<div class="tab-content" data-tab-name="perforation">
    <ul class="catalog-list">
        <?php
        $result4 = mysqli_query($link, "SELECT * from perforation ");
        if (mysqli_num_rows($result4) > 0) {
            $row4 = mysqli_fetch_array($result4);
            do {
                echo ' 
        
                        <li class=catalog-item>
                            <div class=category-item-name>' . $row4["perforation"] . '</div>
                            <div class="delete1"><a href="adminpanel-sprav.php?id_ud=' . $row4["id_perforation"] . '&action=deleteperf">x</a></div> 
                        </li>';
            } while ($row4 = mysqli_fetch_array($result4));
        };
        ?>   
        
        <li class="create-catalog-item">
            <div class="create-item">
                Добавить
            </div>
            <div class="create-form">
                <form name="formsect" action="" method="post" >
                    <input type="text" id="perf" name="perf" class="list-input" placeholder="Введите название" value="">
                    <input class="new-item" type="submit" name="button-perforation" id="button-perforation" value="V">
                </form>
            </div>
        </li>
    </ul>
</div>
