@extends ('layouts.master')

@section ('content')
          <h1>Money Recieved From Different Users</h1>

          <h2>Section title</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Transaction#</th>
                  <th>Money Sent By User Name</th>
                  <th>Amount</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($transaction_details as $transdetail)
                <tr>
                  <td>{{$transdetail->id}}</td>
                  <td>{{$transdetail->transaction->user->name}}</td>
                  <td>{{$transdetail->amount}}</td>
                  <td>{{$transdetail->created_at}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>           
@endsection