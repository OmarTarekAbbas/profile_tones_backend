<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zain Profile Tones</title>
    <link rel="icon" href="images/Layer_3.png" type="image/x-icon"> <!-- Favicon-->
    <link rel="stylesheet" href="{{ asset('front/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
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

$operatorCode = '9999';
$audio_one_sms = $operatorCode . $Att . '1234';
$audio_two_sms = $operatorCode . $Att . '1234';
$audio_three_sms = $operatorCode . $Att . '1234';
$audio_four_sms = $operatorCode . $Att . '1234';
$audio_five_sms = $operatorCode . $Att . '1234';
$audio_6_sms = $operatorCode . $Att . '1234';
$audio_7_sms = $operatorCode . $Att . '1234';
$audio_8_sms = $operatorCode . $Att . '1234';
$audio_9_sms = $operatorCode . $Att . '1234';
$audio_10_sms = $operatorCode . $Att . '1234';
$audio_11_sms = $operatorCode . $Att . '1234';
$audio_12_sms = $operatorCode . $Att . '1234';
$audio_13_sms = $operatorCode . $Att . '1234';
$audio_14_sms = $operatorCode . $Att . '1234';
$audio_15_sms = $operatorCode . $Att . '1234';
$audio_16_sms = $operatorCode . $Att . '1234';
$audio_17_sms = $operatorCode . $Att . '1234';
$audio_18_sms = $operatorCode . $Att . '1234';
$audio_19_sms = $operatorCode . $Att . '1234';
$audio_20_sms = $operatorCode . $Att . '1234';
$audio_21_sms = $operatorCode . $Att . '1234';
$audio_22_sms = $operatorCode . $Att . '1234';
$audio_23_sms = $operatorCode . $Att . '1234';
$audio_24_sms = $operatorCode . $Att . '1234';
$audio_25_sms = $operatorCode . $Att . '1234';
?>

<body>
    <main class="main_container">
        <div class="container">
            <a href="index.php" class="logo">
                <img class="d-block m-auto" src="{{ asset('front/images/Layer_3.png') }}" alt="zain">
            </a>

            <div class="head_title mt-2">
                <!-- <h4 class="text-center text-capitalize">profile tone</h4> -->
                <img class="d-block m-auto Profile_Tones" src="{{ asset('front/images/Profile_Tones.png') }}" alt="zain">

            </div>

            <div class="ring_tone text-center d-block font-weight-bold">سمع متصليك هذه الرسالة اضغط <i class="far fa-check-circle fa-lg"></i> للأشتراك</div>
        </div>

        <div class="content w-100">
            <div class="row m-0 w-100">
                <div class="col-md-4 col-lg-4 col-4 pl-2 pr-0">
                    <a href="sms:<?php echo $audio_one_sms ?>">
                        <div class="circle">
                            <i class="far fa-check-circle"></i>
                        </div>
                    </a>

                    <a data-src="{{ asset('front/track/01.mp3') }}" class="play_pause">
                        <i class="far fa-play-circle remove-swirl-in-bck"></i>
                    </a>
                </div>

                <div class="col-md-8 col-lg-8 col-8 p-0">
                    <div class="img_left">
                        <img class="w-100" src=" {{ asset('front/images/01.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="content w-100">
            <div class="row m-0 w-100">
                <div class="col-md-4 col-lg-4 col-4 pl-2 pr-0">
                    <a href="sms:<?php echo $audio_one_sms ?>">
                        <div class="circle">
                            <i class="far fa-check-circle"></i>
                        </div>
                    </a>

                    <a data-src="{{ asset('front/track/01.mp3') }}" class="play_pause">
                        <i class="far fa-play-circle remove-swirl-in-bck"></i>
                    </a>
                </div>

                <div class="col-md-8 col-lg-8 col-8 p-0">
                    <div class="img_left">
                        <img class="w-100" src=" {{ asset('front/images/01.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="content w-100">
            <div class="row m-0 w-100">
                <div class="col-md-4 col-lg-4 col-4 pl-2 pr-0">
                    <a href="sms:<?php echo $audio_one_sms ?>">
                        <div class="circle">
                            <i class="far fa-check-circle"></i>
                        </div>
                    </a>

                    <a data-src="{{ asset('front/track/01.mp3') }}" class="play_pause">
                        <i class="far fa-play-circle remove-swirl-in-bck"></i>
                    </a>
                </div>

                <div class="col-md-8 col-lg-8 col-8 p-0">
                    <div class="img_left">
                        <img class="w-100" src=" {{ asset('front/images/01.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="content w-100">
            <div class="row m-0 w-100">
                <div class="col-md-4 col-lg-4 col-4 pl-2 pr-0">
                    <a href="sms:<?php echo $audio_one_sms ?>">
                        <div class="circle">
                            <i class="far fa-check-circle"></i>
                        </div>
                    </a>

                    <a data-src="{{ asset('front/track/01.mp3') }}" class="play_pause">
                        <i class="far fa-play-circle remove-swirl-in-bck"></i>
                    </a>
                </div>

                <div class="col-md-8 col-lg-8 col-8 p-0">
                    <div class="img_left">
                        <img class="w-100" src=" {{ asset('front/images/01.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="content w-100">
            <div class="row m-0 w-100">
                <div class="col-md-4 col-lg-4 col-4 pl-2 pr-0">
                    <a href="sms:<?php echo $audio_one_sms ?>">
                        <div class="circle">
                            <i class="far fa-check-circle"></i>
                        </div>
                    </a>

                    <a data-src="{{ asset('front/track/01.mp3') }}" class="play_pause">
                        <i class="far fa-play-circle remove-swirl-in-bck"></i>
                    </a>
                </div>

                <div class="col-md-8 col-lg-8 col-8 p-0">
                    <div class="img_left">
                        <img class="w-100" src=" {{ asset('front/images/01.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>


    </main>

    <a class="text-center" href="javascript:" id="return-to-top">
        <i class="rounded-circle fas fa-chevron-up"></i>
    </a>

    <script src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/popper.min.js') }}"></script>

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
    </script>
</body>

</html>
