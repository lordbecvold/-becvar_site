<center>
    <form class="contentBox" action="?page=generator" method="post" style="height:500px;">
        <h2 class="boxTitle">AES Decrypt</h2>
        <div class="boxContent">
            <div class="result">
                <div type="text" class="result__viewbox">Decrypt your AES string ...</div>
            </div>	

            <textarea name="stringToDecryptAES" class="feedback-input" placeholder="String to decrypt"></textarea>

            <div class="input-group mb-3"> 
					<div class="input-group-prepend">
						<label class="input-group-text bg-dark" style="color: white" for="inputGroupSelect01">Method</label>
					</div>
					<select name="AESDecryptMethod" class="custom-select bg-dark" style="color: white">
						<option value="CBC" selected>CBC</option>
                        <option value="CTR">CTR</option>
                        <option value="CFB">CFB</option>
                        <option value="OFB">OFB</option>
					</select>
				</div>
            </div>

            <div class="input-group mb-3">
					<div class="input-group-prepend">
						<label class="input-group-text bg-dark" style="color: white" for="inputGroupSelect01">Bits</label>
					</div>
					<select name="AESDecryptBits" class="custom-select bg-dark" style="color: white">
						<option value="128" selected>128</option>
						<option value="192">192</option>
                        <option value="256">256</option>
					</select>
				</div>
            </div>

            <div class="input-group input-group-sm mb-3 bg-dark">
                <div class="input-group-prepend bg-dark">
                    <span class="input-group-text bg-dark" style="color:white;">Secret Key</span>
                </div>
                <input type="text" name="AESDecryptKey" class="form-control bg-dark" style="color:white;" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
            </div>

            <button class="inputButton bg-dark btn generateButton" name="submitAESDecrypt">Decrypt</button>
		</div>
	</form>
</center>