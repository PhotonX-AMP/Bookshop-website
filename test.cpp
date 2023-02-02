#include <iostream>
#include <string>

using namespace std;

int main(){
    string name;
    cout<<"Enter your name: ";
    cin>> name;
    name.insert(0, "t");
    cout<< "Hello "<< name << endl
    <<name.substr(1, -1);

    return 0;
}