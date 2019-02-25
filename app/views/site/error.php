<?php
use yii\helpers\Html;
$this->title = $name;
?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="alert alert-danger">
    <?= nl2br(Html::encode($message)) ?>
</div>

<p>
    Chúng tôi không tìm thấy trang bạn yêu cầu :(
</p>
<p>
    Hãy thông báo giúp chúng tôi nếu bạn cảm thấy lỗi phát sinh từ phía server! Cảm ơn
</p>
