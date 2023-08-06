(function ($) {
  "use strict";

  let d = {};

  if (window.NodeList && !NodeList.prototype.forEach) {
    NodeList.prototype.forEach = Array.prototype.forEach;
  }

  d = {
    switchTrigger: ".switch-trigger",
    switchFontTrigger: ".switch-font-trigger",
    switchFontTriggerWrap: ".enable-draggable-floating-switch",
    switchFontTriggerButton: ".darklup-mode-switcher label",
    darkEnabledClass: "darklup-dark-mode-enabled",
    textEnabledClass: "darklup-font-mode-enabled",

    init: function () {
      let $this = this;
      // $this.darkModeSwitchEvent();
      // $this.fontSwitchEvent();
      // $this.darklupDarkIgnore();
      $this.windowOnLoad();
      // $this.handleOSDark();
      // $this.handleKeyShortcut();
      $this.handleFloatingSwitch();
    },
    windowOnLoad: function () {
      //Stop Dark mode on Excluded Things
      if (typeof darklupPageExcluded == "undefined") {
        //
        let $that = this;
        // let getStorageData = localStorage.getItem("darklupModeEnabled"),
        //   getTriggerCheked = localStorage.getItem("triggerCheked"),
        //   lightOnDefaultDarkMode = localStorage.getItem("lightOnDefaultDarkMode"),
        //   lightOnTimeBasedDarkMode = localStorage.getItem("lightOnTimeBasedDarkMode");

        let switcherDraggedPositionSrt = localStorage.getItem("switcherDraggedPosition");

        // if (getStorageData && getTriggerCheked) {
        //   $("html").toggleClass(this.darkEnabledClass);
        //   $(this.switchTrigger).prop("checked", true);
        //   $(".darklup-mode-switcher").addClass("darklup-dark-ignore");
        //   $that.darkmodeImages(1);
        //   $("html").show();
        // } else if (isDefaultDarkModeEnabled && !lightOnDefaultDarkMode) {
        //   $("html").toggleClass(this.darkEnabledClass);
        //   $(this.switchTrigger).prop("checked", true);
        //   $(".darklup-mode-switcher").addClass("darklup-dark-ignore");
        //   $that.darkmodeImages(1);
        //   $("html").show();
        // } else {
        //   $that.darkmodeImages();
        //   $("html").show();
        // }

        if (switcherDraggedPositionSrt) {
          let switcherDraggedPosition = JSON.parse(switcherDraggedPositionSrt);
          $(this.switchFontTriggerWrap).css({ left: switcherDraggedPosition.left + "px", top: switcherDraggedPosition.top + "px" });
        }

        // Enabled Time based mode
        // if (frontendObject.timeBasedMode) {
        //   if (!$("html").hasClass(this.darkEnabledClass)) {
        //     if (!lightOnTimeBasedDarkMode) {
        //       $("html").toggleClass(this.darkEnabledClass);
        //     }
        //   }
        // }
      } else {
        // $("html").show();
      }
    },
    handleFloatingSwitch: function () {
      let $that = this;
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
    handleOSDark: function () {
      let $that = this;
      if (isOSDarkModeEnabled) {
        let lightOnOSDarkCheked = localStorage.getItem("lightOnOSDarkCheked");
        if (window.matchMedia && window.matchMedia("(prefers-color-scheme: dark)").matches) {
          if (!lightOnOSDarkCheked) {
            $("html").addClass(this.darkEnabledClass);
            $($that.switchTrigger).prop("checked", true);
            $(".darklup-mode-switcher").addClass("darklup-dark-ignore");
            $that.darkmodeImages(1);
          }
        }

        window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change", (e) => {
          const newColorScheme = e.matches ? "dark" : "light";
          if (newColorScheme === "dark") {
            if (!lightOnOSDarkCheked) {
              $("html").addClass(this.darkEnabledClass);
              $($that.switchTrigger).prop("checked", true);
              $(".darklup-mode-switcher").addClass("darklup-dark-ignore");
              $that.darkmodeImages(1);
            }
          } else {
            $("html").removeClass(this.darkEnabledClass);
            $($that.switchTrigger).prop("checked", false);
            $(".darklup-mode-switcher").removeClass("darklup-dark-ignore");
            $that.darkmodeImages();
          }
        });
      }
    },
    handleKeyShortcut: function () {
      let $that = this;
      if (isKeyShortDarkModeEnabled) {
        var ctrlDown = false;
        $(document).keydown(function (e) {
          if (e.which === 17) ctrlDown = true;
        });
        $(document).keyup(function (e) {
          if (e.which === 17) ctrlDown = false;
        });
        $(document).keydown(function (event) {
          if (ctrlDown && event.altKey && event.which === 68) {
            $("html").toggleClass($that.darkEnabledClass);

            if ($($that.switchTrigger).is(":checked")) {
              localStorage.removeItem("darklupModeEnabled");
              localStorage.removeItem("triggerCheked");
              $($that.switchTrigger).prop("checked", false);
              $(".darklup-mode-switcher").removeClass("darklup-dark-ignore");
              $that.darkmodeImages();
            } else {
              localStorage.setItem("darklupModeEnabled", $that.darkEnabledClass);
              localStorage.setItem("triggerCheked", "checked");
              $($that.switchTrigger).prop("checked", true);
              $(".darklup-mode-switcher").addClass("darklup-dark-ignore");
              $that.darkmodeImages(1);
            }
          }
        });
      }
    },
    darkModeSwitchEvent: function () {
      let $that = this;

      $(this.switchTrigger).on("click", function (e) {
        let $this = $(this);

        $("html").toggleClass($that.darkEnabledClass);

        if ($this.is(":checked")) {
          localStorage.setItem("darklupModeEnabled", $that.darkEnabledClass);
          localStorage.setItem("triggerCheked", "checked");
          $this.closest(".darklup-mode-switcher").addClass("darklup-dark-ignore");
          $that.darkmodeImages(1);

          if (window.matchMedia && window.matchMedia("(prefers-color-scheme: dark)").matches) {
            localStorage.removeItem("lightOnOSDarkCheked");
          }

          if (frontendObject.timeBasedMode) {
            localStorage.removeItem("lightOnTimeBasedDarkMode");
          }

          //Analytics
          var post_data = {
            action: "darklup_analytics_save_record",
            security: frontendObject.security,
          };

          $.ajax({
            url: frontendObject.ajaxUrl,
            type: "POST",
            data: post_data,
            success: function (data) {
              var obj = JSON.parse(data);

              if (obj.status == "true") {
              }
            },
          });
        } else {
          $this.closest(".darklup-mode-switcher").removeClass("darklup-dark-ignore");
          localStorage.removeItem("darklupModeEnabled");
          localStorage.removeItem("triggerCheked");
          $that.darkmodeImages();

          if (window.matchMedia && window.matchMedia("(prefers-color-scheme: dark)").matches) {
            localStorage.setItem("lightOnOSDarkCheked", true);
          }

          if (isDefaultDarkModeEnabled) {
            localStorage.setItem("lightOnDefaultDarkMode", true);
          }

          if (frontendObject.timeBasedMode) {
            localStorage.setItem("lightOnTimeBasedDarkMode", true);
          }
        }
      });
    },

    fontSwitchEvent: function () {
      let $that = this;

      $(this.switchFontTrigger).on("click", function (e) {
        let $this = $(this);

        $("html").toggleClass($that.textEnabledClass);
      });
    },
    darklupDarkIgnore: function () {
      document.querySelectorAll("div, section").forEach(function (e) {
        if ("none" !== window.getComputedStyle(e, null).backgroundImage) {
          e.classList.add("darklup-dark-ignore");
          e.querySelectorAll("*").forEach(function (e) {
            return e.classList.add("darklup-dark-ignore");
          });
        }
      });
    },
    darkmodeImages: function ($mode) {
      let getImgUrl = frontendObject.sitelogo,
        lightUrl = getImgUrl.light,
        darkUrl = getImgUrl.dark;

      if ($mode) {
        // Logo
        $('[src="' + lightUrl + '"]').attr({ src: darkUrl, srcset: darkUrl });

        // Images
        $.each(frontendObject.darkimages, function (key, item) {
          $('[src="' + item[0] + '"]').attr({ src: item[1], srcset: item[1] });
        });
      } else {
        // Logo
        $('[src="' + darkUrl + '"]').attr({ src: lightUrl, srcset: lightUrl });

        // Images
        $.each(frontendObject.darkimages, function (key, item) {
          $('[src="' + item[1] + '"]').attr({ src: item[0], srcset: item[0] });
        });
      }
    },
  };

  d.init();
})(jQuery);
