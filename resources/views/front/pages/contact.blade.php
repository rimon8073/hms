@include ('front.layouts.header')

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7302.119724945215!2d90.35425382230133!3d23.780882556221687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0be89363e87%3A0x3795036c15355c82!2sKallyanpur%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1579465208487!5m2!1sen!2sbd" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
<div style="background-color: #45AADE; padding: 5px" class="container-fluid text-center">
<h1>CONTACT</h1>
<p style="color: #FFF">Fill in the form For Information or Emergency</p>
</div>

<div class="container">
  <div class="row" style="margin-top: 15px;background-color: lightgray;">


    <div class="col-sm-6">
    <div style="border: none;" class="card">
      <div class="card-body">
        <h5 class="card-title">Send Your Message</h5>
        <hr>
        <form action="{{Route('contactinsert')}}" method="post">
          @csrf
 		<input style="border:none;border-bottom: 1px solid black" class="form-control" type="text" placeholder="Full name" name="name" required="required"><br>
<input style="border:none;border-bottom: 1px solid black" class="form-control" type="text" placeholder="Email" name="email" required="required"><br>
<input style="border:none;border-bottom: 1px solid black" class="form-control" type="text" placeholder="subject*" name="subject"><br>

<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="customRadioInline1" name="gender" class="custom-control-input">
  <label class="custom-control-label" for="customRadioInline1">Male</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="customRadioInline2" name="gender" class="custom-control-input">
  <label class="custom-control-label" for="customRadioInline2">Female</label>
</div> <br>
<textarea name="description" style="width: 100%;height: 50%" required="required"></textarea>
<button style="float: right;" type="submit" class="btn btn-primary" name="submit" >Send</button>
</form>
      </div>
    </div>
  </div>

  <div class="col-md-6">
      <h3 style="color: #111"><b>CONTACT INFO & DETAILS</b> </h3><hr>
    <h3>Hotline: 16203</h3>
    <p>Ambulance: 018770</p>
    <p>Emegency: 018770</p>
    <p>Labratrory:015213</p>
    <p>email: info@gmail.com</p>

    <p>Dhanmondi-27,Dhaka-1207</p>
    </div>
  </div>
</div>
@include ('front.layouts.footer')
