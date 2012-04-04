<div class="container-fluid">
<div class="row">
<div class="span8 offset2">
<? //echo $this->Breadcrumbs->crumbs();?>
<h1><? echo $userProfile['User']['username'] ?></h1>
<em><?
	if($isSelf) {
		echo "This is your profile page as others will see it. Click here to go to your " . $this->Html->link('Dashboard', array('action' => 'dashboard'));
	}
?></em>
<div>
<h2>Recent Activity</h2>
	<? echo $this->lists->activity($activity); ?>
</div>
</div>
<div class="span4">
<? echo $this->lists->following($userProfile); ?>
</div>
