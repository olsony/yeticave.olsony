
    <?php $class_error = count($errors) ? " form--invalid" : ""; ?>
    <form class="form form--add-lot container <?=$class_error; ?>" action="add.php" method="post"
          enctype="multipart/form-data"> <!-- form--invalid -->
        <h2>Добавление лота</h2>
        <div class="form__container-two">
            <?php $class_error = isset($errors['name']) ? 'form__item--invalid' : '';
            $error = isset($errors['name']) ? $errors['name'] : "";
            $value = isset($lot['name']) ? $lot['name'] : "";
            ?>
            <div class="form__item <?=$class_error; ?>"> <!-- form__item--invalid -->
                <label for="lot-name">Наименование</label>
                <input id="lot-name" type="text" name="lot[name]" placeholder="Введите наименование лота" required
                       value="<?=htmlspecialchars($value); ?>">
                <span class="form__error"><?=$error; ?></span>
            </div>

            <?php $class_error = isset($errors['category']) ? 'form__item--invalid' : '';
            $error = isset($errors['category']) ? $errors['category'] : "";
            $value = isset($lot['category']) ? $lot['category'] : "";
            ?>
            <div class="form__item <?= "$class_error"; ?>">
                <label for="category">Категория</label>
                <select id="category" name="lot[category]" required>
                    <option>Выберите категорию</option>
                    <?php foreach ($categories as $key => $val): ?>
                        <option
                                value="<?= htmlspecialchars($val); ?>"<?php if ($val === $value): echo ' selected'; endif; ?>>
                                <?=htmlspecialchars($val); ?></option>
                    <?php endforeach; ?>
                </select>
                <span class="form__error"><?=$error; ?></span>
            </div>
        </div>

        <?php $class_error = isset($errors['desc']) ? 'form__item--invalid' : '';
        $error = isset($errors['desc']) ? $errors['desc'] : "";
        $value = isset($lot['desc']) ? $lot['desc'] : "";
        ?>
        <div class="form__item form__item--wide <?=$class_error; ?>">
            <label for="message">Описание</label>
            <textarea id="message" name="lot[desc]" placeholder="Напишите описание лота"
                      required><?= htmlspecialchars($value); ?></textarea>
            <span class="form__error"><?=$error; ?></span>
        </div>

        <?php $class_error = !isset($errors['img_src']) ? 'form__item--uploaded' : 'form__item--file ';
              $lot_img = !isset($errors['img_src']) ? $lot["img_src"] : '';
              $label_dobavyty = !isset($errors['img_src']) ? '' : '+ Добавить';
              $label_x = !isset($errors['img_src']) ? '' : 'x';
        ?>
               <div class="form__item <?=$class_error; ?>"> <!-- form__item--uploaded -->
            <label>Изображение</label>
            <div class="preview">
                <button class="preview__remove" type="button"><?=$label_x; ?></button>
                <div class="preview__img">
                    <img src="<?=$lot_img; ?>" width="113" height="113" alt="Изображение лота">
                </div>
            </div>
            <div class="form__input-file">
                <input class="visually-hidden" type="file" id="photo2" value="" name="img_src">
                <label for="photo2">
                    <span><?=$label_dobavyty; ?></span>
                </label>
            </div>
        </div>

        <div class="form__container-three">
            <?php $class_error = isset($errors['initial_price']) ? 'form__item--invalid' : '';
            $error = isset($errors['initial_price']) ? $errors['initial_price'] : "";
            $value = isset($lot['initial_price']) ? $lot['initial_price'] : "";
            ?>
            <div class="form__item form__item--small <?=$class_error; ?>">
                <label for="lot-rate">Начальная цена</label>
                <input id="lot-rate" type="number" name="lot[initial_price]" placeholder="0" required value="<?=htmlspecialchars($value); ?>">
                <span class="form__error"><?= $error ?></span>
            </div>

            <?php $class_error = isset($errors['step_rate']) ? 'form__item--invalid' : '';
            $error = isset($errors['step_rate']) ? $errors['step_rate'] : "";
            $value = isset($lot['step_rate']) ? $lot['step_rate'] : "";
            ?>
            <div class="form__item form__item--small">
                <label for="lot-step">Шаг ставки</label>
                <input id="lot-step" type="number" name="lot[step_rate]" placeholder="0" required value="<?=htmlspecialchars($value); ?>">
                <span class="form__error"><?=$error; ?></span>
            </div>
            <?php $class_error = isset($errors['completion_date']) ? 'form__item--invalid' : '';
            $error = isset($errors['completion_date']) ? $errors['completion_date'] : "";
            $value = isset($lot['completion_date']) ? $lot['completion_date'] : "";
            ?>
            <div class="form__item">
                <label for="lot-date">Дата окончания торгов</label>
                <input class="form__input-date" id="lot-date" type="date" name="lot[completion_date]" required
                       value="<?=htmlspecialchars($value); ?>">
                <span class="form__error"><?=$error; ?></span>
            </div>
        </div>
        <?php if (isset($errors)): ?>
            <div class="form__errors">
                <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
                <ul>
                    <?php foreach ($errors as $err => $val): ?>
                        <li><strong><?=$dicts[$err]; ?>:</strong><?=htmlspecialchars($val); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <button type="submit" class="button">Добавить лот</button>
    </form>
