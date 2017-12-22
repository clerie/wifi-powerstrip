#!/usr/bin/python

# Import required Python libraries
import RPi.GPIO as GPIO
import sys

GPIO.setwarnings(False)

# Use BCM GPIO references instead of physical pin numbers
GPIO.setmode(GPIO.BCM)

# init list with pin numbers
pinList = [21, 20, 26, 16, 19]

# loop through pins and set mode and state to 'low'

for i in pinList: 
	GPIO.setup(i, GPIO.OUT) 

if sys.argv[1] != '':
	if sys.argv[1] == 'alle':
		if sys.argv[2] == 'an':
			for i in pinList:
				GPIO.output(i, GPIO.LOW)
		elif sys.argv[2] == 'aus':
			for i in pinList:
				GPIO.output(i, GPIO.HIGH)
		elif sys.argv[2] == 'wechseln':
			for i in pinList:
				if GPIO.input(i) == 0:
					GPIO.output(i, GPIO.HIGH)
				else:
					GPIO.output(i, GPIO.LOW)
		elif sys.argv[2] == 'gleich':
			pin2 = pinList[int(sys.argv[3])]
			if GPIO.input(pin2) == 0:
				for i in pinList:
					GPIO.output(i, GPIO.LOW)
			else:
				for i in pinList:
					GPIO.output(i, GPIO.HIGH)

	else:
		pin = pinList[int(sys.argv[1])]
		if pin != '':
			if sys.argv[2] == 'an':
				GPIO.output(pin, GPIO.LOW)
			elif sys.argv[2] == 'aus':
				GPIO.output(pin, GPIO.HIGH)
			elif sys.argv[2] == 'wechseln':
				if GPIO.input(pin) == 0:
					GPIO.output(pin, GPIO.HIGH)
				else:
					GPIO.output(pin, GPIO.LOW)
			elif sys.argv[2] == 'gleich':
				pin2 = pinList[int(sys.argv[3])]
				if GPIO.input(pin2) == 0:
					GPIO.output(pin, GPIO.LOW)
				else:
					GPIO.output(pin, GPIO.HIGH)
				
