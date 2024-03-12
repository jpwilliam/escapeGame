#ifndef _MAP_H
#define _MAP_H



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
#include "tile.h"

using namespace std;



////////////////////////////////////////////////////////////////////////////////
// CLASS
class Map {

	//////////////////////////////
	// MEMBERS
public:

	Tile* pTiles[8];
	string revealedName1;
	string revealedName2;


	//////////////////////////////
	// METHODS
public:

	//LA BOUCLE
	int case1();
	int case2();

	//Verif
	void verif(int caseValue1, int caseValue2);

	//timer
	void timer();

	//End
	bool end();

	// Constructors
	Map();

	// Displayers
	string toString() const;
	friend ostream& operator <<(ostream& sout, const Map& map);

};


#endif
