#! /bin/sh
sass --style compressed --watch \
	_style.scss:../../style.css \
	_admin.scss:../css/admin.css \
	_tinymce.scss:../css/tinymce.css \
	_mobile.scss:../css/mobile.css