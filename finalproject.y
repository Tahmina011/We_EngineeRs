/* C Declarations */

%{
	#include<stdio.h>
	extern char variable2[100][100];
	extern int valueofvariable2[100];
	int multiflag[100];
	int switchcheck=50000,defaultval=0,switchex[100],sp=0,switchvalue[100],defaultvalue;
	int m=0,flagformulti=0,t=1,z=0;
	extern int indexx;
	int sym[26],store[26];

	int ll=0,l=0,flag=1,val,i,j,count=0;
	
%}

/* BISON Declarations */

%token VOIDMAIN INT STR FLOAT CHAR NUM VAR MULTIVAR CM FS LB RB FOR WHILE  COLON BREAK DEFAULT TO  
CASE THEN IF ELSE SWITCH  LP RP START END  PRINT ADD SUB MULT DIV ASSIGN GT LT GE LE EQUAL INCRE FUNCTION
%nonassoc IFX
%nonassoc ELSE
%left LT GT
%left VAR
%left ADD SUB
%left MULT DIV


	
/* Simple grammar rules */

%%
root        : fun program fun {printf("\nsuccessful compilation\n");}

program		: VOIDMAIN LP RP LB cstatement RB {printf("\nMAIN FUNCTION BLOCK\n");}
			;
			

cstatement	: /* empty */
			| cstatement statement
			| cstatement cdeclaration
			| cstatement Building
			;
	
cdeclaration: TYPE Variable FS			{ printf("valid declaration\n"); }
			;
			
TYPE 		: INT 
			| FLOAT 
			| CHAR 
			;
				
Variable 	: ValueAssign CM Variable 
            | ValueAssign ;
			
ValueAssign	: VAR			{
									if(store[$1] == 1) printf("variable %c declared already\n",$1+'a');
									else store[$1]=1;
								}
									
				| MULTIVAR			{
					
									int k=0;	
									
									for(i=0; i<indexx-1; i++)
										{	
											
											for( j=0; variable2[indexx-1][j]!='\0'; j++)
											{
												
												if(variable2[i][j] == variable2[indexx-1][j])
												{
													count++;
												}
									
											}
											
											if(count == j && variable2[i][j]=='\0' && variable2[indexx-1][j]=='\0'){
												
												printf("variable %s is declared already \n",variable2[indexx-1]);
												k=1;
											}
											count=0;
																					
										}
										if(k==0)
										{
											multiflag[indexx-1]=1;
										}
									
										
										
									}
									
			| MULTIVAR ASSIGN NUM 		{
										
										
										for(i=0; i<indexx-1; i++) 
										{	
											
											for( j=0; variable2[indexx-1][j]!='\0'; j++)
											{
												
												if(variable2[i][j] == variable2[indexx-1][j])
												{
													count++;
												}
									
											}
											
											
											if(count == j && variable2[i][j]=='\0' && variable2[indexx-1][j]=='\0')
											{
												
												printf("variable %s is declared already \n",variable2[indexx-1]);
												t=0;
											}
											
											count=0;
											
										}
									
										
										
										if(t)
										{
											valueofvariable2[indexx-1]=$3;
											multiflag[indexx-1]=1;
											printf("\nvalue of the %s = %d\t\n",variable2[indexx-1],valueofvariable2[indexx-1]);
										}
										
										
										
									}						
									
									
			| VAR ASSIGN NUM 		{ 	
										if(store[$1] == 1) printf("variable %c declared already\n",$1+'a');
										else { store[$1]=1;
										sym[$1] = $3; 
										printf("\nvalue of the %c = %d\t\n",$1+'a',$3);
										}
									}
			;
			
