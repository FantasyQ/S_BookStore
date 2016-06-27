

<div class="lable_bg">
    <?php include("lable_table.php"); ?>
</div>

<div class="mobile_menu">
    <a href="#" class="burger">
        <div class="cheese topC"></div>
        <div class="cheese middleC"></div>
        <div class="cheese bottomC"></div>
    </a>

    <div class="burger_menu">
        <ul class="main_menu">
            <li>
                <a href="book_literature.php">
                    <img src="../img/forPages/menu_lit.svg" alt="">

                    <div class="title_underline tt_litbook"></div>
                </a>

            </li>
            <li>
                <a href="book_art.php">
                    <img src="../img/forPages/menu_art.svg" alt="">

                    <div class="title_underline tt_artbook"></div>
                </a>
            </li>
            <li>
                <a href="stationary_note.php">
                    <img src="../img/forPages/menu_note.svg" alt="">

                    <div class="title_underline tt_note"></div>
                </a>
            </li>
            <li>
                <a href="stationary_pen.php">
                    <img src="../img/forPages/menu_pen.svg" alt="">

                    <div class="title_underline tt_pen"></div>
                </a>
            </li>
            <li>
                <a href="about.php">
                    <img src="../img/forPages/menu_about.svg" alt="">

                    <div class="title_underline tt_about"></div>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="top_bg"></div>

<nav>

    <div class="logo">
        <h1>
            s bookstore
        </h1>
        <a href="index.php">
            <img src="../img/forPages/logo.svg" alt="logo">
        </a>
    </div>


    <ul class="main_menu">
        <li>
            <a href="book_literature.php">
                <img src="../img/forPages/menu_lit.svg" alt="">

                <div class="title_underline tt_litbook"></div>
            </a>

        </li>
        <li>
            <a href="book_art.php">
                <img src="../img/forPages/menu_art.svg" alt="">

                <div class="title_underline tt_artbook"></div>
            </a>
        </li>
        <li>
            <a href="stationary_note.php">
                <img src="../img/forPages/menu_note.svg" alt="">

                <div class="title_underline tt_note"></div>
            </a>
        </li>
        <li>
            <a href="stationary_pen.php">
                <img src="../img/forPages/menu_pen.svg" alt="">

                <div class="title_underline tt_pen"></div>
            </a>
        </li>
        <li>
            <a href="about.php">
                <img src="../img/forPages/menu_about.svg" alt="">

                <div class="title_underline tt_about"></div>
            </a>
        </li>
    </ul>

    <ul class="nav_member">
        <li class="search_login">
            <a href="#">
                <img src="../img/forPages/log.svg" alt="user login">
            </a>
        </li>
        <li class="search_cart">
            <a href="shoppingTable.php">
                <img src="../img/forPages/cart.svg" alt="cart">
            </a>
        </li>
        <li class="search_btn">
            <a href="#">
                <img src="../img/forPages/search.svg" alt="cart">
            </a>

            <form name="search_form" method="get" action="save_search.php">
                <div class="search_act">
                    <input type="text" name="search_input" id="search_input" onkeypress="if(event.keyCode==13) submit" placeholder="商品搜尋...">
                    <img src="../img/forPages/%5B.svg" alt="" class="ll_img">
                    <img src="../img/forPages/%5D.svg" alt="" class="rr_img">
                </div>
            </form>
        </li>
    </ul>
</nav>

