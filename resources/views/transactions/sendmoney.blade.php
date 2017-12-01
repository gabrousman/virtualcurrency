@extends ('layouts.master')

@section ('content')
          <h1>Send Money to Users</h1>

 @include ('layouts.formerrors')          

<form method="POST" action="{{ route('sendmoney') }}">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Currently Money Available in your account:</label>

  <span style="color: red;">${{$usr->vc}}</span>
</div>

  <div class="form-group">
    <label for="exampleInputEmail1">Enter Amount</label>
    <input type="text" class="form-control" name="AmountPerUser" id="AmountPerUser" aria-describedby="emailHelp" placeholder="Enter Amount Per User" required="">
    <small id="emailHelp" class="form-text text-muted">Please enter amount which you want to send towards each user.</small>
  </div>
  <div class="form-group">
    <label for="exampleSelect2">Example multiple select</label>
    <select multiple class="form-control" id="UsersList" name="UsersList[]">
      @foreach ($users as $user)
      <option value="{{$user->id}}">{{$user->name}}</option>
      @endforeach
    </select>
    <small id="emailHelp" class="form-text text-muted">Please select as many users as you want.</small>
  </div>
  <button type="submit" class="btn btn-primary">Send Money</button>
</form>          
           
@endsection