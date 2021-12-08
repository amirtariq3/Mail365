<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/preview-equation/default/dragndrop_scrumboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Oct 2021 13:03:33 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Scrum Task Board | Equation - Multipurpose Bootstrap Dashboard Template </title>
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
<style>
.tooltip {
  display: block;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  top: -5px;
  right: 110%;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 50%;
  left: 100%;
  margin-top: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: transparent transparent transparent black;
}
.tooltip:hover .tooltiptext {
  visibility: visible;
}

        .mb-2{
        
        width: 20ch;
        overflow: hidden;
        white-space: nowrap;
        }

        .subject{
        
        width: 25ch;
        overflow: hidden;
        white-space: nowrap;
        }

        .body{
        
        width: 25ch;
        overflow: hidden;
        white-space: nowrap;
        }

        .btn-primary{
            margin-top: 55px;
            align-items: center;
            margin-left: 700px;
        }

        .modal-header-info {
        color:#fff;
        padding:9px 15px;
        border-bottom:1px solid #eee;
        background-color: #5bc0de;
        -webkit-border-top-left-radius: 5px;
        -webkit-border-top-right-radius: 5px;
        -moz-border-radius-topleft: 5px;
        -moz-border-radius-topright: 5px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
                           }
                       
        .dropbtn {
        background-color: #0c0c0c;
        color: white;
        font-size: 10px;
        border: none;
        }

        .dropdown {
        position: relative;
        display: inline-block;
        margin-left: 200px;
        margin-bottom: 10px;
        }

        .dropdown-content {
        display: none;
        position: absolute;
        background-color: ;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        }

        .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        }
        .bg-custom-1 {
  background-color: #85144b;
}

