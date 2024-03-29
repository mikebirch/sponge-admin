$("html").toggleClass("no-js js");

$(document).ready(function () {
  /**
   * Create links for each admin form (forms are hidden by CSS)
   */
  $("td.actions .form-delete").each(function () {
    $(this).after(
      '<a href="#" class="delete" data-formname="' +
        $(this).attr("id") +
        '">Delete</a>'
    );
  });

  /**
   * Display warning message when clicking "delete" links
   * @return {boolean}     false
   */
  $(document).on("click", ".delete", function (event) {
    $("td.actions a").css("visibility", "hidden"); // hide all action links
    var formname = "#" + $(this).data("formname");
    var cells = $("table tr:nth-child(2) td").length;
    $(this)
      .parent()
      .parent()
      .addClass("delete_selected")
      .after(
        '<tr id="delete_choices"><td colspan="' +
          cells +
          '">Do you really want to delete this? ' +
          '<a href="#" class="btn-cancel button" id="cancel_delete">Cancel</a> ' +
          '<a href="#" class="btn button" id="confirm_delete" data-form="' +
          formname +
          '">Delete</a>' +
          "</td></tr>"
      );
    $("#confirm_delete").click(function () {
      var formid = $(this).data("form");
      $(formid).submit();
      return false;
    });
    $("#cancel_delete").click(function () {
      $("#delete_choices").remove();
      $("tr.delete_selected").removeClass("delete_selected");
      $("td.actions a").removeAttr("style"); // show all action links
    });
    return false;
  });

  $(".actions-menu form").each(function () {
    $(this).after(
      '<a href="#" class="actions-menu-delete" data-formname="' +
        $(this).attr("id") +
        '">Delete</a>'
    );
    $(this).hide();
  });

  $(document).on("click", ".actions-menu-delete", function (event) {
    $(".actions-menu li").css("visibility", "hidden"); // hide all action items
    var formname = "#" + $(this).data("formname");
    $(this)
      .parent()
      .parent()
      .after(
        '<p class="delete_selected" id="delete_choices">Do you really want to delete this? ' +
          '<a href="#" class="btn-cancel button" id="cancel_delete">Cancel</a> ' +
          '<a href="#" class="btn button" id="confirm_delete" data-form="' +
          formname +
          '">Delete</a>' +
          "</p>"
      );
    $("#confirm_delete").click(function () {
      var formid = $(this).data("form");
      $(formid).submit();
      return false;
    });
    $("#cancel_delete").click(function () {
      $("#delete_choices").remove();
      $("tr.delete_selected").removeClass("delete_selected");
      $(".actions-menu li").removeAttr("style"); // show all action links
    });
    return false;
  });

  /**
   * enable responsive main navigation menu, see responsive-nav.js
   */
  var nav = responsiveNav(".nav-collapse", {
    open: function () {
      // when opening the menu, close the user menu, if it's open.
      var subnav = $(".sub-nav");
      if (subnav.is(":visible")) {
        subnav.hide();
      }
    },
  });

  if (window.getComputedStyle) {
    /**
     * Determine screen width based on generated content.
     * Generated content is added to the body within a media query.
     * see http://adactio.com/journal/5429/
     * @return {Boolean}
     */
    function isNarrowScreen() {
      var size = window
        .getComputedStyle(document.body, ":after")
        .getPropertyValue("content");
      if (
        size.indexOf("smallscreen") != -1 ||
        size.indexOf("mediumscreen") != -1 ||
        size.indexOf("widescreen") != -1
      ) {
        return false;
      } else {
        return true;
      }
    }
  }

  /**
   * Show user nav menu on click (shows on hover without Javascript).
   */
  $(".parent")
    .click(function (e) {
      $(".sub-nav").slideToggle(200);
      var narrow = isNarrowScreen();
      if (narrow) {
        nav.close(); // close the main nav menu
      }
    })
    .find(".sub-nav a")
    .click(function (e) {
      // http://stackoverflow.com/questions/2457246/jquery-click-function-exclude-children
      e.stopPropagation(); // don't slide up when user-nav-menu links are clicked
    });

  /**
   * close the user menu if you click anywhere else on the page
   */
  $(document).click(function (e) {
    var subnav = $(".sub-nav");
    if (!$(e.target).closest(".parent").length) {
      if (subnav.is(":visible")) {
        subnav.slideUp();
      }
    }
  });

  /**
   * modal window
   * http://bavotasan.com/downloads/easy-overlay-modal-window-jquery-plugin/
   * http://bakery.cakephp.org/articles/proloser/2009/07/08/serving-up-actions-as-ajax-with-jquery-in-a-few-simple-steps
   */

  $(".hijax").on("click", function (e) {
    if (isNarrowScreen() === false) {
      $("#loading").remove();
      $("#dim").remove();
      $(e.target).prepend(
        '<div id="loading"><img src="/sponge_admin/img/loading.gif" width="32" height="32" alt="Loading" /></div>'
      );
      $("body").prepend('<div id="dim"></div>');
      var modal = $("#overlayer");
      if ($(modal.length)) {
        modal.remove();
      }
      $("main").prepend(
        '<div id="overlayer"><a href="#" class="close">X</a><div id="mcontent"><div></div></div></div>'
      );
      $("#mcontent").load($(e.target).attr("href"), function () {
        $("#overlayer").css({
          display: "none",
          visibility: "visible",
        });
        $("#loading").remove();
        $("#overlayer").fadeIn(300);
        if ($("#number-booked").length) {
          $("#number-booked").focus();
        }
      });
      return false;
    }
  });

  function closeModal() {
    $("#overlayer").fadeOut(300, function () {
      $(this).remove();
    });
    $("#dim").remove();
  }

  // close modal when click anywhere outside modal except date and time pickers
  $(document).on("click", "body", function (e) {
    if ($("#overlayer").length) {
      var clicked = $(e.target); // get the element clicked
      if (
        clicked.is("#mcontent") ||
        clicked.parents().is("#mcontent") ||
        clicked.is(".ui-timepicker-container a") || // not timepicker
        clicked.is(".Zebra_DatePicker td")
      ) {
        // not Zebra date picker
        return; // click happened within the modal, do nothing here
      } else {
        // click was outside the modal, so close it
        closeModal();
        return false;
      }
    } else {
      return;
    }
  });

  // close modal when click close link
  $(document).on("click", "#overlayer a.close", function () {
    closeModal();
    return false;
  });

  /**
   * close modal when press esc key
   */
  $(document).keyup(function (e) {
    if (e.keyCode == 27) {
      closeModal();
      return false;
    }
  });

  const els = document.getElementsByClassName("hijax-panel");
  for (var i = 0, x = els.length; i < x; i++) {
    els[i].onclick = function (e) {
      const overlay = document.createElement("div");
      overlay.className = "overlay";
      const closeButton = document.createElement("button");
      closeButton.textContent = "X";
      closeButton.className = "close";
      overlay.appendChild(closeButton);
      const overlay_content = document.createElement("div");
      overlay_content.id = "overlay_content";
      const options = {
        method: "get",
        credentials: "same-origin",
        headers: {
          "X-Requested-With": "XMLHttpRequest",
        },
      };
      fetch(this.href, options)
        .then(function (response) {
          if (response.status !== 200) {
            throw new Error("There was an error getting this content");
          }
          return response.text();
        })
        .then(function (html) {
        overlay_content.innerHTML = html;
        })
        .catch(function (err) {
            overlay_content.innerHTML = error;
          console.warn("Could not load content.", err);
        });

      overlay.appendChild(overlay_content);
      document.body.appendChild(overlay);

      closeButton.addEventListener("click", () => {
        document.body.removeChild(overlay);
      });

      // from https://wesbos.com/javascript/06-serious-practice-exercises/click-outside-modal
      overlay.addEventListener('click', function(event) {
        const isOutside = !event.target.closest('#overlay_content');
        if (isOutside) {
            document.body.removeChild(overlay);
        }
      });

      window.addEventListener('keydown', event => {
        if (event.key === 'Escape') {
            document.body.removeChild(overlay);
        }
      });

      e.preventDefault();
    };
  }
});
