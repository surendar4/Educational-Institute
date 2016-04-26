/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var d = 0; d < dropdowns.length; d++) {
      var openDropdown = dropdowns[d];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

    var intervalId;

    function startImageSlideShow()
    {
        intervalId = setInterval(setImage, 3000);
    }

    function stopImageSlideShow()
    {
        clearInterval(intervalId);
    }

    function setImage()
    {
        var imageSrc = document.getElementById("image").getAttribute("src");
        var currentImageNumber = imageSrc.substring(imageSrc.lastIndexOf("/") + 1,
                                                    imageSrc.lastIndexOf("/") + 2);
        if (currentImageNumber == 7)
        {
            currentImageNumber = 0;
        }
        document.getElementById("image").setAttribute("src", 
                                          (Number(currentImageNumber) + 1) + ".jpg");
    }

function show(){
    alert("Invalid\n");
}

