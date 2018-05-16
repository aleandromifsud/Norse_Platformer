
<?php include 'common.php'; headCommon();?>


    <div class = "site">

        <!-- Navigation Bar -->
        <?php navBarCommon(); ?>
        <!-- Tutorial Page-->

        <div id = "tutorial" class = " backgroundImages container-fluid">

            <!-- Making of the text panel-->
            <div class = "leftPanel panel panel-default col-md-4 ">
                <div class = "panel-heading">
                    <h2>Tutorial</h2>
                </div>
                <div class = "panel-body">

                    <p>
                        Norse platformer uses the UP, LEFT and RIGHT arrow keys
                    </p>

                    <p>
                        The UP arrow will allow the player to jump
                    </p>

                    <p>
                        The LEFT and RIGHT arrows are used to move the player in the respective side.
                    </p>

                    <p>
                        The aim of the game is to get all the gems to win, you get more points the quicker you get all
                        the gems. To get on the leader board, you need to win.
                    </p>


                </div>

                <div>
                    <img class = " col-lg-7 img-responsive" id = "keysImg" src = "images/tutorial/arrows.png" alt = "Control Map">
                </div>
            </div>

            <!-- Making the right-side images -->

            <div class = "container">
                <div class = "col-sm-3">
                    <img class = "img-responsive" id = "tutImg" src = "images/tutorial/start.png" alt = "Control Map">
                </div>

                <div class = "col-sm-3">
                    <img class = "tutImg img-responsive" src = "images/tutorial/dead.png" alt = "Control Map">
                </div>

                <div class = "col-sm-3">
                    <img class = "tutImg img-responsive"  src = "images/tutorial/win.png" alt = "Control Map">
                </div>

                <div class = "col-sm-3">
                    <img class = "tutImg img-responsive" src = "images/tutorial/map.png" alt = "Control Map">
                </div>
            </div>

        </div>

        <!-- End of Tutorial -->

        <!-- Lore Page -->

        <div id = "lore" class = "container-fluid backgroundImages">
            <div class = "leftPanel panel panel-default col-md-4 " id = "lorePan">
                <div class = "panel-heading">
                    <h2>Lore</h2>
                </div>
                <div class = "panel-body">

                    <p>
                        The concept of Lore is mainly to help the user understand
                        his / hers surroundings, during gameplay the user will find
                        different "easter eggs" that will suggest the lore that will
                        be given in this page. <br>
                    </p>

                    <p>
                        In brief; lore is the back story
                        of the game, it explains what happened to a certain god
                        or what happened in the area that the user is in.
                    </p>


                </div>

            </div>

            <div class = "rightPanel panel panel-default col-md-4 ">
                <div class = "panel-heading">
                    <h2>The Cold North</h2>
                </div>
                <div class = "panel-body">

                    <p>
                       The land which you tread in is nearing the borders of the cold north,
                        a land where a deities and demi-gods realm. To enter this land you must
                        traverse this course to prove yourself.
                    </p>

                    <img class = "panelImg img-responsive col-lg-7" id = "mapImg" src = "images/lore/land.png" alt = "Control Map">

                </div>

            </div>
        </div>

        <!-- Leader Board -->
        <div id = "leaderB" class = "container-fluid backgroundImages">
            <div class = "panel panel-default col-md-4 col-md-offset-4 ">
                <div class = "panel-heading">
                    <h2>Leader Board</h2>
                </div>
                    <table id = "LeaderBoard" class = "table table-striped">

                    <script>
                    var boardDiv = document.getElementById("LeaderBoard");
                    var tableMaker = "";
                    tableMaker += "<thead>";
                    tableMaker += "<tr>";
                    tableMaker += "<th>";
                    tableMaker += "Username : ";
                    tableMaker += "</th>";
                    tableMaker += "<th>";
                    tableMaker += "Global Score : ";
                    tableMaker += "</th>";
                    tableMaker += "</tr>";
                    tableMaker += "</thead>";


                    for (var key in localStorage) {
                        if (localStorage.hasOwnProperty(key)) {
                            if (key !== "loggedInUser") {
                                tableMaker += "<tbody>";
                                tableMaker += "<tr>";
                                tableMaker += "<td>";
                                tableMaker += (JSON.parse(localStorage[key])).username;
                                tableMaker += "</td>";
                                tableMaker += "<td>";
                                tableMaker += (JSON.parse(localStorage[key])).topscore;
                                tableMaker += "</td>";
                                tableMaker += "</tr>";
                                tableMaker += "</tbody>";
                            }
                        }
                    }
                            boardDiv.innerHTML = tableMaker;
                    </script>
                    </table>

            </div>
        </div>

        <!-- Contact Us -->
        <div id = "contact" class = "container-fluid backgroundImages">
            <div class = "leftPanel panel panel-default col-md-4 ">
                <div class = "panel-heading">
                    <h2>Contact Us Form</h2>
                </div>
                <div class = "panel-body">

                    <form>
                        <div class="form-group">
                            <label>Email address:</label>
                            <input type="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Subject:</label>
                            <input type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Comment:</label>
                            <textarea class="form-control" rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-default pull-right">Submit</button>
                    </form>

                </div>


            </div>

            <div class = "container">
                <div class = "col-sm-5">
                    <img class = "img-responsive"id = "contImg" src = "images/misc/tiled.png" alt = "Control Map">
                </div>

            </div>

        </div>

        <!-- About Us-->

        <div id = "about" class = "container-fluid backgroundImages">

            <!-- Left Images-->
            <div id = "aboutImg" class = "container col-md-5">
                <div class = "col-sm-5">
                    <img class = "tutImg img-responsive" src = "images/about/sky.png" alt = "Control Map">
                </div>

                <div class = "col-sm-5">
                    <img class = "tutImg img-responsive" src = "images/about/spike.png" alt = "Control Map">
                </div>

                <div class = "col-sm-5">
                    <img class = "tutImg img-responsive" src = "images/about/bottom.png" alt = "Control Map">
                </div>

                <div class = "col-sm-5">
                    <img class = "tutImg img-responsive" src = "images/about/cloud.png" alt = "Control Map">
                </div>
            </div>

            <!-- Right Panel-->
            <div id = "aboutPan" class = " panel panel-default col-md-4">
                <div class = "panel-heading">
                    <h2>About Us</h2>
                </div>
                <div class = "panel-body">

                    <p>
                        This game was created using various amount of software, ranging from sprite creation, map creation,
                        entity creation, photo editing and more.
                    </p>

                    <p>
                        Tiled and TexturePacker were used to create the sprite sheets and tile maps respectively
                    </p>

                    <p>
                        PhotoShop was used to edit the titles used in the main menu, game over and winning screens.
                    </p>

                    <p>
                        The programming languages include, PHP, JavaScript , CSS, HTML, JSON and a framework called Phaser.
                    </p>



                </div>
            </div>

        </div>
        <!-- End of About-->


        <!-- Login -->
        <div id = "loginRegister" class = "container-fluid backgroundImages">

            <div class = "leftPanel panel panel-default col-md-4 " id = "signP">
                <div class = "panel-heading">
                    <h2>Sign In</h2>
                </div>
                <div class = "panel-body">

                    <form id = "loginDetails" onsubmit="return false">
                        <div class="form-group">
                            <label>Username:</label>
                            <input type="text" class="form-control" id = "usernameInput">
                        </div>

                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" class="form-control" id = "passwordInput">
                        </div>

                        <button type="submit" class="btn btn-default pull-right" onclick="checkLogged()">Submit</button>
                    </form>

                    <p id = "loginRes"></p>

                </div>
            </div>


            <script>
                function checkLogged(){
                    var  loginResult = document.getElementById("loginRes");

                    var userName = document.getElementById("usernameInput").value;
                    var passWord = document.getElementById("passwordInput").value;

                    console.log("Login name: " + userName+ "; Login password: " + passWord);
                    console.log(localStorage[userName]);
                    if(localStorage[userName] === undefined)
                    {

                        loginResult.innerHTML = "Username not recognized!";
                        return;
                    }

                    var userStoreObject = JSON.parse(localStorage[userName]);


                    if(passWord !== userStoreObject.password)
                    {
                        loginResult.innerHTML = "Password Incorrect";
                        return;
                    }

                    localStorage.loggedInUser = userName;
                    loginResult.innerHTML = "User Logged In";

                }



            </script>

            <div class = "panelRight panel panel-default col-md-4 ">
                <div class = "panel-heading">
                    <h2>Register</h2>
                </div>
                <div class = "panel-body">

                    <form id = "registerUser">

                        <div class="form-group" onsubmit="return false">
                            <label>Full Name:</label>
                            <input type="text" class="form-control" id="fullNameIn">
                        </div>

                        <div class="form-group">
                            <label>Username:</label>
                            <input type="text" class="form-control" id = "userNameIn">
                        </div>

                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" class="form-control" id = "passIn">
                        </div>

                        <button type="submit" class="btn btn-default pull-right" onclick="storeUserData()">Submit</button>
                    </form>

                    <p id = "registerRes"></p>

                    <script>

                        function storeUserData() {
                            var userStoreObject = {};

                            var userName = document.getElementById("userNameIn").value;
                            var passWord = document.getElementById("passIn").value;
                            var fullName = document.getElementById("fullNameIn").value;

                            if(userName !== "" && passWord !== ""){

                                //Add user entered data to object
                                userStoreObject.username = userName;
                                userStoreObject.password = passWord;
                                userStoreObject.fullname = fullName;

                                //Add a score field to object to support rankings table
                                userStoreObject.topscore = 0;

                                //Store a string version of the object in local storage.
                                localStorage[userName] = JSON.stringify(userStoreObject);
                                document.getElementById("registerRes").innerHTML = "Registered!"
                            }
                            else
                            {
                                document.getElementById("registerRes").innerHTML = "Invalid  Input!"
                            }


                        }

                    </script>

                </div>
        </div>
        <!--/ LoginReg -->
    </div>

<?php commonFooter(); ?>


