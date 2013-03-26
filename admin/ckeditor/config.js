/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/



CKEDITOR.editorConfig = function(config) {
	config.filebrowserBrowseUrl = '/beta/admin/kcfinder/browse.php?type=files';
	   config.filebrowserImageBrowseUrl = '/beta/admin/kcfinder/browse.php?type=images';
	   config.filebrowserFlashBrowseUrl = '/beta/admin/kcfinder/browse.php?type=flash';
	   config.filebrowserUploadUrl = '/beta/admin/kcfinder/upload.php?type=files';
	   config.filebrowserImageUploadUrl = '/beta/admin/kcfinder/upload.php?type=images';
	   config.filebrowserFlashUploadUrl = '/beta/admin/kcfinder/upload.php?type=flash';
	
   /*config.filebrowserBrowseUrl = '/admin/kcfinder/browse.php?type=files';
   config.filebrowserImageBrowseUrl = '/admin/kcfinder/browse.php?type=images';
   config.filebrowserFlashBrowseUrl = '/admin/kcfinder/browse.php?type=flash';
   config.filebrowserUploadUrl = '/admin/kcfinder/upload.php?type=files';
   config.filebrowserImageUploadUrl = '/admin/kcfinder/upload.php?type=images';
   config.filebrowserFlashUploadUrl = '/admin/kcfinder/upload.php?type=flash';
   */
	config.toolbar = 'abouttoolbar';

		config.toolbar_abouttoolbar =
		[
			
			{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike'] },			
			{ name: 'insert', items : [ 'Image' ] },	                
			{ name: 'styles', items : [ 'Font','FontSize'] },
			{ name: 'colors', items : [  'TextColor','BGColor'] },	
			{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
			{ name: 'insert', items : [ 'Image' ] },
					
			{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'] },
			
			
		];
		
		config.contentsCss = '/beta/admin/ckeditor/fonts.css';
		//the next line add the new font to the combobox in CKEditor
		config.font_names = 'solexregular;' + 'solexregular_italic;' + 'solexmedium_italic;' + 'solexmedium;' + 'solexbold_italic;' + 'solexbold;' + 'clarendon_extendedbold;' + 'clarendonbt_romancondensed;' + 'clarendonbt_roman;' + 'claredon_light;' + 'claredon_heavy;' + 'claredon_boldcondensed;' + 'clarendon_condensedbold;' + 'clarendonbook;'  +  'clarendonbold;'  +  config.font_names;
};
