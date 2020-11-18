<!DOCTYPE html>
<html>
    <head>
      <title>CryptoJs</title>
    </head>

  <body>
    <div>
      <h4>CryptoJs AES/ECB/Pkcs7/Base64 Encrypt and Decrypt</h4>
      <div>
        <form action="" method="GET">
          <label>Plain Text</label>
          <input type="text" name="plain" id="plain">
          <label>Encrypted</label>
          <input type="text" name="password" id="password">

          <hr>

          <label>Encrypted Text</label>
          <input type="text" name="enc" id="enc">
          <label>Decrypted</label>
          <input type="text" name="dec" id="dec">


        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->



    <!-- jQuery 2.1.3 -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/enc-base64.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/enc-utf8.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/aes.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/mode-ecb.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/pad-nopadding.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/pad-pkcs7.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#plain').on('keyup', function(e) {
                var plain = $('#plain').val(),
                    key = CryptoJS.enc.Base64.parse('NDEydmFkZGhhcjRmNGVsIQ==');

                var encrypted3 = CryptoJS.AES.encrypt(plain, key, {mode: CryptoJS.mode.ECB, padding: CryptoJS.pad.Pkcs7 }); 
                var final = encrypted3.toString();

                console.log(final);
                $('#password').val(final);
            });
        });
    </script>
    
    <script>
        $('#enc').on('keyup paste', function(e) {
          var encrypted = $('#enc').val(),
              key = CryptoJS.enc.Base64.parse('NDEydmFkZGhhcjRmNGVsIQ=='),
              cipherParams = CryptoJS.lib.CipherParams.create({
                  ciphertext: CryptoJS.enc.Base64.parse(encrypted)         
              });

          var decrypted3 = CryptoJS.AES.decrypt(cipherParams, key, {mode: CryptoJS.mode.ECB, padding: CryptoJS.pad.Pkcs7 });
          var dec = CryptoJS.enc.Utf8.stringify(decrypted3);

          console.log(dec);
          $('#dec').val(dec);
        });
    </script>

  </body>


</html>
