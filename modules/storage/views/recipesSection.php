<section class="recipes">
    <div class="recipes-list">
        <h3 class="recipes-list__title">Рецепты</h3>
        <?php print_r($data['recipesListView']); ?>
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