.bg-custom-2 {
background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
}

        .dropdown-content a:hover {background-color: #ddd;}

        .dropdown:hover .dropdown-content {display: block;}

        .dropdown:hover .dropbtn {background-color: #3e8e41;}

            
 </style>

<body>
    <div id="eq-loader">
      <div class="eq-loader-div">
          <div class="eq-loading dual-loader mx-auto mb-5"></div>
      </div>
    </div>
    <!-- Tab Mobile View Header -->
    <header class="tabMobileView header navbar fixed-top d-lg-none">
        <div class="nav-toggle">
                <a href="javascript:void(0);" class="nav-link sidebarCollapse" data-placement="bottom">
                    <i class="flaticon-menu-line-2"></i>
                </a>
            <a href="index.html" class=""> <img src="assets/img/logo-3.png" class="img-fluid" alt="logo"></a>
        </div>
        <ul class="nav navbar-nav">
            <li class="nav-item d-lg-none"> 
                <form class="form-inline justify-content-end" role="search">
                    <input type="text" class="form-control search-form-control mr-3">
                </form>
            </li>
        </ul>
    </header>
    <!-- Tab Mobile View Header -->

    <!--  BEGIN NAVBAR  -->
    <header class="header navbar fixed-top navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse d-none d-lg-block" data-placement="bottom"><i class="flaticon-menu-line-2"></i></a>
       
<ul>
<div class="tooltip"><i class="fas fa-cogs"></i>
  <span class="tooltiptext">faran@nexconcept007.onmicrosoft.com</span>
</div>
    </ul>

        <ul class="navbar-nav flex-row mr-lg-auto ml-lg-0  ml-auto">
            
        </ul>
        

        <ul class="navbar-nav flex-row ml-lg-auto">
            
            <li class="nav-item  d-lg-block d-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar-list-4">
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{asset('public/board/thumbnail.png')}}" width="40" height="40" class="rounded-circle">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Setting</a>
                <a class="dropdown-item" href="#">Log Out</a>
            </div>
            </li>
    </ul>
        <?php
    $mytime = Carbon\Carbon::now();
    $date_time=$mytime->toDayDateTimeString();
        ?>
        {{$date_time}}
    </header>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="cs-overlay"></div>

        <!--  BEGIN SIDEBAR  -->

        <div class="sidebar-wrapper sidebar-theme">
            
            <div id="dismiss" class="d-lg-none"><i class="flaticon-cancel-12"></i></div>
            
            <nav id="sidebar">



                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu">
                        <a href="" aria-expanded="false" class="dropdown-toggle" data-toggle="modal" data-target="#modalCompose">
                            <div class="">
                            <i class="far fa-edit"></i>
                                <span>Compose</span>
                            </div>      
                        </a>
                        
                    </li>
                
                    <li class="menu">
                        @foreach($arr2 as $r)
                        <a href="{{ url('/board/'.$r->displayName.'/'. $token .'/'. $r->parentFolderId .'')}}"   class="dropdown-toggle">
                            <div class="">
                                <i class="flaticon-redo-1"></i>
                                <span>{{$r->displayName}}</span>
                            </div>
                            <div>
                               
                            </div>
                        </a>
                        @endforeach
                        <a href="{{ url('/board/Send Item/'. $token .'/'. $r->parentFolderId .'')}}"   class="dropdown-toggle">
                            <div class="">
                                <i class="flaticon-redo-1"></i>
                                <span>Sent Items</span>
                            </div>
                            <div>
                               
                            </div>
                        </a>
                        <a href="{{route('create_folder', [$token])}}"   class="dropdown-toggle">
                            <div class="">
                                <i class="flaticon-redo-1"></i>
                                <span>Create Folder</span>
                            </div>
                            <div>
                               
                            </div>
                        </a>
                        <a href="{{route('signout')}}"   class="dropdown-toggle">
                            <div class="">
                                <i class="flaticon-redo-1"></i>
                                <span>Logout</span>
                            </div>
                            <div>
                               
                            </div>
                        </a>
                    </li>

                   
                </ul>
            </nav>

        </div>
        <!--  BEGIN CONTENT PART  -->
        <!-- Model for compose email -->
    <div class="modal show" id="modalCompose">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header modal-header-info">
           
          </div>
          <div class="modal-body">
            <form role="form" class="form-horizontal" action="{{route('mail')}}">
                <div class="form-group">
                  <label class="col-sm-2" for="inputTo"><span class="glyphicon glyphicon-user"></span>To</label>
                  <div class="col-sm-10"><input type="email" name="email" class="form-control" id="inputTo" placeholder="Email"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2" for="inputSubject"><span class="glyphicon glyphicon-list-alt"></span>Subject</label>
                  <div class="col-sm-10"><input type="text" name="subject" class="form-control" id="inputSubject" placeholder="subject"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2" for="inputSubject"><span class="glyphicon glyphicon-list-alt"></span>Attachment</label>
                  <div class="col-sm-10"><input type="file" name="attachment" class="form-control" id="inputSubject" placeholder="subject"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12" for="inputBody"><span class="glyphicon glyphicon-list"></span>Message</label>
                  <div class="col-sm-12"><textarea rows="10" cols="30" class="form-control" id="" name="body"></textarea></div>
                </div>
                <button type="submit" class="btn btn-success" name="action" value="send">Send</button>
          <button type="submit" class="btn btn-danger" name="action" value="draft">Save in Draft</button>
            </form>
          </div>
          <div class="modal-footer">
          
            
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal compose message -->

        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>Scrum Task Board</h3>
                    </div>
                    <div class="add-column">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    New Column
                    </button>
                    </div>
                    <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Column</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{route('create_colume')}}" >
                        @csrf
                        <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control"  id="name"  placeholder="Enter column name" required>
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </div>
                        </div>
                        </div>
                        </div>
