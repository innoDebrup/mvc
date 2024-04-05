$(document).ready(function() {
  let count = 2;
  const $nav = $(".nav"),
    $searchIcon = $("#searchIcon"),
    $navOpenBtn = $(".navOpenBtn"),
    $navCloseBtn = $(".navCloseBtn");

  $searchIcon.click(function() {
    $nav.toggleClass("openSearch");
    $nav.removeClass("openNav");
    if ($nav.hasClass("openSearch")) {
      $searchIcon.removeClass("uil-search");
      $searchIcon.addClass("uil-times cross");
    } else {
      $searchIcon.removeClass("uil-times cross");
      $searchIcon.addClass("uil-search");
    }
  });

  $navOpenBtn.click(function() {
    $nav.addClass("openNav");
    $nav.removeClass("openSearch");
    $searchIcon.removeClass("uil-times");
    $searchIcon.addClass("uil-search");
  });

  $navCloseBtn.click(function() {
    $nav.removeClass("openNav");
  });

  $("#more").click(function(){
    $.ajax({
      // PHP file handling the request
      url: 'AJAX/LoadMore.php',
      // Request method
      type: 'POST',
      // Data to be sent to the server       
      data: { 
        offset: count 
      },
      // Callback function to handle successful AJAX response
      success: function(response) { 
        if ($.trim(response)) {
          $("#loaded-content").append(response);
          count = count + 2;
        }
        else {
          $("#load-message").html('All content loaded. Nothing to Load !!!');
        }
      },
      // Callback function to handle error
      error: function(xhr, status, error) { 
        console.error(xhr.responseText);  
      }
    });
  });
  // Like feature (Testing only).
  $(document).on("click", "#like-con", function(){
    let postid = $(this).data('post-id');
    let userid = $("#user-id").val();
    let likes = $(this).find("#like-count").data('likes');
    let $this = $(this);
    $.ajax({
      // PHP file handling the request
      url: 'AJAX/Like.php',
      // Request method
      type: 'POST',
      // Data to be sent to the server       
      data: { 
        post_id: postid,
        user_id: userid 
      },
      // Callback function to handle successful AJAX response
      success: function(response) { 
        $this.find('#like-count').text(likes + 1);
      },
      // Callback function to handle error
      error: function(xhr, status, error) { 
        console.error(xhr.responseText);  
      }
    });
  });

});


