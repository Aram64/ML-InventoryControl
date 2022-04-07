import time
import cv2
from picamera.array import PiRGBArray
from picamera import PiCamera

frameWidth = 640
frameHeight = 480

cansCas = cv2.CascadeClassifier("cans_cascade.xml") #face_cascade

minArea = 100
color = (255,0,255)
###############################################
#cap = cv2.VideoCapture(-1)

# initialize the camera and grab a reference to the raw camera capture
cap = PiCamera()
cap.resolution = (640, 480)
cap.framerate = 32
rawCapture = PiRGBArray(cap, size=(640, 480))
# allow the camera to warmup
time.sleep(0.1)



# cap.set(3, frameWidth)
# cap.set(4, frameHeight)
# cap.set(10,150)
count = 0

itemupdate = ""

while True:
    success, img = cap.capture_continous()
    imgGray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
    square = cansCas.detectMultiScale(imgGray, 1.1, 6)
    for (x, y, w, h) in square:
        area = w*h
        if area >minArea:
            cv2.rectangle(img, (x, y), (x + w, y + h), (255, 0, 255), 2)
            cv2.putText(img, "can", (x, y - 5),
                        cv2.FONT_HERSHEY_COMPLEX_SMALL, 1, color, 2)
            #imgRoi = img[y:y + h, x:x + w]
            #cv2.imshow("ROI", imgRoi)

    cv2.imshow("Result", img)
    numofcans = len(square)
    itemupdate = "can" +str(numofcans)
    f = open("inventory.txt", "w")
    f.write(itemupdate)
    f.close()
    print(itemupdate)
    #print(len(square))
    time.sleep(1)

    if cv2.waitKey(1) & 0xFF == ord('q'):
        break
