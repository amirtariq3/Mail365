<link href=" {{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<script src="{{asset('public/frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet"/>
<script src=" {{asset('public/frontend/ckeditor/ckeditor.js')}} "></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
 <div class="mail-box">
                  <aside class="sm-side">
                      <div class="user-head">
                          <a class="inbox-avatar" href="javascript:;">
                              <img  width="64" hieght="60" src="http://bootsnipp.com/img/avatars/ebeb306fd7ec11ab68cbcaa34282158bd80361a7.jpg">
                          </a>
                          <div class="user-name">
                              <h5><a href="#">Farhan Khan</a></h5>
                              <span><a href="#">faran@nexconcept007.onmicrosoft.com</a></span>
                          </div>
                          <a class="mail-dropdown pull-right" href="javascript:;">
                              <i class="fa fa-chevron-down"></i>
                          </a>
                      </div>
                      <div class="inbox-body">
                          <a href="{{route('compose', [$token])}}" data-toggle="modal"  title="Compose"    class="btn btn-compose">
                              Compose
                          </a>
                          <!-- Modal -->
                          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                          <h4 class="modal-title">Compose</h4>
                                      </div>
                                      <div class="modal-body">
                                          <form role="form" class="form-horizontal">
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">To</label>
                                                  <div class="col-lg-10">
                                                      <input type="text" placeholder="" id="inputEmail1" class="form-control">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Cc / Bcc</label>
                                                  <div class="col-lg-10">
                                                      <input type="text" placeholder="" id="cc" class="form-control">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Subject</label>
                                                  <div class="col-lg-10">
                                                      <input type="text" placeholder="" id="inputPassword1" class="form-control">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Message</label>
                                                  <div class="col-lg-10">
                                                      <textarea rows="10" cols="30" class="form-control" id="" name=""></textarea>
                                                  </div>
                                              </div>

                                              <div class="form-group">
                                                  <div class="col-lg-offset-2 col-lg-10">
                                                      <span class="btn green fileinput-button">
                                                        <i class="fa fa-plus fa fa-white"></i>
                                                        <span>Attachment</span>
                                                        <input type="file" name="files[]" multiple="">
                                                      </span>
                                                      <button class="btn btn-send" type="submit">Send</button>
                                                  </div>
                                              </div>
                                          </form>
                                      </div>
                                  </div><!-- /.modal-content -->
                              </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->
                      </div>
                      @foreach ($arr2 as $r)
                      <ul class="inbox-nav inbox-divider">
                          
                              
                          
                          <li class="active">
                              <a href="{{ url('/'.$r->displayName.'/'. $token .'/'. $r->parentFolderId .'')}}"><i class="fa fa-inbox"></i> {{$r->displayName}} </a>

                          </li>
                          
                          {{-- <li>
                              <a href="{{route('send', [$token])}}"><i class="fa fa-envelope-o"></i> Sent Mail</a>
                          </li>
                          <li>
                              <a href="{{route('archive', [$token])}}"><i class="fa fa-bookmark-o"></i> Archive</a>
                          </li>
                          <li>
                              <a href="{{route('draft', [$token])}}"><i class=" fa fa-external-link"></i> Drafts <span class="label label-info pull-right">30</span></a>
                          </li>
                         <li>
                              <a href="{{route('trash', [$token])}}"><i class=" fa fa-trash-o"></i> Trash</a>
                          </li>  --}}

                         

                      </ul>
                      @endforeach
                      <ul class="inbox-nav inbox-divider">
                        <li class="active">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Create Folder
                              </button>
                            {{-- <a href="{{route('create_folder', [$token])}}"  data-toggle="modal" data-target="#exampleModal"><i class="fa fa-inbox"></i> Create Folder </a> --}}
                        </li>
                        <li class="active">
                            <a href="{{route('signout')}}"><i class="fa fa-inbox"></i> Logout </a>
                        </li>
                      </ul>

                      <div class="inbox-body text-center">
                          <div class="btn-group">
                              <a class="btn mini btn-primary" href="javascript:;">
                                  <i class="fa fa-plus"></i>
                              </a>
                          </div>
                          <div class="btn-group">
                              <a class="btn mini btn-success" href="javascript:;">
                                  <i class="fa fa-phone"></i>
                              </a>
                          </div>
                          <div class="btn-group">
                              <a class="btn mini btn-info" href="javascript:;">
                                  <i class="fa fa-cog"></i>
                              </a>
                          </div>
                      </div>
                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Folder</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('create_folder', [$token])}}" >
                                    @csrf
                                    <div class="form-group">
                                      <label for="name">Name</label>
                                      <input type="text" name="name" class="form-control"  id="name"  placeholder="Enter folder name" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- End Modal -->

                  </aside>
<div class="col-md-9">


    <style>
        body{margin-top:20px;
        background:#eee;
        }


        .inbox .inbox-menu ul {
            margin-top: 30px;
            padding: 0;
            list-style: none
        }

        .inbox .inbox-menu ul li {
            height: 30px;
            padding: 5px 15px;
            position: relative
        }

        .inbox .inbox-menu ul li:hover,
        .inbox .inbox-menu ul li.active {
            background: #e4e5e6
        }

        .inbox .inbox-menu ul li.title {
            margin: 20px 0 -5px 0;
            text-transform: uppercase;
            font-size: 10px;
            color: #d1d4d7
        }

        .inbox .inbox-menu ul li.title:hover {
            background: 0 0
        }

        .inbox .inbox-menu ul li a {
            display: block;
            width: 100%;
            text-decoration: none;
            color: #3d3f42
        }

        .inbox .inbox-menu ul li a i {
            margin-right: 10px
        }

        .inbox .inbox-menu ul li a .label {
            position: absolute;
            top: 10px;
            right: 15px;
            display: block;
            min-width: 14px;
            height: 14px;
            padding: 2px
        }

        .inbox ul.messages-list {
            list-style: none;
            margin: 15px -15px 0 -15px;
            padding: 15px 15px 0 15px;
            border-top: 1px solid #d1d4d7
        }

        .inbox ul.messages-list li {
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            cursor: pointer;
            margin-bottom: 10px;
            padding: 10px
        }

        .inbox ul.messages-list li a {
            color: #3d3f42
        }

        .inbox ul.messages-list li a:hover {
            text-decoration: none
        }

        .inbox ul.messages-list li.unread .header,
        .inbox ul.messages-list li.unread .title {
            font-weight: 700
        }

        .inbox ul.messages-list li:hover {
            background: #e4e5e6;
            border: 1px solid #d1d4d7;
            padding: 9px
        }

        .inbox ul.messages-list li:hover .action {
            color: #d1d4d7
        }

        .inbox ul.messages-list li .header {
            margin: 0 0 5px 0
        }

        .inbox ul.messages-list li .header .from {
            width: 49.9%;
            white-space: nowrap;
            overflow: hidden!important;
            text-overflow: ellipsis
        }

        .inbox ul.messages-list li .header .date {
            width: 50%;
            text-align: right;
            float: right
        }

        .inbox ul.messages-list li .title {
            margin: 0 0 5px 0;
            white-space: nowrap;
            overflow: hidden!important;
            text-overflow: ellipsis
        }

        .inbox ul.messages-list li .description {
            font-size: 12px;
            padding-left: 29px
        }

        .inbox ul.messages-list li .action {
            display: inline-block;
            width: 16px;
            text-align: center;
            margin-right: 10px;
            color: #d1d4d7
        }

        .inbox ul.messages-list li .action .fa-check-square-o {
            margin: 0 -1px 0 1px
        }

        .inbox ul.messages-list li .action .fa-square {
            float: left;
            margin-top: -16px;
            margin-left: 4px;
            font-size: 11px;
            color: #fff
        }

        .inbox ul.messages-list li .action .fa-star.bg {
            float: left;
            margin-top: -16px;
            margin-left: 3px;
            font-size: 12px;
            color: #fff
        }

        .inbox .message .message-title {
            margin-top: 30px;
            padding-top: 10px;
            font-weight: 700;
            font-size: 14px
        }

        .inbox .message .header {
            margin: 20px 0 30px 0;
            padding: 10px 0 10px 0;
            border-top: 1px solid #d1d4d7;
            border-bottom: 1px solid #d1d4d7
        }

        .inbox .message .header .avatar {
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            height: 34px;
            width: 34px;
            float: left;
            margin-right: 10px
        }

        .inbox .message .header i {
            margin-top: 1px
        }

        .inbox .message .header .from {
            display: inline-block;
            width: 50%;
            font-size: 12px;
            margin-top: -2px;
            color: #d1d4d7
        }

        .inbox .message .header .from span {
            display: block;
            font-size: 14px;
            font-weight: 700;
            color: #3d3f42
        }

        .inbox .message .header .date {
            display: inline-block;
            width: 29%;
            text-align: right;
            float: right;
            font-size: 12px;
            margin-top: 18px
        }

        .inbox .message .attachments {
            border-top: 3px solid #e4e5e6;
            border-bottom: 3px solid #e4e5e6;
            padding: 10px 0;
            margin-bottom: 20px;
            font-size: 12px
        }

        .inbox .message .attachments ul {
            list-style: none;
            margin: 0 0 0 -40px
        }

        .inbox .message .attachments ul li {
            margin: 10px 0
        }

        .inbox .message .attachments ul li .label {
            padding: 2px 4px
        }

        .inbox .message .attachments ul li span.quickMenu {
            float: right;
            text-align: right
        }

        .inbox .message .attachments ul li span.quickMenu .fa {
            padding: 5px 0 5px 25px;
            font-size: 14px;
            margin: -2px 0 0 5px;
            color: #d1d4d7
        }

        .inbox .contacts ul {
            margin-top: 30px;
            padding: 0;
            list-style: none
        }

        .inbox .contacts ul li {
            height: 30px;
            padding: 5px 15px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis!important;
            position: relative;
            cursor: pointer
        }

        .inbox .contacts ul li .label {
            display: inline-block;
            width: 6px;
            height: 6px;
            padding: 0;
            margin: 0 5px 2px 0
        }

        .inbox .contacts ul li:hover {
            background: #e4e5e6
        }

        </style>

        <style>
            .mail-box {
                border-collapse: collapse;
                border-spacing: 0;
                display: table;
                table-layout: fixed;
                width: 100%;
            }
            .mail-box aside {
                display: table-cell;
                float: none;
                height: 100%;
                padding: 0;
                vertical-align: top;
            }
            .mail-box .sm-side {
                background: none repeat scroll 0 0 #e5e8ef;
                border-radius: 4px 0 0 4px;
                width: 25%;
            }
            .mail-box .lg-side {
                background: none repeat scroll 0 0 #fff;
                border-radius: 0 4px 4px 0;
                width: 75%;
            }
            .mail-box .sm-side .user-head {
                background: none repeat scroll 0 0 #00a8b3;
                border-radius: 4px 0 0;
                color: #fff;
                min-height: 80px;
                padding: 10px;
            }
            .user-head .inbox-avatar {
                float: left;
                width: 65px;
            }
            .user-head .inbox-avatar img {
                border-radius: 4px;
            }
            .user-head .user-name {
                display: inline-block;
                margin: 0 0 0 10px;
            }
            .user-head .user-name h5 {
                font-size: 14px;
                font-weight: 300;
                margin-bottom: 0;
                margin-top: 15px;
            }
            .user-head .user-name h5 a {
                color: #fff;
            }
            .user-head .user-name span a {
                color: #87e2e7;
                font-size: 12px;
            }
            a.mail-dropdown {
                background: none repeat scroll 0 0 #80d3d9;
                border-radius: 2px;
                color: #01a7b3;
                font-size: 10px;
                margin-top: 20px;
                padding: 3px 5px;
            }
            .inbox-body {
                padding: 20px;
            }
            .btn-compose {
                background: none repeat scroll 0 0 #ff6c60;
                color: #fff;
                padding: 12px 0;
                text-align: center;
                width: 100%;
            }
            .btn-compose:hover {
                background: none repeat scroll 0 0 #f5675c;
                color: #fff;
            }
            ul.inbox-nav {
                display: inline-block;
                margin: 0;
                padding: 0;
                width: 100%;
            }
            .inbox-divider {
                border-bottom: 1px solid #d5d8df;
            }
            ul.inbox-nav li {
                display: inline-block;
                line-height: 45px;
                width: 100%;
            }
            ul.inbox-nav li a {
                color: #6a6a6a;
                display: inline-block;
                line-height: 45px;
                padding: 0 20px;
                width: 100%;
            }
            ul.inbox-nav li a:hover, ul.inbox-nav li.active a, ul.inbox-nav li a:focus {
                background: none repeat scroll 0 0 #d5d7de;
                color: #6a6a6a;
            }
            ul.inbox-nav li a i {
                color: #6a6a6a;
                font-size: 16px;
                padding-right: 10px;
            }
            ul.inbox-nav li a span.label {
                margin-top: 13px;
            }
            ul.labels-info li h4 {
                color: #5c5c5e;
                font-size: 13px;
                padding-left: 15px;
                padding-right: 15px;
                padding-top: 5px;
                text-transform: uppercase;
            }
            ul.labels-info li {
                margin: 0;
            }
            ul.labels-info li a {
                border-radius: 0;
                color: #6a6a6a;
            }
            ul.labels-info li a:hover, ul.labels-info li a:focus {
                background: none repeat scroll 0 0 #d5d7de;
                color: #6a6a6a;
            }
            ul.labels-info li a i {
                padding-right: 10px;
            }
            .nav.nav-pills.nav-stacked.labels-info p {
                color: #9d9f9e;
                font-size: 11px;
                margin-bottom: 0;
                padding: 0 22px;
            }
            .inbox-head {
                background: none repeat scroll 0 0 #41cac0;
                border-radius: 0 4px 0 0;
                color: #fff;
                min-height: 80px;
                padding: 20px;
            }
            .inbox-head h3 {
                display: inline-block;
                font-weight: 300;
                margin: 0;
                padding-top: 6px;
            }
            .inbox-head .sr-input {
                border: medium none;
                border-radius: 4px 0 0 4px;
                box-shadow: none;
                color: #8a8a8a;
                float: left;
                height: 40px;
                padding: 0 10px;
            }
            .inbox-head .sr-btn {
                background: none repeat scroll 0 0 #00a6b2;
                border: medium none;
                border-radius: 0 4px 4px 0;
                color: #fff;
                height: 40px;
                padding: 0 20px;
            }
            .table-inbox {
                border: 1px solid #d3d3d3;
                margin-bottom: 0;
            }
            .table-inbox tr td {
                padding: 12px !important;
            }
            .table-inbox tr td:hover {
                cursor: pointer;
            }
            .table-inbox tr td .fa-star.inbox-started, .table-inbox tr td .fa-star:hover {
                color: #f78a09;
            }
            .table-inbox tr td .fa-star {
                color: #d5d5d5;
            }
            .table-inbox tr.unread td {
                background: none repeat scroll 0 0 #f7f7f7;
                font-weight: 600;
            }
            ul.inbox-pagination {
                float: right;
            }
            ul.inbox-pagination li {
                float: left;
            }
            .mail-option {
                display: inline-block;
                margin-bottom: 10px;
                width: 100%;
            }
            .mail-option .chk-all, .mail-option .btn-group {
                margin-right: 5px;
            }
            .mail-option .chk-all, .mail-option .btn-group a.btn {
                background: none repeat scroll 0 0 #fcfcfc;
                border: 1px solid #e7e7e7;
                border-radius: 3px !important;
                color: #afafaf;
                display: inline-block;
                padding: 5px 10px;
            }
            .inbox-pagination a.np-btn {
                background: none repeat scroll 0 0 #fcfcfc;
                border: 1px solid #e7e7e7;
                border-radius: 3px !important;
                color: #afafaf;
                display: inline-block;
                padding: 5px 15px;
            }
            .mail-option .chk-all input[type="checkbox"] {
                margin-top: 0;
            }
            .mail-option .btn-group a.all {
                border: medium none;
                padding: 0;
            }
            .inbox-pagination a.np-btn {
                margin-left: 5px;
            }
            .inbox-pagination li span {
                display: inline-block;
                margin-right: 5px;
                margin-top: 7px;
            }
            .fileinput-button {
                background: none repeat scroll 0 0 #eeeeee;
                border: 1px solid #e6e6e6;
            }
            .inbox-body .modal .modal-body input, .inbox-body .modal .modal-body textarea {
                border: 1px solid #e6e6e6;
                box-shadow: none;
            }
            .btn-send, .btn-send:hover {
                background: none repeat scroll 0 0 #00a8b3;
                color: #fff;
            }
            .btn-send:hover {
                background: none repeat scroll 0 0 #009da7;
            }
            .modal-header h4.modal-title {
                font-family: "Open Sans",sans-serif;
                font-weight: 300;
            }
            .modal-body label {
                font-family: "Open Sans",sans-serif;
                font-weight: 400;
            }
            .heading-inbox h4 {
                border-bottom: 1px solid #ddd;
                color: #444;
                font-size: 18px;
                margin-top: 20px;
                padding-bottom: 10px;
            }
            .sender-info {
                margin-bottom: 20px;
            }
            .sender-info img {
                height: 30px;
                width: 30px;
            }
            .sender-dropdown {
                background: none repeat scroll 0 0 #eaeaea;
                color: #777;
                font-size: 10px;
                padding: 0 3px;
            }
            .view-mail a {
                color: #ff6c60;
            }
            .attachment-mail {
                margin-top: 30px;
            }
            .attachment-mail ul {
                display: inline-block;
                margin-bottom: 30px;
                width: 100%;
            }
            .attachment-mail ul li {
                float: left;
                margin-bottom: 10px;
                margin-right: 10px;
                width: 150px;
            }
            .attachment-mail ul li img {
                width: 100%;
            }
            .attachment-mail ul li span {
                float: right;
            }
            .attachment-mail .file-name {
                float: left;
            }
            .attachment-mail .links {
                display: inline-block;
                width: 100%;
            }

            .fileinput-button {
                float: left;
                margin-right: 4px;
                overflow: hidden;
                position: relative;
            }
            .fileinput-button input {
                cursor: pointer;
                direction: ltr;
                font-size: 23px;
                margin: 0;
                opacity: 0;
                position: absolute;
                right: 0;
                top: 0;
                transform: translate(-300px, 0px) scale(4);
            }
            .fileupload-buttonbar .btn, .fileupload-buttonbar .toggle {
                margin-bottom: 5px;
            }
            .files .progress {
                width: 200px;
            }
            .fileupload-processing .fileupload-loading {
                display: block;
            }
            * html .fileinput-button {
                line-height: 24px;
                margin: 1px -3px 0 0;
            }
            * + html .fileinput-button {
                margin: 1px 0 0;
                padding: 2px 15px;
            }
            @media (max-width: 767px) {
            .files .btn span {
                display: none;
            }
            .files .preview * {
                width: 40px;
            }
            .files .name * {
                display: inline-block;
                width: 80px;
                word-wrap: break-word;
            }
            .files .progress {
                width: 20px;
            }
            .files .delete {
                width: 60px;
            }
            }
            ul {
                list-style-type: none;
                padding: 0px;
                margin: 0px;
            }


            </style>

    <div class="panel panel-default">
        <div class="panel-body message">
            <p class="text-center">New Message</p>

            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif



            <form class="form-horizontal" action="{{route('mail')}}" role="form"  method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="to" class="col-sm-1 control-label">To:</label>

                          <input type="email" class="form-control select2-offscreen  @error('email') is-invalid @enderror " id="to" name="email" placeholder="Type email" tabindex="-1">
                          @error('email')
                          <span style="color:red">{{ $message }}</span>
                          @enderror
                    </div>

                  </div>
                <div class="form-group">
                    <label for="cc" class="col-sm-1 control-label">CC:</label>
                        <input type="email" class="form-control select2-offscreen" id="cc" name="cc" placeholder="Type email" tabindex="-1">
                </div>
                <div class="form-group">
                    <label for="bcc" class="col-sm-1 control-label">BCC:</label>
                        <input type="text" class="form-control select2-offscreen"name="subject" id="bcc" placeholder="Type subject" tabindex="-1">
                </div>
                <div class="form-group">
                    <textarea class="ckeditor form-control" name="body"></textarea>
                </div>

                <div class="form-group">
                    <label for="bcc" class="col-sm-1 control-label">Attachment:</label>
                            <input type="file" class="form-control select2-offscreen"name="attachment" id="bcc" placeholder="Type subject" tabindex="-1">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success" name="action" value="send">Send</button>
                    <button type="submit" class="btn btn-danger" name="action" value="draft">Save in Draft</button>
                </div>


            </div>
        </form>
        </div>
    </div>
</div><!--/.col-->
</div>
</div>

