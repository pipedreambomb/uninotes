<?
class ListsHelper extends Helper {

	var $helpers = array('Html');

	function links($links) {
		$out = "";
		if (!empty($links)) {
			$out .= "<table cellpadding = \"0\" cellspacing = \"0\">
				<tr>
				<th>Link</th>
				<th class=\"actions\">Actions</th>
				</tr>";
			$i = 0;
			foreach ($links as $link) {
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
			$out .= "<tr" . $class . ">" 
				. "<td>" . $this->Html->link($link['text'], $link['url']) . "</td>"
				. "<td class=\"actions\">";
			$out .= $this->Html->link(__('Edit', true), array('controller' => 'links', 'action' => 'edit', $link['id']));
				$out .= $this->Html->link(__('Delete', true), array('controller' => 'links', 'action' => 'delete', $link['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $link['id']));
				$out .= "
				</td>
				</tr>";
			}
			$out .= "</table>";
		}
	$out .= "<div class=\"actions\">
		<ul>
			<li>" . $this->Html->link(__('New Link', true), array('controller' => 'links', 'action' => 'add')) . "</li>
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
				$this->Html->link(__($user['username'], true), array('controller' => 'users', 'action' => 'view', $user['id'])); 
				$out .= "</tr>";
			}
			$out .= "</table>";
		}
	
	}
}
