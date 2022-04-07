import re

n=0
for i in range(1):
    f = open("inventory.txt", "r")
    n = str(f.read())
    print(n)
    #num1, count = n.split()[n:n+2]
    f.close()
    #temp = re.compile("([a-zA-Z]+)([0-9]+)")
    #res = temp.match(num1).groups()
    #print(num1 + count )
    #n=n+2
