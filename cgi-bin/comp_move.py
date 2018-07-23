#!/usr/bin/python

import random
import cgitb
import cgi
import datetime
import json

print "Content-type: text/html/plain\n"
compmove = random.randint(1, 3)

form = cgi.FieldStorage()
player_move = int(form.getvalue('playermove', '-1'))
if player_move == compmove:
    result = "tie"
elif (player_move == 3 and compmove == 1) or (player_move == 1 and compmove == 2) or (player_move == 2 and compmove == 3):
    result = "lose"
elif (player_move == 1 and compmove == 3) or (player_move == 2 and compmove == 1) or (player_move == 3 and compmove == 2): 
    result = "win"
else:
	result = "win"

print compmove
print result
#tagastatakse javaskriptile tagasi