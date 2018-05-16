// Variables related to the game aesthetics
//var game;
var background;
var gameWidth = 800;
var gameHeight = 600;

// Variables related to the player
var player;

//Variables related to the map
this.map;
this.mainLayer;

var counter = 0;
var timeScore = 0;
var globalScore = 0;

window.onload = function (game) {
    var game = new Phaser.Game(gameWidth, gameHeight, Phaser.AUTO, 'phaserGame');
    game.state.add('Boot', boot);
    game.state.add('Preload', preload);
    game.state.add('MainMenu', mainMenu);
    game.state.add('PlayGame', playGame);
    game.state.add('GameOverMenu', gameOverMenu);
    game.state.add('GameWon', gameWon);

    game.state.start('Boot');
}
// Method which will boot initially
var boot = function (game) {
};
boot.prototype = {
    create: function () {
        // Moves to the next method, preloads the assests
        this.stage.disableVisibilityChange = false;
        this.scale.pageAlignHorizontally = true;
       // this.scale.pageAlignVertically = true;
        this.game.state.start('Preload');

    }
}


// Method which preloads all assets
var preload = function (game) {
};
preload.prototype = {
    preload: function () {
        // Loading the character spritesheet
        this.game.load.spritesheet('character', 'assets/spriteSheet/character.png', 22, 32, 10);

        //Loading all map related assets and object assets
        this.game.load.tilemap('map', 'assets/map/gameMap.json', null, Phaser.Tilemap.TILED_JSON);
        this.game.load.spritesheet('tileset', 'assets/map/gameTileset.png', 32, 32);
        this.game.load.spritesheet('blueGems', 'assets/map/gem32.png', 32, 32);
        this.game.load.spritesheet('greenGems', 'assets/map/gemGreen32.png', 32, 32);
        this.game.load.spritesheet('scrolls', 'assets/map/scroll32.png', 32, 32);

        // Load spikes
        this.game.load.spritesheet('spikesUp', 'assets/map/spikeUp.png', 32, 32);
        this.game.load.spritesheet('spikesDown', 'assets/map/spikeDown.png', 32, 32);
        this.game.load.spritesheet('spikesLeft', 'assets/map/spikeLeft.png', 32, 32);
        this.game.load.spritesheet('spikesRight', 'assets/map/spikeRight.png', 32, 32);

        //Loading main menu images
        this.game.load.image('back', "assets/mainScreen/backgroundTitle2.png");
        this.game.load.image('title', "assets/mainScreen/title.png");
        this.game.load.image('enter', "assets/mainScreen/enter.png");

        // Loading the game over sequence assets
        this.game.load.image('gameOverTitle', "assets/mainScreen/gameOver.png", 32, 32);
        this.game.load.image('retryText', "assets/mainScreen/retry.png", 32, 32);

        //Loading the winnign sequennce assets
        this.game.load.image('youWinTitle', "assets/mainScreen/youWin.png", 32, 32);
        this.game.load.image('playAgain', "assets/mainScreen/playAgain.png", 32, 32);
    },
    // Moves to the Main Menu method, which shows the title screen
    create: function () {
        this.game.state.start('MainMenu');
    }
}

var mainMenu = function (game) {
};
mainMenu.prototype =
    {
        create: function () {
            background = this.game.add.tileSprite(0, 0, gameWidth, gameHeight, 'back');                     //Setting the background
            this.title = this.game.add.image(this.game.width / 2, this.game.height / 5, 'title');
            this.title.anchor.setTo(0.5, 0);

            this.pressEnter = this.game.add.image(this.game.width / 2, this.game.height - 120, 'enter');
            this.pressEnter.anchor.setTo(0.5, 1);

            this.startKey = this.game.input.keyboard.addKey(Phaser.Keyboard.ENTER);
            this.startKey.onDown.add(this.startGame, this);

            this.game.time.events.loop(500, this.blinkText, this);
        },
        blinkText: function () {
            if (this.pressEnter.alpha) {
                this.pressEnter.alpha = 0;
            }
            else {
                this.pressEnter.alpha = 1;
            }
        },

        startGame: function () {
            // Removing main menu and loading the game
            this.title.destroy();
            this.pressEnter.destroy();
            this.game.time.reset();
            this.game.state.start('PlayGame');
        }

    }


