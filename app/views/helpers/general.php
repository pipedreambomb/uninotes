<?
// General html helpers
class GeneralHelper extends AppHelper {

	var $helpers = array('Html', 'Form');
	function formButtons($deleteBtnId = null) {
?>
     <div class="submit">
	 <?php 
		echo $this->Form->submit(__('Submit', true), array('name' => 'ok', 'class' => 'btn-primary btn-float', 'div' => false)); 
		if(isset($deleteBtnId)) {
			echo $this->Html->link(__('Delete', true), array('action' => 'delete', $deleteBtnId), array('class'=>'btn btn-danger'), sprintf(__('Are you sure you want to delete # %s?', true), $deleteBtnId)); 
		} else {
			echo $this->Form->submit(__('Cancel', true), array('name' => 'cancel','div' => false, 'class' => 'btn-float')); 
		}
	?>
     </div>
<? 	}

}
