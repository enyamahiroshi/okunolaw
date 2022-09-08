(function ($) {
  /* eureka 211104 [機能修正]#0006 利用規約同意用チェックボックス対応 */
  if ($('input[id="fm-agree-1"]:checked').val()) {
    $('[name="submitConfirm"]').prop("disabled", false);
  } else {
    $('[name="submitConfirm"]').prop("disabled", true);
  }
  $('[id="fm-agree-1"]').click(function () {
    if ($('input[id="fm-agree-1"]:checked').val()) {
      $('[name="submitConfirm"]').prop("disabled", false);
    } else {
      $('[name="submitConfirm"]').prop("disabled", true);
    }
  });
  if (location.pathname === "/contact/confirmation/") {
    $('[name="submitButton"]').prop("disabled", false);
  }
})(jQuery);