<?
class ListsHelper extends Helper {

	var $helpers = array('Html');

	function documents($documents, $type, $id) {
		$out = "";

		if (!empty($documents)) {
			$out .= "<table cellpadding = \"0\" cellspacing = \"0\">
				<tr>
				<th>Document</th>
				<th class=\"actions\">Actions</th>
				</tr>";
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
				. "<td class=\"actions\">";
			$out .= $this->Html->link(__('Edit', true), array('controller' => 'documents', 'action' => 'edit', $document['id']));
				$out .= $this->Html->link(__('Delete', true), array('controller' => 'documents', 'action' => 'delete', $document['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $document['id']));
				$out .= "
				</td>
				</tr>";
			}
			$out .= "</table>";
		}
	$out .= "<div class=\"actions\">
		<ul>
			<li>" . $this->Html->link(__('New Document', true), array('controller' => 'documents', 'action' => 'add', $type, $id))  . "</li>
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
				. "<td>" . $this->Html->link($displayText, array('controller' => 'links', 'action' => 'go', $link['id'])) . "</td>"
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
}
