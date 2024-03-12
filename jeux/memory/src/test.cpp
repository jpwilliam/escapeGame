#include "test.h"



////////////////////////////////////////////////////////////////////////////////
// METHODS

//DECL
string nom ="";

// Constructors
Test::Test() {

}

//Ask
void Test::ask(){
cin >> nom;
}


// Displayers
string Test::toString() const {
	string str = "";
	str += nom;
	return str;
}
ostream& operator <<(ostream& sout, const Test& test) {
	sout << "";
	sout << test.toString();
	return sout;
}
