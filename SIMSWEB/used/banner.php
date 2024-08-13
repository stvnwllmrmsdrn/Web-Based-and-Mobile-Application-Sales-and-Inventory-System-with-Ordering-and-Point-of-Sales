<div class="banner">

      <div class="container">

        <div class="slider-container has-scrollbar">

        <?php
        $i=0;
        $statement = $pdo->prepare("SELECT * FROM tbl_slider");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {            
            ?>

          <div class="slider-item <?php if($i==0) {echo 'active';} ?>" >

            <img style="background-image:url(assets/uploads/<?php echo $row['photo']; ?>);" class="banner-img">

            <div class="banner-content">

              <p class="banner-subtitle" ><?php echo $row['heading']; ?></p>

              <h2 class="banner-title"><?php echo $row['heading']; ?></h2>

              <p class="banner-text">
              <?php echo nl2br($row['content']); ?>
              </p>

              <a href="<?php echo $row['button_url']; ?>" class="banner-btn">Shop now</a>

            </div>

            

          </div>
          <?php
            $i++;
        }
        ?>

        </div>

      </div>

    </div>