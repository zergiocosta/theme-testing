/**
 * Included on pages where backend options are rendered
 */

var fwBackendOptions = {
	/**
	 * Open a tab or sub-tab
	 */
	openTab: function(tabId) {
		if (!tabId) {
			return;
		}

		var $tabLink = jQuery(".fw-options-tabs-wrapper > .fw-options-tabs-list > ul > li > a[href=\'#"+ tabId +"\']");

		while ($tabLink.length) {
			$tabLink.trigger("click");
			$tabLink = $tabLink
				.closest(".fw-options-tabs-wrapper").parent().closest(".fw-options-tabs-wrapper")
				.find("> .fw-options-tabs-list > ul > li > a[href=\'#"+ $tabLink.closest(".fw-options-tab").attr("id") +"\']");
		}

		// click again on focus tab to update the input value
		jQuery(".fw-options-tabs-wrapper > .fw-options-tabs-list > ul > li > a[href=\'#"+ tabId +"\']").trigger("click");;
	}
};

jQuery(document).ready(function($){
	/**
	 * Functions
	 */
	{
		/**
		 * Make fw-postbox to close/open on click
		 *
		 * (fork from /wp-admin/js/postbox.js)
		 */
		function addPostboxToggles($boxes) {
			/** Remove events added by /wp-admin/js/postbox.js */
			$boxes.find('h3, .handlediv').off('click.postboxes');

			var eventNamespace = '.fw-backend-postboxes';

			// make postboxes to close/open on click
			$boxes
				.off('click'+ eventNamespace) // remove already attached, just to be sure, prevent multiple execution
				.on('click'+ eventNamespace, '> h3.hndle, > .handlediv', function(e){
					var $box = $(this).closest('.fw-postbox');

					$box.toggleClass('closed');

					var isClosed = $box.hasClass('closed');

					$box.trigger('fw:box:'+ (isClosed ? 'close' : 'open'));
					$box.trigger('fw:box:toggle-closed', {isClosed: isClosed});
				});

			/**
			 * Prevent event to be propagated to first level WordPress sortable (on edit post page)
			 * If not prevented, boxes within options can be dragged out of parent box to first level boxes
			 */
			$boxes.closest('.postbox-with-fw-options')
				.off('mousedown'+ eventNamespace) // remove already attached, just to be sure, prevent multiple execution
				.on('mousedown'+ eventNamespace, '.fw-postbox > h3.hndle, .fw-postbox > .handlediv', function(e){
					e.stopPropagation();
				});
		}

		/** Remove box header if title is empty */
		function hideBoxEmptyTitles($boxes) {
			$boxes.find('> h3.hndle > span').each(function(){
				var $this = $(this);

				if (!$.trim($this.html()).length) {
					$this.closest('.postbox').addClass('fw-postbox-without-name');
				}
			});
		}
	}

	/** Init tabs */
	fwEvents.on('fw:options:init', function (data) {
		var $elements = data.$elements.find('.fw-options-tabs-wrapper:not(.initialized)');

		if ($elements.length) {
			$elements.tabs();

			$elements.each(function(){
				var $this = $(this);

				if (!$this.parent().closest('.fw-options-tabs-wrapper').length) {
					// add special class to first level tabs
					$this.addClass('fw-options-tabs-first-level');
				}
			});

			$elements.addClass('initialized');
		}
	});

	/** Init boxes */
	fwEvents.on('fw:options:init', function (data) {
		var $boxes = data.$elements.find('.fw-postbox:not(.initialized)');

		hideBoxEmptyTitles(
			$boxes.filter('.fw-backend-postboxes > .fw-postbox')
		);

		addPostboxToggles($boxes);

		/**
		 * leave open only first boxes
		 */
		$boxes
			.filter('.fw-backend-postboxes > .fw-postbox:not(.fw-postbox-without-name):not(:first-child):not(.prevent-auto-close)')
			.addClass('closed');

		$boxes.addClass('initialized');

		// trigger on box custom event for others to do something after box initialized
		$boxes.trigger('fw-options-box:initialized');
	});

	/** Init options */
	fwEvents.on('fw:options:init', function (data) {
		data.$elements.find('.fw-backend-option:not(.initialized)')
			// do nothing, just a the initialized class to make the fadeIn css animation effect
			.addClass('initialized');
	});

	/** Fixes */
	fwEvents.on('fw:options:init', function (data) {
		/** add special class to first level postboxes that contains framework options */
		{
			data.$elements.find('.postbox:not(.fw-postbox) .fw-option')
				.closest('.postbox:not(.fw-postbox)')
				.addClass('postbox-with-fw-options');
		}

		/**
		 * disable sortable (drag/drop) for postboxes created by framework options
		 * (have no sense, the order is not saved like for first level boxes on edit post page)
		 */
		{
			var $sortables = data.$elements
				.find('.postbox:not(.fw-postbox) .fw-postbox, .fw-options-tabs-wrapper .fw-postbox')
				.closest('.fw-backend-postboxes')
				.not('.fw-sortable-disabled');

			$sortables.each(function(){
				try {
					$(this).sortable('destroy');
				} catch (e) {
					// happens when not initialized
				}
			});

			$sortables.addClass('fw-sortable-disabled');
		}

		/** hide bottom border from last option inside box */
		{
			data.$elements.find('.postbox-with-fw-options > .inside, .fw-postbox > .inside')
				.append('<div class="fw-backend-options-last-border-hider"></div>');
		}

		hideBoxEmptyTitles(
			data.$elements.find('.postbox-with-fw-options')
		);
	});

	/**
	 * Help tips (i)
	 */
	(function(){
		fwEvents.on('fw:options:init', function (data) {
			var $helps = data.$elements.find('.fw-option-help:not(.initialized)');

			fw.qtip($helps);

			$helps.addClass('initialized');
		});
	})();

	$('#side-sortables').addClass('fw-force-xs');
});