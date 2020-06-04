@include ('admin.layouts.header')
@include ('admin.layouts.sidebar')

<div class="grid_10">
            <div style="height: 900px" class="box round first grid">
      <a href="{{URL::to('invoicelist')}}"><span class="btn btn-dark">All Invoice</span></a>
          <h2 style="text-align: center;">Add Invoice</h2>
               <div class="block ">
                 <form action="{{Route('invoiceinsert')}}" method="post">
                   @csrf
                    <table class="form">
                  <tr>
                    <td>
                      <label>Patient ID</label>
                    </td>
                  <td>
          <select  name="patient_id">
          <option>Select patient name</option>
  @foreach($patient_code as $patient)
          
          <option value="{{$patient->id}}">
            {{$patient->patient_code}} ({{$patient->name}})
          </option>
          @endforeach
        </select>
                  </td>
                
                  <td>
                    <label>Name (if not patient)</label>
                  </td>
                <td>
                  <input type="text" name="p_name" required="required"/>
              </td>
                </tr>
                <tr>
                  <td>
                  <label>Search Medicine</label>
                </td>
                <td>
                <select id="obj_medicine" name="medicine">
            <option>select option</option>
  @foreach($m_list as $medicine)
          <option value="{{$medicine->price}}">
            {{$medicine->name}}
          </option>
          @endforeach
        </select>
                </td>
                </tr>

                  </table>
          
        <div style="width: 100%;float: left;">
  <table  class="table table-striped">
    <thead>
      <tr class="bg-primary">
        <th width="10%"></th>
    <th width="20%">Medicine Name</th>
    <th width="20%">Quantity</th>
    
    <th width="20%" style="padding-left: 21px">price</th>
      </tr>
    </thead>
    <tbody id="medicine_area">

    </tbody>
    <tfoot>
      
  
       </tfoot>
      </table>
      <table  class="table table-striped">
        <tbody>
        <tr class="bg-info">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <th class="text-right">Total</th> 
        <td>
      <input type="text" class="form-control" placeholder="0" id="usr" name="total">
    </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        
        <td></td>
        <th class="text-right">vat</th>
        
        <td>
          <div class="input-group">
           <div class="input-group-addon">%</div>
           <input type="text" class="form-control" name="vat" value="0">
         </div>
        </td>
        <td>
      <input type="text" class="form-control" placeholder="0" id="usr" name="vat">
    </td>
      </tr>

      <tr>
        <td></td>
        <td></td>
        <td></td>

        <th class="text-right">Discount</th>
        
        <td>
          <div class="input-group">
           <div class="input-group-addon">%</div>
           <input type="text" class="form-control" name="discount" value="0">
         </div>
        </td>
        <td>
      <input type="text" class="form-control" placeholder="0" id="usr" name="total">
    </td>
      </tr>  

      <tr class="bg-success">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <th class="text-right">Grand Total</th>
        
        <th>  
           <input type="text" class="form-control" name="grand_total" value="0">
        </th>
        
      </tr> 
       <tr class="bg-info">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <th class="text-right">Paid</th>
        
        <th>  
           <input type="text" class="form-control" name="paid" value="0">
        </th>
        
      </tr>
      <tr class="bg-success">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <th class="text-right">Due</th>
        
        <th>  
           <input type="text" class="form-control" name="due" value="0">
        </th>
        
      </tr> 
        </tbody>
      </table>
</div>

    <!-- <div class="row">
      <div class="col-sm bg-success">Medicine Name</div>
      <div class="col-sm bg-warning">Quantity</div>
      <div class="col-sm bg-success">Price</div>
    </div>
    <div style="background-color:#5fffff" class="row">
      <div class="col-sm">

      </div> -->
      <!-- <div class="col-sm">
        <label style="float:right">Total</label>
      </div>
      <div class="col-sm">
        <input type="text" class="form-control" placeholder="0" id="usr" name="total">
      </div> -->
  
    <!-- <div class="row">
      <div class="col-sm">
      <input type="text"/>

    </div>
    <div style="margin-top:5px" class="col-sm">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label style="padding:3px">Vat:</label>
          <span class="input-group-text">%</span>
        </div>
        <input type="text" class="form-control" placeholder="0" id="usr" name="vat">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label style="padding:3px">Discount:</label>
          <span class="input-group-text">%</span>
        </div>
        <input type="text" class="form-control" placeholder="0" id="usr" name="discount">
      </div>
  </div>
  <div style="margin-top:5px" class="col-sm">
  <input type="text" class="form-control" placeholder="0" id="usr" name="vat"><br>
  <input type="text" class="form-control" placeholder="0" id="usr" name="discount">
</div>
    </div>
    <div style="background-color:#f3f4f5" class="row">
      <div class="col-sm">

      </div>
      <div class="col-sm">
        <label style="float:right">Grand Total</label>
      </div>
      <div class="col-sm">
        <input type="text" class="form-control" placeholder="0" id="usr" name="grand_total">
      </div>
  </div>
  <div style="background-color:#5eeded" class="row">
    <div class="col-sm">

    </div>
    <div class="col-sm">
      <label style="float:right">Paid</label>
    </div>
    <div class="col-sm">
      <input type="text" class="form-control" placeholder="0" id="usr" name="paid">
    </div>
</div>
<div style="background-color:#fff" class="row">
  <div class="col-sm">

  </div>
  <div class="col-sm">
    <label style="float:right">Due</label>
  </div>
  <div class="col-sm">
    <input type="text" class="form-control" placeholder="0" id="usr" name="due">
  </div>
</div> -->
</div>
<hr>
<div class="form-check-inline">
<label>Status</label>
</div>
<div class="form-check-inline">
      <label class="form-check-label" for="radio1">
        <input type="radio" class="form-check-input" id="radio1" name="status" value="1" checked>Active
      </label>
    </div>

<div class="form-check-inline">
<label class="form-check-label" for="radio2">
<input type="radio" class="form-check-input" id="radio2" name="status" value="0">Inactive
</label>
</div>
<div style="float:right" class="">
<input type="submit" name="submit" Value="submit" class="btn btn-success"/>
<input type="reset" name="reset" Value="Reset" class="btn btn-success"/>
</div>
                  </form>
                </div>
            </div>
        </div>

 <script>
   //for medicine

$( document ).ready(function(){
    $('#obj_medicine').change(function(){
      var id = $(this).val();
      var name = $(this).find(':selected').text();
      
      var tr = "<tr>"+
      
     "<td><button type='button' class='remove_medicine btn btn-danger'>X</button></td>"+
     "<td>"+name+" <input class='form-control' type='hidden'  name='medicine_id' value='"+name+"'/></td>"+
     "<td><input class='form-control' value='1' placeholder='0' name='quantity' type='number'/></td>"+
     "<td><input class='form-control' type='' name='price' value='"+id+"'/></td>"+
   "</tr>";


   $('#medicine_area').append(tr);
$('.remove_medicine').click(function(){
  $(this).parent().parent().remove();
})
});

});

 </script>       
@include ('admin.layouts.footer')
