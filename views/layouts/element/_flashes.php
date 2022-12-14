<?php
$allFlashes = Yii::$app->session->getAllFlashes();
if ($allFlashes) {
    ?>
    <section class="sec-flashes fixed">
        <div class="row">
            <div class="col">
                <?php foreach ($allFlashes as $type => $body) {
                    ?>
                    <div class="alert alert-<?= $type; ?> alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?= print_r($body, TRUE); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php
} ?>