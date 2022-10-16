<form class="recipes-add-form">
        <div class="recipes-add-form__inputs-wrapper">
            <label class="recipes-add-form__input-label" for="recipes-add-form__input-name">Название</label>
            <input name="recipes-add-form__input-name" type="text" class="recipes-add-form__input name">

            <label class="recipes-add-form__input-label" for="recipes-add-form__input-content">Рецепт</label>
            <textarea name="recipes-add-form__input-content" type="text" class="recipes-add-form__input content" cols="30" rows="10" ></textarea>

            <select class="recipes-add-form__categories" size="4" name="recipes-add-form__categories">
                <option selected value="1">Breakfast</option>
                <option value="2">Lunch</option>
                <option value="3">Dinner</option>
                <option value="4">Dessert</option>
            </select>
        </div>
        <a class="recipes-add-form__btn button plus">
            <!-- Добавить рецепт -->
        </a>
</form>