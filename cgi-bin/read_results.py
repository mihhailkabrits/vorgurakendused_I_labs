#!/usr/bin/python

import cgitb
import cgi
import json
import datetime
import time

# TODO: andmed kokku korjata, filtrid teha

print "Content-type: text/html\n"

DAY_IN_MILLISECONDS = 86400000 #naitame et enam ei muuda/paev millisec.
MILLISECOND = 1000

form_data = cgi.FieldStorage()#datetime
start_date = form_data.getvalue("date11", "1975-01-01")
start_date = long(time.mktime(time.strptime(start_date, "%Y-%m-%d"))) * MILLISECOND 
end_date = form_data.getvalue("date22", "2030-01-01")
end_date = long(time.mktime(time.strptime(end_date, "%Y-%m-%d"))) * MILLISECOND + DAY_IN_MILLISECONDS
username = form_data.getvalue('username', "")

resultsFile = open('/home/Mihhail.Kabrits/results', "r")
data = json.load(resultsFile)
table_data = ""

for game in data:
	if  game['playername'] != None and username in game['playername'] and start_date <= long(game['end_time']) <= end_date:
	#yhe elemendi nimega 'game'-see on dictionary string tyypi sees
		wincount = 0
		drawcount = 0
		losscount = 0

		game_results = game['results']
		game_results = game_results[1:-1]#eemaldame aarmised elemendid
		game_results = game_results.split(',')#splittime koma jargi
		for result in game_results:#kammime
			if result == 'win':
				wincount += 1
			elif result == 'loss':
				losscount += 1
			else:
				drawcount += 1

		cdate = long(game['end_time'])#aeg stringi kujul millides, vaja long sekundites
		cdate /= 1000
		readable_date = datetime.datetime.fromtimestamp(cdate).strftime('%Y-%m-%d %H:%M:%S')

		table_data += """
		<tr>
		  <td>%s</td>
		  <td>games - won: %d, drawn: %d, lost: %d</td>
		  <td>games - won: %d, drawn: %d, lost: %d</td>
		  <td>%s</td>
		  <td>%d</td>
		</tr>""" % (game['playername'], wincount, drawcount, losscount, losscount, drawcount, wincount, readable_date, (long(game['end_time']) - long(game['start_time'])) / 1000)

print """
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Results</title>
</head>
<body>
  <table cellspacing='13'>
    <tr>
      <td>playername</td>
      <td>player results</td>
      <td>AI results</td>
      <td>date</td>
      <td>duration</td>
    </tr>
    %s
  </table>
</body>
</html>
""" % table_data
resultsFile.close()
