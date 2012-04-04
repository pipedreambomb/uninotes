<?
class ListsHelper extends Helper {

	var $helpers = array('Html');

	function documents($documents, $type, $id) {
		$out = "";

		if (!empty($documents)) {
			$out .= "<table cellpadding = \"0\" cellspacing = \"0\">
				";
			$i = 0;
			foreach ($documents as $document) {
				// Used to display url if name is empty
				//TODO this won't work for docs!
				$displayText = $document['text'] == null ? $document['url'] : $document['text'];
				
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
			$out .= "<tr" . $class . ">" 
				. "<td>" . $this->Html->link($displayText, array('controller' => 'documents', 'action' => 'go', $document['id'])) . "</td>"
				. "</tr>";
			}
			$out .= "</table>";
		}
	$out .= "<div class=\"actions\">
		<ul>
			" . $this->Html->link(__('New Document', true), array('controller' => 'documents', 'action' => 'add', $type, $id), array("class" => "btn"))  . "
		</ul>
		</div>";
		return $out;
	}

	function links($links, $type, $id) {
		$out = "";

		if (!empty($links)) {
			$out .= "<table cellpadding = \"0\" cellspacing = \"0\">
				<tr>
				<th>Link</th>
				<th class=\"actions\">Actions</th>
				</tr>";
			$i = 0;
			foreach ($links as $link) {
				// Used to display url if name is empty
				$displayText = $link['text'] == null ? $link['url'] : $link['text'];
				
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
			$out .= "<tr" . $class . ">" 
				. "<td>" . $this->Html->link($displayText, array('controller' => 'links', 'action' => 'go', $link['id']), array('target' => '_blank')) . "</td>"
				. "<td class=\"actions\">";
			$out .= $this->Html->link(__('Edit', true), array('controller' => 'links', 'action' => 'edit', $link['id']));
				$out .= "
				</td>
				</tr>";
			}
			$out .= "</table>";
		}
	$out .= "<div class=\"actions\">
		<ul>
			<li>" . $this->Html->link(__('New Link', true), array('controller' => 'links', 'action' => 'add', $type, $id))  . "</li>
		</ul>
		</div>";
		return $out;
	}

	function users($users) {
		$out = "";

		if (!empty($users)) {
			$out .= "<table cellpadding = \"0\" cellspacing = \"0\">";
			$i = 0;
			foreach ($users as $user) {
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class=\"altrow\"';
				}
				$out .= sprintf("<tr%s>", $class);
				$out .= $this->Html->link(__($user['username'], true), array('controller' => 'users', 'action' => 'view', $user['id'])); 
				$out .= "</tr>";
			}
			$out .= "</table>";
		}
		return $out;
	
	}

	function activity($activities) {
		foreach ($activities as $activity) {
			?>
			<p>
				<? echo $this->Html->link($activity['User']['username'], array('controller' => 'users', 'action' => 'view', $activity['User']['id'])); ?>
				<? 
				$verb = "";
				$label = "";
				switch ($activity['Log']['action']) {
				case 'add':
					$verb = "added";
					$label = "success";
					break;
				case 'delete':
					$verb = "deleted";
					$label = "important";
					break;
				case 'edit':
					$verb = "edited";
					$label = "info";
					break;
				}
				echo " <span class='label label-" . $label . "'>" . $verb . "</span> ";
				// lower case model name
				echo strtolower($activity['Log']['model']) . " ";
				$controller = Inflector::pluralize($activity['Log']['model']);
				echo $this->Html->link($activity['Log']['title'], array('controller' => $controller, 'action' => 'view', $activity['Log']['model_id']));
				?>
				<? echo " on " . $activity['Log']['created_nice_str']; ?>
			</p>
			<?
		}
	}

	function following($userProfile) {
?>

<h2>Following</h2>
<div class="related">
	<h3><?php __('Organizations');?></h3>
	<?php if (!empty($userProfile['Organization'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<?php
		$i = 0;
		foreach ($userProfile['Organization'] as $organization):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $this->Html->link(__($organization['name'], true), array('controller' => 'organizations', 'action' => 'view', $organization['id'])); ?> </td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
<div class="related">
	<h3><?php __('Events');?></h3>
	<?php if (!empty($userProfile['Event'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<?php
		$i = 0;
		foreach ($userProfile['Event'] as $event):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
		<td>	<?php 
			echo $this->Html->link(__($event['name'], true), array('controller' => 'events', 'action' => 'view', $event['id'])); 
			echo " (" . $event['date_nice_str'] . ")";
			?>
		</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
<div class="related">
	<h3><?php __('Subjects');?></h3>
	<?php if (!empty($userProfile['Subject'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<?php
		$i = 0;
		foreach ($userProfile['Subject'] as $subject):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
		<td><?php echo $this->Html->link(__($subject['name'], true), array('controller' => 'subjects', 'action' => 'view', $subject['id'])); ?>
</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
<?
	}
}
