<!-- jQuery -->
<script src="template/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="template/admin/dist/js/adminlte.min.js"></script>

<script src="template/admin/js/main.js"></script>

<!-- Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    function ChangeToSlug()
    {
        var title, slug;
    
        //Lấy text từ thẻ input title 
        title = document.getElementById("title").value;
    
        //Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();
    
        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('slug').value = slug;
    }
</script>


<script>
    let filesAmount = [];
    function removeImage(i) {
        const fileListArr = Array.from(filesAmount);
        fileListArr.splice(i);
        filesAmount = fileListArr;
        $('.preview-images').find('.img-item').eq(i).remove();
        $('.images-input').files = fileListArr;
    }
    const imagesPreview = function (input, placeToInsertImagePreview) {
        if (input.files) {
            filesAmount = input.files;
            $('.preview-images').empty();
            for (let i = 0; i < filesAmount.length; i++) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    const node = document.createElement('span');
                    node.addEventListener('click', () => {
                        removeImage(i);
                    })
                    node.style.position = 'relative';
                    node.classList.add('img-item');
                    node.innerHTML = `<img src="${event.target.result}" alt="Image" style="width:150px;height:100px;"><span class="remove-img">
<div>x</div></span>`;
                    $(placeToInsertImagePreview).append(node);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };
    $('.images-input').on('change', function () {
        imagesPreview(this, '.preview-images');
    });
</script>