import time
import RPi.GPIO as GPIO
import urllib2

GPIO.setmode(GPIO.BCM)

GPIO.setup(26, GPIO.IN)
GPIO.setup(21, GPIO.IN)
GPIO.setup(20, GPIO.IN)
GPIO.setup(16, GPIO.IN)

blockGPIO26 = False
blockGPIO21 = False
blockGPIO20 = False
blockGPIO16 = False

while 1:
	if GPIO.input(26) == GPIO.HIGH and blockGPIO26 == False:
		blockGPIO26 = True
		urllib2.urlopen("http://192.168.0.115/ajax.php?ID=0&setto=wechseln")
		urllib2.urlopen("http://192.168.0.115/ajax.php?ID=1&setto=gleich&value=0")
		time.sleep(1);
	elif GPIO.input(26) == GPIO.LOW and blockGPIO26 == True:
		blockGPIO26 = False


	if GPIO.input(21) == GPIO.HIGH and blockGPIO21 == False:
		blockGPIO21 = True
		urllib2.urlopen("http://192.168.0.115/ajax.php?ID=2&setto=wechseln")
		time.sleep(1);
	elif GPIO.input(21) == GPIO.LOW and blockGPIO21 == True:
		blockGPIO21 = False

	if GPIO.input(20) == GPIO.HIGH and blockGPIO20 == False:
		blockGPIO20 = True
		urllib2.urlopen("http://192.168.0.115/ajax.php?ID=3&setto=wechseln")
		time.sleep(1);
	elif GPIO.input(20) == GPIO.LOW and blockGPIO20 == True:
		blockGPIO20 = False

	if GPIO.input(16) == GPIO.HIGH and blockGPIO16 == False:
		blockGPIO16 = True
		urllib2.urlopen("http://192.168.0.115/ajax.php?ID=4&setto=wechseln")
		time.sleep(1);
	elif GPIO.input(16) == GPIO.LOW and blockGPIO16 == True:
		blockGPIO16 = False
