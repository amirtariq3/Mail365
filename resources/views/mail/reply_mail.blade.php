<link href=" {{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<script src="{{asset('public/frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
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
    body{
    background-color: #f9fafb;
    margin-top:20px;
    }
    @media (min-width: 992px) {
    .inbox-wrapper .email-aside .aside-content {
    padding-right: 10px;
    }
    }

    .inbox-wrapper .email-aside .aside-content .aside-header {
    padding: 0 0 5px;
    position: relative;
    }

    .inbox-wrapper .email-aside .aside-content .aside-header .title {
    display: block;
    margin: 3px 0 0;
    font-size: 1.1rem;
    line-height: 27px;
    color: #686868;
    }

    .inbox-wrapper .email-aside .aside-content .aside-header .navbar-toggle {
    background: 0 0;
    display: none;
    outline: 0;
    border: 0;
    padding: 0 11px 0 0;
    text-align: right;
    margin: 0;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    position: absolute;
    }

    @media (max-width: 991px) {
    .inbox-wrapper .email-aside .aside-content .aside-header .navbar-toggle {
    display: block;
    }
    }

    .inbox-wrapper .email-aside .aside-content .aside-header .navbar-toggle .icon {
    font-size: 24px;
    color: #71738d;
    }

    .inbox-wrapper .email-aside .aside-content .aside-compose {
    text-align: center;
    padding: 14px 0;
    }

    .inbox-wrapper .email-aside .aside-content .aside-compose .btn,
    .inbox-wrapper .email-aside .aside-content .aside-compose .fc .fc-button,
    .fc .inbox-wrapper .email-aside .aside-content .aside-compose .fc-button,
    .inbox-wrapper .email-aside .aside-content .aside-compose .swal2-modal .swal2-actions button,
    .swal2-modal .swal2-actions .inbox-wrapper .email-aside .aside-content .aside-compose button,
    .inbox-wrapper .email-aside .aside-content .aside-compose .wizard > .actions a,
    .wizard > .actions .inbox-wrapper .email-aside .aside-content .aside-compose a {
    padding: 11px;
    }

    .inbox-wrapper .email-aside .aside-content .aside-nav {
    visibility: visible;
    padding: 0 0;
    }

    .inbox-wrapper .email-aside .aside-content .aside-nav.collapse {
    display: block;
    }

    @media (max-width: 991px) {
    .inbox-wrapper .email-aside .aside-content .aside-nav.collapse {
    display: none;
    }
    }

    @media (max-width: 991px) {
    .inbox-wrapper .email-aside .aside-content .aside-nav.show {
    display: block;
    }
    }

    .inbox-wrapper .email-aside .aside-content .aside-nav .title {
    display: block;
    color: #3d405c;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    margin: 20px 0 0;
    padding: 8px 14px 4px;
    }

    .inbox-wrapper .email-aside .aside-content .aside-nav .nav li {
    width: 100%;
    }

    .inbox-wrapper .email-aside .aside-content .aside-nav .nav li a {
    display: -webkit-flex;
    display: flex;
    -webkit-align-items: center;
    align-items: center;
    position: relative;
    color: #71748d;
    padding: 7px 14px;
    }

    .inbox-wrapper .email-aside .aside-content .aside-nav .nav li a:hover {
    text-decoration: none;
    background-color: rgba(114, 124, 245, 0.1);
    color: #727cf5;
    }

    .inbox-wrapper .email-aside .aside-content .aside-nav .nav li a .icon svg {
    width: 18px;
    margin-right: 10px;
    }

    .inbox-wrapper .email-aside .aside-content .aside-nav .nav li a .badge {
    margin-left: auto;
    }

    .inbox-wrapper .email-aside .aside-content .aside-nav .nav li a svg {
    width: 18px;
    margin-right: 10px;
    }

    .inbox-wrapper .email-aside .aside-content .aside-nav .nav li.active a {
    color: #ff3366;
    background: rgba(255, 51, 102, 0.1);
    }

    .inbox-wrapper .email-aside .aside-content .aside-nav .nav li.active a .icon {
    color: #ff3366;
    }

    .inbox-wrapper .email-content .email-inbox-header {
    background-color: transparent;
    padding: 18px 18px;
    }

    .inbox-wrapper .email-content .email-inbox-header .email-title {
    display: -webkit-flex;
    display: flex;
    -webkit-align-items: center;
    align-items: center;
    font-size: 1rem;
    }

    .inbox-wrapper .email-content .email-inbox-header .email-title svg {
    width: 20px;
    margin-right: 10px;
    color: #686868;
    }

    .inbox-wrapper .email-content .email-inbox-header .email-title .new-messages {
    font-size: .875rem;
    color: #686868;
    margin-left: 3px;
    }

    .inbox-wrapper .email-content .email-inbox-header .input-search .input-group-btn .btn,
    .inbox-wrapper .email-content .email-inbox-header .input-search .input-group-btn .fc .fc-button,
    .fc .inbox-wrapper .email-content .email-inbox-header .input-search .input-group-btn .fc-button,
    .inbox-wrapper .email-content .email-inbox-header .input-search .input-group-btn .swal2-modal .swal2-actions button,
    .swal2-modal .swal2-actions .inbox-wrapper .email-content .email-inbox-header .input-search .input-group-btn button,
    .inbox-wrapper .email-content .email-inbox-header .input-search .input-group-btn .wizard > .actions a,
    .wizard > .actions .inbox-wrapper .email-content .email-inbox-header .input-search .input-group-btn a {
    border-radius: 0;
    padding: 4.5px 10px;
    }

    .inbox-wrapper .email-content .email-inbox-header .input-search .input-group-btn .btn svg,
    .inbox-wrapper .email-content .email-inbox-header .input-search .input-group-btn .fc .fc-button svg,
    .fc .inbox-wrapper .email-content .email-inbox-header .input-search .input-group-btn .fc-button svg,
    .inbox-wrapper .email-content .email-inbox-header .input-search .input-group-btn .swal2-modal .swal2-actions button svg,
    .swal2-modal .swal2-actions .inbox-wrapper .email-content .email-inbox-header .input-search .input-group-btn button svg,
    .inbox-wrapper .email-content .email-inbox-header .input-search .input-group-btn .wizard > .actions a svg,
    .wizard > .actions .inbox-wrapper .email-content .email-inbox-header .input-search .input-group-btn a svg {
    width: 18px;
    }

    .inbox-wrapper .email-content .email-filters {
    padding: 20px;
    border-bottom: 1px solid #e8ebf1;
    background-color: transparent;
    width: 100%;
    border-top: 1px solid #e8ebf1;
    }

    .inbox-wrapper .email-content .email-filters > div {
    display: -webkit-flex;
    display: flex;
    -webkit-align-items: center;
    align-items: center;
    }

    .inbox-wrapper .email-content .email-filters .email-filters-left .btn-group,
    .inbox-wrapper .email-content .email-filters .email-filters-left .fc .fc-toolbar.fc-header-toolbar .fc-left .fc-button-group,
    .fc .fc-toolbar.fc-header-toolbar .fc-left .inbox-wrapper .email-content .email-filters .email-filters-left .fc-button-group,
    .inbox-wrapper .email-content .email-filters .email-filters-left .fc .fc-toolbar.fc-header-toolbar .fc-right .fc-button-group,
    .fc .fc-toolbar.fc-header-toolbar .fc-right .inbox-wrapper .email-content .email-filters .email-filters-left .fc-button-group {
    margin-right: 5px;
    }

    .inbox-wrapper .email-content .email-filters .email-filters-left input {
    margin-right: 8px;
    }

    .inbox-wrapper .email-content .email-filters .email-filters-right {
    text-align: right;
    }

    @media (max-width: 767px) {
    .inbox-wrapper .email-content .email-filters .email-filters-right {
    width: 100%;
    display: flex;
    justify-content: space-between;
    }
    }

    .inbox-wrapper .email-content .email-filters .email-filters-right .email-pagination-indicator {
    display: inline-block;
    vertical-align: middle;
    margin-right: 13px;
    }

    .inbox-wrapper .email-content .email-filters .email-filters-right .email-pagination-nav .btn svg,
    .inbox-wrapper .email-content .email-filters .email-filters-right .email-pagination-nav .fc .fc-button svg,
    .fc .inbox-wrapper .email-content .email-filters .email-filters-right .email-pagination-nav .fc-button svg,
    .inbox-wrapper .email-content .email-filters .email-filters-right .email-pagination-nav .swal2-modal .swal2-actions button svg,
    .swal2-modal .swal2-actions .inbox-wrapper .email-content .email-filters .email-filters-right .email-pagination-nav button svg,
    .inbox-wrapper .email-content .email-filters .email-filters-right .email-pagination-nav .wizard > .actions a svg,
    .wizard > .actions .inbox-wrapper .email-content .email-filters .email-filters-right .email-pagination-nav a svg {
    width: 18px;
    }

    .inbox-wrapper .email-content .email-filters .be-select-all.custom-checkbox {
    display: inline-block;
    vertical-align: middle;
    padding: 0;
    margin: 0 30px 0 0;
    }

    .inbox-wrapper .email-content .email-list .email-list-item {
    display: -webkit-flex;
    display: flex;
    -webkit-align-items: center;
    align-items: center;
    border-bottom: 1px solid #e8ebf1;
    padding: 10px 20px;
    width: 100%;
    cursor: pointer;
    position: relative;
    font-size: 14px;
    cursor: pointer;
    transition: background .2s ease-in-out;
    }

    .inbox-wrapper .email-content .email-list .email-list-item:hover {
    background: rgba(114, 124, 245, 0.08);
    }

    .inbox-wrapper .email-content .email-list .email-list-item:last-child {
    margin-bottom: 5px;
    }

    .inbox-wrapper .email-content .email-list .email-list-item .email-list-actions {
    width: 40px;
    vertical-align: top;
    display: table-cell;
    }

    .inbox-wrapper .email-content .email-list .email-list-item .email-list-actions .form-check {
    margin-bottom: 0;
    }

    .inbox-wrapper .email-content .email-list .email-list-item .email-list-actions .form-check i::before {
    width: 15px;
    height: 15px;
    }

    .inbox-wrapper .email-content .email-list .email-list-item .email-list-actions .form-check i::after {
    font-size: .8rem;
    }

    .inbox-wrapper .email-content .email-list .email-list-item .email-list-actions .favorite {
    display: block;
    padding-left: 1px;
    line-height: 15px;
    }

    .inbox-wrapper .email-content .email-list .email-list-item .email-list-actions .favorite span svg {
    width: 14px;
    color: #686868;
    }

    .inbox-wrapper .email-content .email-list .email-list-item .email-list-actions .favorite:hover span {
    color: #8d8d8d;
    }

    .inbox-wrapper .email-content .email-list .email-list-item .email-list-actions .favorite.active span svg {
    color: #fbbc06;
    }

    .inbox-wrapper .email-content .email-list .email-list-item .email-list-detail {
    display: -webkit-flex;
    display: flex;
    -webkit-justify-content: space-between;
    justify-content: space-between;
    -webkit-flex-grow: 1;
    flex-grow: 1;
    -webkit-flex-wrap: wrap;
    flex-wrap: wrap;
    }

    .inbox-wrapper .email-content .email-list .email-list-item .email-list-detail .from {
    display: block;
    font-weight: 400;
    margin: 0 0 1px 0;
    color: #000;
    }

    .inbox-wrapper .email-content .email-list .email-list-item .email-list-detail .msg {
    margin: 0;
    color: #71738d;
    font-size: .8rem;
    }

    .inbox-wrapper .email-content .email-list .email-list-item .email-list-detail .date {
    color: #000;
    }

    .inbox-wrapper .email-content .email-list .email-list-item .email-list-detail .date .icon svg {
    width: 14px;
    margin-right: 7px;
    color: #3d405c;
    }

    .inbox-wrapper .email-content .email-list .email-list-item.email-list-item--unread {
    background-color: rgba(114, 124, 245, 0.09);
    }

    .inbox-wrapper .email-content .email-list .email-list-item.email-list-item--unread .from {
    color: #000;
    font-weight: 800;
    }

    .inbox-wrapper .email-content .email-list .email-list-item.email-list-item--unread .msg {
    font-weight: 700;
    color: #686868;
    }

    .rtl .inbox-wrapper .email-aside .aside-content .aside-header .navbar-toggle .icon {
    position: absolute;
    top: 0;
    left: 0;
    }

    .rtl .inbox-wrapper .email-aside .aside-content .aside-nav .nav {
    padding-right: 0;
    }

    .rtl .inbox-wrapper .email-aside .aside-content .aside-nav .nav li a .icon svg {
    margin-right: 0;
    margin-left: 10px;
    }

    .rtl .inbox-wrapper .email-aside .aside-content .aside-nav .nav li a .badge {
    margin-left: 0;
    margin-right: auto;
    }

    .rtl .inbox-wrapper .email-aside .aside-content .aside-nav .nav li a svg {
    margin-right: 0;
    margin-left: 10px;
    }

    .rtl .inbox-wrapper .email-content .email-inbox-header .email-title svg {
    margin-right: 0;
    margin-left: 10px;
    }

    .rtl .inbox-wrapper .email-content .email-inbox-header .email-title .new-messages {
    margin-left: 0;
    margin-right: 3px;
    }

    .rtl .inbox-wrapper .email-content .email-filters .email-pagination-indicator {
    margin-right: 0;
    margin-left: 13px;
    }

    .rtl .inbox-wrapper .email-content .email-list .email-list-item .email-list-detail .date .icon svg {
    margin-right: 0;
    margin-left: 7px;
    }

    .email-head {
    background-color: transparent;
    }

    .email-head-subject {
    padding: 25px 25px;
    border-bottom: 1px solid #e8ebf1;
    }

    @media (max-width: 767px) {
    .email-head-subject {
    padding: 25px 10px;
    }
    }

    .email-head-subject .title {
    display: block;
    font-size: .99rem;
    }

    .email-head-subject .title a.active .icon {
    color: #fbbc06;
    }

    .email-head-subject .title a .icon {
    color: silver;
    margin-right: 6px;
    }

    .email-head-subject .title a .icon svg {
    width: 18px;
    }

    .email-head-subject .icons {
    font-size: 14px;
    float: right;
    }

    .email-head-subject .icons .icon {
    color: #000;
    margin-left: 12px;
    }

    .email-head-subject .icons .icon svg {
    width: 18px;
    }

    .email-head-sender {
    padding: 13px 25px;
    }

    @media (max-width: 767px) {
    .email-head-sender {
    padding: 25px 10px;
    }
    }

    .email-head-sender .avatar {
    float: left;
    margin-right: 10px;
    }

    .email-head-sender .date {
    float: right;
    font-size: 12px;
    }

    .email-head-sender .avatar {
    float: left;
    margin-right: 10px;
    }

    .email-head-sender .avatar img {
    width: 36px;
    }

    .email-head-sender .sender > a {
    color: #000;
    }

    .email-head-sender .sender span {
    margin-right: 5px;
    margin-left: 5px;
    }

    .email-head-sender .sender .actions {
    display: inline-block;
    position: relative;
    }

    .email-head-sender .sender .actions .icon {
    color: #686868;
    margin-left: 7px;
    }

    .email-head-sender .sender .actions .icon svg {
    width: 18px;
    }

    .email-body {
    background-color: transparent;
    border-top: 1px solid #e8ebf1;
    padding: 30px 28px;
    }

    @media (max-width: 767px) {
    .email-body {
    padding: 30px 10px;
    }
    }

    .email-attachments {
    background-color: transparent;
    padding: 25px 28px 5px;
    border-top: 1px solid #e8ebf1;
    }

    @media (max-width: 767px) {
    .email-attachments {
    padding: 25px 10px 0;
    }
    }

    .email-attachments .title {
    display: block;
    font-weight: 500;
    }

    .email-attachments .title span {
    font-weight: 400;
    }

    .email-attachments ul {
    list-style: none;
    margin: 15px 0 0;
    padding: 0;
    }

    .email-attachments ul > li {
    margin-bottom: 5px;
    }

    .email-attachments ul > li:last-child {
    margin-bottom: 0;
    }

    .email-attachments ul > li a {
    color: #000;
    }

    .email-attachments ul > li a svg {
    width: 18px;
    color: #686868;
    }

    .email-attachments ul > li .icon {
    color: #737373;
    margin-right: 2px;
    }

    .email-attachments ul > li span {
    font-weight: 400;
    }

    .rtl .email-head-subject .title a .icon {
    margin-right: 0;
    margin-left: 6px;
    }

    .rtl .email-head-subject .icons .icon {
    margin-left: 0;
    margin-right: 12px;
    }

    .rtl .email-head-sender .avatar {
    margin-right: 0;
    margin-left: 10px;
    }

    .rtl .email-head-sender .sender .actions .icon {
    margin-left: 0;
    margin-right: 7px;
    }

    .email-head-title {
    padding: 15px;
    border-bottom: 1px solid #e8ebf1;
    font-weight: 400;
    color: #3d405c;
    font-size: .99rem;
    }

    .email-head-title .icon {
    color: #696969;
    margin-right: 12px;
    vertical-align: middle;
    line-height: 31px;
    position: relative;
    top: -1px;
    float: left;
    font-size: 1.538rem;
    }

    .email-compose-fields {
    background-color: transparent;
    padding: 20px 15px;
    }

    .email-compose-fields .select2-container--default .select2-selection--multiple .select2-selection__rendered {
    margin: -2px -14px;
    }

    .email-compose-fields .select2-container--default .select2-selection--multiple .select2-selection__rendered .select2-selection__choice {
    border-radius: 0;
    background: #727cf5;
    color: #ffffff;
    margin-top: 0px;
    padding: 4px 10px;
    font-size: 13px;
    border: 0;
    }

    .email-compose-fields .select2-container--default .select2-selection--multiple .select2-selection__rendered .select2-selection__choice span {
    color: #ffffff;
    }

    .email-compose-fields .select2-container--default .select2-selection--multiple .select2-selection__rendered .select2-search {
    line-height: 15px;
    }

    .form-group.row {
    margin-bottom: 0;
    padding: 12px 0;
    }

    .form-group.row label {
    white-space: nowrap;
    }

    .email-compose-fields label {
    padding-top: 6px;
    }

    .email.editor {
    background-color: transparent;
    }

    .email.editor .editor-statusbar {
    display: none;
    }

    .email.action-send {
    padding: 8px 0px 0;
    }

    .btn-space {
    margin-right: 5px;
    margin-bottom: 5px;
    }

    .breadcrumb {
    margin: 0;
    background-color: transparent;
    }

    .rtl .email-compose-fields .select2-container--default .select2-selection--multiple .select2-selection__rendered .select2-selection__choice {
    float: right;
    }

    .rtl .btn-space {
    margin-right: 0;
    margin-left: 5px;
    }
    .card {
    box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
    -webkit-box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
    -moz-box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
    -ms-box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
    }
    .card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #f2f4f9;
    border-radius: 0.25rem;
    }
    .badge {
    padding: 6px 5px 3px;
    }
    .text-white {
    color: #ffffff !important;
    }
    .font-weight-bold {
    font-weight: 700 !important;
    }
    .float-right {
    float: right !important;
    }
    .badge-danger-muted {
    color: #212529;
    background-color: #f77eb9;
    }

    </style>

<aside class="lg-side">
    <div class="inbox-head">
        <h3>Detail</h3>
        <form action="#" class="pull-right position">
            <div class="input-append">
                <input type="text" class="sr-input" placeholder="Search Mail">
                <button class="btn sr-btn" type="button"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
    <div class="inbox-body">
       <div class="mail-option">

       <div class="col-lg-9 email-content">
          <div class="email-head">



            <div class="email-head-sender d-flex align-items-center justify-content-between flex-wrap">
              <div class="d-flex align-items-center">
                <div class="avatar">
                  <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Avatar" class="rounded-circle user-avatar-md">
                </div>
                @foreach ($arr as $r)

                @if($r->id==$id)

                <div class="sender d-flex align-items-center">
                  <a href="#">{{$r->sender->emailAddress->address}}</a>
                  <div class="actions dropdown">
                    <a class="icon" href="#" data-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
                  </div>
                </div>
              </div>
              <div class="date">{{$r->receivedDateTime}}</div>
            </div>
          </div>
          <?php $body= $r->body->content;  ?>
          <div class="email-body">
            <p>{{$r->subject}}</p>
            <br>
            {{-- <p>{{strip_tags($body)}}</p> --}}

          </div>

          </div>

       </div>

       @if (\Session::has('success'))
       <div class="alert alert-success">
           <ul>
               <li>{!! \Session::get('success') !!}</li>
           </ul>
       </div>
   @endif
   
          <form method="post">
            @csrf
            <div class="form-group">
              <label for="exampleFormControlInput1">Reply To</label>
              <input type="email" class="form-control  @error('email') is-invalid @enderror " id="exampleFormControlInput1" name="email" value="{{$r->sender->emailAddress->address}}">
              @error('email')
              <span style="color:red">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
              <label for="exampleFormControlTextarea1">Enter Message</label>
              <textarea class="form-control  @error('message') is-invalid @enderror " name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
              @error('message')
              <span style="color:red">{{ $message }}</span>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Send </button>
          </form>
        </div>
        @endif
        @endforeach
      </div>


    </div>
  </div>
</div>
</div>
</div>
    </div>
</aside>
</div>
</div>


