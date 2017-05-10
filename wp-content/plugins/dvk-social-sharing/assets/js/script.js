(function() {
	'use strict';

	/**
	 * Initialises the Social Sharing plugin
	 */
	function initSocialSharing() {

		var links;

		links = document.querySelectorAll('.dvk-social-sharing a');
		for (var i = 0; i < links.length; i++) {
			addEvent(links[i], 'click', openPopup);
		}

	}

	/**
	 * Open a popup
	 *
	 * @param e
	 * @returns {boolean}
	 */
	function openPopup(e) {

		var top = (screen.availHeight - 500) / 2;
		var left = (screen.availWidth - 500) / 2;

		var popup = window.open(
			this.href,
			'social',
			'width=550,height=420,left='+ left +',top='+ top +',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1'
		);

		if(popup) {
			popup.focus();
			e.preventDefault();
			return false;
		}

		return true;
	}

	/**
	 * Add event, compatible with IE.
	 *
	 * @param element
	 * @param eventName
	 * @param callback
	 */
	function addEvent(element, eventName, callback) {
		if (element.addEventListener) {
			element.addEventListener(eventName, callback, false);
		} else {
			element.attachEvent("on" + eventName, callback);
		}
	}

	addEvent(window, 'load', initSocialSharing);

})();