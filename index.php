<?php
include('includes/header.php');
include('auth/authenticate.php'); //if not login, user can not go this section
include('controller/GetController.php');
include('includes/post-modal.php');
?>


<div class="container" style="margin-top: 80px;">
    <div class="row">

        <div class="col-md-3"></div>

        <div class="col-md-6">
            <?php if (isset($_SESSION['auth'])) {
                //include('includes/search_user.php');
            } ?>

            <div class="middle  mb-3">


                <!--START CREATE POST-->
                <?php if (isset($_SESSION['auth'])) { ?>

                    <?php
                    $user_me = getUserMe();
                    if (mysqli_num_rows($user_me) > 0) {
                        $user = mysqli_fetch_array($user_me);
                    ?>
                        <div class="create-post">
                            <div class="profile-photo">
                                <?php
                                if ($user['profile_image'] == '') {
                                ?>
                                    <img height="100%" width="100%" src="assets/images/img_avatar.png" alt="" />
                                <?php
                                } else {
                                ?>
                                    <img height="100%" width="100%" src="uploads/profile/<?= $user['profile_image']; ?>" alt="" />
                                <?php
                                }
                                ?>
                            </div>
                            <input type="text" placeholder="What's on your mind?" data-bs-toggle="modal" data-bs-target="#postModal" id="create-post" />
                            <input type="submit" value="Post" class="btn btn-primary" />
                        </div>
                    <?php } ?>
                <?php } ?>
                <!--END CREATE POST-->



                <!--START FEEDS-->
                <?php
                $userid = $user['id'];
                $post_items = getPostAll();
                if (mysqli_num_rows($post_items) > 0) {
                ?>
                    <div class="feeds" id='autoReload'>
                        <?php
                        foreach ($post_items as $item) {

                            $postid = $item['id'];
                            $type = -1;

                            $status_query = "SELECT count(*) as cntStatus,type FROM like_unlike WHERE user_id=" . $userid . " and post_id=" . $postid;
                            $status_result = mysqli_query($conn, $status_query);
                            $status_row = mysqli_fetch_array($status_result);
                            $count_status = $status_row['cntStatus'];
                            if ($count_status > 0) {
                                $type = $status_row['type'];
                            }

                            $like_query = "SELECT COUNT(*) AS cntLikes FROM like_unlike WHERE type=1 and post_id=" . $postid;
                            $like_result = mysqli_query($conn, $like_query);
                            $like_row = mysqli_fetch_array($like_result);
                            $total_likes = $like_row['cntLikes'];

                            $unlike_query = "SELECT COUNT(*) AS cntUnlikes FROM like_unlike WHERE type=0 and post_id=" . $postid;
                            $unlike_result = mysqli_query($conn, $unlike_query);
                            $unlike_row = mysqli_fetch_array($unlike_result);
                            $total_unlikes = $unlike_row['cntUnlikes'];
                        ?>
                            <div class="feed" id="feed">

                                <div class="head">
                                    <div class="user">
                                        <div class="profile-photo">
                                            <img height="100%" width="100%" src="uploads/profile/<?= $item['profile_image']; ?>" alt="" />
                                        </div>
                                        <div class="info">
                                            <h5><?= $item['name'] ?></h5>
                                            <small><?= $item['created_at'] ?></small>
                                        </div>
                                    </div>
                                   
                                </div>


                                <div>
                                    <div class="caption mt-3">

                                        <p><?= $item['text_des'] ?></p>
                                    </div>
                                    <div class="photo  ">
                                        <img src="uploads/post/<?= $item['image'] ?>" alt="" />
                                    </div>
                                </div>


                                <div class="action-button">
                                    <div class="interaction-buttons">

                                        <span>
                                            <button type="button" id="like_<?php echo $postid; ?>" class="like m-0 p-0" style="<?php if ($type == 1) {
                                                                                                                                    echo "color: red;";
                                                                                                                                } ?>"> <i class="fa-solid fa-heart"></i> <?php echo $total_likes ?></button>
                                        </span>
                                        <span>
                                            <button type="button" id="unlike_<?php echo $postid; ?>" class="unlike m-0 p-0" style="<?php if ($type == 0) {
                                                                                                                                        echo "color: #ffa449;";
                                                                                                                                    } ?>"> <i class="uil uil-thumbs-down"></i> <?php echo $total_unlikes ?></button>
                                        </span>

                                        <span>
                                            <button type="button" class="comment m-0 p-0" data-toggle="reply-form" data-target="<?php echo $postid; ?>">C</button>
                                        </span>
                                    </div>

                                </div>

                                <!-- Reply form start -->
                                <!--
                                <div class="reply-form d-none" id="<?php echo $postid; ?>">
                                    <input type="hidden" name="post_id" value="<?= $item['id']; ?>">
                                    <textarea name="comment" id="comment" placeholder="Reply to comment" rows="4"></textarea>
                                    <button type="button" id="comment_btn" value="<?php echo $postid; ?>">Submit</button>
                                    <button type="button" data-toggle="reply-form" data-target="<?php echo $postid; ?>">Cancel</button>
                                </div>
                                                                                                                                -->
                                <form method="POST" action="controller/CommentController.php" class="reply-form d-none" id="<?php echo $postid; ?>">
                                    <input type="hidden" name="post_id" value="<?= $item['id']; ?>">
                                    <textarea name="comment" placeholder="Reply to comment" rows="4"></textarea>
                                    <button type="submit" name="comment_btn">Submit</button>
                                    <button type="button" data-toggle="reply-form" data-target="<?php echo $postid; ?>">Cancel</button>
                                </form>



                                <?php
                                $comment = getComment();

                                if (mysqli_num_rows($comment) > 0) {
                                    foreach ($comment as $com) {
                                        if ($com['postsid'] == $item['id']) //$item['id']=post id
                                        {
                                ?>
                                            <div class="create-post m-0">
                                                <input readonly type="text" value=" <?= $com['comment'] ?> " />
                                            </div>
                                <?php
                                        }
                                    }
                                } else {
                                    echo "No Comments";
                                }
                                ?>



                            </div>
                        <?php  } ?>
                    </div>
                <?php  } ?>
                <!--END FEEDS-->

            </div>
        </div>

        <div class="col-md-3"></div>

    </div>
</div>


<?php
include('includes/footer.php');
?>