<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ye</title>
    <link href="styles/style.css" rel="stylesheet"  media="screen"/>
    <link rel="icon" type="image/x-icon" href="/images/logo.png">
</head>
<body>
    <?php 
        require 'header.inc' ;
    ?>
    <div class="mainCardBody">
        <div class="mainCardSplit">
            <div id="mainSplitText">
                <h1>
                    Land Your Dream Job!
                </h1>
                <p>
                    Love Tech? Join Ye! Start your career as a web developer today with Ye! We specialize everything related to technology! Perfect Fit if you are passionate into tech and speaks tech like we all are.
                </p>
            </div>
            <div id="mainSplitButton">
                <a class='fakeBtnViewPlan fakeBtn' href="mailto::104053930@student.swin.edu.au">Contact Us</a>
            </div>
        </div>
        <div class="mainCardSplit mainCardImage">
            <image src="./images/suitcase.png"></image>
        </div>
    </div>
    </div>
    
    <section id="mainCTA">
        <a href="https://www.youtube.com/watch?v=6HweAFcUBPk" target="_blank"> 
            <div class="mainCTACard" style="background-color: black;">
                <div class="CTACardPreview">
                    <h1>Watch our video!</h1>
                    <p>Hello, want to learn more about our page? Watch our video and get to hear the team behind Ye!</p>
                </div>
                <p>Watch Now ></p>
            </div>
        </a>
        <a href="./jobs.html">
            <div class="mainCTACard">
                <div class="CTACardPreview">
                    <h1>What jobs?</h1>
                    <p>Little iffy on the jobs offered by Ye? No sweat, head on to our job description page!</p>
                </div>
                <p>Learn More ></p>
            </div>
        </a>
    </section>

    <footer>
        <h1>Why Ye?</h1>
        <div id="footerDiv">
            <a>
                <div class="footerCard">
                    <h1>Tech Enthusiasts</h1>
                </div>
            </a>
            <a>
                <div class="footerCard">
                    <h1>Work From Home</h1>
                </div>
            </a>
            <a>
                <div class="footerCard">
                    <h1>Love All Developers</h1>
                </div>
            </a>
        </div>
    </footer>
    <?php 
        require 'footer.inc' ;
    ?>
    
</body>
</html>