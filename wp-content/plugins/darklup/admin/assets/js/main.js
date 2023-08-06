(function ($) {
  "use strict";

  let a = {};

  if (window.NodeList && !NodeList.prototype.forEach) {
    NodeList.prototype.forEach = Array.prototype.forEach;
  }

  a = {
    darkEnabledClass: "darklup-admin-dark-mode-enabled",
    init: function () {
      // Color Picker
      $(".color-picker").wpColorPicker();
      // Select 2 support
      $(".darklup-select2").select2();

      // this.darkModeSwitchEvent();
      // this.darklupDarkIgnore();
      this.niceSelect();
      this.SettingsPageTab();
      this.MagnificPopup();
      this.customCSSEditor();
      // this.fieldContation();
      this.fieldCondition();
      this.btnCondition();
      this.fieldSwitchCondition();
      this.switchStylePreview();
      this.switchMaintainRatio();
      this.autoOffOnAnotherSwitchOn();
      // this.windowOnLoad();
      this.repeaterField();
      this.mediaUploader();
      this.analyticsChart();
      this.sliderValue();
      this.imageEffects();
      this.previewLivePresets();
      this.previewAdminLivePresets();
    },

    windowOnLoad: function () {
      let getStorageData = localStorage.getItem("darklupAdminModeEnabled"),
        getTriggerCheked = localStorage.getItem("triggerCheked"),
        $darkIcon = $(".admin-dark-icon"),
        $lightIcon = $(".admin-light-icon");

      if (getStorageData && getTriggerCheked && typeof isBackendDarkModeSettingsEnabled != "undefined") {
        $("html").toggleClass(this.darkEnabledClass);
        $(".switch-trigger").attr("checked", true);
        $(".darklup-mode-switcher").addClass("darklup-admin-dark-ignore");
        $darkIcon.show();
        $lightIcon.hide();
        $("html").show();
      } else {
        $("html").show();
      }
    },
    darkModeSwitchEvent: function () {
      let $that = this;

      //
      $(".switch-trigger").on("click", function () {
        let $this = $(this),
          $switcher = $this.closest(".darklup-mode-switcher"),
          $darkIcon = $(".admin-dark-icon"),
          $lightIcon = $(".admin-light-icon");

        $("html").toggleClass($that.darkEnabledClass);

        // Storage data
        if ($this.is(":checked")) {
          localStorage.setItem("darklupAdminModeEnabled", $that.darkEnabledClass);
          localStorage.setItem("triggerCheked", "checked");
          $switcher.addClass("darklup-admin-dark-ignore");
          $darkIcon.show();
          $lightIcon.hide();
        } else {
          $switcher.removeClass("darklup-admin-dark-ignore");
          localStorage.removeItem("darklupAdminModeEnabled");
          localStorage.removeItem("triggerCheked");
          $darkIcon.hide();
          $lightIcon.show();
        }
      });
    },
    darklupDarkIgnore: function () {
      document.querySelectorAll("div, section").forEach(function (e) {
        if ("none" !== window.getComputedStyle(e, null).backgroundImage) {
          e.classList.add("darklup-admin-dark-ignore");
          e.querySelectorAll("*").forEach(function (e) {
            return e.classList.add("darklup-admin-dark-ignore");
          });
        }
      });
    },
    niceSelect: function () {
      if ($(".nice-select-active").length) {
        $(".nice-select-active").niceSelect();
      }
    },
    SettingsPageTab: function () {
      if ($(".darklup-menu-inner")[0]) {
        // Settings page tab
        $("[data-target-id]").on("click", function (e) {
          e.preventDefault();
          var $this = $(this),
            getId = $this.data("target-id");

          localStorage.setItem("tabActivation", getId);

          $(".active").removeClass("active");
          $this.addClass("active");

          $(".darklup-d-show").removeClass("darklup-d-show").addClass("darklup-d-hide");
          $("#" + getId)
            .removeClass("darklup-d-hide")
            .addClass("darklup-d-show");
        });

        // Check active tab
        let activateTab = localStorage.getItem("tabActivation");
        if (activateTab == "darklup_general_settings") {
          activateTab = "darklup_color_settings";
        }
        if (activateTab) {
          $(".active").removeClass("active");
          $('[data-target-id="' + activateTab + '"]').addClass("active");
          $(".darklup-d-show").removeClass("darklup-d-show").addClass("darklup-d-hide");
          $("#" + activateTab)
            .removeClass("darklup-d-hide")
            .addClass("darklup-d-show");
        }
      }
    },
    MagnificPopup: function () {
      /* -------------------------------------------------
                Magnific JS 
            ------------------------------------------------- */
      $(".video-play-btn").magnificPopup({
        type: "iframe",
        removalDelay: 260,
        mainClass: "mfp-zoom-in",
      });
      $.extend(true, "", {
        iframe: {
          patterns: {
            youtube: {
              index: "youtube.com/",
              id: "v=",
              src: "",
            },
          },
        },
      });
    },
    customCSSEditor: function () {
      //
      var isEditor = document.getElementById("darklupEditor");

      if (isEditor != null) {
        // Css Editor
        var cssEditor = ace.edit("darklupEditor");
        cssEditor.setTheme("ace/theme/monokai");
        cssEditor.session.setMode("ace/mode/css");

        $("form").on("submit", function (e) {
          document.getElementById("editortext").value = cssEditor.getValue();
        });
      }
    },
    fieldContation: function () {
      /**
       *  Condition field
       */

      let condition = $("[data-condition]");

      condition.each(function () {
        let $this = $(this);

        let i = $(this).data("condition");

        if (!i) {
          return;
        }

        let o = $("." + i.key);
        o.on("change", function () {
          if ($(this).is(":checked")) {
            $this.show();
          } else {
            $this.hide();
          }
        });
        if (i.key === "switch_style") {
          $('input[name="darklup_settings[switch_style]"]').on("click", function () {
            if ($('input[name="darklup_settings[switch_style]"][value="' + i.value + '"]').is(":checked")) {
              $this.show();
            } else {
              $this.hide();
            }
          });
        }
        // On load event
        if (o.is(":checked")) {
          $this.show();
        } else if (i.key === "switch_style") {
          if ($('input[name="darklup_settings[switch_style]"][value="' + i.value + '"]').is(":checked")) {
            $this.show();
          } else {
            $this.hide();
          }
        } else {
          $this.hide();
        }
      });
    },
    fieldSwitchCondition: function () {
      let condition = $("[data-switchcondition]");
      condition.each(function () {
        let $this = $(this);
        let i = $(this).data("switchcondition");
        if (!i) {
          return;
        }

        $('input[name="darklup_settings[switch_style]"]').on("click", function () {
          $this.hide();
          if ($(".custom_switch_color_enabled").is(":checked")) {
            for (var x = 0; x < i.length; x++) {
              if ($('input[name="darklup_settings[switch_style]"][value="' + i[x] + '"]').is(":checked")) {
                $this.show();
              }
            }
          }
        });
        if ($(".custom_switch_color_enabled").is(":checked")) {
          $this.hide();
          for (var x = 0; x < i.length; x++) {
            if ($('input[name="darklup_settings[switch_style]"][value="' + i[x] + '"]').is(":checked")) {
              $this.show();
            }
          }
        } else {
          $this.hide();
        }
        $(".custom_switch_color_enabled").on("change", function () {
          if ($(".custom_switch_color_enabled").is(":checked")) {
            $this.hide();
            for (var x = 0; x < i.length; x++) {
              if ($('input[name="darklup_settings[switch_style]"][value="' + i[x] + '"]').is(":checked")) {
                $this.show();
              }
            }
          } else {
            $this.hide();
          }
        });
      });
    },
    fieldCondition: function () {
      let condition = $("[data-condition]");
      condition.each(function () {
        let $this = $(this);
        // console.log($this.getAttr());
        let i = $(this).data("condition");

        if (!i) {
          return;
        }

        let o = $("." + i.key);
        if (o.length == 0) {
          let btnCondition = $this.data("btncondition");
          var radio = 'input[name="darklup_settings[' + i.key + ']"]';
          var radioChecked = 'input[name="darklup_settings[' + i.key + ']"]:checked';
          if ($(radioChecked).val() == i.value) {
            if (btnCondition) {
              console.log(btnCondition);
              let thisSwitcher = $(`.${btnCondition.key}`);
              console.log(thisSwitcher);
              if (thisSwitcher.is(":checked")) {
                $this.show();
              } else {
                $this.hide();
              }
            } else {
              $this.show();
            }
          } else {
            $this.hide();
          }

          $(radio).click(function () {
            if ($(this).val() == i.value) {
              if (btnCondition) {
                let thisSwitcher = $(`.${btnCondition.key}`);
                if (thisSwitcher.is(":checked")) {
                  $this.show();
                } else {
                  $this.hide();
                }
              } else {
                $this.show();
              }
            } else {
              // if (btnCondition) {
              //   console.log(btnCondition);
              //   console.log(`Hide`);
              //   console.log($this);
              // }

              $this.hide();
            }
          });
        } else {
          o.on("click", function () {
            if ($(this).is(":checked")) {
              $this.show();
            } else {
              $this.hide();
            }
          });

          // On load event
          if (o.is(":checked")) {
            $this.show();
          } else {
            $this.hide();
          }
        }
      });
    },
    btnCondition: function () {
      let condition = $("[data-btncondition]");

      // console.log("Hello");
      condition.each(function () {
        let $this = $(this);
        // console.log($this.getAttr());
        let i = $(this).data("btncondition");

        if (!i) {
          return;
        }

        let o = $("." + i.key);
        if (o.length == 0) {
          // var radio = 'input[name="darklup_settings[' + i.key + ']"]';
          // var radioChecked = 'input[name="darklup_settings[' + i.key + ']"]:checked';
          // if ($(radioChecked).val() == i.value) {
          //   $this.show();
          // } else {
          //   $this.hide();
          // }
          // $(radio).click(function () {
          //   if ($(this).val() == i.value) {
          //     $this.show();
          //   } else {
          //     $this.hide();
          //   }
          // });
        } else {
          o.on("click", function () {
            if ($(this).is(":checked")) {
              $this.show();
            } else {
              $this.hide();
            }
          });

          // On load event
          if (o.is(":checked")) {
            $this.show();
          } else {
            $this.hide();
          }
        }
      });
    },
    switchStylePreview: function () {
      this.switchStylePreviewEvent("switch_style");
      this.switchStylePreviewEvent("switch_style_mobile");
      this.switchStylePreviewEvent("switch_style_menu");
    },
    switchStylePreviewEvent: function ($field_name) {
      this.switchStylePreviewDo($field_name);
      let clickedSwitch = $('input[name="darklup_settings[' + $field_name + ']"]');
      clickedSwitch.on("click", () => {
        this.switchStylePreviewDo($field_name);
      });
    },
    switchStylePreviewDo: function ($field_name) {
      for (var x = 1; x <= 15; x++) {
        let switcher = $('input[name="darklup_settings[' + $field_name + ']"][value="' + x + '"]');
        if (switcher.is(":checked")) {
          let previewInner = switcher.closest(".darklup-row").find(".darklup-switch-preview-inner");
          previewInner.find(".darklup-switch-preview").hide();
          previewInner.find(".darklup-switch-preview-" + x).show();
          previewInner
            .find(".darklup-switch-preview-" + x + " .toggle-checkbox")
            .delay(1000)
            .animate(
              {
                checked: true,
              },
              600
            )
            .delay(500)
            .animate(
              {
                checked: false,
              },
              600
            );
        }
      }
    },

    switchMaintainRatio: function () {
      $('input[name="darklup_settings[switch_size_base_width]"]').on("change", function () {
        var base_width = $('input[name="darklup_settings[switch_size_base_width]"]').val();
        if (base_width !== "" && $.isNumeric(base_width)) {
          $('input[name="darklup_settings[switch_size_base_height]"]').val(Number(base_width * 0.4));
        } else {
          $('input[name="darklup_settings[switch_size_base_height]"]').val("");
        }
      });

      $('input[name="darklup_settings[switch_size_base_height]"]').on("change", function () {
        var base_height = $('input[name="darklup_settings[switch_size_base_height]"]').val();
        if (base_height !== "" && $.isNumeric(base_height)) {
          $('input[name="darklup_settings[switch_size_base_width]"]').val(Number(base_height * 2.5));
        } else {
          $('input[name="darklup_settings[switch_size_base_width]"]').val("");
        }
      });

      $('input[name="darklup_settings[switch_size_base_width]"]').on("keyup", function () {
        var base_width = $('input[name="darklup_settings[switch_size_base_width]"]').val();
        if (base_width !== "" && $.isNumeric(base_width)) {
          $('input[name="darklup_settings[switch_size_base_height]"]').val(Number(base_width * 0.4));
        } else {
          $('input[name="darklup_settings[switch_size_base_height]"]').val("");
        }
      });

      $('input[name="darklup_settings[switch_size_base_height]"]').on("keyup", function () {
        var base_height = $('input[name="darklup_settings[switch_size_base_height]"]').val();
        if (base_height !== "" && $.isNumeric(base_height)) {
          $('input[name="darklup_settings[switch_size_base_width]"]').val(Number(base_height * 2.5));
        } else {
          $('input[name="darklup_settings[switch_size_base_width]"]').val("");
        }
      });
    },
    autoOffOnAnotherSwitchOn: function () {
      let condition = $("[data-auto-off-by]");

      condition.each(function () {
        let $this = $(this);

        let i = $(this).data("auto-off-by");

        if (!i) {
          return;
        }

        let o = $("input[type='checkbox']." + i.key);

        o.change(function () {
          if (this.checked) {
            $this.find("input:checkbox:first").prop("checked", false).change();
            //$this.hide();
          }
        });

        if (o.is(":checked")) {
          $this.find("input:checkbox:first").prop("checked", false).change();
        }
      });
    },
    mediaUploader: function () {
      // Media Upload
      var mediaUploader, t;

      $(".darklup_image_upload_btn").on("click", function (e) {
        e.preventDefault();

        t = $(this).parent().find(".darklup_image_uploader");

        if (mediaUploader) {
          mediaUploader.open();
          return;
        }
        mediaUploader = wp.media.frames.file_frame = wp.media({
          title: "Choose Image",
          button: {
            text: "Choose Image",
          },
          multiple: false,
        });
        mediaUploader.on("select", function () {
          var attachment = mediaUploader.state().get("selection").first().toJSON();

          t.val(attachment.url);
        });
        mediaUploader.open();
      });
    },
    repeaterField: function () {
      $(document).on("click", ".addFieldGroup", function (e) {
        e.preventDefault();

        var $this = $(this);

        var inner = $this.parent().find(".field-wrapper");

        var $new_repeater = "";
        $new_repeater += '<div class="single-field">';
        $new_repeater += '<input type="text" name="darklup_settings[light_img][]" placeholder="Light Image Url" />';
        $new_repeater += '<input type="text" name="darklup_settings[dark_img][]" placeholder="Dark Image Url" />';
        $new_repeater += '<span class="removetime">Remove</span>';
        $new_repeater += "</div>";

        inner.append($new_repeater);
      });

      //
      $(document).on("click", ".removetime", function () {
        var $this = $(this);
        $this.parent().remove();
      });
    },

    analyticsChart: function () {
      const labels = $("#darklup_analytics_Chart").attr("data-labels");
      const data_values = $("#darklup_analytics_Chart").attr("data-values");

      if (labels != null) {
        const data = {
          labels: JSON.parse(labels),
          datasets: [
            {
              label: "Dark Mode Usages",
              backgroundColor: "#fff",
              borderColor: "rgb(255, 99, 132)",
              data: JSON.parse(data_values),
            },
          ],
        };

        const config = {
          type: "line",
          data: data,
          options: {
            plugins: {
              legend: {
                display: false,
              },
            },
          },
        };

        const darklupAnalyticsChart = new Chart(document.getElementById("darklup_analytics_Chart"), config);
      }
    },
    imageEffects: function () {
      let $preview_image_effects = $(".darklup-image-preview-inner").attr("data-settings");

      if ("no" === $preview_image_effects) {
        $(".darklup-image-preview-inner").hide();
      }

      $('input.image-effects-on-off[type="checkbox"]').click(function () {
        if ($(this).prop("checked") == true) {
          $(".darklup-image-preview-inner").show();
        } else if ($(this).prop("checked") == false) {
          $(".darklup-image-preview-inner").hide();
        }
      });
    },
    previewLivePresets: function () {
      var presets = $(".settings-color-preset.front-end-dark--presets .rect-design input");
      presets.on("click", (e) => {
        let bgPicker = $(".wpc_wrap_custom_bg_color .color-picker");
        let secondaryBgPicker = $(".wpc_wrap_custom_secondary_bg_color .color-picker");
        let tertiaryBgPicker = $(".wpc_wrap_custom_tertiary_bg_color .color-picker");
        let textColPicker = $(".wpc_wrap_custom_text_color .color-picker");
        let linkPicker = $(".wpc_wrap_custom_link_color .color-picker");
        let linkHoverPicker = $(".wpc_wrap_custom_link_hover_color .color-picker");
        let borderPicker = $(".wpc_wrap_custom_border_color .color-picker");
        let btnBgPicker = $(".wpc_wrap_custom_btn_bg_color .color-picker");
        let btnTextPicker = $(".wpc_wrap_custom_btn_text_color .color-picker");
        let inputBgPicker = $(".wpc_wrap_custom_input_bg_color .color-picker");
        let inputPlacePicker = $(".wpc_wrap_custom_input_place_color .color-picker");
        let inputTextPicker = $(".wpc_wrap_custom_input_text_color .color-picker");

        let ThisPreset;

        var preset = e.target;
        var value = $(preset).val();
        ThisPreset = darklupPresets[value];

        this.setColorPickerValue(bgPicker, ThisPreset["background-color"]);
        this.setColorPickerValue(secondaryBgPicker, ThisPreset["secondary_bg"]);
        this.setColorPickerValue(tertiaryBgPicker, ThisPreset["tertiary_bg"]);
        this.setColorPickerValue(textColPicker, ThisPreset["color"]);
        this.setColorPickerValue(linkPicker, ThisPreset["anchor-color"]);
        this.setColorPickerValue(linkHoverPicker, ThisPreset["anchor-hover-color"]);
        this.setColorPickerValue(borderPicker, ThisPreset["border-color"]);
        this.setColorPickerValue(btnBgPicker, ThisPreset["btn-bg-color"]);
        this.setColorPickerValue(btnTextPicker, ThisPreset["btn-color"]);
        this.setColorPickerValue(inputBgPicker, ThisPreset["input-bg-color"]);
        this.setColorPickerValue(inputTextPicker, ThisPreset["color"]);
        // this.setColorPickerValue(inputPlacePicker, ThisPreset["tertiary_bg"]);
      });
    },
    previewAdminLivePresets: function () {
      var presets = $(".settings-color-preset.dashboard-dark--presets .rect-design input");
      presets.on("click", (e) => {
        let bgPicker = $(".wpc_wrap_admin_custom_bg_color .color-picker");
        let secondaryBgPicker = $(".wpc_wrap_admin_custom_secondary_bg_color .color-picker");
        let tertiaryBgPicker = $(".wpc_wrap_admin_custom_tertiary_bg_color .color-picker");
        let textColPicker = $(".wpc_wrap_admin_custom_text_color .color-picker");
        let linkPicker = $(".wpc_wrap_admin_custom_link_color .color-picker");
        let linkHoverPicker = $(".wpc_wrap_admin_custom_link_hover_color .color-picker");
        let borderPicker = $(".wpc_wrap_admin_custom_border_color .color-picker");
        let btnBgPicker = $(".wpc_wrap_admin_custom_btn_bg_color .color-picker");
        let btnTextPicker = $(".wpc_wrap_admin_custom_btn_text_color .color-picker");
        let inputBgPicker = $(".wpc_wrap_admin_custom_input_bg_color .color-picker");
        let inputPlacePicker = $(".wpc_wrap_admin_custom_input_place_color .color-picker");
        let inputTextPicker = $(".wpc_wrap_admin_custom_input_text_color .color-picker");

        let ThisPreset;

        var preset = e.target;
        var value = $(preset).val();
        ThisPreset = darklupPresets[value];

        this.setColorPickerValue(bgPicker, ThisPreset["background-color"]);
        this.setColorPickerValue(secondaryBgPicker, ThisPreset["secondary_bg"]);
        this.setColorPickerValue(tertiaryBgPicker, ThisPreset["tertiary_bg"]);
        this.setColorPickerValue(textColPicker, ThisPreset["color"]);
        this.setColorPickerValue(linkPicker, ThisPreset["anchor-color"]);
        this.setColorPickerValue(linkHoverPicker, ThisPreset["anchor-hover-color"]);
        this.setColorPickerValue(borderPicker, ThisPreset["border-color"]);
        this.setColorPickerValue(btnBgPicker, ThisPreset["btn-bg-color"]);
        this.setColorPickerValue(btnTextPicker, ThisPreset["btn-color"]);
        this.setColorPickerValue(inputBgPicker, ThisPreset["input-bg-color"]);
        this.setColorPickerValue(inputTextPicker, ThisPreset["color"]);
        // this.setColorPickerValue(inputPlacePicker, ThisPreset["tertiary_bg"]);
      });
    },
    setColorPickerValue: function (element, color) {
      let bgBtn = element.closest(".wp-picker-container").find("button.wp-color-result");
      bgBtn.css("background-color", color);
      $(element).val(color);
    },
    sliderValue: function () {
      var grayscaleVal = $("#darklup_image_grayscale").val();
      var brightnessVal = $("#darklup_image_brightness").val();
      var contrastVal = $("#darklup_image_contrast").val();
      var opacityVal = $("#darklup_image_opacity").val();
      var sepiaVal = $("#darklup_image_sepia").val();
      var darkmode_level = $("#darklup_darkmode_level").val();

      $("#darklup_slider_darkmode_level").text(darkmode_level);

      $("#darklup_slider_image_grayscale").text(grayscaleVal);
      $("#darklup_slider_image_brightness").text(brightnessVal);
      $("#darklup_slider_image_contrast").text(contrastVal);
      $("#darklup_slider_image_opacity").text(opacityVal);
      $("#darklup_slider_image_sepia").text(sepiaVal);

      $("#darklup_darkmode_level").on("input", function () {
        var ChangeVal = $(this).val();
        $("#darklup_slider_darkmode_level").text(ChangeVal);
      });

      $("#darklup_image_grayscale").on("input", function () {
        var ChangeVal = $(this).val();
        var grayscale = `grayscale(${ChangeVal})`;
        preview_image_filter("grayscale", grayscale);
        $("#darklup_slider_image_grayscale").text(ChangeVal);
      });

      $("#darklup_image_brightness").on("input", function () {
        var ChangeVal = $(this).val();
        var brightness = `brightness(${ChangeVal})`;
        preview_image_filter("brightness", brightness);
        $("#darklup_slider_image_brightness").text(ChangeVal);
      });

      $("#darklup_image_contrast").on("input", function () {
        var ChangeVal = $(this).val();
        var contrast = `contrast(${ChangeVal})`;
        preview_image_filter("contrast", contrast);
        $("#darklup_slider_image_contrast").text(ChangeVal);
      });

      $("#darklup_image_opacity").on("input", function () {
        var ChangeVal = $(this).val();
        var opacity = `opacity(${ChangeVal})`;
        preview_image_filter("opacity", opacity);
        $("#darklup_slider_image_opacity").text(ChangeVal);
      });

      $("#darklup_image_sepia").on("input", function () {
        var ChangeVal = $(this).val();
        var sepia = `sepia(${ChangeVal})`;
        preview_image_filter("sepia", sepia);
        $("#darklup_slider_image_sepia").text(ChangeVal);
      });

      var grayscaleCss = `grayscale(${grayscaleVal})`;
      var brightnessCss = `brightness(${brightnessVal})`;
      var contrastCss = `contrast(${contrastVal})`;
      var opacityCss = `opacity(${opacityVal})`;
      var sepiaCss = `sepia(${sepiaVal})`;

      function preview_image_filter(filterName, filterVal) {
        var inlineCss = " ";

        if ("grayscale" === filterName) {
          grayscaleCss = filterVal;
        } else if ("brightness" === filterName) {
          brightnessCss = filterVal;
        } else if ("contrast" === filterName) {
          contrastCss = filterVal;
        } else if ("opacity" === filterName) {
          opacityCss = filterVal;
        } else if ("sepia" === filterName) {
          sepiaCss = filterVal;
        }

        inlineCss = inlineCss.concat(grayscaleCss);
        inlineCss = inlineCss.concat(brightnessCss);
        inlineCss = inlineCss.concat(contrastCss);
        inlineCss = inlineCss.concat(opacityCss);
        inlineCss = inlineCss.concat(sepiaCss);

        $(".darklup-image-effects-preview img").css({ filter: inlineCss });
      }
    },
  };

  a.init();
})(jQuery);
