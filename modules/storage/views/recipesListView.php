<?php 
foreach($data['recipesList'] as $recipe){
    $recipeNumber = trim($recipe[0]);
    $recipeName = trim($recipe[1]);
    $recipeContent = trim($recipe[2]);
    ?>
    <div class="recipe">
        <div class="recipe__number"><?php echo $recipeNumber; ?></div>
        <div class="recipe__name"><?php echo $recipeName; ?></div>
        <div class="recipe__content"><?php echo $recipeContent; ?></div>
    </div>
<?php  
} ?>