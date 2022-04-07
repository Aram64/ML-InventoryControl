import socket

host = 'ec2-3-141-104-228.us-east-2.compute.amazonaws.com'
port = 25125
size = 1024 
s = socket.socket(socket.AF_INET, socket.SOCK_STREAM) 
s.connect((host,port)) 
s.send(bytes('Hello, world'),"utf-8")
data = s.recv(size) 
s.close() 
print ('Received:'+data)