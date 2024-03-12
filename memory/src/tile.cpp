#include "tile.h"



////////////////////////////////////////////////////////////////////////////////
// METHODS


// Getters
string Tile::getName() const{
	return this->name;
}
string Tile::getHiddenName() const{
	return this->hiddenName;
}
string Tile::getDisplayedName() const{
	return this->displayedName;
}
int Tile::getPosX() const{
	return this->posX;
}
int Tile::getPosY() const{
	return this->posY;
}

// Setters
void Tile::setName(string name){
	this->name=name;
}
void Tile::setHiddenName(int idHiddenName){
	if (idHiddenName <0) this-> hiddenName = "Attack";
	else if (idHiddenName > 3) this->hiddenName = " Hack ";
	else if (idHiddenName == 0)	this->hiddenName="Attack";
	else if (idHiddenName == 1)	this->hiddenName="Login ";
	else if (idHiddenName == 2)	this->hiddenName=" Chat ";
	else if (idHiddenName == 3)	this->hiddenName=" Hack ";
}
void Tile::setDisplayedName(bool isHidden){
	if (isHidden) this->displayedName=this->getName();
	else this->displayedName=this->getHiddenName();
}
void Tile::setIsChosen(bool isChosen){
	this->isChosen=isChosen;
}
void Tile::setIsPaired(bool isPaired){
	this->isPaired=isPaired;
}
void Tile::setPosX(int posX){
	if (posX <1) this-> posX = 1;
	else if (posX > 4) this-> posX = 4;
	else this->posX = posX;
}
void Tile::setPosY(int posY){
	if (posY <1) this-> posY = 1;
	else if (posY > 2) this-> posY = 2;
	else this->posY = posY;
}

void Tile::setColor(int color){
	if (color<0) this->color = 0;
	else if (color> 5) this->color = 5;
	else this->color = color;
}

//Init
void Tile::setTile(int idHiddenName,string name=" test ", int posX=1, int posY=1){
	this->setName(name);
	this->setHiddenName(idHiddenName);
	this->setDisplayedName(true);
	this->setIsChosen(false);
	this->setIsPaired(false);
	this->setPosX(posX);
	this->setPosY(posY);
	this->setColor(0);
}


//Reveal
void Tile::reveal(){
	this->setDisplayedName(false);
	this->setColor(4);
}

//Hide
void Tile::hide(){
	this->setDisplayedName(true);
	this->setColor(0);
}

//Chosen
void Tile::beChosen(){
	this->setIsChosen(true);
}

//(un)Chosen
void Tile::notChosenAnymore(){
	this->setIsChosen(false);
}


// Constructors
Tile::Tile() {
}

Tile::Tile(int idHiddenName,string name, int posX, int posY) {
	this->setTile(idHiddenName,name, posX, posY);
}



// Displayers
string Tile::toString() const {
	string str = "";
	return str;
}

	ostream& operator <<(ostream& sout, const Tile& tile) {
		sout << "";
		sout << tile.toString();
		return sout;
	}




/////////////////////////////////////////////////////////////////////////////////////////


//
// // Test
