<?php
$cakeDescription = __d('cake_dev', ' ');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head> 
	<?php   echo $this->Html->charset(); 
			echo $this->Html->meta('keywords', $this->fetch( 'head_keywords' ) );
			echo $this->Html->meta('description', $this->fetch( 'head_description' ) );
	?>
	<title>
		<?php echo $title_for_layout; 
		//$params[0][0] =  $title_for_layout.".pdf";
		//$this->set($params); DejaVuSansCondensed.ttf
		/*@font-face {
    font-family: myFirstFont;
    src: url(\css\fonts\andlso.ttf);
}

body {  
    font-family: 'myFirstFont'  
}
*/
		?>
	</title>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<style>

/** RESET AND CLEARFIX
================================================**/

html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed,
figure, figcaption, footer, header, hgroup,
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure,
footer, header, hgroup, menu, nav, section {
	display: block;
}
body {
	line-height: 1;
	color: #414141;
	background: #f5f5f5;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

/** TYPOGRAPHY
================================================**/

a {
	color: bleu;
	text-decoration: none;
}

a:hover {
	text-decoration: underline;
}

em {
	font-style: italic;
}

strong {
	font-weight: bold;
}

h1, h2, h3, h4, h5, h6 { 
	font-weight: bold;
}

h1 {
	font-size: 3.5em;
}

h2 {
	font-size: 2.375em;
	margin-bottom: 35px;
}

h3 {
	font-size: 1.375em;
	margin-bottom: 10px;
}

p {
	font-size: .875em;
	line-height: 1.35em;
	color: #555;
	margin-bottom: 20px;
}

p.intro {
	font-size: 1.125em;
	margin-bottom: 35px;
}

pre {
	margin: 15px 0;
	overflow: auto;
	word-wrap: normal!important;
}

code {
	/*width: 1000px;*/
}

hr {
	border: 0;
	border-top: solid #ddd 1px;
	margin: 40px 0;
}

/** LAYOUT
================================================**/

.inner {
	width: 1000px;
	position: relative;
	margin: 0 auto;
}

#main {
	padding: 50px 0;
}

#primary {
	margin: 0 270px 0 0;
	position: relative;
}

aside {
	width: 230px;
	float: right;
}

/** HOME
================================================**/

.home h1 {
	text-align: center;
	line-height: 1.25em;
	font-size: 3.75em;
}

.home .bx-wrapper {
	margin: 30px auto 40px;
}

.home #primary ul {
	margin: 0 0 40px 16px;
}

.home #primary li {
	list-style: disc;
	margin-bottom: 10px;
	color: #555;
	font-size: 1em;
}

.pictogram {
/*	margin: 60px 0 90px 20px;*/
	padding: 20px 0;
	text-align: center;
}

.pictogram div {
	display: inline-block;
	position: relative;
}

.pictogram .icon-icomoon-desktop {
	font-size: 8em;
}

.pictogram .icon-icomoon-tablet {
	font-size: 6em;
	top: -15px;
}

.pictogram .icon-icomoon-phone {
	font-size: 4em;
	top: -30px;
}

.pictogram .icon-fontello-thumbs-up {
	font-size: 7em;
	top: -30px;
}

.pictogram .operator {
	color: #c5c5c5;
	margin: 0 20px;
	top: -45px;
	font-size: 3.5em;
	font-weight: bold;
}

.step {
	margin-bottom: 45px;
}

.home p.pop {
	color: #de3329;
	text-align: center;
	font-size: 1.5em;
	font-weight: bold;
	margin: 6px 0 80px; 
}

/** EXAMPLES
================================================**/

.example-item h1 {
	font-size: 2.5em;
	margin-bottom: 30px;
}

.code-switch {
	margin-top: 20px;
	height: 25px;
}

.code-switch a {
	display: block;
	width: 70px;
	color: #fff;
	text-align: center;
	float: left;
	background: #989898;
	padding: 5px 0; 
	font-size: .875em;
}

.code-switch a.active {
	background: #5280dd;
}

.code-switch .js {
	-moz-border-radius: 5px 0 0 5px;
	-webkit-border-radius: 5px 0 0 5px;
	border-radius: 5px 0 0 5px;
}

