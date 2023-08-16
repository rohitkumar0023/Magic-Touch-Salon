<section class="footer">
    <div class="footer-29 py-5">
      <div class="container py-lg-4">
        <div class="row footer-top-29">
          <div class="col-lg-4 col-md-6 col-sm-8 footer-list-29 footer-1">
            <h6 class="footer-title">Contact Us</h6>
            <ul>
              <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
while ($row=mysqli_fetch_array($ret)) {

?>
              <li>
                <span class="fa fa-map-marker"></span> <p ><?php  echo $row['PageDescription'];?>.</p>
              </li>
              <li><span class="fa fa-phone"></span><p><?php  echo $row['MobileNumber'];?></p></li>
              <li><span class="fa fa-envelope-open-o"></span><p><?php  echo $row['Email'];?></p></li><?php } ?>
            </ul>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-4 footer-list-29 footer-2 ">

            <ul>
              <h6 class="footer-title">Useful Links</h6>
              <li><a href="index.php">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="services.php"> Services</a></li>
              <li><a href="contact.php">Contact us</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 col-sm-7 footer-list-29 footer-4">
            <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='aboutus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
            <h6 class="footer-title"><?php  echo $row['PageTitle'];?> </h6>
            <p style="text-align:justify;"><?php  echo $row['PageDescription'];?></p><?php } ?>

          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="footer">
    <div class="container">
      <div class="row bottom-copies">
        <p class="col-lg-8 copy-footer-29">© Beauty Parlour By Poojal </p>

        <div class="col-lg-4 main-social-footer-29">
          <a href="#facebook" class="facebook"><span class="fa fa-facebook"></span></a>
          <a href="#twitter" class="twitter"><span class="fa fa-twitter"></span></a>
          <a href="#instagram" class="instagram"><span class="fa fa-instagram"></span></a>
          <a href="#linkedin" class="linkedin"><span class="fa fa-linkedin"></span></a>
        </div>

      </div>
    </div>
  </section>