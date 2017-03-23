#include <stdio.h>
#include <stdlib.h> 
int main()
{
   int n1=0;
   scanf("%d",&n1);
   int n, reverse = 0;
   int i=0;
   for(i=0;i<n1;i++){
      n=0;
      reverse = 0;
      scanf("%d", &n);
      while (n != 0)
      {
         reverse = reverse * 10;
         reverse = reverse + n%10;
         n       = n/10;
      }
      printf("%d\n", reverse);
   }
   // while(1>0){
   //    printf("hi\n");
   // }
   return 0;
   
}