#ifndef _TEST_H
#define _TEST_H



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
class Test {

	//////////////////////////////
	// MEMBERS
public:



	//////////////////////////////
	// METHODS
public:
	// Constructors
	Test();

	//Ask
	void ask();

	// Displayers
	string toString() const;
	friend ostream& operator <<(ostream& sout, const Test& test);

};


#endif