.code-switch .html {
	-moz-border-radius: 0 5px 5px 0;
	-webkit-border-radius: 0 5px 5px 0;
	border-radius: 0 5px 5px 0;
}

.code-wrap .code {
	display: none;
}

.code-wrap .code.active {
	display: block;
}

.example-item .examples-list {
	margin-top: 60px;
}

.examples-list ol {
	margin-left: 30px;
}

.examples-list ol li {
	list-style: decimal;
	color: #666;
	margin-bottom: 8px;
}

.example-item ol li {
	font-size: .875em;
}

.example-item .slider a {
	line-height: 1.5em;
}

.example-item #bx-pager {
	text-align: center;
	margin-top: -30px;
}

.example-item #bx-pager a {
	margin: 0 3px;
}

.example-item #bx-pager a img {
	padding: 3px;
	border: solid #ccc 1px;
}

.example-item #bx-pager a:hover img,
.example-item #bx-pager a.active img {
	border: solid #5280DD 1px;
}

/** CAROUSEL DEMYSTIFIED
================================================**/

.carousel-demystified aside { display: none; }
.carousel-demystified #primary { margin: 0;}

.carousel-demystified h2 {
	font-size: 1.75em;
	margin-bottom: 30px;
}

.carousel-demystified ol li {
	list-style: decimal;
	margin: 0 0 5px 50px;
	line-height: 1.35em;
	color: #555;
}

/** OPTIONS
================================================**/

.options h1 {
	margin-bottom: 10px;
}

.options h2 {
	font-size: 1.5em;
	margin-bottom: 15px;
}

.option-name {
	font-weight: bold;
	font-size: .875em;
	margin-bottom: 2px;
}

.option-desc {
	font-size: .8em;
	line-height: 1.25em;
	color: #666;
}

.options pre {
	margin: 10px 0 25px;
}

.category-wrap {
	margin-bottom: 40px;
}

.reference-wrap {
	position: absolute;
	top: 0;
	right: 0;
	background: #e4e4e4;
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	border-radius: 10px;

}

.reference-wrap h3 {
	font-size: 1.125em;
	margin: 0;
	background: #e4e4e4;
	padding: 10px 15px;
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	border-radius: 10px;
	cursor: pointer;
	text-align: right;
}

.reference-wrap h3 span {
	color: #939393;
	position: relative;
	top: 2px;
	margin-left: 5px;
}

.reference-content {
	padding: 20px;
	display: none;
}

.reference-content h4 {
	margin-bottom: 5px;
}

.reference-content a {
	display: block;
	font-size: .8em;
	padding: 3px 0;
}

.reference-content .col {
	margin-bottom: 20px;
}

.reference-content .col-wrap {
/*	width: 125px;
	float: left;
	margin-right: 20px;
*/}

.reference-content .col-wrap.last {
	margin-right: 0;
}

.reference-content-inner {
	/*width: 430px;*/
	height: 300px;
	overflow: auto;
}

/** FAQS
================================================**/

.faqs h3 {
	font-size: 1.15em;
	line-height: 1.25em;
	margin-bottom: 3px;
}

.faqs .questions p {
	margin-bottom: 10px;
}

.faqs .question {
	margin-bottom: 30px;
}

.faqs ul,
.about ul {
	margin: 0 0 20px 20px;
}

.faqs ul li,
.about ul li {
	color: #555;
	font-size: .875em;
	list-style: disc;
	margin-bottom: 7px;
	line-height: 1.25em;
}

/** ABOUT
================================================**/

.about h3 {
	margin-top: 50px;
}


/** SIDEBAR
================================================**/

aside .block {
	padding: 30px 0;
	border-bottom: solid #c2c2c2 1px;
}

aside .block-advert {
	padding-top: 0;
}

aside .block-advert .bsa_it_ad {
	margin-bottom: 5px;
}

aside .block-advert .one .bsa_it_ad .bsa_it_i {
	margin-right: 25px;
}

aside .block-advert .yoggrt-link {
	font-size: .875em;
}

