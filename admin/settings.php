<?php require_once('header.php'); ?>

<?php

if (isset($_POST['form3'])) {


    $statement = $pdo->prepare("UPDATE tbl_settings SET newsletter_on_off=?, footer_copyright=?, contact_address=?, contact_email=?, contact_phone=?, contact_map_iframe=? WHERE id=1");
    $statement->execute(array($_POST['newsletter_on_off'], $_POST['footer_copyright'], $_POST['contact_address'], $_POST['contact_email'], $_POST['contact_phone'], $_POST['contact_map_iframe']));

    $success_message = 'General content settings is updated successfully.';
}

if (isset($_POST['form4'])) {

    $statement = $pdo->prepare("UPDATE tbl_settings SET receive_email=?, receive_email_subject=?,receive_email_thank_you_message=?, forget_password_message=? WHERE id=1");
    $statement->execute(array($_POST['receive_email'], $_POST['receive_email_subject'], $_POST['receive_email_thank_you_message'], $_POST['forget_password_message']));

    $success_message = 'Contact form settings information is updated successfully.';
}

if (isset($_POST['form5'])) {

    $statement = $pdo->prepare("UPDATE tbl_settings SET total_featured_product_home=?, total_latest_product_home=?, total_popular_product_home=? WHERE id=1");
    $statement->execute(array($_POST['total_featured_product_home'], $_POST['total_latest_product_home'], $_POST['total_popular_product_home']));

    $success_message = 'Sidebar settings is updated successfully.';
}


if (isset($_POST['form6_0'])) {

    $statement = $pdo->prepare("UPDATE tbl_settings SET home_service_on_off=?, home_welcome_on_off=?, home_featured_product_on_off=?, home_latest_product_on_off=?, home_popular_product_on_off=? WHERE id=1");
    $statement->execute(array($_POST['home_service_on_off'], $_POST['home_welcome_on_off'], $_POST['home_featured_product_on_off'], $_POST['home_latest_product_on_off'], $_POST['home_popular_product_on_off']));

    $success_message = 'Section On-Off Settings is updated successfully.';
}


if (isset($_POST['form6'])) {

    $statement = $pdo->prepare("UPDATE tbl_settings SET meta_title_home=?, meta_keyword_home=?, meta_description_home=? WHERE id=1");
    $statement->execute(array($_POST['meta_title_home'], $_POST['meta_keyword_home'], $_POST['meta_description_home']));

    $success_message = 'Home Meta settings is updated successfully.';
}

if (isset($_POST['form6_7'])) {

    $valid = 1;

    if (empty($_POST['cta_title'])) {
        $valid = 0;
        $error_message .= 'Call to Action Title can not be empty<br>';
    }

    if (empty($_POST['cta_content'])) {
        $valid = 0;
        $error_message .= 'Call to Action Content can not be empty<br>';
    }

    if (empty($_POST['cta_read_more_text'])) {
        $valid = 0;
        $error_message .= 'Call to Action Read More Text can not be empty<br>';
    }

    if (empty($_POST['cta_read_more_url'])) {
        $valid = 0;
        $error_message .= 'Call to Action Read More URL can not be empty<br>';
    }

    $path = $_FILES['cta_photo']['name'];
    $path_tmp = $_FILES['cta_photo']['tmp_name'];

    if ($path != '') {
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $file_name = basename($path, '.' . $ext);
        if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'gif') {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

    if ($valid == 1) {

        if ($path != '') {
            $statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $cta_photo = $row['cta_photo'];
                unlink('../assets/uploads/' . $cta_photo);
            }


            $final_name = 'cta' . '.' . $ext;
            move_uploaded_file($path_tmp, '../assets/uploads/' . $final_name);


            $statement = $pdo->prepare("UPDATE tbl_settings SET cta_title=?,cta_content=?,cta_read_more_text=?,cta_read_more_url=?,cta_photo=? WHERE id=1");
            $statement->execute(array($_POST['cta_title'], $_POST['cta_content'], $_POST['cta_read_more_text'], $_POST['cta_read_more_url'], $final_name));
        } else {

            $statement = $pdo->prepare("UPDATE tbl_settings SET cta_title=?,cta_content=?,cta_read_more_text=?,cta_read_more_url=? WHERE id=1");
            $statement->execute(array($_POST['cta_title'], $_POST['cta_content'], $_POST['cta_read_more_text'], $_POST['cta_read_more_url']));
        }

        $success_message = 'Call to Action Data is updated successfully.';
    }
}

