<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(request()->get('op') == $zain_kuwait): ?>
    <title>Zain Profile Tones</title>
    <link rel="icon" href="<?php echo e(asset('front/images/zain/Layer_3.png ')); ?>" type="image/x-icon"> <!-- Favicon-->
    <?php else: ?>
    <title>Du Profile Tones</title>
    <link rel="icon" href="<?php echo e(asset('front/images/du/du_logo.png')); ?>" type="image/x-icon"> <!-- Favicon-->
    <?php endif; ?>

    <link rel="stylesheet" href="<?php echo e(asset('front/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front/css/bootstrap.min.css')); ?>">
    <?php if(request()->get('op') == $zain_kuwait): ?>
    <link rel="stylesheet" href="<?php echo e(asset('front/css/zain/style.css')); ?>">
    <?php elseif(request()->get('op') == $du_kuwait): ?>
    <link rel="stylesheet" href="<?php echo e(asset('front/css/du/style.css')); ?>">
    <?php endif; ?>
</head>
<?php
preg_match("/iPhone|iPad|iPod/", $_SERVER['HTTP_USER_AGENT'], $matches);
$os = current($matches);

switch ($os) {
    case 'iPhone':
        if (preg_match('/OS 8/', $_SERVER['HTTP_USER_AGENT']) || preg_match('/OS 9/', $_SERVER['HTTP_USER_AGENT'])) {
            $Att = '&body=';
        } else {
            $Att = '&body=';
        }
        break;
    case 'iPad':
        $Att = '&body=';
        break;
    case 'iPod':
        $Att = '&body=';
        break;
    default:
        $Att = '?body=';
        break;
}
?>

<body>
    <main class="main_container">
        <div class="container">
            <a href="" class="logo">
            <?php if(request()->get('op') == $zain_kuwait): ?>
                <img class="d-block m-auto" src="<?php echo e(asset('front/images/zain/Layer_3.png')); ?>" alt="zain">
            <?php elseif(request()->get('op') == $du_kuwait): ?>
            <img class="d-block m-auto" src="<?php echo e(asset('front/images/du/du_logo.png')); ?>" alt="zain">
            <?php endif; ?>
            </a>

            <div class="head_title mt-2">
                <?php if(request()->get('op') == $zain_kuwait): ?>
                <img class="d-block m-auto Profile_Tones" src="<?php echo e(asset('front/images/zain/Profile_Tones.png')); ?>" alt="zain">
                <?php elseif(request()->get('op') == $du_kuwait): ?>
                <h4 class="text-center text-capitalize">Profile Tone</h4>
                <?php endif; ?>
            </div>

            <div class="ring_tone text-center d-block font-weight-bold">سمع متصليك هذه الرسالة اضغط <i class="far fa-check-circle fa-lg"></i> للأشتراك</div>
        </div>
        <?php $__currentLoopData = $get_content_from_rbt_for_indexs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get_content_from_rbt_for_index): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="content w-100">
            <div class="row m-0 w-100">
                <div class="col-md-4 col-lg-4 col-4 pl-2 pr-0">
                    <a href="sms:<?php echo e($get_content_from_rbt_for_index->rbt_sms_code .$Att.$get_content_from_rbt_for_index->rbt_code); ?>">
                        <div class="circle">
                            <i class="far fa-check-circle"></i>
                        </div>
                    </a>

                    <a data-src="<?php echo e(url('/uploads/content/path/'.$get_content_from_rbt_for_index->path)); ?>" class="play_pause">
                        <i class="far fa-play-circle remove-swirl-in-bck"></i>
                    </a>
                </div>

                <div class="col-md-8 col-lg-8 col-8 p-0">
                    <div class="img_left">
                        <img class="w-100" src=" <?php echo e(url('uploads/image_rbt/'.$get_content_from_rbt_for_index->image_rbt)); ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </main>

    <a class="text-center" href="javascript:" id="return-to-top">
        <i class="rounded-circle fas fa-chevron-up"></i>
    </a>

    <script src="<?php echo e(asset('front/js/jquery-3.3.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front/js/popper.min.js')); ?>"></script>

    <script>
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) { // If page is scrolled more than 50px
                $('#return-to-top').fadeIn(800); // Fade in the arrow
            } else {
                $('#return-to-top').fadeOut(800); // Else fade out the arrow
            }
        });
        $('#return-to-top').click(function() { // When arrow is clicked
            $('body,html').animate({
                scrollTop: 0, // Scroll to top of body
            }, 2000);
        });
    </script>

    <script>
        $(".fa-play-circle").click(function() {
            $(this).toggleClass("swirl-in-fwd");
        });

        $(".remove-swirl-in-bck").click(function() {
            if ($(this).hasClass("fa-pause-circle")) {
                $(this).addClass("swirl-in-bck");
            } else {
                $(this).removeClass("swirl-in-bck");
            }
        });
    </script>

    <script>
        let audio = new Audio();

        $('.play_pause').click(function(e) {
            e.preventDefault()

            if (!audio.paused) {
                audio.pause();
            }

            audio.src = $(this).data('src')

            if ($(this).children('i').hasClass('fa-play-circle')) {
                $(this).children('i').removeClass('fa-play-circle').addClass('fa-pause-circle')

                $('.far').not($(this).children('i')).each(function() {
                    if ($(this).hasClass('fa-pause-circle')) {
                        $(this).removeClass('fa-pause-circle').addClass('fa-play-circle')
                    }
                })
                audio.play();
            } else {
                $(this).children('i').removeClass('fa-pause-circle').addClass('fa-play-circle')
            }
        })


        $('.circle').parent('a').click(function() {
            if (!audio.paused) {
                audio.pause();
            }
            $('.play_pause').children('i').removeClass('fa-pause-circle').addClass('fa-play-circle');
        })
        op_id = <?php echo e(request()->filled('op') ? 1 : 0); ?>

        if (op_id) {
            var operator_id = <?php echo e(request()->filled('op') ? request()->get('op') : ''); ?>

            $('.link_href').each(function() {
                var $this = $(this);
                var _href = $this.attr("href");
                if (_href.includes('?')) {
                $this.attr("href", _href + '&op=' + operator_id);
                } else {
                $this.attr("href", _href + '?op=' + operator_id);
                }
            });
        }
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\profile_tones_backend\resources\views/front/index.blade.php ENDPATH**/ ?>