aside .block-buttons {
	padding-bottom: 35px;
}

aside .block-buttons form {
	display: none;
}

aside .btn {
	display: block;
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	border-radius: 10px;
	-moz-box-shadow: 0 5px 0 #9f9f9f;
	-webkit-box-shadow: 0 5px 0 #9f9f9f;
	box-shadow: 0 5px 0 #9f9f9f;
	background: #d8d8d8;
	color: #414141;
	padding: 5px 14px 3px;
	font-weight: bold;
	font-size: 1.5em; 
	position: relative;
}

aside .btn span {
	font-weight: normal;
	position: relative;
	top: 2px;
	padding-right: 4px;
}

aside .btn-donate {
	margin-bottom: 20px;
}

aside .btn-donate span {
	font-size: 1.1em;
	padding-right: 6px;
}

aside .btn:hover {
	color: #5280dd;
	text-decoration: none;
}

aside .btn:hover span {
	color: #414141;
}

aside .btn:active {
	top: 5px;
	-moz-box-shadow: none;
	-webkit-box-shadow: none;
	box-shadow: none;
}

aside h4 {
	font-size: 1.375em;
	line-height: 1.25em;
	margin-bottom: 8px;
}

aside .block-about {
	border-bottom: 0;
	margin-bottom: 0;
}

aside .block p {
	font-size: 1em;
	line-height: 1.25em;
}

aside input[type="text"] {
	border: solid #c2c2c2 1px;
	padding: 3px 5px;
	display: block;
	width: 93%;
	margin-bottom: 10px;
}

aside label {
	font-size: .875em;
	margin-bottom: 3px;
	display: block;
}

aside input[type="submit"] {
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
	background: #5280dd;
	color: #fff;
	padding: 4px 10px;
	border: none;
	font-size: .875em;
	cursor: pointer;
	-webkit-appearance: none;
}

aside input[type="submit"]:hover {
	background: #72cb76;
}

aside .block-signup .error {
	display: none;
	color: red;
	font-size: .875em;
	margin-bottom: 10px;
}

/** HEADER
================================================**/

header {
	background: #e0e0e0;
	border-bottom: solid 3px #c3c3c3;
	
}

.logo {
	width:50%;
	float: left;
	font-size: 2.25em; 
	padding: 18px 0;
}

.logo a {
	color: #414141;
	font-weight: bold;
}

.logo a:hover {
	text-decoration: none;
}

.icon-icomoon-bx-star {
	color: #de3329;
	position: relative;
	top: 4px;
}

header .download {
	position: absolute;
	top: 22px;
	right: 0;
}

nav {
	position: absolute;
	top: 25px;
	right: 150px;
	/*left: 325px;*/
	float:center; 
}

nav a {
	font-size: 1.1em;
	font-weight: bold;
	padding: 0 10px;
	color: #414141;
}

nav a.active,
nav a:hover {
	color: #de3329;
	text-decoration: none;
}

header .btn {
	line-height: 200%;
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	border-radius: 10px;
	-moz-box-shadow: 0 5px 0 #365491;
	-webkit-box-shadow: 0 5px 0 #365491;
	box-shadow: 0 5px 0 #365491;
	background: #5280dd;
	color: #fff;
	padding: 5px 14px 3px;
	font-weight: bold;
	font-size: 1.1em;
	position: relative; 
}

header .btn:hover {
	background: #72cb76;
	-moz-box-shadow: 0 5px 0 #549557;
	-webkit-box-shadow: 0 5px 0 #549557;
	box-shadow: 0 5px 0 #549557;
	text-decoration: none;
}

header .btn:active {
	top: 5px;
	-moz-box-shadow: none;
	-webkit-box-shadow: none;
	box-shadow: none;
}

/** NEWS FLASH
================================================**/

#news-flash {
	background: #414141;
}

#news-flash .inner {

	color: #fff;
}

#news-flash h5 {
	background: url('../img/images/icons/icon_alert.png') left center no-repeat;
	padding: 14px 0 14px 34px;
	margin-left: 5px;
	font-weight: 300;
}

#news-flash a {
	color: #fff;
	padding-left: 10px;
	text-decoration: underline;
}

