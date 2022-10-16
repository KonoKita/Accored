<div class="month">

<?php 
if($data['foodPlan'] === false){
    ?>
    <a href = "javascript:void(0);" class="create-food-plan-btn button">Создать план питания</a>
    <?php 

}
else{
    foreach($data['foodPlan'] as $date => $dayPlan){
        $breakfast = $dayPlan['breakfast'];
        $lunch = $dayPlan['lunch'];
        $dinner = $dayPlan['dinner'];
        ?>

        <div class="day">   
            <div class="day__date"> 
                <?php 
                    echo $date;  
                ?>
            </div>
            
            <div class="meal">   
                <label class="meal__label" for="meal__name">Завтрак</label>
                <div class="meal__name"><?php echo $breakfast['name']; ?></div>
            </div>

            <div class="meal">  
                <label class="meal__label" for="meal__name">Обед</label>
                <div class="meal__name"><?php echo $lunch['name']; ?></div>
            </div>

            <div class="meal">  
                <label class="meal__label" for="meal__name">Ужин</label>
                <div class="meal__name"><?php echo $dinner['name']; ?></div>
            </div>

        </div>
    <?php  
    }

} ?>

</div>
