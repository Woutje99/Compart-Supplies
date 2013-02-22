//http://stackoverflow.com/questions/4583703/jquery-post-request-not-ajax
jQuery(function($) {
	$.extend({
		form: function(url, data, method) {
			if (method == null) method = 'POST';
			if (data == null) data = {};

			var form = $('<form>').attr({
				method: method,
				action: url
			}).css({
				display: 'none'
			});

			var addData = function(name, data) {
				if ($.isArray(data)) {
					for (var i = 0; i < data.length; i++) {
						var value = data[i];
						addData(name + '[]', value);
					}
				} else if (typeof data === 'object') {
					for (var key in data) {
						if (data.hasOwnProperty(key)) {
							addData(name + '[' + key + ']', data[key]);
						}
					}
				} else if (data != null) {
					form.append($('<input>').attr({
						type: 'hidden',
						name: String(name),
						value: String(data)
					}));
				}
			};

			for (var key in data) {
				if (data.hasOwnProperty(key)) {
					addData(key, data[key]);
				}
			}

			return form.appendTo('body');
		}
	});
});


// http://mjsarfatti.com/sandbox/nestedSortable/
$(document).ready(function(){

	$('.sortable').nestedSortable({
		disableNesting: 'no-nest',
		forcePlaceholderSize: true,
		items: 'li',
		maxLevels: 0,
		opacity: .6,
		listType : 'ol',
		revert: 250,
		tabSize: 25,
		rootId : '#sortlist',
		update: function () {

			list = $(this).nestedSortable('toHierarchy', {
				startDepthCount: 0
			});

			if(list.length)
			{
				$.post('admin/pages/changeorder', {
					list: list
				},
				function()
				{
					document.location.reload(true);
				}
				);
			}
		}
	});
});

//http://www.tinymce.com/wiki.php/Installation
tinyMCE.init({

	editor_selector : "editor",
	mode : "textareas",
	theme : "advanced",
	plugins : "emotions,spellchecker,advhr,insertdatetime,preview",
	height : "480",
	language : 'en',


	// Theme options - button# indicated the row# only
	theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright, cut,copy,paste,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,anchor,image,|,code,preview,|,forecolor,backcolor",
	theme_advanced_buttons2 : "insertdate,inserttime,|,spellchecker,advhr,,removeformat,|,sub,sup,|,charmap",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : true

});

$(document).ready(function(){

	$('.pages_edit #title').live('input', function(){

		var $title = $(this);
		var $identifier = $('.pages_edit #identifier');

		$identifier.val(convertToSlug($title.val()));

	});

	function convertToSlug(Text)
	{
		return Text
		.toLowerCase()
		.replace(/[^\w ]+/g,'')
		.replace(/ +/g,'-');
	}


});