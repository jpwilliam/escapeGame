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
#include "map.h"

using namespace std;



////////////////////////////////////////////////////////////////////////////////
// PROTOTYPES



////////////////////////////////////////////////////////////////////////////////
// BODY
int main() {
	Utils::initRandomGenerator();


	// DECL
	bool isGameEnded=false;
	Map* map = new Map();

	while(true){
		//Display map
		Utils::clearScreen();
		cout << *map << "\n";
		//Indice of chosen tile
		int caseValue1=map->case1();
		if (caseValue1==98) cout << "Vous ne pouvez pas choisir cette case !\n";
		//Display map 2
		Utils::clearScreen();
		cout << *map << "\n";
		//Indice of second chosen tile
		int caseValue2=map->case2();
		if (caseValue2==99) cout << "Erreur, vous avez choisi la même case !\n";
		else if (caseValue2==98) cout << "Vous ne pouvez pas choisir cette case !\n";
		//Check if tile are paired
		else {
			Utils::clearScreen();
			cout << *map << "\n";
			//Timer
			map->timer();
			map->verif(caseValue1,caseValue2);
			}
		isGameEnded=map->end();
		if (isGameEnded) break;
		}

		//Game ended
		cout << "PENDU \n";
	return 0;
}




////////////////////////////////////////////////////////////////////////////////
// FUNCTIONS
