#!/usr/bin/env python

print ('Content-type: text/html')
print ('')


print '<h1>Mastermind</h1>'


import random
import cgi
import time
form = cgi.FieldStorage()

lives = 8
wPegs = 0
rPegs = 0
accountedFor = [0,0,0,0]
accountedForGuess = [0,0,0,0]
reds = [0,0,0,0]
whites = [0,0,0,0]

	
#we will use numbers rather than colours
#python will generate a random number
#compare entries to it



def rNGa(a):
	numbers = ""
	for i in range(4):
		numbers += str(random.randint(1,6))
	return numbers




if "formLives" in form:
	lives = int(form.getvalue("formLives")) - 1
else:
	lives = 8
	
if "answer" in form:
	numbers = form.getvalue("answer")
else:
	numbers = rNGa(6)
	wPegs = 0
	rPegs = 0


if "guess0" in form:
	if int(form.getvalue("formLives")) == 0:
		lives=8
	if int(form.getvalue("formLives")) == 1:
		print '<h1>OH WELL YOU LOST. THE ANSWER WAS ' + numbers + '</h1>'
		
	print '<h1>' + str(lives) + ' lives left </h1>'
	rPegs = 0
	wPegs = 0
	if int(form.getvalue("guess0")) == int(numbers[0]):
		rPegs += 1
		reds[0] = 1
		accountedFor[0] = 1
		accountedForGuess[0]=1
	
	if int(form.getvalue("guess1")) == int(numbers[1]):
		rPegs += 1
		reds[1] = 1
		accountedFor[1] = 1
		accountedForGuess[1]=1
	
	if int(form.getvalue("guess2")) == int(numbers[2]):
		rPegs += 1
		reds[2] = 1
		accountedFor[2] = 1
		accountedForGuess[2]=1
	
	if int(form.getvalue("guess3")) == int(numbers[3]):
		rPegs += 1
		reds[3] = 1
		accountedFor[3] = 1
		accountedForGuess[3]=1
	
	
	if accountedForGuess[0] == 0:
		for i in range(1,4):
			if accountedFor[i] == 0:	
				if int(form.getvalue("guess0")) == int(numbers[i]):
					accountedFor[i] = 1	
					whites[0] = 1
					wPegs += 1
					
	
	if accountedForGuess[1] == 0:
		for i in range(4):
			if accountedFor[i] == 0:	
				if int(form.getvalue("guess1")) == int(numbers[i]):
					accountedFor[i] = 1	
					whites[1] = 1
					wPegs += 1
						
	
	if accountedForGuess[2] == 0:
		for i in range(4):
			if accountedFor[i] == 0:	
				if int(form.getvalue("guess2")) == int(numbers[i]):
					accountedFor[i] = 1	
					whites[2] = 1
					wPegs += 1
					

	if accountedForGuess[3] == 0:
		for i in range(4):
			if accountedFor[i] == 0:	
				if int(form.getvalue("guess3")) == int(numbers[i]):
					accountedFor[i] = 1	
					whites[3] = 1
					wPegs += 1
	wPegs = whites[0]+whites[1]+whites[2]+whites[3]				






	
print '<form method="post">'
print '<p>Guess the number:</p>'
print '<input type=hidden name="formLives" value="' + str(lives) + '">'
print '<input type=hidden name="answer" value="' + numbers + '">'
print '<input name="wPegs" type= "hidden" value ="' + str(wPegs) + '">'
print '<input name="rPegs" type= "hidden" value ="' + str(rPegs) + '">'

print '<p>You have ' + str(wPegs) + ' white pegs.</p>'
print '<p>You have ' + str(rPegs) + ' <span style="color:red">red</span> pegs.</p>'


print '<select name="guess0">'
print '<option>1</option>'
print '<option>2</option>'
print '<option>3</option>'
print '<option>4</option>'
print '<option>5</option>'
print '<option>6</option>'
print '</select>'

print '<select name="guess1">'
print '<option>1</option>'
print '<option>2</option>'
print '<option>3</option>'
print '<option>4</option>'
print '<option>5</option>'
print '<option>6</option>'
print '</select>'

print '<select name="guess2">'
print '<option>1</option>'
print '<option>2</option>'
print '<option>3</option>'
print '<option>4</option>'
print '<option>5</option>'
print '<option>6</option>'
print '</select>'

print '<select name="guess3">'
print '<option>1</option>'
print '<option>2</option>'
print '<option>3</option>'
print '<option>4</option>'
print '<option>5</option>'
print '<option>6</option>'
print '</select>'
print '</p>'
print '<input type="submit" value="GOGO">'
print '</form>'



	
