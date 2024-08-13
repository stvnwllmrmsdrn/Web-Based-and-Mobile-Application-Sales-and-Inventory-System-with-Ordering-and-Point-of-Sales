<?php require_once('headermain.php'); ?>


  


  <main>
    <article class="product">
      <section class="product__slider default-container" aria-label="Product preview">
        <button type="button" class="product__slider___btn-close-lightbox">
          <span class="sr-only">Close lightbox</span>
          <span class="icon icon-close" aria-hidden="true"></span>
        </button>  
        <div class="image-box" aria-label="Product preview" role="region">
          <button type="button" class="btn-previousImage">
            <span class="sr-only">Previous Image</span>
            <span class="icon icon-previous" aria-hidden="true"></span>
          </button>
          <button type="button" class="btn-nextImage">
            <span class="sr-only">Next Image</span>
            <i class="fa-solid fa-angle-right"></i> <span class="icon icon-next" aria-hidden="true"></span>
          </button>
          <img src="images/image-product-1.jpg" alt="Brown and white sneaker" class="image-box__src" data-product-id="item-cart-1" tabindex="0" aria-controls="lightbox" aria-expanded="false">
        </div>
        
        <ul class="product__thumbs default-container" aria-label="Product thumbnails">
          <li class="thumb-item">
            <button type="button" class="thumb-item__btn" aria-label="change to image 1">
              <img src="images/image-product-1-thumbnail.jpg" alt="" data-thumb-index="0" role="presentation">
            </button>
          </li>
          <li class="thumb-item">
            <button type="button" class="thumb-item__btn" aria-label="change to image 2">
              <img src="images/image-product-2-thumbnail.jpg" alt="" data-thumb-index="1" role="presentation">
            </button>
          </li>
        
         
        </ul>
      </section>
      <div class="breadcrumb mb_30">
                    <ul>
                        <li><a href="<?php echo BASE_URL; ?>">Home</a></li>
                        <li>></li>
                        <li><a href="<?php echo BASE_URL.'product-category.php?id='.$tcat_id.'&type=top-category' ?>"><?php echo $tcat_name; ?></a></li>
                        <li>></li>
                        <li><a href="<?php echo BASE_URL.'product-category.php?id='.$mcat_id.'&type=mid-category' ?>"><?php echo $mcat_name; ?></a></li>
                        <li>></li>
                        <li><a href="<?php echo BASE_URL.'product-category.php?id='.$ecat_id.'&type=end-category' ?>"><?php echo $ecat_name; ?></a></li>
                        <li>></li>
                        <li><?php echo $p_name; ?></li>
                    </ul>
                </div>
      <section class="product__content default-container" aria-label="Product content">
        <header>
          <h2 class="company-name" tabindex="0">Sneaker Company</h2>
          <p class="product__name" tabindex="0">Autumn Limited Edition Sneakers</p>
          <h3 class="product__title" tabindex="0">Fall Limited Edition Sneakers</h3>
        </header>
        <p class="product__description" tabindex="0">
          These low-profile sneakers are your perfect casual wear companion. Featuring a 
          durable rubber outer sole, they’ll withstand everything the weather can offer.
        </p>
        <div class="product__price">
          <div class="discount-price">
            <p class="discount-price__value" tabindex="0">
              &dollar;125.00
              <span class="sr-only">dollars</span>
            </p>
            <p class="discount-price__discount" tabindex="0">50%</p>
          </div>
          <div class="full-price">
            <p tabindex="0">
              &dollar;250.00
              <span class="sr-only">dollars</span>
            </p>
          </div>
        </div>
        
        <form action="#" class="cart-form">
          <div class="cart-form__input-container" aria-label="Define the product quantity">
            <button type="button" class="btn-changeValue minus-item">
              <span class="sr-only">Minus one item</span>
              -
            </button>
            <label for="product__quantity" class="sr-only">Set the quantity manually</label>
            <input type="number" min="0" value="0" id="product__quantity">
            <button type="button" class="btn-changeValue plus-item" >
              +
            </button>
          </div>
          <button type="button" class="cart-form__add-btn">
            Add to cart
          </button>
        </form>
      </section>
    </article>
  </main>
  
  <div class="lightbox" id="lightbox" role="dialog"></div>
</body>

<?php require_once('footermain.php'); ?>