if (isset($_POST['form6_4'])) {

    $valid = 1;

    if (empty($_POST['featured_product_title'])) {
        $valid = 0;
        $error_message .= 'Featured Product Title can not be empty<br>';
    }

    if (empty($_POST['featured_product_subtitle'])) {
        $valid = 0;
        $error_message .= 'Featured Product SubTitle can not be empty<br>';
    }

    if ($valid == 1) {


        $statement = $pdo->prepare("UPDATE tbl_settings SET featured_product_title=?,featured_product_subtitle=? WHERE id=1");
        $statement->execute(array($_POST['featured_product_title'], $_POST['featured_product_subtitle']));

        $success_message = 'Featured Product Data is updated successfully.';
    }
}

if (isset($_POST['form6_5'])) {

    $valid = 1;

    if (empty($_POST['latest_product_title'])) {
        $valid = 0;
        $error_message .= 'Latest Product Title can not be empty<br>';
    }

    if (empty($_POST['latest_product_subtitle'])) {
        $valid = 0;
        $error_message .= 'Latest Product SubTitle can not be empty<br>';
    }

    if ($valid == 1) {


        $statement = $pdo->prepare("UPDATE tbl_settings SET latest_product_title=?,latest_product_subtitle=? WHERE id=1");
        $statement->execute(array($_POST['latest_product_title'], $_POST['latest_product_subtitle']));

        $success_message = 'Latest Product Data is updated successfully.';
    }
}

if (isset($_POST['form6_6'])) {

    $valid = 1;

    if (empty($_POST['popular_product_title'])) {
        $valid = 0;
        $error_message .= 'Popular Product Title can not be empty<br>';
    }

    if (empty($_POST['popular_product_subtitle'])) {
        $valid = 0;
        $error_message .= 'Popular Product SubTitle can not be empty<br>';
    }

    if ($valid == 1) {


        $statement = $pdo->prepare("UPDATE tbl_settings SET popular_product_title=?,popular_product_subtitle=? WHERE id=1");
        $statement->execute(array($_POST['popular_product_title'], $_POST['popular_product_subtitle']));

        $success_message = 'Popular Product Data is updated successfully.';
    }
}

if (isset($_POST['form6_3'])) {


    $statement = $pdo->prepare("UPDATE tbl_settings SET newsletter_text=? WHERE id=1");
    $statement->execute(array($_POST['newsletter_text']));

    $success_message = 'Newsletter Text is updated successfully.';
}

if (isset($_POST['form7_1'])) {
    $valid = 1;

    $path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];

    if ($path == '') {
        $valid = 0;
        $error_message .= 'You must have to select a photo<br>';
    } else {
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $file_name = basename($path, '.' . $ext);
        if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'gif') {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

    if ($valid == 1) {
        $statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $banner_login = $row['banner_login'];
            unlink('../assets/uploads/' . $banner_login);
        }


        $final_name = 'banner_login' . '.' . $ext;
        move_uploaded_file($path_tmp, '../assets/uploads/' . $final_name);


        $statement = $pdo->prepare("UPDATE tbl_settings SET banner_login=? WHERE id=1");
        $statement->execute(array($final_name));

        $success_message = 'Login Page Banner is updated successfully.';
    }
}

if (isset($_POST['form7_2'])) {
    $valid = 1;

    $path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];

    if ($path == '') {
        $valid = 0;
        $error_message .= 'You must have to select a photo<br>';
    } else {
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $file_name = basename($path, '.' . $ext);
        if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'gif') {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

    if ($valid == 1) {

        $statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $banner_registration = $row['banner_registration'];
            unlink('../assets/uploads/' . $banner_registration);
        }


        $final_name = 'banner_registration' . '.' . $ext;
        move_uploaded_file($path_tmp, '../assets/uploads/' . $final_name);


        $statement = $pdo->prepare("UPDATE tbl_settings SET banner_registration=? WHERE id=1");
        $statement->execute(array($final_name));

        $success_message = 'Registration Page Banner is updated successfully.';
    }
}

