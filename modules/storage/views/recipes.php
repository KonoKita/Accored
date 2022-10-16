<?php 
foreach($data['recipes'] as $mealTypeName => $recipeCategory){
   
    ?>
    <div class="recipe-meal-type">
        <div class="recipe-meal-type__name"><?php echo $mealTypeName; ?></div>
        <div class="recipe-meal-type__recipes">
        
            <?php   
                foreach($recipeCategory as $recipe){
                    $recipeName = trim($recipe['name']);
                    $recipeContent = trim($recipe['recipe']); ?>

                    <div class="recipe">
                        <div class="recipe__name"><?php echo $recipeName; ?></div>
                        <div class="recipe__content"><?php echo $recipeContent.""; ?></div>
                    </div>
            <?php } ?>

        </div>
    </div>

<?php } ?>