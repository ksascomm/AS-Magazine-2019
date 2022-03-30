<?php
/**
 * The default template for the "roof"
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

?>
<div class="off-canvas position-top" id="offCanvasTop1" data-off-canvas>
	<div id="global-links" class="grid-x grid-padding-x small-up-2 medium-up-3 large-up-3">
		<h1 class="show-for-sr">Explore KSAS</h1>
		<div class="cell">
			<h3>Academics</h3>
			<ul class="vertical menu" role="menu">
				<li role="menuitem"><a href="http://krieger.jhu.edu/academics/departments-programs-and-centers/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Departments')">Departments, Programs, and Centers</a></li>
				<li role="menuitem"><a href="http://krieger.jhu.edu/people/faculty-directory/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Faculty')">Faculty Directory</a></li>
				<li role="menuitem"><a href="http://krieger.jhu.edu/academics/fields/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Fields of Study')">Fields of Study</a></li>
				<li role="menuitem"><a href="http://krieger.jhu.edu/academics/majors-minors/" onclick="ga('send', 'event', 'Offcanvas', 'Academics', 'Majors & Minors')">Majors & Minors</a></li>
			</ul>
		</div>
		<div class="cell">
			<h3>Student & Faculty Resources</h3>
			<ul class="vertical menu" role="menu">
				<li role="menuitem"><a href="http://e-catalog.jhu.edu/" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'Academic Catalog')">Academic Catalog</a></li>
				<li role="menuitem"><a href="https://livejohnshopkins.sharepoint.com/sites/KSASFacultyHandbook" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'Faculty Handbook')">Faculty Handbook <span class="fas fa-sign-in-alt"></span></a></li>
				<li role="menuitem"><a href="https://studentaffairs.jhu.edu/registrar" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'Registrars')">Registrar's Office</a></li>
				<li role="menuitem"><a href="https://policies.jhu.edu/" onclick="ga('send', 'event', 'Offcanvas', 'Resources', 'Policy Library')">University Policies & Document Library <span class="fas fa-sign-in-alt"></span></a></li>		
			</ul>
		</div>
		<div class="cell">
			<h3>Across Campus</h3>
			<ul class="vertical menu" role="menu">
				<li role="menuitem"><a href="https://www.jhu.edu/admissions/" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'Admissions')">Admissions & Aid</a></li>
				<li role="menuitem"><a href="https://www.jhu.edu/" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'JHU Home')">Johns Hopkins University Website</a></li>
				<li role="menuitem"><a href="https://www.jhu.edu/maps-directions/" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'Maps/Directions')">Maps & Directions</a></li>
				<li role="menuitem"><a href="https://my.jh.edu/portal/web/jhupub" onclick="ga('send', 'event', 'Offcanvas', 'Campus', 'myJHU')">myJHU</a></li>
			</ul>
		</div>
		<button class="close-button" aria-label="Close menu" type="button" data-close>
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
</div>
