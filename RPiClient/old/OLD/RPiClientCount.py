import socket
import time
import re

host = 'ec2-18-191-241-126.us-east-2.compute.amazonaws.com'
#host = '127.0.0.1'
port = 25125
#client = socket.socket(socket.AF_INET,socket.SOCK_STREAM)
#client.connect((host, port))
f = open("inventory.txt", "r")
numOld = f.read()
current_num_itemsPIN = numOld
f.close
changed = False

while True:
    try:
        #iname = input("item name: ")aa
        f = open("inventory.txt", "r")
        numNew = f.read()
        iname = str(f.read())
        f.close()
        
        if (numOld != numNew):
            #print("lets update the database")
            if (change == True):
                #print("reeeee 1")
                client.send(bytes(iname, "utf-8"))
                
                s_msg = client.recv(1024)
                print("From Server: " + s_msg.decode("utf-8"))
                numOld = numNew
                time.sleep(5)
                change = False
            else:
                #print("reeeee 2")
                change = True
                time.sleep(5)
        #else:
            #print("reeeee 3")
            #time.sleep(5)
            #pass
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

