#ifndef _TILE_H
#define _TILE_H



////////////////////////////////////////////////////////////////////////////////
// HEAD
#include <stdlib.h>
#include <iostream>
#include <sstream>
#include <string>
#include <vector>
#include <regex>
#include <time.h>
#include <math.h>
#include <unistd.h>
#include "utils.h"
using namespace std;


////////////////////////////////////////////////////////////////////////////////
// CLASS
class Tile {

//////////////////////////////
// MEMBERS
public:
string name;
string hiddenName;
string displayedName;
bool isChosen;
bool isPaired;
int posX;
int posY;
int color;


//////////////////////////////
// METHODS
public:

// Getters
string getName() const;
string getHiddenName() const;
string getDisplayedName() const;
int getPosX() const;
int getPosY() const;

// Setters
void setName(string name);
void setHiddenName(int idHiddenName);
void setDisplayedName(bool isHidden);
void setIsChosen(bool isChosen);
void setIsPaired(bool isPaired);
void setPosX(int posX);
void setPosY(int posY);
void setColor(int color);


//Init
void setTile(int idHiddenName, string name, int posX, int posY);

//Reveal
void reveal();

//Hide
void hide();

//Chosen
void beChosen();

//(un)Chosen
void notChosenAnymore();


// Constructors
Tile();
Tile(int idHiddenName, string name, int posX, int posY);

///////////////////////////////////////////////////////////
	// Displayers
	string toString() const;
	friend ostream& operator <<(ostream& sout, const Tile& tile);

};


#endif
