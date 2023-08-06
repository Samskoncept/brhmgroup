(function ($) {
  "use strict";

  let d = {};

  if (window.NodeList && !NodeList.prototype.forEach) {
    NodeList.prototype.forEach = Array.prototype.forEach;
  }

  d = {
    switchFontTriggerWrap: ".enable-draggable-floating-switch",
    switchFontTriggerButton: ".darklup-mode-switcher label",
    init: function () {
      let $this = this;
      $this.windowOnLoad();
      $this.handleFloatingSwitch();
    },
    windowOnLoad: function () {
      //Stop Dark mode on Excluded Things
      if (typeof darklupPageExcluded == "undefined") {
        let switcherDraggedPositionSrt = localStorage.getItem("switcherDraggedPosition");
        if (switcherDraggedPositionSrt) {
          let switcherDraggedPosition = JSON.parse(switcherDraggedPositionSrt);
          $(this.switchFontTriggerWrap).css({ left: switcherDraggedPosition.left + "px", top: switcherDraggedPosition.top + "px" });
        }
      }
    },
    handleFloatingSwitch: function () {
      let buttonWidth = $(this.switchFontTriggerButton).width();
      let buttonHeight = $(this.switchFontTriggerButton).height();
      let space = 20;
      let windowWidth = $(window).width();
      let windowHeight = $(window).height();
      let CurrentDraggedPosition;

      $(this.switchFontTriggerWrap).draggable({
        drag: function (e, ui) {
          if (ui.position.left < space) ui.position.left = space;
          if (ui.position.left > windowWidth - space - buttonWidth) ui.position.left = windowWidth - space - buttonWidth;
          if (ui.position.top < space) ui.position.top = space;
          if (ui.position.top > windowHeight - space - buttonHeight) ui.position.top = windowHeight - space - buttonHeight;
        },
        stop: function (event, ui) {
          CurrentDraggedPosition = JSON.stringify(ui.position);
          localStorage.setItem("switcherDraggedPosition", CurrentDraggedPosition);
        },
      });
    },
  };

  d.init();
})(jQuery);
