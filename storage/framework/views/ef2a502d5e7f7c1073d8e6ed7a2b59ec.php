<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>FORMADIKSI</title>
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('logopolindra.png ')); ?>">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--

TemplateMo 570 Chain App Dev

https://templatemo.com/tm-570-chain-app-dev

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/templatemo-chain-app-dev.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="<?php echo e(asset('formadiksi.png')); ?>" alt="Chain App Dev" height="80px" width="80px">
                            
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#services">Services</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                            <li class="scroll-to-section"><a href="#rumahaspirasi">Rumah Aspirasi</a></li>
                            <li class="scroll-to-section"><a href="#artikel">Artikel</a></li>
                            <li>
                                <div class="gradient-button"><a id="modal_trigger" href="#modal"><i
                                            class="fa fa-sign-in-alt"></i> Sign In Now</a></div>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
        <style>
            body {
                font-family: 'Poppins', sans-serif;
            }
        </style>
    </header>
    <!-- ***** Header Area End ***** -->

    <div id="modal" class="popupContainer" style="display:none;">
        <div class="popupHeader">
            <span class="header_title">Login</span>
            <span class="modal_close"><i class="fa fa-times"></i></span>
        </div>

        <section class="popupBody">
            <!-- Social Login -->
            <div class="social_login">
                <div class="">
                    <a href="#" class="social_box fb">
                        <span class="icon"><i class="fab fa-facebook"></i></span>
                        <span class="icon_title">Connect with Facebook</span>

                    </a>

                    <a href="#" class="social_box google">
                        <span class="icon"><i class="fab fa-google-plus"></i></span>
                        <span class="icon_title">Connect with Google</span>
                    </a>
                </div>

                <div class="centeredText">
                    <span>Or use your Email address</span>
                </div>

                <div class="action_btns">
                    <div class="one_half"><a href="<?php echo e(route('login')); ?>" id="" class="btn">Login</a></div>
                    <div class="one_half last"><a href="<?php echo e(route('registrasi')); ?>" id="" class="btn">Sign
                            up</a></div>
                </div>
            </div>

            <!-- Username & Password Login form -->
            <div class="user_login">
                <form>
                    <label>Email / Username</label>
                    <input type="text" />
                    <br />

                    <label>Password</label>
                    <input type="password" />
                    <br />

                    <div class="checkbox">
                        <input id="remember" type="checkbox" />
                        <label for="remember">Remember me on this computer</label>
                    </div>

                    <div class="action_btns">
                        <div class="one_half"><a href="#" class="btn back_btn"><i
                                    class="fa fa-angle-double-left"></i> Back</a></div>
                        <div class="one_half last"><a href="#" class="btn btn_red">Login</a></div>
                    </div>
                </form>

                <a href="#" class="forgot_password">Forgot password?</a>
            </div>

            <!-- Register Form -->
            <div class="user_register">
                <form>
                    <label>Full Name</label>
                    <input type="text" />
                    <br />

                    <label>Email Address</label>
                    <input type="email" />
                    <br />

                    <label>Password</label>
                    <input type="password" />
                    <br />

                    <div class="checkbox">
                        <input id="send_updates" type="checkbox" />
                        <label for="send_updates">Send me occasional email updates</label>
                    </div>

                    <div class="action_btns">
                        <div class="one_half"><a href="#" class="btn back_btn"><i
                                    class="fa fa-angle-double-left"></i> Back</a></div>
                        <div class="one_half last"><a href="#" class="btn btn_red">Register</a></div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="1s">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2>FORUM MAHASISWA BIDIKMISI</h2>
                                        <p>Teguhkan tekad, satukan langkah, bersama mencapai kesuksesan dan meraih
                                            prestasi yang gemilang</p>
                                    </div>
                                    <div class="col-lg-12">

                                        <?php if(Route::has('login')): ?>
                                            <div class="white-button first-button scroll-to-section">
                                                <?php if(auth()->guard()->check()): ?>
                                                    <a href="<?php echo e(url('/dashboard')); ?>" class="">
                                                        <i class="fas fa-home"></i>
                                                        Dashboard
                                                    </a>
                                                <?php else: ?>
                                                    <a href="<?php echo e(route('login')); ?>"
                                                        class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">
                                                        <i class="fas fa-door-open"></i> Login
                                                    </a>

                                                    <?php if(Route::has('register')): ?>
                                                        <div class="white-button scroll-to-section">
                                                            <a href="<?php echo e(route('registrasi')); ?>">
                                                                <i class="fas fa-door-open"></i>
                                                                Register
                                                            </a>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="<?php echo e(asset('mascot.png')); ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="services" class="services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                        <h4>FORUM MAHASISWA <em>BIDIKMISI </h4>
                        <img src="assets/images/heading-line-dec.png" alt="">
                        <p>Tempat terbaik untuk berbagi informasi, pengalaman, dan tips sukses dalam menjalani kehidupan
                            sebagai penerima KIP KULIAH. Temukan komunitas yang mendukung perjalanan akademik dan
                            pengembangan diri Anda di sini.

                            Jika Anda membutuhkan panduan atau informasi lebih lanjut tentang Bidikmisi, silakan <a
                                rel="nofollow" href="https://linktr.ee/Koorprodi_Formadiksi_Polindra"
                                target="_blank">hubungi kami</a>
                            . Bergabunglah dengan kami untuk memanfaatkan berbagai fitur yang membantu Anda mencapai
                            potensi maksimal!

                    </div>
                </div>
            </div>
        </div>

        <div class="container" id="artikel">
            <div class="row">
                <?php $__currentLoopData = $recommendedArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recommendedArticle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card shadow-sm border-0 rounded-lg overflow-hidden">
                            <!-- Article Image -->
                            <img src="<?php echo e(asset('storage/' . $recommendedArticle->picture_article)); ?>"
                                alt="<?php echo e($recommendedArticle->title); ?>" class="card-img-top"
                                style="object-fit: cover; height: 200px;">

                            <div class="card-body">
                                <!-- Article Title -->
                                <h5 class="card-title font-weight-bold text-truncate" style="max-width: 100%;">
                                    <?php echo e($recommendedArticle->title); ?></h5>

                                <!-- Article Content (limit to 100 characters) -->
                                <p class="card-text text-muted" style="min-height: 50px;">
                                    <?php echo Str::limit($recommendedArticle->content, 100); ?>

                                </p>

                                <!-- Read More Button -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="<?php echo e(route('article.show.detail', $recommendedArticle->id)); ?>"
                                        class="btn btn-sm btn-primary">Read More <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <div id="about" class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="section-heading">
                        <h4>About <em>FORMADIKSI</em> &amp; Who We Are</h4>
                        <img src="assets/images/heading-line-dec.png" alt="">
                        <p>Temukan inspirasi, dukungan, dan informasi seputar perjalanan akademik penerima KIP Kuliah di
                            sini!
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box-item">
                                <h4><a href="#">Diskusi Interaktif</a></h4>
                                <p>berdiskusi dengan kami seputar KIPK</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-item">
                                <h4><a href="#">Bimbingan Perkuliahan</a></h4>
                                <p>Berjalan bersama kami dalam perjalanan akademik</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-item">
                                <h4><a href="#">Tepat Bernaung</a></h4>
                                <p>Kami menaungi dan mendampingi kamu dalam perjalanan akademik</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-item">
                                <h4><a href="#">Event</a></h4>
                                <p>acara acara yang menarik dan berguna dalam akademik</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <p><b>"Teguhkan tekad, satukan langkah, bersama mencapai kesuksesan dan meraih prestasi yang
                                    gemilang"</b>
                                <br>
                                #Formadiksipolindra <br>
                                #MembidikPrestasi <br>
                                #MembangunNegeri
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-image">
                        <img src="assets/images/about-right-dec.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="rumahaspirasi" class="rumah-aspirasi section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="section-heading">
                        <h4>Rumah <em>Aspirasi</em></h4>
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php elseif(session('error')): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo e(session('error')); ?>

                            </div>
                        <?php endif; ?>
                        <p>
                            Punya pendapat atau saran tentang formadiksi? sampaikan saja lewat form dibawah ini!
                        </p>
                    </div>
                    <div>
                        <form method="POST" action="<?php echo e(route('rumahaspirasi.kirim')); ?>" class="w-full">
                            <?php echo csrf_field(); ?>
                            <div class="mb-2">
                                <p class="rumah-aspirasi-label">Nama</p>
                                <input type="text" name="nama" id="nama" placeholder="Nama kamu"
                                    class="form-control <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" maxlength="100"
                                    onkeyup="document.getElementById('charCount1').innerHTML = this.value.length + '/100'">
                                <div class="form-feedback-wrapper">
                                    <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <p class="p-coy"><span id="charCount1">0/100</span> karakter</p>
                                </div>
                            </div>

                            <div class="mb-2">
                                <p class="rumah-aspirasi-label">Aspirasi</p>
                                <textarea name="isi" id="isi" placeholder="Masukan aspirasi kamu" rows="4"
                                    class="form-control <?php $__errorArgs = ['isi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" maxlength="1000"
                                    onkeyup="document.getElementById('charCount2').innerHTML = this.value.length + '/1000'"></textarea>
                                <div class="form-feedback-wrapper">
                                    <?php $__errorArgs = ['isi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <p class="p-coy"><span id="charCount2">0/1000</span> karakter</p>
                                </div>
                            </div>

                            <div class="mb-4">
                                <button type="submit" class="rumah-aspirasi button"><i
                                        class="fa fa-paper-plane"></i>
                                    Kirim!
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    

    <footer id="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading">
                        
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h4>Contact Us</h4>
                        <p>loh bener, indramayu, jawa barat</p>
                        <p><a href="https://api.whatsapp.com/send?phone=6285956404789">6285956404789</a></p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h4>About Us</h4>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="https://www.instagram.com/formadiksi_polindra/">FORMADIKSI</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="https://linktr.ee/duwipangga">developer</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h4>Rumah aspirasi</h4>
                        <ul>
                            <li><a href="#">aspirasi bersama</a></li>

                        </ul>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h4>FORMADIKSI</h4>
                        <div class="logo">
                            <img src="<?php echo e(asset('formadiksi.png')); ?>" alt="">
                        </div>
                        <p>Tempat terbaik untuk berbagi informasi, pengalaman, dan tips sukses dalam menjalani kehidupan
                            sebagai penerima Bidikmisi. Temukan komunitas yang mendukung perjalanan akademik dan
                            pengembangan diri Anda di sini. <br>#Formadiksipolindrabr <br>
                            #MembidikPrestasi <br>
                            #MembangunNegeri</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="copyright-text">
                        <p>Copyright © 2024 FORMADIKSI POLINDRA. All Rights Reserved.
                            <br>Design: <a href="https://linktr.ee/duwipangga" target="_blank"
                                title="connect with me">KOORPRODI-Duwipangga</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/imagesloaded.js"></script>
    <script src="assets/js/popup.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>
<?php /**PATH D:\KULIAH\UKM\formadiksi\koorprodi-web\koorprodi\resources\views/index.blade.php ENDPATH**/ ?>