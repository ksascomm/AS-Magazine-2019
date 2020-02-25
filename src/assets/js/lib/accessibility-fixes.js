jQuery(document).ready( function($) {
	$('.mobile-off-canvas-menu ul li').removeAttr('role', 'treeitem');
	$('.mobile-off-canvas-menu ul li').attr('role', 'menuitem');
});