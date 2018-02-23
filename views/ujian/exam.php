<?php 

use yii\web\View;
use yii\helpers\Html;
use yii\widgets\Pjax;

$minute[0] = 0;
$id = 1;

$this->registerJs(
	"
	var getJawaban = function(nomorSoal){
		var selected = [];
		$('#tab_'+nomorSoal+' input:checked').each(function() {
		    selected.push($(this).attr('value'));
		});
		return selected;
	}

	var setBiscuit = function(nomorSoal){
    	var minute = 0 ;
    	var now = new Date();
    	var expiryDate = now.setMinutes(now.getMinutes() + minute);
    	expiryDate = new Date(expiryDate);
    	
    	// alert(expiryDate);
    	document.cookie = 'ujianx='+" . $id. "+'-' +nomorSoal+';path=/;expires='+expiryDate;
    	// console.log('set cookie');
    }

    var move = function(number, code){
		if(code == 0){ //move back
			moveToElem = number -1;
		}else{ //move forward
			moveToElem = number +1;
		}
		elem = number; 
		$('#soal-nav-tab li:eq('+ (moveToElem - 1) +') a').tab('show');
		setBiscuit(moveToElem);
	}

	", View::POS_HEAD
);
 ?>
<div class="tab-content">
	<?php 
		$tabId = 0; 
	?>
	<?php foreach ($soalUjian as $soal): ?>
		<?php 
			$isActive = ($soal->id ==2) ? 'active' : '';
		 ?>
		<div class="tab-pane <?php echo $isActive ?>" id="tab_<?php echo $tabId ?>">
			<div class="row">
				<div class="panel panel-info">
					<div class="panel-body">
						<?php echo $soal->soal ?>
					</div>
				</div>
			</div>
			<div class="row">
				<?php 
					if(0 < $tabId){
						echo "<a href='#tab_". ($tabId -1) ."' class='btn btn-info' data-toggle='tab'>Prev</a>";
						//echo Html::a('Prev',['detail'], ['data-toggle' =>'modal', 'data-target'=>'#detail-modal', 'id' => 'detail-button', 'class' => 'btn btn-info']) ;
					}
					echo "&nbsp;";
					if(count($soalUjian) > $tabId){
						echo "<a href='#tab_". ($tabId +1) ."' class='btn btn-info' data-toggle='tab'>Next</a>";
						//echo Html::a('Next',['detail'], ['data-toggle' =>'modal', 'data-target'=>'#detail-modal', 'id' => 'detail-button', 'class' => 'btn btn-info']);
					}
				 ?>
			</div>
			<?php $tabId++ ?>
		</div>
	<?php endforeach ?>
	</div>
</div>