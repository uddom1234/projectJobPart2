<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhancement</title>
    <link href="styles/style.css" rel="stylesheet"  media="screen"/>
</head>
<body>
	<?php 
        require 'header.inc' ;
    ?>
    <section id="enhancementMainSection">
        <div id="enhancementBackground">
            <div class="enchancementMainCard mainCardPreview">
                <ul>
                    <li class="en_responsive">Responsive
                        <p>Resposive means the page will display the same no matter what platform it is viewed on.</p>
                        <p> Code to implement the feature is:</p>
                        <p>Flexbox for responsive layout. @media screen for font</p>
                    </li>
                    <li class="en_hovering"><a href="./jobs.html" class="en_hover_hide">Hover Hide in Grow
                        <p> Hover Hide in Grow shows when the mouse is not hovering over the title, nothing will appear.</p>
                        <p> Hover states when hovering over the title, some transformation will take place.</p>
                        <p> Code to implement the feature is:
                        </p>
                    </li></a>

                    <li class="en_hover"><a href="./apply.html" class="en_hover">Hover
                        <p> Hover states when hovering over the title, some transformation will take place.</p>
                        <p> Code to implement the feature is:</p>
                        <p>Hover + Translate + Transition. We have a pseduo-css hover that activates and translate the y position to negative amount to raise it up. Then we added a transition animated to make it look smooth.</p>
                    </li></a>
                    <li class="en_cb"><a href="./index.html" class="en_cb_col">Custom Button 
                            <p> A custom button, is a button that you can click to acess a different page. Clicking on this button will take you to the home page.</p>
                            <p> Code to implement the feature is:</p>
                            <p>Used anchor element, and just decorated it.</p></li></a>
                    <li class="en_ofin"><a href="./about.html" class="en_overlay">Overlay Feature In Image
                            <p>Text is diplayed when image is hovered over. </p>
                            <p>Code to implement the feature is:</p>
                            <p>We used transform scale for the image that makes the image zoom in. Then we used the transition for a smooth scaling. Then I also had an overlay that uses display: none and block.</p>
                    </li></a>
                </ul>
            </div>
        </div>
    </section>
    <?php 
        require 'footer.inc' ;
    ?>
</body>
</html>