<!-- End Modal -->
                </div>
                
                <div class="row scrumboard" id="cancel-row">
                    <div class="col-lg-12 layout-spacing">

                        <div class="row">
                        @foreach($colume as $key=>$col)
                            <div data-section="{{$col->id}}" class="col-lg-3 col-md-3 col-sm-6 connect-sorting" data-connect="sorting" data-sortable="true">
                                <div class="col-md-12 s-heading">
                                <h6><i class="flaticon-sun-fill"></i> {{$col->col_name}}  
                                    @if($col->id != 1)
                                    @if($col->id != 10)
                                    <a style="color:black;" href="{{route('delete_colume', $col->id)}}"><i class="fas fa-trash-alt"></i></a> 
                                    @endif
                                    @endif
                                    <a style="color:black;" href="" data-toggle="modal" data-target="#update_column" class="open-AddBookDialoggg" data-id='{"name":"{{$col->col_name}}","id":"{{$col->id}}"}'><i class="far fa-edit"></i></a></h6>
                                   
                                </div>
                                @foreach($arr1 as $key=>$inbox_mail)
                                @if($inbox_mail->status == 1)
                                @if($inbox_mail->colume_id == $col->id)
                                <div data-draggable="true" class="card mb-4" style="">
                                
                                    <div class="card-body p-1" id="{{$inbox_mail->id}}" onmousedown="abc(this.id)">
                                       
                                        <h6 class="mb-2 mt-2"><a href="" data-toggle="modal" data-target=".bd-example-modal-xl">{{$inbox_mail->sender_name}}</a></h6>
                                        <div class="dropdown">
                                        <button class="dropbtn"><i class="fa fa-bars"></i></button>
                                        <div class="dropdown-content">
                                            <a href="{{route('delete_card', $inbox_mail->id)}}">delete</a>
                                            <a href="" data-toggle="modal" data-target="#reply" class="open-AddBookDialog" data-id='{"email":"{{$inbox_mail->sender_email}}","message_id":"{{$inbox_mail->message_id}}"}' >reply</a>
                                            <a href="#" data-toggle="modal" data-target="#forward" class="open-AddBookDialogg" data-id="{{$inbox_mail->message_id}}" >forward</a>
                                            <a href="{{route('done_card', $inbox_mail->id)}}">Done</a>
                                        </div>
                                        </div>

                                        <p class="subject">{{$inbox_mail->subject}}</p>
                                        <p class="body">{{strip_tags($inbox_mail->discription)}}</p>
                                        
                                    </div>
                                    
                                </div>
                                
                                @endif
                                @endif
                                @endforeach
                            </div>
                        @endforeach
<!-- reply model -->
<div class="modal show" id="reply">
                 
                 <div class="modal-dialog">
                     <div class="modal-content">
                     <div class="modal-header modal-header-info">
                     
                     </div>
                     <div class="modal-body">
                         <form role="form" class="form-horizontal" action="{{route('replay_email')}}">
                             @csrf
                             <div class="form-group">
                             <label class="col-sm-2" for="inputTo"><span class="glyphicon glyphicon-user"></span>To</label>
                             <div class="col-sm-10"><input type="email" class="form-control" name="email" id="email" value="" placeholder="Email"></div>
                             </div>
                             <input type="text" hidden class="form-control" name="message_id" id="message_id" value="">
                             <div class="form-group">
                             <label class="col-sm-2" for="inputTo"><span class="glyphicon glyphicon-user"></span>Choose file</label>
                             <div class="col-sm-10"><input type="file" class="form-control" name="attachment" id="file" value="" ></div>
                             </div>
                             <div class="form-group">
                             <label class="col-sm-12" for="inputBody"><span class="glyphicon glyphicon-list"></span>Message</label>
                             <div class="col-sm-12"><textarea class="form-control" name="body" id="inputBody" rows="8"></textarea></div>
                             </div>
                             <button class="btn btn-send" type="submit">Send</button>
                         </form>
                     </div>
                     <div class="modal-footer">
                     <button class="btn btn-send" type="submit">Draft</button>
                     
                         
                     </div>
                     </div><!-- /.modal-content -->
                 </div><!-- /.modal-dialog -->
                 </div>
                 <!-- forward model -->
                 <div class="modal show" id="forward">

                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-header-info">

                            </div>
                            <div class="modal-body">
                                <form role="form" class="form-horizontal" action="{{route('forward')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-sm-2" for="inputTo"><span class="glyphicon glyphicon-user"></span>To</label>
                                        <div class="col-sm-10"><input type="email" class="form-control" name="email" id="email" value=""
                                                placeholder="Email"></div>

                                        <input type="text" hidden class="form-control" name="forward_message_id" id="forward_message_id"
                                            value="">
                                    </div>
                                    <button class="btn btn-send" type="submit">Send</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-send" type="submit">Draft</button>


                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                    </div>
            
                    <!-- Modal for update colume -->
                    <div class="modal fade" id="update_column" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Column</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{route('update_colume')}}" >
                        @csrf
                        <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="col_name" class="form-control"  id="col_name"  placeholder="Enter column name" required>
                        </div>
                        <input type="text" hidden class="form-control" name="col_id" id="col_id" value="">
                        <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </div>
                        </div>
                        </div>
                        </div>
