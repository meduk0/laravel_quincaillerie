@extends('view')

@section('title', 'result')

@section('forloop')
@isset($data)
<div class="overflow-x-auto">
  <table class="table">
    <!-- head -->
    <thead>
      <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Loisirs</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      <tr class="bg-base-200">
        <td>{{$data['name']}}</td>
        <td>{{$data['sname']}}</td>
        <td>{{$data['age']}}</td>
        <td>{{$data['genre']}}</td>
        <td>{{implode(', ',$data['loisirs'])}}</td>
      </tr>
      <tr class="bg-base-200">
        <td>{{$data['name']}}</td>
        <td>{{$data['sname']}}</td>
        <td>{{$data['age']}}</td>
        <td>{{$data['genre']}}</td>
        <td>{{implode(', ',$data['loisirs'])}}</td>
      </tr>
      <tr class="bg-base-200">
        <td>{{$data['name']}}</td>
        <td>{{$data['sname']}}</td>
        <td>{{$data['age']}}</td>
        <td>{{$data['genre']}}</td>
        <td>{{implode(', ',$data['loisirs'])}}</td>
      </tr>
    </tbody>
  </table>
</div>
  @foreach($data as $k => $v)
    @if(is_array($v))
      <li> Loisirs: 
        {{  implode(', ',$v)  }}
      </li>
    @else
      <li> {{"$k is $v"}} </li>
    @endif
  @endforeach
@endisset
@endsection
<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>
<body>
    <h1>Hello, I am your starting page</h1>
    <form action="indexed" method="post" name="mainform" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Type here" class="input input-ghost" />
        <input type="file" name="meimg" class="file-input file-input-warning" />

@session("success")
    <div class="alert alert-success mt-2">
        <p>{{Session::get("success")}}</p>
        <img src="/storage/public/images/{{Session::get("path")}}" width="400px"/>
    </div>
@endsession

        <button class="ml-auto mr-auto mt-2 block btn btn-primary" type="submit">Save</button>
    </form>
  <--<div class="chat chat-start">
  <div class="chat-image avatar">
    <div class="rounded-full" style="width:3rem">
      <img
        alt="Tailwind CSS chat bubble component"
        src="acmessage/avatars/obito.jpg"
      />
    </div>
  </div>
  <div class="chat-header">
    Obi-Wan Kenobi
    <time class="text-xs opacity-50">12:45</time>
  </div>
  <div class="chat-bubble">You were the Chosen One!</div>
  <div class="chat-footer opacity-50">Delivered</div>
</div>
<div class="chat chat-end">
  <div class="chat-image avatar">
    <div class="rounded-full" style="width:3rem">
      <img
        alt="Tailwind CSS chat bubble component"
        src="acmessage/avatars/obito.jpg"
      />
    </div>
  </div>
  <div class="chat-header">
    Anakin
    <time class="text-xs opacity-50">12:46</time>
  </div>
  <div class="chat-bubble">I hate you!</div>
  <div class="chat-footer opacity-50">Seen at 12:46</div>
</div>
<span class="loading loading-infinity loading-lg"></span>
</body>
</html>-->