#!/usr/bin/python

import cgi
import cgitb
import json

form_data = cgi.FieldStorage()
results = form_data.getvalue("results")
playername = form_data.getvalue("playername")
start_time = form_data.getvalue("start_time")
end_time = form_data.getvalue("end_time")
data = {"playername": playername, "results": results, "start_time": start_time, "end_time": end_time}

file = open("../../results", "r")
file_data = json.load(file)
file_data.append(data)#lisame uued andmed listi, (kust-yleval asjad)
file.close()

file = open("../../results", 'w')#kirjutame faili sisu yle 
json.dump(file_data, file)
file.close()
