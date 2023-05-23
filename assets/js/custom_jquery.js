/*

function resetForm() 
{
	$('#comment_btn')[0].reset();
}

$(document).ready(function () {
  $(document).on("click", "#comment_btn", function (e) {
    //e.preventDefault();

    var post_id = $(this).val();
    var comment = $(this).closest("#feed").find("#comment").val();
    //alert(post_id);comment

    //jqAjax
    $.ajax({
      method: "POST",
      url: "controller/CommentController.php",
      data: {
        post_id: post_id,
        comment: comment,
        scope: "comments",
      },
      success: function (response) {
        resetForm();
        if (response == 201) {
            alertify.error("Something went wrong");
        } else if (response == 500) {
          alertify.error("Something went wrong");
          $("#autoReload").load(location.href + " #autoReload");
        }
      },
    });
  });
});*/