Building  	: IF LP Expresssion RP START Building END %prec IFX	{		if($3)
								{
									printf("\nvalue of  Conditional statement is %d\n",$6);
								}	
								
								else
								{
									printf("\nvalue is zero in IF block\n");
								}
																}

															
			|IF LP Expresssion RP START Building END ELSE START Building END	{ if($3)
									{
										printf("\nvalue of  Conditional statement is %d\n",$6);
									}
									else
									{
										printf("\nvalue of  else Conditional statement is %d\n",$10);
									}
									
									}
			| FOR LP VAR ASSIGN NUM COLON VAR LE NUM COLON VAR INCRE RP START Building END 	{
																					printf("\nIn Loop:\n\n");
																					for( sym[$3]=$5; sym[$3] <= $9; sym[$3]++)
																					{
																						printf("in loop:%d \n",sym[$3]);

																					}
																					printf("\n\n");
																				}
				
			
			|SWITCH LP VAR RP START E END { printf("switch starts\n"); printf("ACCEPTED %d\n",sym[$3]); 
			int m;
			     for(m=0;m<sp;m++)
				 {
					 if(sym[$3]==switchex[m])
					 {
						 defaultval=1;
						 printf("\ntala %d opens..!! [value of this block is %d]\n",switchex[m],switchvalue[m]);
					 }
				 }
				 if(defaultval==0)
				 {
					 printf("\nvalue of default block is %d\n",defaultvalue);
				 }
					
			}


			|statement { $$=$1;}
			;
			
//switch
E :
	A 
	| A C
	| A E
 
	;
A : A B 
  | CASE NUM COLON statement B {
									switchex[sp]=$2;
									switchvalue[sp]=$4;
									//printf ("tala %d opens:   execute it %d %d\n",$2,switchex[sp],switchvalue[sp]);
									sp++;
								}
  ;

B :  BREAK FS
  ;
C : DEFAULT COLON statement  B { defaultvalue=$3; }
  
   ;
//switchends

fun 	: /* empty */
			| fun function
			;

function 	: TYPE FUNCTION LP parameter RP LB cstatement RB
			{
				printf("Function Declared\n");
			}
		;
parameter 	: /* empty */
			| TYPE VAR parameter1
			;
parameter1 : /* empty */
			| parameter1 CM TYPE VAR
			;
statement	: FS
			| Expresssion FS 				{ $$=$1; printf("\nvalue of Expresssionession: %d\n", $1); }
			| VAR ASSIGN Expresssion FS 	{
										sym[$1] = $3; 
										$$=sym[$1];
									
										if(store[$1]!=1)printf("'%c' is Undeclared",$1+'a');
										else printf("\nvalue of the %c = %d\t\n",$1+'a',$3);
									}
			| MULTIVAR ASSIGN Expresssion FS 	{
											int p=0;
												
										for(i=0; i<indexx-1; i++)
										{	
												for( j=0; variable2[indexx-1][j]!='\0'; j++)
											{
												
												if(variable2[i][j] == variable2[indexx-1][j])
												{
													count++;
												}
									
											}
											if(count == j && variable2[i][j]=='\0' && variable2[indexx-1][j]=='\0'){
										
												flagformulti = 1;
												p=i;
												count=0;
												break;
											}
											count=0;
												
										}
										if(flagformulti){  valueofvariable2[p]=$3;
										$$=valueofvariable2[p];
									
											printf("up %s =",variable2[indexx-1]);
										printf(" %d\n",valueofvariable2[p]);}
								        else {
										    printf("variable '%s' is Undeclared\n",variable2[indexx-1]); 
											indexx--; //if i don't do this it will be added to my multimatrix and next time it will find declared
										}
										flagformulti=0;
										
										
									}

			;
	
Expresssion : VAR					{ $$ = sym[$1]; } 
			| Expresssion LT Expresssion	{ $$ = $1 < $3; }

	        | Expresssion GT Expresssion	{ $$ = $1 > $3; }
			| Expresssion MULT Expresssion	{ $$ = $1 * $3; }
			| Expresssion DIV Expresssion		{ 
										if($3) 
										{
												$$ = $1 / $3;
										}
										else
										{
											$$ = 0;
											printf("\ndivision by zero\t");
										}
									}
			|Expresssion ADD Expresssion		{ $$ = $1 + $3; }
			|Expresssion SUB Expresssion		{ $$ = $1 - $3; }
			|term
			 ;
			 
term 		: factor 
			;
			
factor 		: digit					{ $$ = $1; }
			|LP Expresssion RP				{ $$ = $2; }
			;
			
digit 		: NUM	    			{ $$ = $1; }
			;
			
			
%%
int yywrap()
{
return 1;
}


yyerror(char *s){
	printf( "%s\n", s);
}

