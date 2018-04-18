
function changelike(myImage_like) {
 
            var ancimage = myImage_like.src;
 
            if( ancimage.substring(ancimage.lastIndexOf("/"), ancimage.length) == "/thumbs-0.png"){
                myImage_like.src= ancimage.substring(0,ancimage.lastIndexOf("/"), ancimage.length)+"/thumbs-1.png";
 
             } 
             else{
                myImage_like.src= ancimage.substring(0,ancimage.lastIndexOf("/"), ancimage.length)+"/thumbs-0.png";
             }

        }

function changecheck(myImage_check) {
 
            var ancimage = myImage_check.src;
 
            if( ancimage.substring(ancimage.lastIndexOf("/"), ancimage.length) == "/checked(1).png"){
                myImage_check.src= ancimage.substring(0,ancimage.lastIndexOf("/"), ancimage.length)+"/checked.png";
            document.location.href = 'script_event_inscription.php';
             } 
             else{
                myImage_check.src= ancimage.substring(0,ancimage.lastIndexOf("/"), ancimage.length)+"/checked(1).png";
             }
    }