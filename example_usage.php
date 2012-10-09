kohana-pagination-directories
=============================

Kohana Pagination support for Routes using directories


Example Controller Usage

<?php

$items = Model_Items::get();

$pagination = Pagination::factory(array(
    'total_items'    => count($items),
    'items_per_page' => 14,
    'view'			 => 'pagination/basic',
    'auto_hide'		 => TRUE,
    'current_page'	 => array(
	    "key"		=> "page",
	    "directory"		=> $this->request->directory(),
	    "controller"	=> $this->request->controller(),
	    "action"		=> $this->request->action(),
	    "source"		=> "directory_route",
    ),
));

$page_links = $pagination->render();

?>

Example Route Support


<?php

Route::set('members_pagination', '<directory>(/<controller>(/<action>(/<page>)))', array(
		'directory'	=> '(members)',
		'controller'	=> '(photos|videos|articles)',
		'action'	=> '(index)',
	))
	->defaults(array(
	    'directory'  => 'members',
	    'controller' => 'home',
	    'action'     => 'index',
	    'page'	 => 1,
	));
?.