if (isset($_POST['form7_3'])) {
    $valid = 1;

    $path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];

    if ($path == '') {
        $valid = 0;
        $error_message .= 'You must have to select a photo<br>';
    } else {
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $file_name = basename($path, '.' . $ext);
        if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'gif') {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

    if ($valid == 1) {

        $statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $banner_forget_password = $row['banner_forget_password'];
            unlink('../assets/uploads/' . $banner_forget_password);
        }


        $final_name = 'banner_forget_password' . '.' . $ext;
        move_uploaded_file($path_tmp, '../assets/uploads/' . $final_name);


        $statement = $pdo->prepare("UPDATE tbl_settings SET banner_forget_password=? WHERE id=1");
        $statement->execute(array($final_name));

        $success_message = 'Forget Password Page Banner is updated successfully.';
    }
}

if (isset($_POST['form7_4'])) {
    $valid = 1;

    $path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];

    if ($path == '') {
        $valid = 0;
        $error_message .= 'You must have to select a photo<br>';
    } else {
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $file_name = basename($path, '.' . $ext);
        if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'gif') {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

    if ($valid == 1) {

        $statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $banner_reset_password = $row['banner_reset_password'];
            unlink('../assets/uploads/' . $banner_reset_password);
        }


        $final_name = 'banner_reset_password' . '.' . $ext;
        move_uploaded_file($path_tmp, '../assets/uploads/' . $final_name);


        $statement = $pdo->prepare("UPDATE tbl_settings SET banner_reset_password=? WHERE id=1");
        $statement->execute(array($final_name));

        $success_message = 'Reset Password Page Banner is updated successfully.';
    }
}


if (isset($_POST['form7_6'])) {
    $valid = 1;

    $path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];

    if ($path == '') {
        $valid = 0;
        $error_message .= 'You must have to select a photo<br>';
    } else {
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $file_name = basename($path, '.' . $ext);
        if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'gif') {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

    if ($valid == 1) {

        $statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $banner_search = $row['banner_search'];
            unlink('../assets/uploads/' . $banner_search);
        }


        $final_name = 'banner_search' . '.' . $ext;
        move_uploaded_file($path_tmp, '../assets/uploads/' . $final_name);


        $statement = $pdo->prepare("UPDATE tbl_settings SET banner_search=? WHERE id=1");
        $statement->execute(array($final_name));

        $success_message = 'Search Page Banner is updated successfully.';
    }
}

if (isset($_POST['form7_7'])) {
    $valid = 1;

    $path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];

    if ($path == '') {
        $valid = 0;
        $error_message .= 'You must have to select a photo<br>';
    } else {
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $file_name = basename($path, '.' . $ext);
        if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'gif') {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

    if ($valid == 1) {

        $statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $banner_cart = $row['banner_cart'];
            unlink('../assets/uploads/' . $banner_cart);
        }


        $final_name = 'banner_cart' . '.' . $ext;
        move_uploaded_file($path_tmp, '../assets/uploads/' . $final_name);


        $statement = $pdo->prepare("UPDATE tbl_settings SET banner_cart=? WHERE id=1");
        $statement->execute(array($final_name));

        $success_message = 'Cart Page Banner is updated successfully.';
    }
}

if (isset($_POST['form7_8'])) {
    $valid = 1;

    $path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];

    if ($path == '') {
        $valid = 0;
        $error_message .= 'You must have to select a photo<br>';
    } else {
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $file_name = basename($path, '.' . $ext);
        if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'gif') {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

    if ($valid == 1) {

        $statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $banner_checkout = $row['banner_checkout'];
            unlink('../assets/uploads/' . $banner_checkout);
        }


        $final_name = 'banner_checkout' . '.' . $ext;
        move_uploaded_file($path_tmp, '../assets/uploads/' . $final_name);


        $statement = $pdo->prepare("UPDATE tbl_settings SET banner_checkout=? WHERE id=1");
        $statement->execute(array($final_name));

        $success_message = 'Checkout Page Banner is updated successfully.';
    }
}

