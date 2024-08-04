<div class="comment-form bg-gray-100 p-4 rounded-lg">
    <?php 
    comment_form(array(
        'class_submit' => 'my-custom-submit-button',
    )); 
    ?>
</div>



<div class="comments-list mt-8">
    <?php
    wp_list_comments(array(
        'style'       => 'div',
        'short_ping'  => true,
        'avatar_size' => 50,
        'callback'    => 'my_comment_callback'
    ));
    ?>
</div>
