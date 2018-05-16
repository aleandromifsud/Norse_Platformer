<?php

    // Creating the header of the website , used in all pages
    function headCommon()
    {
        // Contains the skeleton code of HTML , as it in common
        echo '<!DOCTYPE html>';
        echo '<html>';
        echo '<head>';
        echo '     <meta charset="UTF-8">';
        echo '     <meta name="viewport" content="width=device-width, initial-scale=1">';
        echo '     <title>Norse Platformer Info Page</title>';
                   // Importing the CSS file and Bootstrap
        echo '     <link rel="stylesheet" href="style.css" type="text/css">';
        echo '     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">';
        echo '</head>';
    }

    // Creating the nav bar
    function navBarCommon()
    {
        // Initialising the body tag
        echo '<body data-spy="scroll" data-target=".navbar" data-offset="50">';
        echo '      <nav class = " navbar-inverse navbar-fixed-top">';

        echo '        <div class="navbar-header">';

                        // Creating a collapse menu for a responsive site
        echo '          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">';
        echo '             <span class="icon-bar"></span>';
        echo '             <span class="icon-bar"></span>';
        echo '            <span class="icon-bar"></span>';
        echo '         </button>';
                        // Left side of the navbar
        echo '         <a class="navbar-brand" href="index.php">Norse Platformer</a>';
        echo '    </div>';

                  // Center of the navbar
        echo '    <div id="myNavbar" class = "collapse navbar-collapse" >';
        echo '       <div class = "centerDiv">';
        echo '          <ul class="leftNav nav navbar-nav ">';
        echo '                  <li><a href="index.php#tutorial">Tutorial</a></li>';
        echo '                  <li><a href="index.php#lore">Lore</a></li>';
        echo '                 <li><a href="index.php#leaderB">Leader Board</a></li>';
        echo '         </ul>';

        echo '                    <ul class="centreNav nav navbar-nav">';
        echo '                            <li><a href="game.php">Game</a></li>';
        echo '                    </ul>';

        echo '                    <ul class="righNav nav navbar-nav">';
        echo '                            <li><a href="index.php#contact">Contact</a></li>';
        echo '                            <li><a href="index.php#about">About</a></li>';
        echo '                    </ul>';
        echo '                </div>';
                              // Right side of the navbar
        echo '                <div class="loginRegister navbar-right">';
        echo '                    <ul class = "nav navbar-nav">';
        echo '                        <li><a href="index.php#loginRegister">Login / Register</a></li>';
        echo '                    </ul>';
        echo '                </div>';
        echo '            </div>';

        echo '        </nav>';
    }

    // Creation of the footer
    function commonFooter()
    {
        // Closing the body tag
        echo '</body>';
        echo '  <footer class="page-footer center-on-small-only unique-color-dark pt-0">';

        echo '    <div class="container mt-5 mb-4 text-center text-md-left">';
        echo '        <div class="row mt-3">';

                          // Creating the left column of the footer (Social Media)
        echo '            <div class="col-md-4 col-lg-3 col-xl-3">';
        echo '                <h6 class="title font-bold">Social Media</h6>';
        echo '               <hr class="mb-4 mt-0 d-inline-block mx-auto">';

        echo '               <section id = "social" class = "col-xs-3">';
        echo '                    <p><a href="https://www.facebook.com"><img class="img-responsive" src="images/socialMedia/facebook.png" alt="facebook" /></a></p>';
        echo '                    <p><a href="https://www.instagram.com"> <img class="img-responsive" src="images/socialMedia/insta.png" alt="instagram" /></a></p>';
        echo '                   <p> <a href="https://www.twitter.com"><img class="img-responsive" src="images/socialMedia/twitter.png" alt="twitter" /></a></p>';
        echo '                    <p> <a href="https://www.youtube.com"><img class="img-responsive" src="images/socialMedia/youtube.png" alt="youtube"/></a></p>';
        echo '                </section>';

        echo '           </div>';

                          // Misc information column
        echo '            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-r">';
        echo '                <h6 class="title font-bold">Misc</h6>';
        echo '                <hr class=" mb-4 mt-0 d-inline-block mx-auto">';
        echo '                <p> contact@norseplatfomer.org</p>';
        echo '                <p class = "footerDonateT"> Would you like to donate to a cause?</p>';
        echo '                <p> <a href="https://www.crowdfunder.com/"> Crowd Funding</a></p>';

        echo '            </div>';

                          // Rights column
        echo '            <div class="col-md-4 col-lg-3 col-xl-3">';
        echo '                <h6 class="title font-bold">Rights</h6>';
        echo '                <hr class="mb-4 mt-0 d-inline-block mx-auto">';
        echo '                <i class="fa fa-copyright" aria-hidden="true">Copyright : Aleandro Mifsud</i>';



        echo '           </div>';

                          // Feedback column
        echo '            <div class="col-md-4 col-lg-3 col-xl-3">';
        echo '                <h6 class="title font-bold">Anonymous Feedback</h6>';
        echo '                <hr class="mb-4 mt-0 d-inline-block mx-auto">';

        echo '                <form>';
        echo '                    <div class="form-group">';
        echo '                        <textarea class="form-control" rows="5"></textarea>';
        echo '                   </div>';
        echo '                </form>';

        echo '                <button type="submit" class="btn btn-default pull-right">Submit</button>';
        echo '            </div>';
                  

        echo '        </div>';
        echo '    </div>';
            

        echo '</footer>';

        echo '</html>';
    }


