<!DOCTYPE html>
<html lang="en">
<html>

<head>

</head>

<body>
    <?php
    // file path ที่จะเชื่อมกับ index
    //ส่วนบน search faq help support and social media
    //../เพื่อให้หาroot path เอง
    //Banner category menu
    // head

    // head


    ?>
    <!-- Header-->

    <!-- Form สำหรับ สมัครสมาชิก -->
    <div class="container-fluid pt-5 ">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Edit Address from User</span></h2>
        </div>
        <div class="row px-xl-5 justify-content-center">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form name="addMember" id="addMember" action="member.php" method='POST'>
                        <div class="control-group">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Your address" required="required" data-validation-required-message="Please enter your address" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer-->
    <?php
    ?>
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
</body>

</html>