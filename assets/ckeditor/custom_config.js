CKEDITOR.editorConfig = function( config ) {
	config.toolbarGroups = [
		{ name: 'clipboard', groups: [ 'undo', 'clipboard' ] },
		{ name: 'editing', groups: [ 'selection', 'find', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		'/',
		{ name: 'document', groups: [ 'document', 'doctools', 'mode' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		'/',
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];
	config.extraPlugins = 'eqneditor';
	config.removeButtons = 'Save,NewPage,ExportPdf,Preview,Print,Templates,Undo,Redo,Find,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,Styles,Format,Font,FontSize,BGColor,Maximize,ShowBlocks,About,TextColor,PasteFromWord,PasteText,Paste,Copy,Cut,Replace,SelectAll,Scayt,Iframe,PageBreak,Smiley,HorizontalRule,Flash,Anchor,Unlink,BidiRtl,BidiLtr,Language,CreateDiv,Blockquote,Indent,Outdent';
};