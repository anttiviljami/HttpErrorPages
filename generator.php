<?php
/**
 * HttpErrorPages HTML Generator
 */

$config = array(
	'footer' => '<a href="https://seravo.com">seravo.com</a> | <a href="https://wp-palvelu.fi">wp-palvelu.fi</a>'
);

// load pages
$pages = require('pages.php');

// load inline css
$css = trim(file_get_contents('Resources/Layout.css'));

// generate each error page
foreach ($pages as $code => $page){

	// assign variables
	$v_code = $code;
	$v_title = nl2br(htmlspecialchars($page['title']));
	$v_message = nl2br(htmlspecialchars($page['message']));

	// render template
	ob_start();
	require('template.phtml');
	$errorpage = ob_get_clean();

	// store template
	file_put_contents('Build/'.$v_code.'.html', $errorpage);
}
