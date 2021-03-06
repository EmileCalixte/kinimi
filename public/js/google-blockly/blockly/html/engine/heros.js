class Heros {
    constructor() {
        this.tailleDeplacement = jsonData.tailleDeplacement;
        this.tabX = jsonData.spawnTabX;
        this.tabY = jsonData.spawnTabY;
        this.x = jsonData.spawnX;
        this.y = jsonData.spawnY;
        this.width = jsonData.tailleXHeros || 50;
        this.height = jsonData.tailleYHeros || 50;
        this.img = new Image();
        this.img.src = '../js/google-blockly/blockly/html/resources/images/heros-face.png';
        this.imgB = new Image();this.imgB.src = '../js/google-blockly/blockly/html/resources/images/heros-face.png';
        this.imgG = new Image();this.imgG.src = '../js/google-blockly/blockly/html/resources/images/heros-gauche.png';
        this.imgH = new Image();this.imgH.src = '../js/google-blockly/blockly/html/resources/images/heros-dos.png';
        this.imgD = new Image();this.imgD.src = '../js/google-blockly/blockly/html/resources/images/heros-droite.png';

        setTimeout(this.afficher(), 2000);

    }

    afficher() {
        var sup = this;
        this.img.onload = function () {
            scene.context.drawImage(this, sup.x, sup.y, sup.width, sup.height);
        }
    }
    //TODO : spécifier le type d'obstacle que le héros se prend
    monter() {
        if (this.testerMonter() && !perdu) {
            this.y -= this.tailleDeplacement;
            this.tabY--;
            this.img.src = this.imgH.src;
            tick();
        } else if (perdu) {
        }
        else {
            swal("Impossible de monter", "Ton héros monte... Et se prend un obstacle. On a fait mieux niveau discrétion.", "error");
            perdu = true;

        }
        //sleep(500);
    }

    testerMonter() {
        return (!testerObstacle(this.tabX, this.tabY - 1));
    }

    descendre() {
        if (this.testerDescendre() && !perdu) {
            this.img.src = this.imgB.src;
            this.y += this.tailleDeplacement;
            this.tabY++;
            tick();
        } else if (perdu) {
        }
        else {
            swal("Impossible de descendre", "Ton héros descend... Et se prend un obstacle. On a fait mieux niveau discrétion.", "error");
            perdu = true;
        }
    }

    testerDescendre() {
        return (!testerObstacle(this.tabX, this.tabY + 1));
    }

    goGauche() {
        if (this.testerGoGauche() && !perdu) {
            this.img.src = this.imgG.src;
            this.x -= this.tailleDeplacement;
            this.tabX--;
            tick();
        } else if (perdu) {
        }
        else {
            swal("Impossible d'aller à gauche", "Ton héros va a gauche... Et se prend un obstacle. On a fait mieux niveau discrétion.", "error");
            perdu = true;
        }
    }

    testerGoGauche() {
        return (!testerObstacle(this.tabX - 1, this.tabY));
    }

    goDroite() {
        if (this.testerGoDroite() && !perdu) {
            this.img.src = this.imgD.src;
            this.x += this.tailleDeplacement;
            this.tabX++;
            tick();
        } else if (perdu) {
        }
        else {
            swal("Impossible d'aller à droite", "Ton héros va a droite... Et se prend un obstacle. On a fait mieux niveau discrétion.", "error");
            perdu = true;
        }
    }

    testerGoDroite() {
        //alert(tabNiveau.tab[this.tabX+1][this.tabY]);
        return (!testerObstacle(this.tabX + 1, this.tabY));
    }

    idle(){
        tick();
    }

    ramasser(){
        if(!perdu) {
            var ramasser = false;
            for (var i = 0; i < ramassables.length; i++) {
                ramasser = ramassables[i].testerRamasse(this.tabX, this.tabY);
            }
            if (!ramasser) {
                swal("Rien à ramasser", "Ton héros ne voit rien de ramassable autour de lui", "error");
                perdu = true;
            }
            tick();
        }
    }

    repaint() {
        scene.context.drawImage(this.img, this.x, this.y, this.width, this.height);
    }
}

//todo : faire se tourner le heros quand il change de direction
