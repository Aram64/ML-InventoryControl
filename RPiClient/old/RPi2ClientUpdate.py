import socket
import time


host = 'ec2-3-141-104-228.us-east-2.compute.amazonaws.com'
#host = '127.0.0.1'
port = 25125
client = socket.socket(socket.AF_INET,socket.SOCK_STREAM)
client.connect((host, port))
f = open("inventory.txt", "r")
numOld = str(f.read())
current_num_itemsPIN = numOld
f.close               
#changed = False

while True:
    try:
        #iname = input("item name: ")
        f = open("inventory.txt", "r")
        numNew = str(f.read())
        print("New string update" + str(numNew))
        print("Old String "+ str(numOld) )
        iname = str(numNew)
        
        f.close()
        #print(iname)
        time.sleep(1)
        set1 = set(numNew.split())
        set2 = set(numOld.split())

        f = open("inventory.txt", "r")
        if (set1 != set2):
            numOld = numNew
            print("############lets update the database############")
            sendServer = str(f.read())
            client.send(bytes(sendServer, "utf-8"))
            print("check1")
            s_msg = client.recv(1024)
            print("check2")
            print("From Server: " + s_msg.decode("utf-8"))    
            #time.sleep(3)
            print("check3")
            print("################################################")
        f.close()
        time.sleep(2)
        
        #else:
            #print("reeeee 2")
            #pass
                #change = True
                #time.sleep(5)
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
