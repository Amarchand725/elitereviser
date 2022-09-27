<table class="table">
  <tr>
    <th>Order No</th>
    <td>{{ $details->order_number }}</td>
    <th>Order Type</th>
    <td>{{ $details->order_type }}</td>
  </tr>
  <tr>
    <th>Order Date</th>
    <td>{{ $details->order_date }}</td>
    <th>Order Status</th>
    <td>{{ $details->order_status }}</td>
  </tr>
  <tr>
    <th>Service</th>
    <td>{{ $details->hasOrderDetails->hasMainService->title }}</td>
    <th>Sub Service</th>
    <td>{{ $details->hasOrderDetails->hasSubService->title }}</td>
  </tr>
  @if(!empty($details->hasOrderDetails->total_words))
    <tr>
      <th>Service Type</th>
      <td>{{ $details->hasOrderDetails->service_type }}</td>
      <th>Turnarround Time</th>
      <td>{{ $details->hasOrderDetails->trunarround_time }} Hours</td>
    </tr>
  @endif
  <tr>
    @if(!empty($details->hasOrderDetails->total_words))
      <th>Total Words</th>
      <td>{{ $details->hasOrderDetails->total_words }} Words</td>
    @else
      <th>Total Pages</th>
      <td>{{ $details->hasOrderDetails->total_pages }} Pages</td>
    @endif
    <th>Currency</th>
    <td>{{ $details->hasOrderDetails->currency }}</td>
  </tr>
  <tr>
    <th colspan="5"><b>Payment Details</b></th>
  </tr>
  <tr>
    <th>Name on card</th>
    <td>{{ $details->hasPayment->name_on_card }}</td>
    <th>Transaction Status</th>
    <td>{{ $details->hasPayment->transaction_status }}</td>
  </tr>
  <tr>
    <th>Paid Amount</th>
    <td>${{ number_format($details->total_amount, 2) }}</td>
    <th>Paid Date</th>
    <td>{{ $details->order_date }}</td>
  </tr>
</table>
