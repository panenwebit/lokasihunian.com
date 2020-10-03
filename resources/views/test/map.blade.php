<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Map</title>
    <style>
        /* Set the size of the div element that contains the map */
        #map {
            height: 400px;  /* The height is 400 pixels */
            width: 100%;  /* The width is the width of the web page */
        }
    </style>
</head>
<body>
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div style="overflow:hidden;resize:none;max-width:100%;width:80vw;height:80vh;">
        <div style="height:100%; width:100%;max-width:100%;">
            <iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=-7.2690805,112.8040827&key=AIzaSyDY7KXDCH8pYaoOycJTAkhER2f-QzCRgI8"></iframe>
        </div>
    </div>
</body>
</html>