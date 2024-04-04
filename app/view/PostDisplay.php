<div class="post-container post-row">
  <div class="posted-by">
    <div class="pic">
      <?php if (empty($post['profile_pic'])): ?>
        <img src="./view/public/assets/dummy.jpg" alt="">
      <?php else: ?>
        <img src="data:image;base64, <?php echo (base64_encode($post['profile_pic'])); ?>" alt="">
      <?php endif; ?>
    </div>
    <h5 class="uname"><?php echo $post['user_name'] ?></h5>
  </div>
  <div class="post">
    <p><?php echo $post['content'] ?></p>
    <img src="data:<?php echo $post['media_type'];?>;base64, <?php echo (base64_encode($post['media'])); ?>" alt="">
  </div>
  <div id="like-con" data-post-id="<?php echo $post['post_id'];?>">
    <i class="uil uil-thumbs-up like">
      <?php echo $post['likes'];?>
    </i>
  </div>
</div>