var playGame = function (game) {
};
playGame.prototype = {
    create: function () {


        //Creatimg the world and loading the tilemap / tilesheet
        background = this.game.add.tileSprite(0, 0, gameWidth, gameHeight, 'back');     //Loading the background
        this.map = this.add.tilemap('map');                                             //Loading the map
        this.map.addTilesetImage('atlas', 'tileset');                                   // Loading the terrain assets
        this.mainLayer = this.map.createLayer('Tile Layer 1');                          // Creating the terrain layer
        this.map.setCollisionBetween(1, 1000, true, 'Tile Layer 1');                    // Setting collision for the terrain layer
        this.mainLayer.resizeWorld();                                                   // Resizing the layer

        // Creating the group which holds the blue gems
        this.blueGemGroup = this.add.group();
        this.blueGemGroup.enableBody = true;                                                                        // Enabling them
        this.map.createFromObjects('blueGemLayer', 'blueGem', 'blueGems', 0, true, false, this.blueGemGroup);       // Adding the blue gems to the map

        // Creating the group which holds the green gems
        this.greenGemGroup = this.add.group();
        this.greenGemGroup.enableBody = true;                                                                       // Enabling them
        this.map.createFromObjects('greenGemLayer', 'greenGem', 'greenGems', 0, true, false, this.greenGemGroup);   // Adding the blue gems to the map

        // Creating the group which holds the scroll
        this.scrollGroup = this.add.group();
        this.scrollGroup.enableBody = true;                                                                         // Enabling them
        this.map.createFromObjects('scrollLayer', 'scroll', 'scrolls', 0, true, false, this.scrollGroup);           // Adding the scrolls to the map

        // Creatomg the grou[ which holds the spikes
        this.spikeGroup = this.add.group();
        this.spikeGroup.enableBody = true;
        this.map.createFromObjects('spikeUpLayer', 'spike', 'spikesUp', 0, true, false, this.spikeGroup);
        this.map.createFromObjects('spikeDownLayer', 'spikeD', 'spikesDown', 0, true, false, this.spikeGroup);
        this.map.createFromObjects('spikeLeftLayer', 'spikeL', 'spikesLeft', 0, true, false, this.spikeGroup);

        //Creating the Score Keeper
        score = 0;                                                                                                                           // Creating the score varibale
        scoreText = this.game.add.text(8, 4, 'Score: 0', { font: 'Old English Text MT',fontSize: '30px', fill: '#ba2121'});                  // Putting the score in the game on the top left

        //Creating the Player
        this.player = this.game.add.sprite(15, 500, 'character');                                                   // Adding the player to the world
        this.player.anchor.setTo(0.5);                                                                              // Positioning him on the bottom left

        this.game.physics.arcade.enable(this.player);                                                               // Enable Physics Engine
        this.player.body.collideWorldBounds = true;                                                                 // World boundaries collide

        this.player.animations.add('playerAnim', [1, 2, 3, 4, 5, 6, 7, 8], 10, true);                               // Animating the player, the numbers represent the frames used and the speed

        this.player.body.gravity.y = 500;                                                                           // Creating gravity


    },

    update: function () {

        // Setting collision between the player and the map
        this.physics.arcade.collide(this.player, this.mainLayer);

        // Checking when the player walks over a blue gem and runs the "collectBlueGems" method
        this.game.physics.arcade.overlap(this.player,this.blueGemGroup,this.collectBlueGems ,null,this);

        // Checking when the player walks over a green gem and runs the "collectGreenGems" method
        this.game.physics.arcade.overlap(this.player, this.greenGemGroup, this.collectGreenGems, null, this);

        // Checking when the player walks over a scroll and runs the "lore" method
        this.game.physics.arcade.overlap(this.player, this.scrollGroup, this.lore, null, this);

        // Checking when the player walks over a spike and runs the "gameOver" method
        this.game.physics.arcade.overlap(this.player, this.spikeGroup, this.gameOver, null, this);


        //Binding the Keys to make the player move
        this.wasd = {
            jump: this.game.input.keyboard.addKey(Phaser.Keyboard.UP),
            left: this.game.input.keyboard.addKey(Phaser.Keyboard.LEFT),
            right: this.game.input.keyboard.addKey(Phaser.Keyboard.RIGHT),
        }
        this.game.input.keyboard.addKeyCapture(
            [Phaser.Keyboard.UP,
                Phaser.Keyboard.LEFT,
                Phaser.Keyboard.RIGHT]
        );

        //Moving the player

        // Allowing the player to jump when he has touched the collision box under him
        if (this.wasd.jump.isDown && this.player.body.onFloor()) {
            this.player.body.velocity.y = -315;
            //-315 allows the player to jump aprox 2 tiles up, what was needed for this map
        }

        //
        var vel = 150;
        if (this.wasd.left.isDown) {
            this.player.body.velocity.x = -vel;
            this.player.scale.x = -1;
            this.player.animations.play('playerAnim');

        }
        else if (this.wasd.right.isDown) {
            this.player.body.velocity.x = vel;
            this.player.scale.x = 1;
            this.player.animations.play('playerAnim');

        } else {
            this.player.animations.stop();
            this.player.frame = 0;
            this.player.body.velocity.x = 0;
        }
    },

    // Adds 10 points to the score when a blue gem is picked up
    collectBlueGems : function(player, blueGem1)
    {
        blueGem1.kill();
        score += 10;
        scoreText.text = 'Score: ' + score;

        if(score == 125)
        {
            counter = this.game.time.totalElapsedSeconds();
            timeScore = Math.round(counter);
            this.game.state.start('GameWon');
        }
    },

    // Adds 5 points to the score when a green gem is picked up
    collectGreenGems : function(player, greenGem1)
    {
        greenGem1.kill();
        score += 5;
        scoreText.text = 'Score: ' + score;

        if(score == 125)
        {
            counter = this.game.time.totalElapsedSeconds();
            timeScore = Math.round(counter);
            this.game.state.start('GameWon');
        }
    },

    lore : function(player,scroll)
    {


    },

    gameOver : function(player, spikes)
    {
        counter = this.game.time.totalElapsedSeconds();
        timeScore = Math.round(counter);
        this.game.state.start('GameOverMenu');
    }

}