/** FOOTER
================================================**/

footer {
	background: #e0e0e0;
	border-top: solid 3px #c3c3c3;
	padding: 15px 0 5px; 
}

footer p {
	font-size: 1em;
	margin-bottom: 5px;
}

footer h4 {
	font-size: 1.25em;
	font-weight: bold;
}

footer .left {
	float: right;
	width: 40%;
}
footer .first {
	float: left;
	padding-top: 3px;
	width: 50%;
}
footer .first h4 {
	padding-top: 3px;
}

footer .icon-icomoon-bx-star {
	top: 2px;
}

footer p.pix {
	margin-top: 25px;
}

footer .twitter {
	margin-top: 16px;
}

/** RESPONSIVE BREAKPOINTS
================================================**/

@media(max-width: 1040px){

	.inner {
		width: 100%;
	}

	.reference-wrap {
		right: 20px;
	}

	aside {
		padding-right: 20px;
	}

	#primary {
		padding: 0 20px;
	}

	.home h1 {
		width: 90%;
		font-size: 3em;
		margin: 0 auto;
	}

	.home .bx-wrapper {
		width: 90%;
	}

	.pictogram .operator {
		margin: 0 18px;
	}

	header .logo {
		padding-left: 20px;
	}

	header .download {
		right: 20px;
	}

	header nav {
		right: 170px;
	}

	footer .left {
		width: auto;
		float: none;
		padding-left: 20px;
	}

	footer .first {
		margin-bottom: 30px;
	}

	footer p.pix {
		padding-left: 20px;
	}

}

@media(max-width: 700px){

	#primary {
		margin: 0 0 750px 0;
	}

	aside {
		float: none;
		position: absolute;
		bottom: 0;
		width: 70%;
		padding: 0 20px;
	}

	header .logo {
		margin: 0 auto;
		float: none;
		text-align: center;
		padding: 10px 0;
	}

	header nav {
		position: static;
		text-align: center;
	}

	header .download {
		position: static;
		text-align: center;
		margin: 25px 0;
	}

	.home h1 {
		font-size: 2.25em;
	}

	#main {
		padding-top: 20px;
	}

}

@media(max-width: 500px){

	.example-item h1 {
		font-size: 2em;
		line-height: 1.25em;
	}

	aside {
		font-size: 90%;
	}

	.home p.pop {
		font-size: 1.25em;
		margin-bottom: 30px;
	}

	.reference-wrap {
		display: none;
	}

	footer {
		font-size: 85%;
	}

}

@media(max-width: 400px){

	h1 {
		font-size: 2.5em;
	}

	.example-item h1 {
		font-size: 1.5em;
		line-height: 1.25em;
	}

	.pictogram {
		font-size: 45%;
	}

	.home h1 {
		font-size: 1.75em;
	}

	nav a {
		padding: 0 5px;
	}

	#primary {
		font-size: 100%;
		margin-bottom: 850px;
	}

}

