
            function validate() {
                // check if data is correct
                var obj = document.getElementById("txtInput");
//                if(obj.value === "")
                if (!validatePhone(obj.value)) {
//                    alert("no text");
                    showStatus("Please enter a valid phone number")
                }
                else{
                    showStatus("Valid phone number")
                }
            }
            
            function showStatus(msg){
                var objDivStatus = document.getElementById("divStatus");
                objDivStatus.innerHTML=msg;
            }
            
            function validatePhone(str){
                var rePhone = new RegExp("02[0-9]{8}");
                if(rePhone.test(str)){
                   return true;
                }else{
                   return false;
                }
            }