if (isset($_POST['form7_9'])) {
    $valid = 1;

    $path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];

    if ($path == '') {
        $valid = 0;
        $error_message .= 'You must have to select a photo<br>';
    } else {
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $file_name = basename($path, '.' . $ext);
        if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'gif') {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

    if ($valid == 1) {

        $statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $banner_product_category = $row['banner_product_category'];
            unlink('../assets/uploads/' . $banner_product_category);
        }


        $final_name = 'banner_product_category' . '.' . $ext;
        move_uploaded_file($path_tmp, '../assets/uploads/' . $final_name);


        $statement = $pdo->prepare("UPDATE tbl_settings SET banner_product_category=? WHERE id=1");
        $statement->execute(array($final_name));

        $success_message = 'Product Category Page Banner is updated successfully.';
    }
}

if (isset($_POST['form7_10'])) {
    $valid = 1;

    $path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];

    if ($path == '') {
        $valid = 0;
        $error_message .= 'You must have to select a photo<br>';
    } else {
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $file_name = basename($path, '.' . $ext);
        if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg' && $ext != 'gif') {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }
}

if (isset($_POST['form9'])) {

    $statement = $pdo->prepare("UPDATE tbl_settings SET paypal_email=?, bank_detail=? WHERE id=1");
    $statement->execute(array($_POST['paypal_email'], $_POST['bank_detail']));

    $success_message = 'Payment Settings is updated successfully.';
}

if (isset($_POST['form10'])) {

    $statement = $pdo->prepare("UPDATE tbl_settings SET before_head=?, after_body=?, before_body=? WHERE id=1");
    $statement->execute(array($_POST['before_head'], $_POST['after_body'], $_POST['before_body']));

    $success_message = 'Head and Body Script is updated successfully.';
}
?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Cài đặt trang</h1>
    </div>
</section>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $footer_about                    = $row['footer_about'];
    $footer_copyright                = $row['footer_copyright'];
    $contact_address                 = $row['contact_address'];
    $contact_email                   = $row['contact_email'];
    $contact_phone                   = $row['contact_phone'];
    // $contact_fax                     = $row['contact_fax'];
    $contact_map_iframe              = $row['contact_map_iframe'];
    $receive_email                   = $row['receive_email'];
    $receive_email_subject           = $row['receive_email_subject'];
    $receive_email_thank_you_message = $row['receive_email_thank_you_message'];
    $forget_password_message         = $row['forget_password_message'];
    // $total_recent_post_footer        = $row['total_recent_post_footer'];
    // $total_popular_post_footer       = $row['total_popular_post_footer'];
    //  $total_recent_post_sidebar       = $row['total_recent_post_sidebar'];
    //  $total_popular_post_sidebar      = $row['total_popular_post_sidebar'];
    $total_featured_product_home     = $row['total_featured_product_home'];
    $total_latest_product_home       = $row['total_latest_product_home'];
    $total_popular_product_home      = $row['total_popular_product_home'];
    $meta_title_home                 = $row['meta_title_home'];
    $meta_keyword_home               = $row['meta_keyword_home'];
    $meta_description_home           = $row['meta_description_home'];
    $banner_login                    = $row['banner_login'];
    $banner_registration             = $row['banner_registration'];
    $banner_forget_password          = $row['banner_forget_password'];
    $banner_reset_password           = $row['banner_reset_password'];
    $banner_search                   = $row['banner_search'];
    $banner_cart                     = $row['banner_cart'];
    $banner_checkout                 = $row['banner_checkout'];
    $banner_product_category         = $row['banner_product_category'];
    // $banner_blog                     = $row['banner_blog'];
    // $cta_title                       = $row['cta_title'];
    // $cta_content                     = $row['cta_content'];
    // $cta_read_more_text              = $row['cta_read_more_text'];
    //  $cta_read_more_url               = $row['cta_read_more_url'];
    //  $cta_photo                       = $row['cta_photo'];
    $featured_product_title          = $row['featured_product_title'];
    $featured_product_subtitle       = $row['featured_product_subtitle'];
    $latest_product_title            = $row['latest_product_title'];
    $latest_product_subtitle         = $row['latest_product_subtitle'];
    $popular_product_title           = $row['popular_product_title'];
    $popular_product_subtitle        = $row['popular_product_subtitle'];
    // $testimonial_title               = $row['testimonial_title'];
    // $testimonial_subtitle            = $row['testimonial_subtitle'];
    //  $testimonial_photo               = $row['testimonial_photo'];
    //  $blog_title                      = $row['blog_title'];
    // $blog_subtitle                   = $row['blog_subtitle'];
    $newsletter_text                 = $row['newsletter_text'];
    $paypal_email                    = $row['paypal_email'];
    //  $stripe_public_key               = $row['stripe_public_key'];
    //   $stripe_secret_key               = $row['stripe_secret_key'];
    $bank_detail                     = $row['bank_detail'];
    $before_head                     = $row['before_head'];
    $after_body                      = $row['after_body'];
    $before_body                     = $row['before_body'];
    $home_service_on_off             = $row['home_service_on_off'];
    $home_welcome_on_off             = $row['home_welcome_on_off'];
    $home_featured_product_on_off    = $row['home_featured_product_on_off'];
    $home_latest_product_on_off      = $row['home_latest_product_on_off'];
    $home_popular_product_on_off     = $row['home_popular_product_on_off'];
    //  $home_testimonial_on_off         = $row['home_testimonial_on_off'];
    // $home_blog_on_off                = $row['home_blog_on_off'];
    $newsletter_on_off               = $row['newsletter_on_off'];
    //  $ads_above_welcome_on_off           = $row['ads_above_welcome_on_off'];
    //  $ads_above_featured_product_on_off  = $row['ads_above_featured_product_on_off'];
    //  $ads_above_latest_product_on_off    = $row['ads_above_latest_product_on_off'];
    //   $ads_above_popular_product_on_off   = $row['ads_above_popular_product_on_off'];
    //   $ads_above_testimonial_on_off       = $row['ads_above_testimonial_on_off'];
    //  $ads_category_sidebar_on_off        = $row['ads_category_sidebar_on_off'];
}
?>


