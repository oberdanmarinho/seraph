<html>
  <head>
    <title>:: Area Restrita ::</title>
  </head>

  <body>
    <?php
      if ( isset( $_GET["erro"] ) ) {
        $_GET["erro"] = '<div align="center"><strong style="color : red;">'.$_GET["erro"].'</strong></div><br>';
      } else {
        $_GET["erro"] = "";
      }
    ?>
	
	<p>&nbsp;</p>

	<center>
	  <form method="post" action="restrito.php">
	    <table width="228" height="220" border="1">
          <tr bgcolor="#FFFFFF">
            <td height="23" colspan="3" bordercolor="#000000">
			  <div align="center">Entrar no Sistema</div>
			</td>
		  </tr>

	      <p>&nbsp;</p>
		  <p>&nbsp;</p>

		  <tr>
            <td height="106" colspan="3" bordercolor="#000000" bgcolor="#FFFFFF">
			  <div align="center">
			    <img src="img/user.png" width="102" height="102" />
			  </div>
			</td>
          </tr>
		  <tr bgcolor="#FFFFFF">
			<td width="69" height="23" bordercolor="#000000">
			  <div align="right">Usuario :&nbsp;</div>
			</td>
			<td colspan="2" bordercolor="#000000">
			  <label>
				<input type="text" name= "login" maxlength="50" />				
			  </label>
			</td>
          </tr>
		  <tr bgcolor="#FFFFFF">
			<td height="23" bordercolor="#000000">
			  <div align="right">Senha :&nbsp;</div>
			</td>
			<td colspan="2" bordercolor="#000000">
			  <label>
				<input type="password" name="password" maxlength="50" />
			  </label>
			</td>
		  </tr>
		  <tr bgcolor="#FFFFFF">
		    <td height="28" colspan="4" bordercolor="#000000">
			  <center>
				<label>
				  <input type="submit" value="Entrar" />
				  <input type="submit" value="Cancelar" />
				</label>
			  </center>
			</td>
		  </tr>
		  
		  <? echo $_GET["erro"]; ?>  

		</table>
      </form>
	</center>
  </body>
</html>