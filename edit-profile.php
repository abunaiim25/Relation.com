<?php
include('includes/header.php');
if (isset($_SESSION['auth'])) {
    include('includes/post-modal.php');
}
include('controller/GetController.php');
include('auth/authenticate.php'); //if not login, user can not go this section
?>


<div class="container" style="margin-top: 80px;">
    <div class="row ">

        <div class="col-md-3"></div>

        <div class="col-md-6 card p-5 mt-5">
        <?php
            $user_me = getUserMe();

            if (mysqli_num_rows($user_me) > 0) {
                $data = mysqli_fetch_array($user_me);
            ?>
            <form action="controller/AuthController.php" method="POST" enctype="multipart/form-data">

                <div class="profile_circle">
                    <div class="row">
                        <div class="small-12 medium-2 large-2 columns profile_rel">
                            <div class="circle">
                                <img class="profile-pic" src="uploads/profile/<?= $data['profile_image']; ?>">
                                <input type="hidden" name="old_image" value="<?= $data['profile_image']; ?>">
                            </div>
                            <div class="p-image">
                                <i class="fa fa-camera upload-button"></i>
                                <input class="file-upload" name="profile_image" type="file" accept="image/*"  />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-4">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="<?=$data['name'];?>" required>
                </div>

                <div class="form-group mt-4">
                    <label>Bio</label>
                    <textarea type="text" name="bio" placeholder="Add your bio"><?=$data['bio'];?></textarea>
                </div>


                <input type="submit" name="profile_update_btn" value="Update" class="btn btn-pill text-white btn-block mt-4" style="background: brown;">
            </form>
            <?php
            }
            ?>
        </div>

        <div class="col-md-3"></div>
    </div>
</div>


<style>
    /**Profile Image */
    .profile_circle {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .profile_circle .profile-pic {
        width: 200px;
        max-height: 200px;
        display: inline-block;
    }

    .profile_circle .file-upload {
        display: none;
    }

    .profile_circle .circle {
        border-radius: 100% !important;
        overflow: hidden;
        width: 128px;
        height: 128px;
        border: 2px solid rgba(255, 255, 255, 0.2);

    }

    .profile_circle img {
        max-width: 100%;
        height: auto;
    }

    .profile_rel {
        position: relative;
    }

    .profile_circle .p-image {
        position: absolute;
        top: 115px;
        right: 40px;
        color: #666666;
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }

    .profile_circle .p-image:hover {
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }

    .profile_circle .upload-button {
        font-size: 1.2em;
    }

    .profile_circle .upload-button:hover {
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
        color: #999;
    }
</style>


<script src="assets/js/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.profile-pic').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(".file-upload").on('change', function() {
            readURL(this);
        });
        $(".upload-button").on('click', function() {
            $(".file-upload").click();
        });
    });
</script>

<?php
include('includes/footer.php');
?>