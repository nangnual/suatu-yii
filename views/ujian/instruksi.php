<?php 

use yii\helpers\Html;
 ?>
<p>
	<?php echo $ujian->instruksi ?>
</p>
<?= Html::a('Setuju', ['exam', 'token' => $token], ['class' => 'btn btn-success align-center']) ?>
