import socket
import time

host = 'ec2-3-141-104-228.us-east-2.compute.amazonaws.com'
#host = '127.0.0.1'
port = 25125
client = socket.socket(socket.AF_INET,socket.SOCK_STREAM)
client.connect((host, port))

while True:
	try:
		#iname = input("item name: ")
		f = open("inventory.txt", "r")
		iname = str(f.read())
		f.close()

		client.send(bytes(iname, "utf-8"))
		s_msg = client.recv(1024)
		print("From Server: " + s_msg.decode("utf-8"))
		time.sleep(5)

	except:
		print("Connecting...")
		while True:
			try:
				client = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
				client.connect((host, port))
				print("Connected")
				break
			except:
				print("Failed, Try Again...")
				time.sleep(3)

client.close()

