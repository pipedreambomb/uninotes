<?
class BreadcrumbsHelper extends Helper {

	var $helpers = array('Html');

	//Return 'breadcrumb trail' for page, e.g. Home > Users
	//TODO : am leaving out third level for now as it gets quite complicated (need name and id to formulate link generally, plus other possibilities like Add (seperate function?))
	function crumbs() {
		$controller = $this->params['controller'];
		$action = $this->params['action'];
		$out = "";

		$out .= $this->Html->addCrumb(ucfirst($controller), '/' . $controller); //ucfirst() capitalizes first letter
		//$out .= $this->Html->addCrumb(ucfirst($action), '/' . $controller . '/' . $action); 
		return $out;
	}

}