<!-- End Modal -->

            </div>
        </div>
        <!--  END CONTENT PART  -->
        
    </div>
    <!-- END MAIN CONTAINER -->
    
    <!--  BEGIN FOOTER  -->
    <footer class="footer-section theme-footer">

        <div class="footer-section-1  sidebar-theme">
            
        </div>

        <div class="footer-section-2 container-fluid">
            <div class="row">
                <div id="toggle-grid" class="col-xl-7 col-md-6 col-sm-6 col-12 text-sm-left text-center">
                    <ul class="list-inline links ml-sm-5">
                      
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--  END FOOTER  -->
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('public/board/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('public/board/assets/js/loader.js')}}"></script>
    <script src="{{asset('public/board/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('public/board/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('public/board/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/board/plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('public/board/assets/js/app.js')}}"></script>
    
    <script>


        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{asset('public/board/assets/js/custom.js')}}"></script>
</body>
</html>
<script type="text/javascript">

$(document).on("click", ".open-AddBookDialog", function () {
     var myBookId = $(this).data('id');
    
     $('#email').val(myBookId.email);
     $('#message_id').val(myBookId.message_id);
});


$(document).on("click", ".open-AddBookDialogg", function () {
     var myBookId = $(this).data('id');
     console.log(myBookId);
     $('#forward_message_id').val(myBookId);
});
$(document).on("click", ".open-AddBookDialoggg", function () {
     var myBookId = $(this).data('id');
     console.log(myBookId);
     $('#col_name').val(myBookId.name);
     $('#col_id').val(myBookId.id);
});


    </script>
<script>




/*
=========================================
|                                       |
|          Variables Definations        |
|                                       |
=========================================
*/

var Container = {
    scrumboard: $('.scrumboard'),
    card: $('.scrumboard .card')
}

var Elements = {
    collapseIcon: $('.f-icon i'),
    checkbox: $('.scrumboard .card .new-control-input')
}


// Containers
var scrumboard = Container.scrumboard;
var card = Container.card;


// Data Attributes

var cardId;
// Elements
var collapseIcon = Elements.collapseIcon;
var checkbox = Elements.checkbox;








/*
=========================================
|                                       |
|           Widget Collapse             |
|                                       |
=========================================
*/



$('[data-sortable="true"]').sortable({
    connectWith: '.connect-sorting',
    cursor: 'move',
    placeholder: "ui-state-highlight",
    helper: function(){
        return $("<div class='scrumboard-on-sort-change'></div>");
    },
    refreshPosition: true,
    stop: function( event, ui ) {
        var parent_ui = ui.item.parent().attr('data-section');

        sortOnStopCallback( parent_ui );
    },
    cursorAt: { left:  18, top: 53 }
});


function abc(ev) {
    cardId=ev;
    // localStorage.setItem("abc","kutta")

}


function sortOnStopCallback( identity ) {
 console.log(identity);
 var stringg="https://localhost/mail365/status_conversation_history/"+cardId+"/"+identity;
        fetch( stringg )
    .then()
    .then( response => {
        // Do something with response.
    } );
    // if (identity === "s-new") {

    //     console.log('s-new ss');
    //     console.log(localStorage.getItem("abc"));
        

    // } else if (identity === "s-in-progress") {

    //     console.log('s-in-progress ss');
      
    //     var stringg="https://localhost/mail365/status/"+cardId+"/1";
    //     fetch( stringg )
    // .then( )
    // .then( response => {
    //     // Do something with response.
    // } );
    // } else if (identity === "s-on-review") {

    //     console.log('s-on-review ss');
       
    //     var stringg="https://localhost/mail365/status/"+cardId+"/2";
    //     fetch( stringg )
    // .then(  )
    // .then( response => {
    //     // Do something with response.
    // } );
    // } else if (identity === "s-approved") {

    //     console.log('s-approved ss');
 
    //     var stringg="https://localhost/mail365/status/"+cardId+"/3";
    //     fetch( stringg )
    // .then()
    // .then( response => {
    //     // Do something with response.
    // } );
    // }



}



    </script>