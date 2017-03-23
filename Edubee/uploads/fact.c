#include <stdlib.h>
#include <stdio.h>
int main()
{
    int n, count;
    long int factorial=1;         
    int i=0;
    int t;
    scanf("%d",&t);
    for(i=0;i<t;i++){
    factorial = 1;
    scanf("%d",&n);
    if(n>0){
       for(count=1;count<=n;++count)    /* for loop terminates if count>n */
       {
          factorial*=count;              /* factorial=factorial*count */
       }
    
    }
    printf("%ld\n",factorial);
  }
    return 0;
}