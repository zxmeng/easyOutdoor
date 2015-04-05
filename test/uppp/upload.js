(function () {
  var input = document.getElementById("images"),
      formdata = false;
    
  if (window.FormData) {
    formdata = new FormData();
    document.getElementById("btn").style.display = "none";
  }
  



function showUploadedItem (source) {
  var list = document.getElementById("image-list"),
      li   = document.createElement("li"),
      img  = document.createElement("img");
    img.src = source;
    li.appendChild(img);
  list.appendChild(li);
}

if (input.addEventListener) {
  input.addEventListener("change", function (evt) {
    var i = 0, len = this.files.length, img, reader, file;
    
    document.getElementById("response").innerHTML = "Uploading . . ."
    
    for ( ; i < len; i++ ) {
      file = this.files[i];
  
      if (!!file.type.match(/image.*/)) {

      } 
    }
      
  }, false);
}

if ( window.FileReader ) {
  reader = new FileReader();
  reader.onloadend = function (e) { 
    //showUploadedItem(e.target.result);
  };
  reader.readAsDataURL(file);
}
if (formdata) {
  formdata.append("images[]", file);
}

if (formdata) {
  // $.ajax({
  //   url: "upload.php",
  //   type: "POST",
  //   data: formdata,
  //   processData: false,
  //   contentType: false,
    // success: function (res) {
    //   document.getElementById("response").innerHTML = res; 
    // }
  //     var oOutput = document.getElementById("output");
  // var oData = new FormData(document.forms.namedItem("fileinfo"));
 
  //oData.append("CustomField", "This is some extra data");
 
  var oReq = new XMLHttpRequest();
  oReq.open("POST", "upload.php", true);
  oReq.onload = function(oEvent) {
    if (oReq.status == 200) {
      oOutput.innerHTML = "Uploaded!";
    } else {
      oOutput.innerHTML = "Error " + oReq.status + " occurred uploading your file.<br \/>";
    }
  };
 
  oReq.send(formdata);
  
  });
}

});