var gameOverMenu = function (game) {
};
gameOverMenu.prototype =
    {
        create: function () {
            background = this.game.add.tileSprite(0, 0, gameWidth, gameHeight, 'back');                     //Setting the background
            this.gOTitle = this.game.add.image(this.game.width / 2, this.game.height / 5, 'gameOverTitle');
            this.gOTitle.anchor.setTo(0.5, 0);

            this.endScore = this.game.add.text(this.game.world.centerX-145, this.game.world.centerY-60, 'Final Score : ' + score, { font: 'Old English Text MT',fontSize: '44px', fill: '#ba2121'});
            this.timeText = this.game.add.text(this.game.world.centerX-155, this.game.world.centerY, 'Time : ' + timeScore + ' seconds', { font: 'Old English Text MT',fontSize: '44px', fill: '#ba2121'});

            this.retryEnter = this.game.add.image(this.game.width / 2, this.game.height - 120, 'retryText');
            this.retryEnter.anchor.setTo(0.5, 1);

            this.startKey = this.game.input.keyboard.addKey(Phaser.Keyboard.ENTER);
            this.startKey.onDown.add(this.startGame, this);

            this.game.time.events.loop(500, this.blinkText, this);
        },
        blinkText: function () {
            if (this.retryEnter.alpha) {
                this.retryEnter.alpha = 0;
            }
            else {
                this.retryEnter.alpha = 1;
            }
        },

        startGame: function () {
            // Removing main menu and loading the game
            this.gOTitle.destroy();
            this.retryEnter.destroy();
            this.game.time.reset();
            this.game.state.start('PlayGame');
        }

    }

