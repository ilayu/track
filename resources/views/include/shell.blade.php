<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <form action="{{ route('shell') }}" method="POST" role="form">

      <input type="hidden" name="page" id="inputName" class="form-control" value="{{ $p->name }}">

      <div class="input-group">
        <input type="text" class="form-control" placeholder="..." autofocus name="item">
        <span class="input-group-btn">
          <button class="btn btn-default" type="submit">Go!</button>
        </span>
      </div>

      <input type="hidden" name="_token" id="input_token" class="form-control" value="{{ Session::token() }}">

    </form>
  </div>
</div>