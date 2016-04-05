@extends('layout.master')

@section('title')
  {{ $page }}
@stop

@section('header')

@stop

@section('container')
  @if (Session::has('content'))
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eligendi, facilis fugit doloremque, dolorum dicta laudantium doloribus nisi earum ea excepturi numquam adipisci laborum architecto ipsum illo quibusdam itaque eveniet accusantium molestias magni harum. Recusandae vero dolorem aut quas perspiciatis est distinctio dolorum at dignissimos velit molestias dolore nulla temporibus optio id, quo voluptate illo adipisci dicta sit voluptatibus nostrum, voluptatem error placeat. Libero sint magnam illo animi aperiam est omnis commodi, sequi dolorem blanditiis sunt soluta officiis atque reiciendis, repellat, ipsa illum vel! Atque similique, dolorem. Totam iste consequuntur optio provident animi minima repellendus nisi eos! Saepe quisquam assumenda impedit similique dolorem ipsum pariatur maxime iste vel explicabo, quis tempore ut suscipit sit. Itaque beatae pariatur placeat corporis, exercitationem enim nulla ea.
  @endif
@stop

@section('footer')

  @if (Session::has('footer'))
    @include ('include.footer.' . Session::get('footer'))
  @endif

  @include ('include.shell')
@stop

@section('script')

@stop