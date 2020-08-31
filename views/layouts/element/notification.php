<?php
if (!class_exists('\rabint\notify\models\Notification')) {
    return;
}

$notifyModel = \rabint\notify\models\Notification::find()->where(['user_id' => NULL, 'seen' => \rabint\notify\models\Notification::SEEN_STATUS_NO]);
$notify = $notifyModel->count('*');
?>
<li class="c-header-nav-item dropdown d-md-down-none mx-2"><a class="c-header-nav-link"
                                                              data-toggle="dropdown" href="#"
                                                              role="button"
                                                              aria-haspopup="true"
                                                              aria-expanded="false">
        <svg class="c-icon">
            <use xlink:href="<?= $bundleBaseUrl; ?>free.svg#cil-bell"></use>
        </svg>
        <span class="badge badge-pill badge-danger"><?= $notify; ?></span></a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg pt-0">
        <div class="dropdown-header bg-light">
            <strong>
                <?php
                if($notify==0){
                    echo \Yii::t('rabint', 'هیچ اعلانی وجود ندارد');
                }else{
                    echo \Yii::t('rabint', 'شما {count} اعلان سیستمی خوانده نشده دارید', ['count' => $notify]);
                }
                ?>
            </strong>
        </div>
        <?php foreach ($notifyModel->limit(5)->orderby(['id' => SORT_DESC])->all() as $logEntry) : ?>
            <a class="dropdown-item"
               href="<?= \rabint\helpers\uri::to(['/notify/admin/view', 'id' => $logEntry->id]) ?>">
                <div class="message">
                    <div>
                        <small class="text-muted float-right mt-1">
                            <?= \rabint\helpers\locality::secToTime(time() - $logEntry->created_at) ?>
                        </small>
                    </div>
                    <div class="clearfix"></div>
                    <div class="small text-muted text-truncate"><?php echo $logEntry->content; ?></div>
                </div>
            </a>
        <?php endforeach; ?>
        <a class="dropdown-item text-center border-top"
           href="<?= \rabint\helpers\uri::to(['/notify/admin/index']) ?>"><strong><?= \Yii::t('rabint', 'همه اعلانات'); ?></strong>
        </a>

    </div>
</li>
