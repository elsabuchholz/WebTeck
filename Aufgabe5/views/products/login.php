<div class="panel panel-default">

   <div class="panel-heading">
      <h3 class="panel-title"><?= $data['form_header'] ?></h3>
   </div>

   <div class="panel-body">

       <form class="form-horizontal" action="<?= DIR ?>products/login" method="POST">
            <fieldset>
              <div id="legend">
              <legend class="">Login</legend>
              </div>
        <div class="control-group">
            <!-- Username -->
          <label class="control-label"  for="username">Username</label>
            <div class="controls">
            <input type="email" id="username" name="username" placeholder="deine email" class="input-xlarge">
            </div>
        </div>
          <div class="control-group">
            <!-- Password-->
             <label class="control-label" for="password">Password</label>
            <div class="controls">
            <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
            </div>
          </div>
          <div class="control-group">
            <!-- Button -->
            <label class="control-label"> </label>
            <div class="controls">
              <button class="btn btn-success">Login</button>
            </div>
          </div>
        </fieldset>
      </form>

   </div> <!-- / .panel-body -->
</div> <!-- / .panel -->