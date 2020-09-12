<?php

use rabint\pm\models\Message;

$items = Message::find()
    ->andWhere([
        'receiver_id' => \rabint\helpers\user::id(),
        'read' => Message::READ_STATUS_NO,
    ])->limit(10);
//if ($this->timeLimit) {
//    $items->andWhere(['>=', 'created_at', time() - $this->timeLimit]);
//}
$items->orderBy(['read' => SORT_ASC, 'created_at' => SORT_DESC]);
$items = $items->all();
$count = count($items);
?>

<li class="c-header-nav-item dropdown d-md-down-none mx-2"><a class="c-header-nav-link"
                                                              data-toggle="dropdown" href="#"
                                                              role="button"
                                                              aria-haspopup="true"
                                                              aria-expanded="false">
        <svg class="c-icon">
            <use xlink:href="<?= $bundleBaseUrl; ?>free.svg#cil-envelope-open"></use>
        </svg>
        <?php if($count){ ?>
            <span class="badge badge-pill badge-info"><?=$count;?></span></a>
        <?php }?>

    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg pt-0">
        <div class="dropdown-header bg-light">
            <strong>
            <?php
            if (empty($items)) {
                echo \Yii::t('rabint', 'تا کنون پیامی برای شما ارسال نشده است.');
            }else{
                echo \Yii::t('rabint', 'شما {count} پیام خوانده نشده دارید',['count'=>$count]);
            }
            ?>
            </strong>
        </div>
        <?php

        foreach ($items as $item) { ?>
            <a class="dropdown-item" href="<?= \rabint\helpers\uri::to(['/pm/default/view', 'id' => $item->id]); ?>">
                <div class="message">
                    <div class="py-3 mfe-3 float-left">
                        <div class="c-avatar"><img class="c-avatar-img" src="<?php echo isset($item->user->userProfile)?$item->user->userProfile->getAvatar(NULL, 'tiny'):'' ?>"
                                                   alt="user@email.com"><span
                                    class="c-avatar-status bg-success"></span></div>
                    </div>
                    <div><small class="text-muted">John Doe</small>
                        <small class="text-muted float-right mt-1">
                            <?= \rabint\helpers\locality::jdate('j F Y H:i', $item->created_at); ?>
                        </small>
                    </div>
                    <div class="text-truncate font-weight-bold">
                        <?= $item->subject; ?>
                    </div>
                    <div class="small text-muted text-truncate">
                        <?= $item->subject; ?>
                    </div>
                </div>
            </a>
        <?php } ?>
        <a class="dropdown-item text-center border-top" href="<?= \rabint\helpers\uri::to(['/pm/default/index']); ?>"><strong><?=\Yii::t('app','مشاهده همه پیام ها');?></strong></a>
    </div>
</li>