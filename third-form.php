 <!--Third form-->
 <div class="form-container" id="form-container3">
    <form>
      <div class="form-group">
        <label for="exampleInputEmail1">Password</label>
        <input type="password" class="form-control" id="InputPassword" aria-describedby="emailHelp" placeholder="Password">
        <small id="errPassword">
            <ul>
                <li>Minimum 8 and maximum 15 characters allowed</li>
                <li>Contains atleast 1 Uppercase</li>
                <li>Contains atleast 1 Lowercase</li>
                <li>Contains atleast 1 Special Characters</li>
            </ul>
        </small>
      </div>
      
      <div class="form-group">
        <label for="exampleInputPassword1">Confirm-Password</label>
        <input type="password" class="form-control" id="InputPassword1" placeholder="Confirm-Password">
        <small id="errRepeatPassword"><ul><li>Password doesnt match</li></ul></small>
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button type="submit" class="btn btn-primary">Register</button>
    </form>
  </div>
  <!--Third form ends-->