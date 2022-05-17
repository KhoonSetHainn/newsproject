@extends("layouts.app")

@section("content")
<div class="container">
   <div class="card mb-2">
       <div class="card-body">
           <h5 class="card-title">
               {{$news->title}}
           </h5>
           <div class="card-subtitle mb-2 text-muted small">
               {{$news->created_at->diffForHumans()}},
               Category: <b>{{$news->category->name}}</b>
           </div>
           <p class="card-text">
               {{$news->body}}
           </p>
           <a href="{{url("/newses/delete/$news->id")}}" class="btn btn-warning">
              Delete</a>
       </div>

   </div>

   <ul class="list-group">
        <li class="list-group-item active">
            <b>Comments ({{count($news->comments)}})

            </b>
            </li>
            @foreach($news->comments as $comment)
            <li class="list-group-item">
                <a href="{{url("/comments/delete/$comment->id")}}" class="btn-close float-end"></a>
                {{$comment->content}}
                <div class="small mt-2">
                    By <b>
                        {{$comment->user->name}}
                    </b>
                    {{$comment->created_at->diffForHumans()}}
                </div>
            </li>
            @endforeach
        
   </ul>

   @auth
   <form action="{{url('/comments/add')}}" method="post">
       @csrf
       <input type="hidden" name="news_id" value="{{$news->id}}">
       <textarea name="content" class="form-control mb-2" placeholder="New Comment"></textarea>
       <input type="submit" value="Add Comment" class="btn btn-secondary">
   </form>
   @endauth
</div>
@endsection