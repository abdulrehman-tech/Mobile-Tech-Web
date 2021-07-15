<?php require('top.php')?>
<div class="body__overlay"></div>
                            
                            
                            <!-- Header section -->

        <section style="background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);">
        <div class="container" style="margin-top:10px; height:540px;">
        <div class="row">
          <div class="col-sm-12 col-lg-6">
            <h1 style="margin-top:150px;">
              Mobile-Tech <br />
              Where Choice Matters!
            </h1>
            <br>
            <h4>
              Welcome to Mobile-Tech, your number one source for all things
              Smart phones, Tablets,Laptops and other smart Accessories.
            </h4>
            <br>
            <div class="contact-btn">
            <button class="fv-btn">
            <a href="#about" class="">Explore More <i class="fa fa-arrow-right"></i
              ></a>
            </button>
            </div>
            
          </div>
          <div class="col-sm-12 col-lg-6">
            <img
              src="./images/content.svg"
              style="overflow: hidden; width: 500px; margin-bottom: 5px; margin-top:70px"
              alt=""
            />
          </div>
        </div>
      </div>
    </div>
</section>
    <!-- End of Header Section -->
    <!-- About Us Section -->
    <!-- ============================about Section==================== -->
    <div class="container">
    <section id="about" style="margin-top:150px; width:500px;">
      <div class="container">
      <div class="section__title--2 text-center">
        <h2 class="title__line">About Us</h2>
        </div>
        <br><br>
        <div class="row">
          <div class="col-lg-6">
            <img
              src="./images/about.svg"
              alt=""
              style="width: 500px; margin-bottom: 5px"
            />
          </div>
          <div class="col-lg-6">
            <p>
              Welcome to Mobile-Tech, your number one source for all things
              Smart phones, Tablets,Laptops and other smart Accessories. We're
              dedicated to giving you the very best of Smart phone, with a focus
              on three characteristics, ie: dependability, customer service and
              uniqueness.Founded in 2020 by Abdul Rehman, Mobile-Tech has come a
              long way from its beginnings in a Comsats University. When abdul
              Rehman first started out, his/her passion for Web development, ie:
              helping other parents be more eco-friendly, providing the best
              equipment for his fellow musicians drove him to action, ie: do
              intense research, quit her day job, and gave him the impetus to
              turn hard work and inspiration into to a booming online store. We
              now serve customers all over place, ie: the US, the world, the
              Austin area], and are thrilled to be a part of the [adjective, ie:
              quirky, eco-friendly, fair trade wing of the industry type, ie:
              fashion, baked goods, watches industry. We hope you enjoy our
              products as much as we enjoy offering them to you. If you have any
              questions or comments, please don't hesitate to contact us.
              Sincerely, Abdul Rehman, Web developer.
            </p>
          </div>
        </div>
      </div>
    </section>
    </div>
    
        <!-- Start Slider Area -->
        <!-- Start Category Area -->
        
        <section class="htc__category__area ptb--100" id="new_arrival">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Lattest Products</h2>
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">
                          <?php
                          $get_product=get_product($con,4);
                          foreach($get_product as $list){
                          ?>
                            <!-- Start Single Category -->
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product.php?id=<?php echo $list['id']?>">
                                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images">
                                        </a>
                                    </div>
                                    <div class="fr__hover__info">
                                    <ul class="product__action">
                                      <li><a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')"><i class="icon-heart icons"></i></a></li>
                                      <li><a href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')"><i class="icon-handbag icons"></i></a></li>
                                    </ul>
                                  </div>
                                    <div class="fr__product__inner">
                                        <h4><a href="product.php?id=<?php echo $list['id']?>"><?php echo $list['name']?></a></h4>
                                        <ul class="fr__pro__prize">
                                            <li class="old__prize"><?php echo $list['mrp']?></li>
                                            <li><?php echo $list['price']?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Category -->
                <?php } ?>
                          </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Category Area -->
        <!-- Start Product Area -->
        <section class="ftr__product__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Best Seller</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product__list clearfix mt--30">
							<?php
							$get_product=get_product($con,4,'','','','','yes');
							foreach($get_product as $list){
							?>
                            <!-- Start Single Category -->
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product.php?id=<?php echo $list['id']?>">
                                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images">
                                        </a>
                                    </div>
                                    <div class="fr__hover__info">
                                        <ul class="product__action">
                                          <li><a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')"><i class="icon-heart icons"></i></a></li>
                                          <li><a href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')"><i class="icon-handbag icons"></i></a></li>
                                        </ul>
                                      </div>
                                    <div class="fr__product__inner">
                                        <h4><a href="product.php?id=<?php echo $list['id']?>"><?php echo $list['name']?></a></h4>
                                        <ul class="fr__pro__prize">
                                            <li class="old__prize"><?php echo $list['mrp']?></li>
                                            <li><?php echo $list['price']?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                                  <!-- End Single Category -->
                            <?php } ?>
                              </div>
                </div>
            </div>
        </section>
        <!-- End Product Area -->
		<input type="hidden" id="qty" value="1"/>
<?php require('footer.php')?>        