<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Visiosft Todo List</title>
    <!--public file-->
    <link rel="stylesheet" href="{{asset('style.css')}}">

    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom styles for this template-->
    <!--fontawesome-->
</head>
<body id="body">
<div class="container">
    <div class="row">
        @if ($errors->any())
            <div class="validation">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="header">
            <h2 style="margin:5px">Visiosoft Todo List</h2>
            <form action="{{route('todo.add')}}" method="post" id="addUserForm">
                @csrf
            <input name="content" id="content" type="text"  placeholder="Title...">
                <button type="submit" class="addBtn">Ekle</button>
            </form>
        </div>
         @foreach($todos as $todo)
        <ul id="myUL">
            <li class="li-flex">{{$todo->content}}
                <button style="float:left;  color:blue; background:none; border:none;" type="button" class="delete" data-action="{{route('todo.delete',$todo->id)}}" data-id="{{$todo->id}}" ><i class="fa fa-trash text-danger"></i></button>
            </li>
        </ul>
        @endforeach
    </div>
</div>
<script src="todo.js"></script>
</body>
</html>
