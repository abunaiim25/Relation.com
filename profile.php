<?php
include('includes/header.php');
if (isset($_SESSION['auth'])) {
    include('includes/post-modal.php');
}
include('controller/GetController.php');
include('auth/authenticate.php'); //if not login, user can not go this section
?>


<div class="container" style="margin-top: 80px;">
    <div class="row">

        <div class="col-md-3"></div>

        <div class="col-md-6">
            <?php
            $user_me = getUserMe();

            if (mysqli_num_rows($user_me) > 0) {
                $data = mysqli_fetch_array($user_me);
            ?>
                <div class="row d-flex justify-content-center">
                    <div class="card p-3 py-4">
                        <div class="d-flex justify-content-center">
                            <?php
                            if ($data['profile_image'] == '') {
                            ?>
                                <img src="assets/images/img_avatar.png" width="100" height="100" class="rounded-circle">
                            <?php
                            } else {
                            ?>
                                <div class="circle">
                                    <img src="uploads/profile/<?= $data['profile_image']; ?>">
                                </div>

                            <?php
                            }
                            ?>
                            <a href="edit-profile.php">
                                <svg class="end" style="height:20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                </svg>
                            </a>
                        </div>

                        <div class="text-center mt-2">
                            <h5 class="mt-2 mb-0 text-bold"><?= $data['name']; ?></h5>
                            <span class="text-muted mt-0"><?= $data['email']; ?></span>

                            <div class="px-4 mt-2">
                                <p class="fonts">
                                    <?php
                                    if ($data['bio'] == '') {
                                        echo "Add your bio";
                                    } else {
                                        echo $data['bio'];
                                    }
                                    ?>
                                </p>

                            </div>

                            <div class="buttons">
                                <a class="btn btn-primary px-4 ms-3" target="_blank" href="https://mail.google.com/mail/u/0/#inbox?compose=new">Mail</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

            <div class="middle">
                <!--START CREATE POST-->
                <?php if (isset($_SESSION['auth'])) { ?>
                    <div class="create-post">
                        <div class="profile-photo">
                            <img height="100%" width="100%" src="assets/images/AN3.jpeg" alt="" />
                        </div>
                        <input type="text" placeholder="What's on your mind?" data-bs-toggle="modal" data-bs-target="#postModal" id="create-post" />
                        <input type="submit" value="Post" class="btn btn-primary" />
                    </div>
                <?php } ?>
                <!--END CREATE POST-->



                <!--START FEEDS-->
                <?php
                $userid = $data['id'];
                $post_items = getPostMyAll();
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
                            <div class="feed">

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

                                    <span class="delete">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <form action="controller/PostController.php" method="POST">
                                                    <input type="hidden" name="post_id" value="<?= $item['id'] ?> ">
                                                    <button type="submit" class=" px-3" name="delete_post_btn">Delete</button>
                                                </form>
                                            </li>
                                        </ul>

                                    </span>
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