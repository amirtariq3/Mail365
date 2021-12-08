<!DOCTYPE html>
<html>
<head>
    <title>All Notification</title>
    <meta name="csrf-token" content="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
    <body>
        
            <div class="container">
            <h3 style="text-align: center;">Notificatioin List</h3><br>
                <table class="table table-bordered data-table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Designation</th>
                                                    <th>Phone</th>
                                                    <th>Company_URL</th>
                                                    <th>Contaact_URL</th>
                                                    <th>Logo</th>
                                                    <th>Contact_Image</th>
                                            
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                @foreach ($data as $i)
                                                    <tr>
                                                        <td>{{$i->id}}</td>
                                                        <td>{{$i->name}}</td>
                                                        <td>{{$i->email}}</td>
                                                        <td>{{$i->designation}}</td>
                                                        <td>{{$i->phone}}</td>
                                                        <td>{{$i->company_url}}</td>
                                                        <td>{{$i->contact_url}}</td>
                                                        <td><img src="{{asset('public/images/'.$i->company_logo)}}" /></td>
                                                        <td><img src="{{asset('public/images/'.$i->contact_image)}}" /></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                </table>
            </div>
            
    </body>
    <script>
            $(document).ready(function(){
            $('.table').DataTable({
                'info': true,
                'ordering': true,
                'searching': true,
                'select': true
               
            });
        });
    </script>

</html>