<style>
		h1 {
		  height: 40px;
		  width: 100%;
		  font-size: 18px;
		  background: #5cb85c;
		  color: white;
		  line-height: 100%;
		  border-radius: 3px 3px 0 0;
		  box-shadow: 0 2px 5px 1px rgba(0, 0, 0, 0.2);
		}

		form {
		  box-sizing: border-box;
		  width: 600px;
		  height: 150px;
		  margin: -30px auto 0;
		  box-shadow: 2px 2px 5px 1px rgba(0, 0, 0, 0.2);
		  padding-bottom: 40px;
		  border-radius: 3px;
		  }
		form h1 {
		  box-sizing: border-box;
		  padding: 25px;

		}

		input {
		  margin: 15px 25px;
		  width: 300px;
		  display: block;
		  border: none;
		  padding: 10px 0px;
		  border-bottom: solid 1px #5cb85c;
		  -webkit-transition: all 0.4s cubic-bezier(0.64, 0.09, 0.08, 1);
		          transition: all 0.4s cubic-bezier(0.64, 0.09, 0.08, 1);
		  background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 96%, #1abc9c 4%);
		  background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 96%, #1abc9c 4%);
		  background-position: -300px 0;
		  background-size: 300px 100%;
		  background-repeat: no-repeat;
		  color: #5cb85c;
		}
		input:focus,input:valid {
		  box-shadow: none;
		  outline: none;
		  background-position: 0 0;
		}
		input:focus::-webkit-input-placeholder, input:valid::-webkit-input-placeholder {
		  color: #1abc9c;
		  font-size: 11px;
		  -webkit-transform: translateY(-50px);
		          transform: translateY(-50px);
		  visibility: visible !important;
		}

		button {
		  border: none;
		  background: #5cb85c;
		  border-color:#4cae4c; 
		  cursor: pointer;
		  border-radius: 3px;
		  padding: 5px;
		  width: 300px;
		  color: white;
		  margin-left: 25px;
		  box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.2);
		}
		button:hover {
		  -webkit-transform: translateY(-1px);
		      -ms-transform: translateY(-1px);
		          transform: translateY(-1px);
		  box-shadow: 0 6px 6px 0 rgba(0, 0, 0, 0.2);
		}
		 
		The magic happens in a few lines of code for the input:focus and input:valid. The CSS transform property plays a crucial role to achieve this little instant feedback effect.

		input:focus::-webkit-input-placeholder, #input:valid::-webkit-input-placeholder {
		  color:#5cb85c;
		  font-size: 15px;
		  -webkit-transform: translateY(-20px);
		          transform: translateY(-20px);
		  visibility: visible !important;
		}			
</style>
<div id="form-check">
			<form method="post" action="">
				<center>
					<h1>Confirm Your Booking</h1>
						<tr>
							<td><select name="time" style="display: none;"><option>Now</option></select></td>
						</tr>
				 
						<input style="margin-right: 0px;" name="password" placeholder="Re-Enter Your Password" type="password" required="">	
					<button type="submit" name="submit">Submit</button>
				</center>
			</form>
</div>