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
      dataType: 'json',
      // Callback function to handle successful AJAX response
      success: function(response) { 
        if (response[0] == 1){
          $this.find('#like-count').text(response[1]);
          $this.find('#thumbs').html('<i class="fa-solid fa-thumbs-up"></i>');
        }
        else {
          $this.find('#like-count').text(response[1]);
          $this.find('#thumbs').html('<i class="uil uil-thumbs-up"></i>');
        }
      },
      // Callback function to handle error
      error: function(xhr, status, error) { 
        console.error(xhr.responseText);  
      }
    });
  });

  $(document).on("click", "#comment-btn", function(){
    let postid = $(this).data('post-id');
    let $this = $(this).parent();
    $this.find('#comments-display').slideToggle(300);
    $.ajax({
      // PHP file handling the request
      url: 'AJAX/CommentLoad.php',
      // Request method
      type: 'POST',
      // Data to be sent to the server       
      data: { 
        'post_id': postid
      },
      // Callback function to handle successful AJAX response
      success: function(response) { 
        if (response){
          $this.find('#comments').html(response);
        }
      },
      // Callback function to handle error
      error: function(xhr, status, error) { 
        console.error(xhr.responseText);  
      }
    });
  });
  
  $(document).on( 'submit', '#commentForm', function(event) {
    // Prevent the form from submitting via the browser's default method
    event.preventDefault();
    $this = $(this);
    // Serialize the form data
    let formData = {
      'post_id': $(this).parent().data('post-id'),
      'comment': $(this).find('#post_comm').val(),
      'user_id': $("#user-id").val()
    };
    let value = $this.parent().parent().parent().find('#comm-count');
    
    // Send an AJAX request
    $.ajax({
      type: 'POST',
      url: 'AJAX/CommentAdd.php', // Change 'your-server-url.php' to the URL where you want to handle the form submission
      data: formData,
      success: function(response) {
        // Handle the successful response here
        value.text(parseInt(value.text(), 10)+1);
        $this.parent().siblings('#comments').html(response);
      },
      error: function(xhr, status, error) {
        // Handle errors here
        console.error('Error submitting form:', error);
      }
    });
  });  
});


