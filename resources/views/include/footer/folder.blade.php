@if (Session::has('folders'))
<ul>
  @foreach (Session::get('folders') as $folder)
  <li>{{$folder->folder}}</li>
  @endforeach
</ul>
@else
<h4>No Folders</h4>
@endif