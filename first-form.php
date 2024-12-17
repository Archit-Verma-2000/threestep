<!--First form-->
<div class="form-container" id="form-container1">
    <div id="resform1">
        <div class="alert alert-danger">
            <button id="cancelform1" class="btn btn-sm"><span style="font-size:1.5rem">&times</span></button>
            <div id="msgform1" style="display:inline-block">

            </div>
        </div>
    </div>
    <form id="form1">
      <div class="form-group">
        <label for="InputName">Name</label>
        <input type="text" class="form-control" id="InputName" aria-describedby="emailHelp" placeholder="Name" name="txtname">
        <small id="errInputName"></small>
    </div>
      
      <div class="form-group">
        <label for="exampleInputPassword1">Email</label>
        <input type="email" class="form-control" id="InputEmail" placeholder="Email" name="txtemail">
        <small id="errInputEmail"></small>
      </div>
      <button type="submit" class="btn btn-primary" id="btnstep2">Step 2</button>
    </form>
  </div>
  <!--First form ends-->