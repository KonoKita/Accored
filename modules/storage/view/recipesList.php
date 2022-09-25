<?php 
foreach($recipesList as $recipe){
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
<?php  
} ?>