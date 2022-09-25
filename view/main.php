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
                <section class="recipes">
                    <div class="recipes-list">
                        <h3 class="recipes-list__title">Рецепты</h3>
                        <?php foreach($recipesList as $recipe){
                            $recipeNumber = $recipe[0];
                            $recipeName = $recipe[1];
                            $recipeContent = $recipe[2];
                            ?>
                            <div class="recipe">
                                <div class="recipe__number">
                                    <?php echo $recipeNumber; ?>
                                </div>
                                <div class="recipe__name">
                                    <?php echo $recipeName; ?>
                                </div>
                                <div class="recipe__content">
                                    <?php echo $recipeContent; ?>
                                </div>
                            </div>
                        <?php  }; ?>
                    
                    </div>
                    <form class="recipes-add-form">
                        <div class="recipes-add-form__inputs-wrapper">
                            <label for="recipes-add-form__input-name">Название рецепта</label>
                            <input id="recipes-add-form__input-name" type="text" class="recipes-add-form__input name">
                            <label for="recipes-add-form__input-content">Список</label>
                            <input id="recipes-add-form__input-content" type="text" class="recipes-add-form__input content">
                        </div>
                        <a class="recipes-add-form__btn">
                            Добавить рецепт
                        </a>
                    </form>
                </section>
            </div>
        </div>
    </div>
<?php echo $js; ?>
</body>
</html>
