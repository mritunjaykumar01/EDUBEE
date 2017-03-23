#include <cmath>
#include <cstdio>
#include <vector>
#include <iostream>
#include <algorithm>
using namespace std;


int main() {
        /* Enter your code here. Read input from STDIN. Print output to STDOUT */   
    int n;
    cin >> n;
    int j;
    string s;
    for(j=0;j<n;j++){
        int flag=0;
        cin >> s;

        int i,l;
        l = s.length();
        //cout << l << endl;
        int k = l-1;
        for(i=0;i<l/2;i++,k--){
            if(i==k){
                flag=0;
                break;
            }
            if(s[i] != s[k]){

                if(i==k-1){
                    cout << i << endl;
                    flag=1;
                    break;
                }
                if(s[i+1] == s[k]){
                    cout << i << endl;
                    flag=1;
                    break;
                }else{
                    cout << k << endl;
                    break;
                }                
                // if(s[i] == s[k-1]){
                //     cout << k << endl;
                //     flag=1;
                //     break;
                // }

            }
        }
        if(flag==0){
            cout << "-1" << endl;
        }
    }
    return 0;
}
