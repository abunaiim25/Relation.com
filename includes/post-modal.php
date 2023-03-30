<!-- Modal -->
<div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="postModalLabel">Post Relation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <form action="controller/PostController.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <textarea name="text_des" id="" rows="7"></textarea>

                    <div class="body_image">
                        <div class="container_img select-image">
                            <input type="file" name="image" id="file" accept="image/*" hidden>
                            <div class="img-area" data-img="">
                                <i class='bx bxs-cloud-upload icon'></i>
                                <h3>Upload Image</h3>
                                <p>Image size must be less than <span>2MB</span></p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal-footer  d-flex justify-content-center">
                    <button type="submit" name="post_btn" class="btn btn-primary btn-sm">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const selectImage = document.querySelector('.select-image');
    const inputFile = document.querySelector('#file');
    const imgArea = document.querySelector('.img-area');

    selectImage.addEventListener('click', function() {
        inputFile.click();
    })

    inputFile.addEventListener('change', function() {
        const image = this.files[0]
        if (image.size < 2000000) {
            const reader = new FileReader();
            reader.onload = () => {
                const allImg = imgArea.querySelectorAll('img');
                allImg.forEach(item => item.remove());
                const imgUrl = reader.result;
                const img = document.createElement('img');
                img.src = imgUrl;
                imgArea.appendChild(img);
                imgArea.classList.add('active');
                imgArea.dataset.img = image.name;
            }
            reader.readAsDataURL(image);
        } else {
            alert("Image size more than 2MB");
        }
    })
</script>
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<style>
    textarea {
        width: 100%;
        height: 150px;
        padding: 12px 20px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        resize: none;
    }

    :root {
        --blue: #0071FF;
        --light-blue: #B6DBF6;
        --dark-blue: #005DD1;
        --grey: #f2f2f2;
    }

    .body_image {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container_img {
        max-width: 400px;
        width: 100%;
        background: #fff;
        padding: 30px;
        border-radius: 30px;
        cursor: pointer;
    }

    .container_img .img-area {
        position: relative;
        width: 100%;
        height: 240px;
        background: var(--grey);
        margin-bottom: 30px;
        border-radius: 15px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .container_img .img-area .icon {
        font-size: 100px;
    }

    .container_img .img-area h3 {
        font-size: 20px;
        font-weight: 500;
        margin-bottom: 6px;
    }

    .container_img .img-area p {
        color: #999;
    }

    .container_img .img-area p span {
        font-weight: 600;
    }

    .container_img .img-area img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        z-index: 100;
    }

    .container_img .img-area::before {
        content: attr(data-img);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .5);
        color: #fff;
        font-weight: 500;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        pointer-events: none;
        opacity: 0;
        transition: all .3s ease;
        z-index: 200;
    }

    .container_img .img-area.active:hover::before {
        opacity: 1;
    }
</style>