# Technique
A project website build to help students practice BIG-O notation. Uses SQL , php, javascript , html css. Built this site to implement and put into action some of skills I've learned throughout undergrad, web development, database management. 

## Database Schema (Queries done via querys.php)
This schemas been working great, I’m not doing many inner joins to access the
data that I need so the structure is okay. This schema was implemented in MySQL
workbench and then directly imported onto MySQL on my local host.
Each user is assigned a role (which has a role name) via the users_roles table.
The question interaction tracks a users current question as well as there previous
questions and its outcome(got_correct) so we don’t assign a user the same question more
than once.
The question table question_file and the solution_file (which are the choices for each
question), the difficulty is currently unused , but we can use this and the users score to
potentially scale questions 


##Detailed List of Files
/technique/assets						=	Folder	containing	the	questions	and	answers	for	safe	
keeping	incase	database	goes	down
/technique/index.php		=Filler	index	file	for	redirection	to	main	wwwroot	folder
/technique/techqnique.sql	=	Flat	file	of	database	
/technique/wwwroot	=	main	web	directory
/technique/wwwroot/css	=	main	css	directory
/technique/wwwroot /css/default.css	=	style	sheet	for	the	entire	site
/technique/wwwroot /css/login.css	=	style	sheet	to	center	the	main	index.php	
screen	,	and	extra	button	styling	
/technique/wwwroot /php/querys.php	=	main	list	of	all	php	files	database	calls	and	
querys
/technique/wwwroot /php/checkemail.php=	querys	database	to	see	if	email	exists	
(used	on	forms)
/technique/wwwroot /php/checklogin.php	=	querys	database	to	see	if	login	exists	
(used	on	forms)
/technique/wwwroot /php/buildingTools.php	=	used	for	misc	building	site	tools	
(LOGO/	Header	etc)
/technique/wwwroot /php/logout.php	=	Exits	the	session	and	returns	to	index.php
/technique/wwwroot /php/submit-question.php	=	sends	form	to	be	read	in	by	the	
DB	and	returns	to	main	for	the	next	question	
/technique/wwwroot /php/utility.php	=	has	some	misc	debug	tools	used	while	
making
/technique/wwwroot /php/error.php	=	error	webpage.
/technique/wwwroot /javascript/canvasloader.js	=	minimized	canvas	loader	used	
after	registering/technique/wwwroot /javascript/checkregistration.js	=	validation	of	the	
submission	form	and	ajax	calls	to	db	
/technique/wwwroot /javascript/checklogin.js	=	ajax	calls	to	db	to	check	if	login	
validate	before	moving	to	main	and	attempting	login.	
