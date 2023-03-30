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
                                    <img src="uploads/profile/<?= $data['profile_image']; ?>" >
                                </div>
                               
                            <?php
                            }
                            ?>
                            <a href="edit-profile.php" >
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
                        <input type="text" placeholder="What's on your mind, Diana?" data-bs-toggle="modal" data-bs-target="#postModal" id="create-post" />
                        <input type="submit" value="Post" class="btn btn-primary" />
                    </div>
                <?php } ?>
                <!--END CREATE POST-->



                  <!--START FEEDS-->
                  <div class="feeds">
                    <div class="feed">
                        <div class="head">
                            <div class="user">
                                <div class="profile-photo">
                                    <img height="100%" width="100%" src="assets/images/rose.jpg" alt="" />
                                </div>

                                <div class="info">
                                    <h5>Lana Rose</h5>
                                    <small>Dubai, 15 MINUTES AGO</small>
                                </div>
                            </div>

                            <span class="edit">
                                <i class="uil uil-ellipsis-h"></i>
                            </span>
                        </div>

                        <div class="photo blur ">
                            <img src="assets/images/rose.jpg" alt="" />
                        </div>

                        <div class="action-button">
                            <div class="interaction-buttons">
                                <span><i class="uil uil-heart"></i></span>
                                <span><i class="uil uil-comment-dots"></i></span>
                                <span><i class="uil uil-share-alt"></i></span>
                            </div>

                            <div class="bookmark">
                                <span><i class="uil uil-bookmark-full"></i></span>
                            </div>
                        </div>

                        <div class="liked-by">
                            <span> <img height="100%" width="100%" src="assets/images/AN3.jpeg" alt="" /></span>
                            <span> <img height="100%" width="100%" src="assets/images/AN3.jpeg" alt="" /></span>
                            <span> <img height="100%" width="100%" src="assets/images/AN3.jpeg" alt="" /></span>
                            <p>Linked by <b>Ernest Achiever</b> and 2,323 others</p>
                        </div>

                        <div class="caption">
                            <p>
                                <b>Lana Rose </b>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam id qui.
                                <span class="harsh-tag">#lifesycle</span>
                            </p>
                        </div>
                        <div class="text-muted comments">View all 299 comments</div>
                    </div>

                    <!--FEED1-->
                    <div class="feed">
                        <div class="head">
                            <div class="user">
                                <div class="profile-photo">
                                    <img height="100%" width="100%" src="assets/images/AN6.jpg" alt="" />
                                </div>

                                <div class="info">
                                    <h5>Lana Rose</h5>
                                    <small>Dubai, 15 MINUTES AGO</small>
                                </div>
                            </div>

                            <span class="edit">
                                <i class="uil uil-ellipsis-h"></i>
                            </span>
                        </div>

                        <div class="photo blur ">
                            <img src="assets/images/AN6.jpg" alt="" />
                        </div>

                        <div class="action-button">
                            <div class="interaction-buttons">
                                <span><i class="uil uil-heart"></i></span>
                                <span><i class="uil uil-comment-dots"></i></span>
                                <span><i class="uil uil-share-alt"></i></span>
                            </div>

                            <div class="bookmark">
                                <span><i class="uil uil-bookmark-full"></i></span>
                            </div>
                        </div>

                        <div class="liked-by">
                            <span> <img height="100%" width="100%" src="assets/images/AN3.jpeg" alt="" /></span>
                            <span> <img height="100%" width="100%" src="assets/images/AN3.jpeg" alt="" /></span>
                            <span> <img height="100%" width="100%" src="assets/images/AN3.jpeg" alt="" /></span>
                            <p>Linked by <b>Ernest Achiever</b> and 2,323 others</p>
                        </div>

                        <div class="caption">
                            <p>
                                <b>Lana Rose </b>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam id qui.
                                <span class="harsh-tag">#lifesycle</span>
                            </p>
                        </div>
                        <div class="text-muted comments">View all 299 comments</div>
                    </div>
                </div>
                <!--END FEEDS-->
            </div>
        </div>

        <div class="col-md-3"></div>
    </div>
</div>


<?php
include('includes/footer.php');
?>