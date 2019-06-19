<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>GULP</title>
    <link rel="stylesheet" href="cssStyle/main.css">
    <link rel="stylesheet" href="css/@font-face.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js" type="text/javascript"></script>
    <script src="js/jquery.mixitup.min.js" type="text/javascript"></script>
</head>
<body>
<div class="content">
    <div class="header">
        <div class="wrap">
            <div class="logo filter" data-filter="all"><a href="index.html"><img src="img/logo.png" class="imgLogo hide"></a></div>
            <div class="cf"></div>
            <div class="headNav">
                <ul>
                    <li><a href="#" class="filter headFilter show" data-filter=".hot">ГОРЯЧЕЕ</a> </li>
                    <li><a href="#" class="filter headFilter hide" data-filter=".garnish" >ГАРНИРЫ</a> </li>
                </ul>
            </div>
            <div class="addBut">
                <button class="addRecipe" aria-haspopup="true">ДОБАВИТЬ</button>
            </div>
            <div class="mask" role="dialog"></div>
            <div class="modal" role="alert">
                <button class="close" role="button">X</button>
                <hr>
                <div class="description">
                    <form action="/new.php" enctype="multipart/form-data" method="post">
                        <input type="file" class="name Dish" name="img">
                        <input type="text" placeholder="название" class="name Dish" name="name">
                        <select name="type_of" class="select1 typeof">
                            <option selected value="hot">Горячее</option>
                            <option value="garnish">Гарнир</option>
                        </select>
                        <select name="main_ingr" class="select1">
                            <option>главный ингридиент</option>
                            <option value="chicken">Курица</option>
                            <option value="lamb">Мясо</option>
                            <option value="fish">Рыба</option>
                        </select>
                        <input type="text" placeholder="доп ингридиенты" class="composition ingr Dish" name="dop">
                        <!--<input type="text" placeholder="главный ингридиент" class="composition Mingr Dish">-->
                        <input type="submit" value="Отправить">
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="cf"></div>

    <div class="recipes">
        <div class="sideNav hidding">
            <div class="navSel filter chi" data-filter=".chicken"><p class="t_filer">Курица</p> </div>
            <div class="navSel filter la" data-filter=".lamb"><p class="t_filer">Мясо</p></div>
            <div class="navSel filter fi" data-filter=".fish"><p class="t_filer">Рыба</p></div>
        </div>
        <div class="wrap">
            <div id="Container" style="z-index: 888">
                <?php
                $foods = json_decode(file_get_contents( __DIR__ . '/food.json'), true);

                foreach ($foods as $food) {
echo '
                <div class="mix ' . $food['mainItem'] . ' ' . $food['type'] . '">
                    <div class="PicsDiv">
                        <img src="' . $food['img'] . '" class="cardPic">
                    </div>
                    <h1 class="cardTitle">' . $food['name'] . '</h1>
                    <p class="dishComposition">' . $food['description'] . '</p>
                </div>
';
                }
                ?>
            </div>
        </div>
    </div>

</div>

<div id="footer">
    &copy; -____-
</div>

<script>

    $(function(){
        $('#Container').mixItUp();
    });

</script>
<script src="js/filter.js" type="text/javascript"></script>
</body>
</html>