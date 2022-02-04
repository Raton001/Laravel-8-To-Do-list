<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Todo List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
  </head>

  <body>
    <div id="container">
        <h1>To Do</h1>
        <form action ="{{route('stored')}}" method ="post" >
        @csrf
        <div class="input-group">
            <input type="text" class="form-control" name="content" placeholder="Add New Todo">
            <button type="submit" class="btn btn-success"> <i class="fa fa-plus"></i></button>
            </form>  
        </div> 
   

        <div class="bg-dark"> 
            @if (count($lists)) 
                    <ul class="list-group">
                        @foreach ($lists as $list)
                            <li class="list-group">
                                <form action ="{{route('destroy', $list->id)}}" method ="post">
                                    <input type="hidden" class="form-control" name="id">
                                @csrf
                                    {{$list->content}}
                                    <button type="submit" class="btn btn-danger float-end"> <i class="fa fa-trash-o"> </i></button>
                                </form>       
                            </li>       
                        @endforeach
                    </ul>
                @else
                    <p class="text-center text-white"> No Task</p>
            @endif    
        </div> 
       @if(count($lists)) 
        <div class="card-footer text-center text-secondary">
            You have {{count($lists)}} Pending To Finish
        </div>
      @endif   
  </div>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script type="text/javascript" src="main.js"></script>
  </body>

</html>