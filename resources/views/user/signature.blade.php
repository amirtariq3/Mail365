<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/preview-equation/default/dragndrop_scrumboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Oct 2021 13:03:33 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Signature</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{asset('public/board/assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="{{asset('public/board/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/board/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <script src="https://kit.fontawesome.com/03a42f3c57.js" crossorigin="anonymous"></script>
    <link href="{{asset('public/board/plugins/drag-and-drop/jquery-ui/scrumboard/scrumboard.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    
</head>
<div class="container"> <div class=" text-center mt-5 ">
        <h1>Add Your Signature Here</h1>
    </div>
    <div class="row ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="container">
                        <form id="contact-form" role="form" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">Name *</label> 
                                        <input id="form_name" type="text" class="form-control" name="name" placeholder="Please enter your name *" required="required" data-error="Firstname is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_lastname">Designation *</label> 
                                        <input id="form_lastname" type="text"  class="form-control" name="designation" placeholder="Please enter your designation *" required="required" data-error="Lastname is required."> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_email">Email *</label> 
                                        <input id="form_email" type="email" class="form-control" name="email" placeholder="Please enter your email *" required="required" data-error="Valid email is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group"> <label for="form_email">Logo *</label> 
                                        <input id="form_email" type="file" class="form-control" name="logo" required="required" data-error="Valid email is required."> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">Phone *</label> 
                                        <input id="form_name" type="text" class="form-control" name="phone" placeholder="Please enter your company Phone *" required="required" data-error="Firstname is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_lastname">Phone 2</label> 
                                        <input id="form_lastname" type="text"  name="phone1" class="form-control" placeholder="Please enter your Phone 1 *"  data-error="Lastname is required."> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">Company URL *</label> 
                                        <input id="form_name" type="text" class="form-control" name="company_url" placeholder="Please enter your company url *" required="required" data-error="Firstname is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_lastname">Facebook URL *</label> 
                                        <input id="form_lastname" type="text"  name="facebook_url" class="form-control" placeholder="Please enter your facebook url *"  data-error="Lastname is required."> </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">Twitter URL *</label> 
                                        <input id="form_name" type="text" name="twitter_url" class="form-control" placeholder="Please enter your twitter url *"  data-error="Firstname is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_lastname">LinkedIn URL *</label> 
                                        <input id="form_lastname" type="text" name="linkedin_url"   class="form-control" placeholder="Please enter your linkedin url *"  data-error="Lastname is required."> </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_email">Contact URL *</label> 
                                        <input id="form_email" type="text" name="contact_url" class="form-control" placeholder="Please enter your contact url *" required="required" data-error="Valid email is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group"> <label for="form_email">Contact Image *</label> 
                                        <input id="form_email" type="file" name="contact_image" class="form-control" required="required" data-error="Valid email is required."> </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"> <label for="form_message">Discriotion *</label> 
                                        <textarea id="form_message" name="discription" class="form-control" placeholder="Write your discription here." rows="4" data-error="Please, leave us a message."></textarea> </div>
                                    </div>
                                    <div class="col-md-12"> <input type="submit" class="btn btn-success btn-send pt-2 btn-block " value="Send"> </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- /.8 -->
        </div> <!-- /.row-->
    </div>
</div>

<style>
body {
    background: #eee
}

#regForm {
    background-color: #ffffff;
    margin: 0px auto;
    font-family: Raleway;
    padding: 40px;
    border-radius: 10px
}

#register {
    color: #6A1B9A
}

h1 {
    text-align: center
}

input {
    padding: 10px;
    width: 100%;
    font-size: 17px;
    font-family: Raleway;
    border: 1px solid #aaaaaa;
    border-radius: 10px;
    -webkit-appearance: none
}

.tab input:focus {
    border: 1px solid #6a1b9a !important;
    outline: none
}

input.invalid {
    border: 1px solid #e03a0666
}

.tab {
    display: none
}

button {
    background-color: #6A1B9A;
    color: #ffffff;
    border: none;
    border-radius: 50%;
    padding: 10px 20px;
    font-size: 17px;
    font-family: Raleway;
    cursor: pointer
}

button:hover {
    opacity: 0.8
}

button:focus {
    outline: none !important
}

#prevBtn {
    background-color: #bbbbbb
}

.all-steps {
    text-align: center;
    margin-top: 30px;
    margin-bottom: 30px;
    width: 100%;
    display: inline-flex;
    justify-content: center
}

.step {
    height: 40px;
    width: 40px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 15px;
    color: #6a1b9a;
    opacity: 0.5
}

.step.active {
    opacity: 1
}

.step.finish {
    color: #fff;
    background: #6a1b9a;
    opacity: 1
}

.all-steps {
    text-align: center;
    margin-top: 30px;
    margin-bottom: 30px
}

.thanks-message {
    display: none
}
    </style>
