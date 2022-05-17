<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />


</head>
<body>
    <div class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
        <div class="container">
        <h1 class="navbar-brand">Manage Articles</h1>
         
   
         <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav ms-auto">
                      
          <li class="nav-item">
          <a class="nav-link" href="{{url('/newses')}}">Daily News</a>
          </li>
      </ul>
        </div>
            
        
     </div>
     </div>
                            
        
       <div class="container">
        <table class="table table-striped table-bordered">
            <tr>
                <th>ID</th>
                <th>Title</th>
                
                <th>Content</th>
                <th>Date</th>
                <th>User ID</th>
                <th></th>
            </tr>
            @foreach($articles as $article)
            <tr>
                <td>{{$article->id}}</td>
                <td>{{$article->title}}</td>
                <td>{{$article->body}}</td>
                <td>{{$article->created_at->diffForHumans()}}</td>
                <td>{{$article->user_id}}</td>
                <td><a class="btn btn-sm btn-outline-danger" href="{{url('/admins/adminDelete',$article->id)}}">Delete</a></td>
            </tr>
            @endforeach
        </table>
</div>

</body>
</html>