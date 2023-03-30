<?php
include('includes/header.php');
include('includes/post-modal.php');
?>


<div class="container" style="margin-top: 80px;">
    <div class="row">

        <div class="col-md-3"></div>

        <div class="col-md-6">

        <?php if (isset($_SESSION['auth'])) {
         include('includes/search_user.php');
        }?>

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