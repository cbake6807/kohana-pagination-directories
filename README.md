kohana-pagination-directories
=============================

Kohana Pagination support for Routes using directories

See Example file for a better formated example
https://github.com/cbake6807/kohana-pagination-directories/blob/master/example_usage.php

class Kohana_Pagination has been modified to include 2 cases for the "directory_route" source. This allows the Pagination class
to get the current URL params form your Route.


Example Controller Usage

```$items = Model_Items::get();```

```$pagination = Pagination::factory(array(
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
));```

```$page_links = $pagination->render();```



Example Route Support

```Route::set('members_pagination', '<directory>(/<controller>(/<action>(/<page>)))', array(
		'directory'	=> '(members)',
		'controller'	=> '(photos|videos|articles)',
		'action'	=> '(index)',
	))
	->defaults(array(
	    'directory'  => 'members',
	    'controller' => 'home',
	    'action'     => 'index',
	    'page'	 => 1,
	));```
