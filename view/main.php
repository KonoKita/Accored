<!doctype html>
<html lang="en">
<head>

    <title>Accored</title>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php echo $css; ?>

</head>
<body>
	<div id="app">
        <div class="container">
            <div class="app__inner">
                <div class="app__recipes-list">
                    Рецепты
                    <?php foreach($recipesList as $name => $recipes){?>
                        <div class="recipe">
                            <div class="recipe__number">
                                <?php echo $name; ?>
                            </div>
                            <div class="recipe__content">
                                <?php echo $recipes; ?>
                            </div>
                        </div>
                    <?php  }; ?>
                    <button class="app__recipes-add-btn">
                        Добавить рецепт
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php echo $js; ?>
</body>
</html>
