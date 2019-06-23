<?php
    require 'functions.php';
    $submit_error="";
    $submit_verify=isset($_POST['submit_verify'])?$_POST['submit_verify']:'';
    if($submit_verify==1){
        $company_id=1;
        $organisation_name = mysqli_real_escape_string($db_con, $_POST['organisation_name']);
        $established_in = mysqli_real_escape_string($db_con, $_POST['established_in']);
        $organisation_type = mysqli_real_escape_string($db_con, $_POST['organisation_type']);
        $field_work = mysqli_real_escape_string($db_con, $_POST['field_work']);
        $employees = mysqli_real_escape_string($db_con, $_POST['employees']);
        $about = mysqli_real_escape_string($db_con, $_POST['about']);
        $country_code = mysqli_real_escape_string($db_con, $_POST['country_code']);
        $phone_number = mysqli_real_escape_string($db_con, $_POST['phone_number']);
        $address_line1 = mysqli_real_escape_string($db_con, $_POST['address_line1']);
        $address_line2 = mysqli_real_escape_string($db_con, $_POST['address_line2']);
        $city = mysqli_real_escape_string($db_con, $_POST['city']);
        $post_code = mysqli_real_escape_string($db_con, $_POST['post_code']);
        $video = mysqli_real_escape_string($db_con, $_POST['video']);
        $fb_url = mysqli_real_escape_string($db_con, $_POST['fb_url']);        
        $linkedin_url = mysqli_real_escape_string($db_con, $_POST['linkedin_url']);
        $insta_url = mysqli_real_escape_string($db_con, $_POST['insta_url']);
        $twitter_url = mysqli_real_escape_string($db_con, $_POST['twitter_url']);
        if(empty($post_code)){
            $post_code=0;
        }
        if(empty($video)){
            $video=0;
        }
        if(empty($fb_url)){
            $fb_url=0;
        }
        if(empty($linkedin_url)){
            $linkedin_url=0;
        }
        if(empty($insta_url)){
            $insta_url=0;
        }
        if(empty($twitter_url)){
            $twitter_url=0;
        }
        $db_con->query("insert into company_profile(company_id,organisation_name,established_in,organisation_type,field_work,employees,about,phone_number,address_line1,address_line2,city,post_code,video,fb_url,linkedin_url,insta_url,twitter_url) values($company_id,'$organisation_name',$established_in,'$organisation_type','$field_work','$employees','$about','$country_code'+'$phone_number','$address_line1','$address_line2','$city',$post_code,'$video','$fb_url','$linkedin_url','$insta_url','$twitter_url')");
        $submit_error="Profile Updated Successfully";
        echo $db_con->error;
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Organisation Profile-Digihire</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">

    <!-- Custom style by developer-->
    <link rel="stylesheet" href="assets/custom_css/organisation_main.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- Select2 -->
    <link rel="stylesheet" href="assets/bower_components/select2/dist/css/select2.min.css">
</head>

<body>
    <section class="content">
        <div class="row" id="form-content">
            <!-- left column -->
            <div class="col-md-6 col-md-offset-3">

                <p style="color:green;text-align:center;font-weight:bold;"><?php echo $submit_error; ?></p>
                <div class="container">
                    <div class="stepwizard">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step">
                                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                <p class="hidden-xs">Company Profile</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-2" type="button" class="btn btn-default btn-circle"
                                    disabled="disabled">2</a>
                                <p class="hidden-xs">Communication</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-3" type="button" class="btn btn-default btn-circle"
                                    disabled="disabled">3</a>
                                <p class="hidden-xs">Social Media</p>
                            </div>
                        </div>
                    </div>
                    <form role="form" method="post">
                    <input type="hidden" name="company_id" value="<?php echo 1;?>"/>
                    <input type="hidden" name="submit_verify" value="1"/>
                        <div class="row setup-content" id="step-1">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="organisation" class="control-label">ORGANISATION
                                            NAME<sup>*</sup></label>
                                        <input type="text" class="form-control" id="organisation_name"
                                            name="organisation_name" placeholder="Please provide name of organisation">
                                    </div>
                                    <div class="form-group">
                                        <label for="established" class="control-label">ESTABLISHED
                                            IN<sup>*</sup></label>
                                        <select name="established_in" id="established_in" class="form-control">
                                            <option value="">Select Year</option>
                                            <?PHP
                                            $year=1947;
                                            for($i=$year;$i<=date('Y');$i++){
                                                echo "<option value='".$i."'>".$i."</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="organisation" class="control-label">YOUR ORGANISATION
                                            IS<sup>*</sup></label>
                                        <select class="form-control" style="width: 100%;" name="organisation_type"
                                            id="organisation_type">
                                            <option value="" selected="selected:true">Select Organisation type</option>
                                            <option value="MNC">MNC</option>
                                            <option value="NGO">NGO</option>
                                            <option value="Small Business">Small Business</option>
                                            <option value="Startup">Startup</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="field_work" class="control-label">FIELD OF WORK<sup>*</sup></label>

                                        <select class="form-control" style="width: 100%;" name="field_work"
                                            id="field_work">
                                            <option value="" selected="selected:true">Select Field</option>
                                            <option value="Option 1">Option 1</option>
                                            <option value="Option 2">Option 2</option>
                                            <option value="Option 3">Option 3</option>
                                            <option value="Option 4">Option 4</option>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="employees" class="control-label">NUMBER OF
                                            EMPLOYEES<sup>*</sup></label>

                                        <select name="employees" id="employees" class="form-control">
                                            <option value="">Select no. of Employees</option>
                                            <option value="0-10">0-10</option>
                                            <option value="11-20">11-20</option>
                                            <option value="21-50">21-50</option>
                                            <option value="50-100">50-100</option>
                                            <option value="More than 100">More than 100</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="about" class="control-label">ABOUT<sup>*</sup></label>
                                        <textarea class="form-control" id="about" name="about" row="5" column="5"
                                            placeholder="Describe about your organisation in about 200 Words."></textarea>
                                    </div>
                                    <button class="btn btn-primary nextBtn pull-right" type="button"
                                        id="s1">Next</button>
                                </div>
                            </div>
                        </div>
                        <div class="row setup-content" id="step-2">

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="contact" class="control-label">CONTACT NUMBER<sup>*</sup></label>
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <select class="form-control" id="country_code" name="country_code">
                                                    <option value="">Country Code</option>
                                                    <?php 
                                            $country_data=$db_con->query("select distinct phonecode from country order by phonecode asc");
                                            while($assoc_country=$country_data->fetch_assoc()){
                                                echo "<option value='".$assoc_country['phonecode']."'>"."+".$assoc_country['phonecode']."</option>";
                                            }
                                            ?>
                                                </select>
                                            </div>
                                            <div class="col-xs-8">
                                                <input type="number" class="form-control" id="phone_number"
                                                    name="phone_number" placeholder="1234567890">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address1" class="control-label">ADDRESS LINE 1<sup>*</sup></label>
                                        <input type="text" class="form-control" id="address_line1" name="address_line1">
                                    </div>
                                    <div class="form-group">
                                        <label for="address2" class="control-label">ADDRESS LINE 2<sup>*</sup></label>
                                        <input type="text" class="form-control" id="address_line2" name="address_line2">
                                    </div>
                                    <div class="form-group">
                                        <label for="city" class="control-label">CITY<sup>*</sup></label>
                                        <select class="form-control select2" style="width: 100%;" name="city" id="city">
                                            <option value="">Select City</option>
                                            <?php 
                                            $city_data=$db_con->query("select city_name from cities");
                                            while($assoc_city=$city_data->fetch_assoc()){
                                                echo "<option value='".$assoc_city['city_name']."'>".$assoc_city['city_name']."</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="postcode" class="control-label">POST
                                            CODE</label>
                                        <input type="number" class="form-control" id="post_code" name="post_code">
                                    </div>
                                    <button class="btn btn-primary nextBtn pull-right" type="button"
                                        id="s2">Next</button>
                                </div>
                            </div>
                        </div>
                        <div class="row setup-content" id="step-3">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="video" class="control-label">VIDEO(Link)</label>
                                        <input type="text" class="form-control" id="video" name="video"
                                            placeholder="Video describing your organisation">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="fblink" name="fb_url"
                                            placeholder="Facebook URL">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="lnklink" name="linkedin_url"
                                            placeholder="Linkedin URL">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="instalink" name="insta_url"
                                            placeholder="Instagram URL">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="twtlink" name="twitter_url"
                                            placeholder="Twitter URL">
                                    </div>
                                </div>
                                <button class="btn btn-success pull-right" type="submit" id="s3">Submit</button>
                            </div>
                        </div>
                </div>
                </form>

            </div>
        </div>
        </div>
        </div>
    </section>
    <!-- Jquery 3.3.7 -->
    <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 1.11.1 
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
    <!-- Bootstrap 3.3.7 -->
    <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <!-- Select2 -->
    <script src="assets/bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/dist/js/demo.js"></script>
    <script src="assets/custom_js/jquery.validate.min.js"></script>
    <script src="assets/custom_js/additional-methods.min.js"></script>
    <script src="assets/custom_js/organisation_main.js"></script>
</body>

</html>