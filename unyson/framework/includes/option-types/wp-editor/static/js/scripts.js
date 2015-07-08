(function($, fwe) {

	var init = function() {

		var width = jQuery(this).data('width-type');

		if (width == 'large') {
			jQuery(this).parents('.fw-backend-option-input-type-wp-editor')
				.removeClass('width-type-auto')
				.addClass('width-type-full');
		} else {
			jQuery(this).parents('.fw-backend-option-input-type-wp-editor')
				.removeClass('width-type-auto')
				.addClass('width-type-fixed');
		}

		var $textareaWrapper = $(this),
			$textarea = $textareaWrapper.find('textarea');

		$textarea.attr('name', $textareaWrapper.data('name'));

		/**
		 * Reinit all reachTextEditors with id  'textarea_dynamic_id'
		 */
		var dynamicId = $textarea.attr('id');
		if (dynamicId === "textarea_dynamic_id") {

			window.tinyMCE.execCommand("mceRemoveEditor", false, dynamicId);
			$('#qt_'+ dynamicId +'_toolbar').remove();

			var id = 'wp-editor-textarea-'+ fw.randomMD5();
			$textarea.attr('id', id);
			$textareaWrapper.find('[id="insert-media-button"]').data('editor', id);
			reachTexEditorReinit($textarea);
		}

		$(document).on('mouseenter click', '.fw-option-type-wp-editor', function(){
			window.wpActiveEditor = $(this).find('textarea').attr('id');
		});

	};

	var reachTexEditorReinit = function($textarea){
		var parent = $textarea.parents('.wp-editor-wrap:eq(0)'),
			$activeEditorBtn = parent.hasClass('tmce-active') ? parent.find('.switch-tmce') : parent.find('.switch-html'),
			$btnTabs = parent.find('.wp-switch-editor').removeAttr("onclick"),
			id = $textarea.attr('id'),
			settings = {id: id , buttons: 'strong,em,link,block,del,ins,img,ul,ol,li,code,more,close'};


		var tmceCustomSettings = $textarea.parents('.fw-option-type-wp-editor').data('tinymce'),
			tmce_teeny = $textarea.parents('.fw-option-type-wp-editor').data('tmce-teeny'),
			tmce_extended = $textarea.parents('.fw-option-type-wp-editor').data('tmce-extended'),
			tmce_config_name = $textarea.parents('.fw-option-type-wp-editor').data('config');

		var initTinyMCESettings = {};
		if (tmce_config_name === 'custom') {
			initTinyMCESettings = tmceCustomSettings;
		} else if (tmce_config_name ===  'teeny') {
			initTinyMCESettings = tmce_teeny;
		} else {
			initTinyMCESettings = tmce_extended;
		}

		/**
		 * add autoupdate textarea value to tinyMCE settings
		 */
		initTinyMCESettings.setup = function(ed) {
			ed.onChange.add(function(ed, l) {
				tinyMCE.triggerSave();
			});
		};

		/**
		 * add \ remove editors by change tabs
		 */
		$btnTabs.bind('click', function()
		{
			var button = $(this);
			var value = '';

			if(button.is('.switch-tmce'))
			{

				//add <p> html tags
				//fixme: window.switchEditors.switchto 
				{
					value = window.switchEditors._wp_Autop($textarea.val());
					$textarea.val(value);
				}


				initTinyMCESettings.selector = '#' + id;
				tinymce.init(initTinyMCESettings);
				parent.removeClass('html-active').addClass('tmce-active');
				if (QTags != undefined) {
					QTags._buttonsInit();
				}

			}
			else
			{
				parent.removeClass('tmce-active').addClass('html-active');

				//Get content before removing the Visual editor, because it removes multiple new lines
				value = window.switchEditors._wp_Nop($textarea.val());

				window.tinyMCE.execCommand("mceRemoveEditor", false, id);

				$textarea.val(value);
			}
		});

		$activeEditorBtn.trigger('click');
		/**
		 * adding Qtags buttons panel
		 */
		quicktags(settings);
		QTags._buttonsInit();
	};

	fwe.on('fw:options:init', function(data) {
		data.$elements
			.find('.fw-option-type-wp-editor:not(.fw-option-initialized)')
			.each(init)
			.addClass('fw-option-initialized');
	});

})(jQuery, fwEvents);

