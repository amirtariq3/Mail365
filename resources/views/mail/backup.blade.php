<link href=" {{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<script src="{{asset('public/frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
<head>
<script src="https://kit.fontawesome.com/03a42f3c57.js" crossorigin="anonymous"></script>
</head>
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










.dropbtn {
/* margin: 0 0 0 23px; */
padding: 5px 10px 5px 10px;
/* background-color: #00a8b3; */
color: black;
/* padding: 5px; */
font-size: 16px;
border: none;
}

.dropdown {
position: relative;
display: inline-block;
}

.dropdown-content {
display: none;
position: absolute;
background-color: #f1f1f1;
min-width: 160px;
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
z-index: 1;
}

.dropdown-content a {
color: black;
padding: 12px 16px;
text-decoration: none;
display: block;
/* margin: 0 0 0 23px; */
/* background-color: #41cac0; */
}

.dropdown-content a:hover {background-color: #41cac0;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #41cac0;}


.dropbtn1 {
/* margin: 0 0 0 23px; */
padding: 5px 10px 5px 10px;
/* background-color: #00a8b3; */
color: Black;
/* padding: 5px; */
font-size: 16px;
border: none;
}

.dropdown1 {
position: relative;
display: inline-block;
}

.dropdown-content1 {
display: none;
position: absolute;
background-color: #f1f1f1;
min-width: 160px;
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
z-index: 1;
}

.dropdown-content1 a {
color: black;
padding: 12px 16px;
text-decoration: none;
display: block;
/* margin: 0 0 0 23px; */
/* background-color: #41cac0; */
}

.dropdown-content1 a:hover {background-color: #41cac0;}

.dropdown1:hover .dropdown-content1 {display: block;}

.dropdown1:hover .dropbtn1 {background-color: #41cac0;}

</style>
<!------ Include the above in your HEAD tag ---------->


<?php
$data=category()
?>
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
<a href="{{route('compose', [$token])}}" title="Compose"    class="btn btn-compose">
Compose
</a>
<!-- Modal -->


@foreach ($arr2 as $r)
<ul class="inbox-nav inbox-divider">



<li class="active">
<a href="{{ url('/'.$r->displayName.'/'. $token .'/'. $r->parentFolderId .'')}}"><i class="fa fa-inbox"></i> {{$r->displayName}} </a>
</li>
@endforeach
<ul class="inbox-nav inbox-divider">
    <li class="active"><a href="{{ url('/send-items/'. $token .'/'. $r->parentFolderId .'')}}"><i class="fa fa-inbox"></i> Send Item </a>
                      
    </li>
</ul>

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
<aside class="lg-side">
<div class="row">
<div class="col-md-12 inbox-head">


@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">
{{ Session::get('message') }}</p>
@endif
<div class=" float-left">
<h6>Inbox</h6>

<form action="{{route('search_category')}}" class="pull-right position" method="POST">
@csrf
<div class="input-append">
<input type="text" class="sr-input" name="name" placeholder="Search Category">

<button class="btn btn-primary" type="submit" style="background-color: #00a8b3 !important; border:none"><i class="fa fa-search">Search</i></button>
</div>
</form>

<a href="{{route('allread')}}" class="btn btn-danger" >Mark all Read</a>
</div>

<div class=" float-right">

<h6> Category</h6>
<form action="{{route('search_category')}}" class="pull-right position" method="POST">
@csrf
<div class="input-append">
<select class="form-control form-select" aria-label="Default select example" name="category">
<option selected>Search Category</option>
@foreach($data as $cat)

<option value="{{$cat['displayName']}}">{{$cat['displayName']}}</option>
@endforeach

    <select  class="selectpicker" multiple="multiple" name="cat[]" id="cat" class="form-control input dynamic" >
    
    <?php 
    
    
    if(isset($data))
    {
        $categories=$inbox_mail->categories;
        $category_list=[];
        if(isset($categories))
        { 
            
            foreach($categories as $count=>$category)
            {
                foreach($data as $key => $value)
                {	
                    if($category==$value['displayName'])
                    {
                        echo '<option selected value="'.$value['displayName'].'">'.$category.'</option>';
                        // echo htmlentities("<a href='#'>a</a>").htmlentities("<br>");
                        $category_list[$count]=$category;
                       
                       
                    }
                    
                }
            }
            
            foreach($data as $c=>$v)
            {
                if(isset($category_list[$c]) && $category_list[$c]==$v['displayName'])
                {     
                }
                else

<<<<<<< HEAD
</select><button class="btn btn-primary mt-2" type="submit" style="background-color: #00a8b3 !important; border:none">Search</button>



</div>
</form>
</div>

<div class=" float-right">

<h6> Filter</h6>
<form action="{{route('filter')}}" class="pull-right position" method="POST">
@csrf
<div class="input-append">
<select class="form-control form-select" aria-label="Default select example" name="filter">
<option selected>Search</option>


<option value="Unread">Unread</option>
<option value="Flagged">Flagged</option>
<option value="Mentions">Mentions</option>
<option value="Attachment">Attachment</option>
<option value="To me">To me</option>




</select><button class="btn btn-primary mt-2" type="submit" style="background-color: #00a8b3 !important; border:none">Search</button>

=======
                {
                    echo '<option value="'.$v['displayName'].'">'.$v['displayName'].'</option>';
                    
                }
            }
        }
        else
        {
            foreach($data as $key => $value)
            {	
                echo '<option value="'.$value['displayName'].'">'.$data[$key]['displayName'].'</option>';
                
            }
        }
    }
    
    ?>
    </select>
    
    <button type="submit" class="dropdown-item"  >
    Select Category
    </button>
    </div>
    </form>
</div>
>>>>>>> 6ddc65678161d8d4428eae57669282b1fffb8772

<div class="form-group">
    <form action="#" method="POST" >
    @csrf
    <div class="dropdown-item">
       
   

<<<<<<< HEAD
</div>
</form>
</div>
</div>
</div>

<table class="table table-inbox table-hover">
@if (\Session::has('success'))
<div class="alert alert-success">
<ul>
<li>{!! \Session::get('success') !!}</li>
</ul>
</div>
@endif
<tbody>


<?php
$focused=[];
$other=[];
$counter_focused=0;
$counter_other=0;
foreach($arr1 as $inbox_mail)
{
if($inbox_mail->inferenceClassification=="other")
{
    $other[$counter_other]=$inbox_mail;
    $counter_other++;
}
elseif($inbox_mail->inferenceClassification=="focused")
{
    $focused[$counter_focused]=$inbox_mail;
    $counter_focused++;
}
}
$f=sizeof($focused);
$o=sizeof($other);

$extra=0;
$pinned_arr=[];

foreach($focused as $key=>$value)
{
$pinned_arr[$key]=$focused[$key];
}

foreach($other as $key=>$value)
{
$pinned_arr[$f+$extra]=$other[$key];
$extra++;
}

?>

@foreach ($arr1 as $k=>$inbox_mail)
<tr class="unread">
<td onhover="viewicons()" class="jumbotron" id="subject {{$inbox_mail->id}}"  >


<a href="{{ url('/detail/ ' . $token . '/' . $pinned_arr[$k]->id .'')}}">{{$pinned_arr[$k]->sender->emailAddress->name}}</a>



@if ($inbox_mail->categories)
<a href="{{route('unassign', [$inbox_mail->id])}}" >(del)</a>
@endif 

<ul>
<li>
<div class="dropdown">
<button class="dropbtn">Move</button>

<div class="dropdown-content">




@foreach ($arr2 as $folder)
<a class="dropdown-item" href="{{route('move', [$inbox_mail->id, $folder->id])}}"> {{$folder->displayName}}</a>
@endforeach
</div>
<button class="dropbtn">Copy</button>
{{--dd($inbox_mail)--}}
<div class="dropdown-content">




@foreach ($arr2 as $folder)
<a class="dropdown-item" href="{{route('copy', [$inbox_mail->id, $folder->id])}}"> {{$folder->displayName}}</a>
@endforeach
</div>
</div>
</li>
<li>

<div class="dropdown1">
<button class="dropbtn1">Category</button>
<div class="dropdown-content1">

<form action="{{route('assign', [$inbox_mail->id])}}" method="POST" >
@csrf

<div class="dropdown-item">
<select  multiple name="cat[]" id="cat"  data-show-subtext="true" data-live-search="true">
<?php 
if(isset($data))
{
$categories=$inbox_mail->categories;
$category_list=[];
if(isset($categories))
{ 
    foreach($categories as $count=>$category)
    {
        foreach($data as $key => $value)
        {	
            if($category==$value['displayName'])
            {
                echo '<option selected value="'.$value['displayName'].'">'.$category.'</option>';
                $category_list[$count]=$category;
            }
            
        }
    }
    foreach($data as $c=>$v)
    {
        if(isset($category_list[$c]) && $category_list[$c]==$v['displayName'])
        {
            
        }
        else
        {
            echo '<option value="'.$v['displayName'].'">'.$v['displayName'].'</option>';
        }
    }
}
else
{
    foreach($data as $key => $value)
    {	
        echo '<option value="'.$value['displayName'].'">'.$data[$key]['displayName'].'</option>';
    }
}
}
?>
</select>
<input  type="submit" name="Select Category" value="Select Category" >
</div>

</form>    

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong11">
Add Category
</button>
{{-- @if ($inbox_mail->isRead == true)
<a class="dropdown-item" href="{{route('unread', [$inbox_mail->id])}}">    Mark as Unread</a> 
@else
<a class="dropdown-item" href="{{route('read', [$inbox_mail->id])}}">    Mark as Read</a>
@endif --}}
</div>
</div>
</li>
</ul>
<div class="icons">

@if($inbox_mail->flag->flagStatus == "notFlagged")
<a style="color:black;" href="{{route('flag', [$inbox_mail->id])}}"><i class="far fa-flag"></i></a>
@elseif($inbox_mail->flag->flagStatus == "flagged")
<a style="color:black;" href="{{route('complete', [$inbox_mail->id])}}"><i class="fas fa-flag"></i></a>
@elseif($inbox_mail->flag->flagStatus == "complete")
<a style="color:black;" href="{{route('flag', [$inbox_mail->id])}}"><i class="fas fa-check"></i></a>
@endif



@if($inbox_mail->inferenceClassification == "focused")
<a style="color:black;" href="{{route('pin', [$inbox_mail->id])}}"><img width="6%" height="1000%" src='{{asset("public/icon/icon.PNG")}}'></a>
@elseif($inbox_mail->inferenceClassification == "other")
<a style="color:black;" href="{{route('unpin', [$inbox_mail->id])}}"><i class="fas fa-thumbtack"></i></a>
@endif

@if($inbox_mail->isRead == true)
<a style="color:black;" href="{{route('unread', [$inbox_mail->id])}}"><i class="fas fa-envelope-open"></i></a>
@elseif($inbox_mail->isRead == false)
<a style="color:black;" href="{{route('read', [$inbox_mail->id])}}"><i class="fas fa-envelope"></i></a>
@endif
<a style="color:black;" href="{{ url('/delete/ ' . $token . '/' . $inbox_mail->id .'')}}"><i class="fas fa-trash-alt"></i></a>
</div>
</td>
<td class="view-message ">
{{$inbox_mail->subject}}
</td>
{{-- <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"><a href="{{ url('/delete/ ' . $token . '/' . $inbox_mail->id .'')}}">delete</a></i></td>--}}
<td class="view-message  text-right">
{{$inbox_mail->receivedDateTime}}
</td>

</tr>
@endforeach

</tbody>
</table>
</div>
<div class="modal fade" id="exampleModalLong11" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLongTitle">Create Category</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="{{route('add_category')}}" >
@csrf
<div class="form-group">
<label for="name">Name</label>
<input type="text" name="name" class="form-control"  id="name"  placeholder="Enter Category name" required>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary">Save changes</button>
</div>
</div>
</div>
</div>
</aside>
</div>


</div>
</div>
</div>
</div>
</div>

<script>
$('.jumbotron').on('contextmenu', function(e) {
    var top = e.pageY - 10;
    var left = e.pageX - 90;
    
    $("#context-menu").css({
        display: "block",
        top: top,
        left: left
    }).addClass("show");
    return false; //blocks default Webbrowser right click menu
}).on("click", function() {
});
$("#context-menu a").on("click", function() {
    $(this).parent().removeClass("show").hide();
});
</script>
=======
    <select  class="selectpicker"  name="edit_cat[]" id="edit_cat[]" onchange="Edit_category(this)" class="form-control input dynamic" >
    
    <?php 
    
    
    if(isset($data))
    {
        echo '<option selected value="">Select Category</option>';
         foreach($data as $key => $value)
                {	
                    
                    echo '<option  value="'.$value['displayName'].'">'.$value['displayName'].'</option>';
                     
                    
                }
    }
    
    ?>
    </select>
    
    <button  type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModalCategoryEdit">
    Edit Category
    </button>
    </div>
    </form>
</div>

<div class="form-group">
    <form action="#" method="POST" >
    @csrf
    <div class="dropdown-item">
       
   

    <select  class="selectpicker" name="del_cat[]" id="del_cat[]" onchange="Delete_category(this)" class="form-control input dynamic" >
    
    <?php 
    
    
    if(isset($data))
    {
        echo '<option selected value="">Select Category</option>';
         foreach($data as $key => $value)
                {	
                    
                    echo '<option  value="'.$value['displayName'].'">'.$value['displayName'].'</option>';
                     
                    
                }
           
    }
    
    ?>
    </select>
    
    <button  type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModalCategoryDelete">
    Delete Category
    </button>
    </div>
    </form>
</div>

    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModalLong11">
    Add Category
    </button>
    {{--<a class="dropdown-item" href="{{route('add_category')}}">    Add Category</a>--}}
    {{-- @if ($inbox_mail->isRead == true)
        <a class="dropdown-item" href="{{route('unread', [$inbox_mail->id])}}">    Mark as Unread</a> 
        @else
        <a class="dropdown-item" href="{{route('read', [$inbox_mail->id])}}">    Mark as Read</a>
        @endif --}}
        </div>
        </div>
        </li>
        </ul>
        <div class="icons">
        @if($inbox_mail->flag->flagStatus == "notFlagged")
        <div class="dropdown1">
        <a class="dropbtn1" style="color:black;"  href="{{route('flag', [$inbox_mail->id])}}"><i class="far fa-flag"></i></a>
        <div class="dropdown-content1">
        <ul>
        <li>
        <a  href="{{route('flag_today', [$inbox_mail->id])}}"> Today</a>
        </li>
        <li>
        <a href="{{route('flag_tomorrow', [$inbox_mail->id])}}">Tomorrow</a>
        </li>
        <li>
        <a href="{{route('flag_this_week', [$inbox_mail->id])}}">This week</a>
        </li>
        <li>
        <a href="{{route('flag_next_week', [$inbox_mail->id])}}"> Next week</a>
        </li>
        <li>
        <a href="{{route('flag_no_date', [$inbox_mail->id])}}"> No date</a>
        </li>
        <li>
        <a href="{{route('complete', [$inbox_mail->id])}}"> Mark complete</a>
        </li>
        </ul>
        </div>
        </div>
        @elseif($inbox_mail->flag->flagStatus == "flagged")
        <div class="dropdown1">
        <a style="color:black;" href="{{route('complete', [$inbox_mail->id])}}"><i class="fas fa-flag"></i></a>
        <div class="dropdown-content1">
        <ul>
        <li>
        <a href="{{route('flag_today', [$inbox_mail->id])}}"> Today</a>
        </li>
        <li>
        <a href="{{route('flag_tomorrow', [$inbox_mail->id])}}">Tomorrow</a>
        </li>
        <li>
        <a href="{{route('flag_this_week', [$inbox_mail->id])}}">This week</a>
        </li>
        <li>
        <a href="{{route('flag_next_week', [$inbox_mail->id])}}"> Next week</a>
        </li>
        <li>
        <a href="{{route('flag_no_date', [$inbox_mail->id])}}"> No date</a>
        </li>
        <li>
        <a href="{{route('complete', [$inbox_mail->id])}}"> Mark complete</a>
        </li>
        <li>
        <a href="{{route('unflag', [$inbox_mail->id])}}"> Clear flag</a>
        </li>
        </ul>
        </div>
        </div>
        @elseif($inbox_mail->flag->flagStatus == "complete")
        <div class="dropdown1">
        <a style="color:black;" href="{{route('unflag', [$inbox_mail->id])}}"><i class="fas fa-check"></i></a>
        <div class="dropdown-content1">
        <ul>
        <li>
        <a href="{{route('flag_today', [$inbox_mail->id])}}"> Today</a>
        </li>
        <li>
        <a href="{{route('flag_tomorrow', [$inbox_mail->id])}}">Tomorrow</a>
        </li>
        <li>
        <a href="{{route('flag_this_week', [$inbox_mail->id])}}">This week</a>
        </li>
        <li>
        <a href="{{route('flag_next_week', [$inbox_mail->id])}}"> Next week</a>
        </li>
        <li>
        <a href="{{route('flag_no_date', [$inbox_mail->id])}}"> No date</a>
        </li>
        <li>
        <a href="{{route('unflag', [$inbox_mail->id])}}"> Clear complete</a>
        </li>
        </ul>
        </div>
        </div>
        @endif
        
        
        
        @if($inbox_mail->inferenceClassification == "focused")
        <a style="color:black;" href="{{route('pin', [$inbox_mail->id])}}"><img width="6%" height="1000%" src='{{asset("public/icon/icon.PNG")}}'></a>
        @elseif($inbox_mail->inferenceClassification == "other")
        <a style="color:black;" href="{{route('unpin', [$inbox_mail->id])}}"><i class="fas fa-thumbtack"></i></a>
        @endif
        
        @if($inbox_mail->isRead == true)
        <a style="color:black;" href="{{route('unread', [$inbox_mail->id])}}"><i class="fas fa-envelope-open"></i></a>
        @elseif($inbox_mail->isRead == false)
        <a style="color:black;" href="{{route('read', [$inbox_mail->id])}}"><i class="fas fa-envelope"></i></a>
        @endif
        <a style="color:black;" href="{{ url('/delete/ ' . $token . '/' . $inbox_mail->id .'')}}"><i class="fas fa-trash-alt"></i></a>
        </div>
        </td>
        <td class="view-message ">
        {{$inbox_mail->subject}}
        </td>
        {{-- <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"><a href="{{ url('/delete/ ' . $token . '/' . $inbox_mail->id .'')}}">delete</a></i></td>--}}
        <td class="view-message  text-right">
        {{$inbox_mail->receivedDateTime}}
        </td>
        
        </tr>
        @endforeach
        
        </tbody>
        </table>
        </div>

        <div class="modal fade" id="exampleModalCategoryEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form action="{{route('edit_category')}}" >
        @csrf
        <div class="form-group">
        <label for="name">Old Name</label>
        <input type="text"  value="" name="edit_category" class="form-control"  id="edit_category"  placeholder="Enter Category name" required>
        <label for="name">New Name</label>
        <input type="text"   name="edit_Category" class="form-control"  id="edit_Category"  placeholder="Enter Category name" required>
        </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit</button>
        </form>
        </div>
        </div>
        </div>
        </div>
        <div class="modal fade" id="exampleModalCategoryDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form action="{{route('delete_category')}}" >
        @csrf
        <div class="form-group">
        <label for="name">Name</label>
        <input type="text" value="" name="delete_Category" class="form-control"  id="delete_Category"  placeholder="Enter Category name" >
        </div>
         </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Delete</button>
        </form>
        </div>
        </div>
        </div>
        </div>

        <div class="modal fade" id="exampleModalLong11" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form action="{{route('add_category')}}" >
        @csrf
        <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control"  id="name"  placeholder="Enter Category name" >
        </div>
        
        
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
        </div>
        </div>
        </div>
        </aside>
        </div>
        
        
        
        
        <script>
        $('.jumbotron').on('contextmenu', function(e) {
            var top = e.pageY - 10;
            var left = e.pageX - 90;
            
            $("#context-menu").css({
                display: "block",
                top: top,
                left: left
            }).addClass("show");
            return false; //blocks default Webbrowser right click menu
        }).on("click", function() {
        });
        $("#context-menu a").on("click", function() {
            $(this).parent().removeClass("show").hide();
        });
        </script>
        <script>
            function Edit_category(thisValue)
            {
                var idx = thisValue.selectedIndex;
                var val=thisValue.options[idx].value;
                var d= document.getElementById('edit_category');
                d.value= val;
            }
            function Delete_category(thisValue)
            {
                var idx = thisValue.selectedIndex;
                var val=thisValue.options[idx].value;
                var d= document.getElementById('delete_Category');
                d.value= val;
            }
            </script>
>>>>>>> 6ddc65678161d8d4428eae57669282b1fffb8772
