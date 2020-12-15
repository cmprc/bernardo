<?php (defined('BASEPATH')) or exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| Active template
|--------------------------------------------------------------------------
|
| The $template['active_template'] setting lets you choose which template
| group to make active.  By default there is only one group (the
| "default" group).
|
*/
$template['active_template'] = 'default';

/*
|--------------------------------------------------------------------------
| Explaination of template group variables
|--------------------------------------------------------------------------
|
| ['template'] The filename of your master template file in the Views folder.
|   Typically this file will contain a full XHTML skeleton that outputs your
|   full template or region per region. Include the file extension if other
|   than ".php"
| ['regions'] Places within the template where your content may land.
|   You may also include default markup, wrappers and attributes here
|   (though not recommended). Region keys must be translatable into variables
|   (no spaces or dashes, etc)
| ['parser'] The parser class/library to use for the parse_view() method
|   NOTE: See http://codeigniter.com/forums/viewthread/60050/P0/ for a good
|   Smarty Parser that works perfectly with Template
| ['parse_template'] FALSE (default) to treat master template as a View. TRUE
|   to user parser (see above) on the master template
|
| Region information can be extended by setting the following variables:
| ['content'] Must be an array! Use to set default region content
| ['name'] A string to identify the region beyond what it is defined by its key.
| ['wrapper'] An HTML element to wrap the region contents in. (We
|   recommend doing this in your template file.)
| ['attributes'] Multidimensional array defining HTML attributes of the
|   wrapper. (We recommend doing this in your template file.)
|
| Example:
| $template['default']['regions'] = array(
|    'header' => array(
|       'content' => array('<h1>Welcome</h1>','<p>Hello World</p>'),
|       'name' => 'Page Header',
|       'wrapper' => '<div>',
|       'attributes' => array('id' => 'header', 'class' => 'clearfix')
|    )
| );
|
*/

/*
|--------------------------------------------------------------------------
| Default Template Configuration (adjust this or create your own)
|--------------------------------------------------------------------------
*/

$template['default']['template'] = 'default';
$template['default']['regions'] = array(
    'title' => array(
        'content' => array('Welcome Title'),
        'name' => 'Page Title',
    ),
    'header' => array(
        'content' => array(''),
        'name' => 'Page Header',
        // 'wrapper' => '<header>',
        // 'attributes' => array('class' => 'header')
    ),
    'metadata',
    'breadcrumb' => array(
        'content' => array(''),
        'name' => 'Page Breadcrumb',
        // 'wrapper' => '<aside>',
        // 'attributes' => array('class' => 'breadcrumb')
    ),
    'sidebar' => array(
        'content' => array(''),
        'name' => 'Menu Content',
        // 'wrapper' => '<section>',
        // 'attributes' => array('class' => 'content')
    ),
    'content' => array(
        'content' => array(''),
        'name' => 'Page Content',
        // 'wrapper' => '<section>',
        // 'attributes' => array('class' => 'content')
    ),
    'footer' => array(
        'content' => array(''),
        'name' => 'Page Footer',
        // 'wrapper' => '<footer>',
        // 'attributes' => array('class' => 'footer')
    )
);

$template['login']['parser'] = 'parser';
$template['login']['parser_method'] = 'parse';
$template['login']['parse_template'] = false;
$template['login']['template'] = 'login';
$template['login']['regions'] = array(
    'title' => array(
        'content' => array('Welcome Title'),
        'name' => 'Page Title',
    ),
    'header' => array(
        'content' => array(''),
        'name' => 'Page Header'
    ),
    'metadata',
    'breadcrumb' => array(
        'content' => array(''),
        'name' => 'Page Breadcrumb'
    ),
    'sidebar' => array(
        'content' => array(''),
        'name' => 'Menu Content'
    ),
    'content' => array(
        'content' => array(''),
        'name' => 'Page Content'
    ),
    'footer' => array(
        'content' => array(''),
        'name' => 'Page Footer'
    )
);

$template['login']['parser'] = 'parser';
$template['login']['parser_method'] = 'parse';
$template['login']['parse_template'] = false;

$template['simple']['parser'] = 'parser';
$template['simple']['parser_method'] = 'parse';
$template['simple']['parse_template'] = false;
$template['simple']['template'] = 'simple';
$template['simple']['regions'] = array(
    'title' => array(
        'content' => array('Welcome Title'),
        'name' => 'Page Title',
    ),
    'header' => array(
        'content' => array(''),
        'name' => 'Page Header'
    ),
    'metadata',
    'breadcrumb' => array(
        'content' => array(''),
        'name' => 'Page Breadcrumb'
    ),
    'sidebar' => array(
        'content' => array(''),
        'name' => 'Menu Content'
    ),
    'sidebar' => array(
        'content' => array(''),
        'name' => 'Menu Content'
    ),
    'content' => array(
        'content' => array(''),
        'name' => 'Page Content'
    ),
    'footer' => array(
        'content' => array(''),
        'name' => 'Page Footer'
    )
);
