      <br>
      <br>
      <br>
      <div class="row">
      <br>
        <div class="col-3"><a href="<?=base_url?>">Login</a></div>
            <div class="col-6">
                <form class="form-signin" action="<?=base_url?>usuario/save" method="POST">                    
                    <h1 class="h3 mb-3 font-weight-normal text-center">Registrarse</h1>
                    <label for="inputNombres" >Nombres</label>
                    <br>
                    <input type="text" id="inputNombres" name="nombres" class="form-control" placeholder="Nombres" required autofocus>
                    <br>
                    <label for="inputApellidoP" >Apellido Paterno</label>
                    <br>
                    <input type="text" id="inputApellidoP" name="apellido_p" class="form-control" placeholder="Apellido Paterno" required >
                    <br>
                    <label for="inputApellidoM" >Apellido Materno</label>
                    <br>
                    <input type="text" id="inputApellidoM" name="apellido_m" class="form-control" placeholder="Apellido Materno" required >
                    <br>
                    <label for="inputEmail" >Email</label>
                    <br>
                    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required >
                    <br>
                    <label for="inputPassword">Password</label>
                    <br>
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                    <br>                
                    <br>
                    <br>

                    <button class="btn btn-lg btn-primary " type="submit">Registrar</button>
                    
                </form>

            </div>
        <div class="col-3"></div>
      </div>