/*body .one .bsa_it_ad { background: transparent; border: none; font-family: inherit; padding: 0 15px 0 10px; margin: 0; text-align: right; }*/
body .one .bsa_it_ad:hover img { -moz-box-shadow: 0 0 3px #000; -webkit-box-shadow: 0 0 3px #000; box-shadow: 0 0 3px #000; }
body .one .bsa_it_ad .bsa_it_i { display: block; padding: 0; float: none; margin: 0 0 5px; }
body .one .bsa_it_ad .bsa_it_i img { padding: 0; border: none; }
body .one .bsa_it_ad .bsa_it_t { padding: 6px 0; }
body .one .bsa_it_ad .bsa_it_d { padding: 0; font-size: 12px; color: #333; }
body .one .bsa_it_p { display: none; }
body #bsap_aplink, body #bsap_aplink:hover { display: block; font-size: 10px; margin: 12px 15px 0; text-align: right; }














form {
	clear: both;
	margin-right: 20px;
	padding: 0;
	width: 95%;
}
fieldset {
	border: none;
	margin-bottom: 1em;
	padding: 16px 10px;
}
fieldset legend {
	color: #e32;
	font-size: 160%;
	font-weight: bold;
}
fieldset fieldset {
	margin-top: 0;
	padding: 10px 0 0;
}
fieldset fieldset legend {
	font-size: 120%;
	font-weight: normal;
}
fieldset fieldset div {
	clear: left;
	margin: 0 20px;
}
form div {
	clear: both;
	margin-bottom: 1em;
	padding: .5em;
	vertical-align: text-top;
}
form .input {
	color: #444;
}
form .required {
	font-weight: bold;
}
form .required label:after {
	color: #e32;
	content: '*';
	display:inline;
}
form div.submit {
	border: 0;
	clear: both;
	margin-top: 10px;
	margin-left: 10px;
}
label {
	display: block;
	font-size: 25px;
	margin-bottom:3px;
}
input, textarea {
	clear: both;
	font-size: 140%; 
	padding: 1%;
	width:98%;
}
select {
	clear: both;
	font-size: 120%;
	vertical-align: text-bottom;
}
select[multiple=multiple] {
	width: 100%;
}
option {
	font-size: 120%;
	padding: 0 3px;
}
input[type=checkbox] {
	clear: left;
	float: left;
	margin: 0px 6px 7px 2px;
	width: auto;
}
div.checkbox label {
	display: inline;
}
input[type=radio] {
	float:left;
	width:auto;
	margin: 6px 0;
	padding: 0;
	line-height: 26px;
}
.radio label {
	margin: 0 0 6px 20px;
	line-height: 26px;
}
input[type=submit] {
	display: inline;
	font-size: 25px;
	width: auto;
}
form .submit input[type=submit] {
	background:#62af56;
	background-image: -webkit-gradient(linear, left top, left bottom, from(#76BF6B), to(#3B8230));
	background-image: -webkit-linear-gradient(top, #76BF6B, #3B8230);
	background-image: -moz-linear-gradient(top, #76BF6B, #3B8230);
	border-color: #2d6324;
	color: #fff;
	text-shadow: rgba(0, 0, 0, 0.5) 0px -1px 0px;
	padding: 8px 10px;
}
form .submit input[type=submit]:hover {
	background: #5BA150;
}
/* Form errors */
form .error {
	background: #FFDACC;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	border-radius: 4px;
	font-weight: normal;
}
form .error-message {
	-moz-border-radius: none;
	-webkit-border-radius: none;
	border-radius: none;
	border: none;
	background: none;
	margin: 0;
	padding-left: 4px;
	padding-right: 0;
}
form .error,
form .error-message {
	color: #9E2424;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	-ms-box-shadow: none;
	-o-box-shadow: none;
	box-shadow: none;
	text-shadow: none;
}


/** Tables **/
.menudetails {
width:18%;
float:left;
background: #e0e0e0;
}
.menufooter {
float:none;
width:100%;
background: #e0e0e0;
box-shadow: 2px 2px 2px 2px #000;
}
.affichage{

}

.affichage table {
	border-right:0;
	clear: both;
	color: #333;
	margin-bottom: 10px;
	width: 100%;box-shadow: 2px 2px 1px #000;
}
.affichage th {
	border:0;
	border-bottom:2px solid #555;
	text-align: left;
	padding:4px;
	/*background:#000;*/
	background-color:rgba(0,0,0,0.1);
	color:#000;
	
}
.affichage th a {
	display: block;
	padding: 2px 4px;
	text-decoration: none;
}
.affichage th a.asc:after {
	content: ' ⇣';
}
.affichage th a.desc:after {
	content: ' ⇡';
}
.affichage table tr td {
	padding: 6px;
	text-align: left;
	vertical-align: top;
	border-bottom:1px solid #ddd;
}
.affichage table tr:nth-child(even) {
	background: #f9f9f9;
}
.affichage td.actions {
	text-align: center;
	white-space: nowrap;
}
.affichage table td.actions a {
	margin: 0px 6px;
	padding:2px 5px;
}
.affichage h2{
margin: 0px 0px 0px 0px;
font-size:20px;
color:#dd363d;
text-align:left;
}
.affichage h1{
font-size:30px; 
text-align:left;
}

/****/
.affichagear{
text-align: right;
}

.affichagear table {
text-align: right;
	border-right:0;
	clear: both;
	color: #333;
	margin-bottom: 10px;
	width: 100%;box-shadow: 2px 2px 1px #000;
}
.affichagear th {
text-align: right;
	border:0;
	border-bottom:2px solid #555;
	text-align: left;
	padding:4px;
	/*background:#000;*/
	background-color:rgba(0,0,0,0.3);
	color:#000;
	
}
.affichagear th a {
text-align: right;
	display: block;
	padding: 2px 4px;
	text-decoration: none;
}
.affichagear th a.asc:after {
	content: ' ⇣';
}
.affichagear th a.desc:after {
	content: ' ⇡';
}
.affichagear table tr td {
	padding: 6px;
	text-align: right;
	vertical-align: top;
	border-bottom:1px solid #ddd;
}
.affichagear table tr:nth-child(even) {
	background: #f9f9f9;
}
.affichagear td.actions {
	text-align: center;
	white-space: nowrap;
}
.affichagear table td.actions a {
	margin: 0px 6px;
	padding:2px 5px;
}
.affichagear h2{
margin: 0px 0px 0px 0px;
font-size:20px;
color:#dd363d;
text-align: right;
}
.affichagear h1{
font-size:30px; 
text-align:left;
text-align: right;
}
/** Notices and Errors **/
.message {
	clear: both;
	color: #fff;
	font-size: 140%;
	font-weight: bold;
	margin: 0 0 1em 0;
	padding: 5px;
}

.success,
.message,
.cake-error,
.cake-debug,
.notice,
p.error,
.error-message {
	background: #ffcc00;
	background-repeat: repeat-x;
	background-image: -moz-linear-gradient(top, #ffcc00, #E6B800);
	background-image: -ms-linear-gradient(top, #ffcc00, #E6B800);
	background-image: -webkit-gradient(linear, left top, left bottom, from(#ffcc00), to(#E6B800));
	background-image: -webkit-linear-gradient(top, #ffcc00, #E6B800);
	background-image: -o-linear-gradient(top, #ffcc00, #E6B800);
	background-image: linear-gradient(top, #ffcc00, #E6B800);
	text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
	border: 1px solid rgba(0, 0, 0, 0.2);
	margin-bottom: 18px;
	padding: 7px 14px;
	color: #404040;
	text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	-webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.25);
	-moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.25);
	box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.25);
}
.success,
.message,
.cake-error,
p.error,
.error-message {
	clear: both;
	color: #fff;
	background: #c43c35;
	border: 1px solid rgba(0, 0, 0, 0.5);
	background-repeat: repeat-x;
	background-image: -moz-linear-gradient(top, #ee5f5b, #c43c35);
	background-image: -ms-linear-gradient(top, #ee5f5b, #c43c35);
	background-image: -webkit-gradient(linear, left top, left bottom, from(#ee5f5b), to(#c43c35));
	background-image: -webkit-linear-gradient(top, #ee5f5b, #c43c35);
	background-image: -o-linear-gradient(top, #ee5f5b, #c43c35);
	background-image: linear-gradient(top, #ee5f5b, #c43c35);
	text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.3);
}
.success {
	clear: both;
	color: #fff;
	border: 1px solid rgba(0, 0, 0, 0.5);
	background: #3B8230;
	background-repeat: repeat-x;
	background-image: -webkit-gradient(linear, left top, left bottom, from(#76BF6B), to(#3B8230));
	background-image: -webkit-linear-gradient(top, #76BF6B, #3B8230);
	background-image: -moz-linear-gradient(top, #76BF6B, #3B8230);
	background-image: -ms-linear-gradient(top, #76BF6B, #3B8230);
	background-image: -o-linear-gradient(top, #76BF6B, #3B8230);
	background-image: linear-gradient(top, #76BF6B, #3B8230);
	text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.3);
}
p.error { 
	font-size: 120%;
	padding: 0.8em;
	margin: 1em 0;
}
p.error em {
	font-weight: normal;
	line-height: 140%;
}
.notice {
	color: #000;
	display: block;
	font-size: 120%;
	padding: 0.8em;
	margin: 1em 0;
}
.success {
	color: #fff;
}

/* pagination */
.pagination {
    background: #f2f2f2;
    padding: 20px;
    margin-bottom: 20px;
}
.pagination p{
    background: #f2f2f2;
    padding: 20px;
    margin-bottom: 20px;
	box-shadow: 2px 2px 1px #000;
}

.paginationpage {
    display: inline-block;
    padding: 0px 9px;
    margin-right: 4px;
    border-radius: 3px;
    border: solid 1px #c0c0c0;
    background: #e9e9e9;
    box-shadow: inset 0px 1px 0px rgba(255,255,255, .8), 0px 1px 3px rgba(0,0,0, .1);
    /*font-size: .875em;*/
	font-size: 12px;
    font-weight: bold;
    text-decoration: none;
    color: #717171;
    text-shadow: 0px 1px 0px rgba(255,255,255, 1);
}

.paginationpage:hover, .paginationpage.gradient:hover {
    background: #fefefe;
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#FEFEFE), to(#f0f0f0));
    background: -moz-linear-gradient(0% 0% 270deg,#FEFEFE, #f0f0f0);
}

.paginationpage.active {
    border: none;
    background: #616161;
    box-shadow: inset 0px 0px 8px rgba(0,0,0, .5), 0px 1px 0px rgba(255,255,255, .8);
    color: #f0f0f0;
    text-shadow: 0px 0px 3px rgba(0,0,0, .5);
}

.paginationpage.gradient {
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#f8f8f8), to(#e9e9e9));
    background: -moz-linear-gradient(0% 0% 270deg,#f8f8f8, #e9e9e9);
}

.pagination.dark {
    background: #414449;
    color: #feffff;
}

.paginationpage.dark {
    border: solid 1px #32373b;
    background: #3e4347;
    box-shadow: inset 0px 1px 1px rgba(255,255,255, .1), 0px 1px 3px rgba(0,0,0, .1);
    color: #feffff;
    text-shadow: 0px 1px 0px rgba(0,0,0, .5);
}

.paginationpage.dark:hover, .paginationpage.dark.gradient:hover {
    background: #3d4f5d;
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#547085), to(#3d4f5d));
    background: -moz-linear-gradient(0% 0% 270deg,#547085, #3d4f5d);
}

.paginationpage.dark.active {
    border: none;
    background: #2f3237;
    box-shadow: inset 0px 0px 8px rgba(0,0,0, .5), 0px 1px 0px rgba(255,255,255, .1);
}

.paginationpage.dark.gradient {
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#565b5f), to(#3e4347));
    background: -moz-linear-gradient(0% 0% 270deg,#565b5f, #3e4347);
}

/*.demande table {
	border-right:0;
	clear: both;
	color: #333;
	margin-bottom: 10px;
	width: 100%;
}
.demande table tr{
	border-right:0;
	clear: both;
	color: #333;
	margin-bottom: 10px;
	width: 100%;
}*/
.demande{
float:right;
border: solid #ddd 1px;
padding:5px 5px 5px 5px;
}
.demande h2{
font-size:20px;
color:#dd363d; 
}
.demande h1{
font-size:30px; 
text-align:left;
}
.infosdemande{
padding:5px 5px 5px 5px;
}
.infosdemande table {
	border-right:0;
	clear: both;
	color: #333;
	margin-bottom: 10px;
	width: 100%;
}
.infosdemande input{
padding:5px 5px 5px 5px;
width: 100%; 
height:30px
}
.demande label{
text-align:left;
}
.infosdemande img{ 
height:40px
}
 
.strongs{
 font-weight: bold;
}
/*______________ radios et chackboxs ____________*/



</style>
</head>

<body class="home">
<?php echo $this->Element('imprimerheaderpdf');?>
<?php echo $this->Session->flash(); ?>
<section id="mains">
<div class="inner clearfix">
<?php echo $content_for_layout; ?>
</div>
</section>
	
<?php echo $this->Element('imprimerfooter');?>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>