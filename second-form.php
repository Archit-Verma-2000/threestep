<!--Second form-->
<div class="form-container" id="form-container2">
<div id="resform2">
        <div class="alert alert-danger">
            <button id="cancelform2" class="btn btn-sm"><span style="font-size:1.5rem">&times</span></button>
            <div id="msgform2" style="display:inline-block">

            </div>
        </div>
    </div>
    <form>
      <div class="form-group">
        <label for="exampleInputEmail1">D.O.B</label>
        <input type="date" class="form-control" id="date" aria-describedby="emailHelp" placeholder="D.O.B">
        <small id="emailvalid">Date of </small>
      </div>
      
      <div class="form-group">
        <label for="exampleInputPassword1">Occupation</label>
        <select name="Occupation" id="Occupation">
            <?php
              $arr=array(101=>"student","Employed","Unemployed");
              foreach($arr as $index=>$value)
              {
            ?>
                <option value=<?=$value?>><?=$value?></option>
            <?php
              }
            ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary" id="btnstep3">Step 3</button>
    </form>
  </div>  
  <!--Second form ends-->