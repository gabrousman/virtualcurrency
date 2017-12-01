@extends ('layouts.master')

@section ('content')
          <h1>Transactions</h1>

          <h2>Section title</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Transaction#</th>
                  <th>User Name</th>
                  <th>Amount</th>
                  <th>Created At</th>
                  <th>Transaction Details</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                  <td>{{$transaction->id}}</td>
                  <td>{{$transaction->user->name}}</td>
                  <td>{{$transaction->amount}}</td>
                  <td>{{$transaction->created_at}}</td>
                  <td>
                    @foreach ($transaction->transactiondetails as $transdetail)
                      ${{$transdetail->amount}} sent to {{$transdetail->user->name}}<br />
                    @endforeach

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>           
@endsection