var gameWon = function (game) {
};
gameWon.prototype =
    {
        create: function () {
            background = this.game.add.tileSprite(0, 0, gameWidth, gameHeight, 'back');                     //Setting the background
            this.winningTitle = this.game.add.image(this.game.width / 2, this.game.height / 5, 'youWinTitle');
            this.winningTitle.anchor.setTo(0.5, 0);

            this.moreScore = this.game.add.text(this.game.world.centerX-245, this.game.world.centerY-60, '+ 100 for collecting all gems!', { font: 'Old English Text MT',fontSize: '44px', fill: '#ba2121'});
            score = score + 100;

            // Calculates the global
            if(timeScore <= 20 && timeScore > 0)
            {
                globalScore = score * 10;
            }
            else if(timeScore <= 25 && timeScore > 20)
            {
                globalScore = score * 9;
            }
            else if(timeScore <= 30 && timeScore > 26)
            {
                globalScore = score * 8;
            }
            else if(timeScore <= 35 && timeScore > 30)
            {
                globalScore = score * 7 ;
            }
            else if(timeScore <= 40 && timeScore > 35)
            {
                globalScore =  score * 6;
            }
            else if(timeScore <= 45 && timeScore > 40)
            {
                globalScore = score * 5;
            }
            else if(timeScore <= 50 && timeScore > 45)
            {
                globalScore =  score * 4;
            }
            else if(timeScore <= 55 && timeScore > 50)
            {
                globalScore = score * 3;
            }
            else if(timeScore <= 60 && timeScore > 55)
            {
                globalScore =  score * 2;
            }
            else
            {
                globalScore = score;
            }

            this.endScore = this.game.add.text(this.game.world.centerX-145, this.game.world.centerY-10, 'Score : ' + globalScore, { font: 'Old English Text MT',fontSize: '44px', fill: '#ba2121'});
            this.timeText = this.game.add.text(this.game.world.centerX-138, this.game.world.centerY+45, 'Time : ' + timeScore + ' seconds', { font: 'Old English Text MT',fontSize: '44px', fill: '#ba2121'});

            if(localStorage.loggedInUser !== undefined)
            {
                currentlyLogged = localStorage.loggedInUser;
                userStoreObject = JSON.parse(localStorage[currentlyLogged]);
                console.log(userStoreObject.topscore);

                if(globalScore > userStoreObject.topscore)
                {
                    userStoreObject.topscore = globalScore;
                    localStorage[currentlyLogged] = JSON.stringify(userStoreObject);
                    console.log(userStoreObject.topscore);
                }
                else
                {
                    // Do nothing
                }

            }

            this.playAgain = this.game.add.image(this.game.width / 2, this.game.height - 120, 'playAgain');
            this.playAgain.anchor.setTo(0.5, 1);

            this.startKey = this.game.input.keyboard.addKey(Phaser.Keyboard.ENTER);
            this.startKey.onDown.add(this.startGame, this);

            this.game.time.events.loop(500, this.blinkText, this);
        },
        blinkText: function () {
            if (this.playAgain.alpha) {
                this.playAgain.alpha = 0;
            }
            else {
                this.playAgain.alpha = 1;
            }
        },

        startGame: function () {
            // Removing main menu and loading the game
            this.winningTitle.destroy();
            this.playAgain.destroy();
            this.game.time.reset();
            this.game.state.start('PlayGame');
        },
        
        calculateGlobScore : function () {


        }
    }

