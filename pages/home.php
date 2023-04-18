<section class="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="wrapper">
                    <img class="gallerybanner" src="images/gallery_banner/gc1.jpg" alt="" />
                    <img class="gallerybanner" src="images/gallery_banner/gc2.jpg" alt="" />
                    <img class="gallerybanner" src="images/gallery_banner/gc3.jpg" alt="" />
                    <img class="gallerybanner" src="images/gallery_banner/gc4.jpg" alt="" />
                    <img class="gallerybanner" src="images/gallery_banner/gc5.jpg" alt="" />
                    <img class="gallerybanner" src="images/gallery_banner/gc6.jpg" alt="" />
                    <img class="gallerybanner" src="images/gallery_banner/gc7.jpg" alt="" />
                    <img class="gallerybanner" src="images/gallery_banner/gc8.jpg" alt="" />
                    <img class="gallerybanner" src="images/gallery_banner/gc9.jpg" alt="" />
                    <img class="gallerybanner" src="images/gallery_banner/gc10.jpg" alt="" />
                    <div class="col-md-12" style="position: absolute;z-index:1;height: 100%;">
                        <div class="text-bg">
                                <h1 class="shadow-text"> <span class="blodark"> Viaja con tu familia </span> <br><span class="text-white" >Semana Santa 2023</span></h1>
                                <p class="shadow-text text-white">Margarita tu destino ideal </p>
                                <a class="read_more" href="#">Comprar Ahora</a>
                            </div>
                        </div>
            </div>
                </div>
            </div>
            
        </div>
        <div class="news">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Ultimas Noticias</h2>
                </div>
            </div>
        </div>
        <div class="row">  
        <?php 
        include_once '../vendor/autoload.php';

        $client = new \czPechy\instagramProfileCrawler\Client('grancaciqueexpress');

        /** @var \czPechy\instagramProfileCrawler\Profile $profile */
        $profile = $client->getProfile();

        foreach($profile->getMedia() as $media) {
            $mediaData = $media->toArray();
            $link = $mediaData['link'];
            $textarray = explode(chr(0x0a),$mediaData['text']);
            $title = $textarray[0];
            $text = '';
            for($i = 1;$i < count($textarray);$i++){
                $text .= $textarray[$i];
            }
            $photo = 'data:image/jpg;base64,'.base64_encode(file_get_contents($mediaData['photo']));
        ?>
        <div class="col-md-12 margin_top40">
                        <div class="row d_flex">
                        <div class="col-md-5">
                                <div class="news_img text-center">
                                    <figure><img style="width:400px;height:400px;object-fit: cover;" src="<?php echo $photo; ?>" /></figure>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="news_text">
                                    <h3><?php echo $title; ?></h3>
                                        <span><a target="_blank" href="<?php echo $link; ?>">Ver mas</a></span>
                                    <p><?php echo $text; ?></p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
        <?php
        }
        ?>
        </div>
    </div>
</div>


        <div class="newslatter">
            <div class="container">
                <div class="row d_flex">
                    <!-- <div class="col-md-5">
                  <h3 class="neslatter">Subscribe To The Newsletter</h3>
               </div>
               <div class="col-md-7">
                  <form class="news_form">
                     <input class="letter_form" placeholder=" Enter your email" type="text" name="Enter your email">
                     <button class="sumbit">Subscribe</button>
                  </form>
               </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