<section class="content" style="min-height:auto;margin-bottom: -30px;">
    <div class="row">
        <div class="col-md-12">
            <?php if ($error_message) : ?>
                <div class="callout callout-danger">

                    <p>
                        <?php echo $error_message; ?>
                    </p>
                </div>
            <?php endif; ?>

            <?php if ($success_message) : ?>
                <div class="callout callout-success">

                    <p><?php echo $success_message; ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <div class="tab-content">
                </div>
                <div class="tab-pane" id="tab_3">
                    <div class="tab-pane" id="tab_5">
                        <h3>Cài đặt hiển thị</h3>
                        <form class="form-horizontal" action="" method="post">
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="" class="col-sm-4 control-label">Trang chủ (Số sản phẩm bạn muốn hiển thị)<span>*</span></label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="total_featured_product_home" value="<?php echo $total_featured_product_home; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-4 control-label">Hiển thị số sản phẩm gợi ý<span>*</span></label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="total_latest_product_home" value="<?php echo $total_latest_product_home; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-4 control-label"> Hiển thị số sản phẩm phổ biến<span>*</span></label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="total_popular_product_home" value="<?php echo $total_popular_product_home; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-4 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success pull-left" name="form5">Cập nhật</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>

                    <div class="tab-pane" id="tab_6">


                        <h3>Các chức năng</h3>
                        <form class="form-horizontal" action="" method="post">
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Hiển thị các dịch vụ</label>
                                        <div class="col-sm-4">
                                            <select name="home_service_on_off" class="form-control" style="width:auto;">
                                                <option value="1" <?php if ($home_service_on_off == 1) {
                                                                        echo 'selected';
                                                                    } ?>>On</option>
                                                <option value="0" <?php if ($home_service_on_off == 0) {
                                                                        echo 'selected';
                                                                    } ?>>Off</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Giao diện dịch vụ</label>
                                        <div class="col-sm-4">
                                            <select name="home_welcome_on_off" class="form-control" style="width:auto;">
                                                <option value="1" <?php if ($home_welcome_on_off == 1) {
                                                                        echo 'selected';
                                                                    } ?>>On</option>
                                                <option value="0" <?php if ($home_welcome_on_off == 0) {
                                                                        echo 'selected';
                                                                    } ?>>Off</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Giao diện sản phẩm gợi ý </label>
                                        <div class="col-sm-4">
                                            <select name="home_featured_product_on_off" class="form-control" style="width:auto;">
                                                <option value="1" <?php if ($home_featured_product_on_off == 1) {
                                                                        echo 'selected';
                                                                    } ?>>On</option>
                                                <option value="0" <?php if ($home_featured_product_on_off == 0) {
                                                                        echo 'selected';
                                                                    } ?>>Off</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Giao diện sản phẩm mới nhất</label>
                                        <div class="col-sm-4">
                                            <select name="home_latest_product_on_off" class="form-control" style="width:auto;">
                                                <option value="1" <?php if ($home_latest_product_on_off == 1) {
                                                                        echo 'selected';
                                                                    } ?>>On</option>
                                                <option value="0" <?php if ($home_latest_product_on_off == 0) {
                                                                        echo 'selected';
                                                                    } ?>>Off</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Giao diện các sản phẩm phổ biến </label>
                                        <div class="col-sm-4">
                                            <select name="home_popular_product_on_off" class="form-control" style="width:auto;">
                                                <option value="1" <?php if ($home_popular_product_on_off == 1) {
                                                                        echo 'selected';
                                                                    } ?>>On</option>
                                                <option value="0" <?php if ($home_popular_product_on_off == 0) {
                                                                        echo 'selected';
                                                                    } ?>>Off</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success pull-left" name="form6_0">Cập nhật</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <h3>Giao diện số 1</h3>
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Tên tiêu đề<span>*</span></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="featured_product_title" value="<?php echo $featured_product_title; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Nội dung giao diện<span>*</span></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="featured_product_subtitle" value="<?php echo $featured_product_subtitle; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success pull-left" name="form6_4">Cập nhật</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                        <h3>Giao diện số 2</h3>
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Sản phẩm mới nhất<span>*</span></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="latest_product_title" value="<?php echo $latest_product_title; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Nội dung giao diện<span>*</span></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="latest_product_subtitle" value="<?php echo $latest_product_subtitle; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success pull-left" name="form6_5">Cập nhật</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                        <h3>Giao diện số 3</h3>
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Sản phẩm phổ biến<span>*</span></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="popular_product_title" value="<?php echo $popular_product_title; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Nội dung giao diện<span>*</span></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="popular_product_subtitle" value="<?php echo $popular_product_subtitle; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success pull-left" name="form6_6">Cập nhật</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>


                    <!-- Phần Thanh toán -->


                    <!--
                        <div class="tab-pane" id="tab_9">
                            <form class="form-horizontal" action="" method="post">
                                <div class="box box-info">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="" class="col-sm-2 control-label">PayPal - Business Email </label>
                                            <div class="col-sm-5">
                                                <input type="text" name="paypal_email" class="form-control" value="<?php echo $paypal_email; ?>">
                                            </div>
                                        </div>                                     
                                        <div class="form-group">
                                            <label for="" class="col-sm-2 control-label">Bank Information </label>
                                            <div class="col-sm-5">
                                                <textarea name="bank_detail" class="form-control" cols="30" rows="10"><?php echo $bank_detail; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-2 control-label"></label>
                                            <div class="col-sm-6">
                                                <button type="submit" class="btn btn-success pull-left" name="form9">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <div class="tab-pane" id="tab_10">
                            <form class="form-horizontal" action="" method="post">
                                <div class="box box-info">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="" class="col-sm-2 control-label">Code before &lt;/head&gt; tag </label>
                                            <div class="col-sm-8">
                                                <textarea name="before_head" class="form-control" cols="30" rows="10"><?php echo $before_head; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-2 control-label">Code after &lt;body&gt; tag </label>
                                            <div class="col-sm-8">
                                                <textarea name="after_body" class="form-control" cols="30" rows="10"><?php echo $after_body; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-2 control-label">Code before &lt;/body&gt; tag </label>
                                            <div class="col-sm-8">
                                                <textarea name="before_body" class="form-control" cols="30" rows="10"><?php echo $before_body; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-2 control-label"></label>
                                            <div class="col-sm-6">
                                                <button type="submit" class="btn btn-success pull-left" name="form10">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>-->

                </div>
            </div>



            </form>
        </div>
    </div>

</section>

<?php require_once('footer.php'); ?>