<?php 

include("header.php");
include("conn.php");
$select_query = "SELECT * FROM products ORDER BY created_at";
$result = mysqli_query($conn, $select_query);

?>


<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          All Products
        </h2>
      </div>
      <div class="row">
        <?php
          while($data = mysqli_fetch_assoc($result)) {
            $formatedDate = date_format(date_create($data['created_at']),"Y / m / d");
            echo "
              <div class='col-sm-6 col-md-4 col-lg-3'>
                <div class='box'>
                  <a href='shop-item.php?id=$data[id]'>
                    <div class='img-box'>
                      <img src='public/uploads/$data[image]'>
                    </div>
                    <div class='detail-box'>
                      <h6>
                        $data[name]
                      </h6>
                      <h6>
                        Price
                        <span>
                          Rs. $data[price]
                        </span>
                      </h6>
                    </div>
                    <div class='new px-4' style='width:auto; border-radius: 999px; font-size: .9rem;'>
                      <span>
                        $formatedDate
                      </span>
                    </div>
                  </a>
                </div>
              </div>
            ";
          }
        
        ?>
      </div>
    </div>
  </section>

<?php include("footer.php") ?>