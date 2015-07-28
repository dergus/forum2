<?php 

use yii\helpers\Html

?>
<div class="row">
<div class="col-xs-12">
<div class="message">



    <div class="avatar"></div>

	<div class="head">

		<span class="author"><?= Html::encode($model->author->name)?></span>

		<span class="time"><?= Html::encode($model->created_at)?></span>
		<div class="clearfix"></div>
	</div>

	<div class="body"><?= Html::encode($model->text)?></div>

	<div class="reply-ctn">
		<a class="reply">reply</a>
		<div class="clearfix"></div>
	</div>

</div>

</div>
</div>