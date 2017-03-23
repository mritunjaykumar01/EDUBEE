#include <stdio.h>
#include <stdlib.h>
//#include "motion.c"
#include "motion.h"
int main()
{
	
	int nodeid1,row1, column1;
	int nodeid2,row2, column2;
	int nodeid3,row3, column3;
	int nodeid4,row4, column4;
	puts("Enter node id, row and column for the four nodes:");
	scanf("%d %d %d",&nodeid1, &row1, &column1);
	scanf("%d %d %d",&nodeid2, &row2, &column2);
	scanf("%d %d %d",&nodeid3, &row3, &column3);
	scanf("%d %d %d",&nodeid4, &row4, &column4);
	if(column1==column2||column2==column3||column3==column4||column4==column1)
	{
		puts("No two nodes can be in the same room");
		exit(0);
	}
			
			motion(nodeid1,row1,column1);
		
			motion(nodeid2,row2,column2);
		
			motion(nodeid3,row3,column3);
		
			motion(nodeid4,row4,column4);
		
		return 1;
}

