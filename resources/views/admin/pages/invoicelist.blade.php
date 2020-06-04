@include ('admin.layouts.header')
@include ('admin.layouts.sidebar')
        <div class="grid_10">
            <div style="height: 800px" class="box round first grid">
	             <a href="{{URL::to('invoiceadd')}}"><span class="btn btn-dark"> Add Invoic</span></a>
                <h2 style="text-align: center;">Invoice List</h2>
                <div class="block">
                  <table class="data display datatable" id="example">
					<thead>
            @if(Session::has('message'))
  <div data-alert class="alert-box">
       {{Session::get('message')}}
  </div>
  @endif
						<tr>
							<th>SL.NO</th>
              <th>Patient ID</th>
              <th>Doctor</th>

							<th>Action</th>
						</tr>
					</thead>
					<tbody>

           @php $i=0; @endphp
            @foreach ($invoicelist as $invoice)
              @php $i++ @endphp
						<tr class="odd gradeX">
							<td>{{ $i}}</td>
              <td>{{$invoice->patient_id}}</td>
              <td>{{$invoice->p_name}}</td>
							<td>{{$invoice->medicine}}</td>
	<td><a href="{{Route('invoiceedit')}}/{{ $invoice->id }}" >Edit</a> || <a onclick="return confirm('Are you sure to delte this row !')" href="{{Route('documentdelete')}}/{{ $invoice->id}}">Delete</a></td>
						</tr>
@endforeach
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();
	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>

@include ('admin.layouts.footer')
