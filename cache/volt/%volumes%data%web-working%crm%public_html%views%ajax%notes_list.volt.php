<?php if (($notes && $this->length($notes) > 0)) { ?>
    <?php foreach ($notes as $note) { ?>
        <div class="m-widget3__item">
            <div class="m-widget3__header">
                <div class="m-widget3__user-img">
                    <img class="m-widget3__img" src="<?= $note['user_avatar_url'] ?>" alt="">
                </div>
                <div class="m-widget3__info">
                                <span class="m-widget3__username">
                                    <?= $note['user_name'] ?>
                                </span>
                    <br>
                    <span class="m-widget3__time">
                                    <?= $note['note_created_at'] ?>
                                </span>
                </div>

            </div>
            <div class="m-widget3__body">
                <p class="m-widget3__text">
                    <?= $note['note_content'] ?>
                </p>
            </div>
        </div>
    <?php } ?>
<?php } ?>