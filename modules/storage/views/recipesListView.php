<?php 
foreach($data['recipesList'] as $recipe){
    $recipeName = trim($recipe[0]);
    $recipeContent = trim($recipe[1]);
    $recipeCategory = trim($recipe[2]);

   

    ?>
    <div class="recipe">
        <div class="recipe__name"><?php echo $recipeName; ?></div>
        <div class="recipe__content"><?php echo $recipeContent; ?></div>
        <div class="recipe__category"><?php echo $recipeCategory; ?></div>
    </div>
<?php  
} ?>